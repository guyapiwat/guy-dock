<?
require_once("logtext.php");
require_once ("function.log.inc.php");
	if(isset($_POST['delfield'])){
		$postval=$_POST['delfield'];
		$postkey=array_keys($_POST['delfield']);
	}
	// แจ้งว่ามีรายการ ลบข้อมูลสมาชิกใหม่
	echo "<br>ข้อมูลการการส่งสรรพากร :";
	$numpost = sizeof($postkey);
	$style_l = "border-left:1 solid #FFFFFF;";
	$style_t = "border-top:1 solid #000000;";
	$style_b = "border-bottom:1 solid #000000;";
	$trcolor = array("#FFFFFF","#EEEEEE");
	//mysql_query("delete from ".$dbprefix."asaleh1 ");
	?>
	<table width="50%" cellpadding="0" cellspacing="0">
        <tr bgcolor="#999999" align="center">
            <td style="<?=$style_l.$style_t.$style_b?>">เลขที่ใบเสร็จ</td>
            <td style="<?=$style_l.$style_t.$style_b?>">วันที่ใบเสร็จ</td>
            <td style="<?=$style_l.$style_t.$style_b?>">รหัสสมาชิก</td>
            <td style="<?=$style_l.$style_t.$style_b?>">ชื่อสมาชิก</td>
			<td style="<?=$style_l.$style_t.$style_b?>">ประเภทการซื้อ</td>
            <td style="<?=$style_l.$style_t.$style_b?>">PV</td>
            <td style="<?=$style_l.$style_t.$style_b?>">จำนวนเงิน</td>
        </tr>
	<?
	
	for ($i=0;$i<$numpost;$i++) {
		// อ่านข้อมูลเดิมจาก membe$sql .= "LEFT JOIN ".$dbprefix."member ON (".$dbprefix."asaleh.mcode=".$dbprefix."member.mcode) "; //WHERE smcode='".$_SESSION['usercode']."' 
		//echo "SELECT *,".$dbprefix."asaleh.id FROM ".$dbprefix."asaleh LEFT JOIN ".$dbprefix."member ON (".$dbprefix."asaleh.mcode=".$dbprefix."member.mcode) WHERE ".$dbprefix."asaleh.id='".$postval[$postkey[$i]]."'";
		$rs=mysql_query("SELECT *,".$dbprefix."asaleh.id FROM ".$dbprefix."asaleh LEFT JOIN ".$dbprefix."member ON (".$dbprefix."asaleh.mcode=".$dbprefix."member.mcode) WHERE ".$dbprefix."asaleh.id='".$postval[$postkey[$i]]."'");
		//echo "SELECT * FROM ".$dbprefix."member WHERE id='".$postval[$postkey[$i]]."' LIMIT 1";
		if (mysql_num_rows($rs)>0){
			$row = mysql_fetch_object($rs);
			$id=$row->id;
			$sano=$row->sano;
			//$sano="T-".($i+1);
			
			$sadate=explode('-',$row->sadate);
			$sadate1 = $sadate[0].'-'.$sadate[1];
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
			$sql = "SELECT MAX(id) AS id ,MAX(sano1) as sano1 FROM ".$dbprefix."asaleh where sadate like '%$sadate1%' ";
			//echo $sql.'<br>';
			$rs = mysql_query($sql);
			$mid = mysql_result($rs,0,'id')+1;
			$sano = mysql_result($rs,0,'sano1')+1;
			$tsano = substr($sano, 0, 4);
			$sano = substr($sano, 4, 9);
			$year = $sadate[0];
			$month = $sadate[1];
			$year = $year+543;
			$year = substr($year,2,2);
			$fsano = $year.$month;
		//	echo $fsano.' '.$tsano.'<br>';
			//exit;
			if($tsano != $fsano)$sano = '0001';
			$sano = $year.$month.$sano;
		//	echo $sano;
			//echo "update ".$dbprefix."asaleh set sano1 = '$sano'  where id = '$id' ";
			//exit;
			mysql_query("update ".$dbprefix."asaleh set sano1 = '$sano'  where id = '$id' ");
			//====================LOG===========================
$text="uid=".$_SESSION["adminuserid"]." action=asaleh1=>insert ".$dbprefix."asaleh1(id,sano,sadate,mcode,name_t,sa_type,tot_pv,total)  values(
			'$id','$sano','$sadate','$mcode','$name_t','$sa_type','$tot_pv','$total'
			) ";
writelogfile($text);
//=================END LOG===========================
		}
		logtext(true,$_SESSION['adminuserid'],'ย้ายการจ่ายตัง แผน ',$row->sano);
		mysql_free_result($rs);
		mysql_query("COMMIT");
	}
?>

	</table>