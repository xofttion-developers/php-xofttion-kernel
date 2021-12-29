<?php

namespace Xofttion\Kernel\Contracts;

use IteratorAggregate;
use Countable;
use JsonSerializable;

interface IJson extends IteratorAggregate, Countable, JsonSerializable
{
    // Métodos de la interfaz IJson

    /**
     *
     * @return bool
     */
    public function isEmpty(): bool;

    /**
     *
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public function attach(string $key, $value): void;

    /**
     *
     * @param string $key
     * @param float $value
     * @return void
     */
    public function sum(string $key, float $value): void;

    /**
     *
     * @param string $key
     * @return bool
     */
    public function contains(string $key): bool;

    /**
     *
     * @param string $key
     * @return mixed
     */
    public function getValue(string $key);

    /**
     *
     * @return array
     */
    public function values(): array;

    /**
     *
     * @param string $key
     * @return void
     */
    public function detach(string $key): void;

    /**
     *
     * @return void
     */
    public function clear(): void;

    /**
     *
     * @return array
     */
    public function toArray(): array;
}
