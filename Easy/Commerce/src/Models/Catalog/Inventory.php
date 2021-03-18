<?php

namespace Easy\Commerce\Models\Catalog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'inventories';

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
        'purchase_quantity',
        'available_quantity',
        'expiry_date',
        'product_id',
        'warehouse_id',
        'purchase_item_id'
    ];

    /**
     * Get the purchase number of this purchase item.
     */
    public function purchaseItems(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('Easy\Commerce\Models\Supplier\Purchase\PurchaseItems', 'purchase_item_id', 'id');
    }

    /**
     * Get the product of this purchase item.
     */
    public function product(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('Easy\Commerce\Models\Catalog\Product\Product', 'product_id', 'id');
    }

    /**
     * Get the product of this purchase item.
     */
    public function warehouse(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('Easy\Commerce\Models\Catalog\Warehouse\Warehouse', 'warehouse_id', 'id');
    }
}
