<?
require_once("logtext.php");
require_once ("function.log.inc.php");
	if(isset($_POST['delfield'])){
		$postval=$_POST['delfield'];
		$postkey=array_keys($_POST['delfield']);
	}
	// ���������¡�� ź��������Ҫԡ����
	echo "<br>ź��������¡�ë��͢�� :";
	$numpost = sizeof($postkey);
	$style_l = "border-left:1 solid #FFFFFF;";
	$style_t = "border-top:1 solid #000000;";
	$style_b = "border-bottom:1 solid #000000;";
	$trcolor = array("#FFFFFF","#EEEEEE");
	?>
	<table width="50%" cellpadding="0" cellspacing="0">
        <tr bgcolor="#999999" align="center">
            <td style="<?=$style_l.$style_t.$style_b?>">�Ţ���</td>
            <td style="<?=$style_l.$style_t.$style_b?>">����</td>
            <td style="<?=$style_l.$style_t.$style_b?>">�ӹǹ��� PV</td>
            <td style="<?=$style_l.$style_t.$style_b?>">�ӹǹ�Թ���</td>
        </tr>
	<?
	
	for ($i=0;$i<$numpost;$i++) {
		// ��ҹ����������ҡ member
		$rs=mysql_query("SELECT * FROM ".$dbprefix."isaleh WHERE id='".$postval[$postkey[$i]]."' LIMIT 1");
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
$text="uid=".$_SESSION["adminuserid"]." action=sale_del=>delete from ".$dbprefix."isaleh where id='$id'";
writelogfile($text);
//=================END LOG===========================
			mysql_query("delete from ".$dbprefix."isaleh where id='$id' ");
			//====================LOG===========================
$text="uid=".$_SESSION["adminuserid"]." action=sale_del=>delete from ".$dbprefix."isaled where sano='$id' ";
writelogfile($text);
//=================END LOG===========================
			$sql = "select * from ".$dbprefix."isaled where sano='$id'";
			$result = mysql_query($sql);
			for($i=0;$i<mysql_num_rows($result);$i++){
				$data = mysql_fetch_object($result);
				$pcode =$data->pcode;
				$qty =$data->qty;
				$inv_codeold =$data->inv_code;
				plusProduct($dbprefix,$pcode,$_SESSION['adminusercode'],$qty);
				minusProduct1($dbprefix,$pcode,$inv_codeold,$qty);
			}
			mysql_query("delete from ".$dbprefix."isaled where sano='$id' ");
		}
		logtext(true,$_SESSION['adminuserid'],'ź���',$row->sano);
		mysql_free_result($rs);
		mysql_query("COMMIT");
	}
	// �ʴ���¡�÷��ź
function minusProduct($dbprefix,$pcode,$invent,$qty){
	//$sql = "update".$dbprefix."product_invent set qty = qty-$qty WHERE pcode='$pcode' and inv_code = '$invent' ";
	//$rs = mysql_query($sql);
	$sql = "update ".$dbprefix."product set qty = qty-$qty WHERE pcode='$pcode' ";
	$rs = mysql_query($sql);
}
function minusProduct1($dbprefix,$pcode,$invent,$qty){
	echo $sql = "update ".$dbprefix."product_invent set qty = qty-$qty WHERE pcode='$pcode' and inv_code = '$invent' ";
	exit;
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
}?>

	</table>