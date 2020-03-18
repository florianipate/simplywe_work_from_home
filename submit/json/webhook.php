<?php
// FETCH AND DECODE JSON INPUT 
$response = file_get_contents('php://input');
$data = json_decode($response, true);


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


// SAVE DATA ON A JSON FILE
$sref = $data['form_response']['hidden']['sref'];
file_put_contents($sref, $response, FILE_APPEND);


?>