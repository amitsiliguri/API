<?php

declare(strict_types = 1);

namespace Easy\Commerce\Http\Controllers\Catalog\Category\Admin;
use App\Http\Controllers\Controller;
use Easy\Commerce\Models\Catalog\Category;

class GetController extends Controller
{
    public function get(int $id) : Object
    {
        $catalogCategory = Category::findOrFail($id);
        return response()->json($catalogCategory);
    }
}
