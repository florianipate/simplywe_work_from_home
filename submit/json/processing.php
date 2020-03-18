<?php
// DISPLAY ERRORS
error_reporting(E_ALL);
ini_set('display_errors', 1);


// SET DEFAULT TIMEZONE
date_default_timezone_set("Europe/London");


// PAUSE 2 SECOND FOR WEBHOOK TO ARRIVE
sleep(2);


// FETCH AND DECODE RESPONSE JSON
$ref = $_GET["sref"];
$json = file_get_contents($ref);
$data = json_decode($json, true);


// CLEAN UP AFTER RETRIEVING THE DATA
unlink($ref);


// SORT APPLICATION DATA AND CREATE ARRAY
$form_data = array();
foreach ($data['form_response']['answers'] as $answer) {
    if ($answer['type'] == "text") {
        $form_data[] = $answer['text'];
    } else if ($answer['type'] == "boolean") {
        $form_data[] = $answer['boolean'];
    } else if ($answer['type'] == "email") {
        $form_data[] = $answer['email'];
    } else if ($answer['type'] == "number") {
        $form_data[] = $answer['number'];
    } else if ($answer['type'] == "choice") {
        $form_data[] = $answer['choice']['label'];
    } else if ($answer['type'] == "date") {
        $form_data[] = $answer['date'];
    }
}


// CONNECT TO DATABASE
include "../../includes/connect.php";



// CHECK FOR JSON EVENT ID
$event_id = $data['event_id'];
if ($event_id != "") {
    
    
    //
    
    
} else {
    
    
    // REDIRECT TO EXIT PAGE
    header("Location: http://www.simplywed.co.uk/tools/quotes-demo/index.php"); die();
    
    
}



?>