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
    
    class Parameter implements \ArrayAccess {
        
        protected $data = [];
        protected $map = [];
        
        public function __construct(\CachedRecursion\ParameterMap $map){
            
            $this->map = $map->dump();
            
        }
        
        public function assign($param){
            
            foreach($this->map as $k=>$v){
                
                $this->data[$v] = $param[$k];
                
            }
            
            return $this;
            
        }
        
        public function dump(){
            
            return $this->data;
            
        }
        
        public function toKey(){
            
            return implode("||||", $this->data);
            
        }
        
        public function offsetExists($offset){
            
            return isset($this->data[$offset]);
            
        }
        
        public function offsetUnset($offset){
            
            unset($this->data[$offset]);
            
        }
        
        public function offsetGet($offset){
            
            return $this->data[$offset];
            
        }
        
        public function offsetSet($offset, $value){
            
            return $this->data[$offset] = $value;
            
        }
        
    }