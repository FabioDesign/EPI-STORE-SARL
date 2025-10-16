<?php

namespace App\Http\Controllers;

use Myhelper;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\{Listemail, Sendmail};
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\{Log, Validator};

class ContactController extends Controller
{

    public function index()
    {
        // Titre
        $titre = "Nous Contacter";
        $currentMenu = 'Contacts';

        return view('contacts', compact('titre', 'currentMenu'));
    }
    public function store(Request $request)
    {
        $error = "2|Service indisponible, veuillez réessayer plus tard !";
        //Validator
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'comment' => 'required',
        ], [
            'username.required' => "Nom complet obligatoire.",
            'email.required' => "Adresse e-mail obligatoire.",
            'email.email' => "Adresse e-mail non valide.",
            'subject.required' => "Objet obligatoire.",
            'comment.required' => "Message obligatoire.",
        ]);
        //Error field
        if($validator->fails()){
            $errors = $validator->errors();
            Log::warning("Sendmail::validator " . json_encode($request->all()));
            if($errors->has('username')) return "0|" . $errors->first('username') . "|.username";
            if($errors->has('subject')) return "0|" . $errors->first('subject') . "|.subject";
            if($errors->has('comment')) return "0|" . $errors->first('comment') . "|.comment";
            if($errors->has('email')) return "0|" . $errors->first('email') . "|.email";
        }
        try {
			//Requete Read
			$query = Listemail::where('status', '!=', 0)->get();
            $to = '';
            $cc = [];
            foreach($query as $data):
                if ($data->status == 1) $to = $data->email;
                if ($data->status == 2) array_push($cc, $data->email);
            endforeach;
            // Email
            if ($to == '') $to = env('MAIL_FROM_ADDRESS');
            // Envoi de l'email
			$email = Str::lower($request->email);
            Myhelper::sendmail($to, $cc, $request->username, $email, $request->subject, $request->comment, '', '');
            try {
                // Insertion en base
                $set = [
                    'email' => $email,
                    'subject' => $request->subject,
                    'comment' => $request->comment,
                    'username' => $request->username,
                ];
                Sendmail::create($set);
                Log::info('Sendmail::insert ' . json_encode($request->all()));
                return "1|Votre message a été envoyé avec succès.";
            } catch(\Exception $e) {
                Log::warning("Sendmail::insert " . $e->getMessage() . " " . json_encode($set));
                return $error;
            }
        } catch(\Exception $e) {
            Log::warning("Sendmail::Erreur d'envoi de mail : " . $e->getMessage());
            return $error;
        }
    }
}