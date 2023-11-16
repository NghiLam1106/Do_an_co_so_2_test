<?php
namespace App\Http\Service\Customer;

use DB;
use App\Models\Customer;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;

class CustomerService {

    // 
    public function getCustomer()
    {
        return Customer::paginate(16);
    }

    // 
    public function getProductForCart($customer) {
        return $customer->carts()->with(['product' => function ($query) {
            $query->select('id', 'nameproduct', 'hinhanh');
        }])->get();
    }

    // 
    public function deleteCustomer($customer) {
        return DB::table('customers')->where('id', '=', $customer)->delete();
    } 
}

?>