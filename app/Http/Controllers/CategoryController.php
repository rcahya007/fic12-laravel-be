<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = DB::table('categories')->where('name', 'like', "%$request->search%")
            ->orderBy('id', 'desc')
            ->paginate(5);
        // $categories = Category::paginate(5);
        return view('pages.category.index', compact('categories'));
    }

    public function create()
    {
        return view('pages.category.create');
    }

    public function store(CategoryRequest $request)
    {
        try {
            $data = $request->all();
            if ($request->image != null) {
                $filename = time() . '.' . $request->image->extension();
                $request->image->storeAs('public/category', $filename);
                $data['image'] = $filename;
            }
            Category::create($data);
            return redirect()->route('category.index')->with('success', 'Category created successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something goes wrong while uploading file!');
        }
    }
    public function show($id)
    {
    }
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('pages.category.edit', compact('category'));
    }
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        if ($request->image == null) {
            $category->fill($request->except('image'));
        } else {
            Storage::delete('public/category/' . $category->image);
            $filename = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/category', $filename);
            $category->image = $filename;
        }
        $category->save();
        return redirect()->route('category.index')->with('success', 'Category updated successfully');;
    }
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        Storage::delete('public/category/' . $category->image);
        $category->delete();
        return redirect()->route('category.index');
    }
}
