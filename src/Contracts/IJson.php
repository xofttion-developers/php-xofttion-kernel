<?php

namespace Xofttion\Kernel\Contracts;

use ArrayAccess;
use JsonSerializable;

interface IJson extends ArrayAccess, JsonSerializable
{
    public function toArray(): array;
}
