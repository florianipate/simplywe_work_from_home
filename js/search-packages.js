/*-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
/* FETCH VENUE PACKAGES FUNCTION */
function packageSearch() {
    
    
    /* FETCH SESSION VARIABLES */
    var venueRef = $("#venueRef").val();
    var venueName = $("#venueName").val();
    
    
    /* DISPLAY PAGE HEADING ACCORDING TO CHOSEN COUNTY */
    document.getElementById('heading').innerHTML = '<h1 class="font-30">ALL WEDDING PACKAGES FOR <u>' + venueName.toUpperCase() + '</u></h1>';
    
    
    /* SEND LOCATION DETAILS TO FETCH VENUES VIA AJAX */
    var dataString = 'venue_ref=' + venueRef + '&venue_name=' + venueName;
    $.ajax({
        type: "POST",
        url: "https://www.simplywed.co.uk/submit/get-packages.php",
        data: dataString, cache: false, error: function () {
            alert("Sorry, there was a problem fetching wedding packages. Please refresh and try again.");
        }, complete: function (response) {
            packageDisplay(response.responseText);
        }
    });
    
    
}




/*-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
/* DISPLAY VENUE PACKAGES FUNCTION */
function packageDisplay(packages) {
    
    
    /* FETCH JSON */
    var allPackages = JSON.parse(packages);
    var i; var packageItems = "";
    for (i = 0; i < allPackages.length; i++) {
        
        
        /* FECTH DATA FOR NESTED ARRAYS */
        var venueRef = allPackages[i]["venue_ref"];
        var venueName = allPackages[i]["venue_name"];
        var venuePackage = allPackages[i]["venue_package"];
        var venuePackageSubtitleLine1 = allPackages[i]["venue_package_subtitle_line_1"];
        var venuePackageSubtitleLine2 = allPackages[i]["venue_package_subtitle_line_2"];
        var venuePackagePrice = allPackages[i]["venue_package_price"];
        var availableFrom = allPackages[i]["available_from"];
        var availableTo = allPackages[i]["available_to"];
        var packageId = allPackages[i]["package_id"];
        var imagePath = allPackages[i]["image_path"];
        
        
        /* CONSTRUCT IMAGE PATH URL */
        if (imagePath !== "") {var imagePathUrl = '/images/venues/small/' + imagePath;} else {var imagePathUrl = '/images/venues/small/placeholder.jpg';}
        
        
        /* CONSTRUCT VENUE DISPLAY */
        packageItems += '<div class="row"><div class="col"><div class="row bck-white rounded p-3 mb-4 shadow-sm"><div class="col-md-3 px-0"><img src="' + imagePathUrl + '" width="100%" height="100%" class="d-block" alt="' + venueName + '"></div><div class="col-md-6 py-3 px-0 py-md-0 px-md-3"><div class="row"><div class="col"><p class="font-30 mb-2">' + venueName + '</p><p class="font-20 txt-purple mb-2"><b>' + venuePackage + '</b></p><p class="font-18 txt-purple mb-2"><b>From:</b> ' + formatDate(availableFrom) + ' <b>To:</b> ' + formatDate(availableTo) + '</p><p class="font-18 txt-purple mb-2">' + venuePackageSubtitleLine1 + '</p><p class="font-18 txt-purple mb-2">' + venuePackageSubtitleLine2 + '</p></div></div></div><div class="col-md-3 py-3 bck-purple text-center"><div class="row"><div class="col txt-white"><p class="font-30"><b>Prices From £' + formatNumber(venuePackagePrice) + '</b></p></div></div><div class="row"><div class="col"><a href="https://www.simplywed.co.uk/wedding-venues/view-package.php?v=' + venueRef + '&p=' + packageId + '" style="text-decoration:none;"><div class="button btn-orange">Get Your Price <i class="fas fa-angle-right" style="float:right;"></i></div></a></div></div></div></div></div></div>';
        
        
        /* DISPLAY VENUES */
        document.getElementById('packages').innerHTML = packageItems;
        
        
    }
    
    
}




/*-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
/* FORMAT PRICE FUNCTION */
function formatNumber(number) {
    var num_parts = number.toString().split(".");
    num_parts[0] = num_parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return num_parts.join(".");
}




/*-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
/* FORMAT DATE FUNCTION */
function formatDate(input) {
    var datePart = input.match(/\d+/g),
    year = datePart[0].substring(0,4),
    month = datePart[1], day = datePart[2];
    return day + '/' + month + '/' + year;
}