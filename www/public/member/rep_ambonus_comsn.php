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
		require("connectmysql.php");
		require("./cls/repGenerator.php");
		if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
		$sql = "SELECT rcode,(select rdate from ".$dbprefix."around a where a.rcode = ".$dbprefix."ambonus.rcode ) as rdate ,".$dbprefix."ambonus.mcode,name_t,cur_l,cur_r,cut_l,cut_r,remain_l,remain_r,tot_l, tot_r,total,mlm_amt ";
		$sql .= "FROM ".$dbprefix."ambonus ";
		$sql .= "LEFT JOIN ".$dbprefix."member ON (".$dbprefix."ambonus.mcode=".$dbprefix."member.mcode) ";
		$sql .= " WHERE ".$dbprefix."ambonus.mcode='".$_SESSION['usercode']."'";
 
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort("DOWN");
		$rec->setOrder(" rcode ");
		$rec->setLimitPage($_GET['lp']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		$rec->setLink($PHP_SELF,"sessiontab=5&sub=1&ftrcode=$ftrcode");
		$rec->setBackLink($PHP_SELF,"sessiontab=5");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("rcode,rdate,mcode,name_t,cur_l,cur_r,remain_l,remain_r,total,tot_l,tot_r,mlm_amt");
		$rec->setFieldDesc("รอบ,วันที่,รหัสมาชิก,ชื่อสมาชิก,รอบนี้ซ้าย,ขวา,ก่อนซ้าย,ขวา,คู่,เก็บซ้าย,ขวา,รวม");
		$rec->setFieldAlign("center,left,center,left,right,right,right,right,right,right,right,right");
		$rec->setFieldSpace("5%,10%,9%,14%,9%,9%,9%,9%,9%,9%,9%,9%");//10
		$rec->setSum(true,false,",,,,,,,,,,,true");
		$rec->setFieldFloatFormat(",,,,0,0,0,0,0,0,0,0");
		$rec->setFieldLink("");
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);
	}
 	
function rpdialog(){?>
<table width="100%"><tr><td><br />
<form name="rform" method="post" action="./index.php?sessiontab=5&sub=1">
<table width="40%" border="1" cellpadding="0" cellspacing="0" bordercolor="#FF7F00" align="center">
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