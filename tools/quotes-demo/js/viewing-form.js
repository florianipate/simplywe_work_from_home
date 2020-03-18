/*-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
/* VALIDATE AND SUBMIT BOOK VIEWING FUNCTION */
function bookViewing() {
    
    
    /* FETCH REQUIRED DATA */
    var contactName = document.getElementById("contactname").value;
    var emailAddress = document.getElementById("emailaddress").value;
    var contactNumber = document.getElementById("contactnumber").value;
    var venueName = document.getElementById("venuename").value;
    var viewingDate = document.getElementById("viewingdate").value;
    var viewingTime = document.getElementById("viewingtime").value;
    
    
    /* CHECK IF VENUE NAME IS DEFINED */
    if (typeof venueName !== 'undefined') {
        
        
        /* SET ERROR MESSAGE */
        var error = '';
        
        
        /* VALIDATE CONTACT NAME */
        if (contactName === "") {
                
                
            /* ADD TO ERROR MESSAGE */
            error += '<b>Please enter a Contact Name</b><br />';


        }
        
        
        
        /* VALIDATE EMAIL ADDRESS */
        if (emailAddress === "") {
                
                
            /* ADD TO ERROR MESSAGE */
            error += '<b>Please enter an Email Address</b><br />';


        } else {
            
            
            /* SET EMAIL ADDRESS REGULAR EXPRESSION */
            var emailPattern = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;


            /* CHECK IF EMAIL ADDRESS COMPLIES WITH EMAIL ADDRESS REGULAR EXPRESSSION */
            if (!emailPattern.test(emailAddress)) {


                /* ADD TO ERROR MESSAGE */
                error += '<b>Please enter a Valid Email Address</b><br />';


            }
            
            
        }
        
        
        
        /* VALIDATE CONTACT NUMBER */
        if (contactNumber === "") {
                
                
            /* ADD TO ERROR MESSAGE */
            error += '<b>Please enter a Contact Number</b><br />';


        } else {
            
            
            /* SET CONTACT NUMBER REGULAR EXPRESSION */
            var phonePattern = /^(?:\W*\d){11}\W*$/;
            
            
            /* CHECK IF CONTACT NUMBER COMPLIES WITH CONTACT NUMBER REGULAR EXPRESSSION */
                if (!phonePattern.test(contactNumber)) {


                    /* ADD TO ERROR MESSAGE */
                    error += '<b>Please enter a Valid Contact Number</b><br />';


                }
            
            
        }
        
        
        
        /* VALIDATE VIEWING DATE */
        if (viewingDate === "") {
                
                
            /* ADD TO ERROR MESSAGE */
            error += '<b>Please enter a Viewing Date</b><br />';


        } else {
            
            
            /* GET CURRENT DATE IN DD/MM/YYYY FORMAT */
            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth() + 1; // January is 0!
            var yyyy = today.getFullYear();
            if (dd < 10) {dd = '0' + dd;} 
            if (mm < 10) {mm = '0' + mm;} 
            var currentDate = dd + '/' + mm + '/' + yyyy;


            /* CONVERT VEIWING DATA, CURRENT DATE AND BUFFER DATE STRINGS INTO DATE OBJECTS */
            var viewingDateParts = viewingDate.split("/");
            var viewingDateObject = new Date(+viewingDateParts[2], viewingDateParts[1] - 1, +viewingDateParts[0]);
            var currentDateParts = currentDate.split("/");
            var currentDateObject = new Date(+currentDateParts[2], currentDateParts[1] - 1, +currentDateParts[0]);
            var viewingBuffParts = currentDate.split("/");
            var viewingBuffObject = new Date(+viewingBuffParts[2], viewingBuffParts[1] - 1, +viewingBuffParts[0]);
            
            
            /* DEFINE VEIWING BUFFER DATE - CURRENT DATE + 1 DAYS */
            var viewingBuffObject;
            viewingBuffObject.setDate(viewingBuffObject.getDate() + 1);
            
            
            /* CHECK IF VEIWING DATE ENTERED IS IN THE PAST OR FUTURE */
            if (viewingDateObject < currentDateObject) {
            
            
                /* ADD TO ERROR MESSAGE */
                error += '<b>Please enter a Valid Date</b><br />';


            } else {
                    
                    
                /* CHECK IF VEIWING DATE ENTERED IS PAST THE BUFFER DATE */
                if (viewingDateObject < viewingBuffObject) {
                    
                    
                    /* ADD TO ERROR MESSAGE */
                    error += '<b>The date you selected is today. Please consider a later date.</b><br />';
                    
                    
                }
                    
                    
            }
            
            
        }
        
        
        /* VALIDATE VIEWING TIME */
        if (viewingTime === "") {
                
                
            /* ADD TO ERROR MESSAGE */
            error += '<b>Please enter a Viewing Time</b><br />';


        }
        
        
        /* CHECK FOR MISSING FIELD DATA */
        if (error !== "") {
            
            
            /* DISPLAY ERROR MESSAGE */
            document.getElementById("error").innerHTML = error;
            
            
        } else {
            
            
            /* REMOVE ERROR MESSAGE */
            document.getElementById("error").innerHTML = '';
            
            
            /* SEND BOOK VIEWING DETAILS VIA AJAX */
            var dataString = 'contact_name=' + contactName + '&email_address=' + emailAddress + '&contact_number=' + contactNumber + '&venue_name=' + venueName + '&viewing_date=' + viewingDate + '&viewing_time=' + viewingTime;
            $.ajax({
                type: "POST",
                url: "https://www.simplywed.co.uk/tools/quotes-demo/submit/submit-viewing.php",
                data: dataString,
                cache: false,
                complete: function (response) {
                    
                    
                    /* DISABLE COMPLETED FORM FIELDS */
                    $("#contactname").attr("disabled", true);
                    $("#emailaddress").attr("disabled", true);
                    $("#contactnumber").attr("disabled", true);
                    $("#viewingdate").attr("disabled", true);
                    $("#viewingtime").attr("disabled", true);
                    
                    
                    /* REMOVE SUBMIT BUTTON */
                    $("#submit-button").hide();
                    
                    
                    /* DISPLAY SUBMIT MESSAGE AND BACK BUTTON */
                    $("#submit-message").show();
                    $("#back-button").show();
                    
                    
                }, error: function () {
                    
                    
                    /* DISPLAY ERROR MESSAGE */
                    alert("Sorry, there was a problem submitting your quotation to us. Please refresh and try again.");
                    
                    
                }
            });
            
            
        }
        
        
    }
    
    
}