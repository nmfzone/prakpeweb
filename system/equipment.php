<?php

namespace System;

class Equipment {

	private $siteName;
	
	private $copyrights = '&copy; 2015';

	private $slogan;

	public function __construct($siteDetails = [])
	{
		$this->siteName   = $siteDetails['siteName'];
		$this->copyrights = $siteDetails['copyright'];
		$this->slogan     = $siteDetails['slogan'];
	}

	public function theSiteName($before = '', $after = '')
	{
		return $before . $this->siteName . $after;
	}

	public function theCopy($before = '', $after = '')
	{
		return $before . $this->copyrights . $after;
	}

	public function theSlogan($before = '', $after = '')
	{
		return $before . $this->slogan . $after;
	}

}