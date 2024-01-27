<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::when(
            $request->room_id,
            function ($query) use ($request) {
                return $query->where('room_id', $request->room_id);
            }
        )->get();
        return response()->json([
            'message' => 'Success',
            'data' => $categories,
        ], 200);
    }
}
