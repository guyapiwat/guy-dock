<script language="javascript" type="text/javascript">

	function sale_cancel(id){
		if(confirm("ต้องการยกเลิกบิลนี้")){
			window.location='index.php?sessiontab=4&sub=2008&state=3&bid='+id;
		}
	}
</script>
<?
include("rpdialog.php");
$fmcode = $_POST['fmcode']==""?$_GET['fmcode']:$_POST['fmcode'];
$fdate = $_POST['fdate']==""?$_GET['fdate']:$_POST['fdate'];
$tdate = $_POST['tdate']==""?$_GET['tdate']:$_POST['tdate'];
$type_report = $_POST['type_report']==""?$_GET['type_report']:$_POST['type_report'];
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
	$sql="select min(rcode) as fdate1,max(rcode) as tdate1 from ".$dbprefix."cround a where a.fdate >= '".$fdate."' and a.tdate <= '".$tdate."' ";
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
	$sql="select fdate,tdate from ".$dbprefix."cround a where a.rcode ='$ftrcode' ";
	$result=mysql_query($sql);
	if (mysql_num_rows($result)>'0') {
		$row= mysql_fetch_array($result, MYSQL_ASSOC);
		$fdate=$fdate11=$row["fdate"];
		$tdate=$tdate11=$row["tdate"];	
	}
}
rpdialog_alls($_GET['sub'],$fdate,$tdate,$fmcode);

require("connectmysql.php");
//$wwhere = ($fdate[0]=="" ? " a.rcode between '".$ftrc[0]."' and '".$ftrc[1]."' " : " sadate >= '".$fdate."' and sadate <= '".$tdate."' ");
if(!empty($fdate))$wwhere = " and  sadate >= '".$fdate."' and sadate <= '".$tdate."' ";
$wwhere1 = " and total between '".$arr_bonus[0]."' and '".$arr_bonus[1]."' ";
//if(empty($fdate))exit; 
$sql = "SELECT cancel,".$dbprefix."adjust.txtoption,".$dbprefix."adjust.id,".$dbprefix."adjust.total,".$dbprefix."adjust.uid as uid,sano,txtCash,txtFuture,txtTransfer,txtCredit1+txtCredit2+txtCredit3 as txtCredit,sadate,txtMoney ,".$dbprefix."member.name_t";
$sql .= ",CASE ".$dbprefix."adjust.mcode WHEN '' THEN ".$dbprefix."adjust.inv_code  ELSE ".$dbprefix."adjust.mcode END AS smcode ";
$sql .= " FROM ".$dbprefix."adjust ";
$sql .= "LEFT JOIN ".$dbprefix."member ON (".$dbprefix."adjust.mcode=".$dbprefix."member.mcode) where  cancel = 0 $wwhere "; 
if($fmcode != '' )$sql .= " and ".$dbprefix."adjust.mcode = '$fmcode'";
//echo $sql;

    if($_GET['state']==1){
        include("adjust_del.php");
    }else if($_GET['state']==2){
        include("adjust_editadd.php");
    }else if($_GET['state']==3){
        include("adjust_cancel.php");
    }else{
        $rec = new repGenerator();
        $rec->setQuery($sql);
        $rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
        $rec->setOrder($_GET['ord']==""?" id ":$_GET['ord']);
        $rec->setLimitPage($_GET['lp']);    
        if(isset($_POST['skey']))
            $rec->setCause($_POST['skey'],$_POST['scause']);
        else if(isset($_GET['skey']))
            $rec->setCause($_GET['skey'],$_GET['scause']);
        $rec->setSize("95%","");
        $rec->setAlign("center");
        $rec->setPageLinkAlign("right");
        $rec->setLink($PHP_SELF,"sessiontab=".$_GET["sessiontab"]."&sub=".$_GET["sub"]."&fdate=$fdate&tdate=$tdate");
        $rec->setBackLink($PHP_SELF,"sessiontab=".$_GET["sessiontab"]."");
        if(isset($page))
            $rec->setCurPage($page);
        $rec->setShowField("sadate,sano,smcode,name_t,txtMoney,txtoption,uid");
        $rec->setFieldFloatFormat(",,,,2,,,,,,,");
        $rec->setFieldDesc("วันที่จ่าย,เลขบิล,รหัสสมาชิก,ชื่อสมาชิก,Adjust,หมายเหตุ,สาขา หรือ พนักงาน");
        $rec->setFieldAlign("center,center,center,left,right,right,right,right,right,right,right,right,center");
        $rec->setFieldSpace("10%,10%,%10%,15%,10%,30%,5%");
        $rec->setSum(true,false,",,,,true,,,,,,");
        $rec->setSpecial("./images/cancel.gif","","sale_cancel","id","IMAGE","ยกเลิก");
        $rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");
        $rec->showRec(1,'SH_QUERY');
    }
?>