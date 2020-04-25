<?php

namespace Xofttion\Kernel\Structs;

use Traversable;
use ArrayIterator;

use Xofttion\Kernel\Contracts\IDataDictionary;

class DataDictionary implements IDataDictionary {
    
    // Atributos de la clase DataDictionary
    
    /**
     *
     * @var array 
     */
    protected $dictionary = array();
    
    // Métodos sobrescritos de la interfaz IDataDictionary

    public function isEmpty(): bool {
        return !($this->count() > 0);
    }

    public function count(): int {
        return count(array_keys($this->dictionary));
    }

    public function attach(string $key, $value): void {
        $this->dictionary[$key] = $value;
    }

    public function contains(string $key): bool {
        return array_key_exists($key, $this->dictionary);
    }

    public function getValue(string $key) {
        return !$this->contains($key) ? null : $this->dictionary[$key];
    }

    public function values(): array {
        return $this->dictionary;
    }

    public function detach(string $key): void {
        if ($this->contains($key)) {
            unset($this->dictionary[$key]); // Eliminando clave
        }
    }
    
    public function clear(): void {
        $this->dictionary = array();
    }

    public function getIterator(): Traversable {
        return new ArrayIterator($this->dictionary);
    }

    public function jsonSerialize() {
        return $this->dictionary;
    }
}