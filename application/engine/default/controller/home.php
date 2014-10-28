<?php
/*
 * File: home.php
 * Created on 10-Oct-2014
 * Created By: Abhilash Shukla
 */

class home extends controller {

	function __construct() {
		parent::__construct();
		session::init();
	}
	
	/*
	 * When dealing with default application -> there has to be `$default` parameter to be passed for managing landing website/app
	 */
	function home($default=0)
	{
		$this->view->render(__CLASS__, null, $default);
	}
}
?>