<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class ProductAttribute
 * @package App\Models
 * @property int $id
 * @property int $product_id
 * @property int $attribute_id
 * @property int $attribute_value_id
 * @property Product $product
 * @property Attribute $attribute
 * @property AttributeValue $attributeValue
 */
class ProductAttribute extends Model
{
    use HasFactory;

    public $table = "product_attributes";

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function attribute(): BelongsTo
    {
        return $this->belongsTo(Attribute::class);
    }

    public function attributeValue(): BelongsTo
    {
        return $this->belongsTo(AttributeValue::class);
    }
}
