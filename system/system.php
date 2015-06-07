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

	public function redirect($url, $code = 302)
	{
		$hs = headers_sent();
		$location = $this->base_url($url);
	    if ($hs === false)
	    {
	        switch ($code)
	        {
		        case 301:
		            // Convert to GET
		            header("301 Moved Permanently HTTP/1.1", true, $code);
		            break;
		        case 302:
		            // Conform re-POST
		            header("302 Found HTTP/1.1", true, $code);
		            break;
		        case 303:
		            // dont cache, always use GET
		            header("303 See Other HTTP/1.1", true, $code);
		            break;
		        case 304:
		            // use cache
		            header("304 Not Modified HTTP/1.1", true, $code);
		            break;
		        case 305:
		            header("305 Use Proxy HTTP/1.1",true,$code);
		            break;
		        case 306:
		            header("306 Not Used HTTP/1.1",true,$code);
		            break;
		        case 307:
		            header("307 Temporary Redirect HTTP/1.1",true,$code);
		            break;
		    }
	        header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
	        header("Location: $location");
	    }
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