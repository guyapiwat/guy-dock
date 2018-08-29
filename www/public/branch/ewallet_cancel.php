<?
session_start();
require_once("logtext.php");
require_once("global.php");
require_once("function.php");
require_once ("function.log.inc.php");

	// แจ้งว่ามีรายการ ลบข้อมูลสมาชิกใหม่
	echo "<br>แก้ไขข้อมูลรายการซื้อขาย :";
	$bid = $_GET['bid'];
	$remark = $_GET['remark'];
	
	if(empty($bid) or empty($remark)){
		echo "<script language='JavaScript'>alert('เกิดข้อผิดพลาดค่ะ');window.location='index.php?sessiontab=".$_GET["sessiontab"]."&sub=".$_GET["sub"]."'</script>";	
		exit;
	}	
	
	$style_l = "border-left:1 solid #FFFFFF;";
	$style_t = "border-top:1 solid #000000;";
	$style_b = "border-bottom:1 solid #000000;";
	$trcolor = array("#FFFFFF","#EEEEEE");
	?>
	<table width="50%" cellpadding="0" cellspacing="0">
        <tr bgcolor="#999999" align="center">
            <td style="<?=$style_l.$style_t.$style_b?>">เลขบิล</td>
            <td style="<?=$style_l.$style_t.$style_b?>">รหัส</td>
            <td style="<?=$style_l.$style_t.$style_b?>">จำนวนเงินรวม</td>
        </tr>
	<?
		// อ่านข้อมูลเดิมจาก member
		//echo "SELECT * FROM ".$dbprefix."ewallet WHERE id='".$postval[$postkey[$i]]."' LIMIT 1";
		//$rs=mysql_query("SELECT * FROM ".$dbprefix."ewallet WHERE id='$bid' and lid = '{$_SESSION["admininvent"]}' and cancel = 0 LIMIT 1");
		if($_SESSION["inventobj6"] != '7')$lid = " and lid = '{$_SESSION["admininvent"]}'";
		
		$rs=mysql_query("SELECT * FROM ".$dbprefix."ewallet WHERE id='$bid' $lid  and cancel = 0 LIMIT 1");
		//echo "SELECT * FROM ".$dbprefix."member WHERE id='".$postval[$postkey[$i]]."' LIMIT 1";
		if (mysql_num_rows($rs)>0){
			$row = mysql_fetch_object($rs);
			$id=$row->id;
			?>
            <tr bgcolor="<?=$trcolor[$i%2]?>">
            	<td style="<?=$style_l?>" align="center"><?=$row->sano?></td>
            	<td style="<?=$style_l?>" align="center"><?if(!empty($row->inv_code))echo $row->inv_code;else$row->mcode;?></td>
            	<td style="<?=$style_l?>" align="right"><?=$row->txtMoney ?></td>
            </tr>
            <?
			//====================LOG===========================
			//echo 'invent : '.$row->inv_code.' mcode : '.$row->mcode.' txtmoney : '.$row->txtMoney.' txtmoney : '.$row->txtMoney;
			
$text="uid=".$_SESSION["inv_usercode"]." action=ewallet_update=>update ".$dbprefix."ewallet set cancel=1, cancel_date='".$_SESSION["datetimezone"]."',uid_cancel='".$_SESSION["inv_usercode"]."', remark='".$remark."', cancel=1 where id='$id'";
writelogfile($text);
//=================END LOG===========================


			/*if(!empty($row->inv_code)){
				//echo "1";
				mysql_query("update ".$dbprefix."invent set ewallet = ewallet-".$row->txtMoney.",bewallet = bewallet-".$row->bprice." where inv_code='".$row->inv_code."' ");
				$text="uid=".$_SESSION["inv_usercode"]." action=ewallet_update=>update ".$dbprefix."invent set ewallet = ewallet-".$row->txtMoney.",bewallet = bewallet-".$row->bprice." where inv_code='".$row->inv_code."' ";
			}else */
			if(!empty($row->mcode)){
				echo "2";
				$sqlS = "select ewallet from ".$dbprefix."member where mcode='".$row->mcode."' and ewallet >= '".$row->txtMoney."' ";
				$sqlSS = mysql_query($sqlS);
				if(mysql_num_rows($sqlSS) > 0){
					mysql_query("update ".$dbprefix."member set ewallet = ewallet-".$row->txtMoney.",bewallet = bewallet-".$row->bprice." where mcode='".$row->mcode."' ");
					$text="uid=".$_SESSION["inv_usercode"]." action=ewallet_update=>update ".$dbprefix."member set ewallet = ewallet-".$row->txtMoney.",bewallet = bewallet-".$row->bprice." where mcode='".$row->mcode."' ";
				
                    log_ewallet('ewallet',$row->mcode,$row->sano,$row->txtMoney,'O',date('Y-m-d'),"Cancel(".$row->sano.")"); // log                   
                }else{
					echo "<script language='JavaScript'>alert('Ewallet ไม่เพียงพอที่ยกเลิกได้');window.location='index.php?sessiontab=".$_GET["sessiontab"]."&sub=".$_GET["sub"]."'</script>";
					exit;

				}
			}
			//echo "จบ";
			//exit;
			//====================LOG===========================
			writelogfile($text);
			//=================END LOG===========================
			mysql_query("update ".$dbprefix."ewallet set cancel=1,cancel_date='".$_SESSION["datetimezone"]."',uid_cancel='".$_SESSION["inv_usercode"]."', remark='".$remark."' where id='$id' $lid ");

			mysql_query("update ali_transfer_ewallet_confirm set approved_status='0'   where mcode='".$row->mcode."' and  sano_ref='".$row->sano."'  ");


			echo "<script language='JavaScript'>window.location='index.php?sessiontab=".$_GET["sessiontab"]."&sub=".$_GET["sub"]."'</script>";	
            
		}else{
			echo "<script language='JavaScript'>alert('ไม่สามารถยกเลิกบิลนี้ได้');window.location='index.php?sessiontab=".$_GET["sessiontab"]."&sub=".$_GET["sub"]."'</script>";	
		}
		logtext(true,$_SESSION['inv_usercode'],'ยกเลิกบิล ewallet id : '.$row->sano,$row->sano);
		mysql_free_result($rs);
		mysql_query("COMMIT");
?>

	</table>