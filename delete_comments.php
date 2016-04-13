<?php
	// login datebase
	$hostname = "127.0.0.1";
	$username = "root";
	$password ="12345678";
	$connection = mysql_connect($hostname, $username, $password) or die("Could not open connection to database");
	
	$method=$_SERVER["REQUEST_METHOD"];
	parse_str(file_get_contents("php://input"),$post_vars);
	//set up value
	$id=$post_vars['comments_id'];
	session_start();
	$user_name = $_SESSION['username'];
	//select the database
	mysql_select_db("assignment", $connection) or die("Could not select database");
	// to check the id and user name is right or not
	$result = mysql_query("select * FROM comments WHERE id='$id' and user_name = '$user_name'");
	// it uses the id to find the comment, the user name is for who allow to delete the comment
	if(mysql_num_rows($result)=='1'){
		mysql_query("DELETE FROM comments WHERE id='$id' and user_name = '$user_name'");
		echo "Delete Success, you deleted the comment";
	}else{
		echo "Delete Failure, you can not delete this comment";
	}

?>