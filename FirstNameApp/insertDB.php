<?php

    error_reporting(E_ALL);
    
    ini_set('display_errors', 'On');


//print_r();
require_once("config.php");
require_once("hash.php");



$db_host = "localhost"; //Host address (most likely localhost)
$db_name = "LoginUserDB"; //Name of Database
$db_user = "root"; //Name of database user
$db_pass = "root"; //Password for database user

$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);
//GLOBAL $mysqli;

if(mysqli_connect_errno()) {
  echo "Connection Failed: " . mysqli_connect_errno();
  exit();

}else{
  echo "Connection Successful";
}

echo "<br>";
echo "<br>";

echo "userName : ". $_POST['userName'];
echo "<br>";
echo "<br>";

echo "FirstName : ". $_POST['firstName'];
echo "<br>";
echo "<br>";

echo "lastName : ". $_POST['lastName'];
echo "<br>";
echo "<br>";

echo "email : ". $_POST['email'];
echo "<br>";
echo "<br>";

echo "dateofBirth : ". $_POST['dateofBirth'];
echo "<br>";
echo "<br>";

echo "password : ". $_POST['password'];
echo "<br>";
echo "<br>";

echo "confirmPassword : ". $_POST['confirmPassword'];
echo "<br>";
echo "<br>";

$username = $_POST['userName'];
$firstname = $_POST['firstName'];
$lastname =  $_POST['lastName'];
$password = $_POST['password'];
$confirmpassword = $_POST['confirmPassword'];
$email = $_POST['email'];
$dateofbirth = $_POST['dateofBirth'];

echo $dateofbirth;

/*//$newpassword = $_POST['password'];
$newpassword = generateHash($_POST['password']);
echo "<Br><br><bR>the generate hash password " .  $newpassword;

echo "<br><br><bR>";
$sql = "INSERT INTO FirstNameTable (firstname, password)
VALUES ('".$_POST['firstName']."', '".$newpassword."')";

if ($mysqli->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$mysqli->close();*/






/*
 *
 * check if the password == confirm password
 *
 * */





/**
 * @param $fname
 * @param $lname
 * @param $dob
 * @param $email
 * @param $city
 * @param $zip
 *
 * @return bool
 */
//function createNewUser($username, $firstname, $lastname, $password, $confirmpassword, $email, $dateofbirth)
//{

    //global $mysqli;

    //echo "11111111111111111111111111111+++++".$mysqli;

    //Generate A random userid
    $character_array = array_merge(range(a, z), range(0, 9));
    $rand_string = "";
    for ($i = 0; $i < 6; $i++) {
        $rand_string .= $character_array[rand(
            0, (count($character_array) - 1)
        )];
    }

    $hashpassword = generateHash($password);

    echo $username.'<br>';
    echo $firstname.'<br>';
    echo $lastname.'<br>';
    echo $uniqueid.'<br>';
    echo $password.'<br>';
    echo $confirmpassword.'<br>';
    echo $email.'<br>';
    echo $dateofbirth.'<br>';


    echo $rand_string.'<br>';
    echo $hashpassword.'<br>';
    echo date('Y-m-d');

    $uniqueid = "123";
//printf("\n  mysqli =    %x\n", $mysqli);

    $registrationdate = date('Y-m-d');


/*$stmt = $mysqli->prepare(
    "INSERT INTO FirstNameTable (
        username
		)
		VALUES (
		?
		)"
    );

printf("\nstmt =    %x  Null = %x  \n", $stmt, NULL);*/

/*
firstname,
lastname,
uniqueid,
		password,
		confirmpassword,
		email,
		dateofbirth,
		registrationdate

        ?,
        ?,
        ?,
		?,
		?,
		?

*/


    $stmt = $mysqli->prepare(
        "INSERT INTO FirstNameTable (
        username,
        firstname,
        lastname,
        uniqueid,
		password,
		email,
		dateofbirth,
		registrationdate
		)
		VALUES (
		?,
		?,
		?,
		?,
		?,
		?,
		?,
		?,
		".date("Y-m-d")."
		)"
    );

/*
 *
 * 		VALUES (
		?,
		?,
		?,
		'" . $rand_string . "',
		'" . $hashpassword . "',
		'" . $hashpassword . "',
		?,
		?,
		'" . date('Y-m-d') . "'
		)"
    )
 *
 *
 * */



//'" . date('Y-m-d') . "',
    printf("\n  stmt =    %x  Null = %x  \n", $stmt, NULL);

    $result = $stmt->bind_param("ssssssss", $username, $firstname, $lastname, $password, $email, $dateofbirth, $registrationdate, $uniqueid);

    echo "bind_param".$result;

    $result = $stmt->execute();

    echo "execute".$result;

    $stmt->close();
    //return $result;

//}


?>