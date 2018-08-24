<?php
	// connect to database 
	mysql_connect("localhost", "root", "") or
		die("Could not connect: " . mysql_error());
	mysql_select_db("alisio") or die("Could not select database");

	/* mysql_connect close connection as soon as script ends, 
		doesn't require a mysql_close at the end of it use, 
		but can be close earlier using mysql_close
	*/
?>