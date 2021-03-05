<?php

declare(strict_types = 1);

namespace Easy\Commerce\Http\Controllers\Catalog\Category\Admin;
use App\Http\Controllers\Controller;

use Easy\Commerce\Http\Requests\Catalog\Category\Admin\Create as CategoryCreateRequest;
use Easy\Commerce\Models\Catalog\Category;

class CreateController extends Controller
{
    public function store(CategoryCreateRequest $request) : Object
    {
        $catalogCategory = new Category();

        // mandetory fields
        $catalogCategory->status = $request['status'];
        $catalogCategory->title = $request['title'];
        $catalogCategory->slug = $request['slug'];
        // $catalogCategory->description = $request['description'];
        $catalogCategory->sort_order = Category::count() + 1;
        $catalogCategory->save();
        return response()->json([
            'data' => $catalogCategory
        ]);
    }
}
