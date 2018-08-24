<?

require_once(dirname(__FILE__)."/../../logtext.php");

	if(isset($_POST['delfield'])){
		$postval=$_POST['delfield'];
		$postkey=array_keys($_POST['delfield']);
	}
	// แจ้งว่ามีรายการ ลบข้อมูลสมาชิกใหม่
	echo "<br>ลบข้อมูลรอบการคำนวณรายได้จากการขยายธุรกิจ :";
	$numpost = sizeof($postkey);
	$style_l = "border-left:1 solid #FFFFFF;";
	$style_t = "border-top:1 solid #000000;";
	$style_b = "border-bottom:1 solid #000000;";
	$trcolor = array("#FFFFFF","#EEEEEE");
	?>
	<table width="50%" cellpadding="0" cellspacing="0">
        <tr bgcolor="#999999" align="center">
            <td style="<?=$style_l.$style_t.$style_b?>">รหัสรอบ</td>
            <td style="<?=$style_l.$style_t.$style_b?>">วันที่เพิ่มรอบ</td>
			<td style="<?=$style_l.$style_t.$style_b?>">วันที่คำนวนเริ่มต้น</td>
			<td style="<?=$style_l.$style_t.$style_b?>">วันที่คำนวณสิ้นสุด</td>
			<td style="<?=$style_l.$style_t.$style_b?>">วันที่จ่ายเงิน</td>
			<td style="<?=$style_l.$style_t.$style_b?>">คำนวณแล้ว</td>
        </tr>
	<?
	
	for ($i=0;$i<$numpost;$i++) {
		// อ่านข้อมูลเดิมจาก member
		$rs=mysql_query("SELECT * FROM ".$dbprefix."fround WHERE rid='".$postval[$postkey[$i]]."' LIMIT 1");
		if (mysql_num_rows($rs)>0){
			$row = mysql_fetch_object($rs);
			$rid=$row->rid;
			?>
            <tr bgcolor="<?=$trcolor[$i%2]?>">
            	<td style="<?=$style_l?>" align="center"><?=$row->rcode?></td>
            	<td style="<?=$style_l?>" align="left"><?=$row->rdate?></td>
				<td style="<?=$style_l?>" align="left"><?=$row->frcode?></td>
				<td style="<?=$style_l?>" align="left"><?=$row->trcode?></td>
				<td style="<?=$style_l?>" align="left"><?=$row->paydate?></td>
				<td style="<?=$style_l?>" align="left"><?=$row->calc?></td>
            </tr>
            <?
		}
		logtext(true,$_SESSION['adminuserid'],"delete from ".$dbprefix."fround where rid='$rid' ");
		mysql_free_result($rs);
		mysql_query("delete from ".$dbprefix."fround where rid='$rid' ");
		mysql_query("COMMIT");
	}
	// แสดงรายการที่ลบ
?>
	</table>