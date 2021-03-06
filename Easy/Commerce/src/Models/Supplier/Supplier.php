<?php

namespace Easy\Commerce\Models\Supplier;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'suppliers';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'legal_name',
        'status',
        'email',
        'phone',
        'register_number'
    ];
    /**
     * Get the prices for the product.
     */
    public function purchases(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('Easy\Commerce\Models\Supplier\Purchase\Purchase', 'supplier_id', 'id');
    }

    /**
     * Get the prices for the product.
     */
    public function address(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('Easy\Commerce\Models\Supplier\SupplierAddress', 'supplier_id', 'id');
    }

    /**
     * Get the prices for the product.
     */
    public function contactPerson(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('Easy\Commerce\Models\Supplier\SupplierContactPerson', 'supplier_id', 'id');
    }
}
