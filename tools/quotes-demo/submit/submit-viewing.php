<?php
// SET TIMEZONE
date_default_timezone_set("Europe/London");


// CONNECT TO DATABASE
include "../../../includes/connect.php";


// FETCH DETAILS FROM AJAX REQUEST
$date_added = date("d/m/Y H:i:s");
$full_name = $_REQUEST["contact_name"];
$email_address = $_REQUEST["email_address"];
$contact_number = $_REQUEST["contact_number"];
$venue_name = $_REQUEST["venue_name"];
$viewing_date = $_REQUEST["viewing_date"];
$viewing_time = $_REQUEST["viewing_time"];


// FETCH VENUE EMAIL FROM DATABASE
$query = "SELECT * FROM demo_venue_details WHERE venue_name = '". $venue_name ."'";
$get_venue_email = mysqli_query($connection, $query);
while($row = mysqli_fetch_assoc($get_venue_email)) {
    $venue_email = $row['venue_email'];
}


// SEND VENUE BOOK VIWEING DETAILS
$to = $email_address;
$subject = "Viewing Request Notification Received by Venues";
$headers = "From: enquiries@simplywed.co.uk\r\n";
$headers.= "MIME-Version: 1.0\r\n";
$headers.= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$message = '<html><body style="font-family: Arial, Helvetica, sans-serif; background: #cccccc;"><table width="700" cellpadding="20" cellspacing="0" border="0" style="background-color: #ffffff;"><tr><td><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td align="center"><img src="https://www.simplywed.co.uk/images/logo.jpg" alt="UK Wedding Savings" width="400px"></td></tr><tr><td><br /><br /><p><b>'. $date .'</b></p><p>A potential customer has requested to book a viewing.</p><p>Please see customer details below:</p><p><b>Full Name:</b> '. $full_name .'</p><p><b>Contact Number:</b> '. $contact_number .'</p><p><b>Email Address:</b> '. $email_address .'</p><p><b>Requested Veiwing:</b> '. $viewing_date .' @ '. $viewing_time .'</p><br /><p><b>IMPORTANT:</b></p><p><b>Please contact the above as soon as possible to confirm that this date and time is ok or to give alternatives.</b></p></td></tr></table></td></tr></table></body></html>';
mail($to, $subject, $message, $headers);


?>