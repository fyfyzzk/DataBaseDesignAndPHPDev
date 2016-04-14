<?php

require_once("config.php");




$thisUserID = $_GET['id'];


$foundUser = fetchThisUser($thisUserID);

echo "<pre>";
  print_r($foundUser);
echo "</pre>";
?>

<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
  <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
  <title>
  FIRST CRUD - Ipdate This Record
  </title>
  <!-- Style -- Can also be included as a file usually style.css -->
  <style type="text/css">
  table.table-style-three {
    font-family: verdana, arial, sans-serif;
    font-size: 11px;
    color: #333333;
    border-width: 1px;
    border-color: #3A3A3A;
    border-collapse: collapse;
  }
  table.table-style-three th {
    border-width: 1px;
    padding: 8px;
    border-style: solid;
    border-color: #FFA6A6;
    background-color: #D56A6A;
    color: #ffffff;
  }
  table.table-style-three a {
    color: #ffffff;
    text-decoration: none;
  }

  table.table-style-three tr:hover td {
    cursor: pointer;
  }
  table.table-style-three tr:nth-child(even) td{
    background-color: #F7CFCF;
  }
  table.table-style-three td {
    border-width: 1px;
    padding: 8px;
    border-style: solid;
    border-color: #FFA6A6;
    background-color: #ffffff;
  }
</style>

</head>
<body>

<form name="getUserDetails" method="post" action="processUpdateUser.php">
<table class="table-style-three">
  <?php foreach ($foundUser as $userdetails) { ?>
  <tr><td>Station Name :</td>      <td><input type="text" name="stationname" value="<?php print $userdetails['stationname']; ?>"></td></tr>
  <tr><td>Address :</td>       <td><input type="text" name="address" value="<?php print $userdetails['address']; ?>"></td></tr>
  <tr><td>Zip Code :</td>  <td><input type="text" name="zipcode" value="<?php print $userdetails['zip']; ?>"></td></tr>
  <tr><td>Gas Type1 :</td>          <td><input type="text" name="gastype1" value="<?php print $userdetails['gastype1']; ?>"></td></tr>
  <tr><td>Gas Price1 :</td>           <td><input type="text" name="gasprice1" value="<?php print $userdetails['gasprice1']; ?>"></td></tr>
  <tr><td>Gas Type2 :</td>            <td><input type="text" name="gastype2" value="<?php print $userdetails['gastype2']; ?>"></td></tr>
    <tr><td>Gas Price2 : </td>      <td><input type="text" name="gasprice2" value="<?php print $userdetails['gasprice2'];?>"></td></tr>
    <tr><td>Gas Type3 : </td>      <td><input type="text" name="gastype3" value="<?php print $userdetails['gastype3'];?>"></td></tr>
    <tr><td>Gas Price3 : </td>      <td><input type="text" name="gasprice3" value="<?php print $userdetails['gasprice3'];?>"></td></tr>
    <tr><td>ID : </td>      <td><input type="text" name="id" value="<?php print $userdetails['id'];  ?>" disabled></td></tr>
    <input type="hidden" name="id" value="<?php print $userdetails['id'];?>" >
  <?php } ?>
</table>

  <input type="submit" name="submit" value="Update Me">

</form>


</body>
</html>