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
	$vip = $_POST['vip']==""?$_GET['vip']:$_POST['vip'];
 
?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<!--a href="./comsn/com_a/rep_ac_comsn_print.php?ftrcode=<?=$ftrcode?>&fmcode=<?=$fmcode?>" target="_blank"><img border="0" src="./images/Amber-Printer.gif">����������</a-->
<?
		require("connectmysql.php");
		//require("./cls/repGenerator.php");
		if ( $vip == 1 ){$where1 = "where mtype2 = 1";$LEFT ='RIGHT'; }
		else {$where1 = "";$LEFT ='LEFT';}

		if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
		$sql = "SELECT a.id,DATE_FORMAT(a.date_change, '%Y-%m-%d') as date_change,DATE_FORMAT(a.date_update, '%Y-%m-%d') as date_update,a.rcode,a.mcode,taba.name_t,a.pos_before,a.pos_after
		,CASE type WHEN '1' THEN 'VIP' ELSE '����' END AS vip
		,CASE a.uid WHEN '' THEN '�к�' ELSE a.uid END AS uid		
		FROM ".$dbprefix."calc_poschange a  ";
		$sql .= "".$LEFT." JOIN (SELECT mcode AS mca,name_t FROM ".$dbprefix."member ".$where1." ) AS taba ON (a.mcode=taba.mca)";

		if($strfdate!=""&&$strtdate!=""&&$fmcode!=""){
			$sql .= " WHERE date_change>= '$strfdate' and date_change<= '$strtdate' and a.mcode='".$fmcode."'";
		}else if($strfdate!=""&&$strtdate!=""){
			$sql .= " WHERE date_change>= '$strfdate' and date_change<= '$strtdate' ";
		}else if($fmcode!=""){
			$sql .= " WHERE a.mcode='".$fmcode."'";
		}

		//echo $sql;
		//exit;
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort(($_GET['srt']==""?"UP":$_GET['srt']));
		$rec->setOrder(($_GET['ord']==""?"id":$_GET['ord']));
		$rec->setLimitPage($_GET['lp']);
		$rec->setSize("100%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		$rec->setFieldLink(",index.php?sessiontab=1&sub=4&cmc=,");
		$rec->setLink($PHP_SELF,"sessiontab=4&sub=7&strfdate=$strfdate&strtdate=$strtdate&fmcode=$fmcode&vip=$vip");
		$rec->setBackLink($PHP_SELF,"sessiontab=4");
		
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowIndex(true);
		//$rec->setSpecial("./images/search.gif","","view","rcode,mcode","IMAGE","��");
		$rec->setShowField("date_change,mcode,name_t,pos_before,pos_after,vip,date_change,uid");
		$rec->setFieldDesc("�ѹ����Ѻ���˹�,������Ҫԡ,������Ҫԡ,���˹����,���˹�����,VIP,�ѹ������¡��,���ѹ�֡");
		$rec->setFieldAlign("center,center,left,center,center,center,center,center");
		$rec->setFieldSpace("8%,8%,39%,9%,9%,8%,8%,8%");//10
		$rec->setFieldFloatFormat("");
		$rec->setSum(true,false,"");
	
		if($_GET['excel']==1){
			$rec->exportXls("ExportXls","newposition".date("Ymd").".xls","SH_QUERY");
			$str = "<fieldset><a href='".$rec->download("ExportXls","newposition".date("Ymd").".xls")."' >";
			$str .= "<img border='0' src='./images/download.gif'>��Ŵ Excel</a></fieldset>";
			//$rec->getParam();
			$rec->setSpace($str);
		}
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		//$rec->setSearch("a.mcode");
		//$rec->setSearchDesc("����");
		$str = "<fieldset><a href='".$rec->getParam()."&excel=1' target='_self'>";
		$str .= "<img border='0' src='./images/excel.gif'>���ҧ Excel</a></fieldset>";
		$rec->setSpace($str);
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);
 
	
function rpdialog(){?>
<table width="100%"><tr><td><br />
<form name="rform" method="post" action="./index.php?sessiontab=4&sub=7">
<table width="52%" border="1" cellpadding="0" cellspacing="0" bordercolor="#FF7F00" align="center">
  <tr>
    <td colspan="2" align="center">&nbsp;</td>
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
 <td align="right">�ѹ���
      <input type="text" id="strfdate" onkeypress="return chknum(window.event.keyCode)" name="strfdate" size="10" maxlength="10" value="<?=$_POST['strfdate']?>" placeholder="2014-01-20"/>
&nbsp;<a href="javascript:NewCal('strfdate','yyyymmdd',false,24)"><img src="./datetimepick/images/cal.gif" width="16" height="16" border="0" alt="���͡�ѹ������������" /></a>&nbsp; �֧ &nbsp;<input type="text" id="strtdate" onkeypress="return chknum(window.event.keyCode)" name="strtdate" size="10" maxlength="10" value="<?=$_POST['strtdate']?>" placeholder="2014-01-31"/>
&nbsp;<a href="javascript:NewCal('strtdate','yyyymmdd',false,24)"><img src="./datetimepick/images/cal.gif" width="16" height="16" border="0" alt="���͡�ѹ�������ش" /></a>
</td>

    <td  align="right">������Ҫԡ&nbsp;&nbsp;</td>
    <td >
    
	  <td ><input type="text" name="fmcode" id="fmcode" placeholder="0000001" value="<?=$_POST['fmcode']?>" /></td>
	 <td  align="right">VIP</td>
    <td ><select name="vip"  id="vip">
	       <option value="" <? if($_POST['vip']=="")echo "selected"; ?> >������</option>
		   <option value="1" <? if($_POST['vip']==1)echo "selected"; ?> >VIP</option>
	</td>
	 <td ><input type="button" name="Submit" value="����§ҹ" onclick="checkround()" /></td>
  </tr>

  <tr align="center">
    <td colspan="2">&nbsp;</td>
    </tr>
 
</table>
</form>
</td></tr></table>
<? }
?>