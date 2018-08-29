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
            <td style="<?=$style_l.$style_t.$style_b?>">จำนวนรวม PV</td>
            <td style="<?=$style_l.$style_t.$style_b?>">จำนวนเงินรวม</td>
        </tr>
	<?
	
	for ($i=0;$i<$numpost;$i++) {
		// อ่านข้อมูลเดิมจาก member
		$rs=mysql_query("SELECT * FROM ".$dbprefix."asaleh WHERE id='".$postval[$postkey[$i]]."' LIMIT 1");
		//echo "SELECT * FROM ".$dbprefix."member WHERE id='".$postval[$postkey[$i]]."' LIMIT 1";
		if (mysql_num_rows($rs)>0){
			$row = mysql_fetch_object($rs);
			$id=$row->id;
			?>
            <tr bgcolor="<?=$trcolor[$i%2]?>">
            	<td style="<?=$style_l?>" align="center"><?=$row->sano?></td>
            	<td style="<?=$style_l?>" align="center"><?=$row->mcode?></td>
            	<td style="<?=$style_l?>" align="right"><?=$row->tot_pv?></td>
            	<td style="<?=$style_l?>" align="right"><?=$row->total?></td>
            </tr>
            <?
			//====================LOG===========================
$text="uid=".$_SESSION["adminuserid"]." action=sale_del=>delete from ".$dbprefix."asaleh where id='$id'";
writelogfile($text);
//=================END LOG===========================
			mysql_query("delete from ".$dbprefix."asaleh where id='$id' ");
			//====================LOG===========================
$text="uid=".$_SESSION["adminuserid"]." action=sale_del=>delete from ".$dbprefix."asaled where sano='$id' ";
writelogfile($text);
//=================END LOG===========================
			$sql = "select * from ".$dbprefix."asaled where sano='$id'";
			
			$result = mysql_query($sql);
			for($i=0;$i<mysql_num_rows($result);$i++){
				$data = mysql_fetch_object($result);
				$pcode =$data->pcode;
				$qty =$data->qty;
				$inv_codeold =$data->inv_code;
				plusProduct($dbprefix,$pcode,$_SESSION['adminusercode'],$qty);
				minusProduct1($dbprefix,$pcode,$inv_codeold,$qty);
			}
			//echo "delete from ".$dbprefix."asaled where sano='$id' ";
			mysql_query("delete from ".$dbprefix."asaled where sano='$id' ");
		}
		logtext(true,$_SESSION['adminuserid'],'ลบบิล',$row->sano);
		mysql_free_result($rs);
		mysql_query("COMMIT");
	}
	// แสดงรายการที่ลบ
function minusProduct($dbprefix,$pcode,$invent,$qty){
	//$sql = "update".$dbprefix."product_invent set qty = qty-$qty WHERE pcode='$pcode' and inv_code = '$invent' ";
	//$rs = mysql_query($sql);
	$sql = "update ".$dbprefix."product set qty = qty-$qty WHERE pcode='$pcode' ";
	$rs = mysql_query($sql);
}
function minusProduct1($dbprefix,$pcode,$invent,$qty){
	//if(!empty($invent))
	$sql = "update ".$dbprefix."product_invent set qty = qty-$qty WHERE pcode='$pcode' and inv_code = '$invent' ";
	$rs = mysql_query($sql);
	//$sql = "update ".$dbprefix."product set qty = qty-$qty WHERE pcode='$pcode' ";
	//$rs = mysql_query($sql);
}

function plusProduct($dbprefix,$pcode,$invent,$qty){
	//$sql = "update".$dbprefix."product_invent set qty = qty-+$qty WHERE pcode='$pcode' and inv_code = '$invent' ";
	//$rs = mysql_query($sql);
	$sql = "update ".$dbprefix."product set qty = qty+$qty WHERE pcode='$pcode' ";
	$rs = mysql_query($sql);
}
function plusProduct1($dbprefix,$pcode,$invent,$qty){
	$sql = "update ".$dbprefix."product_invent set qty = qty+$qty WHERE pcode='$pcode' and inv_code = '$invent' ";
	$rs = mysql_query($sql);
	//$sql = "update ".$dbprefix."product set qty = qty+$qty WHERE pcode='$pcode' ";
//	$rs = mysql_query($sql);
}
?>

	</table>