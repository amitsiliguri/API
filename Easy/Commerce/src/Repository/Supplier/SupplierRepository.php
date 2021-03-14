<?php

namespace Easy\Commerce\Repository\Supplier;

use Easy\Commerce\Models\Supplier\Supplier;

use Easy\Commerce\Contracts\Supplier\SupplierRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SupplierRepository
 * @package Easy\Commerce\Repository\Supplier
 */
class SupplierRepository implements SupplierRepositoryInterface
{
    /**
     * @param int $itemsPerPage
     * @return mixed
     */
    public function all(int $itemsPerPage)
    {
        return Supplier::orderBy('id', 'desc')->simplePaginate($itemsPerPage);
    }

    /**
     * @param int $id
     * @return Builder|Builder[]|Collection|Model|mixed|null
     */
    public function get(int $id)
    {
        return Supplier::with([
                        "contactPerson" => function($q) {
                            $q->where('type', '=', 'Admin');
                        }
                    ])->with([
                        "address" => function($q) {
                            $q->where('type', '=', 'main');
                        }
                    ])->findOrFail($id);
    }

    /**
     * @param array $inputs
     * @return mixed|Object
     */
    public function store(array $inputs): object
    {
        $supplier = new Supplier();
        return $this->save($supplier, $inputs);        
    }

    /**
     * @param array $inputs
     * @param int $id
     * @return mixed|Object
     */
    public function update(array $inputs, int $id): object
    {
        $supplier = Supplier::findOrFail($id);
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
    protected function save(Object $model, array $inputs) : Object
    {
        $model->status           = $inputs['status']; 
        $model->legal_name       = $inputs['legal_name'];
        $model->email            = $inputs['email'];
        $model->phone            = $inputs['phone'];
        $model->register_number  = $inputs['register_number'];
        
        $model->save();
        
        return $model;
    }
}