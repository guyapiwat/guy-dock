<?
require_once("logtext.php");
require_once ("function.log.inc.php");
	if(isset($_POST['delfield'])){
		$postval=$_POST['delfield'];
		$postkey=array_keys($_POST['delfield']);
	}
	// ���������¡�� ź��������Ҫԡ����
	echo "<br>�����š�á������þҡ� :";
	$numpost = sizeof($postkey);
	$style_l = "border-left:1 solid #FFFFFF;";
	$style_t = "border-top:1 solid #000000;";
	$style_b = "border-bottom:1 solid #000000;";
	$trcolor = array("#FFFFFF","#EEEEEE");
	//mysql_query("delete from ".$dbprefix."asaleh1 ");
	?>
	<table width="50%" cellpadding="0" cellspacing="0">
        <tr bgcolor="#999999" align="center">
            <td style="<?=$style_l.$style_t.$style_b?>">�Ţ��������</td>
            <td style="<?=$style_l.$style_t.$style_b?>">�ѹ��������</td>
            <td style="<?=$style_l.$style_t.$style_b?>">������Ҫԡ</td>
            <td style="<?=$style_l.$style_t.$style_b?>">������Ҫԡ</td>
			<td style="<?=$style_l.$style_t.$style_b?>">��������ë���</td>
            <td style="<?=$style_l.$style_t.$style_b?>">PV</td>
            <td style="<?=$style_l.$style_t.$style_b?>">�ӹǹ�Թ</td>
        </tr>
	<?
	
	for ($i=0;$i<$numpost;$i++) {
		// ��ҹ����������ҡ membe$sql .= "LEFT JOIN ".$dbprefix."member ON (".$dbprefix."asaleh.mcode=".$dbprefix."member.mcode) "; //WHERE smcode='".$_SESSION['usercode']."' 
		//echo "SELECT *,".$dbprefix."asaleh.id FROM ".$dbprefix."asaleh LEFT JOIN ".$dbprefix."member ON (".$dbprefix."asaleh.mcode=".$dbprefix."member.mcode) WHERE ".$dbprefix."asaleh.id='".$postval[$postkey[$i]]."'";
		$rs=mysql_query("SELECT *,".$dbprefix."asaleh.id FROM ".$dbprefix."asaleh LEFT JOIN ".$dbprefix."member ON (".$dbprefix."asaleh.mcode=".$dbprefix."member.mcode) WHERE ".$dbprefix."asaleh.id='".$postval[$postkey[$i]]."'");
		//echo "SELECT * FROM ".$dbprefix."member WHERE id='".$postval[$postkey[$i]]."' LIMIT 1";
		if (mysql_num_rows($rs)>0){
			$row = mysql_fetch_object($rs);
			$id=$row->id;
			$sano=$row->sano;
			//$sano="T-".($i+1);
			
			$sadate=$row->sadate;
			$mcode=$row->mcode;
			$name_t=$row->name_t;
			$sa_type=$row->sa_type;
			$tot_pv=$row->tot_pv;
			$total=$row->total;
			?>
            <tr bgcolor="<?=$trcolor[$i%2]?>">
            	<td style="<?=$style_l?>" align="center"><?=$row->sano?></td>
            	<td style="<?=$style_l?>" align="center"><?=$row->sadate?></td>
            	<td style="<?=$style_l?>" align="right"><?=$row->mcode?></td>
            	<td style="<?=$style_l?>" align="right"><?=$row->name_t?></td>
				<td style="<?=$style_l?>" align="center"><?=$row->sa_type?></td>
            	<td style="<?=$style_l?>" align="center"><?=$row->tot_pv?></td>
            	<td style="<?=$style_l?>" align="right"><?=$row->total?></td>
            </tr>
            <?
			//echo "update ".$dbprefix."asaleh set sano1 = '$sano'  where id = '$id' ";
			//exit;
			mysql_query("update ".$dbprefix."asaleh set sano1 = ''  where id = '$id' ");
			//====================LOG===========================
$text="uid=".$_SESSION["adminuserid"]." action=asaleh1=>insert ".$dbprefix."asaleh1(id,sano,sadate,mcode,name_t,sa_type,tot_pv,total)  values(
			'$id','$sano','$sadate','$mcode','$name_t','$sa_type','$tot_pv','$total'
			) ";
writelogfile($text);
//=================END LOG===========================
		}
		logtext(true,$_SESSION['adminuserid'],'���¡�è��µѧ Ἱ ',$row->sano);
		mysql_free_result($rs);
		mysql_query("COMMIT");
	}
?>

	</table>