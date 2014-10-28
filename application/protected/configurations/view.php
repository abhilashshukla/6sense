<?php
/*
 * File: view.php
 * Created on 10-Oct-2014
 * Created By: Abhilash Shukla
 */

class view {
	public function render($name = null, $data = null, $default = 0)
	{
		if ($name != null) {
			if($default == 0)
			{
				require APP_VIEW . $name . '.php';
			}
			elseif($default == 1)
			{
				require APP_DEFAULT . "view/error.php";
			}
			elseif($default == 2)
			{
				require APP_DEFAULT."view/" . $name . '.php';
			}
		}
	}
}
?>