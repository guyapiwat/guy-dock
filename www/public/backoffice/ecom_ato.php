<?
require("connectmysql.php");
require("date_picker.php");   
if (isset($_GET["sub"])){$sub=$_GET["sub"];} else {$sub="";}
if (isset($_GET["sessiontab"])){$tab=$_GET["sessiontab"];} else {$tab="";}
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
$sql = "SELECT cancel,".$dbprefix."ewallet_commission.id,
CASE checkportal WHEN '1' THEN 'HQ' WHEN '2' THEN 'Branch' WHEN '3' THEN 'ONLINE' WHEN '9' THEN 'Commission' WHEN '8' THEN 'Withdraw'  END AS checkportal,".$dbprefix."ewallet_commission.uid as uid,sano,txtCash,txtFuture,txtTransfer,txtCommission,txtWithdraw,txtCredit1+txtCredit2+txtCredit3 as txtCredit,sadate,txtMoney ,".$dbprefix."member.name_t ";

$sql .= ",CASE ".$dbprefix."ewallet_commission.sa_type WHEN 'I' THEN '".$arr_ewallet_type['I']."' WHEN 'O' THEN '".$arr_ewallet_type['O']."' WHEN 'CI' THEN '".$arr_ewallet_type['CI']."' WHEN 'CO' THEN '".$arr_ewallet_type['CO']."' WHEN 'T' THEN '".$arr_ewallet_type['T']."'   END AS sa_type";

$sql .= ",CASE ".$dbprefix."ewallet_commission.mcode WHEN '' THEN ".$dbprefix."ewallet_commission.inv_code  ELSE ".$dbprefix."ewallet_commission.mcode END AS smcode ";
$sql .= " FROM ".$dbprefix."ewallet_commission ";
$sql .= " LEFT JOIN ".$dbprefix."member on (".$dbprefix."ewallet_commission.mcode = ".$dbprefix."member.mcode) where 1=1 and ".$dbprefix."ewallet_commission.checkportal = '9' and ".$dbprefix."ewallet_commission.sa_type = 'CI' and ".$dbprefix."ewallet_commission.cancel = '0' ";


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
$rec->setShowField("sadate,sano,smcode,name_t,txtCommission,uid,checkportal");
$rec->setFieldFloatFormat(",,,,2,,,,");
$rec->setFieldDesc("วันที่ซื้อ,เลขบิล,รหัสสมาชิก,ชื่อสมาชิก,Ewallet,ผู้บันทึก,ช่องทาง");
$rec->setFieldAlign("center,center,center,left,right,center,center,right,right,center,center,right,center");
$rec->setSearch("sano,".$dbprefix."ewallet_commission.mcode,".$dbprefix."member.name_t,sadate,".$dbprefix."ewallet_commission.uid");
$rec->setSearchDesc("เลขบิล,รหัสสมาชิก,ชื่อสมาชิก,วันที่ซื้อ,ผู้บันทึก");
$rec->setSum(true,false,",,,,true,,");if($_GET['excel']==1){
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
}
$rec->showRec(1,'SH_QUERY');

function rpdialog_sale1($sub,$fdate,$tdate,$sale){ ?>

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
<? }?>