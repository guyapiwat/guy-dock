<?

$sale = $_POST['sale']==""?$_GET['sale']:$_POST['sale'];
$fdate = $_POST['fdate']==""?$_GET['fdate']:$_POST['fdate'];
$tdate = $_POST['tdate']==""?$_GET['tdate']:$_POST['tdate'];
$inv_code = $_POST['inv_code']==""?$_GET['inv_code']:$_POST['inv_code'];

if(!empty($_GET['bills'])){$bills = $_GET['bills'];}else {if(!empty($_POST['bills'])){$bills = $_POST['bills'];}else{$bills='';}}


$where_bills = findBills("sano","ewa",$bills);
//echo $where_bills;
rpdialog_sale($_GET['sub'],$fdate,$tdate,$sale);
?>

<script language="javascript" type="text/javascript">
    function sale_print(id){
        var wlink = 'invoice_aprintw.php?bid='+id;
        //var wlink = 'http://yourbizasia.tua-lek.com/billprint.aspx?sano='+id;
        window.open(wlink);
    }
    function sale_cancel(id){
        if(confirm("<?=$wording_lan['Bill_21']?>")){
            var remark = prompt("��سҡ�͡�����˵� ���","");
            if(remark == ""){
                alert("�س������͡�����˵� ���");
            }
            else{
                window.location='index.php?sessiontab=3&sub=148&state=3&bid='+id+'&remark='+remark;
            }
        }
            
    }
    function sale_look(id){
        var wlink = 'invoice_aprintw_look.php?bid='+id;
        //var wlink = 'http://yourbizasia.tua-lek.com/billprint.aspx?sano='+id;
        window.open(wlink);
        //window.location.reload();
        //window.location='index.php?sessiontab=3&sub=6&sanooo='+id;
    }
</script>
<?
require("connectmysql.php");


 $set_payment = query("*",'ali_payment pm '," 1=1 and pm.shows_ewallet = 1 ORDER BY pm.id"); 
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
            $sqlx .= "ewa.{$valx}"; 
            if($keyx+1 != count($val))$sqlx .= "+";
            $keyx++;
            endforeach;
            $sqlx .= ") as $key";
            $colome.= ','.$key;
            $Format.= ',2';
            $Sum.= ',true';
 endforeach;
 

if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
$sql = "SELECT cancel,ewa.id,ewa.lid as lid,sano,concat(ewa.name_f,' ',ewa.name_t) as name_t,ewa.remark as remark,sadate,txtMoney ";
$sql .= $sqlx;
$sql .= ",CASE ewa.mcode WHEN '' THEN ewa.inv_code  ELSE ewa.mcode END AS smcode ";
$sql .= " FROM ".$dbprefix."ewallet ewa";
$sql .= " where ewa.lid  = '{$_SESSION["admininvent"]}' and txtTransfer_out = 0 and txtTransfer_in = 0 and sa_type <> 'TI' and sa_type <> 'TO' and sa_type <> 'T' and sa_type <> 'W' "; 
if(!empty($sale)){
    if($sale=='A')$sale = 0;
$sql .= " and cancel = '$sale' ";
}
if(!empty($fdate)){
$sql .= " and sadate >= '$fdate'  and sadate <= '$tdate'  ";
}
if(!empty($where_bills))$sql .= " and ".$where_bills." ";

    if($_GET['state']==1){
        include("ewallet_del.php");
    }else if($_GET['state']==2){
        //include("ewallet_editadd.php");
        include("ewallet_editadd_new.php");
    }else if($_GET['state']==3){
        include("ewallet_cancel.php");
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
        //$rec->setPageLinkShow(false,false);
        $rec->setLink($PHP_SELF,"sessiontab=".$sesstab."&sub=".$_GET["sub"]."&fdate=$fdate&tdate=$tdate&sale=$sale&bills=$bills");
        $rec->setBackLink($PHP_SELF,"sessiontab=".$sesstab."");
        if(isset($page))
            $rec->setCurPage($page); 
        $rec->setShowField("sadate,sano,smcode,name_t,txtMoney".$colome.",lid,remark");
        $rec->setFieldFloatFormat(",,,,2".$Format.",,,");
        $rec->setSum(true,false,",,,,true".$Sum.",");
        //$rec->setFieldDesc("�Ţ���,���ʼ�����,���ͼ�����,�ѡ���ʹ,�Ӥس���ѵ�,hold�ʹ,�ѹ������,�ӹǹ���  PV,�ӹǹ�Թ���");
        //$rec->setFieldDesc("�ѹ������,�Ţ���,���ʼ�����,���ͼ�����,�ӹǹ�Թ���,�Թʴ,�Թ�͹,�ѵ��ôԵ,�Ң� ���� ��ѡ�ҹ");
        $rec->setFieldDesc($wording_lan["Billjang_4"].",".$wording_lan["Billjang_1"].",".$wording_lan["Bill_3"].",".$wording_lan["Bill_4"].",".$wording_lan["Billjang_6"]."".$colome_text.",".$wording_lan["Billjang_17"].",�����˵�");
        $rec->setFieldAlign("center,center,center,left,right,right,right,right,right,right,right,right,center");
        //$rec->setFieldSpace("10%,12%,10%,26%,8%,8%,8%,8%,8%,8%");
        //$rec->setFieldLink(",,index.php?sessiontab=1&sub=5&cmc=,");
        $rec->setSearch("sadate,sano,ewa.mcode,name_t,txtMoney,lid");
    //    $rec->setSearchDesc("�Ţ���,���ʼ�����,���ͼ�����,�ѹ������,�ӹǹ���  PV,�ӹǹ�Թ���,�Ң����;�ѡ�ҹ");
        $rec->setSearchDesc($wording_lan["Billjang_4"].",".$wording_lan["Billjang_1"].",".$wording_lan["Bill_3"].",".$wording_lan["Bill_4"].",".$wording_lan["Billjang_6"].",".$wording_lan["Billjang_17"]);
        
       	
		$rec->setSpecial("./images/Amber-Printer.gif","","sale_print","sano","IMAGE","�����");

        $rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE"); 
        if($_GET['excel']==1){
            $rec->exportXls("ExportXls","ewallet".date("Ymd").".xls","SH_QUERY");
            $str = "<fieldset><a href='".$rec->download("ExportXls","ewallet".date("Ymd").".xls")."' >";
            $str .= "<img border='0' src='./images/download.gif'>".$wording_lan["Billjang_loding"]." Excel</a></fieldset>"; 
            $rec->setSpace($str);
        }
        $str = "<fieldset><a href='".$rec->getParam()."&excel=1' target='_self'>";
        $str .= "<img border='0' src='./images/excel.gif'>".$wording_lan["Billjang_cre"]." Excel</a></fieldset>";
        $rec->setSpace($str);
		
		$t_inv_code="";

		if($inv_code!=""){$t_inv_code = "&inv=".$inv_code;}
		
		$str2 = "<fieldset ><a href='invoice_aprintw.php?bid=$bills".$t_inv_code."' target='_blank'>";
		$str2 .= "<img border='0' src='./images/Amber-Printer.gif'>����������</a></fieldset>";
		$rec->setSpace($str2);
        $rec->showRec(1,'SH_QUERY');
 
    }

?>