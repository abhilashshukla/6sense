<?php
/*
 * File: config.php
 * Created on 10-Oct-2014
 * Created By: Abhilash Shukla
 */

class constants {

	/*
	 * Always use CAPS for constants and always prefix it with "APP_"
	 */ 

	function __construct($app = null) {

		//Use appropriate working environment | Production, Staging, Development
		$this->Development();

		//Set default-time zone for application globally
		date_default_timezone_set('Asia/Kolkata');

		//Application Specific Constants
		define('APP_NAME', '6Sense');
		define('APP_PUBLISHER', 'Abhilash Shukla');
		define('APP_VERSION', '1.0');
		define('APP_SEC_KEY', 'H&q]`43309E,]}cNI_]u7g;62BG$:.#GD58iI3c*d_R2Lg413H|4f1K[6xqqd;4'); // 502 bit key
		
		/*
		 * Path specific constants
		 */

		//With reference to Application URL
		define('APP_IMAGES', APP_URL.'public/assets/images/');
		define('APP_CSS', APP_URL.'public/assets/css/');
		define('APP_JS', APP_URL.'public/assets/js/');
		define('APP_FONTS', APP_URL.'public/assets/fonts/');

		//With reference to Application Absolute Path
		define('APP_VIEW', APP_PATH.'application/engine/'.$app.'/view/');
		define('APP_MODEL', APP_PATH.'application/engine/'.$app.'/model/');
		define('APP_CONTROLLER', APP_PATH.'application/engine/'.$app.'/controller/');
		
		define('APP_LIBRARY', APP_PATH.'public/assets/library/');
		define('APP_ENGINE', APP_PATH.'application/engine/');
		define('APP_DEFAULT', APP_ENGINE.'default/');
	}

	function Development()
	{
		define('APP_URL', 'http://localhost/6sense/'); //Application url
		define('APP_PATH', '/opt/lampp/htdocs/6sense/'); //Absolute Path
	}

	function Staging()
	{
		
	}

	function Production()
	{
		
	}
}
?>