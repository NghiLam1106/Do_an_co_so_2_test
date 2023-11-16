<?php

namespace App\Http\Controllers\Admin\Customer;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Service\Customer\CustomerService;

class CustomerController extends Controller
{
    protected $CustomerService;

    public function __construct(CustomerService $CustomerService) {
        $this->CustomerService = $CustomerService;
    }

    // 
    public function index()
    {
        $title = "Danh sách đơn hàng";
        $customer = $this->CustomerService->getCustomer();
        return view('Admin.Customer.list',  compact('title', 'customer'));
    }

    // Chi tiết đơn hàng
    public function show(Customer $customer)
    {
        $cart = $this->CustomerService->getProductForCart($customer);
        return view('Admin.Customer.infor', [
            'title' => 'Chi Tiết Đơn Hàng: ' . $customer->name,
            'customer' => $customer,
            'carts' => $cart
        ]);
    }

    // Xóa khách hàng
    public function delete($customer) {
        $this->CustomerService->deleteCustomer($customer);
        return redirect()->back();
    }
}
