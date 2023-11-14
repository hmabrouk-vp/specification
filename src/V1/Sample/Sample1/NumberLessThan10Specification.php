<?php

namespace App\V1\Sample\Sample1;

use App\V1\SpecificationInterface;

class NumberLessThan10Specification implements SpecificationInterface
{

    public function isSatisfiedBy($item)
    {
        return $item->number < 10;
    }

}