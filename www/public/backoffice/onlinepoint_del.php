<?
require_once("logtext.php");

	if(isset($_POST['delfield'])){
		$postval=$_POST['delfield'];
		$postkey=array_keys($_POST['delfield']);
	}
	// ���������¡�� ź��������Ҫԡ����
	echo "<br>ź�����š�ë����Թ��Ҽ�ҹ��� ��Ы��� Point :";
	$numpost = sizeof($postkey);
	$style_l = "border-left:1 solid #FFFFFF;";
	$style_t = "border-top:1 solid #000000;";
	$style_b = "border-bottom:1 solid #000000;";
	$trcolor = array("#FFFFFF","#EEEEEE");
	?>
	<table width="50%" cellpadding="0" cellspacing="0">
        <tr bgcolor="#999999" align="center">
            <td style="<?=$style_l.$style_t.$style_b?>">�ӴѺ���</td>
            <td style="<?=$style_l.$style_t.$style_b?>">����</td>
            <td style="<?=$style_l.$style_t.$style_b?>">����</td>
            <td style="<?=$style_l.$style_t.$style_b?>">���� Point</td>
        </tr>
	<?
	
	for ($i=0;$i<$numpost;$i++) {
		// ��ҹ����������ҡ member
		$rs=mysql_query("SELECT * FROM ".$dbprefix."onlinepoint_h WHERE id='".$postval[$postkey[$i]]."' LIMIT 1");
		//echo "SELECT * FROM ".$dbprefix."member WHERE id='".$postval[$postkey[$i]]."' LIMIT 1";
		if (mysql_num_rows($rs)>0){
			$row = mysql_fetch_object($rs);
			$id=$row->id;
			?>
            <tr bgcolor="<?=$trcolor[$i%2]?>">
            	<td style="<?=$style_l?>" align="center"><?=$row->id?></td>
            	<td style="<?=$style_l?>" align="center"><?=$row->mcode?></td>
            	<td style="<?=$style_l?>" align="right"><?=$row->name_t?></td>
            	<td style="<?=$style_l?>" align="right"><?=$row->point?></td>
            </tr>
            <?
			mysql_query("delete from ".$dbprefix."onlinepoint_h where id='$id' ");
			mysql_query("delete from ".$dbprefix."onlinepoint_d where pid='$id' ");
		
		logtext(true,$_SESSION['adminuserid'],'ź���',$row->id);
		mysql_free_result($rs);
		mysql_query("COMMIT");
	}
}
	// �ʴ���¡�÷��ź
?>
	</table>