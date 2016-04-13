
<?php
	// login datebase
	$hostname = "127.0.0.1";
	$username = "root";
	$password ="12345678";
	$connection = mysql_connect($hostname, $username, $password) or die("Could not open connection to database");
	//set value
	$drug_name = $_GET['drug'];
	session_start();
	$name=$_SESSION['username'];
	//select database
 	mysql_select_db("assignment", $connection) or die("Could not select database");
	$result = mysql_query("select * from comments where drug_name = '$drug_name'") or die("Could not issue MySQL query");
	//use json to show data
	while($row=mysql_fetch_array($result,MYSQL_ASSOC)){
		$json1[]=$row;
	}
	echo json_encode($json1);


?>