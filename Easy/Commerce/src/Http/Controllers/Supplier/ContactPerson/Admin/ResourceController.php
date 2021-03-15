<?php

namespace Easy\Commerce\Http\Controllers\Supplier\ContactPerson\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

use Easy\Commerce\Contracts\Supplier\SupplierContactPersonRepositoryInterface;
use Easy\Commerce\Http\Requests\Supplier\ContactPerson\AdminForm as SupplierContactPersonAdminFormRequest;

class ResourceController extends Controller
{
    /**
     * @var SupplierAddressRepositoryInterface
     */
    protected $supplierAddressRepositoryInterface;

    /**
     * ResourceController constructor.
     * @param SupplierContactPersonRepositoryInterface $supplierContactPersonRepositoryInterface
     */
    public function __construct(SupplierContactPersonRepositoryInterface $supplierContactPersonRepositoryInterface) {
        $this->_supplierContactPersonRepositoryInterface = $supplierContactPersonRepositoryInterface;
    }

    /**
     * Display a listing of the resource.
     * @param  $request
     * @return JsonResponse
     */
    public function index(Request $request, $supplierId) : JsonResponse
    {
        $inputs = $request->all();
        $itemsPerPage = (array_key_exists("itemsPerPage",$inputs)) ? $inputs['itemsPerPage'] : 10 ;
        $list = $this->_supplierContactPersonRepositoryInterface->all($itemsPerPage, $supplierId);
        return response()->json($list, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  SupplierContactPersonAdminFormRequest  $request
     * @return JsonResponse
     */
    public function store(SupplierContactPersonAdminFormRequest $request)
    {
        $inputs = $request->all();
        $inputs['type'] = 'Employee';
        $supplierAddress = $this->_supplierContactPersonRepositoryInterface->store($inputs);
        return response()->json($supplierAddress, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  SupplierContactPersonAdminFormRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(SupplierContactPersonAdminFormRequest $request, $id)
    {
        $inputs = $request->all();
        $inputs['type'] = 'Employee';
        $supplierAddress = $this->_supplierContactPersonRepositoryInterface->update($inputs, $id);
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
