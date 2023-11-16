<?php

namespace App\V1\Sample\BusinessLogic;

use App\V1\Sample\Sample1\Number;
use App\V1\SpecificationInterface;

class MultipleOfSpecification implements SpecificationInterface
{
    /**  @var Number */
    private $number;

    public function __construct(Number $number)
    {
        $this->number = $number;
    }

    public function isSatisfiedBy($item)
    {
        return $item->number % $this->number->number == 0;
    }
}