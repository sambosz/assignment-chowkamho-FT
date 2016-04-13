<?php
	// login datebase
	$hostname = "127.0.0.1";
	$username = "root";
	$password ="12345678";
	$connection = mysql_connect($hostname, $username, $password) or die("Could not open connection to database");
	
	$method=$_SERVER["REQUEST_METHOD"];
	//set up the username is the textbox username
	$username=$_POST['userid'];
	$pwd=$_POST['password'];
	//select the database
	mysql_select_db("assignment", $connection) or die("Could not select database");
	//type the spl code and put the result to the "$result"
	$result = mysql_query("select * from members where userName='$username' and userPassword='$pwd' ") or die("Could not issue MySQL query");
	
	//set up the user name to the session, it uses for save the user name to mean he/she is login
	session_start();
	$_SESSION['username'] = $username;
	//use for checking
	$num_row=mysql_num_rows($result);
	echo $num_row;
?>