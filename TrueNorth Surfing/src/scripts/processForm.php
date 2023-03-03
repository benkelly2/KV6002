<?php

// ---------------------------- TODO: CHANGE THIS TO BE FOR CONTACT INSTEAD OF SIGNUP --------------------

/** Storing form data in variables */
$firstname = filter_has_var(INPUT_POST, 'firstname') ? $_POST['firstname']: null;
$firstname = trim($firstname);
$lastname = filter_has_var(INPUT_POST, 'lastname') ? $_POST['lastname']: null;
$lastname = trim($lastname);
$email = filter_has_var(INPUT_POST, 'email') ? $_POST['email']: null;
$email = trim($email);
$password = filter_has_var(INPUT_POST, 'password') ? $_POST['password']: null;
$password = trim($password);

if(empty($firstname) || empty($lastname) || empty($email) || empty($password)) {
    echo"<p>You need to enter your first name and surname.  Please <a href=../signup.php>try again.</a></p>";
    // possibly remove this, as html forms have 'required' meaning they must be filled before form can be processed
}
else {
    try {
        /** Clear any session settings that may be left from previous session */ // IF WE EVEN USE SESSIONS
        unset($_SESSION['username']);
        unset($_SESSION['logged-in']);

        // code to connect to/query the database goes here
        // can't rlly progress til we decide whats happening with database

    } catch (Exception $e) {
        echo "error message goes here";
    }
}

?>