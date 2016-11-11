<?php
include_once('search.html');
session_start();
if(!isset($_SESSION['loggedin'])||$_SESSION['loggedin']==false)
{
		header("Location: index.php");
		exit;
}
//super global array $_GET
//var_dump($_GET);
$query = $_GET['query'];
//echo $query;
$result = searchFile($query);
?>
