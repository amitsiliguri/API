<?php


namespace Easy\Commerce\Http\Controllers\Supplier\Admin;

use Easy\Commerce\Http\Requests\Supplier\Admin\Update as SupplierUpdateRequest;
use Easy\Commerce\Models\Supplier\Supplier;
use Easy\Commerce\Models\Supplier\SupplierAddress;
use Easy\Commerce\Models\Supplier\SupplierContactPerson;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class UpdateController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  SupplierUpdateRequest  $request
     * @return JsonResponse
     */
    public function update(SupplierUpdateRequest $request,int $id): JsonResponse
    {
        $supplier = Supplier::findOrFail($id);

        $supplier->status           = $request['status']; 
        $supplier->legal_name       = $request['legal_name'];
        $supplier->email            = $request['email'];
        $supplier->phone            = $request['phone'];
        $supplier->register_number  = $request['register_number'];

        $supplierAddress                    = SupplierAddress::findOrFail($request['address.id']);
        $supplierAddress->building_name     = $request['address.building_name'];
        $supplierAddress->floor             = $request['address.floor'];
        $supplierAddress->street            = $request['address.street'];
        $supplierAddress->landmark          = $request['address.landmark'];
        $supplierAddress->city              = $request['address.city'];
        $supplierAddress->state             = $request['address.state'];
        $supplierAddress->country           = $request['address.country'];
        $supplierAddress->zip               = $request['address.zip'];
        $supplierAddress->phone             = $request['address.phone'];

        $supplierContactPerson                  = SupplierContactPerson::findOrFail($request['contact_person.id']);
        $supplierContactPerson->job_title       = $request['contact_person.job_title'];
        $supplierContactPerson->prefix          = $request['contact_person.prefix'];
        $supplierContactPerson->first_name      = $request['contact_person.first_name'];
        $supplierContactPerson->middle_name     = $request['contact_person.middle_name'];
        $supplierContactPerson->last_name       = $request['contact_person.last_name'];
        $supplierContactPerson->email           = $request['contact_person.email'];
        $supplierContactPerson->phone           = $request['contact_person.phone'];
        $supplierContactPerson->gender          = $request['contact_person.gender'];
        
        $supplier->save();
        $supplier->address()->save($supplierAddress);
        $supplier->contactPerson()->save($supplierContactPerson);

        return response()->json([
            'success' => true
        ], 200);
    }
}