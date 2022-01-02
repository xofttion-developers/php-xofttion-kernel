<?php

namespace Xofttion\Kernel\Structs;

class Node
{
    // Atributos de la clase Node

    private $element;

    private Node $next;

    private Node $previous;

    // Constructor de la clase Node

    public function __construct($element)
    {
        $this->element = $element;
    }

    // Métodos de la clase Node

    public function getElement()
    {
        return $this->element;
    }

    public function setNext(Node $nodeNext): void
    {
        $this->next = $nodeNext;
    }

    public function getNext(): ?Node
    {
        return $this->next;
    }

    public function setPrevious(Node $nodePrevious): void
    {
        $this->previous = $nodePrevious;
    }

    public function getPrevious(): ?Node
    {
        return $this->previous;
    }
}
