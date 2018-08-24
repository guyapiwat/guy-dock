<?
include("rpdialog.php");
$strfdate = $_POST['strfdate']==""?$_GET['strfdate']:$_POST['strfdate'];
$strtdate = $_POST['strtdate']==""?$_GET['strtdate']:$_POST['strtdate'];
$fmcode = $_POST['fmcode']==""?$_GET['fmcode']:$_POST['fmcode'];
$type_report = $_POST['type_report']==""?$_GET['type_report']:$_POST['type_report'];

rpdialog_all($_GET['sub']);

if($strfdate=="" || $strtdate==""){
}else{
//    rpdialog();
?>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<!--a href="./comsn/com_a/rep_ac_comsn_print.php?ftrcode=<?=$ftrcode?>&fmcode=<?=$fmcode?>" target="_blank"><img border="0" src="./images/Amber-Printer.gif">พิมพ์ทั้งหมด</a-->
<?
        require("connectmysql.php");
        //require("./cls/repGenerator.php");
        $month=explode("-",$strtdate);
        $monthf=explode("-",$strfdate);
        $month0 = $month[0];
        $month1 = $month[1];
        $month_show = $month0.'/'.$month1;
        $monthf0 = $monthf[0];
        $monthf1 = $monthf[1];
        $monthf_show = $monthf0.'/'.$monthf1;
        $month2 = $month[0].$month[1];
        $monthff = $monthf[0].$monthf[1];

         
        if($type_report == 1 )$where1 .= " "; $LEFT ='LEFT' ;
        if($type_report == 2 )$where1 .= " where mtype2 = '1' ";$LEFT ='RIGHT';
        if($type_report == 3 )$where1 .= " where bankcode = '52' ";$LEFT ='RIGHT';
        if($type_report == 4 )$where1 .= " where bankcode != '52' ";$LEFT ='RIGHT';
        if($type_report == 5 )$where1 .= " where bankcode != '52' and mtype2 != '1' ";$LEFT ='RIGHT';

        if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
        //$sql = "SELECT $month_show as dayshow,a.pvb,a.mpos,a.month_pv,a.pv,a.mcode,taba.name_t,a.status";
        $sql = "SELECT month_pv as dayshow,a.pvb,a.mpos,a.month_pv,a.pv,a.mcode,taba.name_t,a.status,a.mdate";
		$sql .= ",CASE a.satype WHEN 'A' THEN 'บิลปกติ' ELSE 'Autoship' END AS satype ";

        $sql .= ",CASE a.status WHEN '0' THEN '<img src=./images/true.gif>' ELSE '' END AS status1 ";
        $sql .= ",CASE a.status WHEN '1' THEN '<img src=./images/true.gif>' ELSE '' END AS status2 ";
        $sql .= "FROM ".$dbprefix."status a  ";
        $sql .= " ".$LEFT." JOIN ".$dbprefix."member AS taba ON (a.mcode=taba.mcode )";    

        if($strfdate!=""&&$strtdate!=""&&$fmcode!=""){
            //$sql .= " WHERE a.month_pv = '$month2' and a.mcode='".$fmcode."'";
            $sql .= " WHERE  a.mdate >= '$strfdate' and a.mdate <= '$strtdate'  and a.mcode='".$fmcode."'   ";
        }else if($strfdate!=""&&$strtdate!=""){
            $sql .= " WHERE  a.mdate >= '$strfdate' and a.mdate <= '$strtdate' ";
        }else if($fmcode!=""){
            $sql .= " WHERE a.mcode='".$fmcode."' '".$where1."' ";
        }

        $sql .= "  and a.status = '1' ";
     
        $rec = new repGenerator();
        $rec->setQuery($sql);
        $rec->setSort(($_GET['srt']==""?"UP":$_GET['srt']));
        $rec->setOrder(($_GET['ord']==""?"a.id":$_GET['ord']));
        $rec->setLimitPage($_GET['lp']);
        $rec->setSize("100%","");
        $rec->setAlign("center");
        $rec->setPageLinkAlign("right");
        $rec->setLink($PHP_SELF,"sessiontab=4&sub=20&strfdate=$strfdate&strtdate=$strtdate&fmcode=$fmcode&vip=$vip");
        $rec->setBackLink($PHP_SELF,"sessiontab=4");
        if(isset($page))
            $rec->setCurPage($page);
        $rec->setShowIndex(true);
        //$rec->setSpecial("./images/search.gif","","view","rcode,mcode","IMAGE","ดู");
        $rec->setShowField("month_pv,mcode,name_t,mpos,status2,satype");
        $rec->setFieldDesc("รักษายอดเดือนปี,รหัสสมาชิก,ชื่อสมาชิก,ตำแหน่ง,รักษายอด,ชนิด");
        $rec->setFieldAlign("center,center,left,center,center,center");
        $rec->setFieldSpace("10%,10%,50%,10%,10%,10%");//10
        $rec->setFieldFloatFormat("");
        $rec->setSum(true,false,",,,,,,");
        $rec->setFieldLink("");
        if($_GET['excel']==1){
            $rec->exportXls("ExportXls","newposition".date("Ymd").".xls","SH_QUERY");
            $str = "<fieldset><a href='".$rec->download("ExportXls","newposition".date("Ymd").".xls")."' >";
            $str .= "<img border='0' src='./images/download.gif'>โหลด Excel</a></fieldset>";
            //$rec->getParam();
            $rec->setSpace($str);
        }
        $str = "<fieldset><a href='".$rec->getParam()."&excel=1' target='_self'>";
        $str .= "<img border='0' src='./images/excel.gif'>สร้าง Excel</a></fieldset>";
        if(isset($_POST['skey']))
            $rec->setCause($_POST['skey'],$_POST['scause']);
        else if(isset($_GET['skey']))
            $rec->setCause($_GET['skey'],$_GET['scause']);
        //$rec->setSearch("a.mcode");
        //$rec->setSearchDesc("รหัส");
        $rec->setSpace($str);
        $rec->showRec(1,'SH_QUERY');
        mysql_close($link);
}    
 