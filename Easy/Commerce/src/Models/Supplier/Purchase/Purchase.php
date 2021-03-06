<?php

namespace Easy\Commerce\Models\Manufacturer\Purchase;

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
        'sub_total',
        'tax',
        'shipping_cost',
    ];
    /**
     * Get the prices for the product.
     */
    public function purchaseItems(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('Easy\Commerce\Models\Vendor\Purchase\PurchaseItems', 'purchase_id', 'id');
    }
    /**
     * Get the vendor of this purchase.
     */
    public function vendor(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('Easy\Commerce\Models\Vendor\Vendor', 'vendor_id', 'id');
    }
}
