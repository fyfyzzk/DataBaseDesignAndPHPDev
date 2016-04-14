<?php
/**
 * Created by PhpStorm.
 * User: zhenkangzhao15mbp
 * Date: 3/31/16
 * Time: 8:58 PM
 */

$datetime1 = new DateTime('2016-03-31');
$datetime2 = new DateTime('1986-03-4');

echo $datetime2->format("Y-m-d")." - ".$datetime1->format("Y-m-d")."<br>";
$datediff = $datetime1->diff($datetime2);

#echo "date1: ".$datetime1."   date2:".$datetime2;
echo $datediff->format("%Y years, %m months, %d days");

?>



