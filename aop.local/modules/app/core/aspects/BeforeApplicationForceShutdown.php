<?php 

namespace app\core\aspects;

class BeforeApplicationForceShutdown
{
	
	public function __construct()
	{	
		// define the advice
		$manipulateForceShutdownMessageAdvice = function (\AopJoinpoint $object) {
		echo '<br/>BeforeApplicationForceShutdown $manipulateForceShutdownMessageAdvice() has been triggered....<br/>';					
			// the AopJoinpoint object contains an array of arguments
			$args = $object->getArguments();
			echo '<pre>Arguments within the AopJoinpoint object: ';
			var_dump($args);
			echo '</pre>';
			if (is_array($args) && count($args) > 0) {
			    $args[0] = "We have manipulated the message";
		        $object->setArguments($args);
			} else {
				echo '<br/>$manipulateForceShutdownMessageAdvice() says "No forceShutdown() message was recieved"....<br/>';
			}		
		};
		
		// register the advice to use at the joinpoint
		aop_add_before('app\core\Application->forceShutdown()', $manipulateForceShutdownMessageAdvice);		
	}
	
}