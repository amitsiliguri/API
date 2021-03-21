<?php


namespace Easy\Commerce\Repository\Supplier;

use Easy\Commerce\Models\Catalog\Warehouse;

use Easy\Commerce\Contracts\Catalog\WarehouseRepositoryInterface;

/**
 * Class WarehouseRepository
 * @package Easy\Commerce\Repository\Supplier
 */
class WarehouseRepository implements WarehouseRepositoryInterface
{
    /**
     * @param int $itemsPerPage
     * @return mixed
     */
    public function all($itemsPerPage)
    {
        return Warehouse::orderBy('id', 'desc')->simplePaginate($itemsPerPage);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function get(int $id)
    {
        return Warehouse::findOrFail($id);
    }

    /**
     * @param array $inputs
     * @return mixed|object
     */
    public function store(array $inputs)
    {
        $warehouse = new Warehouse();
        return $this->save($warehouse, $inputs);        
    }

    /**
     * @param array $inputs
     * @param int $id
     * @return mixed|object
     */
    public function update(array $inputs, int $id)
    {
        $warehouse = Warehouse::findOrFail($id);
        return $this->save($warehouse, $inputs);
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
        if (array_key_exists("status",$inputs)) {
            $model->status = ($inputs['status']);
        }
        $model->title      = $inputs['title'];
        $model->save();
        
        return $model;
    }
}