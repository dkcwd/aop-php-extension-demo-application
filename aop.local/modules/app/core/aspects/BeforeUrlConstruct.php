<?php 

namespace app\core\aspects;

class BeforeUrlConstruct
{
	
	public function __construct()
	{	
		// define an advice which will force the application to shut down if a bad url is requested
		$forceShutdownOnBadUrlAdvice = function (\AopJoinpoint $object) {
			$name = 'BeforeUrlConstruct $forceShutdownOnBadUrlAdvice()';
			echo '<br/>' . $name . ' is now active....<br/>';
			
			// the AopJoinpoint object contains an array of arguments
			$args = $object->getArguments();
			
			echo '<pre>Arguments within the AopJoinpoint object: ';
			var_dump($args);
			echo '</pre>';
			
			echo '<br/>' . $name . ' is checking for a bad url....<br/>';
			// check if we have at least one item in $args
			if (is_array($args) && count($args) > 0) {				
				if ($args[0] == '/badurl') {
					$app = \app\core\Application::getApplication();
					$app->forceShutdown($name . ' found a bad url');					
				} else {
					echo '<br/>' . $name . ' says "Url is ok!"....<br/>';
				}			    
			} 	
		};
		
		// register the advice to use at the joinpoint
		aop_add_before('app\core\Url->__construct()', $forceShutdownOnBadUrlAdvice);		
	}
	
}