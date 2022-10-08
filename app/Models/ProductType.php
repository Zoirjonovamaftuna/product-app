<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class ProductType
 * @package App\Models
 * @property int $id
 * @property string $name
 * @property string $description
 * @property Product $products
 */
class ProductType extends Model
{
    use HasFactory;

    public $table = "product_types";

    public $fillable = [
        'name', 'description'
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
