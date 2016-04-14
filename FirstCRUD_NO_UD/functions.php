<?php
/**
 * Created by PhpStorm.
 * User: PraviinM
 * Date: 2/21/16
 */


/**
 * @param $id
 * @return bool
 */
function isUniPrimKeyExist($id)
{
  global $mysqli;

  echo $id;
  $stmt = $mysqli->prepare("SELECT * FROM user WHERE id=?");

  if (NULL == $stmt){
    echo "isUniPrimKeyExist!!!!!!!!!!!!222222/n";
    return false;
  }

  $result = $stmt->bind_param("i", $id);

  $result = $stmt->execute();




  $result = $stmt->fetch();

  $stmt->close();

  echo $result;
  if (NULL == $result || false == $result) {
    echo "isUniPrimKeyExist!!!!!!!!!!!!Not Exist";


    return false;
  }

  return true;
}

//dumplicates show a message
/**
 * @param $fname
 * @param $lname
 * @param $email
 * @return bool
 */
function isUserExist($fname, $lname, $email){
  global $mysqli;

  $stmt = $mysqli->prepare("SELECT * FROM user WHERE FirstName=? AND LastName=? AND EmailAddress=?");

  if (false == $stmt){
    echo "Here   111";
    return false;
  }

  $stmt->bind_param("sss", $fname, $lname, $email);

  $result = $stmt->execute();

  if (false == $result){

  echo "Here 222";
    return false;
  }

  $result = $stmt->fetch();

  echo "zzzzzzzz";
  echo $result;
  $stmt->close();

  if (NULL == $result || false == $result) {
    echo "isUniPrimKeyExist!!!!!!!!!!!!Not Exist";


    return false;
  }


  echo "isUserExist!!!!!!!!!!!!Exist";
  return true;
}


//Retrieve information for all users
//function definition and declaration
/**
 * @return array
 */
function fetchAllUsers() {
  global $mysqli, $db_table_prefix;
  $stmt = $mysqli->prepare(
    "SELECT
		id,
		userid,
		FirstName,
		LastName,
		City,
		Zip,
		DateOfBirth,
		EmailAddress,
		MemberSince,
		active

		FROM " . $db_table_prefix . "user"
  );
  $stmt->execute();
  $stmt->bind_result(
    $id,
    $userid,
    $FirstName,
    $LastName,
    $City,
    $Zip,
    $DateOfBirth,
    $EmailAddress,
    $MemberSince,
    $active
  );

  while ($stmt->fetch()) {
    $row[] = array(
      'id'                      => $id,
      'userid'                  => $userid,
      'firstname'               => $FirstName,
      'lastname'                => $LastName,
      'city'                    => $City,
      'zip'                     => $Zip,
      'dateofbirth'             => $DateOfBirth,
      'email'                   => $EmailAddress,
      'membersince'             => $MemberSince,
      'active'                  => $active
    );
  }
  $stmt->close();
  return ($row);
}




//Create a new user

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
function createNewUser($fname, $lname, $dob, $email, $city, $zip)
{
  global $mysqli, $db_table_prefix;
  //Generate A random userid
  $character_array = array_merge(range(a, z), range(0, 9));
  $rand_string = "";

  for ($i = 0; $i < 6; $i++) {
    $rand_string .= $character_array[rand(
      0, (count($character_array) - 1)
    )];
  }
  echo $rand_string;
  $result = isUniPrimKeyExist($rand_string);


  //echo "PrimKey====  ".$result;
  if ($result == true){
    // show message
    echo "User Unique Prime Key Dupilcate!";
    return $result;
  }

  $result = isUserExist($fname, $lname, $email);

  //echo "isUserExist====  ".$result;
  if ($result == true){
    // show message
    echo "User Information Dupilcate!";
    return $result;
  }

 // echo $rand_string;
 // echo $fname;
 // echo $lname;
 // echo $dob;
 // echo $email;
 // echo $city;
  //echo $zip;
  $stmt = $mysqli->prepare(
    "INSERT INTO " . $db_table_prefix . "user (
		userid,
		FirstName,
		LastName,
		City,
		Zip,
		DateOfBirth,
		EmailAddress,
		MemberSince,
		active
		)
		VALUES (
		'" . $rand_string . "',
		?,
		?,
		?,
		?,
		?,
		?,
        '" . time() . "',
        1
		)"
  );
  $stmt->bind_param("ssssss", $fname, $lname, $city, $zip, $dob, $email);
  $result = $stmt->execute();
  $stmt->close();


  return $result;

}

