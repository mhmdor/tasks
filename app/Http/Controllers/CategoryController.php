<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function tableData()
    {
        return Category::where('user_id', auth()->id())->get();
    }

    public function index()
    {
        $records = $this->tableData();
        return view('categories.index', compact('records'));
    }

    public function records()
    {
        $records = $this->tableData();
        return view('categories.records', compact('records'));
    }

    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'name' => 'required|string|max:255',

            ],

        );

        $data['user_id'] = auth()->id();

        Category::create($data);

        return response()->json([
            'message' => 'stored successfully',
        ], 201);
    }

    public function edit(Category $category)
    {
        return $category;
    }

    public function update(Request $request, Category $category)
    {
        $data = $request->validate(
            [
                'name' => 'required|string|max:255',

            ],

        );

        $category->update($data);

        return response()->json([
            'message' => 'updated successfully',
        ], 201);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json([
            'message' => 'deleted successfully',
        ], 201);
    }
}
