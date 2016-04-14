<?php
/**
 * Created by PhpStorm.
 * User: zhenkangzhao15mbp
 * Date: 3/31/16
 * Time: 9:43 PM
CODE18:
Write a PHP script to generate simple random password [do not use rand()
function] from a given string.
Sample string :
'1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz'
Note : Password length may be 6, 7, 8 etc.
 */

$str = "1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz";


#$substr1 = strstr($str, 4, 6);
echo str_shuffle(substr($str, 0, 6))."<br>";

echo str_shuffle(substr($str, 0, 7))."<br>";

echo str_shuffle(substr($str, 0, 8))."<br>";


echo str_shuffle(substr($str, 20, 9))."<br>";

?>