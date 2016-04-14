<?php
/**
 * Created by PhpStorm.
 * User: zhenkangzhao15mbp
 * Date: 3/31/16
 * Time: 9:27 PM
Write a PHP script to extract the file name from the following string.
Sample String : 'www.example.com/public_html/index.php'
Expected Output : 'index.php'
 */

$str = "pan.baidu.com/sfep/dota2.php";
$lastsubstr = strrchr($str, '/');
#$length = strlen($str);
echo substr($lastsubstr, 1);
?>

