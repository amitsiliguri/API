<?php

namespace Easy\Commerce\Contracts\Supplier;

/**
 * Interface SupplierRepositoryInterface
 * @package Easy\Commerce\Contracts\Supplier
 */
interface SupplierRepositoryInterface
{
    /**
     * @param int $itemsPerPage
     * @return mixed
     */
    public function all(int $itemsPerPage);

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