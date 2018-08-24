<html>
<head>
<title></title>
<meta http-equiv='Content-Type' content='text/html; charset=TIS-620'> 
<style>
body {
	font-family : Tahoma; 
	font-size:12px;
	margin : 0px;
	padding : 0px;
	text-align:-moz-center;
	#text-align:center;
}
td {
	color:#FFFFFF;
	font-family : Tahoma; 
	font-size:12px;
	margin : 0px;
	padding : 0px;
}
a {
	color:#FFFF99;
	text-decoration : none;
}
</style>
</head>
<body>
<?
	//ตรวจสอบว่าไฟล์ที่รับมาเป็นสกุล jpg หรือ gif หรือ png หรือเปล่า
	if($photo_type == "image/pjpeg" || $photo_type == "image/gif" ||  $photo_type == "image/x-png")
	{
		$path = "files/"; //กำหนดที่เก็บรูปภาพใหม่
		$height = 100; //กำหนดความสูงของรูปใหม่
		$width = 100; //กำหนดความกว้างของรูปใหม่
		if($photo_type == "image/pjpeg") $images_orig = ImageCreateFromJPEG($photo);
		else if($photo_type == "image/gif") $images_orig = ImageCreateFromGIF($photo);
		else if($photo_type == "image/x-png") $images_orig = ImageCreateFromPNG($photo);
		
		$photoX = ImagesX($images_orig);
		$photoY = ImagesY($images_orig); 
		$images_fin = ImageCreateTrueColor($width, $height); 
		ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY); 

		if($photo_type == "image/pjpeg") ImageJPEG($images_fin,$path.$photo_name);
		else if($photo_type == "image/gif") ImageGIF($images_fin,$path.$photo_name); 
		else if($photo_type == "image/x-png")  ImagePNG($images_fin,$path.$photo_name); 
			
		ImageDestroy($images_orig);
		ImageDestroy($images_fin);
		print "<div style=\"color:#000000\">อับโหลดเรียบร้อย</div>";
		print "<a href=\"resize.php\" style=\"color:#000000\">กลับไปหน้าที่แล้ว</a>";
	}
	else
	{
		print "รูปแบบไฟล์ไม่ถูกต้อง";
		print "<a href=\"resize.php\" style=\"color:#000000\">กลับไปหน้าที่แล้ว</a>";
	}
?>
</body>
</html>