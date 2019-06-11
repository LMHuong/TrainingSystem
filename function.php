<?php
//this is for security purpose
function sanitizeString($str) {
    global $connection;
    $str = strip_tags($str); //remove html tags
    $str = htmlentities($str); //encode html (for special characters)
    if (get_magic_quotes_gpc()){
        $str = stripslashes($str); //Don't use the magic quotes
    }
    //Avoid MYSQL Injection
    $str = $connection->real_escape_string($str);
    return $str;
}

//Convert password into encrypted form
function passwordToToken($password){
    global $salt1;
    global $salt2;
    $token = hash ("ripemd128", "$salt1$password$salt2");
    return $token;
}
?>
