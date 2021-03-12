<?php

namespace Xofttion\Kernel\Utils;

use ReflectionClass;

class ReflectiveClass {
    
    /**
     * 
     * @param object $object
     * @param string $propertyName
     * @param object $value
     * @param ReflectionClass|null $reflection
     * @return bool
     */
    public function setProperty($object, string $propertyName, $value, ?ReflectionClass $reflection = null): bool {
        if (is_null($reflection)) {
            $reflection = new ReflectionClass($object); // Iniciando reflexión
        }
        
        if (!$reflection->hasProperty($propertyName)) {
            return false; // No existe método con el nombre para ser invocado
        }
        
        $propertyAccessor = $reflection->getProperty($propertyName); // Propiedad
        
        if (!$propertyAccessor->isPublic()) {
            return false; // El método no puede ser invocado por no ser público
        }
        
        $propertyAccessor->setValue($object, $value); return true; // Asignación exitosa
    }
    
    
    /**
     * 
     * @param object $object
     * @param string $methodName
     * @param object $value
     * @param ReflectionClass|null $reflection
     * @return bool
     */
    public function setMethod($object, string $methodName, $value, ?ReflectionClass $reflection = null): bool {
        if (is_null($reflection)) {
            $reflection = new ReflectionClass($object); // Iniciando reflexión
        }
        
        if (!$reflection->hasMethod($methodName)) {
            return false; // No existe método con el nombre para ser invocado
        }
        
        $methodAccessor = $reflection->getMethod($methodName); // Método
        
        if (!$methodAccessor->isPublic()) {
            return false; // El método no puede ser invocado por no ser público
        }
        
        $methodAccessor->invoke($object, $value); return true; // Asignación exitosa
    }
    
    /**
     * 
     * @param object $object
     * @param string $propertyName
     * @param ReflectionClass|null $reflection
     * @return object
     */
    public function getProperty($object, string $propertyName, ?ReflectionClass $reflection = null) {
        if (is_null($reflection)) {
            $reflection = new ReflectionClass($object); // Iniciando reflexión
        }
        
        if (!$reflection->hasProperty($propertyName)) {
            return null; // No existe método con el nombre para ser invocado
        }
        
        $propertyAccessor = $reflection->getProperty($propertyName); // Propiedad
        
        if (!$propertyAccessor->isPublic()) {
            return null; // El método no puede ser invocado por no ser público
        }
        
        return $propertyAccessor->getValue($object); // Retorno exitoso de propiedad
    }
    
    /**
     * 
     * @param object $object
     * @param string $methodName
     * @param ReflectionClass|null $reflection
     * @return object
     */
    public function getMethod($object, string $methodName, ?ReflectionClass $reflection = null) {
        if (is_null($reflection)) {
            $reflection = new ReflectionClass($object); // Iniciando reflexión
        }
        
        if (!$reflection->hasMethod($methodName)) {
            return null; // No existe método con el nombre para ser invocado
        }
        
        $methodAccessor = $reflection->getMethod($methodName); // Método
        
        if (!$methodAccessor->isPublic()) {
            return null; // El método no puede ser invocado por no ser público
        }
        
        return $methodAccessor->invoke($object); // Retorno exitoso del método
    }
}