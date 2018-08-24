<?
session_start();
//var_dump($_SESSION["okokokok"]);
//echo '<script language="javascript">window.close();</script>';
//var_dump($_SESSION["pcode"]);
require("connectmysql.php");
include("prefix.php");
require("./cls/repGenerator.php");
require("./global.php");
require("./function.php");
include_once("wording".$_SESSION["lan"].".php");

if(!empty($_SESSION["pcode"]))$_POST['pcode'] = $_SESSION["pcode"];
if(!empty($_SESSION["qty"]))$_POST['qty'] = $_SESSION["qty"];
if(!empty($_SESSION["radsend"]))$radsend = $_SESSION["radsend"];
if(!empty($_SESSION["sumpv"]))$tot_pv = $sumpv = $_SESSION["sumpv"];
if(!empty($_SESSION["cprovince"]))$cprovinceId =$_SESSION["cprovince"];
if(!empty($_SESSION["sumtotal"]))$total = $sumtotal = $_SESSION["sumtotal"];
$qgroup_id = array();
$group_id = array();

//$pcode = '10031MM';
		$tot_weight = 0;
		if(isset($_POST['pcode'])){
			$pcode=$_POST['pcode'];
			$qty=$_POST['qty'];
			for($i=0;$i<sizeof($pcode);$i++){
				$sql="SELECT weight FROM ".$dbprefix."product_package where pcode = '".$pcode[$i]."'";
				//exit;
				$rs = mysql_query($sql);
				//echo "$sql<BR>";
				if(mysql_num_rows($rs) > 0)
				{
					for($m=0;$m<mysql_num_rows($rs);$m++){
						
						$sqlObj = mysql_fetch_object($rs);
						$weight =$sqlObj->weight*$qty[$i];	
						$tot_weight = $tot_weight+$weight;
					}
				}else{
					$sql="SELECT weight FROM ".$dbprefix."product where pcode = '".$pcode[$i]."'";
					//exit;
					$rs = mysql_query($sql);
					//echo "$sql<BR>";
					if(mysql_num_rows($rs) > 0)
					{
						$sqlObj = mysql_fetch_object($rs);
						$weight =$sqlObj->weight*$qty[$i];	
						$tot_weight = $tot_weight+$weight;
					}
				}
				//echo $qty[$i];
			}
		}
//$tot_weight = $tot_weight+0.1;
$tot_weight1 = $tot_weight/1000;
$shipping = 0;
//$radsend = '1';
//$GLOBALS["sending"]  = '1';
//$tot_pv = 240;
if($radsend == '1' and $GLOBALS["sending"] == '1' ){
	$arr_sending = array();
	$arr_sending = searchsending($dbprefix,$_SESSION["m_locationbase"],$stype,$sumpv,$tot_weight);
	//echo $tot_pv.':'.$_SESSION["inv_locationbase"];
		if($tot_weight >= 0)$shipping = $arr_sending["inbound-pcode"]["price"];
	
	/*
		if($cprovinceId == '1' or $cprovinceId == '2' or $cprovinceId == '3' or $cprovinceId == '4' or $cprovinceId == 'กรุงเทพมหานคร' or $cprovinceId == 'สมุทรปราการ' or $cprovinceId == 'นนทบุรี' or $cprovinceId == 'ปทุมธานี')$shipping = $arr_sending["inbound-pcode"]["price"];
		else $shipping = $arr_sending["outbound-pcode"]["price"];
		$tot_weight = $tot_weight-$arr_sending["maxweight"];
		if($tot_weight >0)$shipping = $shipping+$arr_sending["overweight-pcode"]["price"]*ceil($tot_weight);
	*/
}
if(empty($sumtotal))$sumtotal = 0; 

//if($shipping > 0)echo "<font color=#FF0000><b>ALL PV : $sumpv PV ,Weight : $tot_weight1 KG, Shipping : $shipping Baht</b></font>" ;
//else echo '1';
$_SESSION["ajaxcharge"] = 1;
$priceprice = ($_SESSION["sumtotal"]*$_SESSION["ajaxcharge"])+$shipping;
$priceprice1 = ($_SESSION["sumtotal"]*($_SESSION["ajaxcharge"]-1));
if($shipping > 0){

 $sss = '<meta http-equiv="Content-Language" content="th">
<meta http-equiv="Content-Type" content="text/html; charset=tis-620">
'.' '."<div class='alert alert-danger center'>".$wording_lan["tab4"]["1_34"]." $sumtotal ".$wording_lan["operate"]["13"]."  PV ".$wording_lan["tab5"]['3_15']." $tot_pv    ".$wording_lan['tab4']['1_68']." $shipping ".$wording_lan["operate"]["13"]."" ;
//if($_SESSION["ajaxcharge"]>0)$sss .= " Charge $priceprice1 ";
$sss .= "".$wording_lan['tab4']['1_69']."  $priceprice </div>";
echo $sss;}else echo '1';
//echo '<iframe width="400" height="500" frameborder="0" src="./free_show.php?sqlwhere="'.$sqlwhere.' ></iframe>';

//var_dump($_SESSION["totalpv"]);
//var_dump($_SESSION["sumtotal"]);
//var_dump($_SESSION["sumpv"]);
//echo '1';
?>

