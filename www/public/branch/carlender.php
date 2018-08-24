<html>
<head>
<meta http-equiv="Content-Language" content="th">
<meta http-equiv="Content-Type" content="text/html; charset=tis-620">
<title>netman pro</title>
<link rel="stylesheet" type="text/css" href="./../style.css" />
<script language="javascript" type="text/javascript">
	function selectDate(y,m,d,area){
	//alert(area);
	//alert(window.opener.document.getElementById(area));
		var mdate = y+"-";
		
		if(m.length==1)
			mdate = mdate+"0"+m+"-";
		else
			mdate = mdate+m+"-";
			
		if(d.length==1)
			mdate = mdate+"0"+d;
		else
			mdate = mdate+d;
		window.opener.document.getElementById(area).value = mdate;
		window.close();
	}
	function newCarlender(y,m,d,area){
	//alert(document.getElementById('year').value)
		if(y=="") y = document.getElementById('year').value;
		if(m=="") m = document.getElementById('month').value;
		if(d=="") d = document.getElementById('day').value;
		window.location = "carlender.php?year="+y+"&month="+m+"&day="+d+"&area="+area;
	}
	function redirect(key,area){
		if(key==13)
			newCarlender('','','',area);
	}
</script>
</head><!--bgcolor="#FFCC66"-->
<body topmargin="0" leftmargin="0">
<table><tr><td><fieldset>
<?
require("connectmysql.php");
require("./cls/repGenerator.php");

$y=isset($_POST['year'])?$_POST['year']:$_GET['year']; 
$m=isset($_POST['month'])?$_POST['month']:$_GET['month']; 
$d=isset($_POST['day'])?$_POST['day']:$_GET['day']; 
$area = isset($_POST['area'])?$_POST['area']:$_GET['area']; 
$day_name = array("Sunday"=>"Sun","Monday"=>"Mon","Tuesday"=>"Tue","Wednesday"=>"Wed","Thursday"=>"Thu","Friday"=>"Fri","Saturday"=>"Sat");
$day_color = array("Sunday"=>"#999999","Monday"=>"#FFFFFF","Tuesday"=>"#FFFFFF","Wednesday"=>"#FFFFFF","Thuesday"=>"#FFFFFF","Friday"=>"#FFFFFF","Saturday"=>"#999999");
$month_name = array('01'=>"Jan",'02'=>"Feb",'03'=>"Mar",'04'=>"Apr",'05'=>"May",'06'=>"Jun",'07'=>"Jul",'08'=>"Aug",'09'=>"Sep",'10'=>"Oct",'11'=>"Nov",'12'=>"Dec");
$lastday = strftime("%d",mktime(0, 0, 0, $m+1, 0, $y));
$d = $d>$lastday?$lastday:$d;
$sdate = checkdate($m,$d,$y)==true?"'$y-$m-$d'":"CURRENT_DATE()";
$sql = "SELECT DAYOFMONTH($sdate) AS today,MONTH($sdate) AS  tomonth,YEAR($sdate) AS  toyear,";
$sql .= "DAYNAME(CONCAT(YEAR($sdate),'-',MONTH($sdate),'-01')) AS startdate,";
$sql .= "DAYOFMONTH(ADDDATE(ADDDATE(CONCAT(YEAR($sdate),'-',MONTH($sdate),'-01'),INTERVAL 1 MONTH),INTERVAL -1 DAY)) AS enddate,";
$sql .= "CONCAT(YEAR($sdate),'-',MONTH($sdate),'-01')";
//echo "<br>".$sql;
$rs = mysql_query($sql);
$day = 0;
$start = false;
$start_day_name = mysql_result($rs,0,'startdate');
$num_day = mysql_result($rs,0,'enddate');
$today = mysql_result($rs,0,'today');
$tomonth = mysql_result($rs,0,'tomonth');
$toyear = mysql_result($rs,0,'toyear');

echo "<table width='220' cellspacing='0' cellpadding='0'><tr valign='middle'>";
echo "<td><input readonly='readonly' style='text-align:right;' size='2' type='text' name='day' id='day' value='$today'></td>";
echo "<td><select onChange=\"newCarlender('',this.value,'','$area')\" name='month' id='month'>";
foreach(array_keys($month_name) as $key){//document.getElementById('year').value
	
	echo "<option value='$key' ".($tomonth==$key?"selected":"").">".$month_name[$key]."</option>";
}
echo "</select></td>";
echo "<td align='right'><img style='cursor:pointer;' src='./images/previous.gif' onclick=\"newCarlender(document.getElementById('year').value-1,'','','$area')\">";
echo "<input style='text-align:right;' size='7' type='text' name='year' id='year' onkeyup=\"redirect(event.keyCode,'$area')\" value='$toyear'>";
echo "<img style='cursor:pointer;' src='./images/next.gif' onclick=\"newCarlender(parseInt(document.getElementById('year').value)+1,'','','$area')\">";
echo "&nbsp;&nbsp;<img style='cursor:pointer;' src='./images/gogo.gif' onclick=\"newCarlender('','','','$area')\">";
echo "</td></tr></table>";

echo "<table border='1' cellspacing='0' cellpadding='0'><tr>";
foreach(array_keys($day_name) as $key){
	echo "<td align='center' width='30' bgcolor='".$day_color[$key]."'>".$day_name[$key]."</td>";
}
echo "</tr>";
for($i=0;$i<6;$i++){
	if($day>$num_day) break;
	echo "<tr>";
	foreach(array_keys($day_name) as $key){
		if(!$start && $start_day_name==$key){ $start=true;$day++;}
		echo "<td align='right' width='30' bgcolor='";
		if($day==$today)
			echo "#FFCC00";
		else if($day==date("d"))
			if($tomonth==date("m"))
				echo "#66EE00";
			else echo "#99EE99";
		else 
			echo $day_color[$key];
		echo "'>";
		if($day!=0 && $day<=$num_day)
			//echo "<a href=\"javascript:newCarlender('','','$day')\">";
			echo "<a href=\"javascript:selectDate('$toyear','$tomonth','$day','$area')\">";
		echo ($start==true&&$day<=$num_day?$day++:"&nbsp;");
		if($day!=0 && $day<=$num_day)
			echo "</a>";
		echo "</td>";
	}
	echo "</tr>";
}
echo "</table>";
//echo "$m-$y";

?>
</fieldset></td></tr></table>
</body>
</html>