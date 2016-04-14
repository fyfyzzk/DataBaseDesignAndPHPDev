<html>
<head>
<title>Different Operators Demo</title>
</head>
<body>
<?php


$d = 'U00123';
$d .= '0';


//echo $d++;

for ($i = 0; $i < 9; $i++){
  echo "<p>".(++$d)."</p>";
}

$d = 'U00123' . '10';
echo $d;

?>
</body>
</html>
