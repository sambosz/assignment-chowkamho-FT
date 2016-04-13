<?php
		// login datebase
		$hostname = "127.0.0.1";
		$username = "root";
		$password ="12345678";
		$connection = mysql_connect($hostname, $username, $password) or die("Could not open connection to database");
		
		$method=$_SERVER["REQUEST_METHOD"];


	    //set up the value
	    $username=$_POST['userid'];
	    $pwd=$_POST['password'];
		$pwd2=$_POST['password2'];
		$email=$_POST['email'];
		//select the database
     	mysql_select_db("assignment", $connection) or die("Could not select database");
		//use for checking
		$result_of_name = mysql_query("select * FROM members WHERE userName = '$username'");
		$result_of_email = mysql_query("select * FROM members WHERE email = '$email'");
		//if all textbox is null
		if($username == "" or $pwd == "" or $pwd2 == "" or $email == ""){
			echo "you need to entry all row!";
		}else if($pwd != $pwd2){
			//if confirm password is wrong
			echo "confirm password wrong!";
		}else if(mysql_num_rows($result_of_name) ==1){
			//if someone used the username
			echo "someone used the username, please entry the other username";
		}else if(mysql_num_rows($result_of_email) ==1){
			//if someone used the email
			echo "someone used the email, please entry the other email";
		}else{
			//allow to create
			$result = mysql_query("INSERT INTO members(userName,userPassword, email) VALUES ('$username','$pwd','$email')") or die("Could not issue MySQL query");
			echo $result;
		}
		
		
		
		
		
		

?>