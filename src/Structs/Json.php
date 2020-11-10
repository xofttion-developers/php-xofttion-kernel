<?php

namespace Xofttion\Kernel\Structs;

use Traversable;
use ArrayIterator;

use Xofttion\Kernel\Contracts\IJson;

class Json implements IJson {
    
    // Atributos de la clase Json
    
    /**
     *
     * @var array 
     */
    protected $json = array();
    
    // Métodos sobrescritos de la interfaz IJson

    public function isEmpty(): bool {
        return !($this->count() > 0);
    }

    public function count(): int {
        return count(array_keys($this->json));
    }

    public function attach(string $key, $value): void {
        $this->json[$key] = $value;
    }
    
    public function sum(string $key, float $value): void {
        if ($this->contains($key)) {
            $newValue = $this->getValue($key) + $value; // Calculando
            
            $this->attach($key, $newValue); // Nuevo valor
        } else {
            $this->attach($key, $value); // Asignando clave y valor
        }
    }

    public function contains(string $key): bool {
        return array_key_exists($key, $this->json);
    }

    public function getValue(string $key) {
        return !$this->contains($key) ? null : $this->json[$key];
    }

    public function values(): array {
        return $this->json;
    }

    public function detach(string $key): void {
        if ($this->contains($key)) {
            unset($this->json[$key]); // Eliminando clave
        }
    }
    
    public function clear(): void {
        $this->json = array();
    }
    
    public function toArray(): array {
        $array = []; // Array de valores del diccionario
        
        foreach ($this->json as $value) {
            array_push($array, $value); // Cargando
        }
        
        return $array; // Retornando valores del diccionario
    }

    public function getIterator(): Traversable {
        return new ArrayIterator($this->json);
    }

    public function jsonSerialize() {
        return $this->json;
    }
}