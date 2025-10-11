<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Imghome, Slider};
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function index()
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

    public function contact()
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