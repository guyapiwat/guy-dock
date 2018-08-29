<script language="javascript" type="text/javascript">
function ecom_to_ewallet(id,pay){
	if(pay == 1){
		alert("รายการนี้ได้ทำการโอนเรียบร้อยแล้วค่ะ");
		exit;
	}
	else{
		if(confirm("Re Confirm?")){  
		    window.location='commission_pay.php?id='+id+'&com=a';   
		} 
	}
    //if(confirm("Re Confirm?")){  
    //    window.location='commission_pay.php?id='+id+'&com=a';   
    //} 
 
}
</script>
<?
include("rpdialog.php");
$fmcode = $_POST['fmcode']==""?$_GET['fmcode']:$_POST['fmcode'];
$fdate = $_POST['fdate']==""?$_GET['fdate']:$_POST['fdate'];
$tdate = $_POST['tdate']==""?$_GET['tdate']:$_POST['tdate'];
$type_report = $_POST['type_report']==""?$_GET['type_report']:$_POST['type_report'];
$bonus = $_POST['bonus']==""?$_GET['bonus']:$_POST['bonus'];
$s_list = $_POST['s_list']==""?$_GET['s_list']:$_POST['s_list'];
$status = $_POST['status']==""?$_GET['status']:$_POST['status'];
$bonus = str_replace(",","",$bonus);

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
if($ftrcode!=""){
	$sql="select fdate,tdate from ".$dbprefix."around a where a.rcode ='$ftrcode' ";
	$result=mysql_query($sql);
	if (mysql_num_rows($result)>'0') {
		$row= mysql_fetch_array($result, MYSQL_ASSOC);
		$fdate=$fdate11=$row["fdate"];
		$tdate=$tdate11=$row["tdate"];	
	}
}
rpdialog_alls_ab($_GET['sub'],$fdate,$tdate,$fmcode,$bonus,$status,$s_list);

require("connectmysql.php");

if($fdate != '')$wwhere .= " and fdate >= '".$fdate."'  and tdate <= '".$tdate."' ";
if($fmcode != '')$wwhere .= " and mcode = '".$fmcode."'  ";
//if($bonus != '')$wwhere = " and total >= ".$arr_bonus[0]." and  and total <= ".$arr_bonus[1]." ";
 
		if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";} 
		$sql  = "select * from (SELECT '".$fdate."' as fdate,'".$tdate."' as tdate,a.mcode,m.name_t,m.pos_cur,SUM(a.ambonus) as ambonus,SUM(a.bmbonus) as bmbonus,SUM(a.dmbonus) as dmbonus,SUM(a.embonus) as embonus
		,SUM(a.ambonus+a.bmbonus+a.dmbonus+a.embonus) as total";
		$sql .= ",CASE WHEN (m.status_terminate = '1' and m.status_suspend = '1') THEN 'SP+TN' WHEN m.status_terminate = '1' THEN 'TN' WHEN m.status_suspend = '1' THEN 'SP' ELSE 'ปกติ'  END AS status ";
		$sql .= " FROM (";
		$sql .= "SELECT mcode,SUM(ambonus) as ambonus,SUM(bmbonus) as bmbonus,0 as dmbonus,0 as embonus"; 
		$sql .= " FROM ".$dbprefix."commission  ";
		$sql .= " WHERE 1=1 $wwhere  GROUP BY mcode ";
		$sql .= " UNION ALL SELECT mcode,0 as ambonus,0 as bmbonus,SUM(dmbonus) as dmbonus,SUM(embonus) as embonus"; 
		$sql .= " FROM ".$dbprefix."commission_b  ";
		$sql .= " WHERE 1=1 $wwhere GROUP BY mcode ";
		$sql .= " ) a  LEFT JOIN ali_member m on (a.mcode=m.mcode) where 1=1 ";
		if($status != ''){
			if($status == '1'){
				$sql .= " and m.status_terminate = 0 and m.status_suspend = 0";
			}
			if($status == 'TN'){
				$sql .= " and m.status_terminate = 1 and m.status_suspend = 0";
			}
			if($status == 'SP'){
				$sql .= " and m.status_terminate = 0 and m.status_suspend = 1";
			}
			if($status == 'ST'){
				$sql .= " and m.status_terminate = 1 and m.status_suspend = 1";
			}
		}
		$sql .= " group by mcode ";
		$sql .= " HAVING total > 0 ";
		if($bonus != '')$sql .= " and total >= ".$arr_bonus[0]." and  total <= ".$arr_bonus[1]." ";
		$sql .= " ) as b ";
		//LEFT JOIN ali_member m on (a.mcode=m.mcode) ";$sql .= " GROUP BY a.mcode 
		
		//echo $sql;
		//echo $arr_bonus[0];
		/* if($fmcode != '' )$sql .= " and a.mcode = '".$fmcode."' ";
		if($_POST['bonus'] != '' )$sql .= " and a.total between '".$arr_bonus[0]."' and '".$arr_bonus[1]."' ";
		$sql .= "  and a.total > 0 "; */
		//echo $sql;
 if($fdate!=""){
		//echo $sql;
		$rec = new repGenerator_b();
		$rec->setQuery($sql);
		$rec->setSort(($_GET['srt']==""?"UP":$_GET['srt']));
		$rec->setOrder(($_GET['ord']==""?"mcode":$_GET['ord']));
		if($_GET['excel']==1){$rec->setLimitPage("ALL");}
		else{$rec->setLimitPage($s_list);}		
	    //$rec->setLimitPage("ALL");
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		$rec->setLink($PHP_SELF,"sessiontab=".$sesstab."&sub=".$_GET["sub"]."&ftrcode=$ftrcode&ftrcode2=$ftrcode2&fdate=$fdate&tdate=$tdate&strfdate=$strfdate&strtdate=$strtdate&fmcode=$fmcode&bonus=$bonus&type_report=$type_report");
		$rec->setBackLink($PHP_SELF,"sessiontab=4");
		if(isset($page))
			$rec->setCurPage($page);
		//$rec->setShowIndex(true);
		$rec->setShowField("fdate,tdate,mcode,name_t,ambonus,bmbonus,dmbonus,embonus,total,status");
		$rec->setFieldDesc("วันเริ่มต้น,วันสิ้นสุด,รหัสมาชิก,ชื่อ,Fast,W/S,Matching,AllSale,Total,สถานะ");
		$rec->setFieldAlign("center,center,center,left,right,right,right,right,right,center,center");
		//$rec->setFieldSpace("5%,7%,7%,26%,10%,10%,10%,10%,15%");//10
		$rec->setSum(true,false,",,,,true,true,true,true,true");
		$rec->setFieldFloatFormat(",,,,2,2,2,2,2");
		//$rec->setFieldLink(",,,,,index.php?sessiontab=4&sub=4&strfdate=,index.php?sessiontab=4&sub=9&strfdate=");
		$rec->setHLight("pay",1,array("#A0ED85","#6FD438"),"HIDE");  
		if($_GET['excel']==1){
			$rec->exportXls("ExportXls","ambonus".date("Ymd").".xls","SH_QUERY");
			$str = "<fieldset><a href='".$rec->download("ExportXls","ambonus".date("Ymd").".xls")."' >";
			$str .= "<img border='0' src='./images/download.gif'>โหลด Excel</a></fieldset>";
			$rec->getParam();
			$rec->setSpace($str);
		}
		$str = "<fieldset><a href='".$rec->getParam()."&excel=1' target='_self'>";
		$str .= "<img border='0' src='./images/excel.gif'>สร้าง Excel</a></fieldset>";
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		//$rec->setSpecial("./images/hold_s.gif","","ecom_to_ewallet","id,pay","IMAGE","จ่าย");
		//$rec->setSearch("a.mcode,lb.cshort");
		//$rec->setSearchDesc("รหัส,LB");
		$rec->setSpace($str);
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);

 }
?>