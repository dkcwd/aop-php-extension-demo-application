<?php 
/**
 * Everything is being defined in the __construct method to provide a simple
 * way of registering the listener and callback.
 * 
 * Since our Router object works with Url objects, the purpose of this aspect 
 * is to grab the Url object prior to the Router object calling the processRoute()
 * method.  
 * 
 * Once we have the Url Object we can directly work with it. 
 * 
 * We could add filters and apply some validation prior to calling the Url object 
 * processUrl() method however in our example we doing something very simple.
 * 
 * See the Url class for more information....
 */
namespace app\core\aspects;

class BeforeRouterProcessRoute
{
	
	public function __construct()
	{	
		// defining an advice to trigger the Url object processUrl() method before 
		// the Router processes it	
		$processUrlObjectAdvice = function (\AopJoinpoint $object) {
			echo '<br/>BeforeRouterProcessRoute $processUrlObjectAdvice() has been triggered....<br/>';
			// the AopJoinpoint object contains an array of arguments but may be an empty array
			$args = $object->getArguments();		
			
			// the code below is just so we can see the array
			echo '<pre>Arguments within the AopJoinpoint object: ';
			var_dump($args);			
			echo '</pre>';
			
			// now checking if we have at least one item in the array
			if (is_array($args) && count($args) > 0) {
				// if so check the first item is a Url object
				if ($args[0] instanceof \app\core\Url) {
					// if so we will call the Url object processUrl() method 
					$args[0]->processUrl();	
					
					// now we will see any changes to the Url Object properties 
					echo '<pre>Arguments within the AopJoinpoint object once processed: ';
					var_dump($args);
					echo '</pre>';
				}				
			}						
		};
		
		// register the advice to use at the joinpoint
		// we are targetting the processRoute() method of the Router object
		// we will apply the $processUrlObjectAdvice callback when triggered 
		aop_add_before('app\core\Router->processRoute()', $processUrlObjectAdvice);		
		
	}	
	
}