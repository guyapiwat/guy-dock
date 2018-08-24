<? 
require("connectmysql.php");
$inv_code = $_SESSION["admininvent"];
rpdialog_amount_lb1($_GET['sub'],$fdate,$tdate,$inv_code);
?>
<script language="javascript" type="text/javascript">
    function sale_print(id){
        link = '<?=$actual_link?>invoice/aprint_sale.php';  
        var wlink = link+'?bid='+id; 
        window.open(wlink);  
    }
</script>
<?php

if($fdate){
     
        $set_payment = query("*",'ali_payment pm '," 1=1 and pm.shows = 1 ORDER BY pm.id"); 
         foreach($set_payment as $key => $val):
               $text = 'txt'.$val['payment_column']; 
               $arr[$val['payment_ref']][$val['payment_column']] = $text;
               $arr[$val['payment_ref']]['column'] = $val['rep_column'];
         endforeach;
         foreach($arr as $key => $val):
                    $sqlx .= ",SUM(";
                    $keyx=0;
                    $colome_text .=  ','.$val['column'];
                    unset($val['column']);
                    foreach($val as $valx):
                    $sqlx .= "ash.{$valx}"; 
                    if($keyx+1 != count($val))$sqlx .= "+";
                    $keyx++;
                    endforeach;
                    $sqlx .= ") as $key";
                    $sqly .= ",SUM($key) as $key";
                    $colome.= ','.$key;
                    $Format.= ',2';
                    $Sum.= ',true';
         endforeach;  
        $where ="and ash.cancel = 0 ";
        if($fdate!="")$where .= "and ash.sadate BETWEEN '{$fdate}' AND '{$tdate}' ";
        if($inv!="")$sql .= "and ash.lid ='{$inv}' ";
        if($struid!="")$sql .= "and ash.uid ='{$struid}' ";
        if($location_base!="")$where .= "and ash.locationbase ='{$location_base}' "; 
        if($sa_type!="")$where .= "and ash.sa_type ='{$sa_type}' "; 
        if($logistic!="")$where .= "and ash.send ='{$logistic}' ";  
        if($sregister!="")$where2 = "and ash.scheck ='{$sregister}' ";  $where3 = "and ash.mcode ='0000000' ";  
        if($struid!="")$where .= "and ash.uid ='{$struid}'  ";  
        if($sspv!="")$where .= "and ash.checkportal ='{$sspv}'  ";  
		$where_ea = $where;
		if($inv_code!=""){
			$where .= "and ash.inv_code ='{$inv_code}' ";
			$where_ea .= "and ash.lid ='{$inv_code}' ";
		}
     
        $sum = array('total','tot_pv','txtCash','txtCredit1+txtCredit2+txtCredit3','txtInternet','txtTransfer+txtFuture','txtDiscount','txtSending');
        //$sql_text
        
        
        
        $sql = "SELECT total,tot_pv,total_invat,total_vat,type,num".$sqly.",SUM(Sending) as Sending ";
        if($struid)$sql .=",'{$struid}' AS txtUser";
        else $sql.=",'*' AS txtUser";
        if($inv_code)$sql .=",'{$inv_code}' AS txtInvcode";
        else $sql.=",'*' AS txtInvcode";
        $sql.=",'".$fdate."' as fdate,'".$tdate."' as tdate";
         if($sspv)$sql .=",CASE '{$sspv}' WHEN '1' THEN 'HQ' WHEN '2' THEN 'Branch' WHEN '3' THEN 'Online'  WHEN '4' THEN 'ATO'  WHEN '5' THEN 'Stockist'  END AS checkportal1";
        else $sql.=",'*' AS checkportal1";

        $sql .=" FROM ( ";
            $sql .= "SELECT 'บิลขาย' as type,count(id) as num";
            $sql .= ",SUM(ash.total) as total";
            $sql .= ",SUM(ash.total_vat) as total_vat";
            $sql .= ",SUM(ash.total_invat) as total_invat";
            $sql .= ",SUM(ash.tot_pv) as tot_pv";
            $sql .= $sqlx; 
            $sql .= ",SUM(txtSending)as Sending"; 
            $sql .= " FROM ali_asaleh ash WHERE scheck = '' {$where}"; 
            $sql .= " GROUP BY locationbase ";
        $sql .= " UNION ALL ";
            $sql .= "SELECT 'บิลเติมเงิน Ewallet' as type,count(id) as num";
			$sql .= ",SUM(ash.total) as total";
            $sql .= ",'0' as total_vat";
            $sql .= ",SUM(ash.total) as total_invat";
            $sql .= ",'0' as tot_pv";
            $sql .= $sqlx; 
           $sql .= ",'0' as Sending"; 
            $sql .= " FROM ali_ewallet ash WHERE 1=1 and ash.sa_type <> 'TI' and ash.sa_type <> 'TO'  and ash.sa_type <> 'T' and ash.sa_type <> 'W' {$where} and txtWithdraw = 0 and ash.sa_type <> 'CI'  and txtTransfer_in = 0 and txtTransfer_out = 0 ";
            $sql .= " GROUP BY locationbase ";
        $sql .= " UNION ALL ";
            $sql .= "SELECT 'บิลเติมเงิน Eautoship' as type,count(id) as num";
            $sql .= ",SUM(ash.total) as total";
            $sql .= ",'0' as total_vat";
            $sql .= ",SUM(ash.total) as total_invat";
            $sql .= ",'0' as tot_pv";
            $sql .= $sqlx; 
            $sql .= ",'0' as Sending"; 
            $sql .= " FROM ali_eatoship ash WHERE 1=1 and ash.sa_type <> 'TI' and ash.sa_type <> 'TO' and ash.sa_type <> 'T' and ash.sa_type <> 'W' {$where_ea} and ash.sa_type <> 'CI' ";
            $sql .= " GROUP BY locationbase ";
        $sql .= " UNION ALL ";
            $sql .= "SELECT 'บิลสมัคร' as type,count(id) as num";
            $sql .= ",SUM(ash.total) as total";
            $sql .= ",SUM(ash.tot_pv) as tot_pv";
            $sql .= ",SUM(ash.total_vat) as total_vat";
            $sql .= ",SUM(ash.total_invat) as total_invat";
            $sql .= $sqlx; 
            $sql .= ",'0' as Sending"; 
            $sql .= " FROM ali_asaleh ash WHERE scheck = 'register' {$where}";
            $sql .= " GROUP BY locationbase ";
        $sql .= ") as tb ";
        $sql .= "GROUP BY tb.type";
       // echo $sql;
        $rec = new repGenerator();
        $rec->setQuery($sql);
        $rec->setSort($_GET['srt']==""?"DOWN":$_GET['srt']);
        $rec->setOrder($_GET['ord']==""?" type ":$_GET['ord']);
        $rec->setLimitPage("50000");    
        if(isset($_POST['skey']))
            $rec->setCause($_POST['skey'],$_POST['scause']);
        else if(isset($_GET['skey']))
            $rec->setCause($_GET['skey'],$_GET['scause']);
        $rec->setSize("95%","");
        $rec->setAlign("center");
        $rec->setPageLinkAlign("right");
        //$rec->setPageLinkShow(false,false);
        $rec->setLink($PHP_SELF,"sessiontab=".$sesstab."&sub=".$_GET["sub"]."&fdate=$fdate&tdate=$tdate&satype=$satype&logistic=$logistic&strpv=$strpv&strtotal=$strtotal&struid=$struid&sspv=$sspv&inv_code=$inv_code&strSearch=$strSearch&strtype=$strtype&sregister=$sregister&locationbase=$locationbase");
        $rec->setBackLink($PHP_SELF,"sessiontab=".$sesstab."");
        if(isset($page))
            $rec->setCurPage($page);
         $rec->setShowField("type,fdate,tdate,num,total,total_invat,total_vat,tot_pv".$colome.",Sending,txtUser,txtInvcode,checkportal1");
        $rec->setFieldDesc("ชนิด,จากวันที่,ถึงวันที่,จำนวนบิล,จำนวนเงินรวม,ยอดขายก่อน VAT,VAT,PV".$colome_text.",ค่าจัดส่ง,User,สาขา,ช่องทาง");
        $rec->setFieldFloatFormat(",,,2,2,2,2,2".$Format.",");
        $rec->setFieldAlign("Center,center,center,right,right,right,right,right,right,right,right,right,right,right,center,center,center");
     //   $rec->setFieldSpace("7%,7%,7%,7%,7%,7%,7%,7%,7%,7%,7%,7%,7%,7%,7%,7%,7%");
        $rec->setFieldLink(",");
        //$rec->setSearch("sano,hono,sadate,smcode,inv_code,tot_pv");
        //$rec->setSearchDesc("เลขบิล,เลขบิลแจง,วันที่,รหัสผู้ซื้อ,ผู้บันทึก,จำนวน PV");
        $rec->setSum(true,false,",,,true,true,true,true,true".$Sum.",true");
        $rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");
        if($_GET['excel']==1){
            $rec->exportXls("ExportXls","sale_bill".date("Ymd").".xls","SH_QUERY");
            $str = "<fieldset><a href='".$rec->download("ExportXls","sale_bill".date("Ymd").".xls")."' >";
            $str .= "<img border='0' src='./images/download.gif'>โหลด Excel</a></fieldset>";
            //$rec->getParam();
            $rec->setSpace($str);
        }
        //$rec->setSpecial("./images/search.gif","","view","mcode","IMAGE","");
        $str = "<fieldset ><a href='".$rec->getParam()."&excel=1' target='_self'>";
        $str .= "<img border='0' src='./images/excel.gif'>สร้าง Excel</a></fieldset>";
        $rec->setSpace($str);
        $rec->showRec(1,'SH_QUERY');
    }
 

?>