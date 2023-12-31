<?php
namespace App\Http\Service\Product;

use App\Models\Menu;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductUserService {

    const LIMIT = 16;

    // Hàm gọi tất cả sản phẩm
    public function get($page = null) {
        return Product::select('id', 'nameproduct', 'price', 'hinhanhproduct')
            ->when($page != null, function ($query) use ($page) {
                $query->offset($page * self::LIMIT);
            })
            ->limit(self::LIMIT)
            // ->paginate(self::LIMIT);
            ->get();
    }
    
    // 
    public function getProduct($request) {
        $query = DB::table('products')
            ->select('id', 'nameproduct', 'price', 'mausac', 'hinhanhproduct')
            ->where('nameproduct', 'like', '%'.$request->search.'%');
            if ($request->input('price')) {
                $price = $request->input('price');
                switch ($price) {
                    case '1':
                        $query->whereBetween('price', [100000, 199999]);
                        break;
                    case '2':
                        $query->whereBetween('price', [200000, 300000]);
                        break;
                    case '3':
                        $query->whereBetween('price', [300000, 400000]);
                        break;
                    case 'asc':
                        $query->orderBy('price', $request->input('price'));
                        break;
                    case 'desc':
                        $query->orderBy('price', $request->input('price'));
                        break;
                }
            }
            if ($request->input('mausac')) {
                $query->where('mausac', $request->input('mausac'));
            }
            return $query
            ->paginate(16)
            ->withQueryString();
    }

    // 
    public function listAllMenu() {
        return DB::table('menus')->get();
    }

    // 
    public function getMenu($id) {
        return DB::table('menus')->get();
    }

    // 
    public function getProductById($menu, $request) {
        $query = DB::table('products')
            ->select('id', 'nameproduct', 'price', 'mausac', 'hinhanhproduct')
            ->where('menu_id', $menu->id);

        if ($request->input('price')) {
            $price = $request->input('price');
            switch ($price) {
                case '1':
                    $query->whereBetween('price', [100000, 200000]);
                    break;
                case '2':
                    $query->whereBetween('price', [200000, 300000]);
                    break;
                case '3':
                    $query->whereBetween('price', [300000, 400000]);
                    break;
                case 'asc':
                    $query->orderBy('price', $request->input('price'));
                    break;
                case 'desc':
                    $query->orderBy('price', $request->input('price'));
                    break;
            }
        }
        if ($request->input('mausac')) {
            $query->where('mausac', $request->input('mausac'));
        }
        return $query
            ->paginate(16)
            ->withQueryString();
    }

    //
    // public function search($request) {
    //     $query = Product::where('nameproduct', 'like', '%'.$request->search.'%');
    //     if ($request->input('price')) {
    //         $query->orderBy('price', $request->input('price'));
    //     }
    //     if ($request->input('mausac')) {
    //         $query->where('mausac', $request->input('mausac'));
    //     }
    //     return $query
    //     ->paginate(16)
    //     ->withQueryString();
    // }
}