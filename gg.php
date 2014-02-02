<?php
$server   = "mysql.hostinger.pl";
$database = "u638180218_short";
$username = "u638180218_tomas";
$password = "@l@m@k0t@";

$mysqlConnection = mysql_connect($server, $username, $password);
if (!$mysqlConnection)
{
  echo "Please try later.";
}
else
{
mysql_select_db($database, $mysqlConnection);
echo "YAY";
}
?>
