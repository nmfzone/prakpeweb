<?php

class System {

	private $url;

	/**
	 * Show the Base URL to Viewer.
	 * 
	 * @return void
	 */
	public function base_url($url = NULL)
	{
		$results = $this->url;

		if (trim($url) != '')
		{
			if (substr($url, 0, 1) != '/' && substr($results, -1) != '/') $url = '/' . $url;
			else if (substr($url, 0, 1) == '/' && substr($results, -1) == '/') $results = substr($results, 0, -1);
			$results = $results . $url;
		}

		return $results;
	}

	/**
	 * Set the url attribute
	 * 
	 * @return void
	 */
	public function setUrl($url)
	{
		$this->url = $url;
	}
	
}