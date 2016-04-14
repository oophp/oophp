<?php

namespace OOPHP;

class ScalarO implements Object
{
    protected $date;

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->date;
    }

    protected function __toString()
    {
        return (string)$this->date;
    }
}
