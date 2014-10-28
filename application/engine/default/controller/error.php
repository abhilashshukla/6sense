<?php
/*
 * File: error.php
 * Created on 10-Oct-2014
 * Created By: Abhilash Shukla
 */
if(!class_exists('error')){
	class error extends controller {
	
		function __construct() {
			parent::__construct();
		}
		
		function display($code = 1001, $default = 0)
		{
			$errors = new errors();
			$data = array("code"=>$code, "message"=>$errors->error($code));
			$this->view->render(__CLASS__, $data, $default);
		}
	}
}
?>