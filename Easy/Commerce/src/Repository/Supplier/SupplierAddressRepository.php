<?php


namespace Easy\Commerce\Repository\Supplier;

use Easy\Commerce\Models\Supplier\SupplierAddress;

use Easy\Commerce\Contracts\Supplier\SupplierAddressRepositoryInterface;

class SupplierAddressRepository implements SupplierAddressRepositoryInterface
{
    public function all($itemsPerPage, int $supplierId)
    {
        return SupplierAddress::orderBy('id', 'desc')->paginate($itemsPerPage);
    }

    public function get(int $id)
    {
        return SupplierAddress::findOrFail($id);
    }

    public function store(array $inputs)
    {
        $supplier = new SupplierAddress();
        return $this->save($supplier, $inputs);        
    }

    public function update(array $inputs, int $id)
    {
        $supplier = SupplierAddress::findOrFail($id);
        return $this->save($supplier, $inputs);
    }

    public function destroy(int $id)
    {
        # code...
    }


    protected function save(Object $model,  array $inputs): object
    {
        $model->building_name     = $inputs['building_name'];
        $model->floor             = $inputs['floor'];
        $model->street            = $inputs['street'];
        $model->landmark          = $inputs['landmark'];
        $model->city              = $inputs['city'];
        $model->state             = $inputs['state'];
        $model->country           = $inputs['country'];
        $model->zip               = $inputs['zip'];
        $model->phone             = $inputs['phone'];
        $model->supplier_id       = $inputs['supplier_id'];
        $model->save();
        
        return $model;
    }
}