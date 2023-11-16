<?php


namespace App\V1\Core;

use App\V1\SpecificationInterface;

class OrSpecification implements SpecificationInterface
{
    /** @var SpecificationInterface[] */
    private $specifications;

    /***/
    public function __construct(array $specifications = [])
    {
        $this->specifications = $specifications;
    }

    public function isSatisfiedBy($item)
    {
        foreach ($this->specifications as $specification) {
            if($specification->isSatisfiedBy($item))  {
                return true;
            }
        }
        return false;
    }
}