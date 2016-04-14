<html>
<head>
  <title>This is a simple php insert form with MD5 password generator</title>
</head>
<body>


<?php
require_once("config.php");

/*    $db_host = "localhost"; //Host address (most likely localhost)
    $db_name = "LoginUserDB"; //Name of Database
    $db_user = "root"; //Name of database user
    $db_pass = "root"; //Password for database user
    
    
    //create connection
    $mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);
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
$mysqli->close();*/

?>
<br><br><br>
<form name="simulateInsert" method="post" action="insertDB.php">
    <label>UserName</label>
        <input name="userName" type="text">
    <br>
    <label>FirstName</label>
        <input name="firstName" type="text">
    <br>

    <label>LastName</label>
        <input name="lastName" type="text">
    <br>
    <label>Email</label>
        <input name="email" type="text">
    <br>
    <label>DateOfBirth</label>
        <input name="dateofBirth" type="text">
    <br>
    <label>Password</label>
        <input name="password" type="text">
    <br>
    <label>ConfirmPassword</label>
        <input name="confirmPassword" type="text">
    <br>
    <br>
  <input type="submit" value="submit">
</form>
</body>

</html>
