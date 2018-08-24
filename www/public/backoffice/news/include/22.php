<?php

include("db_connect.php"); // incude ครั้งเดียวในไฟล์ที่เรียกใช้งาน
connect(); // เชื่อมต่อกับฐานข้อมูล
$sql="SELECT * FROM tbl_page_th ORDER BY id DESC WHERE page_name = "$page"";
$qr=select($sql); // select ข้อมูลในฐานข้อมูลมาแสดง
$total=count($qr);	// จำนวนรายการทั้งหมด ที่ select
$i=0; // จำเป็นต้องกำหนด
while($i<count($qr)) // วนลูปแสดงข้อมูล 
{
	$rs=$qr[$i]; // จำเป็นต้องกำหนด
	echo	 $rs['page_name']."<br>";
	echo	 $rs['desc']."<br><hr>";
	$i++; // จำเป็นต้องกำหนด
}

?>

<?php
include("db_connect.php"); // incude ครั้งเดียวในไฟล์ที่เรียกใช้งาน
connect(); // เชื่อมต่อกับฐานข้อมูล
$data = array(
	"desc"=>"update value1",
);
// update ข้อมูลในตาราง province_tmp โดยฃื่อฟิลด์ และค่าตามตัวแปร array ชื่อ $data
// เงื่อนไขคือ province_id=77
update("tbl_page_th",$data,"page_name="$page"")
//update("province_tmp",$data,"province_id=".$_POST['id'])
?>