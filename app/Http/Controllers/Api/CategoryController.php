<?php

namespace App\Http\Controllers\Api;


use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Routing\Controller;
use App\Traits\RestfulTrait;


class CategoryController extends Controller
{
    use RestfulTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::get();
        return $this->apiResponse(['category' => CategoryResource::collection($category)], self::STATUS_OK, 'get Category successfully');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {

        $data = $request->all();

        $data['user_id'] = auth()->id();

        $category = Category::create(
            $data
        );



        return $this->apiResponse(['category' => $category], self::STATUS_CREATED, 'add Category successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::with('tasks', 'user')->where('id', $id)->first();
        if (!$category) {
            return $this->apiResponse(null, self::STATUS_NOT_FOUND, 'Not Found');
        }
        return $this->apiResponse(['category' =>  new CategoryResource($category)], self::STATUS_OK, 'get Category successfully');
    }


    /**
     * Update the specified resource in storage.
     */

    public function update(CategoryRequest $request, string $id)
    {

        $category = Category::where('id', $id)->first();
        if (!$category) {
            return $this->apiResponse(null, self::STATUS_NOT_FOUND, 'Not Found');
        }

        $category->update(
            $request->all()
        );

        return $this->apiResponse(['category' => $category], self::STATUS_CREATED, 'update Category successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::where('id', $id)->first();
        if (!$category) {
            return $this->apiResponse(null, self::STATUS_NOT_FOUND, 'Not Found');
        }
        Category::where('id', $id)->delete();
        return $this->apiResponse(null, self::STATUS_OK, 'delete Category successfully');
    }
}
