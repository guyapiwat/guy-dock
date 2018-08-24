<?
if (isset($_SESSION["usercode"])){$smc=$_SESSION["usercode"];}else{$smc="";}
if (isset($_GET["cmc"])){$cmc=$_GET["cmc"];}else{$cmc="";}
if ($cmc=="") {$cmc=$smc;}
if ($cmc==""){$cmc=$smc;}
// connect to database 
require("connectmysql.php");
// ตรวจสอบว่า $cmc อยู่ในสายงานของ $smc หรือไม่
$cur=$cmc;
for ($i=strlen($cur);$i<7;$i++){$cur="0".$cur;}
do {
	$result=mysql_query("select * from ".$dbprefix."member where mcode='".$cur."' ");
	if (mysql_num_rows($result)>0) {
		$row = mysql_fetch_array($result, MYSQL_ASSOC);
		$cur_upa_code=$row["upa_code"];
		if ($cur==$smc){break;}else{$cur=$cur_upa_code;}
	}else{
		require "header.php";
		echo "<font color=c00000><br>ไม่สามารถดูข้อมูลได้เพราะ<br>";
		echo "รหัส $cmc ไม่อยู๋ในสายงานของ $smc<br></font>";
		exit;
	}
	mysql_free_result($result);
} while(1);
set_time_limit(0);
ini_set("memory_limit","200M");
// หาลูกข้างซ้ายและขาวเพื่อหา ลูกทีมในแต่ละชั้น
$result=mysql_query("select * from ".$dbprefix."member where mcode='".$cmc."' ");
if (mysql_num_rows($result)>0) {
	$row = mysql_fetch_array($result, MYSQL_ASSOC);
	$mcode=$row["mcode"];
	$name_t=$row["name_t"];
}
$result=mysql_query("select * from ".$dbprefix."member where upa_code='".$cmc."' ");
for ($i=1;$i<=mysql_num_rows($result);$i++) {
	$row = mysql_fetch_array($result, MYSQL_ASSOC);
	if ($row["lr"]=="1"){$lmc=$row["mcode"];}
	if ($row["lr"]=="2"){$rmc=$row["mcode"];}
}

// ใส่ข้อมูลสมาชิกและสายงานใน n_mcode[] เริ่มจาก $lmc
///////////////////// $lmc ///////////////////// 
$s=0;
$result=mysql_query("select * from ".$dbprefix."member where mcode='".$lmc."' ");
if (mysql_num_rows($result)>0) {
	$row = mysql_fetch_array($result, MYSQL_ASSOC);
	// push stack
	$s++;
	$s_level[$s]=1;
	$s_mcode[$s]=$row["mcode"];
	$s_name_t[$s]=$row["name_t"];
	$s_upa_code[$s]=$row["upa_code"];
	$s_lr[$s]=$row["lr"];
	$s_complete[$s]=$row["complete"];
	$s_mo[$s]=$row["mo"];
}
mysql_free_result($result);
$l=0;
$l_max=0;
do{
	if ($s<=0){
		break;
	};
	// read from stack mcode and put in result
	$l++;
	$l_level[$l]=$s_level[$s];
	$l_mcode[$l]=$s_mcode[$s];
	$l_name_t[$l]=$s_name_t[$s];
	$l_upa_code[$l]=$s_upa_code[$s];
	$l_lr[$l]=$s_lr[$s];
	$l_complete[$l]=$s_complete[$s];
	$l_mo[$l]=$s_mo[$s];
	if($s_level[$s]>$l_max){
		$l_max=$s_level[$s];
	}
	if(! isset($l_count[$s_level[$s]])){
		if($l_complete[$l]=="1"){
			$l_count[$s_level[$s]]=1;
		}
	}else{
		if ($s_level[$s]>=7 and $l_count[$s_level[$s]]<64){
			if($l_complete[$l]=="1"){
				$l_count[$s_level[$s]]=$l_count[$s_level[$s]]+1;
			}
		}
	}
	// pop stack
	$s--;
	// find child of mcode and push in stack
	$result=mysql_query("select * from ".$dbprefix."member where upa_code='".$l_mcode[$l]."' order by lr desc");
	if (mysql_num_rows($result)>0) {
		for ($i=1;$i<=mysql_num_rows($result);$i++) {
			$row = mysql_fetch_array($result, MYSQL_ASSOC);
			// push stack
			$s++;
			$s_level[$s]=$l_level[$l]+1;
			$s_mcode[$s]=$row["mcode"];
			$s_name_t[$s]=$row["name_t"];
			$s_upa_code[$s]=$row["upa_code"];
			$s_lr[$s]=$row["lr"];
			$s_complete[$s]=$row["complete"];
			$s_mo[$s]=$row["mo"];
		}
	}
	mysql_free_result($result);

} while(1);

///////////////////// $rmc /////////////////////
$s=0;
$result=mysql_query("select * from ".$dbprefix."member where mcode='".$rmc."' ");
if (mysql_num_rows($result)>0) {
	$row = mysql_fetch_array($result, MYSQL_ASSOC);
	// push stack
	$s++;
	$s_level[$s]=1;
	$s_mcode[$s]=$row["mcode"];
	$s_name_t[$s]=$row["name_t"];
	$s_upa_code[$s]=$row["upa_code"];
	$s_lr[$s]=$row["lr"];
	$s_complete[$s]=$row["complete"];
	$s_mo[$s]=$row["mo"];
}
mysql_free_result($result);
$r=0;
$r_max=0;
do{
	if ($s<=0){
		break;
	};
	// read from stack mcode and put in result
	$r++;
	$r_level[$r]=$s_level[$s];
	$r_mcode[$r]=$s_mcode[$s];
	$r_name_t[$r]=$s_name_t[$s];
	$r_upa_code[$r]=$s_upa_code[$s];
	$r_lr[$r]=$s_lr[$s];
	$r_complete[$r]=$s_complete[$s];
	$r_mo[$r]=$s_mo[$s];
	if($s_level[$s]>$r_max){
		$r_max=$s_level[$s];
	}
	if(! isset($r_count[$s_level[$s]])){
		if($r_complete[$r]=="1"){
			$r_count[$s_level[$s]]=1;
		}
	}else{
		if ($s_level[$s]>=7 and $r_count[$s_level[$s]]<64){
			if($r_complete[$r]=="1"){
				$r_count[$s_level[$s]]=$r_count[$s_level[$s]]+1;
			}
		}
	}
	// pop stack
	$s--;
	// find child of mcode and push in stack
	$result=mysql_query("select * from ".$dbprefix."member where upa_code='".$r_mcode[$r]."' order by lr desc");
	if (mysql_num_rows($result)>0) {
		for ($i=1;$i<=mysql_num_rows($result);$i++) {
			$row = mysql_fetch_array($result, MYSQL_ASSOC);
			// push stack
			$s++;
			$s_level[$s]=$r_level[$r]+1;
			$s_mcode[$s]=$row["mcode"];
			$s_name_t[$s]=$row["name_t"];
			$s_upa_code[$s]=$row["upa_code"];
			$s_lr[$s]=$row["lr"];
			$s_complete[$s]=$row["complete"];
			$s_mo[$s]=$row["mo"];
		}
	}
	mysql_free_result($result);

} while(1);

//echo "l_max=$l_max<br>";
//echo "r_max=$r_max<br>";
echo "รหัส " . $mcode ."&nbsp;&nbsp;".$name_t."<br>";
echo "[<a href=\"".$_SERVER["PHP_SELF"]."?sessiontab=2&sub=1&cmc=". $mcode ."\">แผนภูมิ สายงานรหัส ". $mcode ."</a>] &nbsp;[<a href=\"".$_SERVER["PHP_SELF"]."?sessiontab=2&sub=5&cmc=". $mcode ."\">สายงานแบบต้นไม้ของรหัส ". $mcode ."</a>] &nbsp;[<a href=\"".$_SERVER["PHP_SELF"]."?sessiontab=5&sub=1&cmc=". $mcode ."\">ยอดคอมมิชชั่นแผน A ของรหัส". $mcode ."</a>]<br>";

echo "<br>";
echo "<br>";
echo "<table border=0 cellpadding=0 cellspacing=0 width=\"100%\">";
echo "<tr><td width=\"100%\" height=1 bgcolor=000000></td></tr>";
echo "</table>";
echo "<table border=0 cellpadding=0 cellspacing=0 width=\"100%\">";
echo "<tr>";
echo "<td width=\"10%\" align=left valign=top bgcolor=f0f0f0>ลำดับ</td>";
echo "<td width=\"10%\" align=left valign=top bgcolor=f0f0f0>ชั้นที่</td>";
echo "<td width=\"10%\" align=left valign=top bgcolor=f0f0f0>คะแนน-ซ้าย</td>";
echo "<td width=\"10%\" align=left valign=top bgcolor=f0f0f0>คะแนน-ขวา</td>";
echo "<td width=\"60%\" align=left valign=top bgcolor=f0f0f0></td>";
echo "</tr>";
echo "</table>";
echo "<table border=0 cellpadding=0 cellspacing=0 width=\"100%\">";
echo "<tr><td width=\"100%\" height=1 bgcolor=000000></td></tr>";
echo "</table>";
echo "<table border=0 cellpadding=0 cellspacing=0 width=\"100%\">";
if ($l_max>$r_max){$x=$l_max;}else{$x=$r_max;}
$l_tot=0;
$r_tot=0;
for($i=1;$i<=$x;$i++){
	if (($i % 2)==0){
		$bgcolor="bgcolor=f0f0f0";
	}else{$bgcolor="";}
	$l_tot=$l_tot+$l_count[$i];
	$r_tot=$r_tot+$r_count[$i];
	echo "<tr>";
	echo "<td width=\"10%\" align=left valign=top $bgcolor>$i</td>";
	echo "<td width=\"10%\" align=left valign=top $bgcolor>$i</td>";
	echo "<td width=\"10%\" align=left valign=top $bgcolor>$l_count[$i]</td>";
	echo "<td width=\"10%\" align=left valign=top $bgcolor>$r_count[$i]</td>";
	echo "<td width=\"60%\" align=left valign=top $bgcolor></td>";
	echo "</tr>";
}
$i++;
$i++;
if (($i % 2)==0){
	$bgcolor="bgcolor=f0f0f0";
}else{$bgcolor="";}
echo "<tr>";
echo "<td width=\"10%\" align=left valign=top $bgcolor></td>";
echo "<td width=\"10%\" align=left valign=top $bgcolor>รวม</td>";
echo "<td width=\"10%\" align=left valign=top $bgcolor>$l_tot</td>";
echo "<td width=\"10%\" align=left valign=top $bgcolor>$r_tot</td>";
echo "<td width=\"60%\" align=left valign=top $bgcolor></td>";
echo "</tr>";
if($l_tot>$r_tot){
	$l_remain=$l_tot-$r_tot;
	$r_remain=0;
}else{
	$l_remain=0;
	$r_remain=$r_tot-$l_tot;
}
$i++;
if (($i % 2)==0){
	$bgcolor="bgcolor=f0f0f0";
}else{$bgcolor="";}
echo "<tr>";
echo "<td width=\"10%\" align=left valign=top $bgcolor></td>";
echo "<td width=\"10%\" align=left valign=top $bgcolor>เหลือ</td>";
echo "<td width=\"10%\" align=left valign=top $bgcolor>$l_remain</td>";
echo "<td width=\"10%\" align=left valign=top $bgcolor>$r_remain</td>";
echo "<td width=\"60%\" align=left valign=top $bgcolor></td>";
echo "</tr>";
echo "</table>";
echo "<table border=0 cellpadding=0 cellspacing=0 width=\"100%\">";
echo "<tr><td width=\"100%\" height=1 bgcolor=000000></td></tr>";
echo "</table>";
?>
</body>
</html>