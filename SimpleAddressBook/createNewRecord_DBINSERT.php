<?php
/**
 * Created by PhpStorm.
 * User: PraviinM
 * Date: 2/7/16
 * Time: 3:29 PM
 */

//print_r($_POST);

require_once("config.php");

// Assigning $_POST values to individual variables for reuse.
$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$address = $_POST['address'];
$company1 = $_POST['company1'];
$company2 = $_POST['company2'];
$company3 = $_POST['company3'];
$phone1 = $_POST['phone1'];
$phone2 = $_POST['phone2'];
$phone3 = $_POST['phone3'];
$email1 = $_POST['email1'];
$email2 = $_POST['email2'];
$email3 = $_POST['email3'];
$dob = $_POST['birthdate'];
$reminder = $_POST['reminder'];
$note = $_POST['note'];

//print $fname;


//Creating a variable to hold the "@return boolean value returned by function createNewUser - is boolean 1 with
//successfull and 0 when there is an error with executing the query .

$newuser = createNewUser($fname, $lname, $address, $company1, $company2, $company3, $phone1, $phone2, $phone3, $email1, $email2, $email3, $dob, $reminder, $note);

//display the result that was returned by the createNewUser function - in this case we usually get a 1 when the
//insert is completed successfully.
echo $newuser;
?>
