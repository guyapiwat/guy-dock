<script language="javascript" type="text/javascript">
	function sale_print(id){
		var wlink = 'invoice_aprints.php?bid='+id;
		window.open(wlink);
	}
	function sale_status(id){
		if(confirm("ต้องการเปลี่ยนแปลงจัดส่ง")){
			window.location='index.php?sessiontab=3&sub=36&state=2&status=sender&sender='+id;
		}
	}
</script>
<?
require("connectmysql.php");
//require("./cls/sqlAnalizer.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
//$sql = "SELECT pcode,pdesc,price,SUM(qty) AS qty,SUM(amt) AS amt FROM ".$dbprefix."asaled "; 
//$sql = "SELECT id,sano,sadate,tot_pv,total,name_t,smcode FROM ".$dbprefix."asaleh ";
//$sql .= "LEFT JOIN (SELECT mcode,mcode AS smcode,name_t FROM ".$dbprefix."member) AS tabname ON (".$dbprefix."asaleh.mcode=tabname.mcode) ";
$sql = "SELECT ".$dbprefix."asaleh.id,sano,DATE_FORMAT(".$dbprefix."asaleh.sadate, '%d-%m-%Y') as sadate,tot_bv,tot_fv,tot_pv,total,".$dbprefix."member.name_t,".$dbprefix."asaleh.mcode AS smcode ";
//$sql .= ",CASE sa_type WHEN 'Q' THEN '<img src=./images/true.gif>' ELSE '' END AS preserve ";
//$sql .= ",CASE sa_type WHEN 'A' THEN '<img src=./images/true.gif>' ELSE '' END AS ability ";
$sql .= "FROM ".$dbprefix."asaleh ";
$sql .= "LEFT JOIN ".$dbprefix."member ON (".$dbprefix."asaleh.mcode=".$dbprefix."member.mcode) where ".$dbprefix."asaleh.asend = '0'"; //WHERE smcode='".$_SESSION['usercode']."' 

	
	if($_GET['state']==1){
		include("sale_held1.php");
	}
	if($_GET['state']==1){
		include("change_held.php");
	}
		//$rec = new sqlAnalizer();
		//echo "<br />";
		$rec = new repGenerator_held();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
		$rec->setOrder($_GET['ord']==""?" ".$dbprefix."asaleh.id ":$_GET['ord']);

		$rec->setLimitPage($_GET['lp']);	
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=3&sub=".$_GET['sub']);
		$rec->setBackLink($PHP_SELF,"sessiontab=3");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("sadate,sano,smcode,name_t,tot_pv,total");
		if($acc->isAccess(4)){
			$rec->setDel("index.php","id","id","sessiontab=3&sub=36");
			$rec->setFromDelAttr("maindel","./index.php?sessiontab=3&sub=36&state=1","post","delfield");
		}
		$rec->setFieldFloatFormat(",,,,0,0,0,2");
		$rec->setFieldDesc("วันที่ซื้อ,เลขบิล,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,PV,จำนวนเงินรวม");
		$rec->setFieldAlign("center,center,center,left,right,right,right,right,right");
		$rec->setFieldSpace("8%,8%,8%,50%,10%,10%,10%,15%");
		$rec->setSum(true,false,",,,,true,true,true,true,true");
		$rec->showRec(1,'SH_QUERY');
		//---------------------------------
	//}

?>