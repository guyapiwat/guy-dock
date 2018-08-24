<? //require 'checklogin.php'?>
<?
// รหัสเริ่มต้น
// $smc = "0000209";
// $cmc = $smc;
if (isset($_SESSION["usercode"])){$smc=$_SESSION["usercode"];}else{$smc="";}
if (isset($_GET["cmc"])){$cmc=$_GET["cmc"];}else{$cmc="";}
if (isset($_POST["pmc"])){$cmc=$_POST["pmc"];}
if ($cmc=="") {$cmc=$smc;}
echo $_SESSION["usercode"];
if ($cmc=="") {
	//require 'header.php';
	echo "ยังไม่ได้ล็อกอิน<br>";
	exit;
}
// connect to database 
//include_once "./backoffice/connectmysql.php";
require("connectmysql.php");
// ตรวจสอบว่า $cmc อยู่ในสายงานของ $smc หรือไม่
$cur=$cmc;
for ($i=strlen($cur);$i<7;$i++){$cur="0".$cur;}
$lev=0;				// level จาก $smc ถึง $cmc; ถ้า $smc=$cmc, lev=0
do {
	$result=mysql_query("select * from ".$dbprefix."member where mcode='".$cur."' ");
	if (mysql_num_rows($result)>0) {
		$row = mysql_fetch_array($result, MYSQL_ASSOC);
		$cur_upa_code=$row["upa_code"];
		if ($cur==$smc){break;}else{$cur=$cur_upa_code; $lev++;}
	}else{
		require "header.php";
		echo "<font color=c00000><br>ไม่สามารถดูข้อมูลได้เพราะ<br>";
		echo "รหัส $cmc ไม่อยู่ในสายงานของ $smc<br></font>";
		exit;
	}
	mysql_free_result($result);
} while(1);

for($i=1;$i<=63;$i++){$n_mcode[$i]="";}
for($i=1;$i<=63;$i++){$n_name_t[$i]="";}
for($i=1;$i<=63;$i++){$n_upa_code[$i]="";}
for($i=1;$i<=63;$i++){$n_complete[$i]="";}
for($i=1;$i<=63;$i++){$n_compdate[$i]="";}
for($i=1;$i<=63;$i++){$n_mo[$i]="";}
for($i=1;$i<=63;$i++){$n_more[$i]="";}

// ใส่ข้อมูลสมาชิกและสายงานใน n_mcode[] เริ่มจาก $cmc
// $cmc
for ($i=strlen($cmc);$i<7;$i++){$cmc="0".$cmc;}
$n_mcode[1]="";
$result=mysql_query("select * from ".$dbprefix."member where mcode='".$cmc."' ");
if (mysql_num_rows($result)>0) {
	$row = mysql_fetch_array($result, MYSQL_ASSOC);
	$n_mcode[1]=$row["mcode"];
	$n_name_t[1]=$row["name_t"];
	$n_upa_code[1]=$row["upa_code"];
	$n_complete[1]=$row["complete"];
	$n_compdate[1]=$row["compdate"];
	$n_mo[1]=$row["mo"];
}
mysql_free_result($result);
// อ่านข้อมูล
for($i=1;$i<=31;$i++){
	if ($n_mcode[$i]<>"") {
		$result=mysql_query("select * from ".$dbprefix."member where upa_code='".$n_mcode[$i]."' order by lr");
		if (mysql_num_rows($result)>0) {
			for ($j=1; $j<=mysql_num_rows($result);$j++) {
				$row = mysql_fetch_array($result, MYSQL_ASSOC);
				if ($row["lr"]=="1"){
					$n_mcode[$i*2]=$row["mcode"];
					$n_name_t[$i*2]=$row["name_t"];
					$n_upa_code[$i*2]=$row["upa_code"];
					$n_complete[$i*2]=$row["complete"];
					$n_compdate[$i*2]=$row["compdate"];
					$n_mo[$i*2]=$row["mo"];
				}
				if ($row["lr"]=="2"){
					$n_mcode[$i*2+1]=$row["mcode"];
					$n_name_t[$i*2+1]=$row["NAME_T"];
					$n_upa_code[$i*2+1]=$row["upa_code"];
					$n_complete[$i*2+1]=$row["complete"];
					$n_compdate[$i*2+1]=$row["compdate"];
					$n_mo[$i*2+1]=$row["mo"];
				}
			}
		}
		mysql_free_result($result);
	}
}	
// ส่วน more
for($i=32;$i<=63;$i++){
	if ($n_mcode[$i]<>"") {
		$result=mysql_query("select * from ".$dbprefix."member where upa_code='".$n_mcode[$i]."' order by lr");
		if (mysql_num_rows($result)>0) {
			$n_more[$i]="1";
		}
		mysql_free_result($result);
	}
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<meta http-equiv="Content-Language" content="th">
<title>แผนภูมิสมาชิก <?=$cmc?></title>
</head>
<style type="text/css">
<!--
	.hs { font-family: tahoma; font-size: 10pt; color: ffffff; text-decoration: none }
	.yy { background-color: ffffc0; }
}
-->
</style>
<body>
<? include "header.php";?>
<br>
<?
// ส่วนหัว
echo "<table width=\"100%\" cellspacing=0 cellpadding=0 border=0><tr><td width=\"50%\" align=left valign=top>";
echo "<form method=post action=\"".$_SERVER["PHP_SELF"]."\"><span class=yy>รหัสสมาชิก <input type=\"text\" name=\"pmc\" size=7 maxlength=7>&nbsp;<input type=\"submit\" value=\"ค้น\">&nbsp;</span><br>";
echo "<img src=\"pic/mcode_blue_2.gif\">=สมบูรณ์<br>";
echo "<img src=\"pic/mcode_green_2.gif\">=ไม่สมบูรณ์<br></form>";

echo "</td><td width=\"50%\" align=left valign=top>";
echo "แผนภูมิสายงานของสมาชิก<br>";
if ($n_mcode[1]=="") {
	echo "<font color=ff0000>ไม่พบสายงานสมาชิกรหัส ".$cmc."</font>";
}else{
	echo "รหัส " . $n_mcode[1] ."&nbsp;&nbsp;".$n_name_t[1]."<br>";
	echo "<a href=\"memtree.php?cmc=".$n_mcode[1]."\">สายงานแบบต้นไม้ของรหัส ".$n_mcode[1]."</a><br>";
	echo "<a href=\"bibonus.php?cmc=".$n_mcode[1]."\">ยอดคอมมิชชั่นแผน A ของรหัส ".$n_mcode[1]."</a><br>";
	echo "<a href=\"mem_count_level.php?cmc=".$n_mcode[1]."\">สรุปคะแนนแต่ละชั้นแผน A ของรหัส ".$n_mcode[1]."</a><br>";
	if ($n_complete[1]=="1") {
		echo "สมบูรณ์ ".$n_compdate[1]."<br>";
	}
	if ($n_mo[1]=="1") {
		echo "<font color=\"ff0000\">M โมบาย</font><br>";
	}
	echo "อัพไลน์ A $n_upa_code[1]<br>";
}
echo "</td></tr></table>";
// แสดงส่วนโครงสร้าง
echo "<table border=0 cellpadding=0 cellspacing=0 width=751>";
// **********
// $i=1 ;level=0
echo "<tr>";
echo "<td width=\"10\" valign=top>ชั้น</td>";
echo "<td width=751 height=\"30\" colspan=32 align=center>";
// upline ของ root
if ($smc<>$cmc){
	$result=mysql_query("select * from BMEMBER where mcode='".$n_upa_code[1]."' ");
	if (mysql_num_rows($result)>0) {
		$row = mysql_fetch_array($result, MYSQL_ASSOC);
		echo "<a href=\"".$_SERVER["PHP_SELF"]."?cmc=".$row["mcode"]."\"><img src=\"pic/go_upa_code.gif\" border=0 "."alt=\"".$row["mcode"]."\n".$row["NAME_T"]."\"></a><br>";
	}
	mysql_free_result($result);
}
echo "</td></tr>";
// root
echo "<tr>";
echo "<td width=\"10\" valign=top>$lev</td>";
echo "<td width=751 colspan=32 align=center valign=top>";
if ($n_mcode[1]<>"") {
	if ($n_complete[1]<>""){
		echo "<img src=\"pic/mcode_blue_1.gif\" border=0 "."alt=\"".$n_mcode[1]."\n".$n_name_t[1]."\">";
	}else {
		echo "<img src=\"pic/mcode_green_1.gif\" border=0 "."alt=\"".$n_mcode[1]."\n".$n_name_t[1]."\">";
	}
	echo "<br>";
	if ($n_mo[1]=="1"){ echo "<font color=ff0000>M  </font>";}
	else{ if ($n_mo[1]=="2"){ echo "<font color=909090>M  </font>";}}
	echo $n_mcode[1]."<br>".substr($n_name_t[1],0,15);
}
echo "</td></tr>";

// **********
// $i=2-3	 ;level=1
echo "<tr>";
echo "<td width=\"10\" valign=top></td>";
for($i=2;$i<=3;$i++){
	if (($i % 2)==0){
		echo "<td width=381 colspan=16 align=right>";
		if($n_mcode[$i]<>""){
			echo "<img src=\"pic/b1l.gif\" border=0>";
		}
		echo "</td>";
	}
	else {
		echo "<td width=381 colspan=16 align=left>";
		if($n_mcode[$i]<>""){
			echo "<img src=\"pic/b1r.gif\" border=0>";
		}
		echo "</td>";
	}
}
echo "</tr>";
echo "<tr>";
for ($i=2;$i<=3;$i++) {
	if ($n_mcode[$i]<>"") {
	echo "<td width=\"10\" valign=top>".($lev+1)."</td>";
	break;
	}
}
for($i=2;$i<=3;$i++){
	echo "<td width=381 colspan=16 align=center valign=top>";
	if($n_mcode[$i]<>""){
		if ($n_complete[$i]<>""){
			echo "<a href=\"".$_SERVER["PHP_SELF"]."?cmc=".$n_mcode[$i]."\"><img src=\"pic/mcode_blue_1.gif\" border=0 "."alt=\"".$n_mcode[$i]."\n".$n_name_t[$i]."\"></a>";
		}else {
			echo "<a href=\"".$_SERVER["PHP_SELF"]."?cmc=".$n_mcode[$i]."\"><img src=\"pic/mcode_green_1.gif\" border=0 "."alt=\"".$n_mcode[$i]."\n".$n_name_t[$i]."\"></a>";
		}
		echo "<br>";
		if ($n_mo[$i]=="1"){ echo "<font color=ff0000>M  </font>";}
		else{ if ($n_mo[$i]=="2"){ echo "<font color=909090>M  </font>";}}
		echo $n_mcode[$i]."<br>".substr($n_name_t[$i],0,15);
	}
	echo "</td>";
}
echo "</tr>";

// **********
// $i=4-7	;level=2
echo "<tr>";
echo "<td width=\"10\" valign=top></td>";
for($i=4;$i<=7;$i++){
	if (($i % 2)==0){
		echo "<td width=191 colspan=8 align=right>";
		if($n_mcode[$i]<>""){
			echo "<img src=\"pic/b2l.gif\" border=0>";
		}
		echo "</td>";
	}
	else {
		echo "<td width=191 colspan=8 align=left>";
		if($n_mcode[$i]<>""){
			echo "<img src=\"pic/b2r.gif\" border=0>";
		}
		echo "</td>";
	}
}
echo "</tr>";
echo "<tr>";
for ($i=4;$i<=7;$i++) {
	if ($n_mcode[$i]<>"") {
	echo "<td width=\"10\" valign=top>".($lev+2)."</td>";
	break;
	}
}
for($i=4;$i<=7;$i++){
	echo "<td width=191 colspan=8 align=center valign=top>";
	if($n_mcode[$i]<>""){
		if ($n_complete[$i]<>""){
			echo "<a href=\"".$_SERVER["PHP_SELF"]."?cmc=".$n_mcode[$i]."\"><img src=\"pic/mcode_blue_1.gif\" border=0 "."alt=\"".$n_mcode[$i]."\n".$n_name_t[$i]."\"></a>";
		}else {
			echo "<a href=\"".$_SERVER["PHP_SELF"]."?cmc=".$n_mcode[$i]."\"><img src=\"pic/mcode_green_1.gif\" border=0 "."alt=\"".$n_mcode[$i]."\n".$n_name_t[$i]."\"></a>";
		}
		echo "<br>";
		if ($n_mo[$i]=="1"){ echo "<font color=ff0000>M  </font>";}
		else{ if ($n_mo[$i]=="2"){ echo "<font color=909090>M  </font>";}}
		echo $n_mcode[$i]."<br>".substr($n_name_t[$i],0,15);
	}
	echo "</td>";
}
echo "</tr>";

// **********
// $i=8-15	;level=3
echo "<tr>";
echo "<td width=\"10\" valign=top></td>";
for($i=8;$i<=15;$i++){
	if (($i % 2)==0){
		echo "<td width=96 colspan=4 align=right>";
		if($n_mcode[$i]<>""){
			echo "<img src=\"pic/b3l.gif\" border=0>";
		}
		echo "</td>";
	}
	else {
		echo "<td width=96 colspan=4 align=left>";
		if($n_mcode[$i]<>""){
			echo "<img src=\"pic/b3r.gif\" border=0>";
		}
		echo "</td>";
	}
}
echo "</tr>";
echo "<tr>";
for ($i=8;$i<=15;$i++) {
	if ($n_mcode[$i]<>"") {
	echo "<td width=\"10\" valign=top>".($lev+3)."</td>";
	break;
	}
}
for($i=8;$i<=15;$i++){
	echo "<td width=96 colspan=4 align=center valign=top>";
	if($n_mcode[$i]<>""){
		if ($n_complete[$i]<>""){
			echo "<a href=\"".$_SERVER["PHP_SELF"]."?cmc=".$n_mcode[$i]."\"><img src=\"pic/mcode_blue_1.gif\" border=0 "."alt=\"".$n_mcode[$i]."\n".$n_name_t[$i]."\"></a>";
		}else {
			echo "<a href=\"".$_SERVER["PHP_SELF"]."?cmc=".$n_mcode[$i]."\"><img src=\"pic/mcode_green_1.gif\" border=0 "."alt=\"".$n_mcode[$i]."\n".$n_name_t[$i]."\"></a>";
		}
		echo "<br>";
		if ($n_mo[$i]=="1"){ echo "<font color=ff0000>M  </font>";}
		else{ if ($n_mo[$i]=="2"){ echo "<font color=909090>M  </font>";}}
		echo $n_mcode[$i]."<br>".substr($n_name_t[$i],0,15);
	}
	echo "</td>";
}
echo "</tr>";

// **********
// $i=16-31	;level=4
echo "<tr>";
echo "<td width=\"10\" valign=top></td>";
for($i=16;$i<=31;$i++){
	if (($i % 2)==0){
		echo "<td width=47 colspan=2 align=right>";
		if($n_mcode[$i]<>""){
			echo "<img src=\"pic/b4l.gif\" border=0>";
		}
		echo "</td>";
	}
	else {
		echo "<td width=47 colspan=2 align=left>";
		if($n_mcode[$i]<>""){
			echo "<img src=\"pic/b4r.gif\" border=0>";
		}
		echo "</td>";
	}
}
echo "</tr>";
echo "<tr>";
for ($i=16;$i<=31;$i++) {
	if ($n_mcode[$i]<>"") {
	echo "<td width=\"10\" valign=top>".($lev+4)."</td>";
	break;
	}
}
for($i=16;$i<=31;$i++){
	echo "<td width=47 colspan=2 align=center valign=top>";
	if($n_mcode[$i]<>""){
		if ($n_complete[$i]<>""){
			echo "<a href=\"".$_SERVER["PHP_SELF"]."?cmc=".$n_mcode[$i]."\"><img src=\"pic/mcode_blue_1.gif\" border=0 "."alt=\"".$n_mcode[$i]."\n".$n_name_t[$i]."\"></a>";
		}else {
			echo "<a href=\"".$_SERVER["PHP_SELF"]."?cmc=".$n_mcode[$i]."\"><img src=\"pic/mcode_green_1.gif\" border=0 "."alt=\"".$n_mcode[$i]."\n".$n_name_t[$i]."\"></a>";
		}
		echo "<br>";
		if ($n_mo[$i]=="1"){ echo "<font color=ff0000>M  </font>";}
		else{ if ($n_mo[$i]=="2"){ echo "<font color=909090>M  </font>";}}
	}
	echo "</td>";
}
echo "</tr>";

// **********
// $i=32-63	;level=5
echo "<tr>";
echo "<td width=\"10\" valign=top></td>";
for($i=32;$i<=63;$i++){
	if (($i % 2)==0){
		echo "<td width=23 align=right>";
		if($n_mcode[$i]<>""){
			echo "<img src=\"pic/b5l.gif\" border=0>";
		}
		echo "</td>";
	}
	else {
		echo "<td width=23 align=left>";
		if($n_mcode[$i]<>""){
			echo "<img src=\"pic/b5r.gif\" border=0>";
		}
		echo "</td>";
	}
}
echo "</tr>";
echo "<tr>";
for ($i=32;$i<=63;$i++) {
	if ($n_mcode[$i]<>"") {
	echo "<td width=\"10\" valign=top>".($lev+5)."</td>";
	break;
	}
}
for($i=32;$i<=63;$i++){
	echo "<td width=23 align=center valign=top>";
	if($n_mcode[$i]<>""){
		if ($n_complete[$i]<>""){
			echo "<a href=\"".$_SERVER["PHP_SELF"]."?cmc=".$n_mcode[$i]."\"><img src=\"pic/mcode_blue_2.gif\" border=0 "."alt=\"".$n_mcode[$i]."\n".$n_name_t[$i]."\"></a>";
		}else {
			echo "<a href=\"".$_SERVER["PHP_SELF"]."?cmc=".$n_mcode[$i]."\"><img src=\"pic/mcode_green_2.gif\" border=0 "."alt=\"".$n_mcode[$i]."\n".$n_name_t[$i]."\"></a>";
		}
		echo "<br>";
		if ($n_mo[$i]=="1"){ echo "<font color=ff0000>M  </font>";}
		else{ if ($n_mo[$i]=="2"){ echo "<font color=909090>M  </font>";}}
	}
	echo "</td>";
}
echo "</tr>";
echo "<tr>";
echo "<td width=\"10\" valign=top></td>";
for($i=32;$i<=63;$i++){
	echo "<td width=23 align=center>";
	if($n_more[$i]<>""){
		echo "<img src=\"pic/arrow_down_01.gif\" border=0>";
	}
	echo "</td>";
}
echo "</tr>";
echo "</table>";
?>
<br><br>
</body>
</html>