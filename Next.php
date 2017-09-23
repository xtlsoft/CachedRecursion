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
    
    class Next {
        
        protected $args;
        
        protected $obj;
        
        public function __construct(\CachedRecursion\RecursionInterface $obj){
            
            $this->obj = $obj;
            
        }
        
        public function __invoke(){
            
            $args = func_get_args();
            $this->args = $args;
            
            return $this->obj->__invoke($args);
            
        }
        
        public function getArgs(){
            
            return $this->args;
            
        }
        
    }