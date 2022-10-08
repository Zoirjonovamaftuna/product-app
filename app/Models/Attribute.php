<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Attribute
 * @package App\Models
 * @property int $id
 * @property string $name
 * @property AttributeValue $attributeValues
 * @property ProductAttribute $productAttributes
 * @property Product $products
 */
class Attribute extends Model
{
    use HasFactory;

    public $table = "attributes";

    public $fillable = [
        'name'
    ];

    public function attributeValues(): HasMany
    {
        return $this->hasMany(AttributeValue::class);
    }

    public function productAttributes(): HasMany
    {
        return $this->hasMany(ProductAttribute::class);
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'product_attributes');
    }
}
