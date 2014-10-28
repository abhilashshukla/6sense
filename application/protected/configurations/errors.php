<?php
/*
 * File: errors.php
 * Created on 13-Oct-2014
 * Created By: Abhilash Shukla
 */

class errors
{
    function error($code = 1000)
    {
        $codes = array(
        	/*
    		 * ERROR: Bad Request
    		 * The request cannot be fulfilled due to bad syntax.
    		 */
        	400 => "Sorry the request did not processed. Please check with the administrator.",
        	/*
    		 * ERROR: Forbidden
    		 * The request was a valid request, but the server is refusing to respond to it.
    		 */
    		403 => "Sorry it seems like our server is overloaded. Please check back later.",
    		/*
    		 * ERROR: Not Found
    		 * The requested resource could not be found but may be available again in the future.
    		 */
    		404 => "Sorry the module you are looking for is unavailable at this moment. Please check back later.",
    		/*
    		 * ERROR: Internal Server Error
    		 * A generic error message, given when an unexpected condition was encountered
    		 * and no more specific message is suitable.
    		 */
    		500 => "OOPS! something went wrong. We are working on it, and will be fixed asap.",
    		/*
    		 * ERROR: Service Unavailable
    		 * The server is currently unavailable (because it is overloaded or down for maintenance).
    		 * Generally, this is a temporary state.
    		 */
    		503 => "Hey! we are doing some changes and maintenance. Please check after some time.",
    		/*
    		 * A generic error
    		 */
    		1000 => "OOPS! there is something wrong, we are onto it, please check back later.",    		
    		/*
    		 * If user is not logged in
    		 */
    		1001 => "Hey! you need to login first."
        );
		
		return $codes[$code];
    }
}
?>