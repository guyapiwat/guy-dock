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
            <td style="<?=$style_l.$style_t.$style_b?>">รหัส package</td>
            <td style="<?=$style_l.$style_t.$style_b?>">รหัส สินค้า</td>
            <td style="<?=$style_l.$style_t.$style_b?>">ชื่อสินค้า</td>
            <td style="<?=$style_l.$style_t.$style_b?>">จำนวนสินค้า</td>
        </tr>
	<?
	
	for ($i=0;$i<$numpost;$i++) {
		// อ่านข้อมูลเดิมจาก member
		//echo "SELECT * FROM ".$dbprefix."product_package1 WHERE id='".$postval[$postkey[$i]]."' LIMIT 1";
		$rs=mysql_query("SELECT * FROM ".$dbprefix."product_package1 WHERE id='".$postval[$postkey[$i]]."' LIMIT 1");
		//echo "SELECT * FROM ".$dbprefix."member WHERE id='".$postval[$postkey[$i]]."' LIMIT 1";
		if (mysql_num_rows($rs)>0){
			$row = mysql_fetch_object($rs);
			$id=$row->id;
			?>
            <tr bgcolor="<?=$trcolor[$i%2]?>">
            	<td style="<?=$style_l?>" align="center"><?=$row->package?></td>
            	<td style="<?=$style_l?>" align="center"><?=$row->pcode?></td>
            	<td style="<?=$style_l?>" align="right"><?=$row->pdesc?></td>
            	<td style="<?=$style_l?>" align="right"><?=$row->qty?></td>
            </tr>
            <?
			//====================LOG===========================
$text="uid=".$_SESSION["adminusercode"]." action=sale_del=>delete from ".$dbprefix."product_package1 where id='$id'";
writelogfile($text);
//=================END LOG===========================
			mysql_query("delete from ".$dbprefix."product_package1 where id='$id' ");
		}
		logtext(true,$_SESSION['adminusercode'],'ลบสินค้าใน package : '.$row->package,$row->id);
		mysql_free_result($rs);
		mysql_query("COMMIT");
	
	}
	// แสดงรายการที่ลบ
?>
	</table>