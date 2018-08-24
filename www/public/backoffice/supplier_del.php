<?
require_once("logtext.php");
require_once ("function.log.inc.php");
	if(isset($_POST['delfield'])){
		$postval=$_POST['delfield'];
		$postkey=array_keys($_POST['delfield']);
	}
	// แจ้งว่ามีรายการ ลบข้อมูลสมาชิกใหม่
	echo "<br>ลบข้อมูลสาขา :";
	$numpost = sizeof($postkey);
	$style_l = "border-left:1 solid #FFFFFF;";
	$style_t = "border-top:1 solid #000000;";
	$style_b = "border-bottom:1 solid #000000;";
	$trcolor = array("#FFFFFF","#EEEEEE");
	?>
	<table width="50%" cellpadding="0" cellspacing="0">
        <tr bgcolor="#999999" align="center">
            <td style="<?=$style_l.$style_t.$style_b?>">รหัสผู้จำหน่ายสินค้า</td>
            <td style="<?=$style_l.$style_t.$style_b?>">ชื่อผู้จำหน่ายสินค้า</td>
        </tr>
	<?
	
	for ($i=0;$i<$numpost;$i++) {
		// อ่านข้อมูลเดิมจาก member
		$rs=mysql_query("SELECT * FROM ".$dbprefix."supplier WHERE sup_code='".$postval[$postkey[$i]]."' LIMIT 1");
		if (mysql_num_rows($rs)>0){
			$row = mysql_fetch_object($rs);
			$sup_code=$row->sup_code;
			?>
            <tr bgcolor="<?=$trcolor[$i%2]?>">
            	<td style="<?=$style_l?>" align="center"><?=$row->sup_code?></td>
            	<td style="<?=$style_l?>" align="left"><?=$row->sup_desc?></td>
            </tr>
            <?
		}
		logtext(true,$_SESSION['adminusercode'],'ลบผู้จำหน่ายสินค้า',$row->sup_code);
		mysql_free_result($rs);
		//====================LOG===========================
$text="uid=".$_SESSION["adminusercode"]." action=supplier_del=>delete from ".$dbprefix."supplier where sup_code='$sup_code'";
writelogfile($text);
//=================END LOG===========================
		mysql_query("delete from ".$dbprefix."supplier where sup_code='$sup_code' ");
		//mysql_query("COMMIT");
	}
	// แสดงรายการที่ลบ
?>
	</table>