<?php
/**
 * Created by PhpStorm.
 * User: PraviinM
 * Date: 2/7/16
 * Time: 2:17 PM
 */



//Retrieve information for all users
/**
 * @return array
 */
function fetchAllUsers() {
  global $mysqli, $db_table_prefix;
  $stmt = $mysqli->prepare(
    "SELECT
		id,
		FirstName,
		LastName,
		Address,
		Company1,
		Company2,
		Company3,
		Phone1,
		Phone2,
		Phone3,
		Email1,
		Email2,
		Email3,
		Birthdate,
		Reminder,
        Note
		FROM " . $db_table_prefix . "Contacts"
  );
  $stmt->execute();
  $stmt->bind_result(
    $id,
    $FirstName,
    $LastName,
    $Address,
    $Company1,
    $Company2,
    $Company3,
    $Phone1,
    $Phone2,
    $Phone3,
    $Email1,
    $Email2,
    $Email3,
    $BirthDate,
    $Reminder,
    $Note
  );

  while ($stmt->fetch()) {
    $row [] = array(
      'id'                      => $id,
      'firstname'               => $FirstName,
      'lastname'                => $LastName,
      'address'                 => $Address,
      'company1'                => $Company1,
      'company2'             => $Company2,
      'company3'                   => $Company3,
      'phone1'             => $Phone1,
      'phone2'                  => $Phone2,
      'phone3'                   => $Phone3,
      'email1'             => $Email1,
      'email2'                  => $Email2,
        'email3'                =>  $Email3,
        'birthdate'         =>  $BirthDate,
        'reminder'          =>  $Reminder,
        'note'              =>  $Note
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
function createNewUser($fname, $lname, $address, $company1, $company2, $company3, $phone1, $phone2, $phone3, $email1, $email2, $email3, $dob, $reminder, $note)
{
  global $mysqli;

    /*
    //Generate A random userid
  $character_array = array_merge(range(a, z), range(0, 9));
  $rand_string = "";
  for ($i = 0; $i < 6; $i++) {
    $rand_string .= $character_array[rand(
      0, (count($character_array) - 1)
    )];
  }

  echo $rand_string;
    */

  echo $fname;
  echo $lname;
    echo $address;
  echo $dob;
  echo $email1;
    echo $company1;
    echo $phone1;
    echo $note;
    echo $reminder;





  $stmt = $mysqli->prepare(
    "INSERT INTO Contacts (
		FirstName,
		LastName,
		Address,
		Company1,
		Company2,
		Company3,
		Phone1,
		Phone2,
		Phone3,
		Email1,
		Email2,
		Email3,
		BirthDate,
		Reminder,
		Note
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
		?,
		?,
		?,
		?,
		?,
		?,
        ?
		)"
  );
  $stmt->bind_param("ssssssiiissssss", $fname, $lname, $address, $company1, $company2, $company3, $phone1, $phone2, $phone3, $email1, $email2, $email3, $dob, $reminder, $note);
  $result = $stmt->execute();
  $stmt->close();

  return $result;
}



//fetch particular users record

/**
 * @param $userid
 *
 * @return array
 */
function fetchThisUser($userid)
{
    global $mysqli;
    $stmt = $mysqli->prepare(
      "
    SELECT
    id,
    userid,
    FirstName,
    LastName,
    DateOfBirth,
    EmailAddress,
    City,
    Zip,
    MemberSince,
    active

    FROM user
    WHERE
    userid = ?
    LIMIT 1"
    );
    $stmt->bind_param("s", $userid);
    $stmt->execute();
    $stmt->bind_result($id, $userid, $FirstName, $LastName, $DateOfBirth, $EmailAddress, $City, $Zip, $MemberSince, $active);
    $stmt->execute();
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


//Update selected users record.
/**
 * @param $fname
 * @param $lname
 * @param $city
 * @param $zip
 * @param $dob
 * @param $email
 * @param $userid
 *
 * @return bool
 */
function updateThisRecord($fname, $lname, $city, $zip, $dob, $email, $userid)
{
    global $mysqli, $db_table_prefix;
    $stmt = $mysqli->prepare(
      "UPDATE " . $db_table_prefix . "user
		SET
		FirstName = ?,
		LastName = ?,
		City = ?,
		Zip = ?,
		DateOfBirth = ?,
		EmailAddress = ?
		WHERE
		userid = ?
		LIMIT 1"
    );
    $stmt->bind_param("sssssss", $fname, $lname, $city, $zip, $dob, $email, $userid);
    $result = $stmt->execute();
    $stmt->close();

    return $result;
}



