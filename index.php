<?php
/*
 * File: index.php
 * Created on 10-Oct-2014
 * Created By: Abhilash Shukla
 */

class BaseIndex {
	function __construct() {

		//Switchiing error reporting on, to view all error that will happen while file executions.
		error_reporting(E_ALL);

		/* 
		 * Retriving class, method, and arguments from url
		 * Core logic for handling URLs and parsing class, method and arguments
		 * @return array of URL
		 */
		function dispatch()
		{
			$url = isset($_GET['url']) ? $_GET['url'] : null;
			$url = rtrim($url, '/');
			return $url = explode('/', $url);
		}

		/*
		 * Get current application name
		 */
		function get_current_app_name()
		{
			$url = dispatch();

			//Get application name
			if(empty($url[0]) || $url[0] == "default")
			{
				$app = "default";
			}
			else
			{
				$app = $url[0];
			}
			return $app;
		}


		/*
		 * Load constants
		 */
		$app = get_current_app_name();
		include_once("application/protected/configurations/constants.php");
		$constants  = new constants($app); // Application and website wide constants

		/* 
		 * Using an autoloader to load all classes into this file
		 * Make sure to use unique name for each file name accross all application
		 * Every file class name should be equal to its file name
		 */
		function __autoload($class_name) {

			//Check if the class exist in protected->configurations
			if (file_exists("application/protected/configurations/".$class_name . '.php')){
				require "application/protected/configurations/".$class_name . '.php';
				return true;
			}

			//Check if the class exist in engine->{AllApps}
			if (file_exists(APP_CONTROLLER.$class_name . '.php')){
				require APP_CONTROLLER.$class_name . '.php';
				return true;
			}
			elseif (file_exists(APP_MODEL.$class_name . '.php')){
				require APP_MODEL.$class_name . '.php';
				return true;
			}
			elseif (file_exists(APP_VIEW.$class_name . '.php')){
				require APP_VIEW.$class_name . '.php';
				return true;
			}
			
			//Check if the class exist in protected->services
			if (file_exists("application/protected/services/". $class_name . '.php')){
				require "application/protected/services/". $class_name . '.php';
			}
			elseif (file_exists("application/protected/modules/".$class_name . '.php')){
				require "application/protected/modules/". $class_name . '.php';
			}
			else {
				require "application/engine/default/controller/error.php";
			}
		}

		/*
		 * Loads all protected->configurations
		 */
		$database = new database(); // Database related all configurations
		$controller = new controller(); // Global Controller
		$view = new view(); // Global View
		$model = new model(); // Global Model
		$urlConfigurator = new urlConfigurator(dispatch()); // Core logic for handling URLs and parsing class, method and arguments
	}
}
//Instantiate the BaseIndex
$BaseIndex = new BaseIndex();
?>