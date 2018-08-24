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
	if(document.getElementById("strfdate").value==""){
		alert("กรุณาเลือกวันที่เริ่มต้น");
		document.getElementById("strfdate").focus();
		return false;
	}
	if(document.getElementById("strtdate").value==""){
		alert("กรุณาเลือกวันที่สิ้นสุด");
		document.getElementById("strtdate").focus();
		return false;
	}
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

	
	$strfdate = $_POST['strfdate']==""?$_GET['strfdate']:$_POST['strfdate'];
	$strtdate = $_POST['strtdate']==""?$_GET['strtdate']:$_POST['strtdate'];
	$fmcode = $_POST['fmcode']==""?$_GET['fmcode']:$_POST['fmcode'];
	//echo "ss $strfdate :   $strtdate<br>";
//if($strfdate=="" || $strtdate==""){
if(empty($fmcode) and empty($strfdate)){
	rpdialog();
}else{
	if($strfdate>$strtdate){
		?><table width="100%" border="1">
  <tr align="center">
    <td><FONT COLOR="#ff0000">วันที่เริ่มต้น ต้องน้อยกว่าหรือเท่ากับ วันที่สิ้นสุด กรุณาระุบุวันที่ใหม่</FONT></td>
  </tr>
</table>
<?
		rpdialog();
		exit;
	}else{
?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
รอบวัน <? echo $strfdate .' ถึง '.$strtdate;?>
<?
		require("connectmysql.php");
		if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
		if($strfdate!=""&&$strtdate!=""&&$fmcode!=""){
			$whereclass = " AND fdate>= '$strfdate' and tdate<= '$strtdate' and m.mcode='".$fmcode."'";
		}else if($strfdate!=""&&$strtdate!=""){
			$whereclass = " AND fdate>= '$strfdate' and tdate<= '$strtdate' ";
		}else if($fmcode!=""){
			$whereclass = " AND m.mcode='".$fmcode."'";
		}
		$sql = "SELECT 		
		sum(((SELECT ifnull(sum(total),0) from ".$dbprefix."ambonus a where a.mcode=m.mcode  ".$whereclass." )+
		(SELECT ifnull(sum(total),0) from ".$dbprefix."bmbonus b where b.mcode=m.mcode  ".$whereclass." )+
		(SELECT ifnull(sum(total),0) from ".$dbprefix."bmpersonal bp where bp.mcode=m.mcode  ".$whereclass." )+
		(SELECT ifnull(sum(total),0) from ".$dbprefix."dmbonus d where d.mcode=m.mcode  ".$whereclass." ))) as totalamt 
		from ".$dbprefix."member m 
		where (SELECT ifnull(sum(total),0) from ".$dbprefix."ambonus a where a.mcode=m.mcode  ".$whereclass." )+ 
		(SELECT ifnull(sum(total),0) from ".$dbprefix."bmbonus b where b.mcode=m.mcode  ".$whereclass." )+ 
		(SELECT ifnull(sum(total),0) from ".$dbprefix."bmpersonal bp where bp.mcode=m.mcode  ".$whereclass." )+ 
		(SELECT ifnull(sum(total),0) from ".$dbprefix."dmbonus d where d.mcode=m.mcode  ".$whereclass." )>0 ";
		$rs = mysql_query($sql);
		if(mysql_num_rows($rs) > 0){
			for($i=0;$i<mysql_num_rows($rs);$i++){
				$sqlObj = mysql_fetch_object($rs);
				$plana =$sqlObj->totalamt;
			}
			mysql_free_result($rs);
		}

		
		
		$sql = "SELECT 	
		sum(((SELECT ifnull(sum(total),0) from ".$dbprefix."mmbonus a where a.mcode=m.mcode  ".$whereclass." )+
		(SELECT ifnull(sum(total),0) from ".$dbprefix."embonus d where d.mcode=m.mcode  ".$whereclass." ))) as totalamt 
		from ".$dbprefix."member m 
		where (SELECT ifnull(sum(total),0) from ".$dbprefix."mmbonus a where a.mcode=m.mcode  ".$whereclass." )+ 
		(SELECT ifnull(sum(total),0) from ".$dbprefix."embonus b where b.mcode=m.mcode  ".$whereclass." )>0";
		$rs = mysql_query($sql);
		if(mysql_num_rows($rs) > 0){
			for($i=0;$i<mysql_num_rows($rs);$i++){
				$sqlObj = mysql_fetch_object($rs);
				$planb =$sqlObj->totalamt;
			}
			mysql_free_result($rs);
		}
		

		$sql = "SELECT sum(total) as total ";
		$sql .= "FROM ".$dbprefix."asaleh ";
		$sql .= "WHERE ".$dbprefix."asaleh.sadate BETWEEN '$strfdate' AND '$strtdate'";
		$rs = mysql_query($sql);
		if(mysql_num_rows($rs) > 0){
			for($i=0;$i<mysql_num_rows($rs);$i++){
				$sqlObj = mysql_fetch_object($rs);
				$planc =$sqlObj->total;
			}
			mysql_free_result($rs);
		}

		$sql = "SELECT sum(a.total-oon) as ttttt, sum(a.pv) as ppppp";
		$sql .= ",a.id,a.rcode,a.mcode,a.pv,a.pvb  ";
		$sql .= "FROM ".$dbprefix."oon n,".$dbprefix."pmbonus a ";
		$sql .= " LEFT JOIN ".$dbprefix."pround r ON r.rcode=a.rcode ";
		$sql .= " WHERE  a.status = 1 ";
		$rs = mysql_query($sql);
		//echo $sql .= " AND r.fdate>= '$strfdate' and r.tdate<= '$strtdate' ";
		if(mysql_num_rows($rs) > 0){
			for($i=0;$i<mysql_num_rows($rs);$i++){
				$sqlObj = mysql_fetch_object($rs);
				$payd =$sqlObj->ttttt;
				$paye =$sqlObj->ppppp;
			}
			mysql_free_result($rs);
		}
		$sql = "select max(rcode) as rcode from ".$dbprefix."pmbonus ";
		$rs = mysql_query($sql);$sqlObj = mysql_fetch_object($rs);
		$mrcode =$sqlObj->rcode;
		mysql_free_result($rs);
		$sql = "SELECT sum(a.total-oon) as ttttt, sum(a.pvb) as ppppp ";
		$sql .= "FROM ".$dbprefix."oon n,".$dbprefix."pmbonus a ";
		$sql .= " LEFT JOIN ".$dbprefix."pround r ON r.rcode=a.rcode ";
		$sql .= " WHERE  a.status = 0 and a.rcode = '$mrcode'";
		$rs = mysql_query($sql);
		//echo $sql .= " AND r.fdate>= '$strfdate' and r.tdate<= '$strtdate' ";
		if(mysql_num_rows($rs) > 0){
			for($i=0;$i<mysql_num_rows($rs);$i++){
				$sqlObj = mysql_fetch_object($rs);
				$paye =$sqlObj->ppppp;
			}
			mysql_free_result($rs);
		}

		$sql = "SELECT sum(a.total-oon) as ttttt1, sum(a.pv) as ppppp1";
		$sql .= ",a.id,a.rcode,a.mcode,a.pv,a.pvb  ";
		$sql .= "FROM ".$dbprefix."oon n,".$dbprefix."cmbonus a ";
		$sql .= " LEFT JOIN ".$dbprefix."pround r ON r.rcode=a.rcode ";
		$sql .= " WHERE  a.status = 1 ";
		$rs = mysql_query($sql);
		//echo $sql .= " AND r.fdate>= '$strfdate' and r.tdate<= '$strtdate' ";
		if(mysql_num_rows($rs) > 0){
			for($i=0;$i<mysql_num_rows($rs);$i++){
				$sqlObj = mysql_fetch_object($rs);
				$payf =$sqlObj->ttttt1;
			}
			mysql_free_result($rs);
		}
		

		$sql = "select max(rcode) as rcode from ".$dbprefix."cmbonus ";
		$rs = mysql_query($sql);$sqlObj = mysql_fetch_object($rs);
		$mrcode1 =$sqlObj->rcode;
		mysql_free_result($rs);
		$sql = "SELECT sum(a.total-oon) as ttttt1, sum(a.pvb) as ppppp1";
		$sql .= ",a.id,a.rcode,a.mcode,a.pv,a.pvb  ";
		$sql .= "FROM ".$dbprefix."oon n,".$dbprefix."cmbonus a ";
		$sql .= " LEFT JOIN ".$dbprefix."pround r ON r.rcode=a.rcode ";
		$sql .= " WHERE  a.status = 0 and a.rcode = '$mrcode1' ";
		$rs = mysql_query($sql);
		//echo $sql .= " AND r.fdate>= '$strfdate' and r.tdate<= '$strtdate' ";
		if(mysql_num_rows($rs) > 0){
			for($i=0;$i<mysql_num_rows($rs);$i++){
				$sqlObj = mysql_fetch_object($rs);
				$payg =$sqlObj->ppppp1;
			}
			mysql_free_result($rs);
		}
		?>
			<table width="100%" cellpadding="10" cellspacing="10" border="10">
  <tr>
    <td align="center"><font color="#FF00FF" size="+6">&nbsp;รายได้&nbsp;</font></td>
    <td align="center"><font  size="+6" color="#FF0000">&nbsp;ค่าคอมมิชชั่น&nbsp;</font></td>
    <td align="center"><font  size="+6" color="#0000FF">&nbsp;จ่ายแล้ว &nbsp;</font></td>
    <td align="center"><font  size="+6" color="#00CC00">&nbsp;ที่ยังไม่จ่าย&nbsp;</font></td>
  </tr>
  <tr><td align="center"><font color="#FF00FF" size="+6">&nbsp;<? echo number_format($planc,2);?>&nbsp;</font></td><td align="center"><font  size="+6" color="#FF0000">&nbsp;<? echo number_format($planb+$plana,2); ?>&nbsp;</font></td><td align="center"><font  size="+6" color="#0000FF">&nbsp;<? echo number_format($payd+$payf,2); ?>&nbsp;</font></td><td align="center"><font  size="+6" color="#00CC00">&nbsp;<? echo number_format($paye+$payg,2); ?>&nbsp;</font></td></tr></table>
		<?
		
	}
}	
function rpdialog(){?>
<table width="100%"><tr><td><br />
<form name="rform" method="post" action="./index.php?sessiontab=5&sub=10">
<table width="40%" border="1" cellpadding="0" cellspacing="0" bordercolor="#FF7F00" align="center">
  <tr>
    <td colspan="2" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center"><strong>ระบุวันที่ และ รหัสสมาชิกที่ต้องการทราบข้อมูล</strong></td>
  </tr>
  <tr>
    <td colspan="2" align="center">&nbsp;</td>
    </tr>
  <!--tr>
    <td align="right">รอบ&nbsp;&nbsp;</td>
    <td><input type="text" name="ftrcode" id="ftrcode" onkeypress="return chknum(window.event.keyCode)" />
      &nbsp;( กรอกข้อมูลเป็น 1-9 )</td>
  </tr-->
  <tr>
  <td align="right" >วันที่&nbsp;&nbsp;</td>
  <td colspan="2">
      <input type="text" id="strfdate" onkeypress="return chknum(window.event.keyCode)" name="strfdate" size="10" maxlength="10" value="<?=date("Y-m-d")?>"/>
&nbsp;<a href="javascript:NewCal('strfdate','yyyymmdd',false,24)"><img src="./datetimepick/images/cal.gif" width="16" height="16" border="0" alt="เลือกวันที่เิีริ่มต้น" /></a>&nbsp; ถึง &nbsp;<input type="text" id="strtdate" onkeypress="return chknum(window.event.keyCode)" name="strtdate" size="10" maxlength="10" value="<?=date("Y-m-d")?>" />
&nbsp;<a href="javascript:NewCal('strtdate','yyyymmdd',false,24)"><img src="./datetimepick/images/cal.gif" width="16" height="16" border="0" alt="เลือกวันที่สิ้นสุด" /></a>
</td>
  </tr>
  <tr>
    <td width="24%" align="right">รหัสสมาชิก&nbsp;&nbsp;</td>
    <td width="76%">
      <input type="text" name="fmcode" id="fmcode" /></td>
  </tr>
  <tr align="center">
    <td colspan="2">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="2" align="center"><input type="button" name="Submit" value="ดูรายงาน" onclick="checkround()" /></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
</td></tr></table>
<? }
?>