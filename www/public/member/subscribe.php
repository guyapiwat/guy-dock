<? 
	include_once("connectmysql.php");
	include_once("prefix.php");
?>

<? include("gencode.php")?>
<?

foreach ($_POST as $key => $value) {
	echo "_POST[$key]=$value<BR>";
}

//////////////////////////////////////////////////
//  ตรวจสอบความถูกต้อง
//////////////////////////////////////////////////
$sp_code='';
if(isset($_POST[sponsor_code])){
	$sql="select * from ".$dbprefix."member where mcode='".$_POST[sponsor_code]."' ";
	$result=mysql_query($sql);
	if (mysql_num_rows($result) > 0) {
		$row = mysql_fetch_object($result);
		$sp_code=$row->mcode;
	}
}

if(isset($_POST[sponsor_mobile])){
	$sql="select * from ".$dbprefix."member where mobile='".$_POST[sponsor_mobile]."' ";
	$result=mysql_query($sql);
	if (mysql_num_rows($result) > 0) {
		$row = mysql_fetch_object($result);
		$sp_code=$row->mcode;
	}
}

if(isset($_POST[sponsor_email])){
	$sql="select * from ".$dbprefix."member where email='".$_POST[sponsor_email]."' ";
	$result=mysql_query($sql);
	if (mysql_num_rows($result) > 0) {
		$row = mysql_fetch_object($result);
		$sp_code=$row->mcode;
	}
}

if($sp_code==''){
	echo "ไม่พบผู้แนะนำของท่าน กรุณาทำรายการใหม่<BR>";
	exit;
}

$checkval=false;
if($_POST[name_t]==''&&$_POST[tel]==''){
	echo "<font color='#FF0000'>กรุณาระบุชื่อและเบอร์โทรศัพท์ กรุณาทำรายการใหม่</font><br>";
	exit;
}

if($_POST[name_t]==''&&$_POST[email]==''){
	echo "<font color='#FF0000'>กรุณาระบุชื่อและอีเมล์ กรุณาทำรายการใหม่</font><br>";
	exit;
}


//////////////////////////////////////////////////
//  ใส่ข้อมูลเข้าไปใน member
//////////////////////////////////////////////////

//if($checkval==true){
	$sql="insert into ".$dbprefix."member (sp_code,name_t,mobile,email,mdate) values ('$sp_code','".$_POST[name_t]."','".$_POST[tel]."','".$_POST[email]."','".date("Y-m-d")."') ";
	if (! mysql_query($sql)) {
		echo "<font color='#FF0000'>มีข้อผิดพลาด ในคำสั่ง SQL บันทึกไม่ได้</font><br>";
		echo  "$sql";		
	}
	else {
		$id=mysql_insert_id();
		mysql_query("COMMIT");
	}
	//echo "$sql<BR>";
	//echo "last_insert_id=$id<BR>";

	$mcode = gencode($id);
	$sv_code = substr($mcode,3,strlen($mcode));
	$sql="update ".$dbprefix."member set mcode='$mcode', sv_code='$sv_code' where id='$id' ";
	if (! mysql_query($sql)) {
		echo "<font color='#FF0000'>มีข้อผิดพลาด ในคำสั่ง SQL บันทึกไม่ได้</font><br>";
		echo  "$sql";		
	}
	else {
		mysql_query("COMMIT");
	}
	//echo "$sql<BR>";
//}
?>

