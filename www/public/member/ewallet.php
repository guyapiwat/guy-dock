<? 
session_start();    
include("global.php");
?> 
<? include("rpdialog.php");?>
<script language="javascript" type="text/javascript">
    function sale_print(id){
        var wlink = 'invoice_aprintw.php?bid='+id;                                   
        window.open(wlink);
    }
    function sale_cancel(id){
        if(confirm("ต้องการยกเลิกบิลนี้")){
            window.location='index.php?sessiontab=3&sub=23&state=3&bid='+id;
        }
    }
    function sale_look(id){
        var wlink = 'invoice_aprintw_look.php?bid='+id;                                  
        window.open(wlink);                                            
    }
</script>  
<style type="text/css">
.btn1 {
    width: 80px;
    -moz-box-shadow: inset 0px 1px 0px 0px #97c4fe;
    -webkit-box-shadow: inset 0px 1px 0px 0px #97c4fe;
    box-shadow: inset 0px 1px 0px 0px #97c4fe;
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0.05, #3d94f6), color-stop(1, #1e62d0));
    background: -moz-linear-gradient(top, #3d94f6 5%, #1e62d0 100%);
    background: -webkit-linear-gradient(top, #3d94f6 5%, #1e62d0 100%);
    background: -o-linear-gradient(top, #3d94f6 5%, #1e62d0 100%);
    background: -ms-linear-gradient(top, #3d94f6 5%, #1e62d0 100%);
    background: linear-gradient(to bottom, #3d94f6 5%, #1e62d0 100%);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#3d94f6', endColorstr='#1e62d0',GradientType=0);
    background-color: #3d94f6;
    -moz-border-radius: 4px;
    -webkit-border-radius: 4px;
    border-radius: 4px;
    border: 1px solid #337fed;
    display: inline-block;
    cursor: pointer;
    color: #ffffff;
    padding: 3px 10px;
    text-decoration: none;
    text-shadow: 0px 1px 0px #1570cd;
}
  .btn2 {
    width: 70px;
    -moz-box-shadow: inset 0px 1px 0px 0px #f7c5c0;
    -webkit-box-shadow: inset 0px 1px 0px 0px #f7c5c0;
    box-shadow: inset 0px 1px 0px 0px #f7c5c0;
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0.05, #fc8d83), color-stop(1, #e4685d));
    background: -moz-linear-gradient(top, #fc8d83 5%, #e4685d 100%);
    background: -webkit-linear-gradient(top, #fc8d83 5%, #e4685d 100%);
    background: -o-linear-gradient(top, #fc8d83 5%, #e4685d 100%);
    background: -ms-linear-gradient(top, #fc8d83 5%, #e4685d 100%);
    background: linear-gradient(to bottom, #fc8d83 5%, #e4685d 100%);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#fc8d83', endColorstr='#e4685d',GradientType=0);
    background-color: #fc8d83;
    -moz-border-radius: 4px;
    -webkit-border-radius: 4px;
    border-radius: 4px;
    border: 1px solid #d83526;
    display: inline-block;
    cursor: pointer;
    color: #ffffff;
    color: #ffffff;
    padding: 3px 10px;
    text-decoration: none;
    text-shadow: 0px 1px 0px #810e05;
}  
.btn3 {
    width: 70px;
    -moz-box-shadow: inset 0px 1px 0px 0px #ffffff;
    -webkit-box-shadow: inset 0px 1px 0px 0px #ffffff;
    box-shadow: inset 0px 1px 0px 0px #ffffff;
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0.05, #9CCD65), color-stop(1, #00C000));
    background: -moz-linear-gradient(top, #9CCD65 5%, #00C000 100%);
    background: -webkit-linear-gradient(top, #9CCD65 5%, #00C000 100%);
    background: -o-linear-gradient(top, #9CCD65 5%, #00C000 100%);
    background: -ms-linear-gradient(top, #9CCD65 5%, #00C000 100%);
    background: linear-gradient(to bottom, #9CCD65 5%, #00C000 100%);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#9CCD65', endColorstr='#00C000',GradientType=0);
    background-color: #9CCD65;
    -moz-border-radius: 4px;
    -webkit-border-radius: 4px;
    border-radius: 4px;
    border: 1px solid #00B400;
    display: inline-block;
    cursor: pointer;
    color: #ffffff;
    color: #ffffff;
    padding: 3px 10px;
    text-decoration: none;
    text-shadow: 0px 1px 0px #00A900;
}  
</style>        
<?
if($_SESSION["lan"] != $_GET["lan"] and !empty($_GET["lan"])){
    if(empty($_GET["lan"]))$_SESSION["lan"] = "TH";
    else $_SESSION["lan"] = $_GET["lan"];
}else{
    if(empty($_SESSION["lan"]))$_SESSION["lan"] = "TH";
}
include_once("wording".$_SESSION["lan"].".php"); 
include("connectmysql.php");
include("./cls/repGenerator.php");
include("prefix.php");
//rpdialog_m(1);
//var_dump($_POST);
$strtdate=$fdate=$_SESSION['fdate'];
$strtdate=$tdate=$_SESSION['tdate'];

if (isset($_REQUEST["strtdate"])){$strtdate=$_REQUEST["strtdate"];} else {$strtdate=$_SESSION['tdate'];}
if (isset($_REQUEST["strfdate"])){$strfdate=$_REQUEST["strfdate"];} else {$strfdate=$_SESSION['fdate'];}

   
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
 
     
        /////////// LOG //////////////

$sql = "SELECT cancel,e.id,e.uid as uid,sano,txtCash,txtFuture,txtTransfer,txtWithdraw,txtCommission,txtTransfer_in,txtTransfer_out,txtCredit1+txtCredit2+txtCredit3 as txtCredit,
CASE checkportal WHEN '1' THEN 'HQ' WHEN '2' THEN 'Branch' WHEN '3' THEN 'ONLINE' END AS checkportal,sadate,txtMoney ,concat(m.name_f,' ',m.name_t) as name_t ";
$sql .= ",CASE e.mcode WHEN '' THEN e.inv_code  ELSE e.mcode END AS smcode ";
$sql .= " FROM ".$dbprefix."ewallet e ";
$sql .= "LEFT JOIN ".$dbprefix."member m ON (e.mcode=m.mcode) "; 
$sql .= "LEFT JOIN ".$dbprefix."invent i ON (e.inv_code=i.inv_code) where e.mcode = '".$_SESSION["usercode"]."' and cancel = 0 and sa_type <> 'TI' and sa_type <> 'TO' and sa_type <> 'T' and sa_type <> 'W' and sa_type <> 'CI' and (txtCash > 0  or txtFuture > 0 or txtTransfer > 0 or txtCredit1 > 0  or txtCredit2 > 0   or txtCredit3 > 0 or txtInternet > 0) ";  

if($strfdate !="" and $strtdate !="")$sql.=" and sadate BETWEEN '$strfdate' and '$strtdate'";

    if($_GET['state']==1){
        include("ewallet_del.php");
    }else if($_GET['state']==2){
        include("ewallet_editadd.php");
    }else if($_GET['state']==3){
        include("ewallet_cancel.php");
    }else{
        $rec = new repGenerator();
        $rec->setQuery($sql);
        if($_GET['report'] == '1'){
            $rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
            $rec->setOrder($_GET['ord']==""?" id ":$_GET['ord']);
        }else{
            $rec->setSort("UP");
            $rec->setOrder("id");
        }
        $rec->setLimitPage($_GET['lp']);    
        if(isset($_POST['skey']))
            $rec->setCause($_POST['skey'],$_POST['scause']);
        else if(isset($_GET['skey']))
            $rec->setCause($_GET['skey'],$_GET['scause']);
        $rec->setSize("95%","");
        $rec->setAlign("center");
        $rec->setPageLinkAlign("right");           
        $rec->setLink($PHP_SELF,"sessiontab=".$sesstab."&sub=".$_GET["sub"]."&strfdate=".$strfdate."&strtdate=".$strtdate."&report=1");
        $rec->setBackLink($PHP_SELF,"sessiontab=".$sesstab."");
        if(isset($page))
            $rec->setCurPage($page);                                                             
        $rec->setShowField("sadate,sano,txtMoney,txtCash,txtTransfer,txtCredit,uid,checkportal");
        $rec->setFieldFloatFormat(",,2,2,2,2,,,,");  
        $rec->setFieldDesc($wording_lan["tab4"]["7_1"].",".$wording_lan["tab4"]["7_2"].",".$wording_lan["tab4"]["7_5"].",".$wording_lan["tab4"]["7_6"].",".$wording_lan["tab4"]["7_7"].",".$wording_lan["tab4"]["7_8"].",".$wording_lan["tab4"]["7_9"].",".$wording_lan["tab4"]["7_10"]."");
        $rec->setFieldAlign("center,center,right,right,right,right,center,center");
       // $rec->setFieldSpace("7%,5%,8%,15%,8%,8%,8%,8%,8%,8%,8%,8%");           
        $rec->setSum(true,false,",,true,true,true,true,,");
        //$rec->setSpecial("./images/Amber-Printer.gif","","sale_print","sano","IMAGE","พิมพ์");     
        $rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");             
        $rec->showRec(1,'SH_QUERY');             
    }
?>