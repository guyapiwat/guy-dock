<?
require_once("logtext.php");
require_once ("function.log.inc.php");
	if(isset($_POST['delfield'])){
		$postval=$_POST['delfield'];
		$postkey=array_keys($_POST['delfield']);
	}
	// ���������¡�� ź��������Ҫԡ����
	echo "<br>ź�������Թ��� :";
	$numpost = sizeof($postkey);
	$style_l = "border-left:1 solid #FFFFFF;";
	$style_t = "border-top:1 solid #000000;";
	$style_b = "border-bottom:1 solid #000000;";
	$trcolor = array("#FFFFFF","#EEEEEE");
	?>
	<table width="50%" cellpadding="0" cellspacing="0">
        <tr bgcolor="#999999" align="center">
			<td style="<?=$style_l.$style_t.$style_b?>">����</td>
            <td style="<?=$style_l.$style_t.$style_b?>">�ѹ�������Թ���</td>
			<td style="<?=$style_l.$style_t.$style_b?>">�����Թ���</td>
            <td style="<?=$style_l.$style_t.$style_b?>">�ӹǹ�����觫���</td>
			<td style="<?=$style_l.$style_t.$style_b?>">Balance</td>
        </tr>
	<?
	
	for ($i=0;$i<$numpost;$i++) {
		// ��ҹ����������ҡ member
		$rs=mysql_query("SELECT * FROM ".$dbprefix."bbuy  WHERE bbuy_ID='".$postval[$postkey[$i]]."' LIMIT 1");
		//echo "SELECT * FROM ".$dbprefix."member WHERE id='".$postval[$postkey[$i]]."' LIMIT 1";
		if (mysql_num_rows($rs)>0){
			$row = mysql_fetch_object($rs);
			$bbuy_ID=$row->bbuy_ID;
			$bbuy_Qua=$row->bbuy_Qua;
			$pcode=$row->pcode;
			?>
            <tr bgcolor="<?=$trcolor[$i%2]?>">
            	<td style="<?=$style_l?>" align="center"><?=$row->bbuy_ID;?></td>
            	<td style="<?=$style_l?>" align="left"><?=$row->bbuy_Date?></td>
				<td style="<?=$style_l?>" align="center"><?=$row->pcode?></td>
            	<td style="<?=$style_l?>" align="left"><?=$row->bbuy_Qua?></td>
				<td style="<?=$style_l?>" align="center"><?=$row->bbuy_Balance?></td>
            </tr>
            <?
		}
		mysql_free_result($rs);
		logtext(true,$_SESSION['adminusercode'],'ź�������Թ���',$bbuy_ID);
// update product
	logtext(true,$_SESSION['adminusercode'],'����Թ���',$bbuy_ID);
	$sql1="update ".$dbprefix."product set qty=qty-".$bbuy_Qua." where pcode = '$pcode' ";
	//====================LOG===========================
$text="uid=".$_SESSION["adminuserid"]." action=bbuy_del =>$sql";
mysql_query($sql1);
// update product

		//====================LOG===========================
$text="uid=".$_SESSION["adminuserid"]." action=bbuy_del=>delete from ".$dbprefix."bbuy where bbuy_ID='".$bbuy_ID."'";
writelogfile($text);
//=================END LOG===========================
		mysql_query("delete from ".$dbprefix."bbuy where bbuy_ID='".$bbuy_ID."' ");
		mysql_query("COMMIT");
	}
	// �ʴ���¡�÷��ź
?>
	</table>