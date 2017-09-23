<?php
    /**
     * Cached Recursion
     * 
     * @author xtl<xtl@xtlsoft.top>
     * @license MIT
     * @package CachedRecursion
     * 
     */
    
    namespace CachedRecursion;
    
    class Factory {
        
        public static function create($arg, $func){
            
            if(!$arg instanceof \CachedRecursion\ParameterMap){
                $arg = self::parameter($arg);
            }
            
            return (new \CachedRecursion\Recursion($arg, $func));
            
        }
        
        public static function parameter($map){
            
            return (new \CachedRecursion\ParameterMap($map));
            
        }
        
        public static function uncached($arg, $func){
            
            if(!$arg instanceof \CachedRecursion\ParameterMap){
                $arg = self::parameter($arg);
            }
            
            return (new \CachedRecursion\Uncached($arg, $func));
            
        }
        
    }