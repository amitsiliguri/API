<?php

declare(strict_types = 1);

namespace Easy\CatalogCategory\Http\Controllers;

// use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Easy\CatalogCategory\Http\Requests\CategoryCreate as CategoryCreateRequest;
use Easy\CatalogCategory\Models\Category;

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
