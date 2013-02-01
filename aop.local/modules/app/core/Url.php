<?php 

namespace app\core;

class Url
{	
	protected $rawUrl = '';
	protected $processedUrl = '';
	protected $filters = array();
	protected $validators = array();	
	
	public function __construct($url)
	{
		if (is_string($url)) $this->rawUrl = $url;
		return $this;
	}	
	
	public function getRawUrl()
	{
		return $this->rawUrl;
	}
	
	public function getProcessedUrl()
	{
		return $this->processedUrl;
	}
	
	public function addFilter(FilterInterface $filter)	
	{
		$this->filters[] = $filter;
		return $this;
	}
	
	public function addValidator(ValidatorInterface $validator)
	{
		$this->validators[] = $validator;
		return $this;
	}
	
	public function applyFilters()
	{
		$this->processedUrl = $this->rawUrl;
		foreach ($this->filters as $filter) {
			$this->processedUrl = $filter->filter($this->processedUrl);
		}
		return $this->processedUrl;
	}
	
	public function applyValidators()
	{		
		foreach ($this->validators as $validator) {
			if ($validator->validate($this->processedUrl) === false) {
				echo 'failed validation....';			
			}
		}		
	}
	
	public function processUrl()
	{
		$this->applyFilters();
		$this->applyValidators();
		// example:
		$this->processedUrl = str_ireplace('hello', 'goodbye', $this->processedUrl);
		
	}
	
}