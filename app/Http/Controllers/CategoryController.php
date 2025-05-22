<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

use function Pest\Laravel\json;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::get(['id', 'name']);
        return response()->json([
            'data' => $categories,
            'message' => 'get categories successfully',
            'status' => 200
        ]);
    }

    public function show($id) {
        $category = Category::where('id', $id)->first(['id', 'name']);
        return response()->json([
            'data'=> $category,
            'message' => 'get category successfully',
            'status' => 200
        ]);
        
    }
}
