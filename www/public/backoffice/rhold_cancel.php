<?
require_once("logtext.php");

	$bid = $_GET['bid'];
	$sql = "select * from ".$dbprefix."rasaleh where id='$bid'";
	$result = mysql_query($sql);
	$data = mysql_fetch_object($result);
	$inv_code =$data->inv_code;
	$inv_ref =$data->inv_ref;
	$cancel =$data->cancel;
	$sadate =$data->sadate;
	$satype =$data->sa_type;
	$tot_pv =$data->tot_pv;
	$total =$data->total;
	$sano =$data->sano;
	$hono =$data->hono;
	$uid =$data->uid;
//	if(empty($_REQUEST["sano"]))$_REQUEST["sano"] =$data->sano;
	$mcode =$data->mcode;

	if($cancel == 0){
		$sqlUpdate = "UPDATE ".$dbprefix."rasaleh SET cancel='1',uid_cancel = '".$_SESSION["adminusercode"]."',cancel_date = '".$_SESSION["datetimezone"]."' WHERE id='$bid' ";
		logtext(true,$_SESSION['adminusercode'],'ยกเลิก บิลรับส่งสินค้า',$sql);
		//echo $sql;
		
		
		 $sql = "select * from ".$dbprefix."rasaled where hono='$bid'";
		$result = mysql_query($sql);
		for($i=0;$i<mysql_num_rows($result);$i++){
			$data = mysql_fetch_object($result);
			$pcode =$data->pcode;
			$qty =$data->qty;
			$price =$data->price;
			$totalprice=$data->totalprice;
			$inv_codeold =$data->inv_code;
		
	
			updatestockcardr1($dbprefix,$mcode,$inv_code,$_SESSION["admininvent"],'RC'.$hono,$sano,$sadate,$rccode,$satype,$pcode,$uid,$qty,$price,$totalprice);
			calc_plusProductr($dbprefix,$pcode,$inv_code,$qty,'RC'.$hono,$_SESSION['adminusercode'],'0');
		
		//	plusProduct1($dbprefix,$pcode,$inv_code,$qty);
			//minusProduct1($dbprefix,$pcode,$inv_codeold,$qty);
		}

		mysql_query($sqlUpdate);
		mysql_query("update ".$dbprefix."asaleh set rtotal = rtotal+$total,rpv = rpv+$tot_pv,bmcauto=0 where id = '$sano'  ");

		echo "<script language='JavaScript'>window.location='index.php?sessiontab=".$_GET["sessiontab"]."&send=".$_GET["send"]."&sub=".$_GET["sub"]."&sano=".$_REQUEST["sano"]."&page=".$_REQUEST
["page"]."&chktype=".$_REQUEST["chktype"]."'</script>";	
	}else{

		echo "ไม่สามารถยกเลิกบิลซ้ำได้";
	}

?>