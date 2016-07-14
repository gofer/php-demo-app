<?php
class MiniBlogApplication extends Application
{
	protected $login_action = array('account', 'signin');

	public function getRootDir()
	{
		return dirname(__FILE__);
	}

	protected function registerRoutes()
	{
		return array(
			'/'                => array('controller' => 'status',  'action' => 'index'),
			'/status/post'     => array('controller' => 'status',  'action' => 'post'),
			'/status/unpost'   => array('controller' => 'status',  'action' => 'unpost'),
			'/user/:user_name' => array('controller' => 'status',  'action' => 'user'),
			'/user/:user_name/status/:id' 
			                   => array('controller' => 'status',  'action' => 'show'),
			'/account'         => array('controller' => 'account', 'action' => 'index'),
			'/account/:action' => array('controller' => 'account'),
			'/follow'          => array('controller' => 'account', 'action' => 'follow'),
			'/unfollow'        => array('controller' => 'account', 'action' => 'unfollow'),
		);
	}

	protected function buildDSNString($prefix, $dbname, $host)
	{
		return $prefix . ':' . 'dbname=' . $dbname . ';' . 'host=' . $host;
	}

	protected function configure()
	{
		$db_setting = parse_ini_file('database.ini');
		$dsn_string = $this->buildDSNString($db_setting['dsn_prefix'], $db_setting['dbname'], $db_setting['host']);
		$this->db_manager->connect('master', array(
			'dsn'      => $dsn_string,
			'user'     => $db_setting['user'],
			'password' => $db_setting['password'],
		));
	}
}
?>
