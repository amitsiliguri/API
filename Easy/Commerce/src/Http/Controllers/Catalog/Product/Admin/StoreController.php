<?php


namespace Easy\Commerce\Http\Controllers\Catalog\Product\Admin;

use Easy\Commerce\Http\Requests\Catalog\Product\Admin\Create as ProductCreateRequest;
use Easy\Commerce\Models\Catalog\Product\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class StoreController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  ProductCreateRequest  $request
     * @return JsonResponse
     */
    public function store(ProductCreateRequest $request): JsonResponse
    {
        $catalogProduct = new Product();

        $catalogProduct->status = $request['status'];
        $catalogProduct->sku = $request['sku'];
        $catalogProduct->title = $request['title'];
        $catalogProduct->small_description = $request['small_description'];
        $catalogProduct->description = $request['description'];
        $catalogProduct->slug = $request['slug'];
        $catalogProduct->meta_title = $request['meta_title'];
        $catalogProduct->meta_description = $request['meta_description'];
        $catalogProduct->save();
        $catalogProduct->categories()->sync($request['categories']);
        return response()->json([
            'success' => true
        ], 200);
    }
}