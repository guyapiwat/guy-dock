<script language="javascript" type="text/javascript">
	function sale_print(id){
		var wlink = 'invoice_aprint.php?bid='+id;
		window.open(wlink);
	}
</script>
<script language="javascript" type="text/javascript">
	

		
	function sale_status2(fdate,tdate,cmc){
	//	if(confirm("ต้องการเปลี่ยนแปลงจัดส่ง")){
			window.open('index.php?sessiontab=5&sub=111&strfdate='+fdate+'&strtdate='+tdate+'&fmcode='+cmc);
	//	}
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
		$sql="select fdate as fdate1,tdate as tdate1,name,firstseat,secondseat,rurl,rincrease from ".$dbprefix."promotion a where  $wwhere  ";
		$result=mysql_query($sql);
		if (mysql_num_rows($result)>'0') {
			$row= mysql_fetch_array($result, MYSQL_ASSOC);
			$strtdate=$row["tdate1"];
			$strfdate=$row["fdate1"];
			$strName=$row["name"];
			$firstseat=$row["firstseat"];
			$secondseat=$row["secondseat"];
			$rurl=$row["rurl"];
			$rincrease=$row["rincrease"];
		}

?>
<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ชื่อ Trip : <?=$strName?>
<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ระยะเวลาเก็บคะแนน : <?=$strfdate?> - <?=$strtdate?>
<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เกณฑ์การเก็บคะแนน
<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - 1 ที่นั่ง : <?=$firstseat?>
<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - 2 ที่นั่ง : <?=$secondseat?>
<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - % คะแนนส่วนเพิ่มในกรณีเคยร่วม Trip แล้ว : <?=$rincrease?>%
<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;รายละเอียด :  <a href="<?=$rurl?>" target="_blank">คลิกดูรายละเอียดเพิ่มเติม</a>

<?
	//	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ช่วงเวลาเก็บคะแนน เริ่มต้น : ".$strfdate.' สิ้นสุด : '.$strtdate;
	//	$sql .= " group by a.mcode ";


		

		$sql = "select tdate  ";
		$sql .= " FROM ".$dbprefix."bround a ";
		//$sql .= " LEFT JOIN ".$dbprefix."location_base lb ON lb.cid=a.locationbase ";

		//$sql .= " LEFT JOIN ".$dbprefix."member m ON a.mcode=m.mcode ";
			//$sql .= " WHERE (a.rcode between '$ftrc[0]' and '$ftrc[1]') and a.mcode='".$fmcode."'";
			$sql .= " WHERE calc='1' order by rcode desc limit 0,1  ";
			
		$rs = mysql_query($sql);
		if(mysql_num_rows($rs) > 0){

					$sqlObj = mysql_fetch_object($rs);
					$tdate123 =$sqlObj->tdate;	


		}


		$sql = "select a.mcode  ";
		$sql .= " FROM ".$dbprefix."tmbonus a ";
		//$sql .= " LEFT JOIN ".$dbprefix."location_base lb ON lb.cid=a.locationbase ";

		//$sql .= " LEFT JOIN ".$dbprefix."member m ON a.mcode=m.mcode ";
			//$sql .= " WHERE (a.rcode between '$ftrc[0]' and '$ftrc[1]') and a.mcode='".$fmcode."'";
			$sql .= " WHERE a.fdate >= '$strfdate' and a.tdate <= '$strtdate'  ";
			
		$rs = mysql_query($sql);
		if(mysql_num_rows($rs) > 0){

			$wheree = " ( a.mcode = '0000000' ";
			for($i=0;$i<mysql_num_rows($rs);$i++){
					$sqlObj = mysql_fetch_object($rs);
					$mcode =$sqlObj->mcode;	
					if(isLine($dbprefix,$mcode,$_SESSION["usercode"])){
						$wheree .= " or a.mcode = '$mcode'  ";
					}				
			}
			$wheree .= " or a.mcode = '0000000' ) ";
		}else $wheree .= " a.mcode = '0000000'  ";


		$sql = "select * from (SELECT DATE_FORMAT('".$strfdate."', '%Y-%m-%d') as fdate,lb.cshort,DATE_FORMAT('".$tdate123."', '%Y-%m-%d') as tdate,a.rcode, a.mcode,a.name_t,sum(a.point) as alltotal,a.seats  ";
		$sql .= " FROM ".$dbprefix."tmbonus1 a ";
		$sql .= " LEFT JOIN ".$dbprefix."location_base lb ON lb.cid=a.locationbase ";

		//$sql .= " LEFT JOIN ".$dbprefix."member m ON a.mcode=m.mcode ";
		if($ftrcode!=""&&$fmcode!=""){
			//$sql .= " WHERE (a.rcode between '$ftrc[0]' and '$ftrc[1]') and a.mcode='".$fmcode."'";
			$sql .= " WHERE $wwhere and $wheree ";
		}else if($ftrcode!=""){
			$sql .= " WHERE $wwhere ";
			//$sql .= " WHERE (a.rcode between '$ftrc[0]' and '$ftrc[1]') ";
		}else if($fmcode!=""){
			$sql .= " WHERE $wwhere and $wheree ";
		}
		$sql .= "  group by a.mcode  ) as a where 1=1 ";
	//echo $sql;
		//exit;
	//echo $sql;
	//	exit;  order by alltotal  desc
		
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort(($_GET['srt']==""?"DOWN":$_GET['srt']));
		$rec->setOrder(($_GET['ord']==""?"seats desc,alltotal desc,mcode":$_GET['ord']));
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
			
			$rec->setLimitPage('5000');
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		$rec->setLink($PHP_SELF,"sessiontab=5&sub=118&ftrcode=$ftrcode");
		$rec->setBackLink($PHP_SELF,"sessiontab=5");
		if(isset($page))
			$rec->setCurPage($page);
		//$rec->setShowIndex(true);
		$rec->setShowField("fdate,tdate,mcode,name_t,alltotal,seats,cshort");
		$rec->setFieldDesc($wording_lan["fdate"].",".$wording_lan["tdate"].",".$wording_lan["mcode"].",".$wording_lan["name"].",".$wording_lan["Travel Point"].",".$wording_lan["Get Promotion"].",LB");
		$rec->setFieldAlign("center,center,center,left,right,right,center");
		$rec->setFieldSpace("8%,8%,8%,50%,10%,10%,4%");//10
	//$rec->setFieldLink(",,,,index.php?sessiontab=4&sub=144&strtdate=$strfdate&strfdate=,,,,");
		//$rec->setSum(true,false,",,,,,,true,true,true,true,true,true,true,true");
		$rec->setFieldFloatFormat(",,,,2,,");
		//$rec->setFieldLink("");
		$rec->setSpecial($wording_lan["rep_32"],"","sale_status2","fdate,tdate,mcode","TEXT","ประวัติคะแนน");
	
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		$rec->setSearch("mcode,name_t,cshort");
		$rec->setSearchDesc($wording_lan["mcode"].",".$wording_lan["name"].",LB");
		
		if($_GET['excel']==1){
			$rec->exportXls("ExportXls","travel".$_SESSION["usercode"].date("Ymd").".xls","SH_QUERY");
			$str = "<fieldset><a href='".$rec->download("ExportXls","travel".$_SESSION["usercode"].date("Ymd").".xls")."' >";
			$str .= "<img border='0' src='./images/download.gif'>โหลด Excel</a></fieldset>";
			//$rec->getParam();
			$rec->setSpace($str);
		}
		$str = "<fieldset><a href='".$rec->getParam()."&excel=1' target='_self'>";
		$str .= "<img border='0' src='./images/excel.gif'>สร้าง Excel</a></fieldset>";
	
			$rec->setSum(true,false,",,,,,true");
		$rec->setSpace($str);


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