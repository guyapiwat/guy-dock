<?
include("rpdialog.php");
if ($cmc=="") {$cmc=$smc;}
if ($cmc=="") {
    $cmc=$_SESSION["usercode"];
}

$strfdate1 = $_POST['strfdate']==""?$_GET['strfdate']:$_POST['strfdate'];
$strtdate1 = $_POST['strtdate']==""?$_GET['strtdate']:$_POST['strtdate'];


rpdialog_m(124);
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
if (strpos($ftrcode,"-")===false){
        //รอบเริ่มต้น == รอบสิ้นสุด
        $ftrc[0]=$ftrcode;
        $ftrc[1]=$ftrcode;
}else{
    $ftrc = explode('-',$ftrcode);
}



require("connectmysql.php");
require("./cls/repGenerator_b.php");

if($cmc != ''){
        if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
        $sql = "SELECT DATE_FORMAT(a.fdate, '%Y-%m-%d') as fdate,DATE_FORMAT(a.tdate, '%Y-%m-%d') as tdate,a.rcode, a.mcode,m.name_t,m.acc_no,m.bankcode,lb.cshort,a.percer,a.total as total,a.tax as tax,a.bonus as bonus,a.pos_cur ";
        $sql.=",mmm.total as key_regis,ifnull(mmm.total,0) as total1";
        $sql .= " FROM ".$dbprefix."fmbonus a ";
        $sql .= " LEFT JOIN ".$dbprefix."mmmbonus mmm ON (a.mcode=mmm.mcode and a.rcode=mmm.rcode) ";
        $sql .= " LEFT JOIN ".$dbprefix."member m ON a.mcode=m.mcode ";
        $sql .= " LEFT JOIN ".$dbprefix."location_base lb ON a.locationbase=lb.cid ";    
        $sql .= "WHERE a.mcode = '".$cmc."' ";
        if($strfdate1!=""){
            $sql .= " and a.fdate >= '".$strfdate1."' and a.tdate <= '".$strtdate1."' ";
        }

          $rec = new repGenerator();
        $rec->setQuery($sql);
        $rec->setSort(($_GET['srt']==""?"DOWN":$_GET['srt']));
        $rec->setOrder(($_GET['ord']==""?"a.mcode,rcode":$_GET['ord']));
        $rec->setLimitPage($_GET['lp']);
        $rec->setSize("95%","");
        $rec->setAlign("center");
        $rec->setPageLinkAlign("right");
        $rec->setLink($PHP_SELF,"sessiontab=".$sesstab."&sub=".$_GET["sub"]."&ftrcode=$ftrcode&ftrcode2=$ftrcode2&fdate=$fdate&tdate=$tdate&strfdate=$strfdate&strtdate=$strtdate&fmcode=$fmcode&bonus=$bonus&type_report=$type_report");
        $rec->setBackLink($PHP_SELF,"sessiontab=".$sesstab."");
        if(isset($page))
            $rec->setCurPage($page);
        //$rec->setShowIndex(true);
        $rec->setShowField("fdate,tdate,mcode,name_t,key_regis,total1");
        $rec->setFieldDesc("ตั้งแต่วันที่,ถึงวันที่,รหัสมาชิก,ชื่อ,Key\nregister,Total");
        $rec->setFieldAlign("center,center,center,left,right,right,right");
        $rec->setFieldSpace("10%,10%,10%,30%,15%,15%,15%");//10
        $rec->setSum(true,false,",,,,true,true,true");
        $rec->setFieldFloatFormat(",,,,2,2,2");
        $rec->setFieldLink(",,,,index.php?sessiontab=5&sub=122&fdate=$fdate&tdate=$tdate,index.php?sessiontab=5&sub=130&fdate=$fdate&tdate=$tdate");
    
        if(isset($_POST['skey']))
            $rec->setCause($_POST['skey'],$_POST['scause']);
        else if(isset($_GET['skey']))
            $rec->setCause($_GET['skey'],$_GET['scause']);
        $rec->showRec(1,'SH_QUERY');
        mysql_close($link);
    }


 
?>