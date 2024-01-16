<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Category::$products = DB::table('products')
            ->where('products.name', 'like', "%$request->search%")
            ->paginate(5);
        // dd($products);
        return view('pages.product.index', compact('products'));
    }
}
