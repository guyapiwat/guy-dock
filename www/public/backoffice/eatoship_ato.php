<script language="javascript" type="text/javascript">
    function sale_print(id){
        var wlink = 'invoice_aprintw1.php?bid='+id;
        //var wlink = 'http://yourbizasia.tua-lek.com/billprint.aspx?sano='+id;
        window.open(wlink);
    }
    function sale_cancel(id){
        if(confirm("ต้องการยกเลิกบิลนี้")){
            window.location='index.php?sessiontab=3&sub=23&state=3&bid='+id;
        }
    }
    function sale_look(id){
        var wlink = 'invoice_aprintw_look1.php?bid='+id;
        //var wlink = 'http://yourbizasia.tua-lek.com/billprint.aspx?sano='+id;
        window.open(wlink);
        //window.location.reload();
        //window.location='index.php?sessiontab=3&sub=6&sanooo='+id;
    }
</script>
<?
require("connectmysql.php");
require("date_picker.php");   
if (isset($_GET["sub"])){$sub=$_GET["sub"];} else {$sub="";}
if (isset($_GET["sessiontab"])){$tab=$_GET["sessiontab"];} else {$tab="";}
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
$sql = "SELECT cancel,".$dbprefix."eatoship.id,
CASE checkportal WHEN '1' THEN 'HQ' WHEN '2' THEN 'Branch' WHEN '3' THEN 'ONLINE' WHEN '9' THEN 'Commission' WHEN '8' THEN 'Withdraw'  END AS checkportal,".$dbprefix."eatoship.uid as uid,sano,txtCash,txtFuture,txtTransfer,txtCommission,txtWithdraw,txtCredit1+txtCredit2+txtCredit3 as txtCredit,sadate,txtMoney ,".$dbprefix."member.name_t ";

$sql .= ",CASE ".$dbprefix."eatoship.sa_type WHEN 'I' THEN '".$arr_ewallet_type['I']."' WHEN 'O' THEN '".$arr_ewallet_type['O']."' WHEN 'CI' THEN '".$arr_ewallet_type['CI']."' WHEN 'CO' THEN '".$arr_ewallet_type['CO']."' WHEN 'T' THEN '".$arr_ewallet_type['T']."'   END AS sa_type";


$sql .= ",CASE ".$dbprefix."eatoship.mcode WHEN '' THEN ".$dbprefix."eatoship.inv_code  ELSE ".$dbprefix."eatoship.mcode END AS smcode ";
$sql .= " FROM ".$dbprefix."eatoship ";
$sql .= " LEFT JOIN ".$dbprefix."member on (".$dbprefix."eatoship.mcode = ".$dbprefix."member.mcode) where 1=1 and ".$dbprefix."eatoship.checkportal = '9' and ".$dbprefix."eatoship.sa_type = 'CI' and ".$dbprefix."eatoship.cancel = '0' ";


$fdate = $_POST['fdate']==""?$_GET['fdate']:$_POST['fdate'];
$tdate = $_POST['tdate']==""?$_GET['tdate']:$_POST['tdate'];
$cancel = $_POST['cancel']==""?$_GET['cancel']:$_POST['cancel'];
rpdialog_sale1($_GET['sub'],$fdate,$tdate,$sale);

$monthmonth = explode("-",$fdate);
//$fdate = $monthmonth[0].'-'.$monthmonth[1];
//if(!empty($fdate))
//$sql .= " and sadate like '%$fdate%'  ";

if(!empty($fdate)){
$sql .= " and sadate >= '$fdate'  and sadate <= '$tdate'  ";
}
if($cancel!=""){
$sql .= " and cancel = $cancel";
}
//echo $sql;
    if($_GET['state']==1){
        include("awallet_del.php");
    }else if($_GET['state']==2){
        include("awallet_editadd.php");
    }else if($_GET['state']==3){
        include("awallet_cancel.php");
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
        $rec->setLink($PHP_SELF,"sessiontab=$tab&sub=$sub&fdate=$fdate&tdate=$tdate&cancel=$cancel");
        $rec->setBackLink($PHP_SELF,"sessiontab=$tab");
        if(isset($page))
            $rec->setCurPage($page);
        //$rec->setShowField("sano,smcode,name_t,preserve,ability,hold,sadate,tot_pv,total");
        $rec->setShowField("sadate,sano,smcode,name_t,txtCommission,uid,checkportal");
        $rec->setFieldFloatFormat(",,,,2,,,,");
        //$rec->setFieldDesc("เลขบิล,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,รักษายอด,ทำคุณสมบัติ,holdยอด,วันที่ซื้อ,จำนวนรวม  PV,จำนวนเงินรวม");
        $rec->setFieldDesc("วันที่ซื้อ,เลขบิล,รหัสสมาชิก,ชื่อสมาชิก,Eautoship,ผู้บันทึก,ช่องทาง");
        $rec->setFieldAlign("center,center,center,left,right,center,center,right,right,center,center,right,center");
        //$rec->setFieldSpace("7%,13%,7%,30%,10%,10%,10%,8%,8%,8%");
        //$rec->setFieldLink(",,index.php?sessiontab=1&sub=5&cmc=,");
        $rec->setSearch("sano,".$dbprefix."eatoship.mcode,".$dbprefix."member.name_t,sadate,".$dbprefix."eatoship.uid");
        $rec->setSearchDesc("เลขบิล,รหัสสมาชิก,ชื่อสมาชิก,วันที่ซื้อ,ผู้บันทึก");
        $rec->setSum(true,false,",,,,true,,");
       // $rec->setSpecial("./images/Amber-Printer.gif","","sale_print","id","IMAGE","พิมพ์");
        //$rec->setSpecial("./images/cancel.gif","","sale_cancel","id","IMAGE","ยกเลิก");
        //$rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");
        /*if($acc->isAccess(4)){
            $rec->setDel("index.php","id","id","sessiontab=3&sub=23");
            $rec->setFromDelAttr("maindel","./index.php?sessiontab=3&sub=23&state=1","post","delfield");
        }*/
      //  $rec->setSpecial("./images/search.gif","","sale_look","id","IMAGE","ดู");
	  if($_GET['excel']==1){
			$rec->exportXls("ExportXls","autoship".date("Ymd").".xls","SH_QUERY");
			$str = "<fieldset><a href='".$rec->download("ExportXls","autoship".date("Ymd").".xls")."' >";
			$str .= "<img border='0' src='./images/download.gif'>โหลด Excel</a></fieldset>";
			$rec->getParam();
			$rec->setSpace($str);
		}
		$str = "<fieldset><a href='".$rec->getParam()."&excel=1' target='_self'>";
		$str .= "<img border='0' src='./images/excel.gif'>สร้าง Excel</a></fieldset>";
		$rec->setSpace($str);
        if($acc->isAccess(2)){
        $rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");
    //    $rec->setSpecial("./images/cancel.gif","","sale_cancel","id","IMAGE","ยกเลิก");
        }
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

<?function rpdialog_sale1($sub,$fdate,$tdate,$sale){ ?>

<form name="rform" method="post" action="./index.php?sessiontab=<?=$_GET['sessiontab']?>&sub=<?=$sub?>">
     <table width="40%" border="1" cellpadding="0" cellspacing="0" bordercolor="#FF7F00" align="center">
      <tr><td colspan="6" align="center">&nbsp;</td></tr> 
      <tr>    
       <td align="center">วันที่
        <input type="text" id="dateInput1" onkeypress="return chknum(window.event.keyCode)" name="fdate" size="10" maxlength="10" value="<?=$fdate?>" placeholder="2014-01-20"/>
        &nbsp;&nbsp;
        ถึง
        &nbsp;&nbsp;
        <input type="text" id="dateInput2" onkeypress="return chknum(window.event.keyCode)" name="tdate" size="10" maxlength="10" value="<?=$tdate?>" placeholder="2014-01-31"/>         
		บิล<select name="cancel">
			<option value="" <?if($_REQUEST['cancel']=="") echo "selected"; ?> >ทั้งหมด</option>
			<option value="0" <?if($_REQUEST['cancel']=="0") echo "selected"; ?> >ไม่ยกเลิก</option>
			<option value="1" <?if($_REQUEST['cancel']=="1") echo "selected"; ?> >ยกเลิก</option>
		</select>
       <td align="center"> 
       <input type="submit" name="Submit" value="ตกลง">
        &nbsp;<!--input type="button" name="Submit" value="ดูรายงาน" onclick="checkround()" /--></td>
      </tr>
     <tr><td colspan="6" align="center">&nbsp;</td></tr>
    </table>
</form>
<?}?>
