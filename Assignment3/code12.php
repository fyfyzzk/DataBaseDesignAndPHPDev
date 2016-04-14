<html>
<head>
<title>Chess Board</title>
</head>
<body>
<table width="270px" cellspacing="0px" cellpadding="0px" border="1px">
<?php



$bgColor = ["#FFFFFF", "#000000"];
$seletColorNum = 0;

for ($row = 0; $row < 9; $row++){
  echo "<tr>";

  for ($column = 0; $column < 9; $column++){
    // even
    if ($row % 2 == 0){
      $seletColorNum = $column % 2;
      echo "<td height=30px width=30px bgcolor=" .$bgColor[$seletColorNum]. " </td>";
    }//  odd
    else {
      $seletColorNum = ($column + 1) % 2;
      echo "<td height=30px width=30px bgcolor=" .$bgColor[$seletColorNum]. " </td>";
    }
  }

  echo "</tr>";
}

?>
</body>
</html>
