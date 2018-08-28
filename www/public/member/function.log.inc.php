<?
//////////////////////////////////////////////////////////////////////////////////
///////////////////////////// log file function ////////////////////////
// วิธีใช้
// ทุกครั้งที่มีการ login logout insert update delete ให้เขียนข้อมูลที่เกี่ยวข้องลงใน log file
// โดยที่ข้อมูลที่จะเขียนลงไปควรมี
// ...............................................................................
// วันที่ เวลา ip userid action(login logout insert update delete)
//			(ถ้าเป็นไปได้ ให้มี old data ก่อนการ update ด้วยก็จะดีมาก)
// ...............................................................................
//
// วีธีเรียกใช้ function
// require_once ("function.log.inc.php");
// $text="uid=".$_SESSION["adminuserid"]." action=login";
// writelogfile($text);


function writelogfile($text){
	//Max log file size 1 MB   
	$filename = "logs/log.txt";
	//if size exceed 1 MB, rename it to logYYYYMMDD.txt
	if (filesize($filename) > 1000000){
		rename($filename,"logs/log".date("Ymd").".txt");
	}
	//finc user remote ip
	if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])){ 
		$ip=$_SERVER['REMOTE_ADDR'].":".$_SERVER['HTTP_X_FORWARDED_FOR'];
	} 
	else{ 
		$ip=$_SERVER['REMOTE_ADDR'];
	}
	//open log.txt and write text to it
	$temptext =date("Y-m-d h:i:s")." ip=".$ip." ".$text."\n";
	$fp = fopen($filename,"a");
	fwrite($fp,$temptext);	
	fclose($fp);
}

?>