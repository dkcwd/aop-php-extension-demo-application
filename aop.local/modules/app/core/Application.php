<?php 

namespace app\core;

class Application
{
	protected static $application;
	protected $environment = null;
	protected $router = null;
	protected $renderer = null;	
	
	
	protected function __construct() {}
	
	public function getConfig()
	{
		echo '<br/>Getting config....<br/>';
		return include CONFIG_PATH . 'config.php';
	}
		
	public function getApplication()
	{
		if (!self::$application) {
			self::$application = new Application();
		}
		return self::$application;
	}	

	public function getDispatcher()
	{
		return $this->dispatcher;
	}
	
	public function getRouter()
	{
		return $this->router;
	}
	
	public function getRenderer()
	{
		return $this->renderer;
	}	
	
	public function setEnvironment(array $config = array())
	{
		$this->environment = new \app\core\Environment($config);
		return $this;
	}	
	
	public function bootstrap()
	{
		echo '<br/>Bootsrapping....<br/>';
		$this->setEnvironment($this->getConfig());			
		return $this;	
	}
	
	
	public function run()
	{
		echo '<br/>Running application....<br/>';		
		return $this;
	}
	
	
	public function route()
	{				
		$url = new Url($_SERVER['REQUEST_URI']);
		$this->router = new Router();
		$this->router->route($url);		
		echo '<br/>Routing request....<br/>';		
		return $this;
	}
	
	
	public function render()
	{
		echo '<br/>Rendering....<br/>';
		$this->renderer = new StaticPageRenderer();
		$this->renderer->render();
		return $this;
	}
	
	
	public function shutdown()
	{
		echo '<br/>Shutting down....<br/>';		
	}
	
	
	public function forceShutdown($message = null)
	{		
		echo '<br/>The forceShutdown() process has been called....<br/>';
		
		$message = (!is_null($message) && is_string($message)) ? $message : false;
		if ($message) echo "Message: $message";		
		
		$this->shutdown();
		die('<br/>forceShutdown() completed successfully....<br/>');
	}
	
}