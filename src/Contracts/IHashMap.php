<?php

namespace Xofttion\Kernel\Contracts;

use IteratorAggregate;
use Countable;
use JsonSerializable;

interface IHashMap extends IteratorAggregate, Countable, JsonSerializable
{
    // Métodos de la interfaz IHashMap

    public function isEmpty(): bool;

    public function attach(string $key, $value): void;

    public function contains(string $key): bool;

    public function getValue(string $key);

    public function values(): array;

    public function detach(string $key): void;

    public function clear(): void;

    public function toArray(): array;
}
