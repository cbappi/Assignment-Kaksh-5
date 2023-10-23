<?php
session_start();

$lines = file('../data/bb.csv', FILE_IGNORE_NEW_LINES);



$lines[$_POST['linenum']] = "{$_POST['role']},{$_POST['email']},{$_POST['password']},{$_POST['username']}";


$data_string = implode("\n",$lines);


$f = fopen('../data/bb.csv','w');
fwrite($f,$data_string);
fclose($f);

$_SESSION['message'] = array(
	'text' => 'The band has been edited.',
	'type' => 'info'
);

header('Location:../?p=list_info');
?>
