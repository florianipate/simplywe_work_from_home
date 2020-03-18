<!DOCTYPE html>
<html lang="en"><head>
<meta charset="UTF-8" />
<title>Fantastic Wedding Deals</title>
<meta name="description" content="Fantastic Wedding Deals" />
<meta name="robots" content="noindex,nofollow,noodp,noydir" />
<meta name="author" content="Jason Cheeseborough" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
    
    
<!-- BOOTSTRAP / STYLE CSS -->
<link href="css/style.css" rel="stylesheet">
<link href="/css/core/bootstrap-datepicker.min.css" rel="stylesheet">
<link href="/css/core/bootstrap.min.css" rel="stylesheet">
<link href="/images/favicon.ico" rel="icon" type="image/ico" />
    
    
<!-- FONT AWESOME CSS -->
<script src="https://kit.fontawesome.com/0781172ae7.js" crossorigin="anonymous"></script>


</head><body>
<?php include_once ("includes/notice.php"); ?>
<?php include_once ("includes/header.php"); ?>
<section id="content" class="content">
<div class="container-fluid image-cover">
    <div class="row">
        <div class="container py-5">
            <div class="row">
                <div class="col-md-7">
                    <h1 class="font-50 txt-white">Fantastic Wedding Deals<br />Up to 60% OFF</h1>
                </div>
                <div class="col-md-5 bck-white" style="min-height: 450px;">
                    <div id="id-typeform" class="typeform-widget" style="width: 100%; height: 450px;"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="container py-5">
            <div class="row">
                <div class="col-md-8">
                    <h2 class="font-32 pb-3">Why Use Simply Wed?</h2>
                    <ul class="font-22">
                        <li>Up to 60% OFF Wedding Packages.</li>
                        <li>Prime and out of season dates available.</li>
                        <li>Exclusive Wedding Deals.</li>
                        <li>We work with over 70 Wedding Venues.</li>
                        <li>Available 7 days a week.</li>
                        <li>Very simple and easy process.</li>
                        <li>Wedding estimates at a touch of a button.</li>
                        <li>Arrange a show around with the venue.</li>
                    </ul><br />
                    <h3 class="font-32 pb-3">How We Work</h3>
                    <ul class="font-22">
                        <li>Venues ask us to sell selected dates.</li>
                        <li>We promote these deals.</li>
                        <li>We show estimate of wedding costs.</li>
                        <li>We schedule a viewing of the venue.</li>
                        <li>Couples pay the deposit to the venue.</li>
                        <li>Simple, Quick and Stress-Free.</li>
                    </ul><br />
                </div>
                <div class="col-md-4 text-center">
                    <h4 class="font-32">Some of our Deals</h4>
                    <div class="row">
                        <div class="col pt-4">
                            <div class="row">
                                <div class="col">
                                    <img src="images/horsley-park.jpg" class="img-fluid" alt=""/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col pt-3">
                                    <p class="font-22"><b>36% OFF - A Hotel in East Horsley (Surrey)</b></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col pt-4">
                            <div class="row">
                                <div class="col">
                                    <img src="images/hadlow-manor.jpg" class="img-fluid" alt=""/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col pt-3">
                                    <p class="font-22"><b>25% OFF - A Manor House in Hadlow (Kent)</b></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--<div class="row">
                        <div class="col pt-4">
                            <div class="row">
                                <div class="col">
                                    <img src="images/buxsted-park.jpg" class="img-fluid" alt=""/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col pt-3">
                                    <p class="font-22"><b>25% OFF - A Manor House in Buxted (Sussex)</b></p>
                                </div>
                            </div>
                        </div>
                    </div>-->
                </div>
            </div>
        </div>
    </div>
</div>
</section>


<!-- JAVASCRIPT FOR BOOTSTRAP ELEMENTS -->
<script src="/js/core/jquery-3.3.1.slim.min.js" type="text/javascript"></script>
<script src="/js/core/popper.min.js" type="text/javascript"></script>
<script src="/js/core/bootstrap.min.js" type="text/javascript"></script>
    
    
<!-- JAVASCRIPT FOR TYPEFORM EMBED -->
<script src="https://embed.typeform.com/embed.js" type="text/javascript"></script><script type="text/javascript">window.addEventListener("DOMContentLoaded", function() {var el = document.getElementById("id-typeform");<?php $ref = md5(openssl_random_pseudo_bytes(16)); ?>window.typeformEmbed.makeWidget(el, "https://matthewwiseman603516.typeform.com/to/hG893W?sref=<?php echo $ref?>", {hideFooter: true,hideHeaders: true,opacity: 0,onSubmit: function() {document.location.href="./submit/processing.php?sref=<?php echo $ref?>";}});});</script>


</body></html>