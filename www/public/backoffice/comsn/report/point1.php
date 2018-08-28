<script language="javascript" type="text/javascript" src="./datetimepick/datetimepicker.js"></script>
<script language="javascript">
var win
function view(ro,code){
	var param = 'ftrcode=' + ro +'&fmcode='+code;
	var url = './print/rep_am_comsn.php?'+param;
	//window.location = wlink;
	if(win!=null) win.close();
	win = window.open(url,'','height=500 width=900 scrollbars=yes' );
}
function checkround(){
	if(document.getElementById("strfdate").value==""){
		alert("กรุณาเลือกวันที่เริ่มต้น");
		document.getElementById("strfdate").focus();
		return false;
	}
	if(document.getElementById("strtdate").value==""){
		alert("กรุณาเลือกวันที่สิ้นสุด");
		document.getElementById("strtdate").focus();
		return false;
	}
	document.rform.submit();
}
function chknum(key){
	if((key>=48&&key<=57)||key==45)
		return true;
	else
		return false;
}
</script>
<?
	set_time_limit( 0);
	ini_set("memory_limit","1024M");
	ob_start();
	$time_start = getmicrotime();
	//var_dump($_GET);
	$strfdate = $_POST['strfdate']==""?$_GET['strfdate']:$_POST['strfdate'];
	$strtdate = $_POST['strtdate']==""?$_GET['strtdate']:$_POST['strtdate'];
	$fmcode = $_POST['fmcode']==""?$_GET['fmcode']:$_POST['fmcode'];
	$rcode = $_POST['rcode']==""?$_GET['rcode']:$_POST['rcode'];
//	echo "ss $strfdate :   $strtdate<br>";
//exit;
//if($strfdate=="" || $strtdate==""){
if(empty($fmcode) and empty($strfdate)){
	rpdialog();
}else{
	if($strfdate>$strtdate){
		?><table width="100%" border="1">
  <tr align="center">
    <td><FONT COLOR="#ff0000">วันที่เริ่มต้น ต้องน้อยกว่าหรือเท่ากับ วันที่สิ้นสุด กรุณาระุบุวันที่ใหม่</FONT></td>
  </tr>
</table>
<?
		rpdialog();
		exit;
	}else{
?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
รอบวัน <? echo $strfdate .' ถึง '.$strtdate;?>
<?
		require("connectmysql.php");
		//require("./cls/repGenerator.php");
		$sqlDel = "delete from ".$dbprefix."cnt_point1 where rcode = '$rcode'";
				mysql_query($sqlDel);
		/*	$sql = "TRUNCATE TABLE ".$dbprefix."cnt_sale ";
					mysql_query($sql);*/
					//exit;
		if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
		if($strfdate!=""&&$strtdate!=""){
			$whereclass = " AND a.fdate>= '$strfdate' and a.tdate<= '$strtdate' ";
			$whereclass1 = " AND b.fdate>= '$strfdate' and b.tdate<= '$strtdate' ";
		}
		$whereclass = " AND a.fdate>= '$strfdate' and a.tdate<= '$strtdate' ";
		$whereclass1 = " AND b.fdate>= '$strfdate' and b.tdate<= '$strtdate' ";
		$sql = "select * from ".$dbprefix."cnt_point1 where rcode = '$rcode' ";
		$rs1 = mysql_query($sql);
//echo $sql;
		if(mysql_num_rows($rs1) == 0){
			$sqlfirst = "select * from ".$dbprefix."member  ";
			$rsfirst = mysql_query($sqlfirst);
			if(mysql_num_rows($rsfirst) > 0){
				mysql_query($sqlDel);
				for($j=0;$j<mysql_num_rows($rsfirst);$j++){
					$sqlObjfirst = mysql_fetch_object($rsfirst);
					$mcode[$j] =$sqlObjfirst->mcode;
					$mname_t[$j] =$sqlObjfirst->name_t;
					$upa_code[$j] =$sqlObjfirst->upa_code;
					$mdate =$sqlObjfirst->mdate;
					if($mdate >= $strfdate and $mdate <= $strtdate)$checkexp[$mcode[$j]] = 1;
					else $checkexp[$mcode[$j]] = 0;
					//echo $mcode[$j].' '.$upa_code[$j].' '.$mdate.' '.$strfdate.''.$strtdate.'<br>';
				}
			}
			
			

			$sqlDel = "delete from ".$dbprefix."cnt_point1 where rcode = '$rcode'";
				mysql_query($sqlDel);
			$sql = "TRUNCATE TABLE ".$dbprefix."cnt_sale ";
					mysql_query($sql);

				$selectfast = "SELECT * FROM (SELECT ".$dbprefix."asaled.sano,'' as hono,DATE_FORMAT(".$dbprefix."asaleh.sadate, '%Y-%m-%d') as sadate 
				,sum(".$dbprefix."asaled.pv*".$dbprefix."asaled.qty) as tot_pv,total,".$dbprefix."asaleh.mcode AS smcode,sa_type";
				$selectfast .= ",".$dbprefix."member.pos_cur as por_cur,".$dbprefix."member.sp_code as sp_code ";


				$selectfast .= "FROM ".$dbprefix."asaled ";
				$selectfast .= "LEFT JOIN ".$dbprefix."asaleh ON (".$dbprefix."asaled.sano=".$dbprefix."asaleh.id) "; 
				$selectfast .= "LEFT JOIN ".$dbprefix."member ON (".$dbprefix."asaleh.mcode=".$dbprefix."member.mcode)  where cancel = 0 and  ".$dbprefix."asaleh.sadate BETWEEN '$strfdate'  AND '$strtdate'  and ".$dbprefix."asaleh.sa_type = 'A'
				and ".$dbprefix."asaleh.tot_pv > 0

				GROUP BY ".$dbprefix."asaled.sano "; 

				$selectfast .= " UNION ";
				$selectfast .= "SELECT '' as sano,".$dbprefix."holddesc.hono,DATE_FORMAT(".$dbprefix."holdhead.sadate, '%Y-%m-%d') as sadate 
				,sum(".$dbprefix."holddesc.pv*".$dbprefix."holddesc.qty) as tot_pv,total,".$dbprefix."holdhead.mcode AS smcode,sa_type";
				$selectfast .= ",".$dbprefix."member.pos_cur as por_cur,".$dbprefix."member.sp_code as sp_code ";

				$selectfast .= "FROM ".$dbprefix."holddesc ";
				$selectfast .= "LEFT JOIN ".$dbprefix."holdhead ON (".$dbprefix."holddesc.hono=".$dbprefix."holdhead.id) "; 
				$selectfast .= "LEFT JOIN ".$dbprefix."member ON (".$dbprefix."holdhead.mcode=".$dbprefix."member.mcode)  where cancel = 0 and  ".$dbprefix."holdhead.sadate BETWEEN '$strfdate'  AND '$strtdate'  and ".$dbprefix."holdhead.sa_type = 'A'  
				and ".$dbprefix."holdhead.tot_pv > 0
				GROUP BY ".$dbprefix."holddesc.hono "; 


				$selectfast .= " ) as a ";
				//echo $selectfast;
				//exit;

				$rsfast = mysql_query($selectfast);
				if(mysql_num_rows($rsfast) > 0){
					for($a=0;$a<mysql_num_rows($rsfast);$a++){
						$sqlObjfast = mysql_fetch_object($rsfast);
						$mcode1[$a] =$sqlObjfast->smcode;
						$smcode =$sqlObjfast->smcode;
						$sano =$sqlObjfast->sano;
						$hono =$sqlObjfast->hono;
						$sadate =$sqlObjfast->sadate;
						$sa_type =$sqlObjfast->sa_type;
						$sspcode =$sqlObjfast->sp_code;
						$total =$sqlObjfast->total;
						$pv = $sqlObjfast->tot_pv;
						$insert = "insert into ".$dbprefix."cnt_sale(sano,hono,sadate,sa_type,mcode,tot_pv,sp_code,total,rcode) values('$sano','$hono','$sadate','$sa_type','$smcode','$pv','$sspcode','$total','$rcode') ";
						//echo $insert.'<br>';
						mysql_query($insert);
					}
				}
			//	var_dump($mcode1);
			//	exit;
			
			for($j=0;$j<sizeof($mcode);$j++){
				$sumpv =0 ;$sumpv1 =0 ;$point = 0;$setsum = 0;$pv = 0;$ppoint = 0;

				//$selectfast = "SELECT a.pv as pv,a.mcode as amcode from ".$dbprefix."ac as a where a.level = '1' or a.gen=0) and (a.gen=1 or a.gen=0)  and a.upa_code='".$mcode[$j]."' ".$whereclass." ";
				$selectfast = "SELECT * FROM ".$dbprefix."cnt_sale where sp_code = '".$mcode[$j]."'    ";
				$rsfast = mysql_query($selectfast);
				if(mysql_num_rows($rsfast) > 0){
					for($a=0;$a<mysql_num_rows($rsfast);$a++){
						$sqlObjfast = mysql_fetch_object($rsfast);
						$amcode =$sqlObjfast->mcode;
						$pv = $sqlObjfast->tot_pv;
						//if($checkexp[$amcode] == '1' ){
							$sumpv += floor($pv/250);
							$sumpv1 += $pv;
							//$sumpv += floor(($num),0,'.',''); 
						//}
					}
				}
				/*$selectbinary = "SELECT b.point as ppoint,b.mcode as bmcode from ".$dbprefix."bmbonus b where b.mcode='".$mcode[$j]."'  ".$whereclass1." ";
				//echo $selectbinary.'<br>';
				$rsbinary = mysql_query($selectbinary);
				if(mysql_num_rows($rsbinary) > 0){
					for($a=0;$a<mysql_num_rows($rsbinary);$a++){
						$sqlObjbinary = mysql_fetch_object($rsbinary);
						$bmcode =$sqlObjbinary->bmcode;
						//$ppoint =$sqlObjbinary->ppoint;
						//if($checkexp[$bmcode] == '1')$point += $sqlObjbinary->ppoint;
						$point += $sqlObjbinary->ppoint;
					}
				}*/
				//$setsum = (($sumpv/250)-0.49);
				if($sumpv < 0)$sumpv =0;
				$total_team = $sumpv + $point-0.49;
				//echo $mcode[$j].' '.$name_t[$j].' '.$sumpv.' '.$setsum.' '.$point.' '.$total_team.'<br>';
				if($sumpv1 > 0){
					$sqlInsert = "insert into ".$dbprefix."cnt_point1(mcode,name_t,fast,binary1,total_team,rcode,fdate,tdate) values('".$mcode[$j]."','".$mname_t[$j]."','$sumpv1','$point','$total_team','$rcode','$strfdate','$strtdate')";
					mysql_query($sqlInsert);
				}
			}
		}
		
		$sql = "select *,total_team from ".$dbprefix."cnt_point1 where rcode = '$rcode' $wherewhere";
		
		//echo $sql;
		//exit;
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort(($_GET['srt']==""?"DOWN":$_GET['srt']));
		$rec->setOrder(($_GET['ord']==""?" mcode ":$_GET['ord']));
		$rec->setLimitPage(500);
		$rec->setSize("100%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		$rec->setLink($PHP_SELF,"sessiontab=4&sub=113&strfdate=$strfdate&strtdate=$strtdate&fmcode=$fmcode&rcode=$rcode");
		$rec->setBackLink($PHP_SELF,"sessiontab=4");
		if(isset($page))
			$rec->setCurPage($page);
		//$rec->setShowIndex(true);
		$rec->setShowField("mcode,name_t,fast,binary1,total_team");
		$rec->setFieldFloatFormat(",,0,0,0,,0,2,2,2,2,2,2,2,2");
		$rec->setFieldDesc("รหัส,ชื่อ,แนะนำ(PV),จับคู่,Point");
		$rec->setFieldAlign("center,left,center,center,center,left,left,right,right,right,right,right,right,right,right,right,right,right");
		$rec->setFieldSpace("8%,47%,15%,15%,15%");
		$rec->setSum(true,false,",,true,true,true,,,true,true,true,true,true,true,true,true");
		$rec->setFieldLink("");
		if($_GET['excel']==1){
			$rec->exportXls("ExportXls","Point".date("Ymd").".xls","SH_QUERY");
			$str = "<fieldset><a href='".$rec->download("ExportXls","Point".date("Ymd").".xls")."' >";
			$str .= "<img border='0' src='./images/download.gif'>โหลด Excel</a></fieldset>";
			//$rec->getParam();
			$rec->setSpace($str);
		}
		$str = "<fieldset><a href='".$rec->getParam()."&excel=1' target='_self'>";
		$str .= "<img border='0' src='./images/excel.gif'>สร้าง Excel</a></fieldset>";
		
		$rec->setSpace($str);
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);
				$time_end = getmicrotime();
$time = $time_end - $time_start;
echo "สิ้นสุดการคำนวณ ".date("Y-m-d H:i:s")." ".strtotime("now"),"<BR>";
echo "การคำนวณใช้เวลาทั้งสิ้น $time วินาที<BR>";
	}
}	
function getmicrotime() { 
    list($usec, $sec) = explode(" ", microtime()); 
    return ((float)$usec + (float)$sec);
}
function rpdialog(){?>
<table width="100%"><tr><td><br />
<form name="rform" method="post" action="./index.php?sessiontab=4&sub=113">
<table width="40%" border="1" cellpadding="0" cellspacing="0" bordercolor="#FF7F00" align="center">
  <tr>
    <td colspan="2" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center"><strong>ระบุวันที่ และ รหัสสมาชิกที่ต้องการทราบข้อมูล</strong></td>
  </tr>
  <tr>
    <td colspan="2" align="center">&nbsp;</td>
    </tr>
  <!--tr>
    <td align="right">รอบ&nbsp;&nbsp;</td>
    <td><input type="text" name="ftrcode" id="ftrcode" onkeypress="return chknum(window.event.keyCode)" />
      &nbsp;( กรอกข้อมูลเป็น 1-9 )</td>
  </tr-->
  <tr>
  <td align="right" >วันที่&nbsp;&nbsp;</td>
  <td colspan="2">
      <input type="text" id="strfdate" onkeypress="return chknum(window.event.keyCode)" name="strfdate" size="10" maxlength="10" value="<?=date("Y-m-d")?>"/>
&nbsp;<a href="javascript:NewCal('strfdate','yyyymmdd',false,24)"><img src="./datetimepick/images/cal.gif" width="16" height="16" border="0" alt="เลือกวันที่เิีริ่มต้น" /></a>&nbsp; ถึง &nbsp;<input type="text" id="strtdate" onkeypress="return chknum(window.event.keyCode)" name="strtdate" size="10" maxlength="10" value="<?=date("Y-m-d")?>" />
&nbsp;<a href="javascript:NewCal('strtdate','yyyymmdd',false,24)"><img src="./datetimepick/images/cal.gif" width="16" height="16" border="0" alt="เลือกวันที่สิ้นสุด" /></a>
</td>
  </tr>
  <tr>
    <td width="24%" align="right">รหัสสมาชิก&nbsp;&nbsp;</td>
    <td width="76%">
      <input type="text" name="fmcode" id="fmcode" /></td>
  </tr>
  <tr align="center">
    <td colspan="2">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="2" align="center"><input type="button" name="Submit" value="ดูรายงาน" onclick="checkround()" /></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
</td></tr></table>
<? }
?>