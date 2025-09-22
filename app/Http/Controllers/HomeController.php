<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Imghome, Imgshop, Menu, Slider};
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function home()
    {
        // Titre
        $titre = "Accueil";
        $currentMenu = 'home';
        // Slide
        $sliders = Slider::where('status', 1)->get();
        // Image home
        $imghomes = Imghome::where('status', 1)->get();
        return view('home', compact('titre', 'currentMenu', 'sliders', 'imghomes'));
    }

    public function shops(Request $request)
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
        $currentMenu = $submenu->libelle;
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
        // dd($shops);
        return view('shops', compact('titre', 'currentMenu', 'label', 'shops'));
    }

    public function contacts()
    {
        // Titre
        $titre = "Nous Contacter";
        $currentMenu = 'Contacts';

        return view('contacts', compact('titre', 'currentMenu'));
    }

    public function login()
    {
        // Titre
        $titre = "Login";
        $currentMenu = 'login';

        return view('login', compact('titre', 'currentMenu'));
    }

    public function forgotpassword()
    {
        // Titre
        $titre = "Login";
        $currentMenu = 'forgotpassword';

        return view('forgotpassword', compact('titre', 'currentMenu'));
    }

    public function register()
    {
        // Titre
        $titre = "register";
        $currentMenu = 'register';

        return view('register', compact('titre', 'currentMenu'));
    }

    public function shopsingle()
    {
        // Titre
        $titre = "register";
        $currentMenu = 'shop';

        return view('shopsingle', compact('titre', 'currentMenu'));
    }
}