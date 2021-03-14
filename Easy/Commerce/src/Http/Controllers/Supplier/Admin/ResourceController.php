<?php

namespace Easy\Commerce\Http\Controllers\Supplier\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

use Easy\Commerce\Contracts\Supplier\SupplierRepositoryInterface;
use Easy\Commerce\Contracts\Supplier\SupplierAddressRepositoryInterface;
use Easy\Commerce\Contracts\Supplier\SupplierContactPersonRepositoryInterface;

use Easy\Commerce\Http\Requests\Supplier\Admin\Create as SupplierCreateRequest;
use Easy\Commerce\Http\Requests\Supplier\Admin\Update as SupplierUpdateRequest;

/**
 * Class ResourceController
 * @package Easy\Commerce\Http\Controllers\Supplier\Admin
 */
class ResourceController extends Controller
{
    /**
     * @var SupplierRepositoryInterface
     */
    protected $_supplierRepositoryInterface;
    /**
     * @var SupplierAddressRepositoryInterface
     */
    protected $_supplierAddressRepositoryInterface;
    /**
     * @var SupplierContactPersonRepositoryInterface
     */
    protected $_supplierContactPersonRepositoryInterface;

    /**
     * ResourceController constructor.
     * @param SupplierRepositoryInterface $supplierRepositoryInterface
     * @param SupplierAddressRepositoryInterface $supplierAddressRepositoryInterface
     * @param SupplierContactPersonRepositoryInterface $supplierContactPersonRepositoryInterface
     */
    public function __construct(
        SupplierRepositoryInterface $supplierRepositoryInterface,
        SupplierAddressRepositoryInterface $supplierAddressRepositoryInterface,
        SupplierContactPersonRepositoryInterface $supplierContactPersonRepositoryInterface
    ) {
        $this->_supplierRepositoryInterface = $supplierRepositoryInterface;
        $this->_supplierAddressRepositoryInterface = $supplierAddressRepositoryInterface;
        $this->_supplierContactPersonRepositoryInterface = $supplierContactPersonRepositoryInterface;
    }
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
        $list = $this->_supplierRepositoryInterface->all($itemsPerPage);
        return response()->json($list, 200);
    }

    /**
     * Get the data of the id.
     *
     * @param  $id
     * @return JsonResponse
     */
    public function edit($id): JsonResponse
    {
        $supplier = $this->_supplierRepositoryInterface->get($id);
        return response()->json($supplier, 200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  SupplierCreateRequest  $request
     * @return JsonResponse
     */
    public function store(SupplierCreateRequest $request): JsonResponse
    {
        $supplier = null;
        $supplierAddress = null;
        $supplierContactPerson = null;

        $inputs = $request->all();
        $supplier = $this->_supplierRepositoryInterface->store($inputs);
        
        if ($supplier->id) {
            $inputs['address']['supplier_id'] = $supplier->id;
            $inputs['contact_person']['supplier_id'] = $supplier->id;
            $supplierAddress = $this->_supplierAddressRepositoryInterface->store($inputs['address']);
            $supplierContactPerson = $this->_supplierContactPersonRepositoryInterface->store($inputs['contact_person']);
        }
        
        return response()->json([
            'success' => $supplier->id && $supplierAddress->id && $supplierContactPerson->id
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SupplierUpdateRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(SupplierUpdateRequest $request,int $id): JsonResponse
    {
        $supplier = null;
        $supplierAddress = null;
        $supplierContactPerson = null;

        $inputs = $request->all();
        $supplier = $this->_supplierRepositoryInterface->update($inputs, $id);

        if ($supplier->id) {
            $inputs['address']['supplier_id'] = $supplier->id;
            $inputs['contact_person']['supplier_id'] = $supplier->id;
            $supplierAddress = $this->_supplierAddressRepositoryInterface->update($inputs['address'], $inputs['address']['id']);
            $supplierContactPerson = $this->_supplierContactPersonRepositoryInterface->update($inputs['contact_person'], $inputs['contact_person']['id']);
        }

        return response()->json([
            'success' => $supplier->id && $supplierAddress->id && $supplierContactPerson->id
        ], 200);
    }
}
