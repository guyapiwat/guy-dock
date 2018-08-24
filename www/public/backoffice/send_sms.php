<?
require_once("logtext.php");
require_once ("function.log.inc.php");
include("functionSMS.php");
include("global.php");
//var_dump($_SESSION);

//if($_POST["submit"] != 'sendsms')$_SESSION["texttext"] = $_POST['delfield'];
//var_dump($_SESSION["texttext"]);
?>

<?
	
	//$_POST['delfield'] = $_SESSION["texttext"];
	if(isset($_POST['delfield'])){
		$postval=$_POST['delfield'];
		$postkey=array_keys($_POST['delfield']);
	}
	// แจ้งว่ามีรายการ ลบข้อมูลสมาชิกใหม่
	
	///var_dump($postval);
	//exit;
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
	//var_dump($numpost);
	//exit;
	for ($i=0;$i<$numpost;$i++) {
		// อ่านข้อมูลเดิมจาก member
		//var_dump($numpost);
		//exit;
		$rs=mysql_query("SELECT * FROM ".$dbprefix."member m LEFT JOIN ".$dbprefix."cmbonus c ON m.mcode=c.mcode  WHERE m.mcode='".$postval[$postkey[$i]]."' and c.rcode = '".$_GET["ftrcode"]."' LIMIT 1");
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
		$mobile = $row->mobile;
		$total = $row->total;
		if(!empty($mobile)){
			if($GLOBALS["status_member"] == 1){
				if($GLOBALS["sms_credits"] > 0 ){
					if(!empty($mobile)){
						$msisdn = $mobile;
						$message = "ค่าคอมมิชชั่นจาก จีพินนาเคิ้ล เป็นจำนวน ".$total." บาท";
						//echo $message.'<br>';
						sendsms($dbprefix,$msisdn,$message,$ScheduledDelivery="",$postval[$postkey[$i]]);
						$rs=mysql_query("update ".$dbprefix."cmbonus set sms_credits = sms_credits+1 WHERE mcode='".$postval[$postkey[$i]]."' and rcode = '".$_GET["ftrcode"]."' LIMIT 1");
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
echo "<script language='JavaScript'>window.location='index.php?sessiontab=1&sub=36&ftrcode=".$_GET["ftrcode"]."'</script>";	
exit;
?>
	</table>