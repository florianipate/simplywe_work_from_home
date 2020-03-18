// Validate telephone numbers &#8211; stop user entering premium rate numbers
function validatePhone(Text) {
	// Collect data from user input
	var nameElement = document.getElementById("HomeNumber");
	var HomeNumber = nameElement.value;
	
	
	// Evaluate data entered &#8211; identify value for each character
	var digitone = HomeNumber.charAt(0);
	var digittwo = HomeNumber.charAt(1);
	var digitthree = HomeNumber.charAt(2);
	var digitfour = HomeNumber.charAt(3);
	var digitfive = HomeNumber.charAt(4);
	var digitsix = HomeNumber.charAt(5);
	
	
	// Display response if number entered cannot be accepted/ is invalid
	var responseinvalid = "Sorry, the phone number you are trying to enter is invalid.";
	
	
	/* NUMBERS STARTING 01 */
	// Alert user 0110, 0111, 0112, 0119 numbers are not valid
	if (digitone == "0" && digittwo == "1" && digitthree == "1" && ((digitfour == "0") || (digitfour == "1") || (digitfour == "2") || (digitfour == "9"))) {
		// document.getElementById("results").innerHTML = 'Number 09';
		document.getElementById("HomeNumber").value = "";
		alert(responseinvalid);
	}
	// Alert user 01x10, 01x11, numbers are not valid &#8211; x=2,3,4,5,6,7,8 or 9
	if (digitone == "0" && digittwo == "1" && ((digitthree == "2") || (digitthree == "3") || (digitthree == "4") || (digitthree == "5") || (digitthree == "6") || (digitthree == "7") || (digitthree == "8") || (digitthree == "9")) && digitfour == "1" && ((digitfive == "0") || (digitfive == "1"))) {
		// document.getElementById("results").innerHTML = 'Number 09';
		document.getElementById("HomeNumber").value = "";
		alert(responseinvalid);
	}
	// Alert user 012345 numbers are not valid
	if (digitone == "0" && digittwo == "1" && digitthree == "2" && digitfour == "3" && digitfive == "4" && digitsix == "5") {
		// document.getElementById("results").innerHTML = 'Number 09';
		document.getElementById("HomeNumber").value = "";
		alert(responseinvalid);
	}
	// Alert user 01552 numbers are not valid
	if (digitone == "0" && digittwo == "1" && digitthree == "5" && digitfour == "5" && digitfive == "2") {
		// document.getElementById("results").innerHTML = 'Number 09';
		document.getElementById("HomeNumber").value = "";
		alert(responseinvalid);
	}
	// Alert user 01739 numbers are not valid
	if (digitone == "0" && digittwo == "1" && digitthree == "7" && digitfour == "3" && digitfive == "9") {
		// document.getElementById("results").innerHTML = 'Number 09';
		document.getElementById("HomeNumber").value = "";
		alert(responseinvalid);
	}
	// Alert user 01921 numbers are not valid
	if (digitone == "0" && digittwo == "1" && digitthree == "9" && digitfour == "2" && digitfive == "1") {
		// document.getElementById("results").innerHTML = 'Number 09';
		document.getElementById("HomeNumber").value = "";
		alert(responseinvalid);
	}
	// Alert user 01987 numbers are not valid
	if (digitone == "0" && digittwo == "1" && digitthree == "9" && digitfour == "8" && digitfive == "7") {
		// document.getElementById("results").innerHTML = 'Number 09';
		document.getElementById("HomeNumber").value = "";
		alert(responseinvalid);
	}
	// Alert user 01996, 01998 numbers are not valid
	if (digitone == "0" && digittwo == "1" && digitthree == "9" && digitfour == "9" && ((digitfive == "6") || (digitfive == "8"))) {
		// document.getElementById("results").innerHTML = 'Number 09';
		document.getElementById("HomeNumber").value = "";
		alert(responseinvalid);
	}
	
	
	/* NUMBERS STARTING 02 */
	// Alert user 0200, 0201,  0202,  0204,  0205,  0206,  0209, numbers are not valid
	if (digitone == "0" && digittwo == "2" && digitthree == "0" && ((digitfour == "0") || (digitfour == "1") || (digitfour == "2") || (digitfour == "4") || (digitfour == "5") || (digitfour == "6") || (digitfour == "9"))) {
		// document.getElementById("results").innerHTML = 'Number 09';
		document.getElementById("HomeNumber").value = "";
		alert(responseinvalid);
	}
	// Alert user 0230, 0231, 0232, 0233, 0234, 0235, 0236, 0237, numbers are not valid
	if (digitone == "0" && digittwo == "2" && digitthree == "3" && ((digitfour == "0") || (digitfour == "1") || (digitfour == "2") || (digitfour == "3") || (digitfour == "4") || (digitfour == "5") || (digitfour == "6") || (digitfour == "7"))) {
		// document.getElementById("results").innerHTML = 'Number 09';
		document.getElementById("HomeNumber").value = "";
		alert(responseinvalid);
	}
	// Alert user 0240, 0241, 0242, 0243, 0244, 0245, 0246, 0248, 0249, numbers are not valid
	if (digitone == "0" && digittwo == "2" && digitthree == "4" && ((digitfour == "0") || (digitfour == "1") || (digitfour == "2") || (digitfour == "3") || (digitfour == "4") || (digitfour == "5") || (digitfour == "6") || (digitfour == "8") || (digitfour == "9"))) {
		// document.getElementById("results").innerHTML = 'Number 09';
		document.getElementById("HomeNumber").value = "";
		alert(responseinvalid);
	}
	// Alert user 0290, 0291, 0293, 0294, 0295, 0296, 0298, 0299, numbers are not valid
	if (digitone == "0" && digittwo == "2" && digitthree == "9" && ((digitfour == "0") || (digitfour == "1") || (digitfour == "3") || (digitfour == "4") || (digitfour == "5") || (digitfour == "6") || (digitfour == "7") || (digitfour == "8") || (digitfour == "9"))) {
		// document.getElementById("results").innerHTML = 'Number 09';
		document.getElementById("HomeNumber").value = "";
		alert(responseinvalid);
	}
	// Alert user 02222 222222, numbers are not valid 
	if (HomeNumber == "0222222222") {
		// document.getElementById("results").innerHTML = 'Number 070';
		document.getElementById("HomeNumber").value = "";
		alert(responseinvalid);
	}
	
	
	/* NUMBERS STARTING 03 */
	// Alert user 08 numbers are not valid
	if (digitone == "0" && digittwo == "3") {
		// document.getElementById("results").innerHTML = 'Number 09';
		document.getElementById("HomeNumber").value = "";
		alert("Sorry, we cannot accept phone numbers beginning 03.");
	}
	
	
	/* NUMBERS STARTING 04 */
	// Alert user 08 numbers are not valid
	if (digitone == "0" && digittwo == "4") {
		// document.getElementById("results").innerHTML = 'Number 09';
		document.getElementById("HomeNumber").value = "";
		alert(responseinvalid);
	}
	
	
	/* NUMBERS STARTING 05 */
	// Alert user 08 numbers are not valid
	if (digitone == "0" && digittwo == "5") {
		// document.getElementById("results").innerHTML = 'Number 09';
		document.getElementById("HomeNumber").value = "";
		alert(responseinvalid);
	}
	
	
	/* NUMBERS STARTING 06*/
	// Alert user 08 numbers are not valid
	if (digitone == "0" && digittwo == "6") {
		// document.getElementById("results").innerHTML = 'Number 09';
		document.getElementById("HomeNumber").value = "";
		alert(responseinvalid);
	}
	
	
	/* NUMBERS STARTING 07*/
	// Alert user 070, 076, numbers are not valid &#8211; higher rate as call forwarding
	if (digitone == "0" && digittwo == "7" && ((digitthree == "0") || (digitthree == "6"))) {
		// document.getElementById("results").innerHTML = 'Number 070';
		document.getElementById("HomeNumber").value = "";
		alert("Sorry, we cannot accept phone numbers beginning 07" + digitthree + ".");
	}
	// Alert user 07744, 07755, numbers are not valid &#8211; higher rate as call forwarding
	if (digitone == "0" && digittwo == "7" && digitthree == "7" && ((digitfour == "4" && digitfive == "4") || (digitfour == "5" && digitfive == "5"))) {
		// document.getElementById("results").innerHTML = 'Number 070';
		document.getElementById("HomeNumber").value = "";
		alert("Sorry, we cannot accept phone numbers beginning 077" + digitfour +  + digitfive + ".");
	}
	// Alert user 071, 072, 073, numbers are not valid 
	if (digitone == "0" && digittwo == "7" && digitthree == "2") {
		// document.getElementById("results").innerHTML = 'Number 070';
		document.getElementById("HomeNumber").value = "";
		alert(responseinvalid);
	}
	// Alert user 07777 777777, numbers are not valid 
	if (HomeNumber == "0777777777") {
		// document.getElementById("results").innerHTML = 'Number 070';
		document.getElementById("HomeNumber").value = "";
		alert(responseinvalid);
	}
	
	
	/* NUMBERS STARTING 08*/
	// Alert user 08 numbers are not valid
	if (digitone == "0" && digittwo == "8") {
		// document.getElementById("results").innerHTML = 'Number 09';
		document.getElementById("HomeNumber").value = "";
		alert("Sorry, we cannot accept phone numbers beginning 08.");
	}
	
	
	/* NUMBERS STARTING 09*/
	// Alert user 09 numbers are not valid
	if (digitone == "0" && digittwo == "9") {
		// document.getElementById("results").innerHTML = 'Number 09';
		document.getElementById("HomeNumber").value = "";
		alert("Sorry, we cannot accept phone numbers beginning 09.");
	}
}