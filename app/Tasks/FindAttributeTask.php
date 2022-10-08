<?php

namespace App\Tasks;

use App\Models\Attribute;
use Exception;

class FindAttributeTask
{
    /**
     * @throws Exception
     */
    public function execute(int $attribute_id): Attribute
    {
        /** @var Attribute $attribute */
        $attribute = Attribute::query()->find($attribute_id);
        if (!$attribute) {
            throw new Exception('Attribute not found', 404);
        }
        return $attribute;
    }

}
