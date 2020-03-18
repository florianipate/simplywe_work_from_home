/*-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
/* START QUOTATION FUNCTION */
$(document).ready(function() {
    $("#nextSlide-1").click(function() {
        valTitle();
    });
    $("#nextSlide-2").click(function() {
        valFirstName();
    });
    $("#nextSlide-3").click(function() {
        valLastName();
    });
    $("#nextSlide-4").click(function() {
        valWeddingDate();
    });
    $("#nextSlide-5").click(function() {
        valDaytimeGuests();
    });
    $("#nextSlide-6").click(function() {
        valEveningGuests();
    });
    $("#nextSlide-7").click(function() {
        valEveningEntertain();
    });
    $("#nextSlide-8").click(function() {
        valEmailAddress();
    });
    $("#nextSlide-9").click(function() {
        valContactNumber();
    });
    $("#nextSlide-10").click(function() {
        submitQuote();
    });
    $("#backSlide-2").click(function() {
        $("#quote-slide-2").hide();
        $("#quote-slide-1").show();
    });
    $("#backSlide-3").click(function() {
        $("#quote-slide-3").hide();
        $("#quote-slide-2").show();
    });
    $("#backSlide-4").click(function() {
        $("#quote-slide-4").hide();
        $("#quote-slide-3").show();
    });
    $("#backSlide-5").click(function() {
        $("#quote-slide-5").hide();
        $("#quote-slide-4").show();
    });
    $("#backSlide-6").click(function() {
        $("#quote-slide-6").hide();
        $("#quote-slide-5").show();
    });
    $("#backSlide-7").click(function() {
        $("#quote-slide-7").hide();
        $("#quote-slide-6").show();
    });
    $("#backSlide-8").click(function() {
        $("#quote-slide-8").hide();
        $("#quote-slide-7").show();
    });
    $("#backSlide-9").click(function() {
        $("#quote-slide-9").hide();
        $("#quote-slide-8").show();
    });
    $("#backSlide-10").click(function() {
        $("#quote-slide-10").hide();
        $("#quote-slide-9").show();
    });
});




/*-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
/* FETCH QUOTATION PRICING FUNCTION */
function submitQuote(number) {
    
    
    /* FETCH QUOTATION DETAILS */
    var venueName = $("#venueName").val();
    var venueMaxDaytime = $("#venueMaxDaytime").val();
    var venueMaxEvening = $("#venueMaxEvening").val();
    var venueMaxHotelRooms = $("#venueMaxHotelRooms").val();
    var venueHotelRoomPrice = $("#venueHotelRoomPrice").val();
    var weddingDate = $("#weddingDate").val();
    var daytimeGuests = $("#daytimeGuests").val();
    var eveningGuests = $("#eveningGuests").val();
    var eveningEntertain = $("#eveningEntertain").val();
    var title = $("#title").val();
    var firstName = $("#firstName").val();
    var lastName = $("#lastName").val();
    var contactNumber = $("#contactNumber").val();
    var emailAddress = $("#emailAddress").val();
    
    
    /* CONVERT DATE STRING INTO DATE OBJECT */
    var dateParts = weddingDate.split("/");
    var dateObject = new Date(+dateParts[2], dateParts[1] - 1, +dateParts[0]);
    
    
    /* CONVERT DATE OBJECT (DAY) FROM INTERGER TO STRING */
    if (dateObject.getDay() == 1) {
        var weddingDay = "Monday";
    } else if (dateObject.getDay() == 2) {
        var weddingDay = "Tuesday";
    } else if (dateObject.getDay() == 3) {
        var weddingDay = "Wednesday";
    } else if (dateObject.getDay() == 4) {
        var weddingDay = "Thursday";
    } else if (dateObject.getDay() == 5) {
        var weddingDay = "Friday";
    } else if (dateObject.getDay() == 6) {
        var weddingDay = "Saturday";
    } else if (dateObject.getDay() == 0) {
        var weddingDay = "Sunday";
    }
    
    
    /* CONVERT DATE OBJECT (MONTH) FROM INTERGER TO STRING */
    if (dateObject.getMonth() == 0) {
        var weddingMonth = "January";
    } else if (dateObject.getMonth() == 1) {
        var weddingMonth = "February";
    } else if (dateObject.getMonth() == 2) {
        var weddingMonth = "March";
    } else if (dateObject.getMonth() == 3) {
        var weddingMonth = "April";
    } else if (dateObject.getMonth() == 4) {
        var weddingMonth = "May";
    } else if (dateObject.getMonth() == 5) {
        var weddingMonth = "June";
    } else if (dateObject.getMonth() == 6) {
        var weddingMonth = "July";
    } else if (dateObject.getMonth() == 7) {
        var weddingMonth = "August";
    } else if (dateObject.getMonth() == 8) {
        var weddingMonth = "September";
    } else if (dateObject.getMonth() == 9) {
        var weddingMonth = "October";
    } else if (dateObject.getMonth() == 10) {
        var weddingMonth = "November";
    } else if (dateObject.getMonth() == 11) {
        var weddingMonth = "December";
    }
    
    
    /* SEND WEDDING QUOTATION DETAILS TO FETCH PRICING VIA AJAX */
    var dataString = 'venue_name=' + venueName + '&venue_max_daytime=' + venueMaxDaytime + '&venue_max_evening=' + venueMaxEvening + '&venue_max_hotel_rooms=' + venueMaxHotelRooms + '&venue_hotel_room_price=' + venueHotelRoomPrice + '&wedding_date=' + weddingDate + '&wedding_month=' + weddingMonth + '&wedding_day=' + weddingDay + '&daytime_guests=' + daytimeGuests + '&evening_guests=' + eveningGuests + '&evening_entertain=' + eveningEntertain + '&title=' + title + '&first_name=' + firstName + '&last_name=' + lastName + '&contact_number=' + contactNumber + '&email_address=' + emailAddress;
    $.ajax({
        type: "POST",
        url: "https://www.simplywed.co.uk/tools/quotes-demo/submit/get-pricing.php",
        data: dataString,
        cache: false,
        error: function () {
            alert("Sorry, there was a problem fetching venue pricing for your selected date. Please refresh and try again.");
        }, complete: function (response) {
            processQuote(response.responseText);
        }
    });
    
    
}




/*-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
/* CALCULATE QUOTATION FUNCTION */
function processQuote(pricing) {
    
    
    /* PULL ARRAYS FROM MASTER ARRAY */
    var pricing = JSON.parse(pricing);
    var details = pricing[0];
    
    
    /* PULL STATIC DATA FROM PRICE ARRAYS */
    var venueName = details["venue_name"];
    var venueMaxDaytime = details["venue_max_daytime"];
    var venueMaxEvening = details["venue_max_evening"];
    var venueMaxHotelRooms = details["venue_max_hotel_rooms"];
    var venueHotelRoomPrice = details["venue_hotel_room_price"];
    var weddingDate = details["wedding_date"];
    var weddingMonth = details["wedding_month"];
    var daytimeGuests = details["daytime_guests"];
    var eveningGuests = details["evening_guests"];
    var eveningEntertain = details["evening_entertain"];
    var contactNumber = details["contact_number"];
    var emailAddress = details["email_address"];
    
    
    /* COMBINE FULL NAME */
    var title = details["title"];
    var firstName = details["first_name"];
    var lastName = details["last_name"];
    var fullName = title + ' ' + firstName + ' ' + lastName;
    
    
    /* FETCH PRICING DATA FROM ARRAY */
    var i;
    var number;
    var pricing = [pricing[1], pricing[2], pricing[3], pricing[4]];
    for (i = 0; i < 4; i++) {
        number = i + 1;
        
        
        /* CHECK FOR OPTIONAL EXTRAS */
        if (eveningEntertain == "Yes") {
            window["extEveningEntertain" + number] = pricing[i]["ext_evening_entertain"];
        } else {
            window["extEveningEntertain" + number] = 0;
        }
        
        
        /* CALCULATE PRICING DATA FOR ESTIMATES */
        window["weddingDay" + number] = pricing[i]["wedding_day"];
        window["packagePrice" + number] = pricing[i]["package_price"];
        window["packageGuests" + number] = pricing[i]["package_guests"];
        window["daytimePrice" + number] = pricing[i]["daytime_price"];
        window["eveningPrice" + number] = pricing[i]["evening_price"];
        window["remainingDaytime" + number] = Number(daytimeGuests) - Number(window["packageGuests" + number]);
        window["remainingEvening" + number] = Number(eveningGuests) - Number(window["packageGuests" + number]);
        window["addDaytimeTotal" + number] = Number(window["remainingDaytime" + number]) * Number(window["daytimePrice" + number]);
        window["addEveningTotal" + number] = Number(window["remainingEvening" + number]) * Number(window["eveningPrice" + number]);
        window["packageTotal" + number] = Number(window["packagePrice" + number]) + Number(window["addDaytimeTotal" + number]) + Number(window["addEveningTotal" + number]) + Number(window["extEveningEntertain" + number]);
        
        
    }
    
    
    /* SEND COMPLETE WEDDING QUOTATION FOR SUBMISSION VIA AJAX */
    var dataString = 'venue_name=' + venueName + '&venue_max_hotel_rooms=' + venueMaxHotelRooms + '&venue_hotel_room_price=' + venueHotelRoomPrice + '&wedding_date=' + weddingDate + '&evening_entertain=' + eveningEntertain + '&full_name=' + fullName + '&contact_number=' + contactNumber + '&email_address=' + emailAddress + '&package_price_one=' + packagePrice1 + '&package_guests_one=' + packageGuests1 + '&add_daytime_total_one=' + addDaytimeTotal1 + '&remaining_daytime_one=' + remainingDaytime1 + '&daytime_price_one=' + daytimePrice1 + '&add_evening_total_one=' + addEveningTotal1 + '&remaining_evening_one=' + remainingEvening1 + '&evening_price_one=' + eveningPrice1 + '&ext_evening_entertain_one=' + extEveningEntertain1 + '&package_total_one=' + packageTotal1 + '&wedding_day_two=' + weddingDay2 + '&package_total_two=' + packageTotal2 + '&wedding_day_three=' + weddingDay3 + '&package_total_three=' + packageTotal3 + '&wedding_day_four=' + weddingDay4 + '&package_total_four=' + packageTotal4;
    $.ajax({
        type: "POST",
        url: "https://www.simplywed.co.uk/tools/quotes-demo/submit/submit-quote.php",
        data: dataString,
        cache: false,
        complete: function (response) {
            calculateQuote(response.responseText);
        }, error: function () {
            alert("Sorry, there was a problem submitting your quotation to us. Please refresh and try again.");
        }
    });
    
    
    /* DISPLAY FINAL QUOTE SLIDE */
    $("#quote-slide-10").hide();
    $("#quote-slide-11").show();
    
    
    /* DISPLAY PREVIEW BOOK VIEWING BUTTON */
    document.getElementById('booking').innerHTML = '<a href="https://www.simplywed.co.uk/tools/quotes-demo/viewing.php?v=' + btoa(venueName) + '&n=' + btoa(fullName) + '&e=' + btoa(emailAddress) + '&p=' + btoa(contactNumber) + '" target="_blank"><button type="button" class="button btn-purple btn-lg"><b>Book your Viewing</b></button></a>';
    
    
    /* CHANGE OUT ALT LABELS FOR WEEKDAYS */
    if (weddingDay2 == "Monday" || weddingDay2 == "Tuesday" || weddingDay2 == "Wednesday" || weddingDay2 == "Thursday") {weddingDay2 = "Weekday";}
    if (weddingDay3 == "Monday" || weddingDay3 == "Tuesday" || weddingDay3 == "Wednesday" || weddingDay3 == "Thursday") {weddingDay3 = "Weekday";}
    if (weddingDay4 == "Monday" || weddingDay4 == "Tuesday" || weddingDay4 == "Wednesday" || weddingDay4 == "Thursday") {weddingDay4 = "Weekday";}
    
    
    /* DISPLAY PREVIEW IN FINAL QUOTE SLIDE */
    document.getElementById('preview').innerHTML = '<div class="row"><div class="col"><p class="font-22 text-center"><b>SUMMARY</b></p><p><b>Venue Name</b><br />' + venueName + '</p><p><b>Wedding Date</b><br />' + weddingDate+ '</p><p><b>Base Package Price £' + formatNumber(packagePrice1) + '</b><br />Inc ' + packageGuests1 + ' Daytime & Evening Guests</p><p><b>Additional Daytime Total £' + formatNumber(addDaytimeTotal1) + '</b><br />' + remainingDaytime1 + ' Guests @ £' + formatNumber(daytimePrice1) + ' per person</p><p><b>Additional Evening Total £' + formatNumber(addEveningTotal1) + '</b><br />' + remainingEvening1 + ' Guests @ £' + formatNumber(eveningPrice1) + ' per person</p><p><b>Optional Extras</b><br />DJ Hire - £' + formatNumber(extEveningEntertain1) + '</p><p class="font-20"><b>Estimated Total - £' + formatNumber(packageTotal1) + '</b></p></div></div><div class="row"><div class="col"><div class="row"><div class="col mt-3"><b>ALTERNATE PRICES</b></div></div><div class="row"><div class="col"><b>' + weddingDay2 + '</b></div><div class="col"><b>£' + formatNumber(packageTotal2) + '</b></div></div><div class="row"><div class="col"><b>' + weddingDay3 + '</b></div><div class="col"><b>£' + formatNumber(packageTotal3) + '</b></div></div><div class="row"><div class="col"><b>' + weddingDay4 + '</b></div><div class="col"><b>£' + formatNumber(packageTotal4) + '</b></div></div></div></div><div class="row"><div class="col mt-3"><p class="font-14">All our prices are estimated and should be used as a guide only. On your visit to the wedding venues the wedding co-ordinator will be able to answer any questions you might have and will supply you with a full quotation once your arrangements have been finalised. All Prices are subject to change without notice and can exclude Bank Holidays, Sundays, Monday Public Holidays and Prime Dates. Prices will change depending on the month and day of the week.</p></div></div>';
    
    
}