<?php

namespace OOPHP\AbstractO;

class AbstractArrayO implements \IteratorAggregate, \ArrayAccess, \Serializable, \Countable
{
    protected $data = [];

    public function offsetExists($index)
    {
        return array_key_exists($index, $this->data);
    }

    public function offsetGet($index)
    {
        return $this->data[$index];
    }

    public function offsetSet($index, $value)
    {
        $this->data[$index] = $value;

        return $this;
    }

    public function offsetUnset($index)
    {
        unset($this->data[$index]);

        return $this;
    }

    public function serialize()
    {
        return serialize($this->data);
    }

    public function unserialize($array)
    {
        $this->update(unserialize($array), true);

        return $this;
    }

    public function getIterator()
    {
        return new \ArrayIterator($this->data);
    }

    public function count()
    {
        return count($this->data);
    }

    public function __get($index)
    {
        return $this->offsetGet($index);
    }

    public function __set($index, $value)
    {
        $this->offsetSet($index, $value);
    }

    public function __isset($index)
    {
        return $this->offsetExists($index);
    }

    public function __unset($index)
    {
        return $this->offsetUnset($index);
    }

    public function get($index, $default = null)
    {
        return $this->data[$index] ?? $default;
    }

    public function set($index, $value)
    {
        return $this->offsetSet($index, $value);
    }

    public function isset($index)
    {
        return $this->offsetExists($index);
    }

    public function unset($index)
    {
        return $this->offsetUnset($index);
    }

    public function append($value)
    {
        $this->data[] = $value;

        return $this;
    }

    public function update(array $array, $clear = false)
    {
        if ($clear) {
            $this->data = [];
        }

        foreach ($array as $key => $value) {
            $this->data[$key] = $value;
        }

        return $this;
    }

    public function getArrayCopy()
    {
        return clone $this;
    }
}
