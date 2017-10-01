# CachedRecursion
Easily make cached calls especially in slowly recursions in PHP.

## Install
`composer require xtlsoft/cachedrecursion`

## Usage

	<?php
		
		use \CachedRecursion\Factory;
		
		$func = Factory::cached(
			[
				"n" 
			],
			function($param, $next, $solve){
				
				if($param['n'] == 1) return $solve(1);
				else return $solve($param['n'] * $next($param['n']-1));
				
			}
		);
		
		echo $func(1);

Isn't it easy?