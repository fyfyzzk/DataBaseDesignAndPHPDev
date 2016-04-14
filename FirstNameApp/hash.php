<?php

  //$addSomeSalt = "012345";


//$password = md5("Smith");
//echo "<br><br> password : " . $password."<br><br>";
//$code = md5(uniqid(rand(), TRUE));

//echo "code : ". $code;
  //echo "<br><br>";



//Generate a unique code
function getUniqueCode($length = "") {
  $code = md5(uniqid(rand(), TRUE));
  if ($length != "") {
    return substr($code, 0, $length);
  }
  else {
    return $code;
  }
}



//$plainText = getUniqueCode(15);
//echo "plainntext : ". $plainText;
//echo "<br><br>";

function generateHash($plainText, $salt = NULL) {
  if ($salt === NULL) {
    $salt = substr(md5(uniqid(rand(), TRUE)), 0, 25);
   echo "<br><br> salt when salt null : " . $salt;
  }

  else {
    $salt = substr($salt, 0, 25);
    echo "<br><br> salt else : " . $salt;
  }
  echo "<br><br> return statement :" .sha1($salt.$plainText);
  return $salt . sha1($salt . $plainText);
}


//$newpassword = generateHash($plainText);

//echo "<Br><br><bR>newpassword without salt / randomly generated salt  :" . $newpassword;

 // $saltpassword = generateHash($plainText, $addSomeSalt);

 // echo "<br><br><br> hash with salt : " . $saltpassword;

