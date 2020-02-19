<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::paginate(config('olshop.front_pagination'));
        // $categories = Category::get();
        // $categories->load('products');
        return view('homepage', [
            // 'categories' => $categories,
            'products' => $products
        ]);
    }
}
