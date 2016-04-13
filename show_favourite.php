<?php
	// login datebase
	$hostname = "127.0.0.1";
	$username = "root";
	$password ="12345678";
	$connection = mysql_connect($hostname, $username, $password) or die("Could not open connection to database");
	
	//set value
	session_start();
	$name=$_SESSION['username'];
	//select database
	mysql_select_db("assignment", $connection) or die("Could not select database");
	$result = mysql_query("select * from favourite where user_name='$name'") or die("Could not issue MySQL query");
	//use json show value
	while($row=mysql_fetch_array($result,MYSQL_ASSOC)){
	$json1[]=$row;
	}
	
	echo json_encode($json1);

?>