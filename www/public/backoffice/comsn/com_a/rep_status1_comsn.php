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
      
        if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";} 
		
		$data = loopStatus($strfdate,$strtdate);

		$sql = "SELECT mcode,name_t, ".$data[0]." FROM( 
					SELECT m.mcode, m.name_t, ".$data[1]." 
					FROM ali_member m 
					LEFT JOIN ali_status s ON (m.mcode = s.mcode)
					
				)as a 
				GROUP BY mcode ";
              //echo $sql;
        $rec = new repGenerator();
        $rec->setQuery($sql);
        $rec->setSort(($_GET['srt']==""?"UP":$_GET['srt']));
        $rec->setOrder(($_GET['ord']==""?"mcode":$_GET['ord']));
        $rec->setLimitPage($_GET['lp']);
        $rec->setSize("100%","");
        $rec->setAlign("center");
        $rec->setPageLinkAlign("right");
        $rec->setLink($PHP_SELF,"sessiontab=4&sub=71&strfdate=$strfdate&strtdate=$strtdate&fmcode=$fmcode&vip=$vip");
        $rec->setBackLink($PHP_SELF,"sessiontab=4");
        if(isset($page))
            $rec->setCurPage($page);
        $rec->setShowIndex(true);
        //$rec->setSpecial("./images/search.gif","","view","rcode,mcode","IMAGE","ดู");
        $rec->setShowField("mcode,name_t,".$data[2]);
        $rec->setFieldDesc("รหัสสมาชิก,ชื่อสมาชิก,".$data[3]);
        $rec->setFieldAlign("center,left,".$data[4]);
        //$rec->setFieldSpace("8%%,15%,".$data[5]);//10
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

function loopStatus($fdate,$tdate){
	if(!empty($fdate) and !empty($tdate)){
		$column1 = $column2 = $column3 = $column4 = $column5 = "";
		$x1 = explode('-',$fdate);
		$x2 = explode('-',$tdate);
		$y1 = intval($x1[0]);
		$m1 = intval($x1[1]);
		$d1 = intval($x1[2]);
		$y2 = intval($x2[0]);
		$m2 = intval($x2[1]);
		$d2 = intval($x2[2]);
		for($i=$y1,$m=0;$i<=$y2;$i++,$m+=12){
			if($i<$y2){$jj = 12;$jjj = 1;}else{$jj = $m2;$jjj = $m1;}
			for($j=$jjj;$j<=$jj;$j++){
				
				if($j<10){$month_pv = $i.'0'.$j;}
				else{$month_pv = $i.$j;}
				
				if(((($y2-$y1)*12)+$m2) != ($m+$j)){$comma = ",";}
				else{$comma = "";}
				
				$column1 .= "IF(SUM(m".($j+$m).")>0,'<img src=./images/true.gif>','<img src=./images/false.gif>') as 'm".($j+$m)."'".$comma." ";
				$column2 .= "CASE s.month_pv WHEN '".$month_pv."' THEN CASE s.status WHEN '1' THEN 1 ELSE 0 END ELSE 0 END as m".($j+$m).$comma." ";
				$column3 .= "m".($j+$m).$comma;
				$column4 .= $month_pv.$comma; 
				$column5 .= "center".$comma;
				$column6 .= "5%".$comma;
				
			}	
		}
	}
	else{
		$month_first = date("Ym");
		$month_last  = date("Ym");
	}
	//echo $column4;
	return array($column1,$column2,$column3,$column4,$column5,$column6);
}


?> 