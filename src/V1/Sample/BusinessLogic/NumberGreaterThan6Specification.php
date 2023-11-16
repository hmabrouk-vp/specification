<?php

namespace App\V1\Sample\BusinessLogic;

use App\V1\SpecificationInterface;

class NumberGreaterThan6Specification implements SpecificationInterface
{


    public function isSatisfiedBy($item)
    {
        return  (int) $item->number > 6;
    }

}