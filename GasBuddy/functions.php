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
		stationname,
		address,
		zipcode,
		gastype1,
		gasprice1,
		gastype2,
		gasprice2,
		gastype3,
		gasprice3
		FROM " . $db_table_prefix . "stations"
  );

  $stmt->execute();
  $stmt->bind_result(
    $id,
    $stationname,
    $address,
    $zipcode,
    $gastype1,
    $gasprice1,
    $gastype2,
    $gasprice2,
    $gastype3,
    $gasprice3
  );

  while ($stmt->fetch()) {
    $row [] = array(
        'id'                      => $id,
        'stationname'             => $stationname,
        'address'                 => $address,
        'zip'                     => $zipcode,
        'gastype1'                => $gastype1,
        'gasprice1'               => $gasprice1,
        'gastype2'                => $gastype2,
        'gasprice2'               => $gasprice2,
        'gastype3'                => $gastype3,
        'gasprice3'               => $gasprice3
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
function createNewUser($stationname, $address, $zipcode, $gastype1, $gasprice1, $gastype2, $gasprice2, $gastype3, $gasprice3)
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

  $stmt = $mysqli->prepare(
    "INSERT INTO stations (
		stationname,
		address,
		zipcode,
		gastype1,
		gasprice1,
		gastype2,
		gasprice2,
		gastype3,
		gasprice3
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
        ?
		)"
  );
  $stmt->bind_param("ssisisisi", $stationname, $address, $zipcode, $gastype1, $gasprice1, $gastype2, $gasprice2, $gastype3, $gasprice3);
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
function fetchThisUser($id)
{
    global $mysqli;
    $stmt = $mysqli->prepare(
      "
    SELECT
    id,
    stationname,
    address,
    zipcode,
    gastype1,
    gasprice1,
    gastype2,
    gasprice2,
    gastype3,
    gasprice3

    FROM stations
    WHERE
    id = ?
    "
    );
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($id, $stationname, $address, $zipcode, $gastype1, $gasprice1, $gastype2, $gasprice2, $gastype3, $gasprice3);
    //$stmt->execute();

  while ($stmt->fetch()) {
    $row[] = array(
      'id'                      => $id,
      'stationname'             => $stationname,
      'address'                 => $address,
      'zip'                     => $zipcode,
      'gastype1'                => $gastype1,
      'gasprice1'               => $gasprice1,
      'gastype2'                => $gastype2,
      'gasprice2'               => $gasprice2,
      'gastype3'                => $gastype3,
      'gasprice3'               => $gasprice3
    );
  }

  //print_r($row);
  $stmt->close();
  return ($row);
}

function fetchByZip($zipcode)
{
    global $mysqli;
    $stmt = $mysqli->prepare(
        "
    SELECT
    id,
    stationname,
    address,
    zipcode,
    gastype1,
    gasprice1,
    gastype2,
    gasprice2,
    gastype3,
    gasprice3

    FROM stations
    WHERE
    zipcode = ?
    "
    );
    $stmt->bind_param("i", $zipcode);
    $stmt->execute();
    $stmt->bind_result($id, $stationname, $address, $zipcode, $gastype1, $gasprice1, $gastype2, $gasprice2, $gastype3, $gasprice3);

    while ($stmt->fetch()) {
        $row[] = array(
            'id'                      => $id,
            'stationname'             => $stationname,
            'address'                 => $address,
            'zipcode'                     => $zipcode,
            'gastype1'                => $gastype1,
            'gasprice1'               => $gasprice1,
            'gastype2'                => $gastype2,
            'gasprice2'               => $gasprice2,
            'gastype3'                => $gastype3,
            'gasprice3'               => $gasprice3
        );
    }

    //print_r($row);
    $stmt->close();
    return ($row);
}

function updateThisRecord($id, $stationname, $address, $zipcode, $gastype1, $gasprice1, $gastype2, $gasprice2, $gastype3, $gasprice3)
{
    global $mysqli, $db_table_prefix;


    echo $zipcode;
    echo $gastype2;
    echo $gasprice2;
    echo $gastype3;
    echo $gasprice3;

    $stmt = $mysqli->prepare(
      "UPDATE " . $db_table_prefix . "stations
		SET
        stationname = ?,
        address = ?,
        zipcode = ?,
        gastype1 = ?,
        gasprice1 = ?,
        gastype2 = ?,
        gasprice2 = ?,
        gastype3 = ?,
        gasprice3 = ?

		WHERE
		id = ?
		LIMIT 1"
    );


    $stmt->bind_param("ssisisisii", $stationname, $address, $zipcode, $gastype1, $gasprice1, $gastype2, $gasprice2, $gastype3, $gasprice3, $id);


    echo $stationname;
    echo $zipcode;


    $result = $stmt->execute();
    $stmt->close();

    return $result;
}



