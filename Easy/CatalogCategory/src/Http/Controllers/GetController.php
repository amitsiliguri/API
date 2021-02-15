<?php

declare(strict_types = 1);

namespace Easy\CatalogCategory\Http\Controllers;

use App\Http\Controllers\Controller;

use Easy\CatalogCategory\Http\Requests\CategoryCreate as CategoryCreateRequest;
use Easy\CatalogCategory\Models\Category;

class GetController extends Controller
{
    public function get(int $id) : Object
    {
        $catalogCategory = Category::findOrFail($id);
        return response()->json($catalogCategory);
    }
}
