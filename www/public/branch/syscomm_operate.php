<?
session_start();
include("connectmysql.php");
include("prefix.php");
require_once("function.php");
require_once("logtext.php");
require_once ("function.log.inc.php");
if(isset($_GET['state'])){
	if (isset($_POST["oid"])){$oid=$_POST["oid"];}else{$oid="";}
	if (isset($_POST["usercode"])){$usercode=$_POST["usercode"];}else{$usercode="";}	
	if (isset($_POST["username"])){$username=$_POST["username"];}else{$username="";}
	if (isset($_POST["password"])){$password=$_POST["password"];}else{$password="";}
	if (isset($_POST["inv_ref"])){$inv_ref=$_POST["inv_ref"];}else{$inv_ref="";}
	for($i=1;$i<=5;$i++){
		if (isset($_POST["object".$i])){$obj[$i]=$_POST["object".$i];}else{$obj[$i]=0;}
	}
	/*if (isset($_POST["object2"])){$obj[2]=$_POST["object2"];}else{$obj[2]=0;}
	if (isset($_POST["object3"])){$obj[3]=$_POST["object3"];}else{$obj[3]=0;}
	if (isset($_POST["object4"])){$obj[4]=$_POST["object4"];}else{$obj[4]=0;}
	if (isset($_POST["object5"])){$obj[5]=$_POST["object5"];}else{$obj[5]=0;}*/
	//if (isset($_POST["object6"])){$object6=$_POST["object6"];}else{$object6="";}
	//if (isset($_POST["object7"])){$object7=$_POST["object7"];}else{$object7="";}
	//if (isset($_POST["object8"])){$object8=$_POST["object8"];}else{$object8="";}
	//if (isset($_POST["C1"])){$C1=$_POST["C1"];}else{$C1="";}
	if (isset($_POST["inv_code"])){$inv_code=$_POST["inv_code"];}else{$inv_code="";}	
	for($i=1;$i<=sizeof($obj);$i++){
		//if($obj[$i]<=0) continue;
		$obj[$i] = (isset($_POST['accobj'.$i.'1'])?$_POST['accobj'.$i.'1']:0);
		$obj[$i] += (isset($_POST['accobj'.$i.'2'])?$_POST['accobj'.$i.'2']:0);
		$obj[$i] += (isset($_POST['accobj'.$i.'4'])?$_POST['accobj'.$i.'4']:0);
	}
	//print_r($obj);
}
if($_GET['state']==0){
	logtext(true,$_SESSION['adminuserid'],'����������к�',$usercode);
	$sql="insert into ".$dbprefix."user (usercode, username,  password,  object1,  object2,  object3,  object4,  object5,accessright,usertype,inv_ref) values ('$usercode' ,'$username','".EncodePwd($password)."' ,'$obj[1]','$obj[2]' ,'$obj[3]','$obj[4]' ,'$obj[5]','$accessright','1','$inv_ref') ";
	//====================LOG===========================
$text="uid=".$_SESSION["adminuserid"]." action=sysuseroperate =>$sql";
writelogfile($text);
//=================END LOG===========================
	if (! mysql_query($sql)) {
		echo "<font color='#FF0000'>error</font><br>";
		//echo  "$sql";		
	}else {
		mysql_query("COMMIT");
		ob_end_clean();
		//include "mem_main.php";
		echo "<script language='JavaScript'>window.location='index.php?sessiontab=5&sub=4'</script>";	
	}
}else if($_GET['state']==1){
	logtext(true,$_SESSION['adminuserid'],'��䢼�����к�',$usercode);
	$sql = "UPDATE ".$dbprefix."user SET  usercode ='$usercode', username='$username', ";
	$sql .= "password='".EncodePwd($password)."',inv_ref='$inv_ref' WHERE uid = '$oid' ";
	//====================LOG===========================
$text="uid=".$_SESSION["adminuserid"]." action=sysuseroperate =>$sql";
writelogfile($text);
//=================END LOG===========================
	mysql_query($sql);
	$sql="update ".$dbprefix."user set  object1 ='$obj[1]', object2 ='$obj[2]', object3 ='$obj[3]', object4 ='$obj[4]', object5 ='$obj[5]', accessright='$accessright' where uid = '$oid' ";
	//====================LOG===========================
$text="uid=".$_SESSION["adminuserid"]." action=sysuseroperate =>$sql";
writelogfile($text);
//=================END LOG===========================
	//echo "sql=$sql<BR>";
	if (!mysql_query($sql)) {
		ob_end_flush();
		echo "<font color='#FF0000'>error</font><br>";
	//	echo "$sql<br>";
	}
	else {
		mysql_query("COMMIT");
		ob_end_clean();
		//include "mem_main.php";
		echo "<script language='JavaScript'>window.location='index.php?sessiontab=5&sub=4'</script>";	
		exit;  // done in MEMBEReditadd.php
	}
}
?>