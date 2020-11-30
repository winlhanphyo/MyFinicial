<?php
	$dbhost="localhost";
	$dbuser="root";
	$dbpass="";
	$dbname="myfindb";

	$conn=mysqli_connect($dbhost,$dbuser,$dbpass);
	mysqli_select_db($conn,$dbname);
