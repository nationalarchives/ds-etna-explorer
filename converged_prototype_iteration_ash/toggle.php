<?php 
$disable_enhancements = $_COOKIE["disable_enhancements"];

if($disable_enhancements == "false" || $disable_enhancements == null) {
    setcookie("disable_enhancements", "true");
}
else {
    setcookie("disable_enhancements", "false");
}

$redirect = $_GET["redirect"];
header('Location: ' . $redirect);
exit;

?>