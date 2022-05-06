<?php

namespace Xofttion\Kernel\Structs;

class Queque
{
    private int $size = 0;

    private Node $head;

    private Node $tail;

    public function enqueue($element): void
    {
        $newNode = new Node($element);

        if (is_null($this->head)) {
            $this->head = $newNode;
        } else {
            $this->tail->setNext($newNode);
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

    public function dequeue()
    {
        if (is_defined($this->head)) {
            $element = $this->head->getElement();

            $this->head = $this->head->getNext();

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
