<?php

namespace Easy\Commerce\Http\Controllers\Catalog\Product\Admin;

use Illuminate\Http\Request;
use Easy\Commerce\Models\Catalog\Product\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $inputs = $request->all();
        $itemsPerPage = (array_key_exists("itemsPerPage",$inputs)) ? $inputs['itemsPerPage'] : 10 ;
        $list = Product::orderBy('id', 'desc')->paginate($itemsPerPage);
        return response()->json($list, 200);
//        return Product::with(
//            [
//                "prices" => function($q) {
//                    $q->where('quantity', '=', 1);
//                }
//            ])
//            ->with('inventories')
//            ->with(
//                [
//                    "images" => function($q) {
//                        $q->where('type', '=', 0);
//                    }
//                ])
//            ->orderBy('id', 'desc')
//            ->paginate($itemsPerPage);


    }
}
