<?php

declare(strict_types = 1);

namespace Easy\Commerce\Http\Controllers\Catalog\Category\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Easy\Commerce\Models\Catalog\Category;

class TreeController extends Controller
{

    public function index() : Object
    {
        $new = [];
        $tree = [];
        $Categories = Category::orderBy('sort_order', 'ASC')->select('id', 'title', 'parent_id')->get()->toArray();
        if (sizeof($Categories) > 0) {
            foreach ($Categories as $Category){
                $Category['children'] = [];
                $new[$Category['parent_id']][] = $Category;
            }
            $tree = $this->createTree($new, $new[0]);
        }
        return response()->json($tree);
    }

    private function createTree(Array &$Categories, Array $parents) : Array
    {
        $tree = [];
        foreach ($parents as $parent){
            if( isset( $Categories[ $parent[ 'id' ] ] ) )
            {
                $parent['children'] = $this->createTree($Categories, $Categories[$parent['id']]);
            }
            $tree[] = $parent;
        }
        return $tree;
    }
}
