<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Product
 * @package App\Models
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $product_type_id
 * @property ProductType $productType
 * @property ProductAttribute $productAttributes
 * @property Attribute $attributes
 */
class Product extends Model
{
    use HasFactory;

    public $table = "products";

    public $fillable = [
        'name', 'description'
    ];

    public function productType(): BelongsTo
    {
        return $this->belongsTo(ProductType::class);
    }

    public function productAttributes(): HasMany
    {
        return $this->hasMany(ProductAttribute::class);
    }

    public function attributes(): BelongsToMany
    {
        return $this->belongsToMany(Attribute::class, 'product_attributes')->withPivot('attribute_value_id');
    }
}
