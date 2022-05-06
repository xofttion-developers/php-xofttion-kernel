<?php

namespace Xofttion\Kernel\Structs;

class Node
{
    private $element;

    private Node $next;

    private Node $previous;

    public function __construct($element)
    {
        $this->element = $element;
    }

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
