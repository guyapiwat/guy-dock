<?
require_once("logtext.php");

	$bid = $_GET['bid'];
	$sql = "select * from ".$dbprefix."risaleh where id='$bid'";
	$result = mysql_query($sql);
	$data = mysql_fetch_object($result);
	$inv_code =$data->inv_code;
	$inv_ref =$data->inv_code_to;
	$cancel =$data->cancel;
	$sadate =$data->sadate;
	$tot_pv =$data->tot_pv;
	$total =$data->total;
	$satype =$data->sa_type;
	$hono =$data->hono;
	$sano =$data->sano;
	$uid =$data->uid;
	$mcode =$data->mcode;

	if($cancel == 0){
		$sqlUpdate = "UPDATE ".$dbprefix."risaleh SET cancel='1',uid_cancel = '".$_SESSION["adminusercode"]."',cancel_date = '".$_SESSION["datetimezone"]."' WHERE id='$bid' ";
		logtext(true,$_SESSION['adminusercode'],'ยกเลิก บิลรับส่งสินค้า Stockist',$sql);
		//echo $sql;
		
		
		 $sql = "select * from ".$dbprefix."risaled where hono='$bid'";
		$result = mysql_query($sql);
		for($i=0;$i<mysql_num_rows($result);$i++){
			$data = mysql_fetch_object($result);
			$pcode =$data->pcode;
			$pdesc =$data->pdesc;
			$price =$data->price;
			$totalprice =$data->totalprice;
			$qty =$data->qty;
			$inv_codeold =$data->inv_code;
		
	
			//Stockist
			updatestockcard($dbprefix,$inv_code,$inv_code,$inv_ref,'RI'.$hono,$sano,$sadate,$rccode,$satype,$pcode,$_SESSION["adminusercode"],$qty,$price,$totalprice);
			calc_minusProduct($dbprefix,$pcode,$inv_code,$qty,'RI'.$hono,$_SESSION['adminusercode'],'0');
			
			updatestockcardr($dbprefix,$inv_code,$inv_code,$inv_ref,'RI'.$hono,$sano,$sadate,$rccode,$satype,$pcode,$_SESSION["adminusercode"],$qty,$price,$totalprice);
			calc_minusProductr($dbprefix,$pcode,$inv_code,$qty,'RI'.$hono,$_SESSION['adminusercode'],'0');
			//Stockist

			// Branch
			updatestockcardr1($dbprefix,$inv_code,$inv_ref,$inv_ref,'RI'.$hono,$sano,$sadate,$rccode,$satype,$pcode,$_SESSION["adminusercode"],$qty,$price,$totalprice);
			calc_plusProductr($dbprefix,$pcode,$inv_ref,$qty,'RI'.$hono,$_SESSION['adminusercode'],'0');
			// Branch
		
		//	plusProduct1($dbprefix,$pcode,$inv_code,$qty);
			//minusProduct1($dbprefix,$pcode,$inv_codeold,$qty);
		}

		mysql_query($sqlUpdate);
		mysql_query("update ".$dbprefix."isaleh set rtotal = rtotal+$total,rpv = rpv+$tot_pv,bmcauto=0 where id = '$sano'  ");

		echo "<script language='JavaScript'>window.location='index.php?sessiontab=".$_GET["sessiontab"]."&send=".$_GET["send"]."&sub=".$_GET["sub"]."&sano=".$_REQUEST["sano"]."&page=".$_REQUEST
["page"]."&chktype=".$_REQUEST["chktype"]."'</script>";	
	}else{

		echo "ไม่สามารถยกเลิกบิลซ้ำได้";
	}

?>