<?php
        if(Input::exists()){
            $validate = new Validate();
            $validation = $validate->check($_POST, array(
                'venue_name' => array(
                    'name' => 'Venue Name',
                    'required' => true,
                    'min' => 3,
                    'max' =>50
                ),
                'address_line_1' => array(
                    'name'=> 'First line of addres is require' ,
                    'required'=> true,
                    'min' => 3,
                    'max' =>50
                ),
                'town_city' => array(
                    'name'=> 'Town or City',
                    'required'=> true,
                    'min' => 3,
                    'max' =>50
                ),
                'county' => array(
                    'name' => 'County',
                    'required' => true,
                    'min' => 2,
                    'max' =>20
                ),
                'postcode' => array(
                    'name' => 'Postcode',
                    'required' => true,
                    'min' => 2,
                    'max' =>11
                ),
                'venue_email' => array(
                    'name' => 'Email',
                    'min' => 3,
                    'max' =>50
                    
                ),
                'venue_description' =>array(
                    'name' => 'Venue Description',
                    'required' => true,
                    'min' => 2,
                    'max' =>5000
                )
            ));
            if($validation->passed()){
                $quote_price_visibility = (!isset($_POST['quote_price_visibility']))? 0 : 1;
                Session::put('venue_ref', escape($venue_ref));
                Session::put('venue_name', escape(Input::get('venue_name')));
                Session::put('address_line_1', escape(Input::get('address_line_1')));
                Session::put('address_line_2', escape(Input::get('address_line_2')));
                Session::put('address_line_3', escape(Input::get('address_line_3')));
                Session::put('town_city', escape(Input::get('town_city')));
                Session::put('county', escape(Input::get('county')));
                Session::put('postcode', escape(Input::get('postcode')));
                Session::put('venue_email', escape(Input::get('venue_email')));
                Session::put('venue_max_daytime', escape(Input::get('venue_max_daytime')));
                Session::put('venue_max_evening', escape(Input::get('venue_max_evening')));
                Session::put('venue_description', escape(Input::get('venue_description')));
                Session::put('quote_price_visibility', escape($quote_price_visibility));
                Redirect::to('preview-venue-info.php?id='.$venue_id);
            }
             else {                   
                foreach($validation->errors() as $error){
                echo '<span style="color:#f00">'. $error. '</span><br>';
                }
            }
        }

?>