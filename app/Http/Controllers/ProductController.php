<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::where('name', 'like', "%$request->search%")
            ->orderBy('id', 'desc')
            ->paginate(5);
        return view('pages.product.index', compact('products'));
    }

    public function create()
    {
        $dataCategory = Category::all();
        return view('pages.product.create', compact('dataCategory'));
    }

    public function store(ProductRequest $request)
    {
        try {
            $data = $request->all();
            if ($request->image != null) {
                $filename = time() . '.' . $request->image->extension();
                $request->image->storeAs('public/products', $filename);
                $data['image'] = $filename;
            }
            if ($request->input('is_available') == "on") {
                $data['is_available'] = true;
            } else {
                $data['is_available'] = false;
            }
            Product::create($data);
            return redirect()->route('product.index')->with('success', 'Product created successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something goes wrong while uploading file!');
        }
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $dataCategory = Category::all();
        // dd(asset('storage/products/' . $product->image));

        return view('pages.product.edit', [
            'dataCategory' => $dataCategory,
            'product' => $product,
        ]);
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->category_id = $request->input('category_id');
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        if ($request->image == null) {
            $product->fill($request->except('image'));
        } else {
            Storage::delete('public/products/' . $product->image);
            $filename = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/products', $filename);
            $product->image = $filename;
        }
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');
        if ($request->input('is_available') == "on") {
            $product->is_available = true;
        } else {
            $product->is_available = false;
        }
        $product->save();
        return redirect()->route('product.index')->with('success', 'Product updated successfully');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        Storage::delete('public/products/' . $product->image);
        $product->delete();
        return redirect()->route('product.index');
    }
}
