<?php
	// connect to database 
	$connectmysql_dbname="cci_db";
	$link = @mysql_connect("localhost", "cci_db", "?okokok@omc12345") or die("Could not connect: " . mysql_error());
//	$link = @mysql_connect("p-enterprise.com:9100", "dev", "dev@cci") or die("Could not connect: " . mysql_error());
	
	//$link = mysql_connect("localhost", "root", "root") or die("Could not connect: " . mysql_error());

	$charset = "SET NAMES 'tis620'"; 
    mysql_query($charset) or die('Invalid query: ' . mysql_error()); 

	mysql_select_db("$connectmysql_dbname") or die("ไม่สามารถใช้งานฐานข้อมลได้ กรุณาอ่านวิธีลงโปรแกรมใน install file");
	/* mysql_connect close connection as soon as script ends, 
		doesn't require a mysql_close at the end of it use, 
		but can be close earlier using mysql_close
	*/
include("../function/global_center.php");
?>
