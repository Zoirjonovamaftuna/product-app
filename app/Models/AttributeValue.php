<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class AttributeValue
 * @package App\Models
 * @property int $id
 * @property string $name
 * @property int $attribute_id
 * @property Attribute $attribute
 */
class AttributeValue extends Model
{
    use HasFactory;

    public $table = "attribute_values";

    public $fillable = [
        'name'
    ];

    public function attribute(): BelongsTo
    {
        return $this->belongsTo(Attribute::class);
    }
}
