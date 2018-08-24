<?
require("connectmysql.php");
require("./cls/repGenerator_b.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
mysql_query("delete from ".$dbprefix."cnt_commission where mcode = '".$_SESSION[usercode]."' ");
$whereclass = " mcode ='".$_SESSION[usercode]."' and total>0 ";

	$sql11 = "select * from ".$dbprefix."cround where  calc='1'";
	$result11 = mysql_query($sql11);
	for($i=0;$j<mysql_num_rows($result11);$j++){
		$plana = 0;$planb=0;$pland=0;$plans=0;$plano=0;$tax1=0;$tax2=0;
		$data = mysql_fetch_object($result11);
		$paydate = $data->paydate;
		$fdate = $data->fdate;
		$tdate = $data->tdate;
		$whereclass .= " and fdate >= '$fdate' and tdate <= '$tdate' ";
			$sql = "SELECT ifnull(sum(total),0) as totalamt 
			from ".$dbprefix."ambonus where $whereclass group by mcode ";
			$rs = mysql_query($sql);
			if(mysql_num_rows($rs) > 0){
				for($i=0;$i<mysql_num_rows($rs);$i++){
					$sqlObj = mysql_fetch_object($rs);
					$plana =$sqlObj->totalamt;
				}
				mysql_free_result($rs);
			}		

			$sql = "SELECT ifnull(sum(total),0) as totalamt 
			from ".$dbprefix."bmbonus where $whereclass group by mcode ";
			$rs = mysql_query($sql);
			if(mysql_num_rows($rs) > 0){
				for($i=0;$i<mysql_num_rows($rs);$i++){
					$sqlObj = mysql_fetch_object($rs);
					$planb =$sqlObj->totalamt;
				}
				mysql_free_result($rs);
			}		
		

			$sql = "SELECT ifnull(sum(total),0) as totalamt 
			from ".$dbprefix."dmbonus where $whereclass group by mcode ";
			$rs = mysql_query($sql);
			if(mysql_num_rows($rs) > 0){
				for($i=0;$i<mysql_num_rows($rs);$i++){
					$sqlObj = mysql_fetch_object($rs);
					$pland =$sqlObj->totalamt;
				}
				mysql_free_result($rs);
			}	
		
			$sql = "SELECT ifnull(sum(total),0) as totalamt 
			from ".$dbprefix."ombonus where $whereclass group by mcode ";
			$rs = mysql_query($sql);
			if(mysql_num_rows($rs) > 0){
				for($i=0;$i<mysql_num_rows($rs);$i++){
					$sqlObj = mysql_fetch_object($rs);
					$plano =$sqlObj->totalamt;
				}
				mysql_free_result($rs);
			}	

			$sql = "SELECT ifnull(sum(total),0) as totalamt 
			from ".$dbprefix."smbonus where $whereclass group by mcode ";
			$rs = mysql_query($sql);
			if(mysql_num_rows($rs) > 0){
				for($i=0;$i<mysql_num_rows($rs);$i++){
					$sqlObj = mysql_fetch_object($rs);
					$plans =$sqlObj->totalamt;
				}
				mysql_free_result($rs);
			}	

			$sql = "SELECT ifnull(sum(tot_tax),0) as totalamt 
			from ".$dbprefix."cmbonus where paydate = '$paydate' and mcode = '".$_SESSION[usercode]."' and total>0 group by mcode ";
			$rs = mysql_query($sql);
			if(mysql_num_rows($rs) > 0){
				for($i=0;$i<mysql_num_rows($rs);$i++){
					$sqlObj = mysql_fetch_object($rs);
					$tax1 =$sqlObj->totalamt;
				}
				mysql_free_result($rs);
			}	

			$sql = "SELECT ifnull(sum(tot_tax),0) as totalamt 
			from ".$dbprefix."cmbonus1 where paydate = '$paydate' and mcode = '".$_SESSION[usercode]."' and total>0 group by mcode ";
			$rs = mysql_query($sql);
			if(mysql_num_rows($rs) > 0){
				for($i=0;$i<mysql_num_rows($rs);$i++){
					$sqlObj = mysql_fetch_object($rs);
					$tax2 =$sqlObj->totalamt;
				}
				mysql_free_result($rs);
			}	
			
			$tottax = $tax1+$tax2;
			$totplan = $plana+$planb+$pland+$plano+$plans;
			//echo $totplan.' : '.$plana.' : '.$planb.' : '.$pland.' : '.$plano.' : '.$plans;
			mysql_query("insert into ".$dbprefix."cnt_commission(mcode,fast,cycle,matching,onetime,star,tot_tax,total,paydate) values('".$_SESSION[usercode]."','$plana','$planb','$pland','$plano','$plans','$tottax','$totplan','$paydate') ");

	}




		//	$whereclass = " AND mcode='".$_SESSION["usercode"]."'";


		//require("./cls/repGenerator.php");
		if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
		$sql = "SELECT * from  ".$dbprefix."cnt_commission where mcode = '".$_SESSION[usercode]."' ";


	//echo "SQL : $sql <BR>";
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort(($_GET['srt']==""?"UP":$_GET['srt']));
		$rec->setOrder(($_GET['ord']==""?" id ":$_GET['ord']));
		$rec->setLimitPage($_GET['lp']);
		$rec->setSize("100%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		$rec->setLink($PHP_SELF,"sessiontab=4&sub=112&ftrcode=$ftrcode&fmcode=$fmcode");
		$rec->setBackLink($PHP_SELF,"sessiontab=4");
		if(isset($page))
			$rec->setCurPage($page);
		//$rec->setShowIndex(true);
		$rec->setShowField("paydate,fast,cycle,matching,star,onetime,total,tot_tax");
		$rec->setFieldDesc("วันที่จ่าย,ค่าแนะนำ,จับคู่,แมชชิ่ง,สตาร์เมกเกอร์,วันไทม์โบนัส,รายได้รวม,ภาษี");
		$rec->setFieldAlign("center,right,right,right,right,right,right,right,right");
		$rec->setFieldSpace("12%,12%,12%,12%,12%,12%,12%,12%,12%,12%,12%");//10
		$rec->setSum(true,false,",true,true,true,true,true,true,true,true");
		$rec->setFieldFloatFormat(",2,2,2,2,2,2,2,2");
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		//$rec->setSearch("m.mcode");
		//$rec->setSearchDesc("รหัส");
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);

?>