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
if($strfdate=="" || $strtdate==""){
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
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<!--a href="./comsn/com_a/rep_ac_comsn_print.php?ftrcode=<?=$ftrcode?>&fmcode=<?=$fmcode?>" target="_blank"><img border="0" src="./images/Amber-Printer.gif">พิมพ์ทั้งหมด</a-->
<?
		require("connectmysql.php");
		require("./cls/repGenerator.php");
		/*if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
		$sql = "SELECT a.fdate,a.tdate,a.rcode, a.mcode as smcode,m.upa_code as mcode,m.name_t,m.acc_no,m.bankcode,b.bankname,a.total,a.tax,a.bonus ";
		$sql .= " FROM ".$dbprefix."hmbonus a ";
		$sql .= " LEFT JOIN ".$dbprefix."member m ON a.mcode=m.mcode ";
		$sql .= " LEFT JOIN ".$dbprefix."bank b ON m.bankcode=b.bankcode ";

		if($strfdate!=""&&$strtdate!=""&&$fmcode!=""){
			$sql .= " WHERE fdate>= '$strfdate' and tdate<= '$strtdate' and a.mcode='".$fmcode."'";
		}else if($strfdate!=""&&$strtdate!=""){
			$sql .= " WHERE fdate>= '$strfdate' and tdate<= '$strtdate' ";
		}else if($fmcode!=""){
			$sql .= " WHERE a.mcode='".$fmcode."'";
		}

		//echo $sql;
		//exit;
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort(($_GET['srt']==""?"UP":$_GET['srt']));
		$rec->setOrder(($_GET['ord']==""?"rcode":$_GET['ord']));
		$rec->setLimitPage($_GET['lp']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		$rec->setLink($PHP_SELF,"sessiontab=5&sub=113&strfdate=$strfdate&strtdate=$strtdate&fmcode=$fmcode");
		$rec->setBackLink($PHP_SELF,"sessiontab=4");
		if(isset($page))
			$rec->setCurPage($page);
		//$rec->setShowIndex(true);
		$rec->setShowField("fdate,smcode,name_t,acc_no,bankname,total,tax,bonus");
		$rec->setFieldDesc("วันที่,รหัสมาชิก,ชื่อ,เลขบัญชี,ธนาคาร,คอมมิชชัน,ภาษี(5%),รายได้สุทธิ");
		$rec->setFieldAlign("center,center,left,center,left,right,right,right");
		$rec->setFieldSpace("10%,10%,20%,20%,10%,10%,10%,10%");//10
		$rec->setSum(true,false,",,,,,true,true,true");
		$rec->setFieldFloatFormat(",,,,,2,2,2");
		$rec->setFieldLink(",,,,,index.php?sessiontab=5&sub=113&strfdate=$strfdate&strtdate=$strtdate&sss=,,");
		/*if($_GET['excel']==1){
			$rec->exportXls("ExportXls","ambonus".date("Ymd").".xls","SH_QUERY");
			$str = "<fieldset><a href='".$rec->download("ExportXls","ambonus".date("Ymd").".xls")."' >";
			$str .= "<img border='0' src='./images/download.gif'>โหลด Excel</a></fieldset>";
			//$rec->getParam();
			$rec->setSpace($str);
		}
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		$rec->setSearch("a.mcode");
		$rec->setSearchDesc("รหัส");
		//$rec->setSpace($str);
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);*/
		if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}

$fmcode = $_SESSION["usercode"];
if($strfdate!=""&&$strtdate!=""&&$fmcode!=""){
			$whereclass = " and fdate>= '$strfdate' and tdate<= '$strtdate' and m.mcode='".$fmcode."'";
		}else if($strfdate!=""&&$strtdate!=""){
			$whereclass = " and fdate>= '$strfdate' and tdate<= '$strtdate' ";
		}else if($fmcode!=""){
			$whereclass = " and m.mcode='".$fmcode."'";
		}
$sql = "select m.mcode,m.name_t,r.rcode,a.total as total_fast,b.total as total_bin,r.paydate,
		ifnull(b.total,0)+ifnull(a.total,0) as total1,
		(ifnull(b.total,0)+ifnull(a.total,0))*0.05 as tax,
		(ifnull(b.total,0)+ifnull(a.total,0))*0.95 as totalamt,
		r.fdate";
		$sql .= " from ".$dbprefix."member m
		join ".$dbprefix."around r
		left join ".$dbprefix."bank bank on(bank.bankcode=m.bankcode)
		left join ".$dbprefix."mmbonus a on(a.mcode=m.mcode and a.rcode=r.rcode)
		left join ".$dbprefix."embonus b on(b.mcode=m.mcode and b.rcode=r.rcode)
		";
		
		/*if($strfdate!=""&&$fmcode!=""){
			$sql .= " WHERE r.fdate between ".$strfdate." and  ".$strtdate."  and m.mcode='".$fmcode."'";
		}else if($strfdate!=""){
			$sql .= " WHERE r.fdate between ".$strfdate." and  ".$strtdate." ";
		}else if($fmcode!=""){
			$sql .= " WHERE m.mcode='".$fmcode."'";
		}*/

		$sql .= " WHERE m.mcode='".$fmcode."' and r.calc = '1'  and ((ifnull(b.total,0)+ifnull(a.total,0))) > 0 ";
		if($strfdate!=""&&$fmcode!=""){
			//$sql .= " and r.fdate between '".$strfdate."' and  '".$strtdate."' ";
			$sql .= " and r.fdate>= '$strfdate' and r.tdate<= '$strtdate' and m.mcode='".$fmcode."'";
		}

		/*$sql = "SELECT m.mcode,m.name_t,m.mobile,bk.bankcode,bk.bankname,m.branch,m.acc_type,m.acc_no,m.acc_name,
		(SELECT ifnull(sum(total),0) from ".$dbprefix."mmbonus a where a.mcode=m.mcode ".$whereclass." ) as total_fast, 
		(SELECT ifnull(sum(total),0) from ".$dbprefix."embonus b where b.mcode=m.mcode  ".$whereclass." ) as total_team, 	
		(SELECT ifnull(sum(total),0) from ".$dbprefix."mmbonus a where a.mcode=m.mcode  ".$whereclass." )+ 
		(SELECT ifnull(sum(total),0) from ".$dbprefix."embonus b where b.mcode=m.mcode  ".$whereclass." ) as total, 
		(((SELECT ifnull(sum(total),0) from ".$dbprefix."mmbonus a where a.mcode=m.mcode  ".$whereclass." )+
		(SELECT ifnull(sum(total),0) from ".$dbprefix."embonus d where d.mcode=m.mcode  ".$whereclass." ))*0.05) as tax, 		
		(((SELECT ifnull(sum(total),0) from ".$dbprefix."mmbonus a where a.mcode=m.mcode  ".$whereclass." )+
		(SELECT ifnull(sum(total),0) from ".$dbprefix."embonus d where d.mcode=m.mcode  ".$whereclass." ))*0.95) as totalamt 
		from ".$dbprefix."member m 
		LEFT JOIN ".$dbprefix."bank bk ON m.bankcode=bk.bankcode 
		where (SELECT ifnull(sum(total),0) from ".$dbprefix."mmbonus a where a.mcode=m.mcode  ".$whereclass." )+ 
		(SELECT ifnull(sum(total),0) from ".$dbprefix."embonus b where b.mcode=m.mcode  ".$whereclass." )>0";*/

		//echo $sql;
		//echo $sql;
		//exit;
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort(($_GET['srt']==""?"DOWN":$_GET['srt']));
		$rec->setOrder(($_GET['ord']==""?" mcode ":$_GET['ord']));
		$rec->setLimitPage("ALL");
		$rec->setSize("100%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		$rec->setLink($PHP_SELF,"sessiontab=5&sub=102&strfdate=$strfdate&strtdate=$strtdate&fmcode=$fmcode");
		$rec->setBackLink($PHP_SELF,"sessiontab=5");
		if(isset($page))
			$rec->setCurPage($page);
		//$rec->setShowIndex(true);
		$rec->setShowField("rcode,mcode,name_t,total_fast,total_team,tax,totalamt");
		$rec->setFieldFloatFormat(",,,2,2,2,2");
		$rec->setFieldDesc("รอบ,รหัส,ชื่อ,Unilevel,กองทุน,ภาษี(5%),สุทธิ");
		$rec->setFieldAlign("center,left,left,center,right,right,right,right");
		$rec->setFieldSpace("7%,7%,57%,7%,8%,7%,8%,17%,8%,7%,7%,7%");
		$rec->setSum(true,false,",,true,true,true,true,true,,true,true,true,true,true");
		$rec->setFieldLink("");
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);


	}
}	
function rpdialog(){?>
<table width="100%"><tr><td><br />
<form name="rform" method="post" action="./index.php?sessiontab=5&sub=102">
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
      <input type="text" name="fmcode" id="fmcode"  value="<?=$_SESSION["usercode"]?>" readonly/></td>
  </tr>
  <tr align="center">
    <td colspan="2">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="2" align="center"><input type="button" name="Submit" value="ดูรายงาน" onclick="checkround()"/>&nbsp;&nbsp;<a href="./index.php?sessiontab=5&sub=102&strfdate=2010-09-12&strtdate=2099-09-12">ดูท้ั้งหมด</a></td>
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