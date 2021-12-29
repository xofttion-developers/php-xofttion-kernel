<?php

namespace Xofttion\Kernel\Structs;

use Traversable;
use ArrayIterator;
use Xofttion\Kernel\Contracts\IJson;

class Json implements IJson
{
    // Métodos de la clase Json

    public function isEmpty(): bool
    {
        return $this->count() == 0;
    }

    public function count(): int
    {
        return count(array_keys($this->json));
    }

    public function attach(string $key, $value): void
    {
        $this->json[$key] = $value;
    }

    public function sum(string $key, float $value): void
    {
        if ($this->contains($key)) {
            $newValue = $this->getValue($key) + $value;

            $this->attach($key, $newValue);
        } else {
            $this->attach($key, $value);
        }
    }

    public function contains(string $key): bool
    {
        return array_key_exists($key, $this->json);
    }

    public function getValue(string $key)
    {
        if (!$this->contains($key)) {
            return null;
        }

        return $this->json[$key];
    }

    public function values(): array
    {
        return $this->json;
    }

    public function detach(string $key): void
    {
        if ($this->contains($key)) {
            unset($this->json[$key]);
        }
    }

    public function clear(): void
    {
        $this->json = array();
    }

    public function toArray(): array
    {
        $array = [];

        foreach ($this->json as $value) {
            $array[] = $value;
        }

        return $array;
    }

    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->json);
    }

    public function jsonSerialize()
    {
        return $this->json;
    }
}
