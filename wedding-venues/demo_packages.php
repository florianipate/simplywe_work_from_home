<?php
include "../includes/connect.php";
$package_id = 1;
$query = "SELECT* FROM cms_venue_packages WHERE id = $package_id";
$get_wedding_package = mysqli_query($connection, $query);
while($row = mysqli_fetch_assoc($get_wedding_package)) {
    $venue_ref = $row['venue_ref'];
}

$query = "SELECT* FROM cms_venue_details WHERE venue_ref = '$venue_ref'";

$venue_info = mysqli_query($connection, $query);
while($row = mysqli_fetch_assoc($venue_info)) {
    $venue_postcode = $row['postcode'];
}

function getLnt($zip){
$url = "https://maps.googleapis.com/maps/api/geocode/json?address=".urlencode($zip)."&key=AIzaSyDUb6sUYDFGheeMWV8Wl-lN9wDz6hi858A";
//    NEED TO REPLACE YOUR KEY
$result_string = file_get_contents($url);
$result = json_decode($result_string, true);
$result1[]=$result['results'][0];
$result2[]=$result1[0]['geometry'];
$result3[]=$result2[0]['location'];
return $result3[0];
}


$val = getLnt($venue_postcode);
 $venue_lat = $val['lat'];
 $venue_lng= $val['lng'];

?>

<!DOCTYPE html>
<html>
    <body>
        <div id="map" style="width:50%;height:400px;" ></div>
        <script>
            function initMap() {
            var adovys = {lat: <?php echo  $val['lat']; ?>, lng: <?php echo $val['lng']?>};
            var map = new google.maps.Map(document.getElementById('map'), {center: adovys, zoom: 17});
            var marker = new google.maps.Marker({position: adovys, map: map});
          }

        </script>
        <script async="" defer="" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDUb6sUYDFGheeMWV8Wl-lN9wDz6hi858A&amp;callback=initMap" type="text/javascript"></script>
    </body>
</html>
    
    <?php
 