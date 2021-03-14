<?php


namespace Easy\Commerce\Repository\Supplier;

use Easy\Commerce\Models\Supplier\SupplierContactPerson;

use Easy\Commerce\Contracts\Supplier\SupplierContactPersonRepositoryInterface;

/**
 * Class SupplierContactPersonRepository
 * @package Easy\Commerce\Repository\Supplier
 */
class SupplierContactPersonRepository implements SupplierContactPersonRepositoryInterface
{
    /**
     * @param int $itemsPerPage
     * @param int $supplierId
     * @return mixed
     */
    public function all(int $itemsPerPage, int $supplierId)
    {
        return SupplierContactPerson::orderBy('id', 'desc')
            ->where('supplier_id',$supplierId)
            ->where('type','!=','Admin')
            ->simplePaginate($itemsPerPage);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function get(int $id)
    {
        return SupplierContactPerson::findOrFail($id);
    }

    /**
     * @param array $inputs
     * @return mixed|Object
     */
    public function store(array $inputs): object
    {
        $supplier = new SupplierContactPerson();
        return $this->save($supplier, $inputs);        
    }

    /**
     * @param array $inputs
     * @param int $id
     * @return mixed|Object
     */
    public function update(array $inputs, int $id): object
    {
        $supplier = SupplierContactPerson::findOrFail($id);
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
     * @return Object
     */
    protected function save(Object $model, array $inputs): object
    {
        $model->job_title       = $inputs['job_title'];
        $model->prefix          = $inputs['prefix'];
        $model->first_name      = $inputs['first_name'];
        $model->middle_name     = $inputs['middle_name'];
        $model->last_name       = $inputs['last_name'];
        $model->email           = $inputs['email'];
        $model->phone           = $inputs['phone'];
        $model->gender          = $inputs['gender'];
        $model->supplier_id     = $inputs['supplier_id'];
        
        $model->save();
        
        return $model;
    }
}