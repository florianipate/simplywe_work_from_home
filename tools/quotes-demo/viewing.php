<?php
// CONNECT TO DATABASE
include "../../includes/connect.php";


// FETCH DETAILS FROM URL STRING
$contact_name = base64_decode($_REQUEST["n"]);
$email_address = base64_decode($_REQUEST["e"]);
$phone_number = base64_decode($_REQUEST["p"]);
$venue_name = base64_decode($_REQUEST["v"]);


?>
<!DOCTYPE html>
<html lang="en"><head>
<meta charset="UTF-8" />
<title>Book Viewing (Demo)</title>
<meta name="description" content="Book Viewing (Demo)" />
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
<div class="container-fluid py-5">
    <div class="container text-center">
        
        
        <?php
        // CHECK FOR VENUE NAME
        if ($venue_name != "") {
            
            
            // DISPLAY BOOK VIEWING FORM
            echo '<p class="font-18 txt-red">Demo Purposes Only</p><br /><h1>Thanks for using Simplywed</h1><br /><h3>Please complete the form below to book a viewing date with the venue</h3><br /><h4>Select a date and time for your viewing</h4><br /><p class="txt-red" id="error"></p><p class="txt-green" id="message"></p><div class="col mt-4"><div class="row d-flex justify-content-center"><div class="col-md-6"><div class="alert alert-success" id="submit-message" style="display: none;"><h4>Thank you for booking a viewing with us</h4><br /><p><b>We will get back to you as soon as possible to confirm the appointment. We look forward to showing you around our beautiful wedding venue.</b></p></div><div class="row"><div class="col-4 text-left"><p><b>Your Name</b></p></div><div class="col-8 form-group pt-1 pt-lg-0"><input type="text" class="form-control" id="contactname" value="'. $contact_name .'"></div></div><div class="row"><div class="col-4 text-left"><p><b>Your Email</b></p></div><div class="col-8 form-group pt-1 pt-lg-0"><input type="email" class="form-control" id="emailaddress" value="'. $email_address .'"></div></div><div class="row"><div class="col-4 text-left"><p><b>Your Number</b></p></div><div class="col-8 form-group pt-1 pt-lg-0"><input type="number" min="0" class="form-control" id="contactnumber" value="'. $phone_number .'"></div></div><div class="row"><div class="col-4 text-left"><p><b>Venue Name</b></p></div><div class="col-8 form-group pt-1 pt-lg-0"><input type="text" class="form-control" id="venuename" value="'. $venue_name .'" disabled></div></div><div class="row"><div class="col-4 text-left"><p><b>Viewing Date</b></p></div><div class="col-8 form-group pt-1 pt-lg-0"><div class="input-group date"><input type="text" class="form-control" id="viewingdate" placeholder="DD/MM/YYYY"><div class="input-group-append"><div class="input-group-text"><i class="fas fa-calendar-alt"></i></div></div></div></div></div><div class="row"><div class="col-4 text-left"><p><b>Viewing Time</b></p></div><div class="col-8 form-group pt-1 pt-lg-0"><select class="form-control" id="viewingtime"><option value="">SELECT A TIME</option><option value="09:00">9:00 am</option><option value="10:00">10:00 am</option><option value="11:00">11:00 am</option><option value="12:00">12:00 pm</option><option value="13:00">1:00 pm</option><option value="14:00">2:00 pm</option><option value="15:00">3:00 pm</option><option value="16:00">4:00 pm</option><option value="17:00">5:00 pm</option><option value="18:00">6:00 pm</option><option value="19:00">7:00 pm</option></select></div></div><div class="row" id="submit-button" style="display: block;"><div class="col form-group pt-1 pt-lg-0"><button class="button btn-purple btn-lg" type="submit" onclick="bookViewing()">BOOK VIEWING</button></div></div><div class="row" id="back-button" style="display: none;"><div class="col form-group pt-1 pt-lg-0"><a href="https://www.simplywed.co.uk/tools/quotes-demo/"><button class="button btn-purple btn-lg" type="submit">BACK TO VENUES</button></a></div></div></div></div></div>';
            
            
        } else {
            
            
            // DISPLAY ERROR PAGE CONTENT
            echo '<h1>SORRY, THERE WAS A PROBLEM</h1><h2>If you continue getting message please call us on <a href="tel:02038411045">0203 841 1045</a></h2><br /><h2>Alternatively, you can <a href="https://www.simplywed.co.uk">click here</a> to try again.</h2><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />';
            
            
        }
        echo '<br /><br /><br /><br />';
        ?>
                
        
    </div>
</div>
</section>
<?php include "includes/footer.php"; ?>


<!-- JAVASCRIPT FOR BOOTSTRAP ELEMENTS -->
<script src="/js/core/jquery-3.3.1.slim.min.js" type="text/javascript"></script>
<script src="/js/core/popper.min.js" type="text/javascript"></script>
<script src="/js/core/bootstrap.min.js" type="text/javascript"></script>
    
    
<!-- JAVASCRIPT FOR BOOTSTRAP DATE PICKER -->
<script src="/js/core/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script>$('.input-group.date').datepicker({format: "dd/mm/yyyy",maxViewMode: 2,clearBtn: true,autoclose: true});</script>
    
    
<!-- JAVASCRIPT FOR QUOTATION FORM HANDLING -->
<script src="/js/core/jquery.min.js" type="text/javascript"></script>
<script src="js/viewing-form.js" type="text/javascript"></script>


</body></html>