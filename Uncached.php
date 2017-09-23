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
    
    class Uncached implements \CachedRecursion\RecursionInterface{
        
        protected $param;
        protected $func;
        
        public function __construct(\CachedRecursion\ParameterMap $param, Callable $func){
            
            $this->param = $param;
            $this->func = $func;
            
        }
        
        public function __invoke($arg = 0){
            
            $args = is_array($arg) ? $arg : func_get_args();
            
            $param = (new \CachedRecursion\Parameter ($this->param))->assign($args);
            
            $func = $this->func;
            
            $rslt = $func($param, (new \CachedRecursion\Next($this)), (new \CachedRecursion\Resolve));
            
            if($rslt instanceof \CachedRecursion\Resolve){
                
                $rslt = $rslt->getResult();
                
            }
            
            return $rslt;
            
        }
        
    }