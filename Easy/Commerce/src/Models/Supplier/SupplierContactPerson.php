<?php

namespace Easy\Commerce\Models\Supplier;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierContactPerson extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'supplier_contact_people';
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
        'active',
        'type',
        'job_title',
        'prefix',
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'phone',
        'gender',
        'supplier_id'
    ];

    /**
     * Get the Manufacture company of this contact person.
     */
    public function supplier(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('Easy\Commerce\Models\Supplier\Supplier', 'supplier_id', 'id');
    }
}
