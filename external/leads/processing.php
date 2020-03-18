<?php
// SET TIMEZONE
date_default_timezone_set("Europe/London");



// DETECT OS AND BROWSER DETAILS
$user_agent = $_SERVER['HTTP_USER_AGENT'];function getOS() {global $user_agent;$os_platform = "Unknown OS Platform";$os_array = array('/windows nt 10/i' => 'Windows 10','/windows nt 6.3/i' => 'Windows 8.1','/windows nt 6.2/i' => 'Windows 8','/windows nt 6.1/i' => 'Windows 7','/windows nt 6.0/i' => 'Windows Vista','/windows nt 5.2/i' => 'Windows Server 2003/XP x64','/windows nt 5.1/i' => 'Windows XP','/windows xp/i' => 'Windows XP','/windows nt 5.0/i' => 'Windows 2000','/windows me/i' => 'Windows ME','/win98/i' => 'Windows 98','/win95/i' => 'Windows 95','/win16/i' => 'Windows 3.11','/macintosh|mac os x/i' => 'Mac OS X','/mac_powerpc/i' => 'Mac OS 9','/linux/i' => 'Linux','/ubuntu/i' => 'Ubuntu','/iphone/i' => 'iPhone','/ipod/i' => 'iPod','/ipad/i' => 'iPad','/android/i' => 'Android','/blackberry/i' => 'BlackBerry','/webos/i' => 'Mobile');foreach ($os_array as $regex => $value) {if (preg_match($regex, $user_agent)) {$os_platform = $value;}}return $os_platform;}function getBrowser() {global $user_agent;$browser = "Unknown Browser";$browser_array = array('/msie/i' => 'Internet Explorer','/firefox/i' => 'Firefox','/safari/i' => 'Safari','/chrome/i' => 'Chrome','/edge/i' => 'Edge','/opera/i' => 'Opera','/netscape/i' => 'Netscape','/maxthon/i' => 'Maxthon','/konqueror/i' => 'Konqueror','/mobile/i' => 'Handheld Browser');foreach ($browser_array as $regex => $value) {if (preg_match($regex, $user_agent)) {$browser = $value;}}return $browser;}$user_os = getOS();$user_browser = getBrowser();



// CONNECT TO DATABASE
include "include/connect.php";



// START SESSION
session_start();



// FETCH DATA FROM FORM
$source = $_REQUEST["source"];
$gclid = $_REQUEST["gclid"];
$date = date("d/m/Y H:i:s");



// FETCH DATA FROM FORM AND STORE IN SESSION
$_SESSION['first_name'] = $_REQUEST["firstname"];
$_SESSION['last_name'] = $_REQUEST["lastname"];
$_SESSION['contact_number'] = $_REQUEST["contactnumber"];
$_SESSION['email_address'] = $_REQUEST["emailaddress"];
$_SESSION['county'] = $_REQUEST["county"];



// COMBINE FIRST/LAST NAME INTO FULL NAME
$full_name = "". $_SESSION['first_name'] ." ". $_SESSION['last_name'] ."";



// SUBMIT CUSTOMER QUOTATION TO DATABASE
$query = "INSERT INTO web_enquiry_email_record (name, phone, email, county, source, GCLID, user_browser, user_os, date) VALUES ('".$full_name."', '".$_SESSION['contact_number']."', '".$_SESSION['email_address']."', '".$_SESSION['county']."', '".$source."', '".$gclid."', '".$user_browser."', '".$user_os."', '".$date."')";
if (mysqli_query($connection, $query)) {} else {
    
    
    
    // SEND MYSQL FAILURE EMAIL TO DEVELOPER@UKWEDDINGSAVINGS.CO.UK
    $to = "developer@ukweddingsavings.co.uk";
    $subject = "MYSQL Failure - ". $_SESSION['first_name'] ." ". $_SESSION['last_name'] ."";
    $headers = "From: matt@ukweddingsavings.co.uk\r\n";
    $headers.= "MIME-Version: 1.0\r\n";
    $headers.= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $message = '<p><b>MYSQL produced the following error:</b></p><br /><p><b>ERROR:</b> '. $query .'</p><br />'. mysqli_error($connection) .'<br /><br /><table border="0" cellpadding="3"><tr><td>DATE:</td><td><b>'. $date .'</b></td></tr><tr><td>FULL NAME:</td><td><b>'. $_SESSION['first_name'] .' '. $_SESSION['last_name'] .'</b></td></tr><tr><td>CONTACT NUMBER:</td><td><b>'. $_SESSION['contact_number'] .'</b></td></tr><tr><td>EMAIL ADDRESS:</td><td><b>'. $_SESSION['email_address'] .'</b></td></tr><tr><td>COUNTY:</td><td><b>'. $_SESSION['county'] .'</b></td></tr></table><br /><table border="0" cellpadding="3"><tr><td>SOURCE:</td><td><b>'. $source .'</b></td></tr><tr><td>GCLID:</td><td><b>'. $gclid .'</b></td></tr><tr><td>BROWSER:</td><td><b>'. $user_browser .'</b></td></tr><tr><td>OPERATING SYSTEM:</td><td><b>'. $user_os .'</b></td></tr></table><br />';
    mail($to, $subject, $message, $headers);
    
    
    
}



// CLOSE CONNECTION
mysqli_close($connection);



// REDIRECT TO QUOTATION SYSTEM
header('Location: https://www.ukweddingsavings.co.uk/tools/quotes/'); exit();



?>