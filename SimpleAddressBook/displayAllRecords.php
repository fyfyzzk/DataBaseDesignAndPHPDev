<?php
/**
 * Created by PhpStorm.
 * User: Praviin
 * Date: 2/7/16
 * Time: 2:17 PM
 */

?>
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
  <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
  <title>
    FIRST CRUD
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
      color: blue;
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

  <?php require_once("config.php");

  $allrecords = fetchAllUsers();
  ?>

  <!-- Table goes in the document BODY -->
  <table class="table-style-three">
      <thead>
        <!-- display user details header  -->
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Address</th>
        <th>Company1</th>
        <th>Company2</th>
        <th>Company3</th>
        <th>Phone1</th>
        <th>Phone2</th>
        <th>Phone3</th>
        <th>Email1</th>
        <th>Email2</th>
        <th>Email3</th>
        <th>DateOfBirth</th>
        <th>Reminder</th>
        <th>Note</th>
      </thead>
      <tbody>
      <?php
      foreach($allrecords as $displayRecords) { ?>
      <tr>
        <td><a href="updateThisUser.php?userid=<?php print $displayRecords['userid']; ?>"><?php print $displayRecords['id']; ?></a></td>
        <td><?php print $displayRecords['firstname']; ?></td>
        <td><?php print $displayRecords['lastname']; ?></td>
        <td><?php print $displayRecords['address']; ?></td>
          <td><?php print $displayRecords['company1']; ?></td>
          <td><?php print $displayRecords['company2']; ?></td>
          <td><?php print $displayRecords['company3']; ?></td>
          <td><?php print $displayRecords['phone1']; ?></td>
          <td><?php print $displayRecords['phone2']; ?></td>
          <td><?php print $displayRecords['phone3']; ?></td>
          <td><?php print $displayRecords['email1']; ?></td>
          <td><?php print $displayRecords['email2']; ?></td>
          <td><?php print $displayRecords['email3']; ?></td>
          <td><?php print $displayRecords['birthdate']; ?></td>
          <td><?php print $displayRecords['reminder']; ?></td>
          <td><?php print $displayRecords['note']; ?></td>
      </tr>
      <?php } ?>
      </tbody>
  </table>

</body>
</html>
