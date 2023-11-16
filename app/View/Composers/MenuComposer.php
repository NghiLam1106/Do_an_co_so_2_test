<?php


namespace App\View\Composers;
use App\Models\Menu;
use App\Models\Product;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class MenuComposer
{
    protected $users;

    public function __construct()
    {
    }

    public function compose(View $view)
    {
        $menus = DB::table('menus')->get();

        $view->with('menus', $menus);
    }
}