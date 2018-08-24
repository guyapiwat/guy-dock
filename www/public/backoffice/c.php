<?
session_start();
//var_dump($_SESSION["okokokok"]);
//echo '<script language="javascript">window.close();</script>';
//var_dump($_SESSION["pcode"]);
require("connectmysql.php");
include("prefix.php");
require("./cls/repGenerator.php");

if(!empty($_SESSION["pcode"]))$_POST['pcode'] = $_SESSION["pcode"];
if(!empty($_SESSION["qty"]))$_POST['qty'] = $_SESSION["qty"];
if(!empty($_SESSION["radsend"]))$radsend = $_SESSION["radsend"];
if(!empty($_SESSION["sumpv"]))$tot_pv = $sumpv = $_SESSION["sumpv"];
if(!empty($_SESSION["cprovince"]))$cprovinceId =$_SESSION["cprovince"];
$qgroup_id = array();
$group_id = array();

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
$tot_weight = $tot_weight+0.1;
$tot_weight1 = $tot_weight;
$shipping = 0;
if($radsend == '1'){
	if($tot_pv < 1500){//Send-Fee
		if($cprovinceId == '1' or $cprovinceId == '2' or $cprovinceId == '3' or $cprovinceId == '4')$shipping = 100;
		else $shipping = 150;
		$tot_weight = $tot_weight-5;
		if($tot_weight >0)$shipping = $shipping+70*ceil($tot_weight);
	}else if($tot_pv >= 1500 and $tot_pv<2499){
		$tot_weight = $tot_weight-5;
		if($tot_weight >0)$shipping = $shipping+70*ceil($tot_weight);
	}else if($tot_pv >= 2500 and $tot_pv<4499){
		$tot_weight = $tot_weight-10;
		if($tot_weight >0)$shipping = $shipping+70*ceil($tot_weight);
	}else if($tot_pv >= 4500){
		$tot_weight = $tot_weight-20;
		if($tot_weight >0)$shipping = $shipping+70*ceil($tot_weight);
	}
}
if(empty($sumpv))$sumpv = 0; 

//if($shipping > 0)echo "<font color=#FF0000><b>ALL PV : $sumpv PV ,Weight : $tot_weight1 KG, Shipping : $shipping Baht</b></font>" ;
//else echo '1';
$priceprice = $_SESSION["sumtotal"]+$shipping;
if($shipping > 0)echo '<meta http-equiv="Content-Language" content="th">
<meta http-equiv="Content-Type" content="text/html; charset=tis-620">
'.' '."<font color=#FF0000><b>PV รวม $sumpv   น้ำหนักรวม $tot_weight1 กิโลกรัม    ค่าจัดส่ง $shipping บาท ยอดรวมใหม่  $priceprice บาท</b></font>" ;
else echo '1';
//echo '<iframe width="400" height="500" frameborder="0" src="./free_show.php?sqlwhere="'.$sqlwhere.' ></iframe>';

//var_dump($_SESSION["totalpv"]);
//var_dump($_SESSION["sumtotal"]);
//var_dump($_SESSION["sumpv"]);
//echo '1';
?>

