<?php 
    //function to create thumbnail
    function create_thumb($target, $ext, $thumb_path, $w, $h){
            list($w_orig, $h_orig) = getimagesize($target);
            $scale_ratio=$w_orig/$h_orig;
            if(($w/$h)>$scale_ratio)
                $w=$h*$scale_ratio;
            else
                $h=$w/$scale_ratio;

        if($w_orig<=$w){
            $w=$w_orig;
            $h=$h_orig;
        }
        $img="";
        if($ext=="gif")
            $img=imagecreatefromgif($target);
        else if($ext=="png")
            $img=imagecreatefrompng($target);
        else if($ext=="jpg")
            $img=imagecreatefromjpeg($target);

        $tci=imagecreatetruecolor($w,$h);
        imagecopyresampled($tci,$img,0,0,0,0,$w,$h,$w_orig,$h_orig);
        imagejpeg($tci,$thumb_path,90);
        imagedestroy($tci);
    }//end function create_thumb()


    if(isset($_POST['add_image'])){
        $errors=array();
        if(!empty($_FILES["image"]['name']))
        {
                //get provided file information
                $fileName    = $_FILES["image"]['name'];
                $fileExtArr  = explode('.',$fileName);//make array of file.name.ext as    array(file,name,ext)
                $fileExt     = strtolower(end($fileExtArr));//get last item of array of user file input
                $fileSize    = $_FILES["image"]['size'];
                $fileTmp     = $_FILES["image"]['tmp_name'];

                //which files we accept
                $allowed_files = array('jpg', 'jpeg', 'png');

                //validate file size
                if($fileSize > (5024*5024*5)){
                     $errors[] = 'Maximum 2MB files are allowed';
                }

                //validating file extension
                if(!in_array($fileExt,$allowed_files)){
                     $errors[] = 'only ('.implode(', ',$allowed_files).') files are allowed.';            
                }


                // check errors array if empty
                if(empty($errors)){
                    
                    if($fileName !=''){
                        $add_image = DB::getInstance();
                        try{
                            $add_image->insert('cms_venue_images', array(
                                'venue_ref'       =>    $venue_ref,
                                'image_path'     =>     $fileName  
                            ));
                            move_uploaded_file($fileTmp, '../images/venues/large/'.$fileName);
                            } catch(Exception $e) {
                            die($e->getMessage());
                            }
                     }else {
                         echo '<div class="col-12 cms-bg-danger p3">
                                <h5 class="text-danger">You must choose an image file first then click the upload buton</h5>
                             </div>';
                     }
                     // create thumbnails by create_thumb() function
                     create_thumb('../images/venues/large/'.$fileName, $fileExt, '../images/venues/small/'.$fileName, 300, 200);
                }else{
                     echo 'Some Error Occured: <br>'.implode('<br>',$errors);
                }


        }else{
           $errors[] = 'No Image is provided.';
        }    
        
//====================================================================================================        
        
////      COUNT TOTAL OF FILES FOR UPLOADING
//     $countfiles = count($_FILES['file']['name']);
//
////     LOOPING ALL FILES AND INSERT DATA TO THE DTABASE
//     for($i=0;$i<$countfiles;$i++){
//        $filename = $_FILES['file']['name'][$i];
//         if($filename !=''){
//     
//            $add_bookings = DB::getInstance();
//            try{
//                $add_bookings->insert('cms_venue_images', array(
//                    'venue_ref'       =>    $venue_ref,
//                    'image_path'     =>     $filename  
//                ));
//                move_uploaded_file($_FILES['file']['tmp_name'][$i],'../images/venues/large_test/'.$filename);
//                } catch(Exception $e) {
//                die($e->getMessage());
//                }
//         }else {
//             echo '<div class="col-12 cms-bg-danger p3">
//                    <h5 class="text-danger">You must choose an image file first then click the upload buton</h5>
//                 </div>';
//         }
//         
//         } 
        
        
//=========================================================================================================
    } 

//    GET IMAGES FROM THE DATABASE
    $venue_images = DB::getInstance()->get('cms_venue_images', array('venue_ref', '=', $venue_ref));
    if(!$venue_images->count()){
        echo '<div class="col cms-bg-danger p3 mb-4"><h4 class="text-danger"> No image has been added for this venue</h4></div>';
    } else {
        foreach($venue_images->results() as $image){
            echo '<div class="col-3 py-3">
            <img src="../images/venues/small/'.$image->image_path.'" style="max-height:100px;">
            <div class="text-center"><a href ="delete_image.php?id='.$image->id.'">Delete</a></div>
            </div>';
        }
    }
?>