<?php

namespace Easy\Commerce\Models\Supplier\Purchase;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'purchases';
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
        'increment_id',
        'sub_total',
        'tax',
        'shipping_cost',
    ];
    /**
     * Get the prices for the product.
     */
    public function purchaseItems(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('Easy\Commerce\Models\Supplier\Purchase\PurchaseItems', 'purchase_id', 'id');
    }
    /**
     * Get the Supplier of this purchase.
     */
    public function supplier(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('Easy\Commerce\Models\Supplier\Supplier', 'supplier_id', 'id');
    }
    /**
     * Get the Supplier Address of this purchase.
     */
    public function supplierAddress(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('Easy\Commerce\Models\Supplier\SupplierAddress', 'supplier_shipping_addresses_id', 'id');
    }
    /**
     * Get the Supplier Address of this purchase.
     */
    public function supplierContactPerson(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('Easy\Commerce\Models\Supplier\SupplierContactPerson', 'supplier_contact_people_id', 'id');
    }
}
