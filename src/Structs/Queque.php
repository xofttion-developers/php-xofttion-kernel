<?php

namespace Xofttion\Kernel\Structs;

class Queque
{

    // Atributos de la clase Queque

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

    // Métodos de la clase Queque

    /**
     * 
     * @param mixed $element
     * @return void
     */
    public function enqueue($element): void
    {
        $newNode = new Node($element);

        if (is_null($this->first)) {
            $this->first = $newNode;
        }
        else {
            $this->last->setNext($newNode);
        }

        $this->last = $newNode;

        $this->size++;
    }

    /**
     * 
     * @return bool
     */
    public function isEmpty(): bool
    {
        return ($this->size == 0);
    }

    /**
     * 
     * @return int
     */
    public function size(): int
    {
        return $this->size;
    }

    /**
     * 
     * @return mixed
     */
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

    /**
     * 
     * @return mixed
     */
    public function first()
    {
        return is_null($this->first) ? null : $this->first->getElement();
    }

    /**
     * 
     * @return mixed
     */
    public function last()
    {
        return is_null($this->last) ? null : $this->last->getElement();
    }
}
