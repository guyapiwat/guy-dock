<?
require_once("logtext.php");
require_once ("function.log.inc.php");

	// แจ้งว่ามีรายการ ลบข้อมูลสมาชิกใหม่
	echo "<br>แก้ไขข้อมูลรายการซื้อขาย :";
	$bid = $_GET['bid'];
	$style_l = "border-left:1 solid #FFFFFF;";
	$style_t = "border-top:1 solid #000000;";
	$style_b = "border-bottom:1 solid #000000;";
	$trcolor = array("#FFFFFF","#EEEEEE");
	?>
	<table width="50%" cellpadding="0" cellspacing="0">
        <tr bgcolor="#999999" align="center">
            <td style="<?=$style_l.$style_t.$style_b?>">เลขบิล</td>
            <td style="<?=$style_l.$style_t.$style_b?>">รหัส</td>
            <td style="<?=$style_l.$style_t.$style_b?>">รวม</td>
        </tr>
	<?
		// อ่านข้อมูลเดิมจาก member
		//echo "SELECT * FROM ".$dbprefix."rvpoint WHERE id='".$postval[$postkey[$i]]."' LIMIT 1";
		$rs=mysql_query("SELECT * FROM ".$dbprefix."rvpoint WHERE id='$bid' and cancel = 0 LIMIT 1");
		//echo "SELECT * FROM ".$dbprefix."member WHERE id='".$postval[$postkey[$i]]."' LIMIT 1";
		if (mysql_num_rows($rs)>0){
			$row = mysql_fetch_object($rs);
			$id=$row->id;
			$mcode = $row->mcode;
			$txtMoney =$row->txtMoney;
			?>
            <tr bgcolor="<?=$trcolor[$i%2]?>">
            	<td style="<?=$style_l?>" align="center"><?=$row->sano?></td>
            	<td style="<?=$style_l?>" align="center"><?if(!empty($row->inv_code))echo $row->inv_code;else$row->mcode;?></td>
            	<td style="<?=$style_l?>" align="right"><?=$row->txtMoney ?></td>
            </tr>
            <?
			//====================LOG===========================
			//echo 'invent : '.$row->inv_code.' mcode : '.$row->mcode;
			//exit;
$text="uid=".$_SESSION["adminuserid"]." action=ewallet_update=>update ".$dbprefix."rvpoint set cancel=1 where sano='$id'";
writelogfile($text);
//=================END LOG===========================
			/*if(!empty($row->inv_code)){
				mysql_query("update ".$dbprefix."invent set ewallet = ewallet-".$row->txtMoney." where inv_code='".$row->inv_code."' ");
				$text="uid=".$_SESSION["adminuserid"]." action=ewallet_update=>update ".$dbprefix."invent set ewallet = ewallet-".$row->txtMoney." where inv_code='".$row->inv_code."' ";
			}else if(!empty($row->mcode)){
				mysql_query("update ".$dbprefix."member set ewallet = ewallet-".$row->txtMoney." where mcode='".$row->mcode."' ");
				$text="uid=".$_SESSION["adminuserid"]." action=ewallet_update=>update ".$dbprefix."member set ewallet = ewallet-".$row->txtMoney." where mcode='".$row->mcode."' ";
			}*/
			//====================LOG===========================

writelogfile($text);
//=================END LOG===========================
			
			
			mysql_query("update ".$dbprefix."member set rv_point = rv_point+".$txtMoney." where mcode='".$mcode."' ");
			mysql_query("update ".$dbprefix."rvpoint set cancel=1 where sano='$id' ");
		}else{
			echo "<script language='JavaScript'>alert('ไม่สามารถยกเลิกบิลนี้ได้');window.location='index.php?sessiontab=3&sub=88'</script>";	
		}
		logtext(true,$_SESSION['adminuserid'],'ลบบิล RV POINT id : '.$row->sano,$row->sano);
		mysql_free_result($rs);
		mysql_query("COMMIT");
?>

	</table>