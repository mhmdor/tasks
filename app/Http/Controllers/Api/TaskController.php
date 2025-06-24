<?php

namespace App\Http\Controllers\Api;


use App\Http\Requests\TaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Routing\Controller;
use App\Traits\RestfulTrait;


class TaskController extends Controller
{
    use RestfulTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $task = Task::get();
        return $this->apiResponse(['task' => TaskResource::collection($task)], self::STATUS_OK, 'get Task successfully');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request)
    {

        $data = $request->all();

        $data['user_id'] = auth()->id();

        $task = Task::create(
            $data
        );



        return $this->apiResponse(['task' => $task], self::STATUS_CREATED, 'add Task successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task = Task::with('cities')->where('id', $id)->first();
        if (!$task) {
            return $this->apiResponse(null, self::STATUS_NOT_FOUND, 'Not Found');
        }
        return $this->apiResponse(['task' => new TaskResource($task)], self::STATUS_OK, 'get Task successfully');
    }


    /**
     * Update the specified resource in storage.
     */

    public function update(TaskRequest $request, string $id)
    {

        $task = Task::where('id', $id)->first();
        if (!$task) {
            return $this->apiResponse(null, self::STATUS_NOT_FOUND, 'Not Found');
        }

        $task->update(
            $request->all()
        );

        return $this->apiResponse(['task' => $task], self::STATUS_CREATED, 'update Task successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::where('id', $id)->first();
        if (!$task) {
            return $this->apiResponse(null, self::STATUS_NOT_FOUND, 'Not Found');
        }
        Task::where('id', $id)->delete();
        return $this->apiResponse(null, self::STATUS_OK, 'delete Task successfully');
    }
}
