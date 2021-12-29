<?php

namespace Xofttion\Kernel\Structs;

use SplObjectStorage;
use Xofttion\Kernel\Contracts\IDataStorage;

class DataStorage extends SplObjectStorage implements IDataStorage
{
    // Métodos de la clase DataStorage

    public function isEmpty(): bool
    {
        return $this->count() == 0;
    }

    public function getValue($object)
    {
        return $this[$object];
    }

    public function values(): array
    {
        $values = [];

        foreach ($this as $key) {
            $values[] = $this->getValue($key);
        }

        return $values;
    }

    public function clear()
    {
        $this->removeAll($this);
    }
}
