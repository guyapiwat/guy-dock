<script language="javascript" type="text/javascript">
	function sale_print(id,sa){
		wlink = '../invoice/aprint_sale_member.php?bid='+id;
		//var wlink = 'http://yourbizasia.tua-lek.com/billprint.aspx?sano='+id;
		window.open(wlink);
		//window.location='index.php?sessiontab=4&sub=7&sanoo='+id;
	}
</script>
<?
require("connectmysql.php");
require("./cls/repGenerator.php");
include("rpdialog.php");
if($_GET["sanoo"]){
$sqlupdate = "update ".$dbprefix."asaleh set print = print+1 where id = '{$_GET["sanoo"]}'";
mysql_query($sqlupdate);
}

if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
$sql = "SELECT cancel,print,".$dbprefix."asaleh.id,".$dbprefix."asaleh.lid,sano,DATE_FORMAT(sadate, '%Y-%m-%d') as sadate 
,tot_pv,tot_bv,tot_fv,remark,total,CONCAT(".$dbprefix."member.name_f,' ',".$dbprefix."asaleh.name_t) as name_t,".$dbprefix."asaleh.mcode AS smcode";
$sql .= ",CASE send WHEN '1' THEN '<img src=./images/true.gif>' ELSE '<img src=./images/false.gif>' END AS sendsend ";
$sql .= ",CASE ".$dbprefix."asaleh.uid WHEN '' THEN ".$dbprefix."asaleh.inv_code ELSE ".$dbprefix."asaleh.uid END AS uid ";
$sql .= ",CASE checkportal WHEN '1' THEN 'HQ' WHEN '2' THEN 'Branch' WHEN '3' THEN 'ONLINE'  END AS checkportal";
$sql .= ",CASE sa_type WHEN 'A' THEN 'ปกติ' WHEN 'H' THEN 'Hold' WHEN 'Q' THEN 'รักษายอด' END AS ability";
$sql .= $sqlWhere_satype1;

$sql .= ",CASE ".$dbprefix."asaleh.receive WHEN '1' THEN concat('<img src=./images/true.gif><br>',".$dbprefix."asaleh.receive_date) ELSE '<img src=./images/false.gif>' END AS receive ,
CASE ".$dbprefix."asaleh.sender WHEN '1' THEN concat('<img src=./images/true.gif><br>',".$dbprefix."asaleh.sender_date) ELSE '<img src=./images/false.gif>' END AS sender ,
".$dbprefix."member.pos_cur as por_cur ";

$sql .= "FROM ".$dbprefix."asaleh ";
$sql .= "LEFT JOIN ".$dbprefix."member ON (".$dbprefix."asaleh.mcode=".$dbprefix."member.mcode) where (".$dbprefix."asaleh.uid='".$_SESSION['usercode']."' or ".$dbprefix."asaleh.ref='".$_SESSION['usercode']."') and ".$dbprefix."asaleh.mcode <> '".$_SESSION['usercode']."' and ".$dbprefix."asaleh.cancel  = 0 "; //WHERE smcode='".$_SESSION['usercode']."' 
	if($_GET['state']==2){
		include("sale_editadd.php");
	}else{
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
		$rec->setOrder($_GET['ord']==""?" id ":$_GET['ord']);
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=4&sub=7");
		$rec->setBackLink($PHP_SELF,"sessiontab=4");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("sadate,sano,smcode,name_t,ability,tot_pv,total,sendsend,sender,receive,remark");
		$rec->setFieldFloatFormat(",,,,,2,2,");
		$rec->setFieldDesc($wording_lan["tab4"]["3_2"].",".$wording_lan["tab4"]["3_3"].",".$wording_lan["tab4"]["3_4"].",".$wording_lan["tab4"]["3_5"].",".$wording_lan["tab4"]["3_6"].",".$wording_lan["tab4"]["3_7"].",".$wording_lan["tab4"]["3_8"].",".$wording_lan["tab4"]["3_10"].",".$wording_lan["tab4"]["3_11"].",".$wording_lan["tab4"]["3_12"].",".$wording_lan["tab4"]["3_13"].",".$wording_lan["tab4"]["3_15"]."");
		$rec->setFieldAlign("center,center,center,left,center,right,right,center,center,center,left");
		$rec->setSum(true,false,",,,,,true,true");
		$rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");
		$rec->setShowMobile(true,"true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true");
        $rec->setSpecial("./images/Amber-Printer.gif","","sale_print","id","IMAGE",$wording_lan["print"]);     
		$rec->showRec(1,'SH_QUERY');
	}
//	echo "</fieldset>";		
	
	
?>
