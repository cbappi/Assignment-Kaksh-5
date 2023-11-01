<?php


if(isset($_GET['p'])) {
	$p = $_GET['p'];
} else{
	$p = 'list_info';
} 

include("views/$p.php");
