<?php
namespace App\Http\Service\Menu;

use App\Models\Menu;
use DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Collection;


class MenuService {

    // Hàm thêm danh mục
    public function addMenu($request) {
        try {
            Menu::create($request->all());
            $request->session()->flash('susscess', 'Thêm danh mục thành công');
        } catch (\Exception $er) {
            $request->session()->flash('error', $er->getMessage());
            return false;
        }
        return true;
    }

    // Hàm liệt kê danh mục theo phân trang
    public function listMenu() {
        return DB::table('menus')->paginate(1); // Phân trang: Một trang hiển thị 1 danh mục
    }

    // Hàm liệt kê tất cả danh mục
    public function listAllMenu() {
        return DB::table('menus')->get(); // Phân trang: Một trang hiển thị 1 danh mục
    }

    public function listMenuByid($id) {
        return DB::select('select * from menus where id = ?', [$id]);
    }

    // Hàm update danh mục
    public function updateMenu($request, $id) {
        $file = $request->file('hinhanh'); // Lấy file

        if ($file) {
            return DB::table('menus')->where('id', '=', $id)->update([
                'name' => $request->input('name'),
                'hinhanh' => $request->input('hinhanh')
            ]);
        }
        else { // Nếu file không tồn tại thì chạy cái này
            return DB::table('menus')->where('id', '=', $id)->update([
                'name' => $request->input('name')
            ]);
        }
    }

    // Hàm xóa danh mục
    public function delete($id) {
        return DB::table('menus')->where('id', '=', $id)->delete();
    }

    // Lấy danh mục theo id
    public function getId($id) {
        return Menu::where('id', $id)->firstOrFail();
    }

    // Lấy sản phẩm theo id danh mục
    public function getProduct($menu, $request) {
        $query = DB::table('products')
            ->select('id', 'nameproduct', 'price', 'hinhanhproduct', 'mausac')
            ->where('menu_id', $menu->id)
            ->where('nameproduct', 'like', '%'.$request->search.'%');
        if ($request->input('price')) {
            $query->orderBy('price', $request->input('price'));
        }
        if ($request->input('mausac')) {
            $query->where('mausac', $request->input('mausac'));
        }
        return $query
            ->paginate(16)
            ->withQueryString();
    }

    // 
}

?>