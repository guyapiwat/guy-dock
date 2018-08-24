<script language="javascript">
function checkround(){
	if(document.getElementById("ftrcode").value!=""){
		var numCheck = document.getElementById("ftrcode").value;
		var numVal = numCheck.split("-");
		if(numVal.length>2){
			alert("<?=$wording_lan['supervisor_37']?>");
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
	if($ftrc[0]>$ftrc[1]){
		?><table width="100%" border="1">
  <tr align="center">
    <td><FONT COLOR="#ff0000"><?=$wording_lan["supervisor_38"]?></FONT></td>
  </tr>
</table>
<?
		rpdialog();
		exit;
	}else{
?>
<?
		$sql = "SELECT fdate,tdate ";
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
?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<!--a href="./comsn/com_c/rep_cmbonus_comsn_print.php?ftrcode=<?=$ftrcode?>&fmcode=<?=$fmcode?>" target="_blank"><img border="0" src="./images/Amber-Printer.gif">พิมพ์ทั้งหมด</a><br/-->
<?  echo $fdate.$wording_lan["supervisor_39"].$tdate;?>
<?
		require("connectmysql.php");
		//require("./cls/repGenerator.php");
		if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
		if($_GET['state']==1){
		include("comsn/com_c/rep_change.php");
		}
		$sql = "SELECT *,@num := @num + 1 b FROM (SELECT lb.cshort,m.acc_no,m.id_card,m.mobile,m.email,'' as ref1,'' as ref2,m.bankcode,b.bankname,'N' as Yes,a.com_transfer_chagre,(a.total-a.com_transfer_chagre)/a.crate as ttttt,(a.total-a.tot_vat+a.tot_tax)/a.crate as alltotal,(a.tot_tax)/a.crate as tot_tax,(a.tot_vat)/a.crate as tot_vat ";
		$sql .= ",a.id,a.rcode,a.mcode,concat(m.name_f,' ',m.name_t) as fullname,b.code as bcode,a.pv,a.pvb,a.total/a.crate as total  ";
		$sql .= "FROM ".$dbprefix."cmbonus a ";
		$sql .= " LEFT JOIN ".$dbprefix."member m ON a.mcode=m.mcode ";
		$sql .= " LEFT JOIN ".$dbprefix."bank b ON m.bankcode=b.bankcode ";
		$sql .= " LEFT JOIN ".$dbprefix."location_base lb ON lb.cid=a.locationbase ";
		if($ftrcode!=""&&$fmcode!=""){
			$sql .= " WHERE rcode between '".$ftrc[0]."' and '".$ftrc[1]."' and a.mcode=".$fmcode." and a.status = 1   ";
		}else if($ftrcode!=""){
			$sql .= " WHERE rcode between '".$ftrc[0]."' and '".$ftrc[1]."'and a.status = 1 ";
		}else if($fmcode!=""){
			$sql .= " WHERE a.mcode=".$fmcode." and a.status = 1 ";
		}
		$sql .= " and a.locationbase = '".$_SESSION["inv_locationbase"]."' ";
		$sql .= "  ) as a,(SELECT @num := 0) d where 1=1 ";


		//echo "SQL : $sql <BR>";
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort(($_GET['srt']==""?"DOWN":$_GET['srt']));
		$rec->setOrder(($_GET['ord']==""?"mcode":$_GET['ord']));
		$rec->setLimitPage($_GET['lp']);
		$rec->setLimitPage(5000);
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		$rec->setSize("100%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		$rec->setLink($PHP_SELF,"sessiontab=6&sub=36&ftrcode=$ftrcode&fmcode=$fmcode");
		$rec->setBackLink($PHP_SELF,"sessiontab=6");
		if(isset($page))
			$rec->setCurPage($page);
		//$rec->setShowIndex(true);
		//$rec->setShowField("rcode,name_t,acc_no,total,bankname,mobile,Yes,oon,ttttt");
		$rec->setShowField("b,mcode,bcode,acc_no,fullname,ttttt,id_card,ref1,ref2,email,mobile,bankname,alltotal,tot_vat,tot_tax,com_transfer_chagre,cshort");
	//	$rec->setFieldDesc("ลำดับ,รหัสสมาชิก,รหัสธนาคาร,เลขที่บัญชี,ชื่อผู้รับเงิน,จำนวนเงิน,เลขบัตรประชาชน,ref1,ref2,อีเมล์,มือถือ,ชื่อธนาคาร,ยอดโบนัส,บวก vat,หักภาษี,หักค่าโอน,LB");

$rec->setFieldDesc($wording_lan["word"]["no."].",".$wording_lan["mcode"].",".$wording_lan["supervisor_56"].",".$wording_lan["acc_no"].",".$wording_lan["supervisor_53"].",".$wording_lan["Bill_7"].",".$wording_lan["word"]["id_card"].",".$wording_lan["supervisor_54"].",".$wording_lan["supervisor_55"] .",".$wording_lan["word"]["email"].",".$wording_lan["word"]["mobile"].",".$wording_lan["bankcode"].",".$wording_lan["supervisor_57"].",".$wording_lan["supervisor_58"] .",".$wording_lan["supervisor_59"].",".$wording_lan["supervisor_60"].",".$wording_lan["Report_13"]);
		

		$rec->setFieldAlign("center,center,center,center,left,right,center,center,center,left,center,left,right,right,right,right");
		$rec->setFieldSpace("2%,6%,3%,7%,18%,6%,8%,2%,2%,10%,7%,10%,5%,5%,5%");//10
		$rec->setSum(true,false,",,,,,true,,,,,,,true,true,true,true");
		$rec->setFieldFloatFormat(",,,,,2,,,,,,,2,2,2,");
		if($_GET['excel']==1){
			$rec->exportXls("ExportXls","packfileA".date("Ymd").".xls","SH_QUERY");
			$str = "<fieldset><a href='".$rec->download("ExportXls","packfileA".date("Ymd").".xls")."' >";
			$str .= "<img border='0' src='./images/download.gif'>".$wording_lan["Billjang_loding"]." Excel</a></fieldset>";
			//$rec->getParam();
			$rec->setSpace($str);
		}
		$str = "<fieldset><a href='".$rec->getParam()."&excel=1' target='_self'>";
		$str .= "<img border='0' src='./images/excel.gif'>".$wording_lan["Billjang_cre"]." Excel</a></fieldset>";
		$rec->setSpace($str);
		
		$rec->setSearch("cshort");
		$rec->setSearchDesc("LB");

		$rec->setFieldLink("");
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);
	}
}	
function rpdialog(){
	global $wording_lan;
	?>
<table width="100%"><tr><td><br />
<form name="rform" method="post" action="./index.php?sessiontab=<?=$_GET['sessiontab']?>&sub=<?=$_GET['sub']?>">
<table width="50%" border="1" cellpadding="0" cellspacing="0" bordercolor="#FF7F00" align="center">
  <tr>
    <td colspan="2" align="center"><a href="index.php?sessiontab=6&sub=25" target="_blank"><?=$wording_lan["supervisor_52"]?></a></td>
  </tr>
  <tr>
     <td colspan="2" align="center"><strong><?=$wording_lan["supervisor_46"]?></strong></td>
  </tr>
  <tr>
    <td colspan="2" align="center">&nbsp;</td>
    </tr>
  <tr>
    <td align="right"><?=$wording_lan["supervisor_47"]?>&nbsp;&nbsp;</td>
    <td><input type="text" name="ftrcode" id="ftrcode" onkeypress="return chknum(window.event.keyCode)" />
      &nbsp;<?=$wording_lan["supervisor_48"]?></td>
  </tr>
  <tr>
    <td width="24%" align="right"><?=$wording_lan["supervisor_49"]?>&nbsp;&nbsp;</td>
    <td width="76%">
      <input type="text" name="fmcode" id="fmcode" /></td>
  </tr>
  <tr align="center">
    <td colspan="2">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="2" align="center"><input type="button" name="Submit" value="<?=$wording_lan["supervisor_50"]?>" onclick="checkround()" /></td>
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