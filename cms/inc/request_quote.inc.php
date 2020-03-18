<?php
if(Input::exists()){
    $validate = new Validate();
    $validation = $validate->check($_POST, array(
        'f_name' => array(
                    'name'=> 'First Name' ,
                    'required'=> true,
                ),
        'l_name' => array(
                    'name'=> 'Last Name' ,
                    'required'=> true,
                ),
        'user_email' => array(
                    'name'=> 'Email' ,
                    'required'=> true,
                ),
        'preferred_date' => array(
                    'name'=> 'Preferred Date' ,
                    'required'=> true,
                ),
        'daytime_guests' => array(
                    'name'=> 'Number of Guests Daytime' ,
                    'required'=> true,
                    'max' => 3
                ),
        'evening_guests' => array(
                    'name'=> 'Number of Guests attending in the evening' ,
                    'required'=> true,
                    'max' => 3
                ),
    
    ));
    if($validation->passed()){
        
        $preferred_date = Input::get('preferred_date');
        
        
        $separator = '-';
        $parts = explode($separator, $preferred_date);
        $weekday = date("l", mktime(0,0,0, $parts[1], $parts[2], $parts[0]));
        $weekday=str_split($weekday);
        $weekday =  $weekday[0].$weekday[1];
        $weekday  = strtolower($weekday);
        $weekday_precent_variation = $weekday.'_percent';
        
        
        
        $packages = DB::getInstance()->get('cms_venue_packages', array('available_from', '<=', $preferred_date));
            foreach($packages->results() as $package){
                $available_to = $package->available_to;
                if($available_to < $preferred_date){
                    continue;
                } else {
                    $no_of_daytime_guests = Input::get('daytime_guests');
                    $no_of_evening_guests = Input::get('evening_guests');
                    $package_daytime_guests = $package->venue_min_daytime;
                    $package_evening_guests = $package->venue_min_evening;
                    $day_extra = $no_of_daytime_guests - $package_daytime_guests;
                    $evening_extra = $no_of_evening_guests - $package_evening_guests;
//                    echo $package->$weekday.'<br>';
                    $weekday_true = intval($package->$weekday);
                    if($weekday_true === 1){
                        $precent_variation = $package->$weekday_precent_variation;
                        $package_price = $package->venue_package_price;
                        $variation = $package_price * $precent_variation / 100;
                        $daytime_extra = $package->daytime_extra_guest_price * $day_extra;
                        $evening_extra = $package->evening_extra_guest_price * $evening_extra;
//                        
                        $total_cost = $package_price + $variation + $daytime_extra + $evening_extra; 
                        
                        echo '<h1 class="text-danger">Total cost: £'. $total_cost . '<h1>';
                        
//                        echo 'YES';
                    }
                    
//                    echo 'daytime extra guests: ' . $day_extra, '<br>';
//                    echo 'evening extra guests: ' . $evening_extra, '<br>';
                }
            }
        
        
       
        
    } else {                   
            foreach($validation->errors() as $error){
            echo '<span style="color:#f00">'. $error. '</span><br>';
            }
    }
}
