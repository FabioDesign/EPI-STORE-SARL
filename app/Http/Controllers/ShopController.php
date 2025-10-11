<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Imgshop, Menu, Slider};
use App\Http\Controllers\Controller;

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
}