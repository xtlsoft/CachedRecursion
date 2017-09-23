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
    
    class Resolve {
        
        protected $data;
        
        public function __invoke($data){
            
            $this->data = $data;
            
            return $this;
            
        }
        
        public function getResult(){
            
            return $this->data;
            
        }
        
    }