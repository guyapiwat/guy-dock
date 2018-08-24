<?
require_once("logtext.php");
require_once ("function.log.inc.php");
include("global.php");

if($_POST["submit"] != 'sendsms')$_SESSION["texttext"] = $_POST['delfield'];
//var_dump($_SESSION["texttext"]);
?>
<form action="" method="post">
Text SMS
<textarea name="optional"></textarea>
<input type="submit" name="submit" value="sendsms">
</form>

<?
if($_POST["submit"] == 'sendsms'){
	//var_dump($_POST);
			include("functionSMS.php");
	//exit;
	$_POST['delfield'] = $_SESSION["texttext"];
	if(isset($_POST['delfield'])){
		$postval=$_POST['delfield'];
		$postkey=array_keys($_POST['delfield']);
	}
	// แจ้งว่ามีรายการ ลบข้อมูลสมาชิกใหม่
	
	
	echo "<br>ส่งข้อมูล SMS ให้กับทางสมาชิก :";
	$numpost = sizeof($postkey);
	//var_dump($numpost);
	//exit;
	$style_l = "border-left:1 solid #FFFFFF;";
	$style_t = "border-top:1 solid #000000;";
	$style_b = "border-bottom:1 solid #000000;";
	$trcolor = array("#FFFFFF","#EEEEEE");
	?>
	<table width="50%" cellpadding="0" cellspacing="0">
        <tr bgcolor="#999999" align="center">
            <td style="<?=$style_l.$style_t.$style_b?>">รหัส</td>
            <td style="<?=$style_l.$style_t.$style_b?>">ชื่อ</td>
        </tr>
	<?
	
	for ($i=0;$i<$numpost;$i++) {
		// อ่านข้อมูลเดิมจาก member
		//var_dump($numpost);
		//exit;
		$rs=mysql_query("SELECT * FROM ".$dbprefix."member WHERE id='".$postval[$postkey[$i]]."' LIMIT 1");
		//echo "SELECT * FROM ".$dbprefix."member WHERE id='".$postval[$postkey[$i]]."' LIMIT 1";
		if (mysql_num_rows($rs)>0){
			$row = mysql_fetch_object($rs);
			$id=$row->id;
			?>
            <tr bgcolor="<?=$trcolor[$i%2]?>">
            	<td style="<?=$style_l?>" align="center"><?=$row->mcode?></td>
            	<td style="<?=$style_l?>" align="left"><?=$row->name_t?></td>
            </tr>
            <?
		}
		//echo $_SESSION['usercode'];

		// Destination mobile number
		$mcode = $row->mcode;
		$mobile = $row->mobile;


		// Message to send, please ensure that your message has a UTF-8 charset.
		//$message = "สวัสดีค่ะคุณ ".$row->name_t.' '.$_POST["optional"] ;
		$message = $_POST["optional"] ;


		// ScheduledDelivery, please read API document
		$ScheduledDelivery = '';


		// Sender Name, please read API document

		if(!empty($mobile)){
			if($GLOBALS["status_member"] == 1){
				if($GLOBALS["sms_credits"] > 0 ){
					if(!empty($mobile)){
						//echo $message.'<br>';
						sendsms1($dbprefix,$mobile,$message,$ScheduledDelivery="",$mcode);
					}
				}
			}
		}


		//echo 'sssssssssssssssss';
		logtext(true,$_SESSION['adminuserid'],'ส่ง SMS',$row->id);
		//====================LOG===========================
		$text="uid=".$_SESSION["adminuserid"]." action=member_sms => id='$id' ";
		writelogfile($text);
		//=================END LOG===========================
		//mysql_query("delete from ".$dbprefix."member where id='$id' ");
		//mysql_query("COMMIT");
		
	}
	//$_SESSION["texttext"] = "";
	// แสดงรายการที่ลบ
//echo 'sssssssssssssssss';
echo '<SCRIPT LANGUAGE="JavaScript">
			<!--
				window.location = "index.php?sessiontab=1&sub=18&scause='.$_SESSION["scause"].'&skey='.$_SESSION["skey"].'" ;
			//-->
			</SCRIPT>';
exit;
}
?>
	</table>