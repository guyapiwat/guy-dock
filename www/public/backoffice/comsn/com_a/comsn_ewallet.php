<script language="javascript" type="text/javascript" src="./datetimepick/datetimepicker.js"></script>
<script language="javascript">
var win
function view(ro,code){
	var param = 'ftrcode=' + ro +'&fmcode='+code;
	var url = './print/rep_am_comsn.php?'+param;
	//window.location = wlink;
	if(win!=null) win.close();
	win = window.open(url,'','height=500 width=900 scrollbars=yes' );
}
function checkround(){
	if(document.getElementById("ftrcode").value==""){
		alert("กรุณาใส่รอบการคำนวณ");
		document.getElementById("ftrcode").focus();
		return false;
	}/*else{
		var numCheck = document.getElementById("ftrcode").value;
		var numVal = numCheck.split("-");
		if(numVal.length>2){
			alert("กรุณากรอกรูปแบบรอบการคำนวณให้ถูกต้อง");
			return false;
		}
	}*/
	document.rform.submit();
}
function chknum(key){
	if((key>=48&&key<=57)||key==45)
		return true;
	else
		return false;
}
</script>
<?

	//var_dump($_POST);
	$ftrcode = $_POST['ftrcode']==""?$_GET['ftrcode']:$_POST['ftrcode'];
	//var_dump($ftrcode);
	if (strpos($ftrcode,"-")===false){
			//รอบเริ่มต้น == รอบสิ้นสุด
			$ftrc[0]=$ftrcode;
			$ftrc[1]=$ftrcode;
	}else{
		$ftrc = explode('-',$ftrcode);
	}
	//var_dump($ftrc);
	//exit;
	$fmcode = $_POST['fmcode']==""?$_GET['fmcode']:$_POST['fmcode'];
	//echo "ss $strfdate :   $strtdate<br>";
//if($strfdate=="" || $strtdate==""){
if(empty($ftrcode)){
	rpdialog();
}else{
	$bonus = $_POST['bonus']==""?$_GET['bonus']:$_POST['bonus'];
	$vip = $_POST['vip']==""?$_GET['vip']:$_POST['vip'];
		if (strpos($bonus,"-")===false){
					$arr_bonus[0]=$bonus;
					$arr_bonus[1]=$bonus;
			}else{
				$arr_bonus = explode('-',$bonus);
			}
	
	if($arr_bonus[0] > $arr_bonus[1]){
		?>
	<center><FONT COLOR="#ff0000">กรุณากรอกช่วงร่ายได้ให้ถูก เช่น 0-500</FONT></center>
	
<?	rpdialog();
exit;
	}else{
			rpdialog();
?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<!--a href="./comsn/com_a/rep_ac_comsn_print.php?ftrcode=<?=$ftrcode?>&fmcode=<?=$fmcode?>" target="_blank"><img border="0" src="./images/Amber-Printer.gif">พิมพ์ทั้งหมด</a-->
<?
		require("connectmysql.php");
	$wwhere = " a.rcode between '".$ftrc[0]."' and '".$ftrc[1]."' ";
	$wwhere1 = " txtMoney between '".$arr_bonus[0]."' and '".$arr_bonus[1]."' ";

		$sql="select min(fdate) as fdate1,max(tdate) as tdate1 from ".$dbprefix."around a where  $wwhere  ";
		$result=mysql_query($sql);
		if (mysql_num_rows($result)>'0') {
			$row= mysql_fetch_array($result, MYSQL_ASSOC);
			$strtdate=$row["tdate1"];
			$strfdate=$row["fdate1"];
		}
		$where = "and sadate between '".$strtdate."' and '".$strfdate."' ";
		//require("./cls/repGenerator.php");
		if(empty($strtdate))$strtdate = date("Y-m-d");
		$monthfirst=explode("-",$strfdate);
		$month=explode("-",$strtdate);
		$month0 = $month[0];
		$month1 = $month[1];
		$month_show = $month0.'/'.$month1;
		$month2 = $month[0].$month[1];
		$month3 = $monthfirst[0].$monthfirst[1];
		if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}

		$sql = "SELECT cancel,a.id,
		CASE checkportal WHEN '1' THEN 'HQ' WHEN '2' THEN 'Branch' WHEN '3' THEN 'ONLINE' END AS checkportal,a.uid as uid,sano,txtCash,txtFuture,txtTransfer,txtCredit1+txtCredit2+txtCredit3 as txtCredit,sadate,txtMoney ,a.name_t ";
		$sql .= ",CASE a.mcode WHEN '' THEN a.inv_code  ELSE a.mcode END AS smcode ";
		$sql .= " FROM ".$dbprefix."ewallet a ";
		$sql .= " LEFT JOIN ".$dbprefix."member AS m ON (a.mcode=m.mcode) ";
		$sql .= " where txtCommission > 0";

		if($ftrcode!=""&&$fmcode!=""&&$bonus!=""&&$vip!=""){
			$sql .= " $where and a.mcode='".$fmcode."' and $wwhere1  and m.mtype2 = '".$vip."'";
		}else if($ftrcode!=""&&$fmcode!=""&&$bonus!=""){
			$sql .= "  $where and a.mcode='".$fmcode."' and $wwhere1  ";
		}
		else if($ftrcode!=""&&$fmcode!=""){
			$sql .= "  $where and a.mcode='".$fmcode."' ";
		}
		else if($ftrcode!=""&&$bonus!=""&&$vip!=""){
			$sql .= "  $where and $wwhere1 and m.mtype2 = '".$vip."'";
		}
		else if($ftrcode!=""&&$bonus!=""){
			$sql .= "  $where and $wwhere1 ";
		}
		else if($ftrcode!=""&&$vip!=""){
			$sql .= " $where and m.mtype2 = '".$vip."'";
		}
		else if($bonus!=""){
			$sql .= " $wwhere1 ";
		}
		else if($fmcode!=""){
			$sql .= " and a.mcode='".$fmcode."' ";
		}
		else{
			$sql .= "  $where ";
		}
		//echo $sql;
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
		$rec->setLink($PHP_SELF,"sessiontab=4&sub=117");
		$rec->setBackLink($PHP_SELF,"sessiontab=4");
		if(isset($page))
			$rec->setCurPage($page);
		//$rec->setShowField("sano,smcode,name_t,preserve,ability,hold,sadate,tot_pv,total");
		$rec->setShowField("sadate,smcode,name_t,txtMoney,uid,checkportal");
		$rec->setFieldFloatFormat(",,,2,,,,,");
		//$rec->setFieldDesc("เลขบิล,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,รักษายอด,ทำคุณสมบัติ,holdยอด,วันที่ซื้อ,จำนวนรวม  PV,จำนวนเงินรวม");
		$rec->setFieldDesc("วันที่,รหัส,ชื่อ,จำนวน,สาขา หรือ พนักงาน,ช่องทาง");
		$rec->setFieldAlign("center,center,left,left,right,right,right,right,right,right,right,right,center");
		$rec->setFieldSpace("10%,10%,60%,8%,8%,8%,8%,8%,8%");
		//$rec->setFieldLink(",,index.php?sessiontab=1&sub=5&cmc=,");
	//	$rec->setSearch("".$dbprefix."ewallet.mcode,name_t");
	//	$rec->setSearchDesc("รหัสผู้ซื้อ,ชื่อผู้ซื้อ");
		$rec->setSum(true,false,",,,true");
	//	$rec->setSpecial("./images/Amber-Printer.gif","","sale_print","id","IMAGE","พิมพ์");
		//$rec->setSpecial("./images/cancel.gif","","sale_cancel","id","IMAGE","ยกเลิก");
		//$rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");
		/*if($acc->isAccess(4)){
			$rec->setDel("index.php","id","id","sessiontab=3&sub=23");
			$rec->setFromDelAttr("maindel","./index.php?sessiontab=3&sub=23&state=1","post","delfield");
		}*/
	//	$rec->setSpecial("./images/search.gif","","sale_look","id","IMAGE","ดู");
	//	$rec->setSpecial("./images/cancel.gif","","sale_cancel","id","IMAGE","ยกเลิก");
		$rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");
		//var_dump($acc->isAccess(2));
		//exit;
		//if($acc->isAccess(2))
			//$rec->setEdit("index.php","id","id","sessiontab=3&sub=23");
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);
	}
}	
function rpdialog(){	?>
<table width="100%"> <tr>
    <td colspan="2" align="center"><a href="index.php?sessiontab=4&sub=1" target="_blank">คลิกดูรายละเอียดรอบ</a></td>
  </tr><tr><td><br />
<form name="rform" method="post" action="./index.php?sessiontab=4&sub=117">
<table width="70%" border="1" cellpadding="0" cellspacing="0" bordercolor="#FF7F00" align="center">

  <tr>
    <td colspan="6" align="center">&nbsp;</td>
    </tr> 
  <tr>
    <td  align="right">รอบ&nbsp;&nbsp;</td>
    <td ><!--select name="ftrcode" id="ftrcode">
			<option value="">เลือกรอบคำนวณ</option>
		<?
		$sql = "SELECT * FROM ali_around where calc=1";
		$result = mysql_query($sql);
		
		for ($i=1;$i<=mysql_num_rows($result);$i++){
			$data = mysql_fetch_object($result);
						echo '<option value="'.$data->rcode.'">รอบที่ '.$data->rcode.' ( '.$data->fdate.' ถึง '.$data->tdate.' )</option>';
		}
		echo $sql;
		?>
		
			

		</select-->
	
	<input type="text" name="ftrcode" id="ftrcode"  value="<?=$_POST['ftrcode']?>" onkeypress="return chknum(window.event.keyCode)" /></td>
    <td  align="right">รหัสสมาชิก&nbsp;</td>
    <td ><input type="text" name="fmcode" id="fmcode" placeholder="0000001" value="<?=$_POST['fmcode']?>" /></td>

    <td align="right">ช่วงรายได้</td>
    <td><input type="text" name="bonus" id="bonus" value="<?=$_POST['bonus']?>" placeholder="0-200" /></td>
	 <td colspan="6" align="center"><input type="button" name="Submit" value="ดูรายงาน" onclick="checkround()" /></td>
  </tr>
  <tr>
    <td colspan="6" align="center">&nbsp;</td>
    </tr>

</table>
</form>
</td></tr></table>
<? }
?>
