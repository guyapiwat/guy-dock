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
		$maxrows = $row-> level ; 
	}
 
	$right_sql="SELECT @ln := @ln+1 AS rank , a.sano_r, a.mcode_r ,a.lr1
				,coalesce(a.level_r, a.level_l) as level, a.level_r
				,  a.rcode_r, a.rcode_l 
				, c.name_t as name_r 
				FROM gug_ad as a 
				left outer join gug_member as c on c.mcode = a.mcode_r 
				WHERE a.mcode ='$cmc' 
				and a.mcode_r is not null
				order by   level";	
 
	$sql=$right_sql;

	mysql_query("set NAMES tis620");
	mysql_query("set @ln = 0");
	$result = mysql_query($sql); 
	$ncount = 0;
	$numrows = mysql_num_rows($result);
 	while($row=mysql_fetch_object($result)){
		$varright[$ncount] = $row;
		++$ncount;
	}


	$left_sql="SELECT @ln := @ln+1 AS rank ,a.sano_l,  a.mcode_l  ,a.lr1
				,coalesce(a.level_l, a.level_r) as level
				, a.level_l, a.rcode_l
				, c.name_t as name_l 
				FROM gug_ad as a 
				left outer join gug_member as c on c.mcode = a.mcode_l 
				WHERE a.mcode ='$cmc'  
				and a.mcode_l is not null
				order by level ";
 
	$sql=$left_sql;
	$result = mysql_query($sql); 
	mysql_query("set @ln = 0");
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
	echo "<title>สรุปคะแนน แผน A </title>\n";
	echo "</head>\n";
	echo "<body>\n";
	$name_t = get_data("name_t","member","mcode='$cmc' " );
	echo "<div align='center'><font size='+1'><B>รายงานสรุป คะแนน แผน A ของ</B></font></div>";
	echo "<div align='center'><font size='+1'><B>$cmc   $name_t</B></font></div>";
	echo "<br>";
	echo "<a href=\"javascript:window.close();\">Close Window</a><br>";
	echo "พิมพ์วันที่ ".date("Y-m-d h:i:s");

	echo "<table width='100%'>";
	echo "<tr>";
	echo "<td bgcolor='#FFFFFF'>";

	echo "<table width='100%'>";
	echo "<tr align=center>";
	echo "<td  bgcolor='#EEEEEE' width='5%'>ลำดับ</td>";
	echo "<td  bgcolor='#EEEEEE' width='10%'>รอบ ซ้าย</td>";
	echo "<td  bgcolor='#EEEEEE' width='5%'>ชั้น</td>";
	echo "<td  bgcolor='#EEEEEE' width='5%'>จำนวน</td>";
	echo "<td  bgcolor='#EEEEEE' width='10%'>รหัส</td>";
	echo "<td  bgcolor='#EEEEEE' width='15%'>ชื่อ</td>";
	echo "<td  bgcolor='#EEEEEE' width='10%'>รอบ ขวา</td>";
	echo "<td  bgcolor='#EEEEEE' width='5%'>ชั้น</td>";
	echo "<td  bgcolor='#EEEEEE' width='5%'>จำนวน</td>";
	echo "<td  bgcolor='#EEEEEE' width='10%'>รหัส</td>";
	echo "<td  bgcolor='#EEEEEE' width='15%'>ชื่อ</td>";
	echo "</tr>";
	
 
 
	$ncount = 1;
	$sbgdolor = " bgcolor = '#FFFFFF'";
	$tmplevel = 1;
	$lrank = 0;
	$rrank = 0;
	$countleft =0;
	$countright = 0;
	$sumlevelleft = 1;
	$sumlevelright = 1;
	$grandleft = 0;
	$grandright = 0;
	//show content
	

	for($j=0;  $j< $numrows; $j++){
		//print left
		//change tmplevel

		echo "<tr ".  $sbgdolor .">";
		echo "<td>";								
		echo  $ncount;
		echo "</td>";
		echo "<td>";								
		echo  $varleft[$j]->rcode_l;
		echo "</td>";
		echo "<td>";								
		echo  $varleft[$j]->level_l;
		echo "</td>";
		echo "<td align = right>";								
		if($varleft[$j]->level_l <> $varleft[$j +1]->level_l){
			echo  $sumlevelleft;
			$grandleft += $sumlevelleft;
			$sumlevelleft = 1;
		}else {
			++$sumlevelleft;
		}
		echo "</td>";
		echo "<td>";								
		echo  $varleft[$j]->mcode_l;
		echo "</td>";
		echo "<td>";								
		echo  $varleft[$j]->name_l;
		echo "</td>";
		echo "<td>";	
		echo  $varright[$j]->rcode_r; 
		echo "</td>";
		echo "<td>";								
		echo $varright[$j]->level_r;
		echo "</td>";
		echo "<td align = right>";								
		if($varright[$j]->level_r <> $varright[$j +1]->level_r){
			echo  $sumlevelright;
			$grandright += $sumlevelright;
			$sumlevelright = 1;
		}else {
			++$sumlevelright;
		}
		echo "</td>";
		echo "<td>";								
		echo $varright[$j]->mcode_r;
		echo "</td>";
		echo "<td>";								
		echo  $varright[$j]->name_r;
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
	echo "<td colspan=3 align=center>รวมจำนวนทางด้านซ้าย</td>";
	echo "<td align=right>$grandleft</td>";
	echo "<td align=center></td>";
	echo "<td colspan=3 align=center>รวมจำนวนทางด้านขวา</td>";
	echo "<td align=right>$grandright</td>";
	echo "<td colspan=2 align=center></td>";
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