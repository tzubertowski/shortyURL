<?php
$server   = "MYSQL server host";
$database = "DB NAME on the server";
$username = "DB username";
$password = "Password for DB";

$connection_string = mysql_connect($server, $username, $password);
if (!$connection_string)
{
	echo "<h6>Can't seem to connect to DB. Check your password or/and if the db isup.</h6>";
}
else
{
	mysql_select_db($database, $connection_string);
}
?>
