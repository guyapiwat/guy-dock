<?
require_once("logtext.php");
require_once ("function.log.inc.php");
	if(isset($_POST['delfield'])){
		$postval=$_POST['delfield'];
		$postkey=array_keys($_POST['delfield']);
	}
	// ���������¡�� ź��������Ҫԡ����
	echo "<br>ź�����ż�����к� :";
	$numpost = sizeof($postkey);
	$style_l = "border-left:1 solid #FFFFFF;";
	$style_t = "border-top:1 solid #000000;";
	$style_b = "border-bottom:1 solid #000000;";
	$trcolor = array("#FFFFFF","#EEEEEE");
	?>
	<table width="50%" cellpadding="0" cellspacing="0">
        <tr bgcolor="#999999" align="center">
            <td style="<?=$style_l.$style_t.$style_b?>">���ʾ�ѡ�ҹ</td>
            <td style="<?=$style_l.$style_t.$style_b?>">���ʼ����</td>
			<td style="<?=$style_l.$style_t.$style_b?>">���ͼ����</td>
        </tr>
	<?
	
	for ($i=0;$i<$numpost;$i++) {
		// ��ҹ����������ҡ member
		echo 
		$rs=mysql_query("SELECT * FROM ".$dbprefix."payment_type WHERE id='".$postval[$postkey[$i]]."' LIMIT 1");
		//echo "SELECT * FROM ".$dbprefix."member WHERE id='".$postval[$postkey[$i]]."' LIMIT 1";
		if (mysql_num_rows($rs)>0){
			$row = mysql_fetch_object($rs);
			$id=$row->id;
			?>
            <tr bgcolor="<?=$trcolor[$i%2]?>">
            	<td style="<?=$style_l?>" align="center"><?=$row->uid;?></td>
            	<td style="<?=$style_l?>" align="left"><?=$row->usercode;?></td>
				<td style="<?=$style_l?>" align="center"><?=$row->username;?></td>
            </tr>
            <?
		}
		logtext(true,$_SESSION['adminusercode'],'ź�����š�ê����Թ',$row->usercode);
		mysql_free_result($rs);
		//====================LOG===========================
$text="uid=".$_SESSION["adminuserid"]." action=invuser_del =>delete from ".$dbprefix."payment_type where id='".$id."'";
writelogfile($text);
//=================END LOG===========================
		mysql_query("delete from ".$dbprefix."payment_type where id='".$id."' ");
		mysql_query("COMMIT");
	}
	// �ʴ���¡�÷��ź
?>
	</table>