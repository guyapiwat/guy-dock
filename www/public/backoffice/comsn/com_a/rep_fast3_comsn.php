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
	function sale_print(id){
		var wlink = 'invoice_aprint_sale.php?bid='+id;
		//var wlink = 'http://yourbizasia.tua-lek.com/billprint.aspx?sano='+id;
		window.open(wlink);
		//window.location.reload();
	//	window.location='index.php?sessiontab=3&sub=6&sanoo='+id;
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

	
	$ftrcode = $_POST['ftrcode']==""?$_GET['ftrcode']:$_POST['ftrcode'];
	$strfdate = $_POST['strfdate']==""?$_GET['strfdate']:$_POST['strfdate'];
	$strtdate = $_POST['strtdate']==""?$_GET['strtdate']:$_POST['strtdate'];
//	if(empty($strtdate))$strtdate = $strfdate;
	$fmcode = $_POST['fmcode']==""?$_GET['fmcode']:$_POST['fmcode'];
	$cmc = $_POST['cmc']==""?$_GET['cmc']:$_POST['cmc'];
	if(empty($cmc))$cmc = $fmcode;
	if (strpos($ftrcode,"-")===false){
			//�ͺ������� == �ͺ����ش
			$ftrc[0]=$ftrcode;
			$ftrc[1]=$ftrcode;
	}else{
		$ftrc = explode('-',$ftrcode);
	}
	//echo "ss $strfdate :   $strtdate<br>";
if($strfdate==""){
	//rpdialog();
}else{
	if($ftrcode!=$ftrcode){
		?><table width="100%" border="1">
  <tr align="center">
    <td><FONT COLOR="#ff0000">�ѹ���������� ��ͧ���¡���������ҡѺ �ѹ�������ش ��س��к��ѹ�������</FONT></td>
  </tr>
</table>
<?
		//rpdialog();
		exit;
	}else{
?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<!--a href="./comsn/com_a/rep_ac_comsn_print.php?ftrcode=<?=$ftrcode?>&fmcode=<?=$fmcode?>" target="_blank"><img border="0" src="./images/Amber-Printer.gif">����������</a-->
<?
		require("connectmysql.php");
			$wwhere = " and a.fdate >= '$strfdate' and a.tdate <= '$strtdate' ";

		//require("./cls/repGenerator.php");
		if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
		$sql = "SELECT a.*,a.percer*100  as percer,m.name_t FROM ".$dbprefix."ac3 a left join ".$dbprefix."member as m on (a.mcode=m.mcode) ";

		
 		if($ftrcode!=""&&$cmc!=""){
			//$sql .= " WHERE tab.sadate = '$strfdate' and a.upa_code='".$fmcode."' and a.mcode = '$cmc'";
			$sql .= " WHERE a.upa_code='".$cmc."' $wwhere  ";
		}
		//echo "$sql<BR>";
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
		$rec->setOrder($_GET['ord']==""?" fdate ":$_GET['ord']);
		$rec->setLimitPage('5000');
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=4&sub=4&ftrcode=$ftrcode&strfdate=$strfdate&strtdate=$strtdate&fmcode=$fmcode&cmc=$cmc");
		$rec->setBackLink($PHP_SELF,"sessiontab=4");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("rcode,mcode,name_t,upa_code,pv,level,percer,total,pos_cur");
		$rec->setFieldDesc("�ͺ���,������Ҫԡ,������Ҫԡ,���ʼ���й�,��ṹ,���,%⺹��,��⺹��,�س���ѵ�");
		$rec->setFieldAlign("center,center,left,center,right,center,center,right,center");
		$rec->setFieldSpace("9%,9%,40%,9%,9%,3%,3%,9%,7%,10%");//10
		$rec->setFieldFloatFormat(",,,,,,2,2,");
		$rec->setSum(true,false,",,,,,,,true");
		//$rec->setFieldLink(",,,,index.php?sessiontab=3&sub=666&aa=,");
		//$rec->setSpecial("./images/Amber-Printer.gif","","sale_print","id,checkcheck","IMAGE","�����");
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);
	}
}	