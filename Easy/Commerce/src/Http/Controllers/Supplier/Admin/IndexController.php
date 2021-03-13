<?php

namespace Easy\Commerce\Http\Controllers\Supplier\Admin;

use Illuminate\Http\Request;
use Easy\Commerce\Models\Supplier\Supplier;
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
        $list = Supplier::orderBy('id', 'desc')->paginate($itemsPerPage);
        return response()->json($list, 200);
    }
}
