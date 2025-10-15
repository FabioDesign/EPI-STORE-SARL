<?php

namespace App\Http\Controllers;

use PDF;
use File;
use Myhelper;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\{DB, Log, Validator};
use App\Models\{Customer, Imgshop, Listemail, Menu, Shopcart};

class ShopController extends Controller
{
    public function index(Request $request)
    {
        // Récupérer les données
        $code = (string) $request->query('code');
        $submenu = Menu::where('code', $code)->first();
        if (!$submenu) {
            return redirect('/'); // Rediriger vers la page d'accueil si le menu n'existe pas
        }
        // Pagination
        $limit = 6;
        // Récupérer les données
        $menu = Menu::where('id', $submenu->menu_id)->first();
        $label = $menu->libelle;
        // Titre
        $titre = $label . " - " . $submenu->libelle;
        $currentMenu = $menu->code;
        // D'abord, récupérer les shops
        $shops = [];
        $query = Menu::select('id', 'code', 'libelle')
        ->where('status', 1)
        ->where('menu_id', $submenu->menu_id)
        ->orderBy('position')
        ->get();
        foreach($query as $data):
            // Menus
            $num = $data->code == $code ? (int) $request->query('num', 1):1;
            $imgshops = Imgshop::select('id', 'filename')
            ->where('status', 1)
            ->where('shop_id', $data->id)
            ->orderBy('position')
            ->paginate($limit, ['*'], 'page', $num);
            array_push($shops, [
                'code' => $data->code,
                'libelle' => $data->libelle,
                'imgshops' => $imgshops->items(),
                'pagination' => [
                    'currentPage' => $imgshops->currentPage(),
                    'lastPage' => $imgshops->lastPage(),
                    'total' => $imgshops->total(),
                ]
            ]);
        endforeach;
        return view('shops', compact('titre', 'currentMenu', 'label', 'shops'));
    }
    // Cart item count
    public function countcart(Request $request)
    {
        // Count items in cart
        return Shopcart::join('customers', 'customers.id','=','shopcarts.customer_id')
        ->where('token', $request->token)
        ->where('status', 0)
        ->count();
    }
    // Confirm shopcart
    public function confirmcart(Request $request)
    {
        // Image de l'article
        $imgshops = Imgshop::select('code', 'libelle', 'filename', 'menu_id')
        ->join('menus', 'menus.id','=','imgshops.shop_id')
        ->where('imgshops.id', $request->id)
        ->first();
        $imgshop = env('APP_URL') . "/assets/img/shops/" . $imgshops->code . "/" . $imgshops->filename;
        // Libellé du menu
        $menu = Menu::select('libelle')
        ->where('id', $imgshops->menu_id)
        ->first();
        return $menu->libelle . "|" . $imgshops->libelle . "|" . $imgshop;
    }
    // Validated shopcart
    public function validcart(Request $request)
    {
        $error = "error|Service indisponible, veuillez réessayer plus tard !";
        // Libellé du menu
        $customer = Customer::select('id')
        ->where('token', $request->token)
        ->first();
        if (!$customer) {
            try {
                $set = [
                    'token' => $request->token,
                ];
                DB::beginTransaction(); // Démarrer une transaction
                $customer = Customer::create($set);
                // Valider la transaction
                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack(); // Annuler la transaction en cas d'erreur
                Log::warning("Customer::insert : " . $e->getMessage() . " " . $request->token);
                return $error;
            }
        }
        try {
            $set = [
                'quantity' => 1,
                'imgshop_id' => $request->id,
                'customer_id' => $customer->id,
            ];
            DB::beginTransaction(); // Démarrer une transaction
            Shopcart::create($set);
            // Valider la transaction
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack(); // Annuler la transaction en cas d'erreur
            Log::warning("Shopcart::insert : " . $e->getMessage() . " " . json_encode($set));
            if ($e->getCode() != 23000) {
                return $error;
            }
        }
        return "success|Article ajouté au panier avec succès.";
    }

    public function shopcart()
    {
        // Titre
        $titre = "Votre Panier";
        $currentMenu = 'Panier';
        $token = csrf_token();
        // Liste Customer
		$where = [
			['token', $token],
			['customers.status', 0],
		];
        $customer = Customer::where($where)->first();
        $username = $customer->username ?? '';
        $number = $customer->number ?? '';
        $email = $customer->email ?? '';
        // Image de l'article
        $query = [];
        $shopcarts = Shopcart::select('shopcarts.id', 'code', 'libelle', 'filename', 'menu_id')
        ->join('imgshops', 'imgshops.id','=','shopcarts.imgshop_id')
        ->join('customers', 'customers.id','=','shopcarts.customer_id')
        ->join('menus', 'menus.id','=','imgshops.shop_id')
        ->where($where)
        ->orderBy('shopcarts.id')
        ->get();
        foreach($shopcarts as $shopcart):
            // Libellé du menu
            $menu = Menu::select('libelle')
            ->where('id', $shopcart->menu_id)
            ->first();
            array_push($query, [
                'id' => $shopcart->id,
                'menu' => $menu->libelle,
                'code' => $shopcart->code,
                'submenu' => $shopcart->libelle,
                'filename' => $shopcart->filename,
            ]);
        endforeach;
        return view('shopcart', compact('titre', 'currentMenu', 'username', 'number', 'email', 'query'));
    }
    public function shopcartform(Request $request)
    {
        // dd($request->all());
        $error = "2|Service indisponible, veuillez réessayer plus tard !";
        //Validator
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'email' => 'required|email',
            'number' => 'required',
            'quantity' => 'required|array',
        ], [
            'username.required' => "Nom complet obligatoire.",
            'email.required' => "Adresse e-mail obligatoire.",
            'email.email' => "Adresse e-mail non valide.",
            'number.required' => "Objet obligatoire.",
            'quantity.*' => "Quantité obligatoire.",
        ]);
        //Error field
        if($validator->fails()){
            $errors = $validator->errors();
            Log::warning("Shopcart::validator " . json_encode($request->all()));
            if($errors->has('username')) return "0|" . $errors->first('username') . "|.username";
            if($errors->has('number')) return "0|" . $errors->first('number') . "|.number";
            if($errors->has('email')) return "0|" . $errors->first('email') . "|.email";
            if($errors->has('quantity')) return "0|" . $errors->first('quantity') . "|.quantity";
        }
        // Vérifier si le token est présent et valide
        $customer = Customer::where('token', csrf_token())->first();
        if (!$customer) {
            Log::warning("Shopcart::customer - Aucune donnée trouvée pour le token : " . csrf_token());
            return $error;
        }
        try {
            // Envoi de l'email
            $email = Str::lower($request->email);
            $numrecu = Customer::receiptnumber();
            // Insertion en base
            $set = [
                'status' => 1,
                'email' => $email,
                "numrecu" => $numrecu,
                'number' => $request->number,
                'username' => $request->username,
            ];
            DB::beginTransaction(); // Démarrer une transaction
            $customer->update($set);
            // Valider la transaction
            DB::commit();
            // Si des permissions sont fournies, les associer au profil
            if ($request->has('quantity') && is_array($request->quantity)) {
                // Parcourir les quantity fournies
                foreach ($request->quantity as $id => $quantity) :
                    Shopcart::findOrFail($id)->update(['quantity' => $quantity]);
                endforeach;
            }
        } catch(\Exception $e) {
          Log::warning("Shopcart::update - Costumer " . $e->getMessage() . " " . json_encode($set));
            return $error;
        }
        $proforma = Customer::proformaUnique();
        $dirfile = str_replace('-', '', substr($customer->created_at, 0, 10));
        //Chemin d'accès
        $path = '';
        $dir = 'assets/pdf/' . $dirfile;
        try {
            if (!File::isDirectory($dir)) {
              File::makeDirectory($dir, 0755, true, true);
            }
            //Infos du Reçu de paiement
            $dataPDF = [
                'bg' => 'assets/img/proforma.jpg',
                'numrecu' => $numrecu,
                'datepay' => date('d/m/Y H:i'),
                'username' => $request->username,
                'number' => $request->number,
                'email' => $email,
            ];
            // Image de l'article
            $total = 0;
            $query = [];
            foreach ($request->quantity as $id => $quantity) :
                $shopcart = Shopcart::select('code', 'libelle', 'filename', 'menu_id')
                ->join('imgshops', 'imgshops.id','=','shopcarts.imgshop_id')
                ->join('menus', 'menus.id','=','imgshops.shop_id')
                ->where('shopcarts.id', $id)
                ->first();
                if ($shopcart) {
                    // Libellé du menu
                    $menu = Menu::select('libelle')
                    ->where('id', $shopcart->menu_id)
                    ->first();
                    $total += $quantity;
                    array_push($query, [
                        'quantity' => $quantity,
                        'menu' => $menu->libelle,
                        'code' => $shopcart->code,
                        'submenu' => $shopcart->libelle,
                        'filename' => $shopcart->filename,
                    ]);
                } else {
                    Log::warning("Shopcart::shopcarts - Aucune donnée trouvée pour l'ID : " . $id);
                }
            endforeach;
            //Vue PDF
            $pdf = PDF::loadView('proforma', compact('dataPDF', 'query', 'total'));
            //Path to file
            $path = $dir . '/' . $proforma;
            //Enregistrer le fichier
            $pdf->save($path);
            try {
                $set = [
                    'proforma' => $proforma,
                ];
                $customer->update($set);
            } catch(\Exception $e) {
                Log::warning("Shopcart::update - Proforma " . $e->getMessage());
            }
            try {
                //Requete Read
                $query = Listemail::where('status', '!=', 0)->get();
                $to = '';
                $cc = [];
                foreach ($query as $data) :
                    if ($data->status == 1) $to = $data->email;
                    if ($data->status == 2) array_push($cc, $data->email);
                endforeach;
                // Email
                if ($to == '') $to = env('MAIL_FROM_ADDRESS');
                // Envoi de l'email
                $email = Str::lower($request->email);
                $subject = "Facture proforma";
                $message = "<div style='color:#156082;font-size:11pt;line-height:1.5em;font-family:Century Gothic'>
                Cher Admin,<br><br>
                Un devis vient d'être initié depuis le Site Web par :<br>
                - Nom et prénoms : <b>" . $request->username . "</b><br>
                - Contact : <b>" . $request->number . "</b><br>
                - Email : <b>" . $email . "</b><br><br>
                <hr style='color:#156082;'>
                Cordialement !
                </div>";
                Myhelper::sendmail($to, $cc, $request->username, $email, $subject, $message, $path, $proforma);
                Log::info('Sendmail::insert ' . json_encode($request->all()));
                return "1|Votre devis a été envoyé avec succès.";
            } catch(\Exception $e) {
                Log::warning("Erreur d'envoi de mail : " . $e->getMessage());
                return $error;
            }
        } catch(\Exception $e) {
            Log::warning("Erreur de génératation du PDF : " . $e->getMessage());
            return 0;
        }
    }
}