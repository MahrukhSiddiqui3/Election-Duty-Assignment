<?php
session_start();
include("DbConnection.php");
$self = $_SERVER['PHP_SELF'];

function redirect($url)
{
	header("Location:".$url);
}

?>