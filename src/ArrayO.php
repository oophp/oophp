<?php

namespace OOPHP;

use OOPHP\AbstractO\AbstractArrayO;

class ArrayO extends AbstractArrayO implements Object
{
    protected $data = [];

    public function __construct(array $array = [])
    {
        $this->update($array);
    }

    public function getValue()
    {
        return $this;
    }

    public function __toString()
    {
        return (string)sprintf('%s (%s)', get_called_class(), json_encode($this->data));
    }
}
