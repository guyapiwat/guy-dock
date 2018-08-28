<?
include("rpdialog.php");
$fmcode = $_POST['fmcode']==""?$_GET['fmcode']:$_POST['fmcode'];
$fdate = $_POST['fdate']==""?$_GET['fdate']:$_POST['fdate'];
$tdate = $_POST['tdate']==""?$_GET['tdate']:$_POST['tdate'];
$type_report = $_POST['type_report']==""?$_GET['type_report']:$_POST['type_report'];
$type_report1 = $_POST['type_report1']==""?$_GET['type_report1']:$_POST['type_report1'];
$bonus = $_POST['bonus']==""?$_GET['bonus']:$_POST['bonus'];


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
	$sql="select min(rcode) as fdate1,max(rcode) as tdate1 from ".$dbprefix."bround a where a.fdate >= '".$fdate."' and a.tdate <= '".$tdate."' ";
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
$bankcode = $_POST['bankcode']==""?$_GET['bankcode']:$_POST['bankcode'];
if (strpos($ftrcode,"-")===false){
		//รอบเริ่มต้น == รอบสิ้นสุด
		$ftrc[0]=$ftrcode;
		$ftrc[1]=$ftrcode;
}else{
	$ftrc = explode('-',$ftrcode);
}
if($fdate!=""){
	$sql="select min(fdate) as fdate,max(tdate) as tdate from ".$dbprefix."bround a where a. between '$fdate' and '$tdate' ";
	$result=mysql_query($sql);
	if (@mysql_num_rows($result)>'0') {
		$row= mysql_fetch_array($result, MYSQL_ASSOC);
		 $fdate11=$row["fdate"];
		 $tdate11=$row["tdate"];	
	}
}
require("connectmysql.php");
rpdialog_alls_pay_bank($_GET['sub'],$fdate,$tdate);

$wwhere = ($fdate[0]=="" ? " a.rcode between '".$ftrc[0]."' and '".$ftrc[1]."' " : " a.fdate >= '".$fdate."' and a.tdate <= '".$tdate."' ");
$wwhere1 = " a.total between '".$arr_bonus[0]."' and '".$arr_bonus[1]."' ";

if($fdate != '' and  $type_report1 == 1 ){
		if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
		if($_GET['state']==1){
		include("comsn/com_c/rep_change.php");
		}
		$sql = "SELECT *,@num := @num + 1 b FROM (SELECT a.fdate,a.tdate,a.paydate,a.rv_am,a.rv_bm,a.key_special,a.salary,a.stockist,a.rv_am+a.rv_bm+a.key_special+a.pv+a.salary+a.smb+a.stockist+a.onetime as thiscom,a.smb,a.bankcode,30 as transfer11";
		$sql .= ",a.id,a.rcode,a.mcode,m.name_t,a.pv,a.pvb,a.total,a.tot_tax as tax  ";
		$sql .= ",CASE a.status WHEN '1' THEN 'จ่าย' WHEN '0' THEN 'ไม่จ่าย'  END AS status
		,m.cmp,m.cmp2,m.acc_name,m.acc_no,m.branch,m.mobile,b.bankname
		";
		$sql .= ",CASE a.status WHEN '1' THEN a.rv_am+a.rv_bm+a.key_special+a.pv+a.salary+a.smb+a.stockist+a.onetime+a.key_register-a.tot_tax WHEN '0' THEN '0'  END AS total_real ";
		$sql .= ",CASE a.status WHEN '1' THEN a.rv_am+a.rv_bm+a.key_special+a.pv+a.salary+a.smb+a.stockist+a.onetime+a.key_register-a.tot_tax-30 WHEN '0' THEN '0'  END AS ttttt ";
		$sql .= "FROM ".$dbprefix."cmbonus_b a ";
 		
		//if($type_report == '2' or $type_report == '3' or $type_report == '4' or $type_report == '5')
		$sql .= " LEFT JOIN ".$dbprefix."member m ON a.mcode=m.mcode ";
	    $sql .= " LEFT JOIN ".$dbprefix."bank b ON (b.bankcode=m.bankcode)";
		
		$sql .= " WHERE $wwhere and a.status = 1";
		if($fmcode != '' )$sql .= " and a.mcode = ".$fmcode."";
		if($_POST['bonus'] != '' )$sql .= " and a.total between '".$arr_bonus[0]."' and '".$arr_bonus[1]."' ";
 		if($type_report1 == 1 )$sql .= " and a.status = '1' ";
		if($type_report1 == 2 )$sql .= " and a.status = '0' ";
		if($bankcode != '' )$sql .= " and b.bankcode = ".$bankcode."";

		$sql .= " ) as ddd,(SELECT @num := 0) d where 1=1 " ;
		
		$rec = new repGenerator_b();
		$rec->setQuery($sql);
		$rec->setSort(($_GET['srt']==""?"UP":$_GET['srt']));
		$rec->setOrder(($_GET['ord']==""?"ddd.rcode":$_GET['ord']));
		if($_GET['excel']==1){$rec->setLimitPage("ALL");}
		else{$rec->setLimitPage("100");}
		$rec->setSize("100%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		$rec->setLink($PHP_SELF,"sessiontab=".$sesstab."&sub=".$_GET["sub"]."&ftrcode=$ftrcode&ftrcode2=$ftrcode2&fdate=$fdate&tdate=$tdate&strfdate=$strfdate&strtdate=$strtdate&fmcode=$fmcode&bonus=$bonus&type_report=$type_report&type_report1=$type_report1");
		$rec->setBackLink($PHP_SELF,"sessiontab=".$sesstab."");
		if(isset($page))  
			$rec->setCurPage($page);
		//$rec->setShowIndex(true);
		
		$rec->setShowField("b,rcode,fdate,tdate,paydate,mcode,name_t,pv,rv_am,rv_bm,key_special,salary,stockist,thiscom,tax,total_real,transfer11,ttttt,cmp,cmp2,bankname,acc_name,acc_no,branch,mobile,status");
		$rec->setFieldDesc("ลำดับ,รอบ,เริ่ม,สิ้นสุด,วันที่จ่าย,รหัสมาชิก,ชื่อ,ยอดยกมา,".$wording_lan["commission"]["4"].",".$wording_lan["commission"]["5"].",".$wording_lan["com"]["1"].",".$wording_lan["com"]["2"].",".$wording_lan["com"]["3"].",รวมโบนัส,จ่ายภาษี,โบนัสหลังภาษี,ค่าโอน,โบนัสจ่ายจริง,สำเนาบัตรประชาชน,สำเนาบัญชีธนาคาร,ธนาคาร,ชื่อ-บัญชี,เลขบัญชี,สาขา,เบอร์ติดต่อ,status");
		$rec->setFieldAlign("center,center,center,center,center,left,left,right,right,right,right,right,right,right,right,right,right,center,center,center,center");
	//	$rec->setFieldSpace("10%,10%,10%,30%,5%,7%,7%,7%,7%,10%");//10
		$rec->setSum(true,false,",,,,,,,true,true,true,true,true,true,true,true,true,true,true,");
		$rec->setFieldFloatFormat(",,,,,,,2,2,2,2,2,2,2,2,2,2,2,");
 
		
	//	$rec->setFieldLink(",,,,,,,,index.php?sessiontab=4&sub=412&fdate=$fdate&tdate=$tdate&s_list=500&sale=A&uid=,index.php?sessiontab=4&sub=212&fdate=$fdate&tdate=$tdate&s_list=500&sale=A&uid=,index.php?sessiontab=4&sub=42&fdate=$fdate&tdate=$tdate&s_list=500&sale=A&uid=,,");
$rec->setFieldLink(",,,,,,,,index.php?sessiontab=4&sub=421&tdate=$tdate&fdate=,index.php?sessiontab=4&sub=401&tdate=$tdate&fdate=,index.php?sessiontab=4&sub=412&fdate=$fdate&tdate=$tdate&s_list=500&sale=A&uid=,index.php?sessiontab=4&sub=212&fdate=$fdate&tdate=$tdate&s_list=500&sale=A&uid=,index.php?sessiontab=4&sub=42&fdate=$fdate&tdate=$tdate&s_list=500&sale=A&uid=,");
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);

		if($_GET['excel']==1){
			$rec->exportXls("ExportXls","packfile100".date("Ymd").".xls","SH_QUERY");
			$str = "<fieldset><a href='".$rec->download("ExportXls","packfile100".date("Ymd").".xls")."' >";
			$str .= "<img border='0' src='./images/download.gif'>โหลด Excel</a></fieldset>";
			//$rec->getParam();
			$rec->setSpace($str);
		}
		$str = "<fieldset><a href='".$rec->getParam()."&excel=1' target='_self'>";
		$str .= "<img border='0' src='./images/excel.gif'>สร้าง Excel</a></fieldset>";
		
		$rec->setSpace($str);
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);
        
 }else if($fdate != '' and  $type_report1 == 2 ){
     
        if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
        if($_GET['state']==1){
        include("comsn/com_c/rep_change.php");
        }
       $sql = "SELECT *,@num := @num + 1 b FROM (SELECT a.fdate,a.tdate,a.paydate,a.rv_am,a.rv_bm,a.key_special,a.salary,a.stockist,a.key_special+a.pv+a.salary+a.smb+a.stockist+a.onetime+a.rv_am+a.rv_bm as thiscom,a.smb,a.bankcode,a.com_transfer_chagre as transfer11";
		$sql .= ",a.id,a.rcode,a.mcode,m.name_t,a.pv,a.pvb,a.pvh,a.total,a.tot_tax as tax  ";
		$sql .= ",CASE a.status WHEN '1' THEN 'จ่าย' WHEN '0' THEN 'ไม่จ่าย'  END AS status
		,m.branch,m.mobile,b.bankname
		";
		$sql .= ",CASE a.status WHEN '1' THEN a.rv_am+a.rv_bm+a.key_special+a.pv+a.salary+a.smb+a.stockist+a.onetime+a.key_register-a.tot_tax WHEN '0' THEN '0'  END AS total_real ";
		$sql .= ",CASE a.status WHEN '1' THEN a.rv_am+a.rv_bm+a.key_special+a.pv+a.salary+a.smb+a.stockist+a.onetime+a.key_register-a.tot_tax-a.com_transfer_chagre WHEN '0' THEN '0'  END AS ttttt ";

		$sql .= ",CASE m.cmp WHEN 'ครบ' THEN '<img src=./images/true.gif>' ELSE '<img src=./images/false.gif>' END AS cmp ";
        $sql .= ",CASE m.cmp2 WHEN 'ครบ' THEN '<img src=./images/true.gif>' ELSE '<img src=./images/false.gif>' END AS cmp2 ";
        $sql .= ",CASE m.acc_no WHEN '' THEN '<img src=./images/false.gif>' ELSE  m.acc_no  END AS acc_no "; 


        $sql .= "FROM ".$dbprefix."cmbonus_b a ";
         $sql .= " LEFT JOIN ".$dbprefix."bank b ON (b.bankcode=a.bankcode)";
        //if($type_report == '2' or $type_report == '3' or $type_report == '4' or $type_report == '5')
        $sql .= " LEFT JOIN ".$dbprefix."member m ON a.mcode=m.mcode ";
        
        $sql .= " WHERE $wwhere and a.status = 0";
        if($fmcode != '' )$sql .= " and a.mcode = ".$fmcode."";
        if($_POST['bonus'] != '' )$sql .= " and a.total between '".$arr_bonus[0]."' and '".$arr_bonus[1]."' ";
         if($type_report1 == 1 )$sql .= " and a.status = '1' ";
        if($type_report1 == 2 )$sql .= " and a.status = '0' ";
        if($bankcode != '' )$sql .= " and b.bankcode = ".$bankcode."";

        $sql .= " ) as ddd,(SELECT @num := 0) d where 1=1 " ;
 //echo $sql;
        $rec = new repGenerator_b();
        $rec->setQuery($sql);
        $rec->setSort(($_GET['srt']==""?"UP":$_GET['srt']));
        $rec->setOrder(($_GET['ord']==""?"ddd.rcode":$_GET['ord']));
        if($_GET['excel']==1){$rec->setLimitPage("ALL");}
        else{$rec->setLimitPage("100");}
        $rec->setSize("100%","");
        $rec->setAlign("center");
        $rec->setPageLinkAlign("right");
        $rec->setLink($PHP_SELF,"sessiontab=".$sesstab."&sub=".$_GET["sub"]."&ftrcode=$ftrcode&ftrcode2=$ftrcode2&fdate=$fdate&tdate=$tdate&strfdate=$strfdate&strtdate=$strtdate&fmcode=$fmcode&bonus=$bonus&type_report=$type_report&type_report1=$type_report1");
        $rec->setBackLink($PHP_SELF,"sessiontab=".$sesstab."");
        if(isset($page))
            $rec->setCurPage($page);
        //$rec->setShowIndex(true);
        
        $rec->setShowField("b,rcode,fdate,mcode,name_t,pv,rv_am,rv_bm,key_special,salary,stockist,pvh,cmp,cmp2,acc_no,mobile,status");
        $rec->setFieldDesc("ลำดับ,รอบ,เริ่ม,รหัสมาชิก,ชื่อ,ยอดยกมา,".$wording_lan["commission"]["4"].",".$wording_lan["commission"]["5"].",".$wording_lan["com"]["1"].",".$wording_lan["com"]["2"].",".$wording_lan["com"]["3"].",ยอดยกไป,สำเนาบัตรประชาชน,สำเนาบัญชีธนาคาร,เลขบัญชี,เบอร์ติดต่อ,status");
        $rec->setFieldAlign("center,center,center,center,left,right,right,right,right,right,right,right,center,center,center,center,center");
        $rec->setFieldSpace("3%,3%,8%,8%,10%,7%,7%,7%,7%,7%,7%,7%,7%,7%,7%,7%,7%,7%,7%,7%,7%");//10
    //   $rec->setSum(true,false,",,,,,,,true,true,true,true,true,true,true");
      //  $rec->setFieldFloatFormat(",,,,,,,2,2,2,2,2,2,2");
 
        
        $rec->setFieldLink(",,,,,,index.php?sessiontab=4&sub=421&tdate=$tdate&fdate=,index.php?sessiontab=4&sub=401&tdate=$tdate&fdate=,index.php?sessiontab=4&sub=412&fdate=$fdate&tdate=$tdate&s_list=500&sale=A&uid=,index.php?sessiontab=4&sub=212&fdate=$fdate&tdate=$tdate&s_list=500&sale=A&uid=,index.php?sessiontab=4&sub=42&fdate=$fdate&tdate=$tdate&s_list=500&sale=A&uid=,");

        if(isset($_POST['skey']))
            $rec->setCause($_POST['skey'],$_POST['scause']);
        else if(isset($_GET['skey']))
            $rec->setCause($_GET['skey'],$_GET['scause']);

        if($_GET['excel']==1){
            $rec->exportXls("ExportXls","packfile100".date("Ymd").".xls","SH_QUERY");
            $str = "<fieldset><a href='".$rec->download("ExportXls","packfile100".date("Ymd").".xls")."' >";
            $str .= "<img border='0' src='./images/download.gif'>โหลด Excel</a></fieldset>";
            //$rec->getParam();
            $rec->setSpace($str);
        }
        $str = "<fieldset><a href='".$rec->getParam()."&excel=1' target='_self'>";
        $str .= "<img border='0' src='./images/excel.gif'>สร้าง Excel</a></fieldset>";
        
        $rec->setSpace($str);
        $rec->showRec(1,'SH_QUERY');
        mysql_close($link);
    }
 
?>