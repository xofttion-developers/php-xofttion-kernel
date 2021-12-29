<?php

namespace Xofttion\Kernel\Structs;

class Stack
{
    // Atributos de la clase Stack

    private $first;

    private $last;

    private $size = 0;

    // Métodos de la clase Stack

    public function push($element): void
    {
        $newNode = new Node($element);

        if (is_defined($this->last)) {
            $newNode->setPrevious($this->last);
        } else {
            $this->first = $newNode;
        }

        $this->last = $newNode;

        $this->size++;
    }

    public function isEmpty(): bool
    {
        return $this->size == 0;
    }

    public function size(): int
    {
        return $this->size;
    }

    public function pop()
    {
        if (is_defined($this->last)) {
            $element = $this->last->getElement();

            $this->last = $this->last->getPrevious();

            $this->size--;

            return $element;
        }

        return null;
    }

    public function first()
    {
        if (is_null($this->first)) {
            return null;
        }

        return $this->first->getElement();
    }

    public function last()
    {
        if (is_null($this->last)) {
            return null;
        }

        return $this->last->getElement();
    }
}
