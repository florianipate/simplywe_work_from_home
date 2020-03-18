/*-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
/* FETCH VENUE PACKAGES FUNCTION */
function venueSearch() {
    
    
    /* FETCH SEARCH FILTER VARIABLES */
    var filterCounty = $("#filter_county").val();
    var filterDaytime = $("#filter_daytime").val();
    var filterEvening = $("#filter_evening").val();
    var filterSort = $("#filter_sort").val();
    
    
    /* DISPLAY PAGE HEADING ACCORDING TO CHOSEN COUNTY */
    if (filterCounty === "") {
        document.getElementById('heading').innerHTML = '<h1 class="font-30">ALL WEDDING VENUES FROM AROUND THE UK</h1>';
    } else {
        document.getElementById('heading').innerHTML = '<h1 class="font-30">ALL WEDDING VENUES IN ' + filterCounty.toUpperCase() + '</h1>';
    }
    
    
    /* SEND LOCATION DETAILS TO FETCH VENUES VIA AJAX */
    var dataString = 'county_filter=' + filterCounty + '&daytime_filter=' + filterDaytime + '&evening_filter=' + filterEvening + '&sort_filter=' + filterSort;
    $.ajax({
        type: "POST",
        url: "https://www.simplywed.co.uk/submit/get-venues.php",
        data: dataString, cache: false, error: function () {
            alert("Sorry, there was a problem fetching wedding venues. Please refresh and try again.");
        }, complete: function (response) {
            venueDisplay(response.responseText);
        }
    });
    
    
}




/*-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
/* DISPLAY VENUE PACKAGES FUNCTION */
function venueDisplay(venues) {
    
    
    /* FETCH JSON */
    var allVenues = JSON.parse(venues);
    var i; var venueItems = ""; var address = "";
    for (i = 0; i < allVenues.length; i++) {
        
        
        /* FECTH DATA FOR NESTED ARRAYS */
        //alert(JSON.stringify(allVenues[i]))
        var venueRef = allVenues[i]["venue_ref"];
        var venueName = allVenues[i]["venue_name"];
        var townCity = allVenues[i]["town_city"];
        var county = allVenues[i]["county"];
        var postcode = allVenues[i]["postcode"];
        var maxDaytime = allVenues[i]["max_daytime"];
        var maxEvening = allVenues[i]["max_evening"];
        var venuePackage = allVenues[i]["venue_package"];
        var venuePackagePrice = allVenues[i]["venue_package_price"];
        var imagePath = allVenues[i]["image_path"];


        /* CONSTRUCT ADDRESS VARIABLE */
        if (townCity !== "") {address += townCity + ', ';}
        if (county !== "") {address += county + ', ';}
        if (postcode !== "") {address += postcode + '.';}


        /* CONSTRUCT IMAGE PATH URL */
        if (imagePath !== "") {var imagePathUrl = '/images/venues/small/' + imagePath;} else {var imagePathUrl = '/images/venues/small/placeholder.jpg';}


        /* CONSTRUCT VENUE DISPLAY */
        venueItems += '<div class="row"><div class="col"><div class="row bck-white rounded p-3 mb-4 shadow-sm"><div class="col-md-3 px-0"><img src="' + imagePathUrl + '" width="100%" height="100%" class="d-block" alt="' + venueName + '"></div><div class="col-md-6 py-3 px-0 py-md-0 px-md-3"><div class="row"><div class="col"><p class="font-30 mb-2">' + venueName + '</p><p class="font-18 txt-purple mb-2">' + address + '</p><p class="font-20 txt-purple mb-2"><b>' + venuePackage + '</b></p><p class="font-18 txt-purple mb-0">Max Daytime Guests - ' + maxDaytime + '</p><p class="font-18 txt-purple mb-0">Max Evening Guests - ' + maxEvening + '</p></div></div></div><div class="col-md-3 py-3 bck-purple text-center"><div class="row"><div class="col txt-white"><p class="font-30"><b>Prices From £' + venuePackagePrice + '</b></p></div></div><div class="row"><div class="col"><a href="https://www.simplywed.co.uk/wedding-venues/packages.php?r=' + venueRef + '&v=' + venueName + '" style="text-decoration:none;"><div class="button btn-orange">Get Your Price <i class="fas fa-angle-right" style="float:right;"></i></div></a></div></div></div></div></div></div>';


        /* CLEAR ADDRESS VARIABLE */
        var address = "";


        /* DISPLAY VENUES */
        document.getElementById('venues').innerHTML = venueItems;
        
        
    }
    
    
}




/*-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
/* FORMAT PRICE FUNCTION */
function formatNumber(number) {
    var num_parts = number.toString().split(".");
    num_parts[0] = num_parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return num_parts.join(".");
}