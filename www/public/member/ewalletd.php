<script language="javascript" type="text/javascript">
    function sale_print(id){
        var wlink = 'invoice_aprintw.php?bid='+id;
        //var wlink = 'http://yourbizasia.tua-lek.com/billprint.aspx?sano='+id;
        window.open(wlink);
    }
    function sale_cancel(id){
        if(confirm("ต้องการยกเลิกบิลนี้")){
            window.location='index.php?sessiontab=3&sub=23&state=3&bid='+id;
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
require("function.php");
require("./cls/repGenerator.php");

if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
$sql = "SELECT cancel,ew.id,ew.uid as uid,sano,total,txtCash,txtFuture,txtTransfer,txtInternet,txtInternet as txtWithdraw1,txtCredit1+txtCredit2+txtCredit3 as txtCredit,txtCommission,
CASE checkportal WHEN '1' THEN 'HQ' WHEN '2' THEN 'Branch' WHEN '3' THEN 'ONLINE' END AS checkportal,sadate,txtMoney,ew.uid as mcode1 ";

            if($_SESSION['lan'] == 'TH')
            {
                $sql .= ",concat(m.name_f,' ',m.name_t) as name_t ";
            }
            else
            {
                $sql .= ",concat(m.name_f_en,' ',m.name_t) as name_t ";
            }

$sql .= ",CASE ew.sa_type WHEN 'I' THEN '".$arr_ewallet_type['I']."' WHEN 'O' THEN '".$arr_ewallet_type['O']."' WHEN 'CI' THEN '".$arr_ewallet_type['CI']."' WHEN 'CO' THEN '".$arr_ewallet_type['CO']."' WHEN 'T' THEN '".$arr_ewallet_type['T']."'   END AS sa_type";
   
$sql .= ",CASE ew.mcode WHEN '' THEN ew.inv_code  ELSE ew.mcode END AS smcode ";
$sql .= " FROM ".$dbprefix."ewallet ew";
$sql .= "LEFT JOIN ".$dbprefix."member m ON (ew.uid=m.mcode) "; 
$sql .= "LEFT JOIN ".$dbprefix."invent iv ON (ew.inv_code=iv.inv_code) where ew.mcode = '".$_SESSION["usercode"]."' and cancel = 0 and ew.checkportal <> '2' and ew.sano LIKE 'EI%' "; 
//WHERE smcode='".$_SESSION['usercode']."' 
//echo $sql;
 
//$wherecause = " WHERE ";

    //$link = mysql_connect('localhost', 'root', '1422528');
    //$charset = "SET NAMES 'tis620'"; 
    //mysql_query($charset) or die('Invalid query: ' . mysql_error()); 
    //mysql_select_db('free_style',$link);
    //$rs = mysql_query("SELECT * FROM usaaba_member");
    if($_GET['state']==1){
        include("ewallet_editadd.php");
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
        $rec->setLink($PHP_SELF,"sessiontab=4&sub=22");
        $rec->setBackLink($PHP_SELF,"sessiontab=4");
        if(isset($page))
            $rec->setCurPage($page);
        //$rec->setShowField("sano,smcode,name_t,preserve,ability,hold,sadate,tot_pv,total");
        $rec->setShowField("sadate,sano,mcode1,name_t,txtWithdraw1,checkportal");
        $rec->setFieldFloatFormat(",,,,2,");
        //$rec->setFieldDesc("เลขบิล,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,รักษายอด,ทำคุณสมบัติ,holdยอด,วันที่ซื้อ,จำนวนรวม  PV,จำนวนเงินรวม");
        $rec->setFieldDesc("วันที่,เลขที่บิล,รหัสผู้โอน,ชื่อผู้รับโอน,จำนวนเงิน,ช่องทาง");
        $rec->setFieldAlign("center,left,center,left,right,center");
        $rec->setFieldSpace("10%,10%,10%,50%,10%,10%");
        //$rec->setFieldLink(",,index.php?sessiontab=1&sub=5&cmc=,");
        $rec->setSearch("ew.sadate,ew.sano,ew.uid,m.name_t,ew.total");
        $rec->setSearchDesc("วันที่,เลขที่บิล,รหัสผู้โอน,ชื่อผู้โอน,จำนวนเงิน");

        $rec->setSum(true,false,",,,,true,");
    //    $rec->setSpecial("./images/Amber-Printer.gif","","sale_print","id","IMAGE","พิมพ์");
        //$rec->setSpecial("./images/cancel.gif","","sale_cancel","id","IMAGE","ยกเลิก");
        //$rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");
        /*if($acc->isAccess(4)){
            $rec->setDel("index.php","id","id","sessiontab=3&sub=23");
            $rec->setFromDelAttr("maindel","./index.php?sessiontab=3&sub=23&state=1","post","delfield");
        }*/
        $rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");
        //var_dump($acc->isAccess(2));
        //exit;
        //if($acc->isAccess(2))
            //$rec->setEdit("index.php","id","id","sessiontab=3&sub=23");
        $rec->showRec(1,'SH_QUERY');
/*$sql = "SELECT cancel,".$dbprefix."asaleh.id,sano,sadate,tot_pv,total,name_t,".$dbprefix."asaleh.mcode AS smcode";
$sql .= ",CASE sa_type WHEN 'Q' THEN '1' ELSE '' END AS preserve ";
$sql .= ",CASE sa_type WHEN 'A' THEN '1' ELSE '' END AS ability ";
$sql .= ",CASE sa_type WHEN 'H' THEN '1' ELSE '' END AS hold ";
$sql .= "FROM ".$dbprefix."asaleh ";
$sql .= "LEFT JOIN m ON (".$dbprefix."asaleh.mcode=m.mcode) "; //WHERE smcode='".$_SESSION['usercode']."' 
        $rec->setQuery($sql);*/
    }

?>