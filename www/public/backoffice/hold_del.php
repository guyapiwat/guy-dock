<?
require_once("logtext.php");

	if(isset($_POST['delfield'])){
		$postval=$_POST['delfield'];
		$postkey=array_keys($_POST['delfield']);
	}
	// ���������¡�� ź��������Ҫԡ����
	echo "<br>ź��������¡�ë��͢�� :";
	$numpost = sizeof($postkey);
	$style_l = "border-left:1 solid #FFFFFF;";
	$style_t = "border-top:1 solid #000000;";
	$style_b = "border-bottom:1 solid #000000;";
	$trcolor = array("#FFFFFF","#EEEEEE");
	?>
	<table width="50%" cellpadding="0" cellspacing="0">
        <tr bgcolor="#999999" align="center">
            <td style="<?=$style_l.$style_t.$style_b?>">�Ţ���</td>
            <td style="<?=$style_l.$style_t.$style_b?>">����</td>
            <td style="<?=$style_l.$style_t.$style_b?>">�ӹǹ��� PV</td>
            <td style="<?=$style_l.$style_t.$style_b?>">�ӹǹ�Թ���</td>
        </tr>
	<?
	
	for ($i=0;$i<$numpost;$i++) {
		// ��ҹ����������ҡ member
		$rs=mysql_query("SELECT * FROM ".$dbprefix."holdhead WHERE id='".$postval[$postkey[$i]]."' LIMIT 1");
		//echo "SELECT * FROM ".$dbprefix."member WHERE id='".$postval[$postkey[$i]]."' LIMIT 1";
		if (mysql_num_rows($rs)>0){
			$row = mysql_fetch_object($rs);
			$id=$row->id;
			?>
            <tr bgcolor="<?=$trcolor[$i%2]?>">
            	<td style="<?=$style_l?>" align="center"><?=$row->sano?></td>
            	<td style="<?=$style_l?>" align="center"><?=$row->mcode?></td>
            	<td style="<?=$style_l?>" align="right"><?=$row->tot_pv?></td>
            	<td style="<?=$style_l?>" align="right"><?=$row->total?></td>
            </tr>
            <?
			$sql = "delete from ".$dbprefix."holdhead where id='$id' ";
			//logtext(true,$_SESSION['adminuserid'],$sql);
			mysql_query($sql);
			$sql1 = "delete from ".$dbprefix."holddesc where hono='$id' ";
			//logtext(true,$_SESSION['adminuserid'],$sql1);
			mysql_query($sql1);
		}
		mysql_free_result($rs);
		mysql_query("COMMIT");
	}
	// �ʴ���¡�÷��ź
?>
	</table>