<?php

namespace App\V1\Core;

use App\V1\Sample\Sample1\Number;
use App\V1\SpecificationInterface;

class CallableSpecification implements SpecificationInterface
{
    const CALLABLE = 'callable';
    const ARGS = 'args';
    public function isSatisfiedBy($item)
    {
        $itemEligible = is_array($item) &&
            array_key_exists(self::CALLABLE, $item) &&
            array_key_exists(self::ARGS, $item);
        if ($itemEligible) {
            return call_user_func($item[self::CALLABLE], $item[self::ARGS]);
        }
        return false;
    }
}