<?php

namespace Xofttion\Kernel\Contracts;

interface IDataStorage
{
    // Métodos de la interfaz IDataStorage

    public function isEmpty(): bool;

    public function count();

    public function attach($object, $data = null);

    public function contains($object);

    public function getValue($object);

    public function getHash($object);

    public function values(): array;

    public function detach($object);

    public function clear();
}
