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
    <td><FONT COLOR="#ff0000">�ѹ���������� ��ͧ���¡���������ҡѺ �ѹ�������ش ��س���غ��ѹ�������</FONT></td>
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
		$sql = "SELECT DATE_FORMAT(a.mdate, '%d-%m-%Y') as mdate,a.rcode,a.inv_code,a.sano,a.sa_type,a.tot_pv,a.tot_price,taba.inv_desc  ";
		$sql .= ",CASE status WHEN 'A' THEN '<img src=./images/true.gif>' ELSE '' END AS status1 ";
		$sql .= ",CASE status WHEN 'E' THEN '<img src=./images/true.gif>' ELSE '' END AS status2 ";
		$sql .= ",CASE status WHEN 'H' THEN '<img src=./images/true.gif>' ELSE '' END AS status3 ";
		$sql .= ",CASE sa_type WHEN 'A' THEN '<img src=./images/true.gif>' ELSE '' END AS sa_type1 ";
		$sql .= ",CASE sa_type WHEN 'Q' THEN '<img src=./images/true.gif>' ELSE '' END AS sa_type2 ";
		$sql .= ",CASE sa_type WHEN 'C' THEN '<img src=./images/true.gif>' ELSE '' END AS sa_type3 ";
		$sql .= "FROM ".$dbprefix."fm a ";
		//$sql .= "LEFT JOIN ".$dbprefix."member m ON c.mcode=m.mcode ";
		$sql .= " LEFT JOIN (SELECT inv_code,inv_desc  FROM ".$dbprefix."invent) AS taba ON (a.inv_code=taba.inv_code)";
		if($strfdate!=""&&$strtdate!=""&&$fmcode!=""){
			$sql .= " WHERE a.mdate>= '$strfdate' and a.mdate<= '$strtdate' and a.inv_code='".$fmcode."'";
		}else if($strfdate!=""&&$strtdate!=""){
			$sql .= " WHERE a.mdate>= '$strfdate' and a.mdate<= '$strtdate' ";
		}else if($fmcode!=""){
			$sql .= " WHERE a.inv_code='".$fmcode."'";
		}
		//echo $sql;

		//echo $sql;
		//exit;
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
		$rec->setOrder($_GET['ord']==""?" rcode ":$_GET['ord']);
		$rec->setLimitPage($_GET['lp']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=4&sub=43&strfdate=$strfdate&strtdate=$strtdate&fmcode=$fmcode");
		$rec->setBackLink($PHP_SELF,"sessiontab=4");
		if(isset($page))
			$rec->setCurPage($page);
		//$rec->setSpecial("./images/search.gif","","view","rcode,mcode","IMAGE","��");
		$rec->setShowField("rcode,mdate,sano,inv_code,inv_desc,tot_pv,tot_price,status1,status2,status3,sa_type1,sa_type2,sa_type3");
		$rec->setFieldDesc("�ͺ,�ѹ���,�Ţ���,�����Ң�,�����Ң�,PV,�Ҥ�,Ẻᨧ��ҹ����ѷ,��������,ᨧ�ʹ,�Ӥس���ѵ�,�ѡ���ʹ,�ѡ���ʹ�ѹ��");
		$rec->setFieldAlign("center,center,center,center,left,right,right,center,center,center,center,center,center");
		$rec->setFieldSpace("5%,8%,9%,6%,15%,8%,8%,8%,6%,6%,7%,5%,6%");
		$rec->setSum(true,false,",,,,,true,true,,");
		$rec->setFieldFloatFormat(",,,,,0,2,,,,,,,,");
		$rec->setFieldLink("");
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		//$rec->setSearch("a.inv_code,a.sano");
		//$rec->setSearchDesc("�����Ң�,�Ţ���");
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);

	}
}	
function rpdialog(){?>
<table width="100%"><tr><td><br />
<form name="rform" method="post" action="./index.php?sessiontab=4&sub=1">
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
      <input type="text" name="fmcode" id="fmcode" readonly value="<?=$_SESSION["admininvent"]?>" /></td>
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
