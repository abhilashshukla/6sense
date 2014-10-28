<?php
/*
 * File: index.php
 * Created on 10-Oct-2014
 * Created By: Abhilash Shukla
 */

class controller extends database {
	function __construct() {
		parent::__construct();
		$this->view = new view();
		session::init();
	}
}
 ?>