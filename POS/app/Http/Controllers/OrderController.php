<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\Curtomers;


class OrderController extends Controller
{
    public function index(){
        $data['categories'] = Category::get();
        $data['customers'] = Customer::get();
        return view('order.index')->with($data);
    }
}
