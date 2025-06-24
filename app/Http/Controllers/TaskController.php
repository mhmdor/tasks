<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function tableData()
    {
        return Task::where('user_id', auth()->id())->get();
    }

    public function index()
    {
        $categories = Category::where('user_id',auth()->id())->get();
        $records = $this->tableData();
        return view('tasks.index', compact('records','categories'));
    }

    public function records()
    {
        $records = $this->tableData();
        return view('tasks.records', compact('records'));
    }

    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'name' => 'required|string|max:255',
                'category_id' => 'required|string|max:255',
                'description' => 'nullable|string|max:255',
                'done' => 'nullable|string|max:255',
            ],

        );

        $data['user_id'] = auth()->id();

        Task::create($data);

        return response()->json([
            'message' => 'stored successfully',
        ], 201);
    }

    public function edit(Task $task)
    {
        return $task;
    }

    public function update(Request $request, Task $task)
    {
        $data = $request->validate(
            [
                'name' => 'required|string|max:255',
                'category_id' => 'required|string|max:255',
                'description' => 'nullable|string|max:255',

            ],

        );

        $task->update($data);

        return response()->json([
            'message' => 'updated successfully',
        ], 201);
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return response()->json([
            'message' => 'deleted successfully',
        ], 201);
    }
}
