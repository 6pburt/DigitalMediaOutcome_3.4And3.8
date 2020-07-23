<?php
	if(!empty($_POST)) {
		extract($_POST); // Convert array values to variables ($_POST['first_name'] becomes $first_name - this does make it much easier to write the code			
		
		$errors = array(); // Create an empty array to store errors so every time an error is encountered, a message is added to the errors array. A check can then be performed at the end to see if the array is empty or not.
					
		// Check the first name
		if(!$myusername) {
		// There is no value for first name
		$errors[] = 'Please enter user name';
		} else if(strlen($myusername) > 15) {
		// The length of the first name is greater than 20 characters (and will not fit in the database)
		$errors[] = 'Your first name is too long to be stored - please enter a shorter first name';
						}
		// Check the last name
		if(!$mypassword) {
		// There is no value for last name
		$errors[] = 'Please enter a password';
		} else if(strlen($mypassword) > 15) {
		// The length of the last name is greater than 25 characters (and will not fit in our database)
		$errors[] = 'Your last name is too long to be stored - please enter a shorter last name';
		}?>