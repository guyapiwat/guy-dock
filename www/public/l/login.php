<head>
<meta http-equiv="Content-Language" content="th">
<meta http-equiv="Content-Type" content="text/html; charset=tis-620">
</head>
<? 

?>


<? include("prefix.php");?>
<?
	//if the form was filled out, set the session variables
include("securimage.php");
include("global.php");
include("function.php");
//include_once("safetySQL.php");
//include("gencode.php");

$img = new Securimage();
  $valid = $img->check($_POST['code']);
	if($valid == true) {	
	if (isset($_POST["usercode"]) && isset($_POST["password"]) ) {

		$sql = "SELECT * FROM ".$dbprefix."member WHERE mcode='".gencode(addslashes(trim($_POST["usercode"])))."' AND sv_code='".addslashes(trim($_POST["password"]))."' and status_suspend <> '1' and status_terminate <> '1' LIMIT 1";
		$rs=mysql_query($sql);
		if(mysql_num_rows($rs)>0){
			$_SESSION["usercode"] = $_POST["usercode"];
			$_SESSION["usercode"] = gencode($_SESSION["usercode"]);
			$_SESSION["password"] = $_POST["password"];
			$_SESSION["username"] = mysql_result($rs,0,'name_t');
			$_SESSION["userid"] = mysql_result($rs,0,'id');
			if(empty($_SESSION["username"]))$_SESSION["username"] = mysql_result($rs,0,'name_t');
			$_SESSION["ewallet"] = mysql_result($rs,0,'ewallet');
			$_SESSION["uid"] = mysql_result($rs,0,'id');
			$_SESSION["mdate"] = mysql_result($rs,0,'mdate');
			$_SESSION["mtype1"] = mysql_result($rs,0,'mtype1');
			$_SESSION["ecom"] = mysql_result($rs,0,'ecom');
			$_SESSION["eatoship"] = mysql_result($rs,0,'eatoship');
			$_SESSION["voucher"] = mysql_result($rs,0,'voucher');
			$_SESSION["profile_img"] = mysql_result($rs,0,'profile_img');
			$m_locationbase = mysql_result($rs,0,'locationbase');
			$_SESSION["m_locationbase"]  = $m_locationbase;
			$rar_member = array();
			$rar_member = searchlocationbase($dbprefix,$_SESSION["m_locationbase"]);
			$_SESSION["lan"] = $rar_member["lang"];
			include_once("wording".$rar_member["lang"].".php");


				$mcode = "";
			echo "<script language='javascript' type='text/javascript'>window.location='./index.php?sessiontab=1'</script>";
			exit;
		}else{
			unset($_SESSION["usercode"]);
		  //	echo "<center><font color=#ff000>".$wording_lan["w12"]."</font></center>";
			echo "<script language='javascript' type='text/javascript'>window.location='./index.php?sessiontab=1'</script>";
			exit;
		}
	}
  }else{
	    if(!empty($_POST)){ 
		   echo "<script language='javascript' type='text/javascript'>alert('รหัสป้องกันไม่ถูกต้อง');</script>";
	  }

	//  echo "<script language='javascript' type='text/javascript'>window.location='./login2.php'</script>";
	//	exit;
	//include("header.php")?>

<?

echo "<script language='javascript' type='text/javascript'>window.location='./login2.php'</script>";
exit;
?>
    
<table align="center" cellspacing="0" cellpadding="5" border="0" width="300">
  <tr align="center" >
    <td valign="top"  align="center" ><form method="post" action="<?=$_SERVER["PHP_SELF"]?>" name="Form1" autocomplete="off"><?=$wording_lan["login_2"]?><br />
      <br />
      <table  align="center" border="0" cellpadding="0" cellspacing="1" width="300" height="150" background="./images/log_banner.jpg" style="background-repeat:no-repeat">
        <tr>
          <td  width="30%" align="right">&nbsp;</td>
          <td width="70%" align="left"></td>
        </tr>
        <tr>
          <td  align="right" nowrap><?=$wording_lan["login_3"]?>&nbsp;:&nbsp;</td>
          <td  align="left"><input type="text" name="usercode" size="20" style="text-transform: uppercase;"  onkeypress="javascript:this.value=this.value.toUpperCase();"/></td>
        </tr>
        <tr>
          <td  align="right"><?=$wording_lan["login_4"]?>&nbsp;:&nbsp;</td>
          <td  align="left"><input type="password" name="password" size="20" /></td>
        </tr>
		<tr>
			<td></td>
			<td><div style="width: 145px; float: left; height: 50px">
      <img id="siimage" align="left" style="padding-right: 5px; border: 0" src="securimage_show.php?sid=<?php echo md5(time()) ?>" /></div>
	
<div style="clear: both"></div>
<!--Code:<br />-->

<!-- NOTE: the "name" attribute is "code" so that $img->check($_POST['code']) will check the submitted form field -->
<input type="text" name="code" size="12" /><br /><br /></td>
		</tr>
        <tr>
          <td align="right"></td>
          <td align="left">
              <input type="submit"  name="B1" value="<?=$wording_lan["loginbutton"]?>" /> </td>
</td>
     </tr>
      </table>

    </form>
     </td></tr>
   <!-- 
            <td width="284" align="center" valign="middle">
                <p></p><img src="pic/mematairstep.jpg" width="170" height="121" border=0 alt="แผนภูมิสมาชิก"><br><FONT face="MS Sans Serif" SIZE="2" COLOR="">ดูแผนภูมิสายงานสมาชิก</td>
 -->
  </tr>
</table>
<table align="center" cellspacing="0" cellpadding="5" border="0" width="400">
<tr  align="center" ><td>
<u><b><?=$wording_lan["Note"]?></b></u> <?=$wording_lan["login_1"]?>
</td></tr>
</table>
<? 
	}
	//include("footer.php")
function dateDiff1($startDate, $endDate) { 
    // Parse dates for conversion 
    $startArry = date_parse($startDate); 
    $endArry = date_parse($endDate); 

    // Convert dates to Julian Days 
    $start_date = gregoriantojd($startArry["month"], $startArry["day"], $startArry["year"]); 
    $end_date = gregoriantojd($endArry["month"], $endArry["day"], $endArry["year"]); 

    // Return difference 
    return round(($end_date - $start_date), 0); 

} 
function expdate1($startdate,$datenum){
 $startdatec=strtotime($startdate); // ทำให้ข้อความเป็นวินาที
 $tod=$datenum*86400; // รับจำนวนวันมาคูณกับวินาทีต่อวัน
 $ndate=$startdatec+$tod; // นับบวกไปอีกตามจำนวนวันที่รับมา
 return $ndate; // ส่งค่ากลับ
}
function updatePos1($dbprefix,$mcode,$cur_date,$tot_pv){

	$pos_piority = array('EX'=>2,'SU'=>1,'MB'=>0);
	$pos_exp = array('EX'=>3000,'SU'=>750,'MB'=>0);

	$chkmonth=explode("-",$cur_date);
	$chkmonth= $chkmonth[0].'-'.$chkmonth[1];
	$sql = "SELECT pos_cur,mdate from ".$dbprefix."member WHERE mcode='$mcode' ";
	$rs = mysql_query($sql);
	$pos_old = '';
	if(mysql_num_rows($rs)>0) {
		$pos_old = mysql_result($rs,0,'pos_cur');
		$mdate = mysql_result($rs,0,'mdate');
		$expmdte = date('Y-m-d',expdate1($mdate,'60'));
			$month=explode("-",$mdate);
			$thismonth = $month[0].'-'.$month[1];
			if($month[1] >= 12){
			  $month_1 = $month[0]+1;
			  $month_2 = '01';
				$nextmonth = $month_1.'-'.$month_2;

			}else if($month[1] >= 9){
			  $month_1 = $month[0];
			  $month_2 = $month[1]+1;
				$nextmonth = $month_1.'-'.$month_2;

			}else{
				$month_1 = $month[0];
				$month_2 = $month[1]+1;
				$month_2 = '0'.$month_2;
				$nextmonth = $month_1.'-'.$month_2;
			}
	}
//	echo $expmdte.' : '.$cur_date.' : '.$nextmonth.' : '.$mdate;
//	exit;
	//if($chkmonth == $thismonth or $chkmonth == $nextmonth ){
	if($expmdte > $cur_date ){
		//-----เก็บคะแนนสูงสุดที่มีการซื้อ
		//$sql = "SELECT MAX(tot_pv) as pv from ".$dbprefix."asaleh WHERE mcode='$mcode' ";
		$sql = "SELECT SUM(tot_pv) as pv from ".$dbprefix."asaleh WHERE sa_type='A' and mcode='$mcode' and (sadate <= '$cur_date') and cancel=0 ";
		//echo $sql.'<br>';
		$rs = mysql_query($sql);
		$mexp = 0;
		if(mysql_num_rows($rs)>0) $mexp = mysql_result($rs,0,'pv');
		//mysql_free_result($rs);

		$sql = "SELECT SUM(tot_pv) as pv from ".$dbprefix."holdhead WHERE mcode='".$mcode."' and sa_type='A' and (sadate <= '$cur_date')  and cancel=0 ";
		$rs = mysql_query($sql);
		//echo $sql.'<br>';
		$mexph = 0;
		if(mysql_num_rows($rs)>0) $mexph = mysql_result($rs,0,'pv');
		mysql_free_result($rs);
		$mexp=($mexp+$mexph);
		//echo 'sss'.$mexp.'<br>';
	}else{
		$mexp = $tot_pv;
	}
//exit;
	//-----เก็บตำแหน่งปัจจุบัน
	//mysql_free_result($rs);
	//คำนวณตำแหน่ง
	$pos_new = $pos_old;
	foreach(array_keys($pos_exp) as $key){
		//echo $key;
		if($mexp>=$pos_exp[$key]){ $pos_new = $key; break;}
	}
	//echo $mexp.' : '.$mexph.' : '.$pos_old."=>".$pos_new;
	if($pos_new != $pos_old && $pos_piority[$pos_new]>$pos_piority[$pos_old]){
		$sql = "UPDATE ".$dbprefix."member SET pos_cur='$pos_new' WHERE mcode='$mcode' LIMIT 1 ";	
		mysql_query($sql);
		$sql = "INSERT INTO ".$dbprefix."poschange (mcode,pos_before,pos_after,date_change) ";
		$sql .= "VALUES('".$mcode."','".$pos_old."','".$pos_new."','".$cur_date."')";
		mysql_query($sql);

		$sql = "INSERT INTO ".$dbprefix."calc_poschange (rcode,mcode,pos_before,pos_after,date_change) ";
		$sql .= "VALUES('','".$mcode."','".$pos_old."','".$pos_new."','".$cur_date."')";
		//====================LOG===========================
		$text="uid=".$_SESSION["adminusercode"]." action=calcposition =>$sql";
		//writelogfile($text);
		//=================END LOG===========================
		mysql_query($sql);
		
	}

}
?>




