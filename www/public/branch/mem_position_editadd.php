<?require "adminchecklogin.php";?>
<?include("prefix.php");?>
<link href="./../style.css" rel="stylesheet" type="text/css">
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
$colwidth0="26%";		//ความกว้างของชื่อฟิลด์ที่ต้องการเก็บข้อมูล
$colwidth1="74%";					//ความกว้างของ input ที่ใช้รับข้อมูล

//ความกว้างของ input type='text' หากว่างไว้โปรแกรมจะใส่ความกว้างให้เอง
$size[1]="";			$maxlength[1]="";
$size[2]="";			$maxlength[2]="";
$size[3]="";			$maxlength[3]="";
$size[4]="";			$maxlength[4]="";
$size[5]="";			$maxlength[5]="";
$size[6]="";			$maxlength[6]="";
$size[7]="";			$maxlength[7]="";
$size[8]="";			$maxlength[8]="";
$size[9]="";			$maxlength[9]="";
$size[10]="";		$maxlength[10]="";
$size[11]="";		$maxlength[11]="";
$size[12]="";		$maxlength[12]="";
$size[13]="";		$maxlength[13]="";

//อ่านค่าตัวแปร fieldsval[$i] จาก ตัวแปรที่ส่งมาชื่อ fields[$i]
$fieldsval[1]=$val1;
$fieldsval[2]=$val2;
$fieldsval[3]=$val3;
$fieldsval[4]=$val4;
$fieldsval[5]=$val5;
$fieldsval[6]=$val6;
$fieldsval[7]=$val7;
$fieldsval[8]=$val8;
$fieldsval[9]=$val9;
$fieldsval[10]=$val10;
$fieldsval[11]=$val11;
$fieldsval[12]=$val12;
$fieldsval[13]=$val13;

//////////////////////////////////////////////////////////////
//select options
$optionfield="";		// "2,3," ฟิลด์ที่ต้องการให้เป็น option
function showoption($i){
	if($i=='3'){
		showoptionlist("$i",$dbprefix."vehicle_make","id","nakename");
	}
}
function showoptionlist($fieldi,$tablename,$returnvaluefield,$showfield){
	global $dbprefix,$fieldsval;
	$sql="select $returnvaluefield,$showfield from ".$dbprefix."$tablename ";
	$result=mysql_query($sql);
	echo "<select name=\"val$fieldi\">";
	echo "<option value=\"\" ";
	echo ">";
	echo "</option>";
	if($result){
		while($row=mysql_fetch_object($result)){
			$returnvalue=$row->$returnvaluefield;
			$showvalue=$row->$showfield;
			echo "<option value=\"$returnvalue\" ";
			if($fieldsval[$fieldi]==$returnvalue){
				echo " selected ";
			}
			echo ">";
			echo "$showvalue";
			echo "</option>";
		}
	}	
	echo "</select>";
}
//select options
//////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////
//date
$datefield="";		// "2,3," ฟิลด์ที่ต้องการให้เป็น date
function showdate($i){
		if($i=='1'){
			showdatetime("$i");
		}	
		if($i=='2'){
			showdatetime("$i");
		}	
}
function showdatetime($i){
	global $fieldsval;
	echo "<input type='text' name='val$i' size='10' maxlength='10' value='".$fieldsval[$i]."' onBlur=\"chkISODate('frm','val$i','$proj_text30')\">";
	echo " &nbsp;<a href='javascript://' onclick='callPick(document.frm.val$i)'><img src='./datepicker/images/cal.gif' border=0></a>\n";
}
//date
//////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////
//checkbox
$checkboxfield="8,9";		// "8,9" ฟิลด์ที่ต้องการให้เป็น checkbox
// ค่าที่จะ retrun เป็น 1
$checkboxreturnval="1";  //ตั้งให้เป็นค่าที่ต้องการให้ส่งกลับไปเมื่อมีการ check ใน box นั้น (หรือเป็น checked)
function showcheckbox($i){
		if($i=='8'){
			showcheckboxfield("$i");
		}	
		if($i=='9'){
			showcheckboxfield("$i");
		}	
}
function showcheckboxfield($i){
	global $fieldsval,$checkboxreturnval;
	echo "<input type='checkbox' name='val$i' value='$checkboxreturnval' ";
	if($fieldsval[$i]=="$checkboxreturnval"){
		echo " checked ";
	}
	echo ">";
}
//checkbox
//////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////////
//ตรวจสอบความถูกต้องของข้อมูล ก่อน save edit หรือ add
$validatefield="";
function checkvalidatefield($i){
	global $oktosave,$fieldsval;
	if($i=='1'){
		if ($fieldsval[$i]==""){
			$oktosave=false;
			echo "<font color='#FF0000'>ไม่ได้ป้อน รหัสสินค้า</font><br>";
		}
	}
	if($i=='2'){
		if ($fieldsval[$i]==""){
			$oktosave=false;
			echo "<font color='#FF0000'>ไม่ได้ป้อน รายละเอียดสินค้า</font><br>";
		}
	}
	if($i=='3'){
		if ($fieldsval[$i]==""){
			$oktosave=false;
			echo "<font color='#FF0000'>ไม่ได้เลือก ระบบ</font><br>";
		}
	}
	if($i=='4'){
		if ($fieldsval[$i]==""){
			$oktosave=false;
			echo "<font color='#FF0000'>ไม่ได้เลือก ประเภท</font><br>";
		}
	}
	if($i=='5'){
		if ($fieldsval[$i]==""){
			$oktosave=false;
			echo "<font color='#FF0000'>ไม่ได้ป้อน ราคาขาย</font><br>";
		}
			else{
				if(! is_numeric($fieldsval[$i])){
					$oktosave=false;
					echo "<font color='#FF0000'>ราคาขาย ไม่ใช่ตัวเลข</font><br>";
				}
			}
	}
	if($i=='6'){
		if ($fieldsval[$i]==""){
			$oktosave=false;
			echo "<font color='#FF0000'>ไม่ได้ป้อน จำนวน</font><br>";
		}
			else{
				if(! is_numeric($fieldsval[$i])){
					$oktosave=false;
					echo "<font color='#FF0000'>จำนวน ไม่ใช่ตัวเลข</font><br>";
				}
			}
	}
}
//ตรวจสอบความถูกต้องของข้อมูล ก่อน save edit หรือ add
////////////////////////////////////////////////////////////////////////////////////////
?>


<?
$call_from_editadd="1";
include_once("editadd.inc.php");
?>
