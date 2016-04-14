<?php
/**
 * Created by PhpStorm.
 * User: zhenkangzhao15mbp
 * Date: 3/31/16
 * Time: 9:59 PM

Write a PHP script to get the characters after the last '/' in an url.
Sample URL : 'http://www.example.com/5478631'
Expected Output : '5478631'
 */

$url = "http://www.w3school.com/987654321";

echo substr(strrchr($url, '/'), 1);


?>