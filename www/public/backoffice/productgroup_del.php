<?
require_once("logtext.php");
	if(isset($_POST['delfield'])){
		$postval=$_POST['delfield'];
		$postkey=array_keys($_POST['delfield']);
	}
	// ���������¡�� ź�����Ÿ�Ҥ��
	echo "<br>ź��������Ǵ�����Թ��� :";
	$numpost = sizeof($postkey);
	$style_l = "border-left:1 solid #FFFFFF;";
	$style_t = "border-top:1 solid #000000;";
	$style_b = "border-bottom:1 solid #000000;";
	$trcolor = array("#FFFFFF","#EEEEEE");
	?>
	<table width="50%" cellpadding="0" cellspacing="0">
        <tr bgcolor="#999999" align="center">
            <td style="<?=$style_l.$style_t.$style_b?>">������Ǵ�����Թ���</td>
            <td style="<?=$style_l.$style_t.$style_b?>">��Ǵ�����Թ���</td>
        </tr>
	<?
	
	for ($i=0;$i<$numpost;$i++) {
		// ��ҹ����������ҡ  bank
	//	echo "SELECT * FROM ".$dbprefix."productgroup WHERE id='".$postval[$postkey[$i]]."' LIMIT 1";
		$rs=mysql_query("SELECT * FROM ".$dbprefix."productgroup WHERE id='".$postval[$postkey[$i]]."' LIMIT 1");
		//echo "SELECT * FROM ".$dbprefix."bank WHERE id='".$postval[$postkey[$i]]."' LIMIT 1";
		if (mysql_num_rows($rs)>0){
			$row = mysql_fetch_object($rs);
			$groupname=$row->groupname;
			$id=$row->id;
			?>
            <tr bgcolor="<?=$trcolor[$i%2]?>">
            	<td style="<?=$style_l?>" align="center"><?=$row->id;?></td>
            	<td style="<?=$style_l?>" align="left"><?=$row->groupname;?></td>
            </tr>
            <?
		}
		logtext(true,$_SESSION['adminusercode'],'ź��Ǵ�����Թ��� ',$row->groupname);
		mysql_free_result($rs);
		mysql_query("delete from ".$dbprefix."productgroup where id='".$id."' ");
		mysql_query("COMMIT");
	}
	// �ʴ���¡�÷��ź
?>
	</table>