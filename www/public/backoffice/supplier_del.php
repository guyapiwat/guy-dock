<?
require_once("logtext.php");
require_once ("function.log.inc.php");
	if(isset($_POST['delfield'])){
		$postval=$_POST['delfield'];
		$postkey=array_keys($_POST['delfield']);
	}
	// ���������¡�� ź��������Ҫԡ����
	echo "<br>ź�������Ң� :";
	$numpost = sizeof($postkey);
	$style_l = "border-left:1 solid #FFFFFF;";
	$style_t = "border-top:1 solid #000000;";
	$style_b = "border-bottom:1 solid #000000;";
	$trcolor = array("#FFFFFF","#EEEEEE");
	?>
	<table width="50%" cellpadding="0" cellspacing="0">
        <tr bgcolor="#999999" align="center">
            <td style="<?=$style_l.$style_t.$style_b?>">���ʼ���˹����Թ���</td>
            <td style="<?=$style_l.$style_t.$style_b?>">���ͼ���˹����Թ���</td>
        </tr>
	<?
	
	for ($i=0;$i<$numpost;$i++) {
		// ��ҹ����������ҡ member
		$rs=mysql_query("SELECT * FROM ".$dbprefix."supplier WHERE sup_code='".$postval[$postkey[$i]]."' LIMIT 1");
		if (mysql_num_rows($rs)>0){
			$row = mysql_fetch_object($rs);
			$sup_code=$row->sup_code;
			?>
            <tr bgcolor="<?=$trcolor[$i%2]?>">
            	<td style="<?=$style_l?>" align="center"><?=$row->sup_code?></td>
            	<td style="<?=$style_l?>" align="left"><?=$row->sup_desc?></td>
            </tr>
            <?
		}
		logtext(true,$_SESSION['adminusercode'],'ź����˹����Թ���',$row->sup_code);
		mysql_free_result($rs);
		//====================LOG===========================
$text="uid=".$_SESSION["adminusercode"]." action=supplier_del=>delete from ".$dbprefix."supplier where sup_code='$sup_code'";
writelogfile($text);
//=================END LOG===========================
		mysql_query("delete from ".$dbprefix."supplier where sup_code='$sup_code' ");
		//mysql_query("COMMIT");
	}
	// �ʴ���¡�÷��ź
?>
	</table>