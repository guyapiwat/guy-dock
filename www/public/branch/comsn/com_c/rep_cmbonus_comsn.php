
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
    <td><FONT COLOR="#ff0000"><?=$wording_lan['supervisor_38']?></FONT></td>
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
<? 

echo $wording_lan["supervisor_49"];
echo $fdate.$wording_lan['supervisor_39'].$tdate;?>
<?
		require("connectmysql.php");

		//require("./cls/repGenerator.php");
		if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
		if($_GET['state']==1){
		include("comsn/com_c/rep_change.php");
		}
		$sql = "SELECT m.acc_no,m.bankcode";
		$sql .= ",a.id,a.rcode,a.mcode,m.name_t,a.pv,a.pvb,a.total,  ";
		$sql .= "CONCAT(address,' ต.',districtName,' อ.',amphurName,' จ.',provinceName,' ',zip) AS address ";
		$sql .= "FROM ".$dbprefix."cmbonus a ";
		$sql .= " LEFT JOIN ".$dbprefix."member m ON a.mcode=m.mcode ";
		$sql .= "LEFT JOIN district ON (m.districtId=district.districtId) ";
		$sql .= "LEFT JOIN amphur ON (m.amphurId=amphur.amphurId) ";
		$sql .= "LEFT JOIN province ON (m.provinceId=province.provinceId) ";

		if($ftrcode!=""&&$fmcode!=""){
			$sql .= " WHERE rcode between '".$ftrc[0]."' and '".$ftrc[1]."' and a.mcode=".$fmcode." and a.status = 1   ";
		}else if($ftrcode!=""){
			$sql .= " WHERE rcode between '".$ftrc[0]."' and '".$ftrc[1]."'and a.status = 1 ";
		}else if($fmcode!=""){
			$sql .= " WHERE a.mcode=".$fmcode." and a.status = 1 ";
		}
		$sql .= " and a.locationbase = '".$_SESSION["inv_locationbase"]."' ";

		//echo "SQL : $sql <BR>";
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort(($_GET['srt']==""?"UP":$_GET['srt']));
		$rec->setOrder(($_GET['ord']==""?"a.rcode":$_GET['ord']));
		$rec->setLimitPage($_GET['lp']);
		$rec->setSize("100%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		$rec->setLink($PHP_SELF,"sessiontab=6&sub=28&ftrcode=$ftrcode&fmcode=$fmcode");
		$rec->setBackLink($PHP_SELF,"sessiontab=6");
		if(isset($page))
			$rec->setCurPage($page);
		//$rec->setShowIndex(true);
		$rec->setShowField("rcode,mcode,name_t,pv,pvb,total");
		//$rec->setFieldDesc("รอบ,รหัส,ชื่อ,ยอดยกมา,ยอดเดือนนี้,ยอดรวมจ่าย");
		$rec->setFieldDesc($wording_lan["supervisor_40"].",".$wording_lan["supervisor_41"].",".$wording_lan["supervisor_42"].",".$wording_lan["supervisor_43"].",".$wording_lan["supervisor_44"].",".$wording_lan["supervisor_45"]);
		$rec->setFieldAlign("center,center,left,left,right,right,right,right,right,right,right,right,right");
		$rec->setFieldSpace("3%,5%,68%,8%,8%,8%,10%,10%,6%,10%,10%");//10
		$rec->setSum(true,false,",,,true,true,true,true,true,true");
		$rec->setFieldFloatFormat(",,,2,2,2,2,2,2");
		if($acc->isAccess(4)){
		//	$rec->setDel("index.php","id","id","sessiontab=6&sub=28");
		//	$rec->setFromDelAttr("maindel","./index.php?sessiontab=6&sub=28&state=1&ftrcode=$ftrcode&fmcode=$fmcode","post","delfield");
		}
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		$rec->setSearch("a.mcode");
		$rec->setSearchDesc($wording_lan["supervisor_41"]);
		$rec->setFieldLink("");
		if($_GET['excel']==1){
			$rec->exportXls("ExportXls","ewallet".date("Ymd").".xls","SH_QUERY");
			$str = "<fieldset><a href='".$rec->download("ExportXls","ewallet".date("Ymd").".xls")."' >";
			$str .= "<img border='0' src='./images/download.gif'>".$wording_lan["Billjang_loding"]." Excel</a></fieldset>";
			//$rec->getParam();
			$rec->setSpace($str);
		}
		$str = "<fieldset><a href='".$rec->getParam()."&excel=1' target='_self'>";
		$str .= "<img border='0' src='./images/excel.gif'>".$wording_lan["Billjang_cre"]." Excel</a></fieldset>";
		$rec->setSpace($str);
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
    <td colspan="2" align="center">&nbsp;</td>
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
<? 
 
  }
?>