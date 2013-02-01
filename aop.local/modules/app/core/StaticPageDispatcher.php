<?php 

namespace app\core;

class StaticPageDispatcher
{	
	protected $request = false;	
	
	public function __construct()
	{
		echo '<br/>StaticPageDispatcher instantiated....<br/>';
	}	
			
	
	public function getRequest()
	{
		return $this->request;
	}
	
	
	public function setRequest($request)
	{
		if (is_string($request) && is_file($request) && is_readable($request)) {
			$this->request = $request;
			return true;
		}
		return false;
	}
	
	
	public function dispatch($request = null)
	{		
		$request = ($this->request) ? $this->request : false;
		if (is_string($request) && is_file($request) && is_readable($request)) {
			include $request;
		}
		return false;
	}
	
}