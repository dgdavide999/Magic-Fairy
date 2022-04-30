<?php
session_start();
unset($_SESSION["id"]);
unset($_SESSION["firstname"]);
unset($_SESSION["lastname"]);
unset($_SESSION["email"]);
unset($_SESSION["pass"]);
unset($_SESSION["role"]);
unset($_SESSION["campagna"]);

$arr_cookie_options = array (
    'expires' => time()-1,
    'path' => '/',
);
setcookie("cookietextc","", $arr_cookie_options);
setcookie("cookiebackgound","", $arr_cookie_options);
header("Location:../home_page.php");
?>