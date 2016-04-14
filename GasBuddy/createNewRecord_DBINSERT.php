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
$stationname = $_POST['stationname'];
$address = $_POST['address'];
$zipcode = $_POST['zipcode'];
$gastype1 = $_POST['gastype1'];
$gasprice1 = $_POST['gasprice1'];
$gastype2 = $_POST['gastype2'];
$gasprice2 = $_POST['gasprice2'];
$gastype3 = $_POST['gastype3'];
$gasprice3 = $_POST['gasprice3'];

//print $fname;


//Creating a variable to hold the "@return boolean value returned by function createNewUser - is boolean 1 with
//successfull and 0 when there is an error with executing the query .

$newuser = createNewUser($stationname, $address, $zipcode, $gastype1, $gasprice1, $gastype2, $gasprice2, $gastype3, $gasprice3);

//display the result that was returned by the createNewUser function - in this case we usually get a 1 when the
//insert is completed successfully.
echo $newuser;
?>
