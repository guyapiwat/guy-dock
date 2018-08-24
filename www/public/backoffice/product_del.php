<?
require_once("logtext.php");
require_once ("function.log.inc.php");
	if(isset($_POST['delfield'])){
		$postval=$_POST['delfield'];
		$postkey=array_keys($_POST['delfield']);
	}
	// แจ้งว่ามีรายการ ลบข้อมูลสมาชิกใหม่
	$numpost = sizeof($postkey);
	$style_l = "border-left:1 solid #FFFFFF;";
	$style_t = "border-top:1 solid #000000;";
	$style_b = "border-bottom:1 solid #000000;";
	$trcolor = array("#FFFFFF","#EEEEEE");

	for ($i=0;$i<$numpost;$i++) {
	$rs=mysql_query("SELECT * FROM ".$dbprefix."product WHERE pcode='".$postval[$postkey[$i]]."' LIMIT 1");
		if (mysql_num_rows($rs)>0){
		$row = mysql_fetch_object($rs);
		$pcode=$row->pcode;
		$pathImg=$row->product_img;
		mysql_free_result($rs);
	if($pcode == "0001" or $pcode == "AS001" or $pcode == "SE0011"){

	}else{
	echo "<br>ลบข้อมูลสินค้า :";
	?>
	<table width="50%" cellpadding="0" cellspacing="0">
        <tr bgcolor="#999999" align="center">
            <td style="<?=$style_l.$style_t.$style_b?>">รหัสสินค้า</td>
            <td style="<?=$style_l.$style_t.$style_b?>">รายละเอียดสินค้า</td>
			<td style="<?=$style_l.$style_t.$style_b?>">หน่วย</td>
            <td style="<?=$style_l.$style_t.$style_b?>">ราคาขาย</td>
			<td style="<?=$style_l.$style_t.$style_b?>">PV</td>
			<td style="<?=$style_l.$style_t.$style_b?>">ยอดคงเหลือ</td>
        </tr>
		<tr bgcolor="<?=$trcolor[$i%2]?>">
            	<td style="<?=$style_l?>" align="center"><?=$row->pcode;?></td>
            	<td style="<?=$style_l?>" align="left"><?=$row->pdesc?></td>
				<td style="<?=$style_l?>" align="center"><?=$row->unit?></td>
            	<td style="<?=$style_l?>" align="left"><?=$row->price?></td>
				<td style="<?=$style_l?>" align="center"><?=$row->pv?></td>
				<td style="<?=$style_l?>" align="center"><?=$row->qty?></td>
         </tr>

	<?}
	
	//for ($i=0;$i<$numpost;$i++) {
		// อ่านข้อมูลเดิมจาก member
		//$rs=mysql_query("SELECT * FROM ".$dbprefix."product WHERE pcode='".$postval[$postkey[$i]]."' LIMIT 1");
		//echo "SELECT * FROM ".$dbprefix."member WHERE id='".$postval[$postkey[$i]]."' LIMIT 1";
		//if (mysql_num_rows($rs)>0){
			//$row = mysql_fetch_object($rs);
			//$pcode=$row->pcode;
			//$pathImg=$row->product_img;
		}
		//mysql_free_result($rs);
if($pcode == "0001" or $pcode == "AS001" or $pcode == "SE0011"){
		echo "<script language='JavaScript'>alert('ไม่สามารถลบสินค้ารหัส $pcode ได้');window.history.back();</script>";	
		exit;

}
logtext(true,$_SESSION['adminusercode'],'ลบสินค้า :  '.$pcode,$pcode);
		//====================LOG===========================
$text="uid=".$_SESSION["adminuserid"]." action=product_del=>delete from ".$dbprefix."product where pcode='".$pcode."'";
writelogfile($text);
//=================END LOG===========================
		/*if($pcode == '0001' or $pcode == 'DIS001' or $pcode == 'SE0011' or $pcode == 'SE0012'  or $pcode == 'SE0013'  or $pcode == 'SE0014'  or $pcode == 'SE0015'  or $pcode == 'SE0016'  or $pcode == 'SE0017'  or $pcode == 'SE0018'  or $pcode == 'SE0019'    or $pcode == 'SE0020'){
			echo '<font size=8>ไม่สามารถลบสินค้าประเภทนี้ได้</font>';
			exit;
		}else{
			
		} */

		mysql_query("delete from ".$dbprefix."product where pcode='".$pcode."' ");
		@unlink("uploads/product_img/".$pathImg.".jpg");
		mysql_query("COMMIT");
	}
	// แสดงรายการที่ลบ

?>
	</table>