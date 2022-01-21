<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function __construct() {
        $this->middleware('Auth:admin')
        ->except(["showAdminForm","adminLogin"]);
    }

    public function index(){
        return view('admin.index')->with([
            'products' => Product::all(),
            'orders'   => Order::all()
        ]);
    }

    public function showAdminForm() {
        return view('admin.auth.login');
    }

    public function adminLogin(Request $request) {
        $this->validate($request,[
            "email"     => "required|email",
            "password"  => "required|min:4"
        ]);
        if(Auth()->guard('admin')->attempt([
            "email"     => $request->email,
            "password"  => $request->password
        ], $request->get('remember')))
        {
            return redirect("/admin");
        }else{
            return redirect()->route("admin.login");
        }
    }

    public function adminLogout() {
        Auth()->guard("admin")->logout();
        return redirect()->route('admin.login');
    }

    public function getOrders() {
        return view('admin.orders')->with([
            'orders' => Order::all()
        ]);
    }
    public function getProducts() {
        return view('admin.products')->with([
            'products'   => Product::latest()->paginate(5),
            
        ]);
    }
}
