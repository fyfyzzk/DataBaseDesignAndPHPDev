<?php
/**
 * Created by PhpStorm.
 * User: zhenkangzhao15mbp
 * Date: 3/31/16
 * Time: 9:18 PM

 * Write a PHP script to :
a) transform a string all uppercase letters.
b) transform a string all lowercase letters.
c) make a string's first character uppercase.
d) make a string's first character of all the words uppercase.

 */

$str = "hello World! I'm a student in Pace University!";
echo strtoupper($str)."<br>";
echo strtolower($str)."<br>";
echo ucfirst($str)."<br>";
echo ucwords($str)."<br>";
?>