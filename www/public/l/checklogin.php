<?
if (isset($_SESSION["usercode"])) {$usercode=$_SESSION["usercode"];} 
else {$usercode="";$_SESSION["usercode"]=$usercode;};
if (isset($_SESSION["username"])) {$username=$_SESSION["username"];} 
else {$username="";$_SESSION["username"]=$username;};
if (isset($_SESSION["password"])) {$password=$_SESSION["password"];} 
else {$password="";$_SESSION["password"]=$password;};
//$usercode = strtoupper($usercode);
//echo $usercode;
//exit;

require_once 'connectmysql.php';

function date_exp($startdate,$datenum){
 $startdatec=strtotime($startdate); 
 $tod=$datenum*86400; 
 $ndate=$startdatec+$tod; 
 return $ndate; 
}
 
function date_difff($str_start, $str_end) {
	$str_start = strtotime($str_start);
	$str_end = strtotime($str_end);
	$nseconds = $str_end - $str_start; 
	$ndays = round($nseconds / 86400);
	return $ndays;
}

function date_thai($strDate){
	$strYear = date("Y",strtotime($strDate))+543;
	$strMonth= date("n",strtotime($strDate));
	$strDay= date("j",strtotime($strDate));
	$strHour= date("H",strtotime($strDate));
	$strMinute= date("i",strtotime($strDate));
	$strSeconds= date("s",strtotime($strDate));
	$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
	$strMonthThai=$strMonthCut[$strMonth];
	return "$strDay $strMonthThai $strYear";
}


if(empty($_SESSION["m_locationbase"])){
	$_SESSION["usercode"] = "";
	include "login.php";
	include "footer.php";
	exit;
}
//include("securimage.php");
//คำนวณรอบ
	$sql = "select  DATE_FORMAT(max(calc_date)- INTERVAL 1
DAY, '%d-%m-%Y') as fdate from ali_around where calc = 1";
	$rs = mysql_query($sql);
	$_SESSION["fdate_show"]= mysql_result($rs,0,'fdate'); 
	mysql_free_result($rs);
  if($_SESSION["usercode"]) {
		$sql = "SELECT sv_code,id,mcode,ewallet,voucher,locationbase,name_t,mtype1 FROM ".$dbprefix."member " ;
		$sql.= "where  mcode = '".$usercode."'  and status_suspend = '0'";
		$result=mysql_query($sql);
		if (mysql_num_rows($result)>0) {
			$row = mysql_fetch_array($result, MYSQL_ASSOC);
			$cl_sv_code=$row["sv_code"];
			$cl_id=$row["id"];
			$cl_mcode=$row["mcode"];
			$ewallet=$row["ewallet"];
			$showewallet1=$row["ewallet"];
			$showvoucher1=$row["voucher"];
			$_SESSION["m_locationbase"] = $row["locationbase"];
			$_SESSION["m_mtype1"] = $row["mtype1"];
			$_SESSION["evwallet1"] = $row["voucher"];
			$_SESSION["uid"]= $row["id"];
			$sql = "SELECT * from ".$dbprefix."structure_binary WHERE mcode_ref = '".$cl_mcode."' "; 
			$rs123 = mysql_query($sql);
			if(mysql_num_rows($rs123)>0){
				$_SESSION["mcode_index"] =mysql_result($rs123,0,'mcode_index');
				$_SESSION["mcode_level"] =mysql_result($rs123,0,'level');
			}

			$sql = "SELECT * from ".$dbprefix."structure_sponsor WHERE mcode_ref = '".$cl_mcode."' "; 
			$rs123 = mysql_query($sql);
			if(mysql_num_rows($rs123)>0){
				$_SESSION["smcode_index"] =mysql_result($rs123,0,'mcode_index');
				$_SESSION["smcode_level"] =mysql_result($rs123,0,'level');
			}
			
			
			///////////////////////////////

			//$sql = "SELECT member_active from ".$dbprefix."member WHERE mcode = '$cl_mcode' order by id desc limit 0 ,1 ";
			//echo $sql;
			//$rs123 = mysql_query($sql);
			//if(mysql_num_rows($rs123)>0){
			//	$member_active_online =mysql_result($rs123,0,'member_active');
			//} 

			$fdate = date("Y-m-d");			
			$cfdate = explode('-',date("Y-m-d"));
			$cfdate[0] = $cfdate[0]-1;
			$cfdate1 = $cfdate[0].'-'.$cfdate[1].'-'.$cfdate[2];

			$sql = "SELECT sadate from ".$dbprefix."asaleh WHERE mcode='".$cl_mcode."' and cancel=0 and trnf = 0  and sadate between '$cfdate1' and '$fdate' and ( sa_type='A' or sa_type='Q' or sa_type='B' or sa_type='C') order by id DESC limit 0,1";
			$rs = mysql_query($sql);

			$mexp = 0;
			if(mysql_num_rows($rs)>0)  $date_sale  = mysql_result($rs,0,'sadate');
			mysql_free_result($rs);


			$sql = "SELECT sadate from ".$dbprefix."holdhead WHERE mcode='".$cl_mcode."'  and sadate between '$cfdate1' and '$fdate' and ( sa_type='A' or sa_type='Q' or sa_type='B' or sa_type='C') and cancel=0 order by id DESC limit 0,1";
			$rs = mysql_query($sql);

			$mexph = 0;
			if(mysql_num_rows($rs)>0)$date_hold = mysql_result($rs,0,'sadate');
			mysql_free_result($rs);

			$member_active = max($member_active_online,$date_sale,$date_hold);
			$member_active_online = date_thai($member_active);
			
			$dr=date_exp($member_active,365); 
			$df=date("Y-m-d",$dr); 

			$dff=date_difff($member_active,date("Y-m-d")); 
			$member_active = 365-$dff;
			


			if($_SESSION["m_locationbase"]){
			

			$sql = "SELECT * from ".$dbprefix."location_base WHERE cid = '".$_SESSION["m_locationbase"]."' ";
				$rs123 = mysql_query($sql);
				if(mysql_num_rows($rs123)>0){
					$arr_locationbase = array();
					$_SESSION["m_cname"] =mysql_result($rs123,0,'cname');
					$_SESSION["m_cshort"] = mysql_result($rs123,0,'cshort');
					$_SESSION["m_crate"] = mysql_result($rs123,0,'crate');
					$timediff = mysql_result($rs123,0,'timediff');	
					$_SESSION["datetimezone"] = date("Y-m-d", mktime(date("H"), date("i")+0, date("s")+$timediff, date("m")+0 , date("d")+0, date("Y")+0));
					$_SESSION["datetimezone_F"] = date("F", mktime(date("H"), date("i")+0, date("s")+$timediff, date("m")+0 , date("d")+0, date("Y")+0));
					$_SESSION["datetimezone_Ym"] = date("Y-m", mktime(date("H"), date("i")+0, date("s")+$timediff, date("m")+0 , date("d")+0, date("Y")+0));
					$_SESSION["datetimezone_time"] = date("H:i:s", mktime(date("H"), date("i")+0, date("s")+$timediff, date("m")+0 , date("d")+0, date("Y")+0));
					//$_SESSION["datetimezone_last"] = date("Y-m-t", mktime(date("H"), date("i")+0, date("s")+$timediff, date("m")+0 , date("d")+0, date("Y")+0));
					$_SESSION["datetimezone_nmonth"] = date("Y-m-15", mktime(date("H"), date("i")+0, date("s")+$timediff, date("m")+1 , date("d")+0, date("Y")+0));
		
				}
			}

			$d = new DateTime($_SESSION["datetimezone"]);
			$d->modify( 'last day of next month' ); 
			$_SESSION["datetimezone_last"] = $d->format( 'Y-m-d' );

			//echo $showewallet;
			/*if($cl_exp_date < -90){
				echo "<center><font color=#ff000 size=5>ขออภัย รหัสสมาชิกนี้ได้หมดอายุสมาชิกมาแล้ว 90 วัน กรุณาติดต่อเจ้าหน้าที่ </font></center>";
				$_SESSION["usercode"]=""; 
				$_SESSION["username"]="";
				$_SESSION["password"]="";
				$_SESSION["ewallet"]="";
				include "login.php";
				include "footer.php";
				exit;
			}*/
			//var_dump($ewallet);
			$_SESSION["name_t"]=$row["name_t"];
			
			if (!($_SESSION["usercode"] == $cl_mcode and $_SESSION["password"] == $cl_sv_code and $cl_sv_code <> "" )) {
				/*if (! headers_sent()) {
					header ("Location: login.php");
				}*/
				include "login.php";
				include "footer.php";
				exit;
			}
		}
		else {
				/*if (! headers_sent()) {
					header ("Location: login.php");
				}*/
				include "login.php";
				include "footer.php";
				exit;
		}
  }else {
				include "login.php";
				include "footer.php";
				exit;
  }

?>













