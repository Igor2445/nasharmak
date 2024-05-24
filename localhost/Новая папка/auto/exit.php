<?php
session_start();
unset($_SESSION["login"]);
unset($_SESSION["password"]);

header("HTTP/1.1 301 Moved Permanently");
header("location: ".$_SERVER["HTTP_REFERER"]);
?>
