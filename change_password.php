<?php
	// login datebase
	$hostname = "127.0.0.1";
	$username = "root";
	$password ="12345678";
	$connection = mysql_connect($hostname, $username, $password) or die("Could not open connection to database");

	$method=$_SERVER["REQUEST_METHOD"];
	//this one need to add when using the put or delete
	parse_str(file_get_contents("php://input"),$post_vars);
	//set value
	session_start();
	$user_name = $_SESSION['username'];
	$pwd=$post_vars['old_password'];
	$pwd2=$post_vars['new_password'];
	//connect database
    mysql_select_db("assignment", $connection) or die("Could not select database");
	$result_np = mysql_query("select * FROM members WHERE userName='$user_name' and userPassword = '$pwd'");
	//not allow the new password same with old password
	if($pwd == $pwd2){
		echo "can not use the old password";
	}else if(mysql_num_rows($result_np)!=1){
		//if old password wrong, not allow change
		echo "old password wrong!";
	}else if($pwd2 == ""){
		echo "entry new password";
	}else{
		//if no problem, can change
		$result = mysql_query("UPDATE members SET userPassword='$pwd2' WHERE userName = '$user_name'");
		echo $result;
	}

?>