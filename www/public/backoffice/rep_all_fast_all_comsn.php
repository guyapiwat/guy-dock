<? include("./global.php");?>
<script language="javascript">
var win
function view(ro,code){
	var param = 'ftrcode=' + ro +'&fmcode='+code;
	var url = './print/rep_am_comsn.php?'+param;
	//window.location = wlink;
	if(win!=null) win.close();
	win = window.open(url,'','height=500 width=900 scrollbars=yes' );
}
function checkround(){
	if(document.getElementById("ftrcode").value!=""){
		var numCheck = document.getElementById("ftrcode").value;
		var numVal = numCheck.split("-");
		if(numVal.length>2){
			alert("กรุณากรอกรูปแบบรอบให้ถูกต้อง");
			return false;
		}
	}
	document.rform.submit();
}
function chknum(key){
	if((key>=48&&key<=57)||key==45)
		return true;
	else
		return false;
}
</script>
<?
require("connectmysql.php");
//require("./cls/repGenerator.php");
include("./cls/chartGenerator.php");

if($_GET["cmc"])$cmc = $_GET["cmc"];
else $cmc = $_SESSION["usercode"];

$chart = new chartGenerator();
	$chart->setMaxLevel($GLOBALS["numofleveltoshow"]);
	$chart->setNumChild($GLOBALS["numofchild"]);
	$chart->setLink("./index.php?sessiontab=2&sub=1&cmc=");
	$chart->setEmptyLink("index.php?sessiontab=1&sub=3&");
	//if(isset($_GET['cmc']) && $_GET['cmc']!="") $cmc=$_GET['cmc'];
	//else if(isset($_POST['cmc']) && $_GET['cmc']!="") $cmc=$_POST['cmc'];
	if($cmc=="")$cmc = $_SESSION['usercode'];
	$chart->setStartCode($cmc);
	$chart->setPrefix($dbprefix);
	$chart->setGoLrMost();
	$chart->setLrDef(array(1,2));
	$chart->setBlock($_SESSION['usercode']);
//	var_dump($cmc);
	//var_dump($chart->isUp($cmc,$_SESSION['usercode']));
	$cmc = gencode($cmc);
	if($chart->isUp($cmc,$_SESSION['usercode'])){
	//	echo "<table align='center' bgcolor='#990000'><tr><td><font color='#FFFFFF'>ไม่สามารถดูข้อมูลในระดับสูงกว่าได้</font></td></tr></table>";
	//	exit;
	}else if(!$chart->isLine($cmc,$_SESSION['usercode'])){
	//	echo "<table align='center' bgcolor='#990000'><tr><td><font color='#FFFFFF'>ไม่สามารถดูข้อมูลต่างสายงานได้</font></td></tr></table>";
	//	exit;
	}


mysql_query("delete from ".$dbprefix."report_point where mcode = '$cmc'");


 
	//	if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
	
			
		//$sql="select *,DATE_FORMAT(fdate, '%m-%Y') as monthpv from ".$dbprefix."bround a where calc = '1' order by rcode desc   ";
		$sql="select *,DATE_FORMAT(fdate, '%Y-%m') as monthpv from ".$dbprefix."bround a where 1=1 order by rcode desc   ";
		$result = mysql_query($sql);
		for($i=0;$i<mysql_num_rows($result);$i++){
			$carry_l = 0;$carry_c=0;$ro_l =0;$ro_c=0;$total_l=0;$total_c=0;$point1=0;
			//echo mysql_num_rows($result).' : ';
			//if($i < 2){
				$data = mysql_fetch_object($result);
				$fdate = $data->fdate;
				$tdate = $data->tdate;
				$monthpv = $data->monthpv;
				$expmdte1 = date('Y-m',subdate($fdate,'15')).'-16';
				//exit;
				$sql = "SELECT carry_l,carry_c ";
				$sql .= "FROM ".$dbprefix."bmbonus where mcode = '$cmc' and fdate = '$expmdte1' ";
				$rsbm = mysql_query($sql);
				if(mysql_num_rows($rsbm) > 0){
					$databm = mysql_fetch_object($rsbm);
					$carry_l = $databm->carry_l;
					$carry_c = $databm->carry_c;
				}

				$sql = "SELECT sum(ro_l) as ro_l,sum(ro_c) as ro_c,sum(pcrry_l)+sum(ro_l) as total_l,sum(point) as point1,sum(pcrry_c)+sum(ro_c) as total_c ";
				$sql .= "FROM ".$dbprefix."bmbonus where mcode = '$cmc' and fdate >= '$fdate' and tdate <= '$tdate' group by mcode ";
				///echo $sql.'<br>';
				$rsbm = mysql_query($sql);
				if(mysql_num_rows($rsbm) > 0){
					$databm = mysql_fetch_object($rsbm);
					$ro_l = $databm->ro_l;
					$ro_c = $databm->ro_c;
					//$total_l = $databm->total_l;
					//$total_c = $databm->total_c;
					$point = $databm->point1;
				}
				$total_l = $ro_l+$carry_l;
				$total_c = $ro_c+$carry_c;

				$sql = "SELECT SUM(tot_pv) as pv from ".$dbprefix."asaleh WHERE sa_type='A' and mcode='$cmc' and sadate between '$fdate' and '$tdate' and cancel=0 ";
				$rspv = mysql_query($sql);
				$mexpj = 0;
				if(mysql_num_rows($rspv)>0) $mexpj = mysql_result($rspv,0,'pv');

				$sql = "SELECT SUM(tot_pv) as pv from ".$dbprefix."holdhead WHERE mcode='".$cmc."' and sa_type='A' and sadate between '$fdate' and '$tdate' and cancel=0 ";
				$rspv = mysql_query($sql);
				$mexph = 0;
				if(mysql_num_rows($rspv)>0) $mexph = mysql_result($rspv,0,'pv');
				mysql_free_result($rspv);
				$mexpj=($mexpj+$mexph);

				$sql = "SELECT *,DATE_FORMAT(mdate, '%Y-%m') as mdate1 from ".$dbprefix."member WHERE mcode='".$cmc."' ";
				$rspv = mysql_query($sql);
				$count_new = 0;$count_sup=0;$count_ex=0;
				if(mysql_num_rows($rspv)>0) {
					$name_t = mysql_result($rspv,0,'name_f').' '.mysql_result($rspv,0,'name_t');
					//$pos_cur2 = mysql_result($rspv,0,'pos_cur2');
					$mdate = mysql_result($rspv,0,'mdate1').'-01';
				}

				$sql = "SELECT * from ".$dbprefix."calc_poschange2 WHERE mcode='".$cmc."' and date_change between '$fdate' and '$tdate' order by id desc  ";
				$rspv = mysql_query($sql);
				$count_new = 0;$count_sup=0;$count_su=0;$count_ex=0;$count_sup_ex=0;
				if(mysql_num_rows($rspv)>0) {
					$pos_cur2 = mysql_result($rspv,0,'pos_after');
				}

				$sql = "SELECT *  from ".$dbprefix."member WHERE sp_code='".$cmc."' and mdate between '$fdate' and '$tdate' ";
				//echo $sql.'<br>';
				$count_new = 0;$count_sup=0;$count_ex=0;$count_sup_ex=0;
				$rspv = mysql_query($sql);
				//echo mysql_num_rows($rspv);
				for($jddj=0;$jddj<mysql_num_rows($rspv);$jddj++){
					
					$dataddd = mysql_fetch_object($rspv);		
					$count_new = $count_new+1;
					$chk_pos = $dataddd->pos_cur;
				}

				$sql = "SELECT *  from ".$dbprefix."member WHERE sp_code='".$cmc."' ";
				$rspv = mysql_query($sql);
				for($sssj=0;$sssj<mysql_num_rows($rspv);$sssj++){
					$ccmcode = mysql_result($rspv,$sssj,'mcode');
					
					$sql = "SELECT *  from ".$dbprefix."calc_poschange WHERE mcode='".$ccmcode."' and date_change  between '$fdate' and '$tdate' and pos_before = 'MB' and pos_after = 'SU' ";
					$crspv = mysql_query($sql);
					if(mysql_num_rows($crspv) > 0)$count_su = $count_su+1;

					$sql = "SELECT *  from ".$dbprefix."calc_poschange WHERE mcode='".$ccmcode."' and date_change  between '$fdate' and '$tdate' and pos_before = 'MB' and pos_after = 'EX' ";
					$crspv = mysql_query($sql);
					if(mysql_num_rows($crspv) > 0)$count_ex = $count_ex+1;

					$sql = "SELECT *  from ".$dbprefix."calc_poschange WHERE mcode='".$ccmcode."' and date_change  between '$fdate' and '$tdate' and pos_before = 'SU' and pos_after = 'EX' ";
					$crspv = mysql_query($sql);
					if(mysql_num_rows($crspv) > 0)$count_sup_ex = $count_sup_ex+1;



					//if($chk_pos == 'SU')$count_su = $count_su+1;
					//if($chk_pos == 'EX')$count_ex = $count_ex+1;
				}

				if($mdate <= $fdate ){
					if($mexpj >= 750 and ($count_ex >0 or $count_su>0)){
						if($total_l > $total_c)$total_weak =$total_c;
						else $total_weak =$total_l;
						$travelpoint = $total_weak/1500;
					}else $travelpoint = 0;
					mysql_query("insert into  ".$dbprefix."report_point values('$cmc','$name_t','$point','$monthpv','$carry_l','$carry_c','$ro_l','$ro_c','$total_l','$total_c','$mexpj','$pos_cur2','$count_new','$count_su','$count_ex','$count_sup_ex','$travelpoint')");
					mysql_query("delete from  ".$dbprefix."report_point  where monthpv = '".date("Y-m")."' ");
				}
			//}

		}

		$sql = "SELECT * ";
		$sql .= "FROM ".$dbprefix."report_point where mcode = '$cmc' ";
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
		$rec->setOrder($_GET['ord']==""?" monthpv ":$_GET['ord']);
		$rec->setLimitPage($_GET['lp']);
		$rec->setSize("100%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=5&sub=117&ftrcode=$ftrcode&strfdate=$strfdate&strtdate=$strtdate&fmcode=$cmc");
		$rec->setBackLink($PHP_SELF,"sessiontab=5");
		if(isset($page))
			$rec->setCurPage($page);
		//$rec->setShowField("fdate,mcode,name_t,ro_l,ro_c,pcrry_l,pcrry_c,pcrry_ll,pcrry_cc,carry_l,carry_c,jub,total,adjust");
		//$rec->setFieldDesc("".$wording_lan["Date"].",".$wording_lan["mcode"].",".$wording_lan["name"].",".$wording_lan["NewLeft"].",".$wording_lan["NewRight"].",".$wording_lan["OldLeft"].",".$wording_lan["OldRight"].",".$wording_lan["TotalLeft"].",".$wording_lan["TotalRight"].",".$wording_lan["LessLeft"].",".$wording_lan["LessRight"].",".$wording_lan["jub"].",".$wording_lan["Bonus"].",".$wording_lan["adjust"]."");

		$rec->setShowField("mcode,name_t,monthpv,carry_l,carry_c,ro_l,ro_c,all_l,all_c,point,allpv,pos_cur,new_sponsor,new_sup,new_ex,sup_ex,travelpoint");
		$rec->setFieldDesc("รหัสสมาชิก,ชื่อ-สกุล,เดือน,PV ซ้ายยกมา,PV ขวายกมา,PV ซ้ายใหม่,PV ขวาใหม่,PV ซ้ายรวม,PV ขวารวม,Cycle,PV ส่วนตัว,ตำแหน่ง<br>Matching,New Sponser<br>ในเดือน,Mem ไป Sup,Mem ไป Ex,Sup ไป Ex,TP");
		$rec->setFieldAlign("center,left,center,right,right,right,right,right,right,center,right,center,center,center,center,center,center");
		$rec->setFieldSpace("5%,12%,4%,5%,5%,5%,5%,5%,5%,3%,5%,5%,5%,5%,5%,5%,5%,5%");//10
		//$rec->setSum(true,false,",,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true");
		$rec->setFieldFloatFormat(",,,0,0,0,0,0,0,0,0");
		//$rec->setSum(true,false,",,,true,true,true,true,true,true,true,true,true,true,true,true,true");
		//$rec->setFieldLink(",,index.php?sessiontab=5&sub=2&lr=1&strfdate=$strfdate&strtdate=$strtdate&fdate=,index.php?sessiontab=5&sub=2&lr=2&strfdate=$strfdate&strtdate=$strtdate&fdate=");
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);

function subdate($startdate,$datenum){
 $startdatec=strtotime($startdate); // ทำให้ข้อความเป็นวินาที
 $tod=$datenum*86400; // รับจำนวนวันมาคูณกับวินาทีต่อวัน
 $ndate=$startdatec-$tod; // นับบวกไปอีกตามจำนวนวันที่รับมา
 return $ndate; // ส่งค่ากลับ
}
?>

