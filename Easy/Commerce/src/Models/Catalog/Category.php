<?php

namespace Easy\Commerce\Models\Catalog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    /**
    * The table associated with the model.
    *
    * @var string
    */
   protected $table = 'categories';
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
        'slug',
        'description',
        'banner',
        'meta_title',
        'meta_description',
        'meta_image',
        'parent_id',
        'sort_order'
    ];
    /**
     * @var int|bool
     */
    private $status;
    /**
     * @var string
     */
    private $title;
    /**
     * @var string
     */
    private $slug;
    /**
     * @var int|mixed
     */
    private $sort_order;
    /**
     * The products that belong to the category.
     */
     public function products(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
     {
         return $this->belongsToMany('Easy\Commerce\Models\Product\Product','category_products', 'category_id', 'product_id');
     }
}
