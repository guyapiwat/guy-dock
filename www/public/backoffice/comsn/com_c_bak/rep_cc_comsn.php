<script language="javascript">
function checkround(){
	if(document.getElementById("ftrcode").value!=""){
		var numCheck = document.getElementById("ftrcode").value;
		var numVal = numCheck.split("-");
		if(numVal.length>2){
			alert("กรุณากรอกรูปแบบรอบให้ถูกต้อง");
			return false;
		}
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
if($_POST["btn_remark"]){
	$rs=mysql_query("update ".$dbprefix."cmbonus set c_remark = '".$_POST["c_remark"]."' WHERE id='".$_REQUEST["id"]."' ");

}
if($_GET['id']){
		?>
		<form action="" method="post" >
		<?
		$rs=mysql_query("SELECT * FROM ".$dbprefix."cmbonus WHERE id='".$_REQUEST["id"]."' LIMIT 1");
		//echo "SELECT * FROM ".$dbprefix."member WHERE id='".$postval[$postkey[$i]]."' LIMIT 1";
		if (mysql_num_rows($rs)>0){
			$row = mysql_fetch_object($rs);
			echo 'รหัสสมาชิก : '.$mcode=$row->mcode;
			$c_remark=$row->c_remark;
		}
		?>	
		<input type="text" name="c_remark" id="c_remark" value="<?=$c_remark?>"><input type="submit" name="btn_remark" id="btn_remark" value="บันทึก">
		<input type="hidden" name="ftrcode" id="ftrcode" value="<?=$_REQUEST["ftrcode"]?>">
		<input type="hidden" name="c_id" id="c_id" value="<?=$_REQUEST["id"]?>">
		</form>
		<?
		}
if($_GET['state']==1){
		include("comsn/com_c/rep_renew.php");
		}
if(!(isset($_POST["ftrcode"]) || isset($_GET["ftrcode"]))){
	rpdialog();
}else{
	if(isset($_POST["ftrcode"]))
		$ftrcode = $_POST["ftrcode"];
	else if(isset($_GET["ftrcode"]))
		$ftrcode = $_GET["ftrcode"];
	if (strpos($ftrcode,"-")===false){
		//รอบเริ่มต้น == รอบสิ้นสุด
		$ftrc[0]=$ftrcode;
		$ftrc[1]=$ftrcode;
	}else{
		$ftrc = explode('-',$ftrcode);
	}
	$fmcode = $_POST['fmcode']==""?$_GET['fmcode']:$_POST['fmcode'];
	if(!empty($fmcode))$fmcode = gencode($fmcode);

	if($ftrc[0]>$ftrc[1]){
		?><table width="100%" border="1">
  <tr align="center">
    <td><FONT COLOR="#ff0000">รอบเริ่มต้น ต้องน้อยกว่าหรือเท่ากับ รอบสิ้นสุด กรุณาใส่รอบการคำนวณใหม่</FONT></td>
  </tr>
</table>
<?
		rpdialog();
		exit;
	}else{
?>
<?
		$sql = "SELECT fdate,tdate,paydate ";
		$sql .= "FROM ".$dbprefix."cround  ";
		if($ftrcode!=""&&$fmcode!=""){
			$sql .= " WHERE rcode between '".$ftrc[0]."' and '".$ftrc[1]."'  ";
		}else if($ftrcode!=""){
			$sql .= " WHERE rcode between '".$ftrc[0]."' and '".$ftrc[1]."' ";
		}
		//$sql .= '';
		//echo $sql;
		$result = mysql_query($sql);
		$rows = mysql_num_rows($result);
		$data = mysql_fetch_object($result);
		$fdate = $data->fdate;
		$tdate = $data->tdate;
		$paydate = $data->paydate;
?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<!--a href="./comsn/com_c/rep_cmbonus_comsn_print.php?ftrcode=<?=$ftrcode?>&fmcode=<?=$fmcode?>" target="_blank"><img border="0" src="./images/Amber-Printer.gif">พิมพ์ทั้งหมด</a><br/-->
<?  echo $fdate .' ถึง '.$tdate.'  วันที่จ่าย : '.$paydate;?>
<? echo '<br><center><font color=#FF0000><b></b></font></center>'; ?>
<?
		require("connectmysql.php");
		//require("./cls/repGenerator.php");
		if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
		
		$sql = "SELECT m.acc_no,m.bankcode,b.bankname,cr.paydate ";
		$sql .= ",a.id,a.rcode,a.mcode,m.name_t,a.pvh,a.pvb,a.total,a.c_remark  ";
		$sql .= ",CASE c_note1 WHEN '' THEN 'NO' ELSE 'YES' END AS c_note1 ";
		$sql .= ",CASE c_note2 WHEN '' THEN 'NO' ELSE 'YES' END AS c_note2 ";
		$sql .= ",CASE c_note3 WHEN '' THEN 'NO' ELSE 'YES' END AS c_note3 ";
		$sql .= ",CASE c_note4 WHEN '' THEN 'NO' ELSE 'YES' END AS c_note4 ";
		$sql .= ",CASE c_note5 WHEN '' THEN 'NO' ELSE 'YES' END AS c_note5 ";
		$sql .= "FROM ".$dbprefix."cmbonus a ";
		$sql .= "left join ".$dbprefix."cround cr on a.rcode=cr.rcode ";
		$sql .= " LEFT JOIN ".$dbprefix."member m ON a.mcode=m.mcode ";
		$sql .= " LEFT JOIN ".$dbprefix."bank b ON m.bankcode=b.bankcode ";
		if($ftrcode!=""&&$fmcode!=""){
			$sql .= " WHERE a.rcode between '".$ftrc[0]."' and '".$ftrc[1]."' and a.mcode=".$fmcode." and a.status = 0   ";
		}else if($ftrcode!=""){
			$sql .= " WHERE a.rcode between '".$ftrc[0]."' and '".$ftrc[1]."' and a.status = 0 ";
		}else if($fmcode!=""){
			$sql .= " WHERE a.mcode=".$fmcode." and a.status = 0";
		}

		//echo "SQL : $sql <BR>";
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort(($_GET['srt']==""?"UP":$_GET['srt']));
		$rec->setOrder(($_GET['ord']==""?"a.rcode":$_GET['ord']));
		$rec->setLimitPage($_GET['lp']);
		$rec->setLimitPage("ALL");
		$rec->setSize("100%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		$rec->setLink($PHP_SELF,"sessiontab=4&sub=34&ftrcode=$ftrcode&fmcode=$fmcode");
		$rec->setBackLink($PHP_SELF,"sessiontab=4");
		if(isset($page))
			$rec->setCurPage($page);
		//$rec->setShowIndex(true);
		$rec->setShowField("rcode,paydate,mcode,name_t,pvh,c_note1,c_note2,c_note3,c_note5,c_remark");
		$rec->setFieldDesc("รอบ,วันจ่าย,รหัส,ชื่อ,ยอดยกไป,สำเนาบัตรประชาชน,สำเนาบัญชีธนาคาร,เลขที่บัญชี,ใบสมัคร,หมายเหตุ");
		$rec->setFieldAlign("center,center,center,left,right,center,center,center,center,left,right,right,right,right");
		$rec->setFieldSpace("5%,7%,7%,20%,7%,8%,8%,8%,8%,50%,6%,10%,10%");//10
		$rec->setSum(true,false,",,,,true,");
		$rec->setFieldFloatFormat(",,,,2,");
		if($acc->isAccess(4)){
		//	$rec->setDel("index.php","id","id","sessiontab=4&sub=34");
		//	$rec->setFromDelAttr("maindel","./index.php?sessiontab=4&sub=34&state=1","post","delfield");
		}
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		$rec->setSearch("a.mcode");
		$rec->setSearchDesc("รหัส");
		$rec->setFieldLink("");
		if($acc->isAccess(2))
		//	$rec->setEdit("index.php","id","id","sessiontab=4&sub=34&ftrcode=".$ftrc[0]);
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);
	}
}	
function rpdialog(){?>
<table width="100%"><tr><td><br />
<form name="rform" method="post" action="./index.php?sessiontab=4&sub=34">
<table width="50%" border="1" cellpadding="0" cellspacing="0" bordercolor="#FF7F00" align="center">
  <tr>
    <td colspan="2" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center"><strong>กรอกรอบ และรหัสสมาชิกที่ต้องการดูรายงาน</strong></td>
  </tr>
  <tr>
    <td colspan="2" align="center">&nbsp;</td>
    </tr>
  <tr>
    <td align="right">รอบ&nbsp;&nbsp;</td>
    <td><input type="text" name="ftrcode" id="ftrcode" onkeypress="return chknum(window.event.keyCode)" />
      &nbsp;( กรอกข้อมูลเป็น 1-9 )</td>
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