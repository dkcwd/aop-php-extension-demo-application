<?php 

namespace app\core;

class StaticPageRenderer
{
	protected $staticPage = false;
	
	public function __construct()
	{
		echo '<br/>StaticPageRenderer instantiated....<br/>';
	}

	public function setStaticPage($staticPage)
	{
		if (is_string($staticPage) && is_file($staticPage) && is_readable($staticPage)) {
			$this->staticPage = $staticPage;
			return true;
		}
		return false;
	}
	
	public function getStaticPage()
	{
		return $this->staticPage;
	}
	
	public function render($staticPage = null)
	{
		if ($this->staticPage) return include $this->staticPage;
		echo '<br/>No static page content could be rendered....<br/>';
	}
	
}