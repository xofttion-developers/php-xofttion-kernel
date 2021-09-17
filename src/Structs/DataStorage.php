<?php

namespace Xofttion\Kernel\Structs;

use SplObjectStorage;
use Xofttion\Kernel\Contracts\IDataStorage;

class DataStorage extends SplObjectStorage implements IDataStorage
{

    // Métodos sobrescritos de la interfaz IDataStorage

    public function isEmpty(): bool
    {
        return !($this->count() > 0);
    }

    public function getValue($object)
    {
        return $this[$object];
    }

    public function values(): array
    {
        $values = []; // Array del almacén

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
