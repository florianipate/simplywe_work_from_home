<?php 
    if(isset($_POST['add_video'])){

        $file_video = $_FILES['videoes']['name'];
         if($file_video !=''){
     
            $add_bookings = DB::getInstance();
            try{
                $add_bookings->insert('cms_venue_video', array(
                    'venue_ref'       =>    $venue_ref,
                    'video_path'     =>     $file_video  
                ));
                move_uploaded_file($_FILES['videoes']['tmp_name'],'../videos/video_test/'.$file_video);
                } catch(Exception $e) {
                die($e->getMessage());
                }
         }else {
             echo '<div class="col-12 cms-bg-danger p3">
                    <h5 class="text-danger">You must choose a video file first then click the upload buton</h5>
                 </div>';
         }
         
    } 

//    GET VIDEO FROM THE DATABASE
    $venue_video = DB::getInstance()->get('cms_venue_video', array('venue_ref', '=', $venue_ref));
    if(!$venue_video->count()){
        echo '<div class="col cms-bg-danger p3 mb-4"><h4 class="text-danger"> No video has been added for this venue</h4></div>';
    } else {
        foreach($venue_video->results() as $video){
            echo '
            <div class="col-3 py-3">
                <video width="300" controls ="controls">
                    <source src="../videos/video_test/'.$video->video_path.'" type="video/mp4">
                </video>
                <div class="text-center"><a href ="delete_video.php?id='.$video->id.'">Delete</a></div>
           </div>';
        }
    }
?>