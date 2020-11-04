<?php
session_start();

//Connecting to database
$servername = "mydb.ics.purdue.edu";
$username = "g1116905";
$password = "iegroup25";
$dbname = "g1116905";

$data_base = mysqli_connect($servername, $username, $password, $dbname);

if(!$data_base){
	die("Connection failed: " . mysqli_connect_error());
}