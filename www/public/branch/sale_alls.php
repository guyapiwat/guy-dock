<script language="javascript" type="text/javascript">
	function sale_print(id){
		var wlink = 'invoice_aprint_sale.php?bid='+id;
		//var wlink = 'http://yourbizasia.tua-lek.com/billprint.aspx?sano='+id;
		window.open(wlink);
	}
	function sale_cancel(id){
		if(confirm("��ͧ���¡��ԡ��Ź��")){
			window.location='index.php?sessiontab=3&sub=6&state=3&bid='+id;
		}
	}
	function sale_status(id){
		if(confirm("��ͧ�������¹�ŧ�Ѵ��")){
			window.location='index.php?sessiontab=3&sub=6&state=6&sender='+id;
		}
	}
</script>
<?
if(isset($_POST["ftrcode1"]))
	$ftrcode1 = $_POST["ftrcode1"];
else if(isset($_GET["ftrcode1"]))
	$ftrcode1 = $_GET["ftrcode1"];

$wwhere = " a.rcode between '".$ftrcode1."' and '".$ftrcode1."' ";
$sql="select min(fdate) as fdate1,max(tdate) as tdate1 from ".$dbprefix."around a where  $wwhere  ";
$result=mysql_query($sql);
if (mysql_num_rows($result)>'0') {
	$row= mysql_fetch_array($result, MYSQL_ASSOC);
	$fdate=$row["tdate1"];
	$tdate=$row["fdate1"];
}
$fmcode = $_POST['fmcode']==""?$_GET['fmcode']:$_POST['fmcode'];
if(isset($_POST["fmcode"]))
	$mcode = $_POST["fmcode"];
else if(isset($_GET["fmcode"]))
	$mcode = $_GET["fmcode"];
rpdialog();
if(!empty($mcode)){
			require("connectmysql.php");
			if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
			$sql = "SELECT * FROM (SELECT cancel,".$dbprefix."asaleh.id,".$dbprefix."asaleh.uid as uid,sano,DATE_FORMAT(sadate, '%Y-%m-%d') as sadate 
			,tot_pv,tot_bv,tot_fv,total,ali_member.name_t,".$dbprefix."asaleh.mcode AS smcode";
			$sql .= ",CASE send WHEN '1' THEN '<img src=./images/true.gif>' ELSE '<img src=./images/false.gif>' END AS sendsend ";
			$sql .= ",CASE sa_type WHEN 'Q' THEN '<img src=./images/true.gif>' ELSE '' END AS preserve ";
			$sql .= ",CASE sa_type WHEN 'A' THEN '<img src=./images/true.gif>' ELSE '' END AS ability ";
			$sql .= ",CASE sa_type WHEN 'H' THEN '<img src=./images/true.gif>' ELSE '' END AS hold ";
			$sql .= ",CASE sa_type WHEN 'I' THEN '<img src=./images/true.gif>' ELSE '' END AS invent ";
			$sql .= ",CASE sa_type WHEN 'C' THEN '<img src=./images/true.gif>' ELSE '' END AS imd,CASE ".$dbprefix."asaleh.inv_code WHEN '' THEN '����ѷ' ELSE ".$dbprefix."asaleh.inv_code END AS inv_code,CASE ".$dbprefix."asaleh.send WHEN '1' THEN '���ᨧ��ҹ����ѷ' ELSE '��Ţ�»���' END AS type ";
			$sql .= ",CASE ".$dbprefix."asaleh.asend WHEN '1' THEN '<img src=./images/true.gif>' ELSE '<img src=./images/false.gif>' END AS asend ,".$dbprefix."member.pos_cur as por_cur ";

			$sql .= "FROM ".$dbprefix."asaleh ";
			$sql .= "LEFT JOIN ".$dbprefix."member ON (".$dbprefix."asaleh.mcode=".$dbprefix."member.mcode)  where cancel = 0 "; 


			if(!empty($mcode))$sql .= " and ".$dbprefix."asaleh.mcode = '$mcode' " ;
			if(!empty($fdate))$sql .= " and ".$dbprefix."asaleh.sadate between '".$tdate."'  and  '".$fdate."' and tot_pv > 0  ";

			$sql .= " UNION "; 

			$sql .= "SELECT cancel,".$dbprefix."holdhead.id,".$dbprefix."holdhead.uid as uid,hono as sano ,DATE_FORMAT(sadate, '%Y-%m-%d') as sadate 
			,tot_pv,tot_bv,tot_fv,total,ali_member.name_t,".$dbprefix."holdhead.mcode AS smcode";
			$sql .= ",'<img src=./images/false.gif>' AS sendsend ";
			$sql .= ",CASE sa_type WHEN 'Q' THEN '<img src=./images/true.gif>' ELSE '' END AS preserve ";
			$sql .= ",CASE sa_type WHEN 'A' THEN '<img src=./images/true.gif>' ELSE '' END AS ability ";
			$sql .= ",CASE sa_type WHEN 'H' THEN '<img src=./images/true.gif>' ELSE '' END AS hold ";
			$sql .= ",CASE sa_type WHEN 'I' THEN '<img src=./images/true.gif>' ELSE '' END AS invent ";
			$sql .= ",CASE sa_type WHEN 'C' THEN '<img src=./images/true.gif>' ELSE '' END AS imd,CASE ".$dbprefix."holdhead.inv_code WHEN '' THEN '����ѷ' ELSE ".$dbprefix."holdhead.inv_code END AS inv_code,'��Ţ��ᨧ�ʹ' as type ";
			$sql .= ",'<img src=./images/false.gif>' AS asend ,".$dbprefix."member.pos_cur as por_cur ";

			$sql .= "FROM ".$dbprefix."holdhead ";
			$sql .= "LEFT JOIN ".$dbprefix."member ON (".$dbprefix."holdhead.mcode=".$dbprefix."member.mcode)  where cancel = 0";

			if(!empty($mcode))$sql .= " and ".$dbprefix."holdhead.mcode = '$mcode' " ;
			if(!empty($fdate))$sql .= " and ".$dbprefix."holdhead.sadate between '".$tdate."'  and  '".$fdate."' and tot_pv > 0 ";

			$sql .= " ) as a where 1=1 "; 

		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
		$rec->setOrder($_GET['ord']==""?" id ":$_GET['ord']);
		$rec->setLimitPage($_GET['lp']);	
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=3&sub=38");
		$rec->setBackLink($PHP_SELF,"sessiontab=3");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("sano,smcode,name_t,ability,hold,sadate,tot_pv,total,inv_code");
		$rec->setFieldDesc("�Ţ���,���ʼ�����,���ͼ�����,����,HOLD,�ѹ������,�ӹǹ���  PV,�ӹǹ�Թ���,���ѹ�֡");
		$rec->setFieldFloatFormat(",,,,,,0,2");
		$rec->setFieldAlign("center,center,left,center,center,center,right,right,center,center");
		$rec->setFieldSpace("15%,7%,30%,7%,7%,7%,7%,8%,8%,8%,6%,10%");
 	//	$rec->setSearch("sano,sadate,smcode,inv_code");
	//	$rec->setSearchDesc("�Ţ���,�Ţ���ᨧ,�ѹ���,���ʼ�����,���ѹ�֡");
		$rec->setSum(true,false,",,,,,,true,true,,");
		$rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");
	//	$rec->setSpecial("./images/Amber-Printer.gif","","sale_print","id","IMAGE","�����");
		$rec->showRec(1,'SH_QUERY');
}

?>
<?
function rpdialog(){?>
<table width="100%"><tr><td><br />
<form name="rform" method="post" action="./index.php?sessiontab=<?=$_GET['sessiontab']?>&sub=<?=$_GET['sub']?>">
<table width="40%" border="1" cellpadding="0" cellspacing="0" bordercolor="#FF7F00" align="center">
  <tr>
    <td colspan="2" align="center">&nbsp;</td>
  </tr>
  
  <tr>
    <td width="24%" align="right">������Ҫԡ&nbsp;&nbsp;</td>
    <td width="">
		<input type="text" name="fmcode" id="fmcode"  value="<?=$_POST['fmcode']?>"  />
		
		<input type="Submit" name="Submit" value="����§ҹ"  />
	</td>

  </tr>
  <tr align="center">
    <td colspan="2">&nbsp;</td>
    </tr>
  <tr>
   
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
</td></tr></table>
<? }