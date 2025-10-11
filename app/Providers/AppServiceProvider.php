<?php

namespace App\Providers;

use App\Models\{Contact, Menu};
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
       // Partager les menus avec toutes les vues
        View::composer('*', function ($view) {
            $menus = Menu::with(['submenus' => function($q) {
                $q->select('code', 'libelle', 'target', 'menu_id')
                    ->where('status', 1)
                    ->orderBy('position');
            }])
            ->select('id', 'code', 'libelle', 'target')
            ->where('status', 1)
            ->where('menu_id', 0)
            ->orderBy('position')
            ->get()
            ->map(function($menu) {
                return [
                    'code' => $menu->code,
                    'target' => $menu->target,
                    'libelle' => $menu->libelle,
                    'submenus' => $menu->submenus
                ];
            })
            ->toArray();

            $view->with('menus', $menus);
        });
        $query = Contact::select('opening', 'phone', 'email', 'address', 'map')->first();
        config(
            [
                'opening' => $query->opening,
                'phone' => $query->phone,
                'email' => $query->email,
                'address' => $query->address,
                'map' => $query->map,
            ]
        );
    }
}
