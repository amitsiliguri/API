<?php

namespace Easy\Commerce\Models\Catalog\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 * @package Easy\Commerce\Models\Catalog\Product
 */
class Product extends Model
{
    use HasFactory;
    /**
    * The table associated with the model.
    *
    * @var string
    */
   protected $table = 'products';
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
        'sku',
        'title',
        'small_description',
        'description',
        'slug',
        'base_price',
        'meta_title',
        'meta_description',
        'meta_image'
    ];
    /**
     * @var int|bool
     */
    private $status;
    /**
     * @var string
     */
    private $sku;
    /**
     * @var string
     */
    private $title;
    /**
     * @var string
     */
    private $small_description;
    /**
     * @var string
     */
    private $description;
    /**
     * @var string
     */
    private $slug;
    /**
     * @var string
     */
    private $meta_title;
    /**
     * @var string
     */
    private $meta_description;
    /**
     * Get the prices for the product.
     */
    public function prices(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('Easy\Commerce\Models\Catalog\Product\Price', 'product_id', 'id');
    }

    /**
     * Get the images for the product.
     */
    public function images(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('Easy\Commerce\Models\Catalog\Product\Image', 'product_id', 'id');
    }

    /**
     * Get the inventories for the product.
     */
    // public function inventories()
    // {
    //     return $this->hasMany('App\Models\Catalog\Product\Inventory', 'product_id', 'id');
    // }

    /**
     * The categories that belong to the product.
     */
    public function categories(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany('Easy\Commerce\Models\Catalog\category','category_products', 'product_id', 'category_id');
    }

    /**
     * The sources that belong to the product.
     */
    // public function sources()
    // {
    //     return $this->belongsToMany('App\Models\Catalog\Inventory\Source','Inventory', 'product_id', 'source_id')->withPivot('quantity');
    // }
}
