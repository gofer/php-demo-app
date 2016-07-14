<?php
class Request
{
	public function isPost()
	{
		return $_SERVER['REQUEST_METHOD'] === 'POST';
	}

	public function getGet($name, $default = null)
	{
		return isset($_GET[$name])  ? $_GET[$name]  : $default;
	}

	public function getPost($name, $default = null)
	{
		return isset($_POST[$name]) ? $_POST[$name] : $default;
	}

	public function getHost()
	{
		if(!empty($_SERVER['HTTP_X_FORWARDED_HOST']))
		{
			return $_SERVER['HTTP_X_FORWARDED_HOST'];
		}
		else
		{
			return !empty($_SERVER['HTTP_HOST']) 
			     ? $_SERVER['HTTP_HOST'] 
			     : $_SERVER['SERVER_NAME'];
		}
	}

	public function isSsl()
	{
		return isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on';
	}

	public function getRequestUri()
	{
		return $_SERVER['REQUEST_URI'];
	}

	public function getScriptName()
	{
		return $_SERVER['SCRIPT_NAME'];
	}

	public function getAbsolutePath()
	{
		$protocol = $this->isSsl() ? 'https' : 'http';
		$host = $this->getHost();
		$script_name = $this->getScriptName();
		return $protocol . '://' . $host . $script_name;
	}

	public function getBaseUrl()
	{
		$script_name = $this->getScriptName();
		$request_uri = $this->getRequestUri();
		
		if(strpos($request_uri, $script_name) === 0) {
			return $script_name;
		} else if(strpos($request_uri, dirname($script_name)) === 0) {
			return rtrim(dirname($script_name), '/');
		}
		
		return '';
	}

	public function getPathInfo()
	{
		$base_url    = $this->getBaseUrl();
		$request_uri = $this->getRequestUri();
		
		if(($pos = strpos($request_uri, '?')) !== false) {
			$request_uri = substr($request_uri, 0, $pos);
		}

		$path_info = (string)substr($request_uri, strlen($base_url));

		return $path_info;
	}
}
?>
