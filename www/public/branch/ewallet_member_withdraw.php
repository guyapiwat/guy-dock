<?
$sale = $_POST['sale']==""?$_GET['sale']:$_POST['sale'];
$fdate = $_POST['strfdate']==""?$_GET['strfdate']:$_POST['strfdate'];
$tdate = $_POST['strtdate']==""?$_GET['strtdate']:$_POST['strtdate'];
rpdialog_m($_GET['sub']);
 
?>

<script language="javascript" type="text/javascript">
    function sale_print(id){
        var wlink = 'invoice_aprintw.php?bid='+id;
        //var wlink = 'http://yourbizasia.tua-lek.com/billprint.aspx?sano='+id;
        window.open(wlink);
    }
    function sale_cancel(id){
        if(confirm("<?=$wording_lan['Bill_21']?>")){
            window.location='index.php?sessiontab=3&sub=148&state=3&bid='+id;
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
$sql = "SELECT t.sano,t.sadate,t.mcode,t.uid,m.name_t,m1.name_t as name_t1,t.total ";
$sql .= ",CASE t.checkportal WHEN '3' THEN 'ONLINE' ELSE '' END as checkportal1 ";
$sql .= " FROM ".$dbprefix."ewallet t";
$sql .= " LEFT JOIN ".$dbprefix."member m ON(t.mcode=m.mcode)";
$sql .= " LEFT JOIN ".$dbprefix."member m1 ON(t.mcode=m1.mcode)";
$sql .= " where (t.txtWithdraw > 0 ) and sa_type='W' "; 
if($sale!=""){
$sql .= " and t.cancel = '$sale' ";
}
if($fdate !="" and $tdate !=""){
$sql .= " and t.sadate >= '$fdate'  and t.sadate <= '$tdate'  ";
}
    if($_GET['state']==1){
        include("ewallet_del.php");
    }else if($_GET['state']==2){
      
        include("ewallet_editadd.php");
    }else if($_GET['state']==3){
        include("ewallet_cancel.php");
    }else{
        $rec = new repGenerator();
        $rec->setQuery($sql);
        $rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
        $rec->setOrder($_GET['ord']==""?" mcode ":$_GET['ord']);
        $rec->setLimitPage($_GET['lp']);    
        if(isset($_POST['skey']))
            $rec->setCause($_POST['skey'],$_POST['scause']);
        else if(isset($_GET['skey']))
            $rec->setCause($_GET['skey'],$_GET['scause']);
        $rec->setSize("95%","");
        $rec->setAlign("center");
        $rec->setPageLinkAlign("right");
        //$rec->setPageLinkShow(false,false);
        $rec->setLink($PHP_SELF,"sessiontab=".$sesstab."&sub=".$_GET["sub"]."&strfdate=$fdate&strtdate=$tdate&sale=$sale");
        $rec->setBackLink($PHP_SELF,"sessiontab=".$sesstab."");
        if(isset($page))
            $rec->setCurPage($page);
        //$rec->setShowField("sano,smcode,name_t,preserve,ability,hold,sadate,tot_pv,total");
        $rec->setShowField("sadate,sano,mcode,name_t1,total");
        //$rec->setFieldSpace("5%,10%,5%,30%,10%,10%,10%,20%");    
        $rec->setFieldFloatFormat(",,,,2");
        $rec->setFieldDesc("วันที่,เลขที่บิล,รหัสผู้ถอน,ชื่อผู้ถอน,จำนวนเงิน");
        $rec->setFieldAlign("center,left,center,left,right,center");
        $rec->setSearch("sano,mcode,name_t1,total");
        $rec->setSearchDesc("เลขที่บิล,รหัสผู้ถอน,ชื่อผู้ถอน,จำนวนเงิน");
		$rec->setSum(true,false,",,,,true,");
      
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
        //$rec->setSpace($str);
        $rec->showRec(1,'SH_QUERY');
    }

?>