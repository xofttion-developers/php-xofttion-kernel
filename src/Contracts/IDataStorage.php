<?php

namespace Xofttion\Kernel\Contracts;

interface IDataStorage {
    
    // Métodos de la interfaz IDataStorage
    
    /**
     * 
     * @return bool
     */
    public function isEmpty(): bool;
    
    /**
     * @return int
     */
    public function count();

    /**
     * 
     * @param object $object
     * @param object $data
     * @return void
     */
    public function attach($object, $data = null); 
    
    /**
     * 
     * @param object $object
     * @return bool
     */
    public function contains($object);
    
    /**
     * 
     * @param object $object
     * @return object
     */
    public function getValue($object);
    
    /**
     * 
     * @param object $object
     * @return string
     */
    public function getHash($object);
    
    /**
     * 
     * @return array
     */
    public function values(): array;
    
    /**
     * 
     * @param object $object
     * @return void
     */
    public function detach($object);
    
    /**
     * 
     * @return void
     */
    public function clear();
}