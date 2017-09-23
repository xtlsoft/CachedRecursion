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
    
    class Recursion implements \CachedRecursion\RecursionInterface{
        
        protected $param;
        protected $func;
        protected $cache = array();
        
        public function __construct(\CachedRecursion\ParameterMap $param, Callable $func){
            
            $this->param = $param;
            $this->func = $func;
            
        }
        
        public function __invoke($arg = 0){
            
            $args = is_array($arg) ? $arg : func_get_args();
            
            $param = (new \CachedRecursion\Parameter ($this->param))->assign($args);
            
            $func = $this->func;
            
            if(isset($this->cache[$param->toKey()]))
                $rslt = $this->cache[$param->toKey()];
            else
                $rslt = $func($param, (new \CachedRecursion\Next($this)), (new \CachedRecursion\Resolve));
                $this->cache[$param->toKey()] = $rslt;
            
            if($rslt instanceof \CachedRecursion\Resolve){
                
                $rslt = $rslt->getResult();
                
            }
            
            // if($rslt instanceof \CachedRecursion\Next){
                
            //     $rslt = $this->__invoke($rslt->getArgs());
                
            // }
            
            return $rslt;
            
        }
        
    }