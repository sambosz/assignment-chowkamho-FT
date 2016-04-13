<?php
	// login datebase
	$hostname = "127.0.0.1";
	$username = "root";
	$password ="12345678";
	$connection = mysql_connect($hostname, $username, $password) or die("Could not open connection to database");
	
	$method=$_SERVER["REQUEST_METHOD"];
	//set up the value
	$user=$_POST['username'];
	$favourites=$_POST['favourite'];
	//select the database
	mysql_select_db("assignment", $connection) or die("Could not select database");
	//type the spl code and put the result to the "$result"
	$result = mysql_query("select * FROM favourite WHERE user_name = '$user' and drug_name = '$favourites'");
	//check if user added it in to favourite list, not allow to add, if did not, add it to favourite list(use user name 	and drug name to check)
	if(mysql_num_rows($result)<1){
		mysql_query("INSERT INTO favourite(user_name, drug_name) VALUES ('$user','$favourites')") or die("Could not issue MySQL query");
		echo "It add to your favourite!";
	}else
		echo "You own it in your favourite list!";
?>