<?
	if(isset($_POST["fdate"]))
		$fdate = $_POST["fdate"];
	else if(isset($_GET["fdate"]))
		$fdate = $_GET["fdate"];
	if(isset($_POST["tdate"]))
		$tdate = $_POST["tdate"];
	else if(isset($_GET["tdate"]))
		$tdate = $_GET["tdate"];
		
	if(isset($_POST["satype"]))
		$satype = $_POST["satype"];
	else if(isset($_GET["satype"]))
		$satype = $_GET["satype"];
	if($fdate==""){
		$fdate = $tdate;
	}else if($tdate==""){
		$tdate = $fdate;
	}
?>
<script language="javascript" type="text/javascript" src="./datetimepick/datetimepicker.js"></script>

<?
require("connectmysql.php");
$sqlDel = "delete from  ".$dbprefix."cnt_ewallet";
$rsDel = mysql_query($sqlDel);

$sql = "SELECT * FROM ".$dbprefix."invent ";
$rs = mysql_query($sql);

for($i=0;$i<mysql_num_rows($rs);$i++){
	$inv_code = mysql_result($rs,$i,'inv_code');
	$ewallet = mysql_result($rs,$i,'ewallet');
	$sql = "SELECT * from ( ";
	$sql .= "SELECT a.sano as sid,'1' as type,
	a.uid as uid,a.sano,a.sadate,a.total,
	m.inv_desc,a.inv_code AS smcode ";
	$sql .= "FROM ".$dbprefix."asaleh as a ";
	$sql .= "LEFT JOIN ".$dbprefix."invent as m ON (a.inv_code=m.inv_code) where   a.cancel=0 and  a.send = 1 "; //WHERE smcode='".$_SESSION['usercode']."' 
	//echo $sql;
	if($fdate!=""){
			$sql .= "AND a.sadate BETWEEN '$fdate' AND '$tdate' ";
	}
	if($inv_code !="")$sql .= " and  a.inv_code = '$inv_code' ";
	//echo $sql;
	//exit;

	$sql .= "UNION ";
	$sql .= "SELECT a.sano as sid, '2' as type,
	a.uid as uid,'' as sano,a.sadate,a.total,
	m.inv_desc,a.inv_code AS smcode ";
	$sql .= "FROM ".$dbprefix."isaleh  as a ";
	$sql .= "LEFT JOIN ".$dbprefix."invent as m ON (a.inv_code=m.inv_code) where  a.cancel=0 and a.total != 0  "; //WHERE smcode='".$_SESSION['usercode']."' 
	 $sql;
	if($fdate!=""){
		$sql .= "AND a.sadate BETWEEN '$fdate' AND '$tdate' ";
	}
	if($inv_code !="")$sql .= " and  a.inv_code = '$inv_code' ";

	$sql .= "UNION ";
	$sql .= "SELECT a.sano as sid, '3' as type,
	a.uid as uid,'' as sano,a.sadate,a.total,
	m.inv_desc,a.inv_code AS smcode ";
	$sql .= "FROM ".$dbprefix."esaleh  as a ";
	$sql .= "LEFT JOIN ".$dbprefix."invent as m ON (a.inv_code=m.inv_code) where  a.cancel=0  "; //WHERE smcode='".$_SESSION['usercode']."' 
	 $sql;
	if($fdate!=""){
		$sql .= "AND a.sadate BETWEEN '$fdate' AND '$tdate' ";
	}
	if($inv_code !="")$sql .= " and  a.inv_code = '$inv_code' ";


	
	

		$sql .= "UNION ";
	$sql .= "SELECT a.sano as sid, '4' as type,
	a.uid as uid,'' as sano,a.sadate,a.total,
	m.inv_desc,a.inv_code AS smcode ";
	$sql .= "FROM ".$dbprefix."esaleh  as a ";
	$sql .= "LEFT JOIN ".$dbprefix."invent as m ON (a.inv_code=m.inv_code) where  a.cancel=0  "; //WHERE smcode='".$_SESSION['usercode']."' 
	 $sql;
	if($fdate!=""){
		$sql .= "AND a.sadate BETWEEN '$fdate' AND '$tdate' ";
	}
	if($inv_code !="")$sql .= " and  a.inv_ref = '$inv_code' ";

	$sql .= "UNION ";
	$sql .= "SELECT a.sano as sid,'5' as type,
	a.uid as uid,sano,a.sadate,a.txtMoney as total,
	m.inv_desc,a.inv_code AS smcode ";
	$sql .= "FROM ".$dbprefix."ewallet as a ";
	$sql .= "LEFT JOIN ".$dbprefix."invent as m ON (a.inv_code=m.inv_code) where  a.cancel=0  "; //WHERE smcode='".$_SESSION['usercode']."' 
	 $sql;
	if($fdate!=""){
		$sql .= "AND a.sadate BETWEEN '$fdate' AND '$tdate' ";
	}
	if($inv_code !="")$sql .= " and  a.inv_code = '$inv_code'  ";


	$sql .= ' ) as ttttt ORDER BY sadate DESC , type ASC ';
	//if($inv_code == 'EP043'){echo $sql;
	//exit;}
	$rss = mysql_query($sql);
	if(mysql_num_rows($rss) > 0){
			//if(mysql_num_rows($rs111) > 2)exit;
			$rs111 = $rss;
			$yokma = 0;
			$yokma = $ewallet;
			$balance = $ewallet;
		for($j=0;$j<mysql_num_rows($rs111);$j++){
			$sqlObj = mysql_fetch_object($rs111);
			//insert ตรงนี้
			$sadate = $sqlObj->sadate;
			$sid = $sqlObj->sid;
			$uid = $sqlObj->uid;
			$total = $sqlObj->total;
			$type = $sqlObj->type;
			$sano = $sqlObj->sano;
			$net_profit = 0;
			$non_profit = 0;
			switch ($type) {
				case "1":
					$non_profit = $total;
					break;
				case "2":
					$non_profit = $total;
					break;
				case "3":
					$non_profit = $total;
					break;
				case "4":
					$net_profit = $total;
					break;
				case "5":
					$net_profit = $total;
					break;
			}
			switch ($type) {
				case "1":
					$yokma = $yokma+$total;
					break;
				case "2":
					$yokma = $yokma+$total;
					break;
				case "3":
					$yokma = $yokma+$total;
					break;
				case "4":
					$yokma = $yokma-$total;
					break;
				case "5":
					$yokma = $yokma-$total;
					break;
			}
			
			$insert = "insert ".$dbprefix."cnt_ewallet(inv_code,mdate,bill,pv1,pv2,pv3,balance,uid,other,other1)
			values('$inv_code','$sadate','$sid','$yokma','$net_profit','$non_profit','$balance','$uid','$type','$optionAll')";
			$balance = $yokma;	
			//if(!empty($txtMoney))$yokma = $yokma+$txtMoney;
		//	if(!empty($txtInternet))$balance = $txtInternet-$yokma;
			//echo '<br>';
			$rsInsert = mysql_query($insert);
		}
	}

}
//exit;
echo "<script language='JavaScript'>window.location='index.php?sessiontab=3&sub=27'</script>";
?>
