<?php

namespace Easy\Commerce\Http\Controllers\Catalog\Category\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Easy\Commerce\Models\Catalog\Category;

class TreeReOrderController extends Controller
{
    public function reorder(Request $request): \Illuminate\Http\JsonResponse
    {
      $this->saveReorder($request->all());
      return response()->json([
          'success' => true
      ]);
    }

    private function saveReorder($tree, $parentId = 0)
    {
      foreach ($tree as $key => $item) {
        $foundCategory = Category::find($item['id']);
        $foundCategory->parent_id = $parentId;
        $foundCategory->sort_order = $key;
        $foundCategory->save();
        if (sizeof($item['children']) > 0 ) {
          $this->saveReorder($item['children'], $item['id']);
        }
      }
    }
}