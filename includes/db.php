<?php

$connection = mysqli_connect("localhost",'root','root','bus');

if(!$connection) {
	die("Unable to connect" . mysqli_error($connection));
}

?>