<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::where('name', 'like', "%$request->search%")->paginate(5);
        return view('pages.product.index', compact('products'));
    }

    public function create()
    {
        $dataCategory = Category::all();
        return view('pages.product.create', compact('dataCategory'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
    }
}
