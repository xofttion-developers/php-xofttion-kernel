<?php

namespace Xofttion\Kernel\Structs;

class Stack {
    
    // Atributos de la clase Stack
    
    /**
     *
     * @var Node
     */
    private $first;
    
    /**
     *
     * @var Node 
     */
    private $last;
    
    /**
     *
     * @var int
     */
    private $size = 0;
    
    // Métodos de la clase Stack
    
    /**
     * 
     * @param object $element
     * @return void
     */
    public function push($element): void {
        $newNode = new Node($element); // Nuevo nodo
        
        if (is_defined($this->last)) {
            $newNode->setPrevious($this->last);
        } else {
            $this->first = $newNode; // Primer nodo
        }
        
        $this->last = $newNode; // Nuevo último nodo
        
        $this->size++; // Aumentando tamaño de la pila
    }
    
    /**
     * 
     * @return bool
     */
    public function isEmpty(): bool {
        return ($this->size == 0);
    }
    
    /**
     * 
     * @return int
     */
    public function size(): int {
        return $this->size;
    }
    
    /**
     * 
     * @return object
     */
    public function pop() {
        if (is_defined($this->last)) {
            $element    = $this->last->getElement();
            
            $this->last = $this->last->getPrevious();
            
            $this->size--; // Descontando
            
            return $element; // Retornando elemento
        }
        
        return null; // La pila no tiene elementos
    }

    /**
     * 
     * @return object
     */
    public function first() {
        return is_null($this->first) ? null : $this->first->getElement();
    }

    /**
     * 
     * @return object
     */
    public function last() {
        return is_null($this->last) ? null : $this->last->getElement();
    }
}