<?
//require("../backoffice/rpdialog.php");
require("connectmysql.php");
$s_list = $_POST['s_list']==""?$_GET['s_list']:$_POST['s_list'];
$fdate = $_POST['fdate']==""?$_GET['fdate']:$_POST['fdate'];
$tdate = $_POST['tdate']==""?$_GET['tdate']:$_POST['tdate'];
$pg = $_POST['pg']==""?$_GET['pg']:$_POST['pg'];
if(!empty($_GET['bills'])){$bills = $_GET['bills'];}else {if(!empty($_POST['bills'])){$bills = $_POST['bills'];}else{$bills='';}}
if(!empty($_GET['total_x'])){$total_x = $_GET['total_x'];}else {if(!empty($_POST['total_x'])){$total_x = $_POST['total_x'];}else{$total_x='';}}
if(!empty($_GET['pv'])){$pv = $_GET['pv'];}else {if(!empty($_POST['pv'])){$pv = $_POST['pv'];}else{$pv='';}}
$tttt = explode('-',$total_x);
$pppp = explode('-',$pv);
if(count($tttt) > 1){
	$where_tttt = " and ash.total >= '".$tttt[0]."' and ash.total <= '".$tttt[1]."' ";
}
else{
	$where_tttt = " and ash.total = '".$tttt[0]."' ";
}
if(count($pppp) > 1){
	$where_pppp = " and ash.tot_pv >= '".$pppp[0]."' and ash.tot_pv <= '".$pppp[1]."' ";
}
else{
	$where_pppp = " and ash.tot_pv = '".$pppp[0]."' ";
}


$where_bills = findBills("sano","ash",$bills);
//echo $where_bills;
rpdialog_amount_lb111($_GET['sub'],$fdate,$tdate,$s_list);

?>
<script language="javascript" type="text/javascript">
    function sale_print(id){
        link = '<?=$actual_link?>invoice/aprint_sale.php';  
        var wlink = link+'?bid='+id; 
        window.open(wlink);  
    }	
	function sale_look(id){
	    var link = '<?=$actual_link?>invoice/aprint_salelook.branch.php';  
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
                    $sqlx .= ",(";
                    $keyx=0;
                    $colome_text .=  ','.$val['column'];
                    unset($val['column']);
                    foreach($val as $valx):
                    $sqlx .= "ash.{$valx}"; 
                    if($keyx+1 != count($val))$sqlx .= "+";
                    $keyx++;
                    endforeach;
                    $sqlx .= ") as $key";
                    $colome.= ','.$key;
                    $Format.= ',2';
                    $Sum.= ',true';
         endforeach;

        $sql = "SELECT ash.id,ash.total,ash.sano,mb.sp_code,mb.id_card,ash.mcode as smcode,concat(ash.name_f,' ',ash.name_t) as name_t,ash.sadate,ash.tot_pv,ash.total_vat,ash.total_net ";
        $sql .= $sqlx;  
		$sql .= ",CASE ash.scheck WHEN 'register' THEN '��Ѥ�' ELSE '���ͧ͢' END AS scheck ";
        $sql .= ",CASE ash.send WHEN '1' THEN '��' ELSE '�Ѻ�ͧ' END AS send ";
        $sql .= ",CASE checkportal WHEN '1' THEN 'HQ' WHEN '2' THEN 'Branch' WHEN '3' THEN 'Online'  WHEN '4' THEN 'ATO'  WHEN '5' THEN 'Stockist'  END AS checkportal1";
        $sql .= $sqlWhere_satype;
        $sql .= ",ash.uid,us.inv_ref,lb.cshort";
        $sql .= " FROM ali_asaleh ash ";
        $sql .= "LEFT JOIN ali_location_base lb ON (lb.cid=ash.locationbase)    "; 
        $sql .= "LEFT JOIN ali_user us ON (ash.uid=us.usercode) ";
        $sql .= "LEFT JOIN ali_member mb ON (ash.mcode=mb.mcode) ";
        $sql .= "WHERE ash.cancel = 0 ";
		if($mpcode!="")$sql .= "and ash.mcode ='{$mpcode}' ";
		if($total_x!="")$sql .= $where_tttt;
		if($pv!="")$sql .= $where_pppp;
        if($fdate!="")$sql .= "and ash.sadate BETWEEN '{$fdate}' AND '{$tdate}' ";
        if($inv!="")$sql .= "and ash.lid ='{$inv}' ";
        if($sspv!="")$sql .= "and ash.checkportal ='{$sspv}' ";
        if($uid!="")$sql .= "and ash.uid ='{$uid}' ";
        if($sano!="")$sql .= "and ash.sano ='{$sano}' ";
        if($location_base!="")$sql .= "and ash.locationbase ='{$location_base}' "; 
        if($sa_type!="")$sql .= "and ash.sa_type ='{$sa_type}' "; 
        if($logistic!="")$sql .= "and ash.send ='{$logistic}' ";  
        if($sregister!="" and $sregister != '3')$sql .= " and  ash.scheck = '{$sregister}' ";  
		if(!empty($where_bills))$sql .= " and ".$where_bills." ";
        if($option !="" and $text_op !=""){
            if($text_op == 'mcode'){
              $sql .= " and  ash.{$option} = '{$text_op}' ";
            }else{
                if (strpos($text_op,"-")===false){
                    $arr_bonus[0]=$text_op;
                        $arr_bonus[1]=$text_op;
                }else{
                    $arr_bonus = explode('-',$text_op);
                } 
                $sql .= " and ash.{$option} between '".$arr_bonus[0]."' and '".$arr_bonus[1]."' ";
            }
            
        }
  
        $rec = new repGenerator_b();
        $rec->setQuery($sql);
        $rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
        $rec->setOrder($_GET['ord']==""?" id ":$_GET['ord']);
        $rec->setLimitPage($s_list);    
        if(isset($_POST['skey']))
            $rec->setCause($_POST['skey'],$_POST['scause']);
        else if(isset($_GET['skey']))
            $rec->setCause($_GET['skey'],$_GET['scause']);
        $rec->setSize("99%","");
        $rec->setAlign("center");
        $rec->setPageLinkAlign("right");
        //$rec->setPageLinkShow(false,false);
        $rec->setLink($PHP_SELF,"sessiontab=4&sub=8&fdate=$fdate&tdate=$tdate&satype=$satype&logistic=$logistic&strpv=$strpv&strtotal=$strtotal&struid=$struid&sspv=$sspv&inv=$inv&strSearch=$strSearch&strtype=$strtype&sregister=$sregister&sa_type=$sa_type&location_base=$location_base&currency=$currency&sano=$sano&uid=$uid&bills=$bills&s_list=$s_list");
        $rec->setBackLink($PHP_SELF,"sessiontab=4");
        if(isset($pg))
            $rec->setCurPage($pg);
       $rec->setShowField("sano,smcode,name_t,ability,sadate,tot_pv,total,total_net,total_vat".$colome.",uid,inv_ref,checkportal1,send,scheck");
        $rec->setFieldDesc("�Ţ���,���ʼ�����,���ͼ�����,���������,�ѹ������,PV,�ʹ���,�ʹ��¡�͹&nbsp;Vat,Vat".$colome_text.",���ѹ�֡,�Ң�,��ͧ�ҧ,�Ѵ��,������");
        $rec->setFieldFloatFormat(",,,,,2,2,2,2".$Format.",");
        $rec->setFieldAlign("center,center,left,center,right,right,right,right,right,right,right,right,right,right,right,center,center,center,center,center");
        $rec->setFieldSpace("6%,6%,10%,6%%,6%,3%,3%,4%,4%,4%,4%,4%,4%,4%,4%,4%,5%,5%");
        $rec->setFieldLink(",");
        //$rec->setSearch("sano,hono,sadate,smcode,inv_code,tot_pv");
        //$rec->setSearchDesc("�Ţ���,�Ţ���ᨧ,�ѹ���,���ʼ�����,���ѹ�֡,�ӹǹ PV");
        $rec->setSum(true,false,",,,,,true,true".$Format.",2,2,");
        $rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");
        if($_GET['excel']==1){
            $rec->exportXls("ExportXls","sale_bill".date("Ymd").".xls","SH_QUERY");
            $str = "<fieldset><a href='".$rec->download("ExportXls","sale_bill".date("Ymd").".xls")."' >";
            $str .= "<img border='0' src='./images/download.gif'>��Ŵ Excel</a></fieldset>";
            //$rec->getParam();
            $rec->setSpace($str);
        }
        $rec->setSpecial("","","","","NUMROW","�ӴѺ");
        if($_SESSION["admininvent"] == $GLOBALS["main_inv_code"])$rec->setSpecial("./images/Amber-Printer.gif","","sale_print","sano","IMAGE","�����");
		$rec->setSpecial("./images/search.gif","","sale_look","sano","IMAGE",$wording_lan["Bill_view"]);
        $str = "<fieldset ><a href='".$rec->getParam()."&excel=1' target='_self'>";
        $str .= "<img border='0' src='./images/excel.gif'>���ҧ Excel</a></fieldset>";
        $rec->setSpace($str);
        $str2 = "<fieldset ><a href='".$actual_link."invoice/aprint_sale_branch.php?bid=$bills&fdate=$fdate&tdate=$tdate&sale=$sale&inv=$inv&type=$type' target='_blank'>"; 
		$str2 .= "<img border='0' src='./images/Amber-Printer.gif'>����������</a></fieldset>";
		$rec->setSpace($str2);
        $rec->showRec(1,'SH_QUERY');
 }
?>