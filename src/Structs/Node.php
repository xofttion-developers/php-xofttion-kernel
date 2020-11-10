<?php

namespace Xofttion\Kernel\Structs;

class Node {
    
    // Atributos de la clase Node
    
    /**
     *
     * @var object 
     */
    private $element;
    
    /**
     *
     * @var Node 
     */
    private $next;
    
    /**
     *
     * @var Node 
     */
    private $previous;
    
    // Constructor de la clase Node
    
    /**
     * 
     * @param object $element
     */
    public function __construct($element) {
        $this->element = $element;
    }
    
    // Métodos de la clase Node
    
    /**
     * 
     * @return object
     */
    public function getElement() {
        return $this->element;
    }

    /**
     * 
     * @param Node $nodeNext
     * @return void
     */
    public function setNext(Node $nodeNext): void {
        $this->next = $nodeNext;
    }
    
    /**
     * 
     * @return Node|null
     */
    public function getNext(): ?Node {
        return $this->next;
    }

    /**
     * 
     * @param Node $nodePrevious
     * @return void
     */
    public function setPrevious(Node $nodePrevious): void {
        $this->previous = $nodePrevious;
    }
    
    /**
     * 
     * @return Node|null
     */
    public function getPrevious(): ?Node {
        return $this->previous;
    }
}