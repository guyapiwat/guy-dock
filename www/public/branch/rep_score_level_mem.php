<? //include("adminchecklogin.php");?>
<? include("prefix.php");?>
<? include("connectmysql.php");?>
<script language="javascript" type="text/javascript" src="datetimepick/datetimepicker.js"></script>
<?
set_time_limit(0);
$showrep =$_POST['showrep'];
$mcode = $_POST['mcode'];
$cmc = $_GET['cmc'];
if( $cmc <> "") 
$showrep = 1;
if( $mcode <> "")
$cmc = $mcode;


if ($showrep=='' ){
	show_rep_dialogbox();
}
else{
	//ตรวจสอบความถูกต้องของค่าที่ส่งจาก dialog
	$oktoshow=true;
	/*
	if ($chkro=="" ) {
		$errormsg.="กรุณาเลือกข้อมูลที่ต้องการค้นหาพร้อมทั้งระบุค่าที่ต้องการ<br>";
		$oktoshow=false;
	}
	*/
	//echo"$mcode<BR>";
	/*	
	// หากข้อมูลไม่ถูกต้อง ไม่แสดง
	if(! $oktoshow){
		echo "<font color=red>$errormsg</font>";
		echo "<br>";
		echo "<a href=\"javascript:window.close();\">Close Window</a>";
		exit;
	}
	*/
	//หา sql statement
 	$maxlevel ="select coalesce(a.level_l, a.level_r) as level 
				FROM gug_ad as a 
				WHERE a.mcode ='$cmc' 
				order by level desc limit 0,1";	

	mysql_query("set NAMES tis620");
	$sql=$maxlevel;
	$result1 = mysql_query($sql); 
	if($row=mysql_fetch_object($result1)){	
		$numrows = $row-> level ; 
	}
 
 
	$right_sql="SELECT  count(level_r) as countr
				, coalesce(a.level_r, a.level_l) as level
				FROM gug_ad as a 
				WHERE a.mcode ='$cmc' 
				and a.mcode_r is not null
				group  by level_r";	
 
	$sql=$right_sql;
	mysql_query("set NAMES tis620");
	$result = mysql_query($sql); 
	$ncount = 0;
 	while($row=mysql_fetch_object($result)){
		$varright[$ncount] = $row;
		++$ncount;
	}

	$left_sql="SELECT count(level_l) as countl
				,coalesce(a.level_l, a.level_r) as level
				FROM gug_ad as a 
				WHERE a.mcode ='$cmc'  
				and a.mcode_l is not null
				group  by level_l ";
 
	$sql=$left_sql;
	$result = mysql_query($sql); 
	$ncount = 0;
 	while($row=mysql_fetch_object($result)){
		$varleft[$ncount] = $row;
		++$ncount;
	}
 


	// html
	echo "<html>\n";
	echo "<head>\n";
	echo "<meta http-equiv='Content-Type' content='text/html; charset=windows-874'>\n";
	echo "<meta http-equiv='Content-Language' content='th'>\n";
	echo "<title>สรุปคะแนนแต่ละชั้น แผน A </title>\n";
	echo "</head>\n";
	echo "<body>\n";
	$name_t = get_data("name_t","member","mcode='$cmc' " );
	echo "<div align='center'><font size='+1'><B>รายงานสรุป คะแนนแต่ละชั้น แผน A ของ</B></font></div>";
	echo "<div align='center'><font size='+1'><B>$cmc   $name_t</B></font></div>";
	echo "<br>";
	echo "<a href=\"javascript:window.close();\">Close Window</a><br>";
	echo "พิมพ์วันที่ ".date("Y-m-d h:i:s");

	echo "<table width='100%'>";
	echo "<tr>";
	echo "<td bgcolor='#FFFFFF'>";

	echo "<table width='50%'>";
	echo "<tr align=center>";
	echo "<td  bgcolor='#EEEEEE' width='5%'>ลำดับ</td>";
	echo "<td  bgcolor='#EEEEEE' width='10%'>ชั้นที่</td>";
	echo "<td  bgcolor='#EEEEEE' width='20%'>ซ้าย</td>";
	echo "<td  bgcolor='#EEEEEE' width='20%'>ขวา</td>";
	echo "</tr>";
	
 
 
	$ncount = 1;
	$sbgdolor = " bgcolor = '#FFFFFF'";
	$tmplevel = 1;
	$lrank = 0;
	$rrank = 0;
	$sumlevelleft = 0;
	$sumlevelright = 0;
	//show content
	

	for($j=0;  $j< $numrows -1; $j++){
		//print left
		//change tmplevel

		echo "<tr ".  $sbgdolor .">";
		echo "<td>";								
		echo  $ncount;
		echo "</td>";
		echo "<td>";	
		if( $j < sizeof($varleft) ) {
			echo $varleft[$j]->level;
		}else {
			echo $varright[$j]->level;
		}
		echo "</td>";
		echo "<td>";	
		if( $j < sizeof($varleft) ) {
			echo  $varleft[$j]->countl;
			$sumlevelleft += $varleft[$j]->countl;
		}else {
			echo "0";
		}
		echo "</td>";
		echo "<td>";			
		if( $j < sizeof($varright)) {
			echo  $varright[$j]->countr; 
			$sumlevelright += $varright[$j]->countr;
		}else {
			echo "0";
		}
		echo "</td>";
		echo "</tr>";
 
		if($ncount%2 =='0'){
				$sbgdolor=  " bgcolor = '#ffffff'";			
		}else{
				$sbgdolor=  " bgcolor = '#eeeeee'";						  
		}
		$ncount = $ncount + 1;	


	}


	
	//free result set
	mysql_free_result($leftarray);
	mysql_free_result($rightarray);
	echo "<tr bgcolor='#E0EFF3'>";
	echo "<td colspan=2 align=center>รวม</td>";
	echo "<td align=right>$sumlevelleft</td>";
	echo "<td align=right>$sumlevelright</td>";
	echo "</tr>";	
	echo "<tr bgcolor='#E0EFF3'>";
	echo "<td colspan=2 align=center>เหลือ</td>";
	if( $sumlevelleft <= $sumlevelright ) {
		$total =$sumlevelright - $sumlevelleft;
		echo "<td align=right>$total</td>";
		echo "<td align=right>0</td>";
	}else {
		$total =$sumlevelleft - $sumlevelright;
		echo "<td align=right>0</td>";
		echo "<td align=right>$total</td>";
	}

	echo "</tr>";	
	echo "</table>";
	echo "</td>";
	echo "</tr>";
	echo "</table>";
	echo "</body>\n";
	echo "</html>\n";

 

}  //ปิด if showrep
 

function get_data($field,$table,$field_and_value){
	//อ่านค่า จาก  select $field from $table where $field_and_value
	// $field=field name to get data
	// table=scm_xxxxxx ไม่ต้องใส่ scm
	// $field_and_value="fieldname='value' "
	global $dbprefix;
	$sql="select * from ".$dbprefix."$table where $field_and_value ";
	$result=mysql_query($sql);
	if($result){
		if($row=mysql_fetch_object($result)){
			return $row->$field;
		}
	}
	return false;
}
?>