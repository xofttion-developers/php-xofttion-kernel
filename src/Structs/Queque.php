<?php

namespace Xofttion\Kernel\Structs;

class Queque
{
    // Atributos de la clase Queque

    private $first;

    private $last;

    private $size = 0;

    // Métodos de la clase Queque

    public function enqueue($element): void
    {
        $newNode = new Node($element);

        if (is_null($this->first)) {
            $this->first = $newNode;
        } else {
            $this->last->setNext($newNode);
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

    public function dequeue()
    {
        if (is_defined($this->first)) {
            $element = $this->first->getElement();

            $this->first = $this->first->getNext();

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
