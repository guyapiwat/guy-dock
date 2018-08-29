<?
require_once("logtext.php");
require_once ("function.log.inc.php");
	if(isset($_POST['delfield'])){
		$postval=$_POST['delfield'];
		$postkey=array_keys($_POST['delfield']);
	}
	// แจ้งว่ามีรายการ ลบข้อมูลสมาชิกใหม่
	echo "<br>ลบข้อมูลรายการซื้อขาย :";
	$numpost = sizeof($postkey);
	$style_l = "border-left:1 solid #FFFFFF;";
	$style_t = "border-top:1 solid #000000;";
	$style_b = "border-bottom:1 solid #000000;";
	$trcolor = array("#FFFFFF","#EEEEEE");
	?>
	<table width="50%" cellpadding="0" cellspacing="0">
        <tr bgcolor="#999999" align="center">
            <td style="<?=$style_l.$style_t.$style_b?>">เลขบิล</td>
            <td style="<?=$style_l.$style_t.$style_b?>">รหัส</td>
            <td style="<?=$style_l.$style_t.$style_b?>">จำนวนเงินรวม</td>
        </tr>
	<?
	
	for ($i=0;$i<$numpost;$i++) {
		// อ่านข้อมูลเดิมจาก member
		$rs=mysql_query("SELECT * FROM ".$dbprefix."ewallet WHERE id='".$postval[$postkey[$i]]."' and lid = '{$_SESSION["admininvent"]}' LIMIT 1");
		//echo "SELECT * FROM ".$dbprefix."member WHERE id='".$postval[$postkey[$i]]."' LIMIT 1";
		if (mysql_num_rows($rs)>0){
			$row = mysql_fetch_object($rs);
			$id=$row->id;
			?>
            <tr bgcolor="<?=$trcolor[$i%2]?>">
            	<td style="<?=$style_l?>" align="center"><?=$row->sano?></td>
            	<td style="<?=$style_l?>" align="center"><?=$row->mcode?></td>
            	<td style="<?=$style_l?>" align="right"><?=$row->txtMoney ?></td>
            </tr>
            <?
			//====================LOG===========================
$text="uid=".$_SESSION["adminuserid"]." action=ewallet_del=>delete from ".$dbprefix."ewallet where id='$id'";
writelogfile($text);
//=================END LOG===========================
			mysql_query("update ".$dbprefix."member set ewallet = ewallet-".$row->txtMoney." where mcode='".$row->mcode."' ");
			//====================LOG===========================
$text="uid=".$_SESSION["adminuserid"]." action=ewallet_update=>update ".$dbprefix."member set ewallet = ewallet-".$row->txtMoney." where mcode='".$row->mcode."' ";
writelogfile($text);
//=================END LOG===========================
			mysql_query("delete from ".$dbprefix."ewallet where sano='$id' and lid = '{$_SESSION["admininvent"]}' ");
		}
		logtext(true,$_SESSION['adminuserid'],'ลบบิล ewallet',$row->sano);
		mysql_free_result($rs);
		mysql_query("COMMIT");
	}
?>

	</table>