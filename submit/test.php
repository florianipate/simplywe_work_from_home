<?php

include "../includes/connect.php";

$testqwery = SELECT cms_venue_packages.venu_ref, cms_venue_packages.venue_package_price
    FROM cms_venue_packages 
    RIGHT JOIN csm_venue_details 
    ON cms_venue_package.venu_ref = csm_venue_details.venu_ref 
    ORDER BY venue_package_price;

$get_venues_details = mysqli_query($connection, $venue_query);
while($row = mysqli_fetch_assoc($get_venues_details)) {
    
    echo $row['venue_package_price'].'<br>';
}