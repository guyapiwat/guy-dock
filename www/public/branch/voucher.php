<?
include("rpdialog.php");
$sale = $_POST['sale']==""?$_GET['sale']:$_POST['sale'];
$fdate = $_POST['fdate']==""?$_GET['fdate']:$_POST['fdate'];
$tdate = $_POST['tdate']==""?$_GET['tdate']:$_POST['tdate'];
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
            window.location='index.php?sessiontab=6&sub=147&state=3&bid='+id;
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

if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
$sql = "SELECT cancel,".$dbprefix."voucher.id,".$dbprefix."voucher.uid as uid,sano,txtCash,txtFuture,txtTransfer,txtInternet,txtCredit1+txtCredit2+txtCredit3 as txtCredit,txtCommission,
CASE checkportal WHEN '1' THEN 'HQ' WHEN '2' THEN 'Branch' WHEN '3' THEN 'ONLINE' WHEN '9' THEN 'Commission' END AS checkportal,sadate,txtMoney ";

//$sql .= ",concat(".$dbprefix."member.name_f,' ',".$dbprefix."member.name_t) as name_t ";
if($_SESSION['lan'] == 'TH')
    {
        $sql .= ",concat(".$dbprefix."member.name_f,' ',".$dbprefix."member.name_t) as name_t ";
    }
    else
    {
        $sql .= ",concat(".$dbprefix."member.name_f_en,' ',".$dbprefix."member.name_t) as name_t ";
    }
    
 $sql .= ",CASE ".$dbprefix."voucher.sa_type WHEN 'I' THEN '".$arr_ewallet_type['I']."' WHEN 'O' THEN '".$arr_ewallet_type['O']."' WHEN 'CI' THEN '".$arr_ewallet_type['CI']."' WHEN 'CO' THEN '".$arr_ewallet_type['CO']."' WHEN 'T' THEN '".$arr_ewallet_type['T']."'   END AS sa_type";
     

$sql .= ",CASE ".$dbprefix."voucher.mcode WHEN '' THEN ".$dbprefix."voucher.inv_code  ELSE ".$dbprefix."voucher.mcode END AS smcode ";
$sql .= " FROM ".$dbprefix."voucher ";
$sql .= "LEFT JOIN ".$dbprefix."member ON (".$dbprefix."voucher.mcode=".$dbprefix."member.mcode) "; 
$sql .= "LEFT JOIN ".$dbprefix."invent ON (".$dbprefix."voucher.inv_code=".$dbprefix."invent.inv_code) where  txtWithdraw = 0  "; 
//echo $sql;
//$wherecause = " WHERE ";

    //$link = mysql_connect('localhost', 'root', '1422528');
    //$charset = "SET NAMES 'tis620'"; 
    //mysql_query($charset) or die('Invalid query: ' . mysql_error()); 
    //mysql_select_db('free_style',$link);
    //$rs = mysql_query("SELECT * FROM usaaba_member");
    if($_GET['state']==1){
        include("eatoship_del.php");
    }else if($_GET['state']==2){
        include("eatoship_editadd.php");
    }else if($_GET['state']==3){
        include("eatoship_cancel.php");
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
        $rec->setLink($PHP_SELF,"sessiontab=".$sesstab."&sub=".$_GET["sub"]."&fdate=$fdate&tdate=$tdate&sale=$sale");
        $rec->setBackLink($PHP_SELF,"sessiontab=".$sesstab."");
        if(isset($page))
            $rec->setCurPage($page);
        //$rec->setShowField("sano,smcode,name_t,preserve,ability,hold,sadate,tot_pv,total");
      $rec->setShowField("sadate,sano,smcode,name_t,txtMoney,txtCash,txtTransfer,txtCredit,txtCommission,sa_type,uid,checkportal");
        $rec->setFieldFloatFormat(",,,,2,2,2,2,2,,");
        //$rec->setFieldDesc("เลขบิล,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,รักษายอด,ทำคุณสมบัติ,holdยอด,วันที่ซื้อ,จำนวนรวม  PV,จำนวนเงินรวม");
        $rec->setFieldDesc("วันที่,เลขที่บิล,รหัสผู้ซื้อ,ชื่อ,จำนวนเงินรวม,เงินสด,เงินโอน,บัตรเครดิต,Commission,Type,สาขาหรือพนักงาน	,ช่องทาง");
        $rec->setFieldAlign("center,center,center,left,right,right,right,right,right,right,right,center");
        $rec->setFieldSpace("7%,13%,6%,10%,8%,8%,8%,8%,8%,8%");
        //$rec->setFieldLink(",,index.php?sessiontab=1&sub=5&cmc=,");
        $rec->setSearch("sano,".$dbprefix."voucher.mcode,sadate,".$dbprefix."voucher.uid");
        $rec->setSearchDesc("เลขที่บิล,รหัสสมาชิก,วันที่,สาขาหรือพนักงาน");
    //    $rec->setSearchDesc("เลขบิล,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,วันที่ซื้อ,จำนวนรวม  PV,จำนวนเงินรวม,สาขาหรือพนักงาน");
      
        $rec->setSum(true,false,",,,,true,true,true,true,");
        //$rec->setSpecial("./images/Amber-Printer.gif","","sale_print","id","IMAGE",$wording_lan["Bill_print"]);
       // $rec->setSpecial("./images/search.gif","","sale_look","id","IMAGE",$wording_lan["Bill_view"]);
        if($acc->isAccess(4) and $_SESSION["inventobj6"] == '7'){
          //  $rec->setSpecial("./images/cancel.gif","","sale_cancel","id","IMAGE",$wording_lan["Bill_cancle"]);
        }    
        //$rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");
        /*if($acc->isAccess(4)){
            $rec->setDel("index.php","id","id","sessiontab=3&sub=148");
            $rec->setFromDelAttr("maindel","./index.php?sessiontab=3&sub=148&state=1","post","delfield");
        }*/
       // $rec->setSpecial("./images/cancel.gif","","sale_cancel","id","IMAGE","ยกเลิก");
        $rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");
        //var_dump($acc->isAccess(2));
        //exit;
        if($_GET['excel']==1){
            $rec->exportXls("ExportXls","ewallet".date("Ymd").".xls","SH_QUERY");
            $str = "<fieldset><a href='".$rec->download("ExportXls","ewallet".date("Ymd").".xls")."' >";
            $str .= "<img border='0' src='./images/download.gif'>".$wording_lan["Billjang_loding"]." Excel</a></fieldset>";
            //$rec->getParam();
            $rec->setSpace($str);
        }
        $str = "<fieldset><a href='".$rec->getParam()."&excel=1' target='_self'>";
        $str .= "<img border='0' src='./images/excel.gif'>".$wording_lan["Billjang_cre"]." Excel</a></fieldset>";
        $rec->setSpace($str);
        $rec->showRec(1,'SH_QUERY');
/*$sql = "SELECT cancel,".$dbprefix."asaleh.id,sano,sadate,tot_pv,total,name_t,".$dbprefix."asaleh.mcode AS smcode";
$sql .= ",CASE sa_type WHEN 'Q' THEN '1' ELSE '' END AS preserve ";
$sql .= ",CASE sa_type WHEN 'A' THEN '1' ELSE '' END AS ability ";
$sql .= ",CASE sa_type WHEN 'H' THEN '1' ELSE '' END AS hold ";
$sql .= "FROM ".$dbprefix."asaleh ";
$sql .= "LEFT JOIN ".$dbprefix."member ON (".$dbprefix."asaleh.mcode=".$dbprefix."member.mcode) "; //WHERE smcode='".$_SESSION['usercode']."' 
        $rec->setQuery($sql);*/
    }

?>