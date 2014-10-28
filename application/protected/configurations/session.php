<?php
/*
 * File: session.php
 * Created on 10-Oct-2014
 * Created By: Abhilash Shukla
 */

class session {

	public static function init()
    {
    	//Start session if doesn't exist
		if(!session_id())
		{
		    session_start();
		}
    }

    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function get($key)
    {
        if (isset($_SESSION[$key]))
        return $_SESSION[$key];
    }

    public static function destroy()
    {
        //unset($_SESSION);
        session_destroy();
    }
	public static function unsetSession($key)
	{
		unset($key);
	}

}
?>