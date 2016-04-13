<?php
	// login datebase
	$hostname = "127.0.0.1";
	$username = "root";
	$password ="12345678";
	$connection = mysql_connect($hostname, $username, $password) or die("Could not open connection to database");
	
	$method=$_SERVER["REQUEST_METHOD"];
	parse_str(file_get_contents("php://input"),$post_vars);
	//set up the value
	$id=$post_vars['favourite_id'];
	//select the database
	mysql_select_db("assignment", $connection) or die("Could not select database");
	//type the spl code and put the result to the "$result"
	$result = mysql_query("DELETE FROM favourite WHERE id='$id'") or die("Could not issue MySQL query");
	echo $result;


?>