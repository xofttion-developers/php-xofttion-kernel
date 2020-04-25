<?php

namespace Xofttion\Kernel\Str;

class CamelCase {
    
    // Métodos de la clase CamelCase
    
    /**
     * 
     * @param string $strSnake
     * @return string
     */
    public function ofSnakeSetter(string $strSnake): string {
        return "set{$this->ofSnakeProperty($strSnake)}";
    }
    
    /**
     * 
     * @param string $strSnake
     * @return string
     */
    public function ofSnakeGetter(string $strSnake): string {
        return "get{$this->ofSnakeProperty($strSnake)}";
    }
    
    /**
     * 
     * @param string $strSnake
     * @return string
     */
    public function ofSnakeIster(string $strSnake): string {
        return "is{$this->ofSnakeProperty($strSnake)}";
    }

    /**
     * 
     * @param string $strSnake
     * @return string
     */
    public function ofSnakeProperty(string $strSnake): string {
        return str_replace(" ", "", ucwords(str_replace(array("_", "-"), " ", $strSnake)));
    }
}