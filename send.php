<?php
include "db.php";
session_start();
if(isset($_SESSION["nickname"])) $name = $_SESSION["nickname"];
$mes = $_POST["messageText"];

mysqli_query($link, "INSERT INTO messages (`name`, `message`) VALUES (\"$name\", \"$mes\")");

header("Location:chat.php");

?>