<?require "adminchecklogin.php";?>
<?include("prefix.php");?>
<link href="istyle.css" rel="stylesheet" type="text/css">
<?php
//include("./config/config.php");
include("header.php"); 

$htmlTitle="NetMan - position";		// หัว html
$title="ข้อมูล ตำแหน่ง";								// หัวเรื่อง
$mlink="mem_position_main.php";					// link ไปหน้า main
$elink="mem_position_editadd.php";				// link ไปหน้า editadd
$plink="showprint.php";					// link ไปหน้า print
$dbtable=$dbprefix."position";		// ชื่อ table ใน database
$numoffield=3;									//จำนวนฟิลด์ที่ต้องการแสดง ฟิลด์ 0 - ฟิลด์ $numoffield-1
//field name in database : เพิ่มจำนวนชื่อฟิลด์ในฐานข้อมูลได้ตามต้องการ
$fields[0]="posid";							//ต้องเป็น primary key ของ database เสมอ
$fields[1]="posname";
$fields[2]="posdesc";
$fields[3]="";
$fields[4]="";
$fields[5]="";
$fields[6]="";
$fields[7]="";
$fields[8]="";
$fields[9]="";
$fields[10]="";
$fields[11]="";
$fields[12]="";
$fields[13]="";
//ชื่อฟิลด์ที่ต้องการแสดงบนหน้าเว็บ  : เพิ่มจำนวนชื่อฟิลด์ที่ต้องการแสดงบนหน้าเว็บได้ตามต้องการ
$showname[0]="id";
$showname[1]="ชื่อตำแหน่ง";
$showname[2]="รายละเอียด";
$showname[3]="";
$showname[4]="";
$showname[5]="";
$showname[6]="";
$showname[7]="";
$showname[8]="";
$showname[9]="";
$showname[10]="";
$showname[11]="";
$showname[12]="";
$showname[13]="";
//ความกว้างของ column
$colwidth[0]="5%";
$colwidth[1]="20%";
$colwidth[2]="20%";
$colwidth[3]="10%";
$colwidth[4]="10%";
$colwidth[5]="10%";
$colwidth[6]="10%";
$colwidth[7]="10%";
$colwidth[8]="10%";
$colwidth[9]="10%";
$colwidth[10]="10%";
$colwidth[11]="10%";
$colwidth[12]="10%";
$colwidth[13]="10%";

//แสดง column พิมพ์หรือไม่ $showprint "1" =แสดง / "" = ไม่แสดง
$showprint="";
$showprintmsg="ดู";
$showprinttarget_blank="1";					//1=target=_blank

//การค้นหา
//column ที่ต้องการแสดง เครื่องหมายเมื่อค้นหาพบ (ต้องน้อยกว่า $numoffield)
$columntoshowfind=2;

$findfield="posid";			// ค้นหาโดยใช้ field อะไร ในที่นี้คือ ppdate
$findfieldname="รหัส";
$sortdirection="asc";		//ทิศทางการเรียง desc=เรียงจากมากไปน้อย  asc=เรียงจากน้อยไปมาก

//ดึงข้อมูลจากฟังก์ชัน กรณีที่มีการดึงข้อมูลมากจาก 2 table
$field_function="";			//ใส่เลขที่ field ที่ต้องการให้ดึงจาก table อื่นใน
// select
$field_function_name[2]="";
$field_function_name[3]="makename";
// from
$table[2] =$dbprefix."";
$table[3] =$dbprefix."vehicle_make";
//where
$field_function_namewhere[2]="";
$field_function_namewhere[3]="id";

function showfieldval($i,$vc){
	global $dbtable2,$table,$fields,$field_function_name, $field_function_namewhere;
	require './config/connectmysql.php';
		$sql="select ".$field_function_name[$i]." from  ".$table[$i]."  where ".$field_function_namewhere[$i]." ='$vc'  ";
		//echo "***sql=$sql<BR>";
		$result=mysql_query($sql);
		if(mysql_num_rows($result)){
			$row=mysql_fetch_object($result);
			return $row->$field_function_name[$i];
		} else {
			return "";
		}
}

?>


<?
$call_from_main="1";
include("main.inc.php");
?>
