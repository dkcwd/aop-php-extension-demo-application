<?php 

namespace app\core;

class Router
{
	protected $url = null;	
	protected $params = array();
	protected $matchedStaticPage = false;
	
	public function __construct()
	{
		echo '<br/>Router instantiated....<br/>';
	}	
	
	public function getMatchedStaticPage()
	{
		return $this->matchedStaticPage;
	}
	
	public function route(Url $url)
	{
		$this->url = $url;
		
// 		echo '<pre>The Url which the Router would process: ';
// 		var_dump($this->url); 
// 		echo '</pre>';
		
		$this->processRoute($this->url);
		
// 		echo '<pre>The Url which the Router has processed: ';
// 		var_dump($this->url); 
// 		echo '</pre>';
	}
	
	public function processRoute(Url $url)	
	{	
		echo '<br/>Processing the route....<br/>';
		
		// only an example so a quick hack to simulate checking for static pages
		$urlKey = ltrim($url->getProcessedUrl(), '/');
		
		$staticPages = array(
			'hello' => 'hello.phtml',
			'goodbye' => 'goodbye.phtml'
		);
		
		$this->matchedStaticPage = (array_key_exists($urlKey, $staticPages)) ? STATIC_PAGE_PATH . $staticPages[$urlKey] : false;
				
		if ($this->matchedStaticPage) return true;
		
		return false;
	}
	
}