<?php
// uncomment session stuff here (if we end up doing that)
// ini_set("session.save_path", "/home/unn_w19014367/sessionData"); change path to correct path ofc
// session_start();

/** Storing form data in variables */
$firstname = filter_has_var(INPUT_POST, 'firstname') ? $_POST['firstname']: null;
$firstname = trim($firstname);
$lastname = filter_has_var(INPUT_POST, 'lastname') ? $_POST['lastname']: null;
$lastname = trim($lastname);
$email = filter_has_var(INPUT_POST, 'email') ? $_POST['email']: null;
$email = trim($email);
$password = filter_has_var(INPUT_POST, 'password') ? $_POST['password']: null;
$password = trim($password);

if(empty($firstname) || empty($lastname)) {
    echo"<p>You need to enter your first name and surname.  Please <a href=../signup.php>try again.</a></p>";
}

?>