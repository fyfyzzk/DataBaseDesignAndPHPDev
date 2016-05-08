<?php

//$password = md5("Smith");
//echo $password."<br><br>";
//$code = md5(uniqid(rand(), TRUE));

//echo $code;



//Generate a unique code
function getUniqueCode($length = "") {
  $code = md5(uniqid(rand(), TRUE));
  if ($length != "") {
    return substr($code, 0, $length);
  }
  else {
    return $code;
  }
}



//$plainText = getUniqueCode(15);
//echo $plainText;


function generateHash($plainText, $salt = NULL) {
  if ($salt === NULL) {
    $salt = substr(md5(uniqid(rand(), TRUE)), 0, 25);
  }
  else {
    $salt = substr($salt, 0, 25);
  }

  return $salt . sha1($salt . $plainText);
}



//echo $newpassword;
//$compare = generateHash($_POST['password'], $newpassword);

//echo $compare;

function createNewUser($username, $firstname, $lastname, $email, $password)
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

  //$rand_string = getUniqueCode(14);
  //echo $rand_string;
  //echo $username;
  //echo $firstname;
  //echo $lastname;
  //echo $email;
  //echo $password;

  $newpassword = generateHash($password);

  echo $newpassword;


  $stmt = $mysqli->prepare(
    "INSERT INTO " . $db_table_prefix . "UserDetails (
		UserID,
		UserName,
		FirstName,
		LastName,
		Email,
		Password,
		MemberSince,
		Active
		)
		VALUES (
		'" . $rand_string . "',
		?,
		?,
		?,
		?,
		?,
        '" . time() . "',
        1
		)"
  );
  $stmt->bind_param("sssss", $username, $firstname, $lastname, $email, $newpassword);
  //print_r($stmt);
  $result = $stmt->execute();
  //print_r($result);
  $stmt->close();
  return $result;

}

//Retrieve complete user information by username
function fetchUserDetails($username)
{

  global $mysqli,$db_table_prefix;
  $stmt = $mysqli->prepare("SELECT
		UserID,
		UserName,
		FirstName,
		LastName,
		Email,
		Password,
		MemberSince,
		Active
		FROM ".$db_table_prefix."UserDetails
		WHERE
		UserName = ?
		LIMIT 1");
  $stmt->bind_param("s", $username);

  $stmt->execute();
  $stmt->bind_result($UserID, $UserName, $FirstName, $LastName, $Email, $Password, $MemberSince, $Active);
  while ($stmt->fetch()){
    $row = array('UserID' => $UserID,
                 'UserName' => $UserName,
                 'FirstName' => $FirstName,
                 'LastName' => $LastName,
                 'Email' => $Email,
                 'Password' => $Password,
                 'MemberSince' => $MemberSince,
                 'Active' => $Active);
  }
  $stmt->close();
  return ($row);
}



//fetch user permission
function fetchUserPermission()
{
  global $loggedInUser,$mysqli,$db_table_prefix;

  if($loggedInUser == NULL)
  {
    return NULL;
  }

  $stmt = $mysqli->prepare("SELECT
		Permission
		FROM ".$db_table_prefix."UserDetails
		WHERE
		UserID = ?
		AND
		Password = ?
		AND
		active = 1
		LIMIT 1");
  $stmt->bind_param("is", $loggedInUser->user_id, $loggedInUser->hash_pw);

  $stmt->bind_result($permission);
  while ($stmt->fetch()){
    $row[] = array('Permission' => $permission);
  }

  $ret = $stmt->execute();
  $stmt->close();

  if($ret == false)
  {
    return NULL;
  }
  else
  {
    return $row;
  }
}

//Check if a user is logged in
function isUserLoggedIn()
{
  echo "isUserLoggedIn come here!";


  global $loggedInUser,$mysqli,$db_table_prefix;
  $stmt = $mysqli->prepare("SELECT
		UserID,
		Password
		FROM ".$db_table_prefix."UserDetails
		WHERE
		UserID = ?
		AND
		Password = ?
		AND
		active = 1
		LIMIT 1");
  $stmt->bind_param("is", $loggedInUser->user_id, $loggedInUser->hash_pw);
  $stmt->execute();
  $stmt->store_result();
  $num_returns = $stmt->num_rows;
  $stmt->close();

  if($loggedInUser == NULL)
  {
    return false;
  }
  else
  {
    if ($num_returns > 0)
    {

      echo "isUserLoggedIn     11111111";

      return true;
    }
    else
    {
      echo "isUserLoggedIn     22222222";


      destroySession("ThisUser");
      return false;
    }
  }
}



//Destroys a session as part of logout
function destroySession($name)
{
  if(isset($_SESSION[$name]))
  {
    $_SESSION[$name] = NULL;
    unset($_SESSION[$name]);
  }
}


//Retrieve complete user information of all users
function fetchAllUsers()
{

  global $mysqli,$db_table_prefix;
  $stmt = $mysqli->prepare("SELECT
		UserID,
		UserName,
		FirstName,
		LastName,
		Email,
		Password,
		MemberSince,
		Active
		FROM ".$db_table_prefix."UserDetails
		");

  $stmt->execute();
  $stmt->bind_result($UserID, $UserName, $FirstName, $LastName, $Email, $Password, $MemberSince, $Active);
  while ($stmt->fetch()){
    $row[] = array('UserID' => $UserID,
                 'UserName' => $UserName,
                 'FirstName' => $FirstName,
                 'LastName' => $LastName,
                 'Email' => $Email,
                 'Password' => $Password,
                 'MemberSince' => $MemberSince,
                 'Active' => $Active);
  }
  $stmt->close();
  return ($row);
}