<? 
session_start();
require("connectmysql.php");
//$today="2007-02-01";  



$sql = "SELECT * FROM ".$dbprefix."around WHERE 1=1 order by rcode desc limit 0,1";
$rs = mysql_query($sql);
for($i=0;$i<mysql_num_rows($rs);$i++){
	$sqlObj = mysql_fetch_object($rs);
	$rcode =$sqlObj->rcode;	
	$rcode++;
	$fpdate =$sqlObj->fpdate;	
	$tpdate =$sqlObj->tpdate;	
	$fdate =$sqlObj->fdate;	
	$fdate =strftime("%Y-%m-%d", strtotime("$fdate +1 day")); 
	$tdate =$sqlObj->tdate;	
	$tdate =strftime("%Y-%m-%d", strtotime("$tdate +1 day")); 
	$split = explode('-',$fdate);
	if($split["2"] == '01'){
		$fpdate = strftime("%Y-%m-%d", strtotime("$fpdate +1 month")); 
		$ffpdate = strftime("%Y-%m-%d", strtotime("$fpdate +1 month")); 
		$tpdate = strftime("%Y-%m-%d", strtotime("$ffpdate -1 day")); 
	}
	$rdate = date("Y-m-d");
	//if($rdate == $fdate)echo "<script language='JavaScript'>window.location='index.php?sessiontab=4&sub=1'</script>";
	$calc = "";
	//echo $fdate.' '.$tdate;exit;
	$sql="insert into ".$dbprefix."around (rcode,  rdate, fdate,  tdate,paydate,  calc,remark,fpdate,  tpdate) values ('$rcode' ,'$rdate' ,'$fdate' ,'$tdate' ,'$paydate' ,'$calc' ,'$remark' ,'$fpdate' ,'$tpdate') ";
		if (! mysql_query($sql)) {
			echo "<font color='#FF0000'>error</font><br>";
			echo  "$sql";		
		}else {
			//logtext(true,$_SESSION['adminuserid'],$sql);
			mysql_query("COMMIT");
			ob_end_clean();
			//include "mem_main.php";
			echo "<script language='JavaScript'>window.location='index.php?sessiontab=4&sub=1'</script>";	
		}
}
//exit;

?>