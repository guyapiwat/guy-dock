<?

require_once(dirname(__FILE__)."/../../logtext.php");

	if(isset($_POST['delfield'])){
		$postval=$_POST['delfield'];
		$postkey=array_keys($_POST['delfield']);
	}
	// ���������¡�� ź��������Ҫԡ����
	echo "<br>ź�������ͺ��äӹǳ�����ҡ��â��¸�áԨ :";
	$numpost = sizeof($postkey);
	$style_l = "border-left:1 solid #FFFFFF;";
	$style_t = "border-top:1 solid #000000;";
	$style_b = "border-bottom:1 solid #000000;";
	$trcolor = array("#FFFFFF","#EEEEEE");
	?>
	<table width="50%" cellpadding="0" cellspacing="0">
        <tr bgcolor="#999999" align="center">
            <td style="<?=$style_l.$style_t.$style_b?>">�����ͺ</td>
            <td style="<?=$style_l.$style_t.$style_b?>">�ѹ��������ͺ</td>
			<td style="<?=$style_l.$style_t.$style_b?>">�ѹ���ӹǹ�������</td>
			<td style="<?=$style_l.$style_t.$style_b?>">�ѹ���ӹǳ����ش</td>
			<td style="<?=$style_l.$style_t.$style_b?>">�ѹ�������Թ</td>
			<td style="<?=$style_l.$style_t.$style_b?>">�ӹǳ����</td>
        </tr>
	<?
	
	for ($i=0;$i<$numpost;$i++) {
		// ��ҹ����������ҡ member
		$rs=mysql_query("SELECT * FROM ".$dbprefix."cround1 WHERE rid='".$postval[$postkey[$i]]."' LIMIT 1");
		if (mysql_num_rows($rs)>0){
			$row = mysql_fetch_object($rs);
			$rid=$row->rid;
			?>
            <tr bgcolor="<?=$trcolor[$i%2]?>">
            	<td style="<?=$style_l?>" align="center"><?=$row->rcode?></td>
            	<td style="<?=$style_l?>" align="left"><?=$row->rdate?></td>
				<td style="<?=$style_l?>" align="left"><?=$row->fdate?></td>
				<td style="<?=$style_l?>" align="left"><?=$row->tdate?></td>
				<td style="<?=$style_l?>" align="left"><?=$row->paydate?></td>
				<td style="<?=$style_l?>" align="left"><?=$row->calc?></td>
            </tr>
            <?
		}
		$sql = "delete from ".$dbprefix."cround1 where rid='$rid' ";
		logtext(true,$_SESSION['adminuserid'],$sql);
		mysql_free_result($rs);
		mysql_query($sql);
		mysql_query("COMMIT");
	}
	// �ʴ���¡�÷��ź
?>
	</table>