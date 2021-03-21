<?php

namespace Easy\Commerce\Http\Controllers\Catalog\Warehouse\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

use Easy\Commerce\Contracts\Catalog\WarehouseRepositoryInterface;
use Easy\Commerce\Http\Requests\Catalog\Warehouse\AdminForm as CatalogWarehouseAdminFormRequist;

class ResourceController extends Controller
{
    /**
     * @var _warehouseRepositoryInterface
     */
    protected $_warehouseRepositoryInterface;

    /**
     * ResourceController constructor.
     * @param WarehouseRepositoryInterface $warehouseRepositoryInterface
     */
    public function __construct(WarehouseRepositoryInterface $warehouseRepositoryInterface) {
        $this->_warehouseRepositoryInterface = $warehouseRepositoryInterface;
    }

    /**
     * Display a listing of the resource.
     * @param  $request
     * @return JsonResponse
     */
    public function index(Request $request) : JsonResponse
    {
        $inputs = $request->all();
        $itemsPerPage = (array_key_exists("itemsPerPage",$inputs)) ? $inputs['itemsPerPage'] : 10 ;
        $list = $this->_warehouseRepositoryInterface->all($itemsPerPage);
        return response()->json($list, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CatalogWarehouseAdminFormRequist  $request
     * @return JsonResponse
     */
    public function store(CatalogWarehouseAdminFormRequist $request)
    {
        $inputs = $request->all();
        $supplierAddress = $this->_warehouseRepositoryInterface->store($inputs);
        return response()->json($supplierAddress, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  SupplierAddressUpdateRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(SupplierAddressUpdateRequest $request, $id)
    {
        $inputs = $request->all();
        $supplierAddress = $this->_warehouseRepositoryInterface->update($inputs, $id);
        return response()->json($supplierAddress, 200);
    }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     //
    // }
}
