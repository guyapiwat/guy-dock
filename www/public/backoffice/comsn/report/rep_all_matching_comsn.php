<?
include("rpdialog.php");
$fmcode = $_POST['fmcode']==""?$_GET['fmcode']:$_POST['fmcode'];
$fdate = $_POST['fdate']==""?$_GET['fdate']:$_POST['fdate'];
$tdate = $_POST['tdate']==""?$_GET['tdate']:$_POST['tdate'];
$type_report = $_POST['type_report']==""?$_GET['type_report']:$_POST['type_report'];
$bonus = $_POST['bonus']==""?$_GET['bonus']:$_POST['bonus'];

if(empty($fdate))$fdate = date("Y-m-d");
if(empty($tdate))$tdate = date("Y-m-d");
$strfdate = $fdate;
$strtdate = $tdate;

if (strpos($bonus,"-")===false){
		$arr_bonus[0]=$bonus;
		$arr_bonus[1]=$bonus;
}else{
	$arr_bonus = explode('-',$bonus);
}

if($arr_bonus[0] > $arr_bonus[1]){ 
  echo "<center><FONT COLOR=#ff0000>กรุณากรอกช่วงร่ายได้ให้ถูก เช่น 0-500</FONT></center>";
}

if($fdate!=""){
	$sql="select min(rcode) as fdate1,max(rcode) as tdate1 from ".$dbprefix."around a where a.fdate >= '".$fdate."' and a.tdate <= '".$tdate."' ";
	$result=mysql_query($sql);
	if (mysql_num_rows($result)>'0') {
		$row= mysql_fetch_array($result, MYSQL_ASSOC);
		$ftrc2[0]=$row["fdate1"];
		$ftrc2[1]=$row["tdate1"];	
	}
}

$ftrcode = $_POST['ftrcode']==""?$_GET['ftrcode']:$_POST['ftrcode'];
$ftrcode2 = $_POST['ftrcode2']==""?$_GET['ftrcode2']:$_POST['ftrcode2'];
$vip = $_POST['vip']==""?$_GET['vip']:$_POST['vip'];
if (strpos($ftrcode,"-")===false){
		//รอบเริ่มต้น == รอบสิ้นสุด
		$ftrc[0]=$ftrcode;
		$ftrc[1]=$ftrcode;
}else{
	$ftrc = explode('-',$ftrcode);
}

rpdialog_alls($_GET['sub'],$fdate,$tdate);


		require("connectmysql.php");
		//require("./cls/repGenerator.php");
		if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
		if($strfdate!=""&&$strtdate!=""&&$fmcode!=""){
			$whereclass = " AND fdate>= '$strfdate' and tdate<= '$strtdate' and mcode='".$fmcode."' and total > 0";
			$whereclassg = " AND fdate>= '$strfdate' and tdate<= '$strtdate' and mcode='".$fmcode."' and autoship > 0";
		}else if($strfdate!=""&&$strtdate!=""){
			$whereclass = " AND fdate>= '$strfdate' and tdate<= '$strtdate' and total > 0 ";
			$whereclassg = " AND fdate>= '$strfdate' and tdate<= '$strtdate' and autoship > 0 ";
			$whereclass1 = " AND fdate>= '$strfdate' and tdate<= '$strtdate' and (total > 0 or total_r > 0) ";
		}else if($fmcode!=""){
			$whereclass = " AND m.mcode='".$fmcode."' and total > 0 ";
			$whereclassg = " AND m.mcode='".$fmcode."' and autoship > 0 ";
		}

		$whereclassxx = " AND sadate >= '$strfdate' and sadate<= '$strtdate' ";

	/*	$sql = "SELECT *,aa.total_fast+aa.total_team as total from (select concat('".$ftrc[0]."','-','".$ftrc[1]."') as rcode,'".$strtdate."' as tdate,'".$strfdate."' as fdate,m.mcode,m.name_t,m.mobile,
		(SELECT ifnull(sum(total),0) from ".$dbprefix."ambonus a where a.mcode=m.mcode ".$whereclass." ) as total_fast, 
		(SELECT ifnull(sum(total),0) from ".$dbprefix."bmbonus b where b.mcode=m.mcode  ".$whereclass." ) as total_team
		from ".$dbprefix."member m where m.pos_cur <> 'NM' and m.pos_cur2 <> 'NM' and m.status_terminate = '0' ";
		//$sql .= " LEFT JOIN ".$dbprefix."location_base lb ON lb.cid=m.locationbase ) as aa where aa.total_fast > 0 or aa.total_team>0 ";
		$sql .= " ) as aa where aa.total_fast > 0 or aa.total_team>0 ";
*/
		$sql = "select m.name_t,sum(fast_bonus+cycle_bonus+matching_bonus+register_bonus)-sum(fast_bonus2) as amount,sum(autoship_bonus) as autoship,sum(fast_bonus+cycle_bonus+matching_bonus+register_bonus) as total,sum(fast_bonus) as total_fast,sum(fast_bonus2) as total_fast2,sum(cycle_bonus) as total_cycle,sum(sale_bonus) as sale_bonus,sum(register_bonus) as register_bonus,sum(matching_bonus) as matching_bonus,'".$strfdate."' as fdate,'".$strtdate."' as tdate,a.rcode,a.mcode from (";
		$sql .= "select mcode,'' as name_t,total as fast_bonus,'0' as fast_bonus2,'0' as cycle_bonus,'0' as matching_bonus,'0' as autoship_bonus,'0' as sale_bonus,'0' as register_bonus,rcode from ".$dbprefix."ambonus where 1=1 $whereclass ";
		$sql .= " UNION  ALL ";
		$sql .= "select mcode,'' as name_t,'0' as fast_bonus,'0' as fast_bonus2,total as cycle_bonus,'0' as matching_bonus,'0' as autoship_bonus,'0' as sale_bonus,'0' as register_bonus,rcode from ".$dbprefix."bmbonus where 1=1 $whereclass ";
		$sql .= "  UNION  ALL ";
		$sql .= "select mcode,'' as name_t,'0' as fast_bonus,'0' as fast_bonus2,'0' as cycle_bonus,total as matching_bonus,'0' as autoship_bonus,'0' as sale_bonus,'0' as register_bonus,rcode from ".$dbprefix."mmbonus where 1=1 $whereclass ";

		$sql .= "  UNION  ALL ";
		$sql .= "select mcode,'' as name_t,'0' as fast_bonus,total as fast_bonus2,'0' as cycle_bonus,'0' as matching_bonus,'0' as autoship_bonus,'0' as sale_bonus,'0' as register_bonus,rcode from ".$dbprefix."voucher where 1=1 $whereclassxx ";
		$sql .= " ) as a left join ".$dbprefix."member as m on (a.mcode=m.mcode) where 1 group by a.mcode ";
		//echo $sql;
	//echo $sql;
		$rec = new repGenerator_b();
		$rec->setQuery($sql);
		$rec->setSort(($_GET['srt']==""?"DOWN":$_GET['srt']));
		$rec->setOrder(($_GET['ord']==""?" a.mcode ":$_GET['ord']));
		$rec->setLimitPage("5000");
		$rec->setSize("100%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		$rec->setLink($PHP_SELF,"sessiontab=4&sub=101&ftrcode=$ftrcode&strfdate=$strfdate&strtdate=$strtdate&fmcode=$fmcode");
		$rec->setBackLink($PHP_SELF,"sessiontab=4");

		if(isset($page))
			$rec->setCurPage($page);
		//$rec->setShowIndex(true);
		$rec->setShowField("fdate,tdate,mcode,name_t,total_fast,total_cycle,matching_bonus,total,total_fast2,amount");
		$rec->setFieldFloatFormat(",,,,2,2,2,2,2,2,");
		$rec->setFieldDesc("ตั้งแต่วันที่,ถึงวันที่,รหัส,ชื่อ,ค่าแนะนำ,จับคู่,Unilvel,รายได้รวม,หัก Autoship,สุทธิ");
		$rec->setFieldAlign("center,center,center,left,right,right,right,right,right,right,right");
		//$rec->setFieldSpace("7%,7%,7%,20%,10%,10%,10%,10%,10%,10%,10%,10%");
		$rec->setSum(true,false,",,,,true,true,true,true,true,true,");
		//$rec->setFieldLink("");
		if($_GET['excel']==1){
			$rec->exportXls("ExportXls","allbonus".date("Ymd").".xls","SH_QUERY");
			$str = "<fieldset><a href='".$rec->download("ExportXls","allbonus".date("Ymd").".xls")."' >";
			$str .= "<img border='0' src='./images/download.gif'>โหลด Excel</a></fieldset>";
			//$rec->getParam();
			$rec->setSpace($str);
		}

//$rec->setFieldLink(",,,,index.php?sessiontab=4&sub=4&ftrcode=$ftrcode&strtdate=$strtdate&fmcode=$fmcode&strfdate=,index.php?sessiontab=4&sub=402&tdate=$tdate&fdate=,index.php?sessiontab=4&sub=9&ftrcode=$ftrcode&strtdate=$strtdate&fmcode=$fmcode&strfdate=,index.php?sessiontab=4&sub=6&ftrcode=$ftrcode&strtdate=$strtdate&fmcode=$fmcode&strfdate=");

		$str = "<fieldset><a href='".$rec->getParam()."&excel=1' target='_self'>";
		$str .= "<img border='0' src='./images/excel.gif'>สร้าง Excel</a></fieldset>";
		
		$rec->setSpace($str);
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);
?>