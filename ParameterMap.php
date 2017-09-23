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
    
    class ParameterMap {
        
        protected $data;
        
        public function __construct($d){
            
            $this->data = $d;
            
        }
        
        public function dump(){
            
            return $this->data;
            
        }
        
    }