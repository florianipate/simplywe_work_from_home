// Validate email address &#8211; ensure the user does not supply an invalid email address
function validateEmail(Text) {
	// Collect data from user input
	var nameElement = document.getElementById("EmailAddress");
	var Email = nameElement.value;
	
	
	// Break email address at the @ sign and place into variables
	test = Email.split("@");
	var EmailPartOne = test[0];
	var EmailPartTwo = test[1];
	var message = "Sorry, the email address entered appears to be invalid.";
	
	
	/*TEST*/
	// Prevent user for entering test as first part of email address
	if (EmailPartOne == 'test' || EmailPartOne == 'Test' || EmailPartOne == 'TEST') {
		document.getElementById("EmailAddress").value = "";
		alert(message);
	}
	// Prevent user from entering domain as test.com or test.co.uk
	if (EmailPartTwo == 'test.com' || EmailPartTwo == 'test.co.uk') {
		document.getElementById("EmailAddress").value = "";
		alert(message);
	}
	
	
	/*TESTS*/
	// Prevent user for entering tests as first part of email address
	if (EmailPartOne == 'tests' || EmailPartOne == 'Tests' || EmailPartOne == 'TESTS') {
		document.getElementById("EmailAddress").value = "";
		alert(message);
	}
	// Prevent user from entering domain as tests.com or tests.co.uk
	if (EmailPartTwo == 'tests.com' || EmailPartTwo == 'tests.co.uk') {
		document.getElementById("EmailAddress").value = "";
		alert(message);
	}
	
	
	/*TESTER*/
	// Prevent user for entering tester as first part of email address
	if (EmailPartOne == 'tester' || EmailPartOne == 'Tester' || EmailPartOne == 'TESTER') {
		document.getElementById("EmailAddress").value = "";
		alert(message);
	}
	// Prevent user from entering domain as tester.com or tester.co.uk
	if (EmailPartTwo == 'tester.com' || EmailPartTwo == 'tester.co.uk') {
		document.getElementById("EmailAddress").value = "";
		alert(message);
	}
	
	
	/*TESTING*/
	// Prevent user for entering testing as first part of email address
	if (EmailPartOne == 'testing' || EmailPartOne == 'Testing' || EmailPartOne == 'TESTING') {
		document.getElementById("EmailAddress").value = "";
		alert(message);
	}
	// Prevent user from entering domain as testing.com or testing.co.uk
	if (EmailPartTwo == 'testing.com' || EmailPartTwo == 'testing.co.uk') {
		document.getElementById("EmailAddress").value = "";
		alert(message);
	}
}