<?php

namespace Xofttion\Kernel\Contracts;

interface IDataStorage
{
    // Métodos de la interfaz IDataStorage

    /**
     *
     * @return bool
     */
    public function isEmpty(): bool;

    /**
     *
     * @return int
     */
    public function count();

    /**
     *
     * @param mixed $object
     * @param mixed $data
     * @return void
     */
    public function attach($object, $data = null);

    /**
     *
     * @param mixed $object
     * @return bool
     */
    public function contains($object);

    /**
     *
     * @param mixed $object
     * @return mixed
     */
    public function getValue($object);

    /**
     *
     * @param mixed $object
     * @return string
     */
    public function getHash($object);

    /**
     *
     * @return array
     */
    public function values(): array;

    /**
     *
     * @param mixed $object
     * @return void
     */
    public function detach($object);

    /**
     *
     * @return void
     */
    public function clear();
}
