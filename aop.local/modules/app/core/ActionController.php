<?php 

namespace app\core;

class ActionController
{
	protected $request = null;
	protected $params = array();
	
	public function __construct()
	{
		echo 'ActionController instantiated....';
	}	
	
}