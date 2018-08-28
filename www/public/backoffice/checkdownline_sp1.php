<?
//set_time_limit( 0);
//ini_set("memory_limit","1024M");
//ob_start();
$time_start = getmicrotime();

$numChild = 2;
$k=0;
$mcode[$k] = $_POST["strSearch"];
$fdate = $_POST["fdate"];
$tdate = $_POST["tdate"];
if(!empty($_POST))
{
	$sql = "TRUNCATE TABLE ".$dbprefix."checkdownline_sp ";
	mysql_query($sql);
	$lv = 0;
	//echo "select * from ".$dbprefix."member where mcode='$mcode[$k]' ";
	//exit;
	$sql = "select mcode,name_t,mdate from ".$dbprefix."member where mcode='$mcode[$k]' ";
	$rs=mysql_query($sql);
	if(mysql_num_rows($rs) > 0)
	{
		$lv = 1;
		$mcode = mysql_result($rs,0,'mcode');
		//$upa_code = mysql_result($rs,0,'upa_code');
		$name_t = mysql_result($rs,0,'name_t');
		$mdate = mysql_result($rs,0,'mdate');
		//$lr = mysql_result($rs,0,'lr');
					
			$fast = 0;$weakstrong = 0;$matching = 0;$all_total=0;


			$sqlt = "SELECT sum(total*crate) AS total FROM ali_asaleh WHERE mcode = '$mcode' and sa_type<>'H' ";
			if(!empty($fdate)) $sqlt .= " and  sadate >= '$fdate' ";			
			if(!empty($tdate)) $sqlt .= " and sadate <= '$tdate' ";			
			$sqlt .= " and cancel = 0 group by mcode ";
			//echo $sqlt.'<br>';
			$rstotal = mysql_query($sqlt);
			if(mysql_num_rows($rstotal) > 0){
				$all_total = mysql_result($rstotal,0,'total'); 
				mysql_free_result($rstotal);
			}

			$sqlt = "SELECT sum(total*crate) AS total FROM ali_holdhead WHERE mcode = '$mcode' and sa_type<>'H' ";
			if(!empty($fdate)) $sqlt .= " and  sadate >= '$fdate' ";			
			if(!empty($tdate)) $sqlt .= " and sadate <= '$tdate' ";			
			$sqlt .= " and cancel = 0 group by mcode ";
			//echo $sql;
			$rstotal = mysql_query($sqlt);
			if(mysql_num_rows($rstotal) > 0){
				$all_total += mysql_result($rstotal,0,'total'); 
				mysql_free_result($rstotal);
			}



	//		echo $sqlt.'<br>';

			//echo $all_total;
			//exit;
			//$sql = "SELECT sum(tot_pv) AS all_pv FROM ali_holdhead WHERE mcode='$mcd' and sa_type='C' and sadate like (select  DATE_FORMAT(max(fdate), '%Y-%m-%') from ali_around where calc = 1 ) ";
			//echo $sql;
			//$rs = mysql_query($sql);


			$sqla = "SELECT 	sum(total*crate) as total 
			from ".$dbprefix."ambonus 
			where mcode = '$mcode' and total > 0 ";
			if(!empty($fdate)) $sqla .= " and  fdate >= '$fdate' ";			
			if(!empty($tdate)) $sqla .= " and tdate <= '$tdate' ";			
			$sqla .= "group by mcode ";
			//echo $sqla;
			$rsa = mysql_query($sqla);
			if(mysql_num_rows($rsa) > 0){
				$sqlObja = mysql_fetch_object($rsa);
				$fast =$sqlObja->total;
				mysql_free_result($rsa);
			}	
			
			$sqla = "SELECT 	sum(total*crate) as total 
			from ".$dbprefix."bmbonus 
			where mcode = '$mcode' and total > 0 ";
			if(!empty($fdate)) $sqla .= " and  fdate >= '$fdate' ";			
			if(!empty($tdate)) $sqla .= " and tdate <= '$tdate' ";			
			$sqla .= "group by mcode ";
			$rsa = mysql_query($sqla);
			if(mysql_num_rows($rsa) > 0){
				$sqlObja = mysql_fetch_object($rsa);
				$weakstrong =$sqlObja->total;
				mysql_free_result($rsa);
			}	

			$sqla = "SELECT 	sum(total*crate) as total 
			from ".$dbprefix."dmbonus 
			where mcode = '$mcode' and total > 0 ";
			if(!empty($fdate)) $sqla .= " and  fdate >= '$fdate' ";			
			if(!empty($tdate)) $sqla .= " and tdate <= '$tdate' ";			
			$sqla .= "group by mcode ";
			$rsa = mysql_query($sqla);
			if(mysql_num_rows($rsa) > 0){
				$sqlObja = mysql_fetch_object($rsa);
				$matching =$sqlObja->total;
				mysql_free_result($rsa);
			}
			
			$sqla = "SELECT 	sum(total*crate) as total 
			from ".$dbprefix."smbonus 
			where mcode = '$mcode' and total > 0 ";
			if(!empty($fdate)) $sqla .= " and  fdate >= '$fdate' ";			
			if(!empty($tdate)) $sqla .= " and tdate <= '$tdate' ";			
			$sqla .= "group by mcode ";
			$rsa = mysql_query($sqla);
			if(mysql_num_rows($rsa) > 0){
				$sqlObja = mysql_fetch_object($rsa);
				$star =$sqlObja->total;
				mysql_free_result($rsa);
			}

			$sqla = "SELECT 	sum(total*crate) as total 
			from ".$dbprefix."ombonus 
			where mcode = '$mcode' and total > 0 ";
			if(!empty($fdate)) $sqla .= " and  fdate >= '$fdate' ";			
			if(!empty($tdate)) $sqla .= " and tdate <= '$tdate' ";			
			$sqla .= "group by mcode ";
			$rsa = mysql_query($sqla);
			if(mysql_num_rows($rsa) > 0){
				$sqlObja = mysql_fetch_object($rsa);
				$onetime =$sqlObja->total;
				mysql_free_result($rsa);
			}
		
		$allall = $fast+$weakstrong+$matching+$star+$onetime;
		//if($allall > 0 or $all_total>0)
			
		mysql_query("insert into  ".$dbprefix."checkdownline_sp (mcode,name_t,total,fast,weakstrong,matching,star,onetime,alltotal,upa_code,lv,lr,mdate)
						values('$mcode','$name_t','$all_total','$fast','$weakstrong','$matching','$star','$onetime','$allall','$upa_code','$lv','$lr','$mdate') ");
	//	exit;
		isLine($dbprefix,$mcode,$lv,$fdate,$tdate);	

		//$sql .= "DELETE FROM ".$dbprefix."checkdownline_sp where mdate > '2013-09-30' ";
		if(!empty($fdate)) mysql_query("DELETE FROM ".$dbprefix."checkdownline_sp where mdate > '$tdate' ");

	}

}



require("connectmysql.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
//$sql = "SELECT * FROM ".$dbprefix."checkdownline_sp where total>0 or fast>0 or weakstrong>0 or matching>0 ";
//$sql = "SELECT * FROM ".$dbprefix."checkdownline_sp  where total>0 or fast>0 or weakstrong>0 or matching >0 or star >0 or onetime>0 or alltotal >0";
$sql = "SELECT * FROM ".$dbprefix."checkdownline_sp   ";
//if(!empty($tdate)) $sql .= " where mdate <= '$tdate' ";	
$rec = new repGenerator();
$rec->setQuery($sql);
$rec->setSort($_GET['srt']==""?"down":$_GET['srt']);
$rec->setOrder($_GET['ord']==""?" mcode ":$_GET['ord']);
//$rec->setLimitPage($_GET['lp']);
$rec->setLimitPage("5000");
if(isset($_POST['skey']))
	$rec->setCause($_POST['skey'],$_POST['scause']);
else if(isset($_GET['skey']))
	$rec->setCause($_GET['skey'],$_GET['scause']);
$rec->setSize("100%","");
$rec->setAlign("center");
$rec->setFieldAlign("center,left,right,center,center,center");
//$rec->setPageLinkShow(false,false);
$rec->setLink($PHP_SELF,"sessiontab=5&sub=12&stype=$stype&fdate=$fdate&tdate=$tdate&strSearch=".$_POST["strSearch"]);
$rec->setBackLink($PHP_SELF,"sessiontab=5");
if(isset($page))
	$rec->setCurPage($page);
$rec->setShowField("mcode,name_t,upa_code,lr,lv,total,fast,weakstrong,matching,star,onetime,alltotal");
$rec->setFieldDesc("รหัสสมาชิก,ชื่อสมาชิก,อัพไลน์,ซ้ายขวา,ชั้น,ยอดซื้อส่วนตัว,FOB,Cycle,Matching,Star,Onetime,Total");
$rec->setFieldAlign("center,left,center,center,center,right,right,right,right,right,right,right");
$rec->setFieldSpace("10%,20%,10%,3%,3%,8%,8%,8%,8%,8%,8%,8%");
$rec->setFieldLink(",");
$rec->setFieldFloatFormat(",,,,,2,2,2,2,2,2,2,2");
//$rec->setSearch("".$dbprefix."checkdownline_sp.mcode");
//$rec->setSearchDesc("รหัสผู้ซื้อ");
$rec->setSum(true,true,",,,,,true,true,true,true,true,true,true");

if($_GET['excel']==1){
	$rec->exportXls("ExportXls","checkdownline_sp".date("Ymd").".xls","SH_QUERY");
	$str = "<fieldset><a href='".$rec->download("ExportXls","checkdownline_sp".date("Ymd").".xls")."' >";
	$str .= "<img border='0' src='./images/download.gif'>โหลด Excel</a></fieldset>";
	//$rec->getParam();
	$rec->setSpace($str);
}
//$rec->setSpecial("./images/search.gif","","view","mcode","IMAGE","");
$str = "<fieldset ><a href='".$rec->getParam()."&excel=1' target='_self'>";
$str .= "<img border='0' src='./images/excel.gif'>สร้าง Excel</a></fieldset>";
$rec->setSpace($str);

$rec->showRec(1,'SH_QUERY');
mysql_close($link);

		
function getmicrotime() { 
    list($usec, $sec) = explode(" ", microtime()); 
    return ((float)$usec + (float)$sec); 
} 	
function isLine($dbprefix,$mcode,$lv,$fdate,$tdate){
	$sql = "SELECT mcode,lr,sp_code,name_t,mdate FROM ".$dbprefix."member WHERE sp_code='$mcode'  ";
	$rs = mysql_query($sql);
	if(mysql_num_rows($rs)> 0){
		for($i=0;$i<mysql_num_rows($rs);$i++){
			$lv++;
			$sqlObj = mysql_fetch_object($rs);
			$mcode = $sqlObj->mcode;
			$lr = $sqlObj->lr;
			$upa_code = $sqlObj->sp_code;
			$name_t = $sqlObj->name_t;
			$mdate = $sqlObj->mdate;
			$fast = 0;$weakstrong = 0;$matching = 0;$all_total=0;
			
			$sqlt = "SELECT sum(total*crate) AS total FROM ali_asaleh WHERE mcode = '$mcode' and sa_type<>'H' ";
			if(!empty($fdate)) $sqlt .= " and  sadate >= '$fdate' ";			
			if(!empty($tdate)) $sqlt .= " and sadate <= '$tdate' ";			
			$sqlt .= " and cancel = 0 group by mcode ";
			//echo $sqlt.'<br>';
			$rstotal = mysql_query($sqlt);
			if(mysql_num_rows($rstotal) > 0){
				$all_total = mysql_result($rstotal,0,'total'); 
				mysql_free_result($rstotal);
			}

			$sqlt = "SELECT sum(total*crate) AS total FROM ali_holdhead WHERE mcode = '$mcode' and sa_type<>'H' ";
			if(!empty($fdate)) $sqlt .= " and  sadate >= '$fdate' ";			
			if(!empty($tdate)) $sqlt .= " and sadate <= '$tdate' ";			
			$sqlt .= " and cancel = 0 group by mcode ";
			//echo $sql;
			$rstotal = mysql_query($sqlt);
			if(mysql_num_rows($rstotal) > 0){
				$all_total += mysql_result($rstotal,0,'total'); 
				mysql_free_result($rstotal);
			}

			$sqla = "SELECT 	sum(total*crate) as total 
			from ".$dbprefix."ambonus 
			where mcode = '$mcode' and total > 0 ";
			if(!empty($fdate)) $sqla .= " and  fdate >= '$fdate' ";			
			if(!empty($tdate)) $sqla .= " and tdate <= '$tdate' ";			
			$sqla .= "group by mcode ";
			$rsa = mysql_query($sqla);
			if(mysql_num_rows($rsa) > 0){
				$sqlObja = mysql_fetch_object($rsa);
				$fast =$sqlObja->total;
				mysql_free_result($rsa);
			}	
			
			$sqla = "SELECT 	sum(total*crate) as total 
			from ".$dbprefix."bmbonus 
			where mcode = '$mcode' and total > 0 ";
			if(!empty($fdate)) $sqla .= " and  fdate >= '$fdate' ";			
			if(!empty($tdate)) $sqla .= " and tdate <= '$tdate' ";			
			$sqla .= "group by mcode ";
			$rsa = mysql_query($sqla);
			if(mysql_num_rows($rsa) > 0){
				$sqlObja = mysql_fetch_object($rsa);
				$weakstrong =$sqlObja->total;
				mysql_free_result($rsa);
			}	

			$sqla = "SELECT 	sum(total*crate) as total 
			from ".$dbprefix."dmbonus 
			where mcode = '$mcode' and total > 0 ";
			if(!empty($fdate)) $sqla .= " and  fdate >= '$fdate' ";			
			if(!empty($tdate)) $sqla .= " and tdate <= '$tdate' ";			
			$sqla .= "group by mcode ";
			$rsa = mysql_query($sqla);
			if(mysql_num_rows($rsa) > 0){
				$sqlObja = mysql_fetch_object($rsa);
				$matching =$sqlObja->total;
				mysql_free_result($rsa);
			}
			
			$sqla = "SELECT 	sum(total*crate) as total 
			from ".$dbprefix."ombonus 
			where mcode = '$mcode' and total > 0 ";
			if(!empty($fdate)) $sqla .= " and  fdate >= '$fdate' ";			
			if(!empty($tdate)) $sqla .= " and tdate <= '$tdate' ";			
			$sqla .= "group by mcode ";
			$rsa = mysql_query($sqla);
			if(mysql_num_rows($rsa) > 0){
				$sqlObja = mysql_fetch_object($rsa);
				$onetime =$sqlObja->total;
				mysql_free_result($rsa);
			}

			$sqla = "SELECT 	sum(total*crate) as total 
			from ".$dbprefix."smbonus 
			where mcode = '$mcode' and total > 0 ";
			if(!empty($fdate)) $sqla .= " and  fdate >= '$fdate' ";			
			if(!empty($tdate)) $sqla .= " and tdate <= '$tdate' ";			
			$sqla .= "group by mcode ";
			$rsa = mysql_query($sqla);
			if(mysql_num_rows($rsa) > 0){
				$sqlObja = mysql_fetch_object($rsa);
				$star =$sqlObja->total;
				mysql_free_result($rsa);
			}

			$allall = $fast+$weakstrong+$matching+$star+$onetime;


			//if($allall > 0 or $all_total>0)
				
			mysql_query("insert into  ".$dbprefix."checkdownline_sp (mcode,name_t,total,fast,weakstrong,matching,star,onetime,alltotal,upa_code,lv,lr,mdate)
						values('$mcode','$name_t','$all_total','$fast','$weakstrong','$matching','$star','$onetime','$allall','$upa_code','$lv','$lr','$mdate') ");
			isLine($dbprefix,$mcode,$lv,$fdate,$tdate);
		}
	}
}

?>