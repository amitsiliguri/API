<?php

namespace Easy\Commerce\Contracts\Supplier;

/**
 * Interface SupplierAddressRepositoryInterface
 * @package Easy\Commerce\Contracts\Supplier
 */
interface SupplierAddressRepositoryInterface
{
    /**
     * @param int $itemsPerPage
     * @param int $supplierId
     * @return mixed
     */
    public function all(int $itemsPerPage, int $supplierId);

    /**
     * @param int $id
     * @return mixed
     */
    public function get(int $id);

    /**
     * @param array $inputs
     * @return mixed
     */
    public function store(array $inputs);

    /**
     * @param array $inputs
     * @param int $id
     * @return mixed
     */
    public function update(array $inputs, int $id);

    /**
     * @param int $id
     * @return mixed
     */
    public function destroy(int $id);
}