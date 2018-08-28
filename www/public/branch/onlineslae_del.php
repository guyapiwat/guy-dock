<?
require_once("logtext.php");

	if(isset($_POST['delfield'])){
		$postval=$_POST['delfield'];
		$postkey=array_keys($_POST['delfield']);
	}
	// แจ้งว่ามีรายการ ลบข้อมูลสมาชิกใหม่
	echo "<br>ยกเลิกข้อมูล :";
	$numpost = sizeof($postkey);
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
		$rs=mysql_query("SELECT * FROM ".$dbprefix."transfersale_h WHERE id='".$postval[$postkey[$i]]."' LIMIT 1");
		echo "SELECT * FROM ".$dbprefix."transfersale_h WHERE id='".$postval[$postkey[$i]]."' LIMIT 1";
		if (mysql_num_rows($rs)>0){
			$row = mysql_fetch_object($rs);
			$pid=$row->id;
			?>
            <tr bgcolor="<?=$trcolor[$i%2]?>">
            	<td style="<?=$style_l?>" align="center"><?=$row->code_ref?></td>
            	<td style="<?=$style_l?>" align="left"><?=$row->name_t?></td>
            </tr>
            <?
		}
		
		mysql_query("u from ".$dbprefix."transfersale_h set cancel =1 where id='$pid' ");
	//	mysql_query("delete from ".$dbprefix."transfersale_h where id='$pid' ");
	//	mysql_query("delete from ".$dbprefix."transfersale_d where pid='$pid' ");
		$sql = "select * from ".$dbprefix."transfersale_d where pid='$bid'";
			$result = mysql_query($sql);
			for($i=0;$i<mysql_num_rows($result);$i++){
				$data = mysql_fetch_object($result);
				$pcode =$data->pcode;
				$qty =$data->qty;
				$inv_codeold =$data->inv_code;
			//	plusProduct($dbprefix,$pcode,$_SESSION['adminusercode'],$qty);
				//minusProduct1($dbprefix,$pcode,$inv_codeold,$qty);
			}		
		//echo $_SESSION['usercode'];
		logtext(true,$_SESSION['adminuserid'],'ลบสมาชิกสมัครผ่านเว็บ',$row->id);
		mysql_free_result($rs);
		
		
		//mysql_query("COMMIT");
	}
	// แสดงรายการที่ลบ
function plusProduct($dbprefix,$pcode,$invent,$qty){
	 $sql="SELECT * FROM ".$dbprefix."product_package1 where package = '$pcode'";
		//exit;
		$rs = mysql_query($sql);
		//echo "$sql<BR>";
		if(mysql_num_rows($rs) > 0)
		{
			for($m=0;$m<mysql_num_rows($rs);$m++){
				
				$sqlObj = mysql_fetch_object($rs);
				$pcode2 =$sqlObj->pcode;	
				$qty2 =$sqlObj->qty*$qty;	
				$sql = "update ".$dbprefix."product set qty = qty+$qty2 WHERE pcode='$pcode2' ";
				$rs1 = mysql_query($sql);
			}
		}else{
			$sql = "update ".$dbprefix."product set qty = qty+$qty WHERE pcode='$pcode' ";
			$rs = mysql_query($sql);
		}
}
?>
	</table>