<?php
// SET TIMEZONE
date_default_timezone_set("Europe/London");


// CONNECT TO DATABASE
include "../includes/connect.php";


// FETCH DETAILS FROM URL STRING
$venue_ref = $_REQUEST["r"];
$venue_name = $_REQUEST["v"];


?>
<!DOCTYPE html>
<html lang="en"><head>
<meta charset="UTF-8" />
<title>Simplywed - Venue Packages</title>
<meta name="description" content="Simplywed - Wedding Packages" />
<meta name="robots" content="noindex,nofollow,noodp,noydir" />
<meta name="author" content="Jason Cheeseborough" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
    
    
<!-- BOOTSTRAP / STYLE CSS -->
<link href="/css/core/bootstrap-datepicker.min.css" rel="stylesheet">
<link href="/css/core/bootstrap.min.css" rel="stylesheet">
<link href="/css/style.css" rel="stylesheet">
<link href="/images/favicon.ico" rel="icon" type="image/ico" />
    
    
<!-- FONT AWESOME CSS -->
<script src="https://kit.fontawesome.com/0781172ae7.js" crossorigin="anonymous"></script>


</head><body>
<?php include "../includes/header.php"; ?>
<section id="content" class="content">
<div class="container-fluid bck-grey">
    <div class="container pt-5">
        <input type="hidden" id="venueRef" value="<?php echo $venue_ref; ?>" />
        <input type="hidden" id="venueName" value="<?php echo $venue_name; ?>" />
        <div class="row">
            <div class="col-md-9 pb-4" id="heading"></div>
            <div class="col-md-3 pb-4">
                <a href="https://www.simplywed.co.uk/" style="text-decoration:none;">
                    <div class="button btn-orange"><i class="fas fa-angle-left" style="float:left;"></i>Back to Venues</div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col pb-4" id="packages"></div>
        </div>
    </div>
</div>
</section>
<?php include "../includes/footer.php"; ?>


<!-- JAVASCRIPT FOR BOOTSTRAP ELEMENTS -->
<script src="/js/core/jquery-3.3.1.slim.min.js" type="text/javascript"></script>
<script src="/js/core/popper.min.js" type="text/javascript"></script>
<script src="/js/core/bootstrap.min.js" type="text/javascript"></script>
    

<!-- JAVASCRIPT FOR VENUE SEARCH -->
<script src="/js/core/jquery.min.js" type="text/javascript"></script>
<script src="/js/search-packages.js" type="text/javascript"></script>
<script type="text/javascript">window.onload = packageSearch;</script>


</body></html>