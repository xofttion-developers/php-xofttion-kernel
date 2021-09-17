<?php

namespace Xofttion\Kernel\Utils;

use ReflectionClass;

class ReflectiveClass
{

    /**
     * 
     * @param mixed $object
     * @param string $propertyName
     * @param mixed $value
     * @param ReflectionClass|null $reflection
     * @return bool
     */
    public function setProperty($object, string $propertyName, $value, ?ReflectionClass $reflection = null): bool
    {
        if (is_null($reflection)) {
            $reflection = new ReflectionClass($object);
        }

        if (!$reflection->hasProperty($propertyName)) {
            return false;
        }

        $propertyAccessor = $reflection->getProperty($propertyName);

        if (!$propertyAccessor->isPublic()) {
            return false;
        }

        $propertyAccessor->setValue($object, $value);

        return true;
    }


    /**
     * 
     * @param mixed $object
     * @param string $methodName
     * @param mixed $value
     * @param ReflectionClass|null $reflection
     * @return bool
     */
    public function setMethod($object, string $methodName, $value, ?ReflectionClass $reflection = null): bool
    {
        if (is_null($reflection)) {
            $reflection = new ReflectionClass($object);
        }

        if (!$reflection->hasMethod($methodName)) {
            return false;
        }

        $methodAccessor = $reflection->getMethod($methodName);

        if (!$methodAccessor->isPublic()) {
            return false;
        }

        $methodAccessor->invoke($object, $value);

        return true;
    }

    /**
     * 
     * @param mixed $object
     * @param string $propertyName
     * @param ReflectionClass|null $reflection
     * @return mixed
     */
    public function getProperty($object, string $propertyName, ?ReflectionClass $reflection = null)
    {
        if (is_null($reflection)) {
            $reflection = new ReflectionClass($object);
        }

        if (!$reflection->hasProperty($propertyName)) {
            return null;
        }

        $propertyAccessor = $reflection->getProperty($propertyName);

        if (!$propertyAccessor->isPublic()) {
            return null;
        }

        return $propertyAccessor->getValue($object);
    }

    /**
     * 
     * @param mixed $object
     * @param string $methodName
     * @param ReflectionClass|null $reflection
     * @return mixed
     */
    public function getMethod($object, string $methodName, ?ReflectionClass $reflection = null)
    {
        if (is_null($reflection)) {
            $reflection = new ReflectionClass($object);
        }

        if (!$reflection->hasMethod($methodName)) {
            return null;
        }

        $methodAccessor = $reflection->getMethod($methodName);

        if (!$methodAccessor->isPublic()) {
            return null;
        }

        return $methodAccessor->invoke($object);
    }
}
