
<? $lang = $_POST['lang'];?>

<?

$massage1 = $_POST['editor1'];
$massage = addslashes($massage1);


?>

<?php

include("db_connect.php"); // incude ครั้งเดียวในไฟล์ที่เรียกใช้งาน
connect(); // เชื่อมต่อกับฐานข้อมูล
if($_FILES["fileUpload"]["tmp_name"] != "")
	{
	$images = $_FILES["fileUpload"]["tmp_name"];
	$new_images = "Thumbnails_".$_FILES["fileUpload"]["name"];
	copy($_FILES["fileUpload"]["tmp_name"],"MyResize/".$_FILES["fileUpload"]["name"]);
	
	
	$images = $_FILES["fileUpload2"]["tmp_name"];
	$new_images = "Thumbnails_".$_FILES["fileUpload2"]["name"];
	copy($_FILES["fileUpload2"]["tmp_name"],"MyResize/".$_FILES["fileUpload2"]["name"]);


	$data = array(
	"act_name"=>$_POST['title'],
	"image"=>$_FILES["fileUpload"]["name"],
	"imageSlide"=>$_FILES["fileUpload2"]["name"],
	"desc_s"=>$_POST['detail'],
	"start_date"=>$_POST['dateInput'],
	"end_date"=>$_POST['dateInput2'],
	"desc_l"=>$massage,
	"slideshow"=>$_POST['slideshow'],
	"short"=>$_POST['short'],

	);


update("tbl_activity_".$lang,$data,"act_id ='".$_POST['id']."'");

	}

	if($_FILES["fileUpload"]["tmp_name"]== "")
	{
	
	$data = array(
	"act_name"=>$_POST['title'],

	"desc_s"=>$_POST['detail'],
	"start_date"=>$_POST['dateInput'],
	"end_date"=>$_POST['dateInput2'],
	"desc_l"=>$massage,
	"slideshow"=>$_POST['slideshow'],
	"short"=>$_POST['short'],
	);



update("tbl_activity_".$lang,$data,"act_id ='".$_POST['id']."'");
}



?>

<META HTTP-EQUIV="Refresh" CONTENT="1;URL=activity.php?page=activity&lang=<? echo $lang; ?>">

