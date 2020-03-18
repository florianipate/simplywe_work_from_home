<?php
        if(Input::exists()){
            $validate = new Validate();
            $validation = $validate->check($_POST, array(
                'venue_ref' => array(
                    'name' => 'The Venue Referance/ID',
                    'required' => true,
                    'min' => 3,
                    'max' =>10,
                    'exists' =>'cms_venue_details'
                ),
                'venue_package' => array(
                    'name'=> 'The Package Title' ,
                    'required'=> true,
                    'min' => 3,
                    'max' =>256
                ),
                'venue_package_price' => array(
                    'name'=> 'The Package price',
                    'required'=> true,
                    'max' =>10
                ),
                'available_from' => array(
                    'name' => 'Available from date',
                    'required' => true
                ),
                'available_to' => array(
                    'name' => 'Available to date',
                    'required' => true
                ),
                'venue_min_daytime' => array(
                    'name' => 'Daytime Max Guests',
                    'required' => true,
                    'min' => 2,
                    'max' =>4
                ),
                 'venue_max_daytime' => array(
                    'name' => 'Daytime Max Guests',
                    'required' => true,
                    'min' => 2,
                    'max' =>4
                ),
                'venue_min_evening' => array(
                    'name' => 'Evening Max Guests',
                    'required' => true,
                    'min' => 2,
                    'max' =>11
                ),
                'venue_max_evening' => array(
                    'name' => 'Evening Max Guests',
                    'required' => true,
                    'min' => 2,
                    'max' =>11
                )
            ));
            if($validation->passed()){
                if(!isset($_POST['monday']) && 
                    !isset($_POST['tuesday']) && 
                    !isset($_POST['wednesday']) && 
                    !isset($_POST['thursday']) && 
                    !isset($_POST['friday']) && 
                    !isset($_POST['saturday']) && 
                    !isset($_POST['sunday'])
                   ){
            echo '<span style="color:#f00">You must select at least on day of the week!</span><br>';
            } else{
                
                $dj_included = ($_POST['dj_price_inc'] == 'yes')? 1 : 0;
                
                $venue_ref =Input::get('venue_ref');
                
                $venue_info = DB::getInstance()->get('cms_venue_details', array('venue_ref', '=',  $venue_ref));
                
                
                $venue_id = $venue_info->first()->id;
                $package = DB::getInstance();
                
                $monday = (!isset($_POST['monday']))? 0 : 1;
                $tuesday = (!isset($_POST['tuesday']))? 0 : 1;
                $wednesday = (!isset($_POST['wednesday']))? 0 : 1;
                $thursday = (!isset($_POST['thursday']))? 0 : 1;
                $friday = (!isset($_POST['friday']))? 0 : 1;
                $saturday = (!isset($_POST['saturday']))? 0 : 1;
                $sunday = (!isset($_POST['sunday']))? 0 : 1;

                
                try{
                    $package->update('cms_venue_packages', $package_id , array(
                        'venue_ref'                         => Input::get('venue_ref'),
                        'venue_package'                     => Input::get('venue_package'),
                        'venue_package_subtitle_line_1'     => Input::get('venue_package_subtitle_line_1'),
                        'venue_package_subtitle_line_2'     => Input::get('venue_package_subtitle_line_2'),
                        'venue_package_price'               => Input::get('venue_package_price'),
                        'daytime_extra_guest_price'         => Input::get('daytime_extra_price'),
                        'evening_extra_guest_price'         => Input::get('evening_extra_price'),
                        'venue_min_daytime'                 => Input::get('venue_min_daytime'),
                        'venue_max_daytime'                 => Input::get('venue_max_daytime'),
                        'venue_min_evening'                 => Input::get('venue_min_evening'),
                        'venue_max_evening'                 => Input::get('venue_max_evening'),
                        'available_from'                    => Input::get('available_from'),
                        'available_to'                      => Input::get('available_to'),
                        'mo'                                => $monday,
                        'tu'                                => $tuesday,
                        'we'                                => $wednesday,
                        'th'                                => $thursday,
                        'fr'                                => $friday,
                        'sa'                                => $saturday,
                        'su'                                => $sunday,
                        'mo_percent'                        => Input::get('mo_percent'),
                        'tu_percent'                        => Input::get('tu_percent'),
                        'we_percent'                        => Input::get('we_percent'),
                        'th_percent'                        => Input::get('th_percent'),
                        'fr_percent'                        => Input::get('fr_percent'),
                        'sa_percent'                        => Input::get('sa_percent'),
                        'su_percent'                        => Input::get('su_percent'),
                        'dj_included'                       => $dj_included,
                        'dj_price'                          => Input::get('dj_price')
                    ));
                    Redirect::to('venue-info-page.php?id='.$venue_id);
                } catch(Exception $e) {
                    die($e->getMessage());
                    }
                }
            }
             else {                   
                foreach($validation->errors() as $error){
                echo '<span style="color:#f00">'. $error. '</span><br>';
                }
                 if(!isset($_POST['monday']) && 
                    !isset($_POST['tuesday']) && 
                    !isset($_POST['wednesday']) && 
                    !isset($_POST['thursday']) && 
                    !isset($_POST['friday']) && 
                    !isset($_POST['saturday']) && 
                    !isset($_POST['sunday'])
                   ){
            echo '<span style="color:#f00">You must select at least on day of the week!</span><br>';
        }
            }
        }

?>