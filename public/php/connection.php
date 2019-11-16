<?php



//code for connection to the database
	$connection = mysqli_connect('localhost:8889', 'root', 'root','odessagu_flightsimsuk');
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
?>
