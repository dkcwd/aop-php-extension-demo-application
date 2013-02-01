<?php 

namespace app\core\aspects;

class BeforeStaticPageRendererRender
{
	
	public function __construct()
	{	
		// define the advice which will check to see if the file exists and is readable before passing to the StaticPageRender
		$passOnlyValidStaticPageToRendererAdvice = function (\AopJoinpoint $object) {
			echo '<br/>BeforeStaticPageRendererRender $passOnlyValidStaticPageToRendererAdvice() has been triggered....<br/>';
			
			$app = \app\core\Application::getApplication();
			
			$router = $app->getRouter();
			$matchedStaticPage = $router->getMatchedStaticPage();
			
			$renderer = $app->getRenderer();
			$renderer->setStaticPage($matchedStaticPage);
			
		};
		
		// register the advice to use at the joinpoint
		aop_add_before('app\core\StaticPageRenderer->render()', $passOnlyValidStaticPageToRendererAdvice);		
	}
	
}