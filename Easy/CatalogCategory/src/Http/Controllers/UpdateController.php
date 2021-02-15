<?php

declare(strict_types = 1);

namespace Easy\CatalogCategory\Http\Controllers;

// use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Easy\CatalogCategory\Http\Requests\CategoryUpdate as CategoryUpdateRequest;
use Easy\CatalogCategory\Models\Category;

class UpdateController extends Controller
{
    public function update(CategoryUpdateRequest $request,int $id) : Object
    {
        $catalogCategory = Category::findOrFail($id);
        // mandetory fields
        $catalogCategory->status = $request['status'];
        $catalogCategory->title = $request['title'];
        $catalogCategory->slug = $request['slug'];
        // $catalogCategory->description = $request['description'];
        // $catalogCategory->sort_order = Category::count() + 1;
        $catalogCategory->save();
        return response()->json($catalogCategory);
    }
}
