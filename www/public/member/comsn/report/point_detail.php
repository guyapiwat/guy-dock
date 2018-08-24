<script language="javascript" type="text/javascript">
	function sale_print(id){
		var wlink = 'invoice_aprint.php?bid='+id;
		window.open(wlink);
	}
</script>
<?
require("connectmysql.php");
		require("./cls/repGenerator.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}

		if(!empty($ftrcode)){
			$ftrc[0]=$ftrcode;
			$ftrc[1]=$ftrcode;
		}else exit;
		$fmcode = $_SESSION["usercode"];
		
		$wwhere = " a.rcode between '".$ftrc[0]."' and '".$ftrc[1]."' ";
		$sql="select min(fdate) as fdate1,max(tdate) as tdate1 from ".$dbprefix."promotion a where  $wwhere  ";
		$result=mysql_query($sql);
		if (mysql_num_rows($result)>'0') {
			$row= mysql_fetch_array($result, MYSQL_ASSOC);
			$strtdate=$row["tdate1"];
			$strfdate=$row["fdate1"];
		}
	//	$sql .= " group by a.mcode ";



		$sql = "select a.mcode  ";
		$sql .= " FROM ".$dbprefix."tmbonus a ";
		//$sql .= " LEFT JOIN ".$dbprefix."location_base lb ON lb.cid=a.locationbase ";

		//$sql .= " LEFT JOIN ".$dbprefix."member m ON a.mcode=m.mcode ";
			//$sql .= " WHERE (a.rcode between '$ftrc[0]' and '$ftrc[1]') and a.mcode='".$fmcode."'";
			$sql .= " WHERE a.fdate >= '$strfdate' and a.tdate <= '$strtdate'  ";
			
		$rs = mysql_query($sql);
		if(mysql_num_rows($rs) > 0){

			$wheree = " ( 1=1 ";
			for($i=0;$i<mysql_num_rows($rs);$i++){
					$sqlObj = mysql_fetch_object($rs);
					$mcode =$sqlObj->mcode;	
					if(isLine($dbprefix,$mcode,$_SESSION["usercode"])){
						$wheree .= " or a.mcode = '$mcode'  ";
					}				
			}
			$wheree .= " or 1=1 ) ";
		}


	


		$sql = "select * from (SELECT DATE_FORMAT(a.fdate, '%Y-%m-%d') as fdate,lb.cshort,DATE_FORMAT(a.tdate, '%Y-%m-%d') as tdate,a.rcode, a.mcode,a.pos_cur,a.mb2su,a.mb2ex,a.tot_pv,a.left_pv,a.right_pv,a.balance_pv,a.name_t,a.tpoint as total,a.spoint as stotal,a.tpoint+a.spoint as alltotal  ";
		$sql .= " FROM ".$dbprefix."tmbonus a ";
		$sql .= " LEFT JOIN ".$dbprefix."location_base lb ON lb.cid=a.locationbase ";

		//$sql .= " LEFT JOIN ".$dbprefix."member m ON a.mcode=m.mcode ";
		if($ftrcode!=""&&$fmcode!=""){
			//$sql .= " WHERE (a.rcode between '$ftrc[0]' and '$ftrc[1]') and a.mcode='".$fmcode."'";
			$sql .= " WHERE (a.fdate >= '$strfdate' and a.tdate <= '$strtdate' ) and $wheree ";
		}else if($ftrcode!=""){
			$sql .= " WHERE (a.fdate >= '$strfdate' and a.tdate <= '$strtdate' ) ";
			//$sql .= " WHERE (a.rcode between '$ftrc[0]' and '$ftrc[1]') ";
		}else if($fmcode!=""){
			$sql .= " WHERE $wheree ";
		}
		$sql .= " ) as a where 1=1 ";
	//echo $sql;
		//exit;
	//echo $sql;
	//	exit;
		
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort(($_GET['srt']==""?"DOWN":$_GET['srt']));
		$rec->setOrder(($_GET['ord']==""?"mcode,rcode":$_GET['ord']));
		$rec->setLimitPage('5000');
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		$rec->setLink($PHP_SELF,"sessiontab=4&sub=145&strfdate=$strfdate&strtdate=$strtdate&fmcode=$fmcode&ftrcode=$ftrcode");
		$rec->setBackLink($PHP_SELF,"sessiontab=4");
		if(isset($page))
			$rec->setCurPage($page);
		//$rec->setShowIndex(true);
		$rec->setShowField("fdate,tdate,mcode,name_t,pos_cur,mb2su,mb2ex,tot_pv,left_pv,right_pv,balance_pv,total,stotal,alltotal,cshort");
		$rec->setFieldDesc("ตั้งแต่วันที่,ถึงวันที่,รหัสมาชิก,ชื่อ,ตำแหน่ง,MB2SU,MB2EX,PV,left_pv,right_pv,blance_pv,คะแนน,คะแนนพิเศษ,คะแนนรวม,LB");
		$rec->setFieldAlign("center,center,center,left,center,center,center,right,right,right,right,right,right,right,center");
		$rec->setFieldSpace("8%,8%,8%,20%,4%,4%,4%,6%,6%,6%,6%,6%,6%");//10
	//$rec->setFieldLink(",,,,index.php?sessiontab=4&sub=144&strtdate=$strfdate&strfdate=,,,,");
		//$rec->setSum(true,false,",,,,,,true,true,true,true,true,true,true,true");
		$rec->setFieldFloatFormat(",,,,,0,0,0,0,0,0,2,2,2");
		//$rec->setFieldLink("");
	
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
	//	$rec->setSearch("mcode,cshort");
	//	$rec->setSearchDesc("รหัส,LB");
		
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);

function isLine($dbprefix,$scode,$testcode){
		$sql = "SELECT sp_code FROM ".$dbprefix."member WHERE mcode='$scode' LIMIT 1 ";
		$rs = mysql_query($sql);
		if($scode==$testcode)
			return true;
		if(mysql_num_rows($rs)<=0)
			return false;
		else if(mysql_result($rs,0,'sp_code')!=$testcode)
			return isLine($dbprefix,mysql_result($rs,0,'sp_code'),$testcode);
		else
			return true;
	}
?>