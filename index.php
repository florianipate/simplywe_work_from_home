<?php
// SET TIMEZONE
date_default_timezone_set("Europe/London");


// CONNECT TO DATABASE
include "includes/connect.php";


// SET TEST SESSION DATA
//$_SESSION["county"] = "Berkshire";


?>
<!DOCTYPE html>
<html lang="en"><head>
<meta charset="UTF-8" />
<title>Simplywed - Wedding Venues</title>
<meta name="description" content="Simplywed - Wedding Venues" />
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
<?php include "includes/header.php"; ?>
<section id="content" class="content">
<div class="container-fluid bck-grey">
    <div class="container pt-5">
        <div class="row">
            <div class="col p-3 mb-5 bck-orange rounded">
                <?php include "includes/filter.php"; ?>
            </div>
        </div>
        <div class="row">
            <div class="col pb-4 text-center" id="heading"></div>
        </div>
        <div class="row">
            <div class="col pb-4" id="venues"></div>
        </div>
    </div>
</div>
</section>
<?php include "includes/footer.php"; ?>


<!-- JAVASCRIPT FOR BOOTSTRAP ELEMENTS -->
<script src="/js/core/jquery-3.3.1.slim.min.js" type="text/javascript"></script>
<script src="/js/core/popper.min.js" type="text/javascript"></script>
<script src="/js/core/bootstrap.min.js" type="text/javascript"></script>
    

<!-- JAVASCRIPT FOR VENUE SEARCH -->
<script src="/js/core/jquery.min.js" type="text/javascript"></script>
<script src="/js/search-venues.js" type="text/javascript"></script>
<script type="text/javascript">window.onload = venueSearch;</script>


</body></html>