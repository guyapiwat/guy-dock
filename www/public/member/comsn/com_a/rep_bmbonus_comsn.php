<? include("./global.php");?>
<? include("rpdialog.php");?>

<?
rpdialog_m(6);
$strfdate1 = $_POST['strfdate']==""?$_GET['strfdate']:$_POST['strfdate'];
$strtdate1 = $_POST['strtdate']==""?$_GET['strtdate']:$_POST['strtdate'];


require("connectmysql.php");
require("./cls/repGenerator_b.php");
if (isset($_SESSION["usercode"])){$smc=$_SESSION["usercode"];}else{$smc="";}
if (isset($_GET["cmc"])){$cmc=$_GET["cmc"];}else{$cmc="";}
if (isset($_POST["pmc"])){$cmc=$_POST["pmc"];}
if (isset($_GET["ftrcode"])){$ftrcode=$_GET["ftrcode"];}else{$ftrcode="";}
if ($cmc=="") {$cmc=$smc;}
if ($cmc=="") {
	$cmc=$_SESSION["usercode"];
}

 	if (strpos($ftrcode,"-")===false){
			//ÃÍºàÃÔèÁµé¹ == ÃÍºÊÔé¹ÊØ´
			$ftrc[0]=$ftrcode;
			$ftrc[1]=$ftrcode;
	}else{
		$ftrc = explode('-',$ftrcode);
	}
	$wwhere = " and a.rcode between '".$ftrc[0]."' and '".$ftrc[1]."' ";
	$sql="select min(fdate) as fdate1,max(tdate) as tdate1 from ".$dbprefix."around a where   a.rcode between '".$ftrc[0]."' and '".$ftrc[1]."'   ";
	$result=mysql_query($sql);
	if (mysql_num_rows($result)>'0') {
		$row= mysql_fetch_array($result, MYSQL_ASSOC);
		$strtdate=$row["tdate1"];
		$strfdate=$row["fdate1"];
	}
 
	if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
	$sql = "SELECT m.acc_no";
	$sql .= ",a.mpos,a.fdate,a.tdate,a.rcode,a.mcode,a.balance,a.mcode as smcode,concat(m.name_f,' ',m.name_t) as name_t1,a.ro_l,a.ro_c,a.total_pv_l,a.total_pv_r,a.pcrry_l,a.ro_l+a.pcrry_l as pcrry_ll ,a.cycle_b,
	a.ro_c+a.pcrry_c as pcrry_cc,a.point as point,a.pair_stop as pair_stop,
	a.pcrry_c,a.carry_l,a.carry_c,a.total/1 as total,a.tax as tax,a.totalamt as totalamt,a.quota/1000 as quota ,a.adjust ";
	$sql .= ",IF(total_pv_l>total_pv_r,total_pv_l,total_pv_r) as weak";
	$sql .= ",IF(total_pv_l>total_pv_r,total_pv_r,total_pv_l) as strong";
	$sql .= ",CASE total WHEN '0' THEN '0' ELSE a.total_pv_ll END AS total_pv_lll ";
	$sql .= "FROM ".$dbprefix."bmbonus a ";
	$sql .= " LEFT JOIN ".$dbprefix."member m ON a.mcode=m.mcode ";
	$sql .= " LEFT JOIN ".$dbprefix."around ar ON (a.rcode=ar.rcode ) ";

	if($ftrcode!=""&&$cmc!=""){
		$sql .= " WHERE  a.mcode='".$cmc."' $wwhere ";
	}else if($ftrcode!=""){
		$sql .= " WHERE 1=1 $wwhere   ";
	}else if($cmc!=""){
		$sql .= " WHERE  a.mcode='".$cmc."' ";
	}
	$sql .= " and (a.ro_l > 0 or a.ro_c > 0)  ";
	
	if($strfdate1!=""){
		$sql .= " and a.fdate >= '".$strfdate1."' and a.tdate <= '".$strtdate1."' ";
	}
	$sql .=" and ar.calc='1' ";

	//echo "$sql<BR>";
	$rec = new repGenerator();
	$rec->setQuery($sql);
	$rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
	$rec->setOrder($_GET['ord']==""?" fdate ":$_GET['ord']);
	$rec->setLimitPage($_GET['lp']);
	$rec->setSize("95%","");
	$rec->setAlign("center");
	$rec->setPageLinkAlign("right");
	//$rec->setPageLinkShow(false,false);
	$rec->setLink($PHP_SELF,"sessiontab=5&sub=6&ftrcode=$ftrcode&strfdate=$strfdate&strtdate=$strtdate&fmcode=$cmc");
	$rec->setBackLink($PHP_SELF,"sessiontab=5");
	if(isset($page))
		$rec->setCurPage($page);
	$rec->setShowField("fdate,pcrry_l,pcrry_c,ro_l,ro_c,pcrry_ll,pcrry_cc,balance,carry_l,carry_c,total");
	$rec->setFieldDesc($wording_lan["cdate"].",".$wording_lan["tab5"]['3_5'].",".$wording_lan["tab5"]['3_6'].",".$wording_lan["tab5"]['3_3'].",".$wording_lan["tab5"]['3_4'].",".$wording_lan["tab5"]['3_7'].",".$wording_lan["tab5"]['3_8'].",balance,".$wording_lan["tab5"]['3_9'].",".$wording_lan["tab5"]['3_10'].",".$wording_lan["tab5"]['3_14']."");
	$rec->setFieldAlign("center,right,right,right,right,right,right,right,right,right,right,right,right,right");
	$rec->setSum(true,false,",,,true,true,true,true,true,true,true,true,true,true");
	$rec->setFieldFloatFormat(",,,2,2,2,2,2,2,2,2,2,2");
	$rec->setFieldLink(",,,index.php?sessiontab=5&sub=66&lr=1&fmcode=,
								 index.php?sessiontab=5&sub=66&lr=2&fmcode= ");
	$rec->showRec(1,'SH_QUERY');
	mysql_close($link);

?>

