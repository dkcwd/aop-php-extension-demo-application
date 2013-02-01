<?php

namespace app\core;

class Environment
{
	protected $phpSettings = array(); 
	
	public function __construct(array $config = array()) 
	{
		if (isset($config['phpSettings'])) {
			$this->phpSettings = $config['phpSettings'];
			foreach ($this->phpSettings as $settingKey => $settingValue) {
				try {					
					$phpSettingsWhitelist = $this->getPhpSettingsWhitelist();					
					if (in_array($settingKey, $phpSettingsWhitelist)) {
						ini_set($settingKey, $settingValue);
					}										
				} catch (\Exception $e) {
					echo $e->getMessage();
				}
			}
		}
		return $this;			
	}
	
	public function getPhpSettingsWhitelist()
	{
		return include CONFIG_PATH . 'phpSettings.php';
	}
}