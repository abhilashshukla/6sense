<?php
/*
 * File: math.php
 * Created on 10-Oct-2014
 * Created By: Abhilash Shukla
 */

class mail {
    public static function mailFunction($subject= null, $message, $to)
    {
        $subject = 'Change Password';
        $headers =  'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'From: info@amplio.in' . "\r\n";
        @mail($to, $message, $subject, $headers);
    }
}
?>