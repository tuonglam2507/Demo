<?php
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbdatabase = "qlbantru";
	$con = mysql_connect($dbhost, $dbuser, $dbpass) or die('Could not to the database' . mysql_error());
	@mysql_set_charset('utf8',$con);
	mysql_select_db($dbdatabase, $con) or die('Error !!! '. mysql_error());
?>