<?php


namespace Easy\Commerce\Repository\Supplier;

use Easy\Commerce\Models\Supplier\SupplierAddress;

use Easy\Commerce\Contracts\Supplier\SupplierAddressRepositoryInterface;

/**
 * Class SupplierAddressRepository
 * @package Easy\Commerce\Repository\Supplier
 */
class SupplierAddressRepository implements SupplierAddressRepositoryInterface
{
    /**
     * @param int $itemsPerPage
     * @param int $supplierId
     * @return mixed
     */
    public function all($itemsPerPage, int $supplierId)
    {
        return SupplierAddress::orderBy('id', 'desc')->where('supplier_id', $supplierId)
                ->where('type','!=','main')
                ->simplePaginate($itemsPerPage);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function get(int $id)
    {
        return SupplierAddress::findOrFail($id);
    }

    /**
     * @param array $inputs
     * @return mixed|object
     */
    public function store(array $inputs)
    {
        $supplier = new SupplierAddress();
        return $this->save($supplier, $inputs);        
    }

    /**
     * @param array $inputs
     * @param int $id
     * @return mixed|object
     */
    public function update(array $inputs, int $id)
    {
        $supplier = SupplierAddress::findOrFail($id);
        return $this->save($supplier, $inputs);
    }

    /**
     * @param int $id
     * @return mixed|void
     */
    public function destroy(int $id)
    {
        # code...
    }


    /**
     * @param Object $model
     * @param array $inputs
     * @return object
     */
    protected function save(Object $model, array $inputs): object
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
        $model->type              = $inputs['type'];
        
        $model->save();
        
        return $model;
    }
}