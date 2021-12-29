<?php

namespace Xofttion\Kernel;

use Xofttion\Kernel\Contracts\IDataTransfer;

class DataTransfer implements IDataTransfer
{
    // Atributos de la clase DataTransfer

    /**
     *
     * @var array
     */
    private $data = [];

    // Constructor de la clase DataTransfer

    public function __construct(?array $data = null)
    {
        if (is_defined($data)) {
            $this->map($data);
        }
    }

    // Métodos sobrescritos de la interfaz IDataTransfer

    public function map(array $data): bool
    {
        if (!is_array_json($data)) {
            return false;
        }

        foreach (array_keys($data) as $key) {
            if (is_array($data[$key])) {
                $this->mapArrayJson($key, $data[$key]);
            } else {
                $this[$key] = $data[$key];
            }
        }

        return true;
    }

    public function toArray(): array
    {
        return $this->jsonSerialize();
    }

    // Métodos sobrescritos de la interfaz JsonSerializable

    public function jsonSerialize()
    {
        $json = [];

        foreach (array_keys($this->data) as $key) {
            $value = $this->data[$key];

            if ($value instanceof IDataTransfer) {
                $json[$key] = $value->toArray();
            } elseif (is_array($value)) {
                $json[$key] = $this->jsonToArray($value);
            } else {
                $json[$key] = $value;
            }
        }

        return $json;
    }

    // Métodos de la clase DataTransfer

    /**
     *
     * @param array $data
     * @return array
     */
    public static function convertArray(array $data): array
    {
        $array = [];

        foreach ($data as $element) {
            if (is_array($element)) {
                $array[] = (is_array_json($element)) ? new static($element) : $element;
            } else {
                $array[] = $element;
            }
        }

        return $array;
    }

    // Métodos mágicos sobrescritos de PHP

    public function &__get($key)
    {
        return $this->data[$key];
    }

    public function __set($key, $value)
    {
        $this->data[$key] = $value;
    }

    public function __isset($key)
    {
        return isset($this->data[$key]);
    }

    public function __unset($key)
    {
        unset($this->data[$key]);
    }

    public function __toString()
    {
        return json_encode($this->jsonSerialize());
    }

    // Métodos sobrescritos de la interfaz ArrayAccess

    public function offsetExists($offset): bool
    {
        return isset($this->data[$offset]);
    }

    public function offsetGet($offset)
    {
        return $this->offsetExists($offset) ? $this->data[$offset] : null;
    }

    public function offsetSet($offset, $value): void
    {
        if (is_null($offset)) {
            $this->data[] = $value;
        } else {
            $this->data[$offset] = $value;
        }
    }

    public function offsetUnset($offset): void
    {
        if ($this->offsetExists($offset)) {
            unset($this->data[$offset]);
        }
    }

    // Métodos operacionales de la clase DataTransfer

    /**
     *
     * @param string $key
     * @param mixed $data
     * @return void
     */
    private function mapArrayJson(string $key, $data): void
    {
        if (is_array_json($data)) {
            $this[$key] = new static($data);
        } else {
            $array = [];

            foreach ($data as $element) {
                array_push($array, $this->mapItemJson($element));
            }

            $this[$key] = $array;
        }
    }

    /**
     *
     * @param mixed $element
     * @return mixed
     */
    private function mapItemJson($element)
    {
        return (is_array($element)) ? new static($element) : $element;
    }

    /**
     *
     * @param array $data
     * @return array
     */
    private function jsonToArray(array $data): array
    {
        $array = [];

        foreach ($data as $element) {
            if ($element instanceof IDataTransfer) {
                $array[] = $element->toArray();
            } else {
                $array[] = $element;
            }
        }

        return $array;
    }
}
