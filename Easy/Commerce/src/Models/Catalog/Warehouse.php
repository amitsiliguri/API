<?php

namespace Easy\Commerce\Models\Catalog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'warehouses';

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
        'status',
        'title',
    ];

    /**
     * Get the prices for the product.
     */
    public function inventories(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('Easy\Commerce\Models\Catalog\Inventory', 'warehouse_id', 'id');
    }

    /**
     * The Purchase Items that belong to the warehouse.
     */
    public function purchaseItems(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany('Easy\Commerce\Models\Supplier\Purchase\PurchaseItems','inventories', 'warehouse_id', 'purchase_item_id')->withPivot('purchase_quantity','available_quantity','expiry_date');
    }

    /**
     * The Products that belong to the warehouse.
     */
    public function products(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany('Easy\Commerce\Models\Catalog\Product\Product', 'inventories', 'warehouse_id', 'product_id')->withPivot('purchase_quantity','available_quantity','expiry_date');
    }

}
