<?php
/**
 * Created by PhpStorm.
 * User: zhenkangzhao
 * Date: 4/3/16
 * Time: 16:30
 */
/*class db_coninfo
{
    public $db_host = "localhost"; //Host address (most likely localhost)
    public $db_name = "LoginUserDB"; //Name of Database
    public $db_user = "root"; //Name of database user
    public $db_pass = "root"; //Password for database user
};

global $db_con_info;
$db_con_info = new db_coninfo();*/


$db_host = "localhost"; //Host address (most likely localhost)
$db_name = "LoginUserDB"; //Name of Database
$db_user = "root"; //Name of database user
$db_pass = "root"; //Password for database user

//create connection

$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);
//global $mysqli;


// Check connection
if(mysqli_connect_errno()) {
    echo "Connection Failed: " . mysqli_connect_errno();
    exit();

}else{
    echo "Connection Successful"."<br><br>";
}



$sql = "SELECT uniqueid, firstname FROM FirstNameTable";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    // output data of each row

    while($row = $result->fetch_assoc()) {

        echo "uniqueid: " . $row["uniqueid"]. " - Name: " . $row["firstname"] ."<br>";
    }
} else {
    echo "0 results";
}
$mysqli->close();

?>

