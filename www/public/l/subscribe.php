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
//  ��Ǩ�ͺ�����١��ͧ
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
	echo "��辺����йӢͧ��ҹ ��سҷ���¡������<BR>";
	exit;
}

$checkval=false;
if($_POST[name_t]==''&&$_POST[tel]==''){
	echo "<font color='#FF0000'>��س��кت�������������Ѿ�� ��سҷ���¡������</font><br>";
	exit;
}

if($_POST[name_t]==''&&$_POST[email]==''){
	echo "<font color='#FF0000'>��س��кت������������ ��سҷ���¡������</font><br>";
	exit;
}


//////////////////////////////////////////////////
//  ������������� member
//////////////////////////////////////////////////

//if($checkval==true){
	$sql="insert into ".$dbprefix."member (sp_code,name_t,mobile,email,mdate) values ('$sp_code','".$_POST[name_t]."','".$_POST[tel]."','".$_POST[email]."','".date("Y-m-d")."') ";
	if (! mysql_query($sql)) {
		echo "<font color='#FF0000'>�բ�ͼԴ��Ҵ 㹤���� SQL �ѹ�֡�����</font><br>";
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
		echo "<font color='#FF0000'>�բ�ͼԴ��Ҵ 㹤���� SQL �ѹ�֡�����</font><br>";
		echo  "$sql";		
	}
	else {
		mysql_query("COMMIT");
	}
	//echo "$sql<BR>";
//}
?>

