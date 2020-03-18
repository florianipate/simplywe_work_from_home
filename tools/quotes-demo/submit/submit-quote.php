<?php
// SET TIMEZONE
date_default_timezone_set("Europe/London");


// CONNECT TO DATABASE
include "../../../includes/connect.php";


// FETCH GENERAL DETAILS FROM AJAX REQUEST
$venue_name = $_REQUEST["venue_name"];
$venue_max_hotel_rooms = $_REQUEST["venue_max_hotel_rooms"];
$venue_hotel_room_price = $_REQUEST["venue_hotel_room_price"];
$wedding_date = $_REQUEST["wedding_date"];
$evening_entertain = $_REQUEST["evening_entertain"];
$full_name = $_REQUEST["full_name"]; 
$contact_number = $_REQUEST["contact_number"]; 
$email_address = $_REQUEST["email_address"]; 


// FETCH MAIN QUOTE DETAILS FROM AJAX REQUEST
$package_price_one = $_REQUEST["package_price_one"];
$package_guests_one = $_REQUEST["package_guests_one"];
$add_daytime_total_one = $_REQUEST["add_daytime_total_one"];
$remaining_daytime_one = $_REQUEST["remaining_daytime_one"];
$daytime_price_one = $_REQUEST["daytime_price_one"];
$add_evening_total_one = $_REQUEST["add_evening_total_one"];
$remaining_evening_one = $_REQUEST["remaining_evening_one"];
$evening_price_one = $_REQUEST["evening_price_one"];
$ext_evening_entertain_one = $_REQUEST["ext_evening_entertain_one"];
$package_total_one = $_REQUEST["package_total_one"];


// FETCH ALT QUOTE DETAILS FROM AJAX REQUEST
$wedding_day_two = $_REQUEST["wedding_day_two"];
$package_total_two = $_REQUEST["package_total_two"];
$wedding_day_three = $_REQUEST["wedding_day_three"];
$package_total_three = $_REQUEST["package_total_three"];
$wedding_day_four = $_REQUEST["wedding_day_four"];
$package_total_four = $_REQUEST["package_total_four"];


// SET DATE
$date = date("d/m/Y");


// CHECK FOR OPTIONAL EXTRAS
if ($evening_entertain == "No") {$ext_evening_entertain_one = "0";}


// CHANGE OUT ALT LABELS FOR WEEKDAYS
if ($wedding_day_two == "Monday" || $wedding_day_two == "Tuesday" || $wedding_day_two == "Wednesday" || $wedding_day_two == "Thursday") {$wedding_day_two = "Weekday";}
if ($wedding_day_three == "Monday" || $wedding_day_three == "Tuesday" || $wedding_day_three == "Wednesday" || $wedding_day_three == "Thursday") {$wedding_day_three = "Weekday";}
if ($wedding_day_four == "Monday" || $wedding_day_four == "Tuesday" || $wedding_day_four == "Wednesday" || $wedding_day_four == "Thursday") {$wedding_day_four = "Weekday";}


// FETCH PACKAGE DETAILS FROM DATABASE
$package_detail_limit = 30; $query = "SELECT * FROM demo_venue_packages_details WHERE venue_name = '". $venue_name ."'"; $get_packages = mysqli_query($connection, $query); while($row = mysqli_fetch_assoc($get_packages)) {$package_list = '<table border="0" width="100%" cellpadding="2">'; for($x = 1; $x <= $package_detail_limit; $x++) {if ($row["package_item_$x"] != "") {$package_list .= '<tr><td valign="top"><img src="https://www.simplywed.co.uk/images/quotation/heart.png" alt="Pink Heart"></td><td><p>'. $row["package_item_$x"] .'</p></td></tr>'; }} $package_list .= '</table><br />';}


// SEND USER ESTIMATED QUOTE EMAIL
$to = $email_address;
$subject = "Estimated Quote Email Received by Users";
$headers = "From: enquiries@simplywed.co.uk\r\n";
$headers.= "MIME-Version: 1.0\r\n";
$headers.= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$message = '<html><body style="font-family: Arial, Helvetica, sans-serif; background: #cccccc;"><table width="700" cellpadding="20" cellspacing="0" border="0" style="background-color: #ffffff;"><tr><td><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td align="center"><img src="https://www.simplywed.co.uk/images/logo.jpg" alt="UK Wedding Savings" width="400px"></td></tr><tr><td><br /><br /><p><b>'. $date .'</b></p><p><b>Hello '. $full_name .'</b></p><p>Thank you for visiting our website.</p><p>As you would have seen we have fantastic deals online at <b><a href="https://www.simplywed.co.uk/">www.simplywed.co.uk</a></b> with new deals being offered throughout the year at different venues and locations.</p><p>All our prices are estimated and should be used as a guide only. On your visit to the wedding venues the wedding co-ordinator will be able to answer any questions you might have and will supply you with a full quotation once your arrangements have been finalised.</p></td></tr></table><br /><table width="100%" cellpadding="10" cellspacing="0" border="0"><tr><td width="48%" align="left" valign="top"><p style="font-weight: bold; color: #5b2c86;">YOUR WEDDING MIGHT SEEM A LONG TIME AWAY, BUT DATES GET BOOKED FAST.</p><p style="font-weight: bold; color: #5b2c86;">DO NOT BE DISAPPOINTED, BOOK YOUR VIEWING NOW.</p></td><td width="4%"></td><td width="48%" align="center" valign="middle"><a href="https://www.simplywed.co.uk/tools/quotes-demo/viewing.php?v='. rawurlencode(base64_encode($venue_name)) .'&n='. rawurlencode(base64_encode($full_name)) .'&e='. rawurlencode(base64_encode($email_address)) .'&p='. rawurlencode(base64_encode($contact_number)) .'" style="text-decoration: none;"><div style="width: 100%; background: #5b2c86; padding: 20px 0px; border-radius: 10px; border: 0; line-height: 30px; font-size: 20px; color: #ffffff; cursor: pointer;">Book Your Viewing</div></a></td></tr></table><br /><table width="100%" cellpadding="10" cellspacing="0" border="0"><tr><td width="48%" valign="top" style="background: #bc84ca; color: #ffffff;"><p style="text-align: center; font-size: 22px;"><b>SUMMARY</b></p><p><b>Venue Name</b><br />'. $venue_name .'</p><p><b>Wedding Date</b><br />'. $wedding_date .'</p><p><b>Base Package Price &#163;'. number_format($package_price_one) .'</b><br />Inc '. $package_guests_one .' Daytime & Evening Guests</p><p><b>Additional Daytime Total &#163;'. number_format($add_daytime_total_one) .'</b><br />'. $remaining_daytime_one .' Guests @ &#163;'. number_format($daytime_price_one) .' per person</p><p><b>Additional Evening Total &#163;'. number_format($add_evening_total_one) .'</b><br />'. $remaining_evening_one .' Guests @ &#163;'. number_format($evening_price_one) .' per person</p><p><b>Optional Extras</b><br />DJ Hire - &#163;'. number_format($ext_evening_entertain_one) .'</p><p style="font-size: 20px;"><b>Estimated Total - &#163;'. number_format($package_total_one) .'</b></p><table width="100%" cellpadding="10" cellspacing="0" border="0" style="font-size: 18px; color: #ffffff;"><tr><td colspan="2"><u><b>ALTERNATE PRICES</b></u></td></tr><tr><td><b>'. $wedding_day_two .'</b></td><td><b>&#163;'. number_format($package_total_two) .'</b></td></tr><tr><td><b>'. $wedding_day_three .'</b></td><td><b>&#163;'. number_format($package_total_three) .'</b></td></tr><tr><td><b>'. $wedding_day_four .'</b></td><td><b>&#163;'. number_format($package_total_four) .'</b></td></tr></table><p>All Prices are subject to change without notice and can exclude Bank Holidays, Sundays, Monday Public Holidays and Prime Dates.</p><p>Prices will change depending on the month and day of the week.</p></td><td width="4%"></td><td width="48%" valign="top"><p style="text-align: center; font-size: 22px;"><b>PACKAGE HIGHLIGHTS</b></p>'. $package_list .'<p style="text-align: center;"><b>THIS VENUE HAS '. $venue_max_hotel_rooms .' HOTEL ROOMS STARTNG FROM &#163;'. number_format($venue_hotel_room_price) .'</b></p></td></tr></table></td></tr></table></body></html>';
mail($to, $subject, $message, $headers);


// SEND VENUE QUOTE NOTIFICATION
$to = $email_address;
$subject = "Estimated Quote Notification Received by Venues";
$headers = "From: enquiries@simplywed.co.uk\r\n";
$headers.= "MIME-Version: 1.0\r\n";
$headers.= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$message = '<html><body style="font-family: Arial, Helvetica, sans-serif; background: #cccccc;"><table width="700" cellpadding="20" cellspacing="0" border="0" style="background-color: #ffffff;"><tr><td><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td align="center"><img src="https://www.simplywed.co.uk/images/logo.jpg" alt="UK Wedding Savings" width="400px"></td></tr><tr><td><br /><br /><p><b>'. $date .'</b></p><p>Please find below a copy of the estimated quote sent to the following:</p><p><b>Full Name:</b> '. $full_name .'</p><p><b>Contact Number:</b> '. $contact_number .'</p><p><b>Email Address:</b> '. $email_address .'</p><p>We will advise you if they request a show around.</p><p>All of our quotations are estimated and should be used as a guide only.</p></td></tr></table><br /><table width="100%" cellpadding="10" cellspacing="0" border="0"><tr><td width="48%" valign="top" style="background: #bc84ca; color: #ffffff;"><p style="text-align: center; font-size: 22px;"><b>SUMMARY</b></p><p><b>Venue Name</b><br />'. $venue_name .'</p><p><b>Wedding Date</b><br />'. $wedding_date .'</p><p><b>Base Package Price &#163;'. number_format($package_price_one) .'</b><br />Inc '. $package_guests_one .' Daytime & Evening Guests</p><p><b>Additional Daytime Total &#163;'. number_format($add_daytime_total_one) .'</b><br />'. $remaining_daytime_one .' Guests @ &#163;'. number_format($daytime_price_one) .' per person</p><p><b>Additional Evening Total &#163;'. number_format($add_evening_total_one) .'</b><br />'. $remaining_evening_one .' Guests @ &#163;'. number_format($evening_price_one) .' per person</p><p><b>Optional Extras</b><br />DJ Hire - &#163;'. number_format($ext_evening_entertain_one) .'</p><p style="font-size: 20px;"><b>Estimated Total - &#163;'. number_format($package_total_one) .'</b></p><table width="100%" cellpadding="10" cellspacing="0" border="0" style="font-size: 18px; color: #ffffff;"><tr><td colspan="2"><u><b>ALTERNATE PRICES</b></u></td></tr><tr><td><b>'. $wedding_day_two .'</b></td><td><b>&#163;'. number_format($package_total_two) .'</b></td></tr><tr><td><b>'. $wedding_day_three .'</b></td><td><b>&#163;'. number_format($package_total_three) .'</b></td></tr><tr><td><b>'. $wedding_day_four .'</b></td><td><b>&#163;'. number_format($package_total_four) .'</b></td></tr></table><p>All Prices are subject to change without notice and can exclude Bank Holidays, Sundays, Monday Public Holidays and Prime Dates.</p><p>Prices will change depending on the month and day of the week.</p></td><td width="4%"></td><td width="48%" valign="top"><p style="text-align: center; font-size: 22px;"><b>PACKAGE HIGHLIGHTS</b></p>'. $package_list .'<p style="text-align: center;"><b>THIS VENUE HAS '. $venue_max_hotel_rooms .' HOTEL ROOMS STARTNG FROM &#163;'. number_format($venue_hotel_room_price) .'</b></p></td></tr></table></td></tr></table></body></html>';
mail($to, $subject, $message, $headers);


// CLOSE CONNECTION
mysqli_close($connection);


?>