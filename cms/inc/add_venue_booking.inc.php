<?php
//INSERT DATA IN TO THE DATABASE
if(isset($_POST['booking'])){
    if(Input::exists()){
        $validate = new Validate();
        $validation = $validate->check($_POST, array(
                    'date1'      => array(
                    'name'      => 'Booking Date',
                    'required'  => true
                )
            ));

        if($validation->passed()){
            $date = Input::get('date1');
            $date = str_replace('/', '-', $date);
            $add_bookings = DB::getInstance();
            try{
                $add_bookings->insert('cms_venue_booking', array(
                    'venue_ref'       =>    $venue_ref,
                    'event_date'     =>     date('Y-m-d', strtotime($date))
                ));

            } catch(Exception $e) {
            die($e->getMessage());
            }
            
        }else {                   
            foreach($validation->errors() as $error){
            echo '<span style="color:#f00">'. $error. '</span><br>';
            }
        }
        
    }
}
// GET DATA DROMTHE DATABASE --- BOOKED DATES
$booked_dates = DB::getInstance()->get('cms_venue_booking', array('venue_ref', '=', $venue_ref));
$count_dates = $booked_dates->count();
    $separator = '';
    $y = 1;
    $bookedDates ='';
    foreach($booked_dates->results() as $booked_date){
        if($y < $count_dates){
            $separator = ' ,';
        } else {
            $separator = '';
        }
        $dates = $booked_date->event_date;
        $dates = '"'.date("j-n-Y", strtotime($dates)).'"';
         $dates  .= $separator;

        $y++;
        $bookedDates .=$dates;
    }

?>