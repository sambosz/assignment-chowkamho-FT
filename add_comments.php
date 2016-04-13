<?php
	// login datebase
	$hostname = "127.0.0.1";
	$username = "root";
	$password ="12345678";
	$connection = mysql_connect($hostname, $username, $password) or die("Could not open connection to database");
	
	$method=$_SERVER["REQUEST_METHOD"];
	//set up the username
	session_start();
	$user=$_SESSION['username'];
	//set up the value to the php when the data send form html
	$comments=$_POST['user_comments'];
	$drug = $_POST['drug_name'];
	//select the database
	mysql_select_db("assignment", $connection) or die("Could not select database");
	//find the data form the member
	$result = mysql_query("select * FROM members WHERE userName = '$user'");
	//cheak the user is exist or not, if yes, add comment to the comments table, if no, not allow
	if(mysql_num_rows($result) ==1){
		mysql_query("INSERT INTO comments(user_name, user_comment,drug_name) VALUES ('$user','$comments','$drug')") or die("Could not issue MySQL query");
		echo "you added the new comments!";
	}else
		echo "please login!";
?>