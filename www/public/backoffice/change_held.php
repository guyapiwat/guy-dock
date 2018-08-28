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
	$sqlSelect = "select * from ".$dbprefix."asaleh where id = '{$_GET["sender"]}' ";
	$rs = mysql_query($sqlSelect);
	if(mysql_num_rows($rs) > 0){
		$sqlObj = mysql_fetch_object($rs);
		$asend =$sqlObj->receive;		
		$inv_code =$sqlObj->inv_code;		
	
		$sano = $_GET["sender"];		

		//mysql_free_result($rs);
		if($asend == '1'){
	//	echo "<script language='JavaScript'>alert('ไม่สามารถแก้ไขการรับของได้');window.location='index.php?sessiontab=3&sub=6'</script>";	
	//	exit;
		}

		if($asend == '1'){
			$sql = "select * from ".$dbprefix."asaled where sano='".$_GET["sender"]."'";
			$result = mysql_query($sql);
			for($i=0;$i<mysql_num_rows($result);$i++){
				$data = mysql_fetch_object($result);
				$pcode =$data->pcode;
				$qty =$data->qty;
				if(!empty($inv_code))plusProduct1($dbprefix,$pcode,$inv_code,$qty,$sano,$_SESSION['adminusercode'],$asend);
				else if(!empty($inv_code))plusProduct1($dbprefix,$pcode,$inv_code,$qty,$sano,$_SESSION['adminusercode'],$asend);
			}
		}
		

		if($asend == 0)$asend = 1;
		else $asend = 0;

		$sqlUpdate = "update ".$dbprefix."asaleh set receive = '$asend',receive_date = '$date_now' where id = '{$_GET["sender"]}'";
		//echo $sqlUpdate;
		//exit;
		$rs = mysql_query($sqlUpdate);

    }

}

echo "<script language='JavaScript'>window.location='index.php?sessiontab=".$_GET["sessiontab"]."&sub=".$_GET["sub"]."&page=".$page."'</script>";	

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