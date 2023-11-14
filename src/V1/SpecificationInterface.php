<?php

namespace App\V1;

interface SpecificationInterface
{
    public function isSatisfiedBy($item);
}