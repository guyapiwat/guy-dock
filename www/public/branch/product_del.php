<?
require_once("logtext.php");
require_once ("function.log.inc.php");
	if(isset($_POST['delfield'])){
		$postval=$_POST['delfield'];
		$postkey=array_keys($_POST['delfield']);
	}
	// แจ้งว่ามีรายการ ลบข้อมูลสมาชิกใหม่
	echo "<br>ลบข้อมูลสินค้า :";
	$numpost = sizeof($postkey);
	$style_l = "border-left:1 solid #FFFFFF;";
	$style_t = "border-top:1 solid #000000;";
	$style_b = "border-bottom:1 solid #000000;";
	$trcolor = array("#FFFFFF","#EEEEEE");
	?>
	<table width="50%" cellpadding="0" cellspacing="0">
        <tr bgcolor="#999999" align="center">
            <td style="<?=$style_l.$style_t.$style_b?>">รหัสสินค้า</td>
            <td style="<?=$style_l.$style_t.$style_b?>">รายละเอียดสินค้า</td>
			<td style="<?=$style_l.$style_t.$style_b?>">หน่วย</td>
            <td style="<?=$style_l.$style_t.$style_b?>">ราคาขาย</td>
			<td style="<?=$style_l.$style_t.$style_b?>">PV</td>
            <td style="<?=$style_l.$style_t.$style_b?>">BV</td>
			<td style="<?=$style_l.$style_t.$style_b?>">ยอดคงเหลือ</td>
        </tr>
	<?
	
	for ($i=0;$i<$numpost;$i++) {
		// อ่านข้อมูลเดิมจาก member
		$rs=mysql_query("SELECT * FROM ".$dbprefix."product WHERE pcode='".$postval[$postkey[$i]]."' LIMIT 1");
		//echo "SELECT * FROM ".$dbprefix."member WHERE id='".$postval[$postkey[$i]]."' LIMIT 1";
		if (mysql_num_rows($rs)>0){
			$row = mysql_fetch_object($rs);
			$pcode=$row->pcode;
			?>
            <tr bgcolor="<?=$trcolor[$i%2]?>">
            	<td style="<?=$style_l?>" align="center"><?=$row->pcode;?></td>
            	<td style="<?=$style_l?>" align="left"><?=$row->pdesc?></td>
				<td style="<?=$style_l?>" align="center"><?=$row->unit?></td>
            	<td style="<?=$style_l?>" align="left"><?=$row->price?></td>
				<td style="<?=$style_l?>" align="center"><?=$row->pv?></td>
            	<td style="<?=$style_l?>" align="left"><?=$row->bv?></td>
				<td style="<?=$style_l?>" align="center"><?=$row->qty?></td>
            </tr>
            <?
		}
		mysql_free_result($rs);
		logtext(true,$_SESSION['adminusercode'],'ลบสินค้า',$pcode);
		//====================LOG===========================
$text="uid=".$_SESSION["adminuserid"]." action=product_del=>delete from ".$dbprefix."product where pcode='".$pcode."'";
writelogfile($text);
//=================END LOG===========================
		mysql_query("delete from ".$dbprefix."product where pcode='".$pcode."' ");
		mysql_query("COMMIT");
	}
	// แสดงรายการที่ลบ
?>
	</table>