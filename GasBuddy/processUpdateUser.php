<?php
/**
 * Created by PhpStorm.
 * User: PraviinM
 * Date: 9/28/15
 * Time: 9:54 PM
 */


require_once("config.php");

// print_r is to display the contents of an array() in PHP.
//print_r($_POST);

// Assigning $_POST values to individual variables for reuse.
$id = $_POST['id'];
$stationname = $_POST['stationname'];
$address = $_POST['address'];
$zipcode = $_POST['zipcode'];
$gastype1 = $_POST['gastype1'];
$gasprice1 = $_POST['gasprice1'];
$gastype2 = $_POST['gastype2'];
$gasprice2 = $_POST['gasprice2'];
$gastype3 = $_POST['gastype3'];
$gasprice3 = $_POST['gasprice3'];

//Creating a variable to hold the "@return boolean value returned by function updateThisRecord - is boolean 1 with
//successfull and 0 when there is an error with executing the query .
$updatedRecord  = updateThisRecord($id, $stationname, $address, $zipcode, $gastype1,
    $gasprice1, $gastype2, $gasprice2, $gastype3, $gasprice3);



//display the result that was returned by the createNewUser function - in this case we usually get a 1 when the
//update is completed successfully.
echo $updatedRecord;
