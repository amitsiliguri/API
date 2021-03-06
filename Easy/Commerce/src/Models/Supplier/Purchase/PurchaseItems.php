<?php

namespace Easy\Commerce\Models\Supplier\Purchase;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseItems extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'purchase_items';

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
        'sku',
        'title',
        'purchase_cost_per_unit',
        'quantity',
    ];

    /**
     * Get the purchase number of this purchase item.
     */
    public function purchase(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('Easy\Commerce\Models\Supplier\Purchase\Purchase', 'purchase_id', 'id');
    }

    /**
     * Get the product of this purchase item.
     */
    public function product(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('Easy\Commerce\Models\Catalog\Product\Product', 'product_id', 'id');
    }

    /**
     * The Purchase Items that belong to the warehouse.
     */
    public function warehouses(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany('Easy\Commerce\Models\Catalog\Warehouse','inventories',  'purchase_item_id', 'warehouse_id')->withPivot('purchase_quantity','available_quantity','expiry_date');
    }
}
