<?php
/**
 * Created by PhpStorm.
 * User: PraviinM
 * Date: 2/7/16
 * Time: 3:23 PM
 */
?>


<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
  <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
  <title>
FIRST CRUD - Create New Record
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

  <?php require_once("config.php"); ?>

  <form name="createNewRecord" action="createNewRecord_DBINSERT.php" method="post">
  <!-- Table goes in the document BODY -->
  <table class="table-style-three">
      <thead>
      <!-- Display CRUD options in TH format -->
      <tr>
        <th>First Name</th>
        <td><input type="text" name="firstname" value=""></td>
      </tr>

      <tr>
        <th>Last Name</th>
        <td><input type="text" name="lastname" value=""></td>
      </tr>

      <tr>
          <th>Address</th>
          <td><input type="text" name="address" value=""></td>
      </tr>

      <tr>
          <th>Company1</th>
          <td><input type="text" name="company1" value=""></td>
      </tr>

      <tr>
          <th>Company2</th>
          <td><input type="text" name="company2" value=""></td>
      </tr>

      <tr>
          <th>Company3</th>
          <td><input type="text" name="company3" value=""></td>
      </tr>

      <tr>
          <th>phone1</th>
          <td><input type="text" name="phone1" value=""></td>
      </tr>

      <tr>
          <th>phone2</th>
          <td><input type="text" name="phone2" value=""></td>
      </tr>

      <tr>
          <th>phone3</th>
          <td><input type="text" name="phone3" value=""></td>
      </tr>

      <tr>
          <th>email1</th>
          <td><input type="text" name="email1" value=""></td>
      </tr>

      <tr>
          <th>email2</th>
          <td><input type="text" name="email2" value=""></td>
      </tr>

      <tr>
          <th>email3</th>
          <td><input type="text" name="email3" value=""></td>
      </tr>

      <tr>
        <th>BirthDate</th>
        <td><input type="text" name="birthdate" value=""></td>
      </tr>

      <tr>
        <th>Reminder</th>
        <td><input type="text" name="reminder" value=""></td>
      </tr>

      <tr>
        <th>Note</th>
        <td><input type="text" name="note" value=""></td>
      </tr>

      <tr>
        <td><input type="Submit" name="submit" value="create record"></td>
      </tr>
      </thead>
    </table>
  </form>
</body>
</html>




