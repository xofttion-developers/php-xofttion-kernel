<?php

namespace Xofttion\Kernel\Contracts;

use ArrayAccess;
use JsonSerializable;

interface IJson extends ArrayAccess, JsonSerializable
{
    // Métodos de la interfaz IJson

    public function map(array $data): bool;

    public function toArray(): array;
}
