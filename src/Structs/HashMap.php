<?php

namespace Xofttion\Kernel\Structs;

use Traversable;
use ArrayIterator;
use Xofttion\Kernel\Contracts\IHashMap;

class HashMap implements IHashMap
{
    // Atributos de la interfaz HashMap

    private array $data;

    // Constructor de la interfaz HashMap

    public function __construct()
    {
        $this->data = [];
    }

    // Métodos sobrescritos de la interfaz IHashMap

    public function isEmpty(): bool
    {
        return $this->count() == 0;
    }

    public function count(): int
    {
        return count(array_keys($this->data));
    }

    public function attach(string $key, $value): void
    {
        $this->data[$key] = $value;
    }

    public function contains(string $key): bool
    {
        return array_key_exists($key, $this->data);
    }

    public function getValue(string $key)
    {
        if (!$this->contains($key)) {
            return null;
        }

        return $this->data[$key];
    }

    public function values(): array
    {
        return $this->data;
    }

    public function detach(string $key): void
    {
        if ($this->contains($key)) {
            unset($this->data[$key]);
        }
    }

    public function clear(): void
    {
        $this->data = array();
    }

    public function toArray(): array
    {
        $array = [];

        foreach ($this->data as $value) {
            $array[] = $value;
        }

        return $array;
    }

    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->data);
    }

    public function jsonSerialize()
    {
        return $this->data;
    }
}
