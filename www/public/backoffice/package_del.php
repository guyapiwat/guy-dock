<?
require_once("logtext.php");
require_once ("function.log.inc.php");
	if(isset($_POST['delfield'])){
		$postval=$_POST['delfield'];
		$postkey=array_keys($_POST['delfield']);
	}
	// ���������¡�� ź��������Ҫԡ����
	echo "<br>ź������ package :";
	$numpost = sizeof($postkey);
	$style_l = "border-left:1 solid #FFFFFF;";
	$style_t = "border-top:1 solid #000000;";
	$style_b = "border-bottom:1 solid #000000;";
	$trcolor = array("#FFFFFF","#EEEEEE");
	?>
	<table width="50%" cellpadding="0" cellspacing="0">
        <tr bgcolor="#999999" align="center">
            <td style="<?=$style_l.$style_t.$style_b?>">���� package</td>
            <td style="<?=$style_l.$style_t.$style_b?>">��������´ package</td>
			<td style="<?=$style_l.$style_t.$style_b?>">˹���</td>
            <td style="<?=$style_l.$style_t.$style_b?>">�ҤҢ��</td>
			<td style="<?=$style_l.$style_t.$style_b?>">PV</td>
			<td style="<?=$style_l.$style_t.$style_b?>">�ʹ�������</td>
        </tr>
	<?
	
	for ($i=0;$i<$numpost;$i++) {
		// ��ҹ����������ҡ member
		$rs=mysql_query("SELECT * FROM ".$dbprefix."product_package WHERE pcode='".$postval[$postkey[$i]]."' LIMIT 1");
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
				<td style="<?=$style_l?>" align="center"><?=$row->qty?></td>
            </tr>
            <?
		}
		mysql_free_result($rs);
	logtext(true,$_SESSION['adminusercode'],"ź package : $pcode",$pcode);
		//====================LOG===========================
$text="uid=".$_SESSION["adminuserid"]." action=package_del=>delete from ".$dbprefix."product_package where pcode='".$pcode."'";
writelogfile($text);
//=================END LOG===========================
		mysql_query("delete from ".$dbprefix."product_package where pcode='".$pcode."' ");
		mysql_query("COMMIT");
	}
	// �ʴ���¡�÷��ź
?>
	</table>