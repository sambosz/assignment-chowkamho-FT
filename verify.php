<?php
// login datebase
$hostname = "127.0.0.1";
$username = "root";
$password ="12345678";
$connection = mysql_connect($hostname, $username, $password) or die("Could not open connection to database");

$method=$_SERVER["REQUEST_METHOD"];
echo $method;


switch ($method){
	case GET:
	    $_GET;
	    break;

	case POST:
	    $_POST;
	    $username=$_POST['userid'];
	    $pwd=$_POST['password'];
     	    mysql_select_db("assignment", $connection) or die("Could not select database");
            $result = mysql_query("select * from members where userName='$username' and userPassword='$pwd' ") or die("Could not issue MySQL query");
	    $num_row=mysql_num_rows($result);
	    echo $num_row;
	    break;

	case PUT:
	    parse_str(file_get_contents("php://input"),$post_vars);
	    $username = $post_vars['userid'];
	    $pwd = $post_vars['password'];
	    mysql_select_db("membership", $connection) or die("Could not select database");
	    $result = mysql_query(" UPDATE members SET password='$pwd' where login='$username' ") or die("Could not issue MySQL query");
	    break;

	case DELETE:
	    parse_str(file_get_contents("php://input"),$post_vars);
            $username = $post_vars['userid'];
            $pwd = $post_vars['password'];
 	    mysql_select_db("membership", $connection) or die("Could not select database");
	    $result = mysql_query(" delete from members where login='$username' ") or die("Could not issue MySQL query");
	    break;
}


?>