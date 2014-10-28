<?php
/*
 * File: urlConfigurator.php
 * Created on 10-Oct-2014
 * Created By: Abhilash Shukla
 */

class urlConfigurator {

	function __construct($url) {
		
		//Check if user is already logged-in
		$LoggedInStatus = false;

		/* -------------------
		 * Temprory Code
		 * -------------------
		 */
		if(isset($_POST['tempLoginProcess']))
		{
			$_SESSION['app_luser'] = "Temp";
		}
		// -------------------
		
		if(isset($_SESSION['app_luser']))
		{
			$LoggedInStatus = true;
		}
		else
		{
			$LoggedInStatus = false;
		}

		/*
		 * Legend: URL parsing
		 * $url[0] = application = default | ~
		 * $url[1] = class
		 * $url[2] = method
		 * $url[3] = argument
		 * $url[n] = will be treated as arguments only
		 * NOTE: We usually keep our website in `default` folder and other folder will be treated as applications
		 */

		//If there is nothig that is passed to URL, by default it will take `default` directory | usually a website
		if(empty($url[0]) || $url[0] == "default")
		{
			if(isset($url[1]))
			{
				//Check if a class is requested in URL
				if (class_exists($url[1]))
				{
					$load = new $url[1]();
					
					//Check if a method/function is requested in url
					if(isset($url[2]))
					{
						if(method_exists($load, $url[2]))
						{
							if(count($url)>3) //If it is greater than `3` it mans it has arguments coming in
							{
								$count = 0; $dataString = array();
								foreach($url as $arg)
								{
									if($count>2)
									{
										$dataString[] = $arg;
									}
									$count++;
								}
								$load->$url[2](0,$dataString); // This will instantiate the base class of home = 'home()'
								return true;
							}
							else
							{
								$load->$url[2]();
								return true;
							}
						}
						else
						{
							//Display error page if the page does not found.
							$load = new error();
							$load->display(404);
							return true;
						}
					}
					else
					{
						$load->$url[1](); // This will instantiate the base class of home = 'home()'
						return true;
					}
				}
				else
				{
					//Display error page if the page does not found.
					$load = new error();
					$load->display(404);
					return true;
				}
			}
			else
			{
				$load = new home();
				$load->home(); // This will instantiate the base class of home = 'home()'
				return true;
			}
		}
		else
		{
			if (is_dir(APP_ENGINE.$url[0])) { //If the app directory is available in Application->Engine
				
				/*
				 * Route user to login page if not already logged in
				 * This one is application specific login restriction
				 */
				if($LoggedInStatus == false)
				{
					$load = new login();
					$load->login();
					return true;
				}
				else
				{

					if(isset($url[1]))
					{
						//Check if a class exist which is requested in URL
						if (class_exists($url[1]))
						{
							$load = new $url[1]();
					
							//Check if a method/function is requested in url
							if(isset($url[2]))
							{
								if(method_exists($load, $url[2]))
								{
									if(count($url)>3) //If it is greater than `3` it means it has arguments coming in
									{
										$count = 0; $dataString = array();
										foreach($url as $arg)
										{
											if($count>2)
											{
												$dataString[] = $arg;
											}
											$count++;
										}
										$load->$url[2](0,$dataString); // This will instantiate the base class of home = 'home()'
										return true;
									}
									else
									{
										$load->$url[2]();
										return true;
									}
								}
								else
								{
									//Display error page if the page does not found.
									$load = new error();
									$load->display(404);
									return true;
								}
							}
							else
							{
								$load->$url[1](); // This will instantiate the base class of home = 'home()'
								return true;
							}
						}
						else
						{
							//Display error page if the page does not found.
							$load = new error();
							$load->display(404);
							return true;
						}
					}
					else
					{
						$load = new dashboard();
						$load->dashboard(); // This will instantiate the base class of home = 'home()'
						return true;
					}					
				}
			}
			else
			{
				//Check if class exist under default application, if its there -> load it other wise show error page
				if(is_file(APP_DEFAULT.'controller/'.$url[0].'.php'))
				{
					require APP_DEFAULT.'controller/'.$url[0].'.php';
					$load = new $url[0]();
					$load->$url[0](2); // Second parameter `2` is passed to hard set the application to `default`
					return true;
				}
				else
				{
					/*
					 * If application is not found in Application->Engine->Default
					 * Display default application error page
					 */
					$load = new error();
					$load->display(404, 1); // Second parameter `1` is passed to hard set the error page
					return true;
				}
			}
		}
	}
}
?>