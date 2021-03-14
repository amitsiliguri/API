<?php

namespace Easy\Commerce\Models\Supplier;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierAddress extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'supplier_addresses';
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
        'building_name',
        'floor',
        'street',
        'landmark',
        'city',
        'state',
        'country',
        'zip',
        'phone',
        'supplier_id'
    ];

    /**
     * Get the Manufacture company of this address.
     */
    public function supplier(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('Easy\Commerce\Models\Supplier\Supplier', 'supplier_id', 'id');
    }
}
