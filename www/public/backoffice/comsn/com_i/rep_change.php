<?
require_once("logtext.php");
require_once ("function.log.inc.php");
	if(isset($_POST['delfield'])){
		$postval=$_POST['delfield'];
		$postkey=array_keys($_POST['delfield']);
	//	var_dump($_POST);
	}
	// ���������¡�� ź��������Ҫԡ����
	echo "<br>�����š��¡����ἹB :";
	$numpost = sizeof($postkey);
	$style_l = "border-left:1 solid #FFFFFF;";
	$style_t = "border-top:1 solid #000000;";
	$style_b = "border-bottom:1 solid #000000;";
	$trcolor = array("#FFFFFF","#EEEEEE");
	?>
	<table width="50%" cellpadding="0" cellspacing="0">
        <tr bgcolor="#999999" align="center">
            <td style="<?=$style_l.$style_t.$style_b?>">�ͺ</td>
            <td style="<?=$style_l.$style_t.$style_b?>">����</td>
            <td style="<?=$style_l.$style_t.$style_b?>">�ӹǹ���</td>
            <td style="<?=$style_l.$style_t.$style_b?>">��͹��</td>
        </tr>
	<?
	
	for ($i=0;$i<$numpost;$i++) {
		// ��ҹ����������ҡ member
		$rs=mysql_query("SELECT * FROM ".$dbprefix."imbonus  WHERE id='".$postval[$postkey[$i]]."' LIMIT 1");
		//echo "SELECT * FROM ".$dbprefix."imbonus  WHERE id='".$postval[$postkey[$i]]."' LIMIT 1";
		if (mysql_num_rows($rs)>0){
			$row = mysql_fetch_object($rs);
			$id=$row->id;
			?>
            <tr bgcolor="<?=$trcolor[$i%2]?>">
            	<td style="<?=$style_l?>" align="center"><?=$row->rcode?></td>
            	<td style="<?=$style_l?>" align="center"><?=$row->mcode?></td>
            	<td style="<?=$style_l?>" align="right"><?=$row->total?></td>
            	<td style="<?=$style_l?>" align="right"><?=$row->month_pv?></td>
            </tr>
            <?
			mysql_query("update ".$dbprefix."imbonus   set status = 0,pv = pv+pvb  where id='$id' ");
			//====================LOG===========================
$text="uid=".$_SESSION["adminusercode"]." action=imbonus_update=>update ".$dbprefix."imbonus   set status = 0,pv = pv+pvb where id='$id' ";
writelogfile($text);
//=================END LOG===========================
		}
		logtext(true,$_SESSION['adminusercode'],'���¡�è��µѧ �Ң�',$row->sano);
		mysql_free_result($rs);
		mysql_query("COMMIT");
	}
?>

	</table>