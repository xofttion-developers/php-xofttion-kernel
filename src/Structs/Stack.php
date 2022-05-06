<?php

namespace Xofttion\Kernel\Structs;

class Stack
{
    private int $size = 0;

    private Node $head;

    private Node $tail;

    public function push($element): void
    {
        $newNode = new Node($element);

        if (is_defined($this->tail)) {
            $newNode->setPrevious($this->tail);
        } else {
            $this->head = $newNode;
        }

        $this->tail = $newNode;

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
        if (is_defined($this->tail)) {
            $element = $this->tail->getElement();

            $this->tail = $this->tail->getPrevious();

            $this->size--;

            return $element;
        }

        return null;
    }

    public function head()
    {
        if (is_null($this->head)) {
            return null;
        }

        return $this->head->getElement();
    }

    public function tail()
    {
        if (is_null($this->tail)) {
            return null;
        }

        return $this->tail->getElement();
    }
}
