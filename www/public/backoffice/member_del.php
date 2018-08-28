<?
require_once("logtext.php");
require_once ("function.log.inc.php");
	if(isset($_POST['delfield'])){
		$postval=$_POST['delfield'];
		$postkey=array_keys($_POST['delfield']);
	}
	// แจ้งว่ามีรายการ ลบข้อมูลสมาชิกใหม่
	echo "<br>ลบข้อมูลสมาชิก :";
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
		$rs=mysql_query("SELECT * FROM ".$dbprefix."member WHERE id='".$postval[$postkey[$i]]."' LIMIT 1");
		//echo "SELECT * FROM ".$dbprefix."member WHERE id='".$postval[$postkey[$i]]."' LIMIT 1";
		if (mysql_num_rows($rs)>0){
			$row = mysql_fetch_object($rs);
			$id=$row->id;
			?>
            <tr bgcolor="<?=$trcolor[$i%2]?>">
            	<td style="<?=$style_l?>" align="center"><?=$row->mcode?></td>
            	<td style="<?=$style_l?>" align="left"><?=$row->name_t?></td>
            </tr>
            <?
		}
		//echo $_SESSION['usercode'];
		$sqlDel = "delete from  ".$dbprefix."expdate where mid = '".$row->id."'";
		mysql_query($sqlDel);
		logtext(true,$_SESSION['adminusercode'],'ลบสมาชิก :'.$row->mcode.' ('.$row->name_t.')',$row->mcode);
		mysql_free_result($rs);
		//====================LOG===========================
		$text="uid=".$_SESSION["adminuserid"]." action=member_del =>delete from ".$dbprefix."member where id='$id' ";
		writelogfile($text);
//=================END LOG===========================
		mysql_query("delete from ".$dbprefix."member where id='$id' ");
		//mysql_query("COMMIT");
	}
	// แสดงรายการที่ลบ
?>
	</table>