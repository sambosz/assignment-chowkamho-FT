<?php
	// login datebase
	$hostname = "127.0.0.1";
	$username = "root";
	$password ="12345678";
	$connection = mysql_connect($hostname, $username, $password) or die("Could not open connection to database");
	
	$method=$_SERVER["REQUEST_METHOD"];
	//set value
	$search_word=$_POST['word'];
	//select database
	mysql_select_db("assignment", $connection) or die("Could not select database");
	//sql code
	$result = mysql_query("select * from drug_info where drug_name like '%$search_word%' or description like '%$search_word%'") or die("Could not issue MySQL query");
	//show data
	while($row = mysql_fetch_array($result)){
		echo "<a href=drug/".$row[0].".html rel='external'>".$row[0]."</a>";
		echo $row[1];
	}

?>