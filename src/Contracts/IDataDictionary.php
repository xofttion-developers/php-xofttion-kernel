<?php

namespace Xofttion\Kernel\Contracts;

use IteratorAggregate;
use Countable;
use JsonSerializable;

interface IDataDictionary extends IteratorAggregate, Countable, JsonSerializable {
    
    // Métodos de la interfaz IDataDictionary
    
    /**
     * 
     * @return bool
     */
    public function isEmpty(): bool;
    
    /**
     * 
     * @param string $key
     * @param object $value
     * @return void
     */
    public function attach(string $key, $value): void;
    
    /**
     * 
     * @param string $key
     * @return bool
     */
    public function contains(string $key): bool;
    
    /**
     * 
     * @param string $key
     * @return object
     */
    public function getValue(string $key);
    
    /**
     * 
     * @return array
     */
    public function values(): array;
    
    /**
     * 
     * @param string $key
     * @return void
     */
    public function detach(string $key): void;
    
    /**
     * 
     * @return void
     */
    public function clear(): void;
}