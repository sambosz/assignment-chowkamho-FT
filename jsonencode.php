<?php
////////////////////////
//connect the database//
////////////////////////
$hostname = "127.0.0.1";
$username = "root";
$password ="12345678";
$connection = mysql_connect($hostname, $username, $password) or die("Could not open connection to database");

//select the database
mysql_select_db("assignment", $connection) or die("Could not select database");

//set the result is SQL code
$result = mysql_query("select * from membersPersonalData") or die("Could not issue MySQL query");

//---------------------------------------------------------------------------------------------------------------//
//print data
while($row=mysql_fetch_array($result,MYSQL_ASSOC)){
$json1[]=$row;
}

echo json_encode($json1);

?>