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
		alert("��س����͡�ѹ����������");
		document.getElementById("strfdate").focus();
		return false;
	}
	if(document.getElementById("strtdate").value==""){
		alert("��س����͡�ѹ�������ش");
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
		
	$ftrcode1 = $_GET["ftrcode"];
	$fdate = $_POST['strfdate']==""?$_GET['strfdate']:$_POST['strfdate'];
	$tdate = $_POST['strtdate']==""?$_GET['strtdate']:$_POST['strtdate'];
	$fmcode = $_POST['fmcode']==""?$_GET['fmcode']:$_POST['fmcode'];
	$level = $_POST['level']==""?$_GET['level']:$_POST['level'];
	$cmc = $_POST['cmc']==""?$_GET['cmc']:$_POST['cmc'];
	if (isset($_GET["lr"])){$lr=$_GET["lr"];}else{$lr="";}
	//echo "ss $strfdate :   $strtdate<br>";
	//$strtdate = $strfdate;
if($fdate=="" || $fdate==""){
	rpdialog();
}else{
	if($strfdate>$strtdate){
		?><table width="100%" border="1">
  <tr align="center">
    <td><FONT COLOR="#ff0000">�ѹ���������� ��ͧ���¡���������ҡѺ �ѹ�������ش ��س��к��ѹ�������</FONT></td>
  </tr>
</table>
<?
		rpdialog();
		exit;
	}else{
?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<!--a href="./comsn/com_a/rep_ac_comsn_print.php?ftrcode=<?=$ftrcode?>&fmcode=<?=$fmcode?>" target="_blank"><img border="0" src="./images/Amber-Printer.gif">����������</a-->
<?
		require("connectmysql.php");
		//require("./cls/repGenerator.php");
		if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}

$sql  = "select mcode,upa_code,fdate,tdate ";
		$sql .= ",CASE lr WHEN '1' THEN pv ELSE '0' END AS lcl ";
		$sql .= ",CASE lr WHEN '2' THEN pv ELSE '0' END AS lcc ";
		$sql .= "  from ".$dbprefix."bm as a  where 1=1	";
		if($fdate !="" and $tdate !=""){
		$sql .= " and  a.fdate >= '$fdate' and a.tdate <= '$tdate' ";
		}
		if($ftrcode1 !=""){
		$sql .= " and  a.rcode = '$ftrcode1' ";
		}
		 if($fmcode!=""){
			$sql .= " and a.upa_code='".$fmcode."' ";
		}
		if($lr !=""){
		 $sql .=" and a.lr = '$lr' ";
		}




		//$sql .= " group by tab.mcode ";


		//echo "$sql<BR>";
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
		$rec->setOrder($_GET['ord']==""?" a.mcode ":$_GET['ord']);
		$_GET['lp'] = "500";
		$rec->setLimitPage($_GET['lp']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=4&sub=5&cmc=$cmc&lr=$lr&strfdate=$fdate&strtdate=$tdate&fmcode=$fmcode");
		$rec->setBackLink($PHP_SELF,"sessiontab=4");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("fdate,tdate,mcode,upa_code,lcl,lcc");
		$rec->setFieldDesc("�ѹ����������,�ѹ��������ش,���ʫ���,������,��ṹ����,��ṹ���");
		$rec->setFieldAlign("center,center,center,center,right,right");
	//	$rec->setFieldLink(",index.php?sessiontab=2&sub=1&cmc=,,");
		//$rec->setFieldSpace("10%,25%,25%,25%,25%");//10
		$rec->setFieldFloatFormat(",,,,2,2");
		$rec->setSum(true,false,",,,,true,true");
	//	$rec->setSpecial("./images/Amber-Printer.gif","","sale_print","id,checkcheck","IMAGE","�����");
		//$rec->setFieldLink("");
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);


 
	}
}	
function rpdialog(){?>
<table width="100%"><tr><td><br />
<form name="rform" method="post" action="./index.php?sessiontab=4&sub=53">
<table width="40%" border="1" cellpadding="0" cellspacing="0" bordercolor="#FF7F00" align="center">
  <tr>
    <td colspan="2" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center"><strong>�к��ѹ��� ��� ������Ҫԡ����ͧ��÷�Һ������</strong></td>
  </tr>
  <tr>
    <td colspan="2" align="center">&nbsp;</td>
    </tr>
  <!--tr>
    <td align="right">�ͺ&nbsp;&nbsp;</td>
    <td><input type="text" name="ftrcode" id="ftrcode" onkeypress="return chknum(window.event.keyCode)" />
      &nbsp;( ��͡�������� 1-9 )</td>
  </tr-->
  <tr>
  <td align="right" >�ѹ���&nbsp;&nbsp;</td>
  <td colspan="2">
      <input type="text" id="strfdate" onkeypress="return chknum(window.event.keyCode)" name="strfdate" size="10" maxlength="10" value="<?=date("Y-m-d")?>"/>
&nbsp;<a href="javascript:NewCal('strfdate','yyyymmdd',false,24)"><img src="./datetimepick/images/cal.gif" width="16" height="16" border="0" alt="���͡�ѹ������������" /></a>&nbsp; �֧ &nbsp;<input type="text" id="strtdate" onkeypress="return chknum(window.event.keyCode)" name="strtdate" size="10" maxlength="10" value="<?=date("Y-m-d")?>" />
&nbsp;<a href="javascript:NewCal('strtdate','yyyymmdd',false,24)"><img src="./datetimepick/images/cal.gif" width="16" height="16" border="0" alt="���͡�ѹ�������ش" /></a>
</td>
  </tr>
  <tr>
    <td width="24%" align="right">������Ҫԡ&nbsp;&nbsp;</td>
    <td width="76%">
      <input type="text" name="fmcode" id="fmcode" /></td>
  </tr>
  <tr align="center">
    <td colspan="2">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="2" align="center"><input type="button" name="Submit" value="����§ҹ" onclick="checkround()" /></td>
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