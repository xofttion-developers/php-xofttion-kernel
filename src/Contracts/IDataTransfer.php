<?php

namespace Xofttion\Kernel\Contracts;

use ArrayAccess;
use JsonSerializable;

interface IDataTransfer extends ArrayAccess, JsonSerializable
{
    /**
     *
     * @param array $data
     * @return bool
     */
    public function map(array $data): bool;

    /**
     *
     * @return array
     */
    public function toArray(): array;
}
