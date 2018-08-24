<? 
session_start();
include("connectmysql.php");
include("prefix.php");
require_once("function.php");
require_once("logtext.php");
require_once ("function.log.inc.php");
if(isset($_GET['state'])){

	$date_now = date("Y-m-d");
	$page = $_GET['page'];
	//$sqlSelect = "select * from ".$dbprefix."asaleh where id = '{$_GET["sender"]}' and ".$dbprefix."asaleh.inv_code = '{$_SESSION["admininvent"]}' ";
	$sqlSelect = "select * from ".$dbprefix."asaleh where id = '{$_GET["sender"]}'  ";
	$rs = mysql_query($sqlSelect);
//	echo $sqlSelect;
//	exit;
	if(mysql_num_rows($rs) > 0){
		$sqlObj = mysql_fetch_object($rs);
				$asend =$sqlObj->receive;		
		$inv_code =$sqlObj->inv_code;		
		$sano = $_GET["sender"];	
	/*	if($asend == '1'){
			echo "<script	language='JavaScript'>alert('ไม่สามารถแก้ไขการรับของได้');window.location='index.php?sessiontab=3&sub=145'</script>";	
			exit;
		}*/

		if($asend == '1'){
			$sql = "select * from ".$dbprefix."asaled where sano='".$_GET["sender"]."'";
			$result = mysql_query($sql);
			for($i=0;$i<mysql_num_rows($result);$i++){
				$data = mysql_fetch_object($result);
				$pcode =$data->pcode;
				$qty =$data->qty;
			//	if(!empty($inv_code))plusProduct1($dbprefix,$pcode,$inv_code,$qty,$sano,$_SESSION['adminusercode'],$asend);
			//	else if(!empty($inv_code))plusProduct1($dbprefix,$pcode,$inv_code,$qty,$sano,$_SESSION['adminusercode'],$asend);
			}
		}
		


		if($asend == 0)$asend = 1;
		else {
			$asend = 0;
			$date_now= '';
		}

		//$sqlUpdate = "update ".$dbprefix."asaleh set receive = '$asend',receive_date = '$date_now',uid_receive = '".$_SESSION['inv_usercode']."'  where id = '{$_GET["sender"]}' and ".$dbprefix."asaleh.inv_code = '{$_SESSION["admininvent"]}' ";
		$sqlUpdate = "update ".$dbprefix."asaleh set receive = '$asend',receive_date = '$date_now',uid_receive = '".$_SESSION['inv_usercode']."'  where id = '{$_GET["sender"]}'  ";
		//echo $sqlUpdate;
		//exit;
		

		//mysql_query($sqlUpdate);

	}
	 
	$object_stocks = new stocks ();
	$object_stocks->set_data($_REQUEST["sender"],"asale_qtyr",$_REQUEST["status"],"2"); 
	
}

//echo "<script language='JavaScript'>window.location='index.php?sessiontab=5&sub=145&page=".$page."'</script>";	
echo "<script language='JavaScript'>window.location='index.php?sessiontab=".$_GET["sessiontab"]."&sub=".$_GET["sub"]."&page=".$_GET["page"]."&chktype=".$_GET["chktype"]."'</script>";	

function plusProduct1($dbprefix,$pcode,$invent,$qty,$sano,$uid,$receive){

		 $sql="SELECT * FROM ".$dbprefix."product_package1 where package = '$pcode'";
		//exit;
		$rs = mysql_query($sql);
		//echo "$sql<BR>";
		if(mysql_num_rows($rs) > 0)
		{
			for($m=0;$m<mysql_num_rows($rs);$m++){
				
				$sqlObj = mysql_fetch_object($rs);
				$pcode2 =$sqlObj->pcode;	
				$qty2 =$sqlObj->qty*$qty;	
				if($receive == '1')mysql_query("update ".$dbprefix."product_invent set qtys = qtys-$qty2 WHERE pcode='$pcode2' and inv_code = '$invent' ");
				else mysql_query("update ".$dbprefix."product_invent set qtys = qtys+$qty2 WHERE pcode='$pcode2' and inv_code = '$invent' ");
			
			}
		}else{

			if($receive == '1')mysql_query("update ".$dbprefix."product_invent set qtys = qtys-$qty WHERE pcode='$pcode' and inv_code = '$invent' ");
			else mysql_query("update ".$dbprefix."product_invent set qtys = qtys+$qty WHERE pcode='$pcode' and inv_code = '$invent' ");

		}

}
?>