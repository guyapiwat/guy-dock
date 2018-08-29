<script language="javascript" type="text/javascript">
    function sale_print(id){
        var wlink = 'invoice_eatoship.php?bid='+id;
        //var wlink = 'http://yourbizasia.tua-lek.com/billprint.aspx?sano='+id;
        window.open(wlink);
    }
    function sale_cancel(id){
        if(confirm("ต้องการยกเลิกบิลนี้")){
            window.location='index.php?sessiontab=3&sub=23&state=3&bid='+id;
        }
    }
    function sale_look(id){
        var wlink = 'invoice_eatoship.php?bid='+id;
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
if (isset($_GET["sessiontab"])){$tab=$_GET["sessiontab"];} else {$tab="";}
if (isset($_GET["sub"])){$sub=$_GET["sub"];} else {$sub="sub";}
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
$sql = "SELECT cancel,".$dbprefix."eatoship.id,".$dbprefix."eatoship.uid as uid,sano,txtCash,txtFuture,txtTransfer,txtCredit1+txtCredit2+txtCredit3 as txtCredit,txtCommission,
CASE checkportal WHEN '1' THEN 'HQ' WHEN '2' THEN 'Branch' WHEN '3' THEN 'ONLINE' WHEN '9' THEN 'Commission' END AS checkportal,sadate,txtMoney ";

//$sql .= ",concat(".$dbprefix."member.name_f,' ',".$dbprefix."member.name_t) as name_t ";
if($_SESSION['lan'] == 'TH')
    {
        $sql .= ",concat(".$dbprefix."member.name_f,' ',".$dbprefix."member.name_t) as name_t ";
    }
    else
    {
        $sql .= ",concat(".$dbprefix."member.name_e,' ',".$dbprefix."member.name_t) as name_t ";
    }
    
 $sql .= ",CASE ".$dbprefix."eatoship.sa_type WHEN 'I' THEN '".$arr_ewallet_type['I']."' WHEN 'O' THEN '".$arr_ewallet_type['O']."' WHEN 'CI' THEN '".$arr_ewallet_type['CI']."' WHEN 'CO' THEN '".$arr_ewallet_type['CO']."' WHEN 'T' THEN '".$arr_ewallet_type['T']."'   END AS sa_type";
     

$sql .= ",CASE ".$dbprefix."eatoship.mcode WHEN '' THEN ".$dbprefix."eatoship.inv_code  ELSE ".$dbprefix."eatoship.mcode END AS smcode ";
$sql .= " FROM ".$dbprefix."eatoship ";
$sql .= "LEFT JOIN ".$dbprefix."member ON (".$dbprefix."eatoship.mcode=".$dbprefix."member.mcode) "; 
$sql .= "LEFT JOIN ".$dbprefix."invent ON (".$dbprefix."eatoship.inv_code=".$dbprefix."invent.inv_code) where ".$dbprefix."eatoship.mcode = '".$_SESSION["usercode"]."' and txtWithdraw = 0 and cancel = 0 and  ".$dbprefix."eatoship.sa_type <> 'I' "; 
//WHERE smcode='".$_SESSION['usercode']."' 
//echo $sql;
//$wherecause = " WHERE ";

    //$link = mysql_connect('localhost', 'root', '1422528');
    //$charset = "SET NAMES 'tis620'"; 
    //mysql_query($charset) or die('Invalid query: ' . mysql_error()); 
    //mysql_select_db('free_style',$link);
    //$rs = mysql_query("SELECT * FROM usaaba_member");
    if($_GET['state']==1){
        include("awallet_editadd.php");
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
        $rec->setLink($PHP_SELF,"sessiontab=$tab&sub=$sub");
        $rec->setBackLink($PHP_SELF,"sessiontab=$tab");
        if(isset($page))
            $rec->setCurPage($page);
        //$rec->setShowField("sano,smcode,name_t,preserve,ability,hold,sadate,tot_pv,total");
        $rec->setShowField("sadate,sano,smcode,name_t,txtMoney,txtCommission,uid,checkportal");
        $rec->setFieldFloatFormat(",,,,2,2,,");
        //$rec->setFieldDesc("เลขบิล,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,รักษายอด,ทำคุณสมบัติ,holdยอด,วันที่ซื้อ,จำนวนรวม  PV,จำนวนเงินรวม");
        $rec->setFieldDesc($wording_lan["tab4"]["7_1"].",".$wording_lan["tab4"]["7_2"].",".$wording_lan["tab4"]["7_3"].",".$wording_lan["tab4"]["7_4"].",".$wording_lan["tab4"]["7_5"].",Commission,".$wording_lan["tab4"]["7_9"].",".$wording_lan["tab4"]["7_10"]."");
        $rec->setFieldAlign("center,center,center,left,right,right,center,center");
        $rec->setFieldSpace("7%,13%,6%,40%,8%,8%,8%,8%,8%,8%");
        //$rec->setFieldLink(",,index.php?sessiontab=1&sub=5&cmc=,");
        $rec->setSearch("sano,".$dbprefix."eatoship.mcode,sadate,".$dbprefix."eatoship.uid");
        $rec->setSearchDesc($wording_lan["bill_no"].",".$wording_lan["mcode"].",".$wording_lan["Date"].",".$wording_lan["branch_or_member"]);
        $rec->setSum(true,false,",,,,true,true,");
       // $rec->setSpecial("./images/Amber-Printer.gif","","sale_print","id","IMAGE","พิมพ์");
        //$rec->setSpecial("./images/cancel.gif","","sale_cancel","id","IMAGE","ยกเลิก");
        $rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");
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
$sql .= "LEFT JOIN ".$dbprefix."member ON (".$dbprefix."asaleh.mcode=".$dbprefix."member.mcode) "; //WHERE smcode='".$_SESSION['usercode']."' 
        $rec->setQuery($sql);*/
    }

?>