/*-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
/* VALIDATE EVENING ENTERTAINMENT */
function valTitle() {
    
    
    /* FETCH REQUIRED DATA */
    var userTitle = document.getElementById("title").value;
    
    
    /* CHECK IF FIRST NAME FIELD IS BLANK */
    if (userTitle == "") {
        
        
        /* DISPLAY ERROR */
        document.getElementById("error-1").innerHTML = '<b>Please select your Title</b>';
        
        
    } else {
        
        
        /* ERASE ERROR MESSAGE */
        document.getElementById("error-1").innerHTML = '';
        
        
        /* CONTINUE WITH QUOTATION */
        $("#quote-slide-1").hide();
        $("#quote-slide-2").show();
        
        
    }
}




/*-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
/* VALIDATE FIRST NAME */
function valFirstName() {
    
    
    /* FETCH REQUIRED DATA */
    var firstName = document.getElementById("firstName").value;
    
    
    /* CHECK IF FIRST NAME FIELD IS BLANK */
    if (firstName == "") {
        
        
        /* DISPLAY ERROR */
        document.getElementById("error-2").innerHTML = '<b>Please enter your First Name</b>';
        
        
    } else {
        
        
        /* ERASE ERROR MESSAGE */
        document.getElementById("error-2").innerHTML = '';
        
        
        /* CONTINUE WITH QUOTATION */
        $("#quote-slide-2").hide();
        $("#quote-slide-3").show();
        
        
    }
}




/*-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
/* VALIDATE LAST NAME */
function valLastName() {
    
    
    /* FETCH REQUIRED DATA */
    var lastName = document.getElementById("lastName").value;
    
    
    /* CHECK IF LAST NAME FIELD IS BLANK */
    if (lastName == "") {
        
        
        /* DISPLAY ERROR */
        document.getElementById("error-3").innerHTML = '<b>Please enter your Last Name</b>';
        
        
    } else {
        
        
        /* ERASE ERROR MESSAGE */
        document.getElementById("error-3").innerHTML = '';
        
        
        /* CONTINUE WITH QUOTATION */
        $("#quote-slide-3").hide();
        $("#quote-slide-4").show();
        
        
    }
}




/*-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
/* VALIDATE WEDDING DATE */
function valWeddingDate() {
    
    
    /* FETCH REQUIRED DATA */
    var venueName = document.getElementById("venueName").value;
    var weddingDate = document.getElementById("weddingDate").value;
    
    
    /* CHECK IF WEDDING DATE FIELD IS BLANK */
    if (weddingDate == "") {
        
        
        /* DISPLAY ERROR */
        document.getElementById("error-4").innerHTML = '<b>Please enter a Wedding Date</b>';
        
        
    } else {
        
        
        /* GET CURRENT DATE IN DD/MM/YYYY FORMAT */
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1;
        var yyyy = today.getFullYear();
        if (dd < 10) {dd = '0' + dd;} 
        if (mm < 10) {mm = '0' + mm;} 
        var currentDate = dd + '/' + mm + '/' + yyyy;
        
        
        /* CONVERT WEDDING DATA, CURRENT DATE AND BUFFER DATE STRINGS INTO DATE OBJECTS */
        var weddingDateParts = weddingDate.split("/");
        var weddingDateObject = new Date(+weddingDateParts[2], weddingDateParts[1] - 1, +weddingDateParts[0]);
        var currentDateParts = currentDate.split("/");
        var currentDateObject = new Date(+currentDateParts[2], currentDateParts[1] - 1, +currentDateParts[0]);
        var weddingBuffParts = currentDate.split("/");
        var weddingBuffObject = new Date(+weddingBuffParts[2], weddingBuffParts[1] - 1, +weddingBuffParts[0]);
        
        
        /* DEFINE WEDDING BUFFER DATE - CURRENT DATE + 14 DAYS */
        var weddingBuffObject;
        weddingBuffObject.setDate(weddingBuffObject.getDate()+14);
        
        
        /* CHECK IF WEDDING DATE ENTERED IS IN THE PAST OR FUTURE */
        if (weddingDateObject < currentDateObject) {
            
            
            /* DISPLAY ERROR */
            document.getElementById("error-4").innerHTML = '<b>Please enter a Valid Date</b>';
            
            
        } else {
            
            
            /* CHECK IF WEDDING DATE ENTERED IS PAST THE BUFFER DATE */
            if (weddingDateObject < weddingBuffObject) {
            
            
                /* DISPLAY ERROR */
                document.getElementById("error-4").innerHTML = '<b>The date you selected is within the next 14 Days. Please consider a later date.</b>';
                
                
            } else {
                
                
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
                
                
                /* CHECK IF WEDDING DATE IS AVAILABLE FOR WEDDING VENUE AJAX */
                var dataString = 'venue_name=' + venueName + '&wedding_month=' + weddingMonth + '&wedding_day=' + weddingDay;
                $.ajax({
                    type: "POST",
                    url: "https://www.simplywed.co.uk/tools/quotes-demo/submit/check-date.php",
                    data: dataString,
                    cache: false,
                    error: function () {
                        
                        
                        /* DISPLAY ERROR */
                        document.getElementById("error-4").innerHTML = '<b>Sorry, there seems to have been a problem checking date availability.</b>';
                        
                        
                    }, complete: function (response) {
                        
                        
                        /* IF WEDDING DATE IS NOT AVAILABLE */
                        if (response.responseText == "No") {
                            
                            
                            /* DISPLAY ERROR */
                            document.getElementById("error-4").innerHTML = '<b>We are sorry, the Wedding Date you entered is not available for this venue.</b>';


                        } else {
                            
                            
                            /* ERASE ERROR MESSAGE */
                            document.getElementById("error-4").innerHTML = '';
                            
                            
                            /* CONTINUE WITH QUOTATION */
                            $("#quote-slide-4").hide();
                            $("#quote-slide-5").show();


                        }
                    }
                });
            }
        }
    }
}




/*-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
/* VALIDATE DAYTIME GUEST NUMBER */
function valDaytimeGuests() {
    
    
    /* FETCH REQUIRED DATA */
    var daytimeGuests = document.getElementById("daytimeGuests").value;
    var venuePackageGuests = document.getElementById("venuePackageGuests").value;
    var venueMaxDaytime = document.getElementById("venueMaxDaytime").value;
    
    
    /* CHECK IF DAYTIME GUESTS FIELD IS BLANK */
    if (daytimeGuests == "") {
        
        
        /* DISPLAY ERROR */
        document.getElementById("error-5").innerHTML = '<b>Please enter your Daytime Guests</b>';
        
        
    } else {
        
        
        /* CHECK IF DAYTIME GUESTS IS LESS THAN MINIMUM PACKAGE GUESTS */
        if (parseInt(daytimeGuests) < parseInt(venuePackageGuests)) {
            
            
            /* DISPLAY ERROR */
            document.getElementById("error-5").innerHTML = '<b>Sorry, this package has a minimum requirement of ' + parseInt(venuePackageGuests) + ' Daytime Guests</b>';
            
            
        } else {
            
            
            /* CHECK IF DAYTIME GUESTS IS MORE THAN VENUE MAXIMUM DAYTIME CAPACITY */
            if (parseInt(daytimeGuests) > parseInt(venueMaxDaytime)) {
                
                
                /* DISPLAY ERROR */
                document.getElementById("error-5").innerHTML = '<b>Sorry, you have exceeded this venues max capacity of ' + parseInt(venueMaxDaytime) + ' Daytime Guests</b>';
                
                
            } else {
                
                
                /* ERASE ERROR MESSAGE */
                document.getElementById("error-5").innerHTML = '';
                
                
                /* CONTINUE WITH QUOTATION */
                $("#quote-slide-5").hide();
                $("#quote-slide-6").show();
                
                
            }
        }
    }
}




/*-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
/* VALIDATE EVENING GUEST NUMBER */
function valEveningGuests() {
    
    
    /* FETCH REQUIRED DATA */
    var eveningGuests = document.getElementById("eveningGuests").value;
    var venuePackageGuests = document.getElementById("venuePackageGuests").value;
    var venueMaxEvening = document.getElementById("venueMaxEvening").value;
    
    
    /* CHECK IF EVENING GUESTS FIELD IS BLANK */
    if (eveningGuests == "") {
        
        
        /* DISPLAY ERROR */
        document.getElementById("error-6").innerHTML = '<b>Please enter your Evening Guests</b>';
        
        
    } else {
        
        
        /* CHECK IF EVENING GUESTS IS LESS THAN MINIMUM PACKAGE GUESTS */
        if (parseInt(eveningGuests) < parseInt(venuePackageGuests)) {
            
            
            /* DISPLAY ERROR */
            document.getElementById("error-6").innerHTML = '<b>Sorry, this package has a minimum requirement of ' + parseInt(venuePackageGuests) + ' Evening Guests</b>';
            
            
        } else {
            
            
            /* CHECK IF EVENING GUESTS IS MORE THAN VENUE MAXIMUM EVENING CAPACITY */
            if (parseInt(eveningGuests) > parseInt(venueMaxEvening)) {
                
                
                /* DISPLAY ERROR */
                document.getElementById("error-6").innerHTML = '<b>Sorry, you have exceeded this venues max capacity of ' + parseInt(venueMaxEvening) + ' Evening Guests</b>';
                
                
            } else {
                
                
                /* ERASE ERROR MESSAGE */
                document.getElementById("error-6").innerHTML = '';
                
                
                /* CONTINUE WITH QUOTATION */
                $("#quote-slide-6").hide();
                $("#quote-slide-7").show();
                
                
            }
        }
    }
}




/*-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
/* VALIDATE EVENING ENTERTAINMENT */
function valEveningEntertain() {
    
    
    /* FETCH REQUIRED DATA */
    var eveningEntertain = document.getElementById("eveningEntertain").value;
    
    
    /* CHECK IF FIRST NAME FIELD IS BLANK */
    if (eveningEntertain == "") {
        
        
        /* DISPLAY ERROR */
        document.getElementById("error-7").innerHTML = '<b>Do you need a DJ for your Wedding?</b>';
        
        
    } else {
        
        
        /* ERASE ERROR MESSAGE */
        document.getElementById("error-7").innerHTML = '';
        
        
        /* CONTINUE WITH QUOTATION */
        $("#quote-slide-7").hide();
        $("#quote-slide-8").show();
        
        
    }
}




/*-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
/* VALIDATE EMAIL ADDRESS */
function valEmailAddress() {
    
    
    /* FETCH REQUIRED DATA */
    var emailAddress = document.getElementById("emailAddress").value;
    
    
    /* CHECK IF EMAIL ADDRESS FIELD IS BLANK */
    if (emailAddress == "") {
        
        
        /* DISPLAY ERROR */
        document.getElementById("error-8").innerHTML = '<b>Please enter your Email Address</b>';
        
        
    } else {
        
        
        /* SET EMAIL ADDRESS REGULAR EXPRESSION */
        var emailPattern = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        
        
        /* CHECK IF EMAIL ADDRESS COMPLIES WITH EMAIL ADDRESS REGULAR EXPRESSSION */
        if (emailPattern.test(emailAddress)) {
            
            
            /* ERASE ERROR MESSAGE */
            document.getElementById("error-8").innerHTML = '';
            
            
            /* SUBMIT QUOTATION */
            $("#quote-slide-8").hide();
            $("#quote-slide-9").show();
            
            
        } else {
            
            
            /* DISPLAY ERROR */
            document.getElementById("error-8").innerHTML = '<b>Please enter a Valid Email Address</b>';
            
            
        }
    }
}




/*-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
/* VALIDATE CONTACT NUMBER */
function valContactNumber() {
    
    
    /* FETCH REQUIRED DATA */
    var contactNumber = document.getElementById("contactNumber").value;
    
    
    /* CHECK IF CONTACT NUMBER FIELD IS BLANK */
    if (contactNumber == "") {
        
        
        /* DISPLAY ERROR */
        document.getElementById("error-9").innerHTML = '<b>Please enter your Contact Number</b>';
        
        
    } else {
        
        
        /* SET CONTACT NUMBER REGULAR EXPRESSION */
        var phonePattern = /^(?:\W*\d){11}\W*$/;
        
        
        /* CHECK IF EMAIL ADDRESS COMPLIES WITH EMAIL ADDRESS REGULAR EXPRESSSION */
        if (phonePattern.test(contactNumber)) {
            
            
            /* ERASE ERROR MESSAGE */
            document.getElementById("error-9").innerHTML = '';
            
            
            /* CONTINUE WITH QUOTATION */
            $("#quote-slide-9").hide();
            $("#quote-slide-10").show();
            
            
        } else {
            
            
            /* DISPLAY ERROR */
            document.getElementById("error-9").innerHTML = '<b>Please enter a Valid Contact Number</b>';
            
            
        }
    }
}




/*-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
/* FORMAT PRICE INTEGER FUNCTION */
function formatNumber(number) {
    var num_parts = number.toString().split(".");
    num_parts[0] = num_parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return num_parts.join(".");
}