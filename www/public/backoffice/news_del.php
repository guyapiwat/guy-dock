<?
require_once("logtext.php");
require_once ("function.log.inc.php");
	if(isset($_POST['delfield'])){
		$postval=$_POST['delfield'];
		$postkey=array_keys($_POST['delfield']);
	}
 // แจ้งว่ามีรายการ ลบข้อมูลธนาคาร
	echo "<br>ลบประกาศ :";
	$numpost = sizeof($postkey);
	$style_l = "border-left:1 solid #FFFFFF;";
	$style_t = "border-top:1 solid #000000;";
	$style_b = "border-bottom:1 solid #000000;";
	$trcolor = array("#FFFFFF","#EEEEEE");
	?>
	<table width="50%" cellpadding="0" cellspacing="0">
        <tr bgcolor="#999999" align="center">
            <td style="<?=$style_l.$style_t.$style_b?>">ลำดับ</td>
            <td style="<?=$style_l.$style_t.$style_b?>">หัวข้อ</td>
        </tr>
	<?
	
	for ($i=0;$i<$numpost;$i++) {
		// อ่านข้อมูลเดิมจาก  bank
		$rs=mysql_query("SELECT * FROM ".$dbprefix."news WHERE id='".$postval[$postkey[$i]]."' LIMIT 1");
		//echo "SELECT * FROM ".$dbprefix."bank WHERE id='".$postval[$postkey[$i]]."' LIMIT 1";
		if (mysql_num_rows($rs)>0){
			$row = mysql_fetch_object($rs);
			$id=$row->id;
			?>
            <tr bgcolor="<?=$trcolor[$i%2]?>">
            	<td style="<?=$style_l?>" align="center"><?=$row->id;?></td>
            	<td style="<?=$style_l?>" align="left"><?=$row->head;?></td>
            </tr>
            <?
		}
		logtext(true,$_SESSION['adminusercode'],'ลบธนาคาร ',$row->id);
		mysql_free_result($rs);
		//====================LOG===========================
$text="uid=".$_SESSION["adminuserid"]." action=news_del =>delete from ".$dbprefix."news where id='".$id."'";
writelogfile($text);
//=================END LOG===========================
		mysql_query("delete from ".$dbprefix."news where id='".$id."' ");
		mysql_query("COMMIT");
	}
	// แสดงรายการที่ลบ
?>
	</table>