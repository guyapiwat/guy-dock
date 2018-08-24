<?
session_start();
?>
<link rel="stylesheet" type="text/css" href="./../style.css" />
<?
include("connectmysql.php");
include("./cls/chartGenerator.php");
include("gencode.php");
include("../function/function_pos.php");

include("global.php");
include_once("wording".$_SESSION["lan"].".php");
//set_time_limit (0);
set_time_limit (0);
ini_set("memory_limit","1000M");

		$cmc = $_SESSION["usercode"];



		$result=mysql_query("select ccmp,cbmdate1,cmp2,bmdate2,bmdate1,cmp,cmp3,bmdate3,name_f,name_t,cname_f,cname_t,upa_code,sp_code,pos_cur2,pos_cur,rpos_cur4,DATE_FORMAT(birthday, '%d-%m-%Y') as birthday from ".$dbprefix."member where mcode='".$cmc."'");
		//echo "select * from ".$dbprefix."member where mcode='".$usercode."'";

		if (mysql_num_rows($result)>0) {
				$row = mysql_fetch_array($result, MYSQL_ASSOC);
				$name_f = firstName($row["name_f"]);
				$name_t = $row["name_t"];
				$cname_f = $row["cname_f"];
				$cname_t = $row["cname_t"];
				$cmc_upa_code = $row["upa_code"];
				$cmc_sp_code = $row["sp_code"];
				$pos_cur2=$row["pos_cur2"];
				$pos_cur123=$row["pos_cur"];
				$pos_cur33=$row["pos_cur1"];
				
				
				$rpos_cur4=$row["rpos_cur4"];

				if($rpos_cur4 > 0){
					$result11=mysql_query("select tdate from ".$dbprefix."bround where rcode='".$rpos_cur4."' limit 0,1 ");
					//echo "select * from ".$dbprefix."calc_poschange4 where mcode='".$cmc."' order by id desc limit 0,1 ";
					if (mysql_num_rows($result11)>0) {
							$row1231 = mysql_fetch_array($result11, MYSQL_ASSOC);
							$pos_cur4_date = $row1231["tdate"];
					}
				}
				if(empty($pos_cur2))$pos_cur2 = $row["pos_cur"];

				//echo $row["name_t"];
		}
		$result=mysql_query("select npos from ".$dbprefix."pospv where mcode='".$cmc."' order by aid desc limit 0,1 ");
		//echo "select * from ".$dbprefix."pospv where mcode='".$cmc."' order by aid desc limit 0,1 ";
		if (mysql_num_rows($result)>0) {
				$row1 = mysql_fetch_array($result, MYSQL_ASSOC);
				$pos_cur3=$row1["npos"];
				//if(empty($pos_cur3))$pos_cur3 = $row["pos_cur"];
		}



			$sql1 = "SELECT month_pv as dayshow,a.pvb,a.mpos,a.month_pv,a.pv,a.mcode,taba.name_t,a.status";
			$sql1 .= ",CASE a.status WHEN '1' THEN '<img src=./images/true.gif>' ELSE '<img src=./images/false.gif>' END AS status1 ";
			//$sql .= ",CASE a.status WHEN '1' THEN '<img src=./images/true.gif>' ELSE '' END AS status2 ";
			$sql1 .= "FROM ".$dbprefix."status a  ";
			$sql1 .= " LEFT JOIN (SELECT mcode AS mca,name_t FROM ".$dbprefix."member) AS taba ON (a.mcode=taba.mca)";
			$sql1 .= " WHERE a.mcode= '".$cmc."'";
			$sql1 .= " and a.mpos <> 'BM' and a.mpos <> 'CM' order by a.id DESC limit 0,1	";
			//echo $sql;
			$result1=mysql_query($sql1);
			if (mysql_num_rows($result1)>0) {
					$row1 = mysql_fetch_object($result1);
					$cmcpv=$row1->pv ;
					$cmcpvb=$row1->pvb ;
					$cmcmpos=$row1->mpos ;
					$cmcstatus1=$row1->status ;
					$month_pv=$row1->month_pv ;
			}
	$array_mpos = array(''=>"-",'MB'=>"Member",'HP'=>"Home Pack",'BP'=>"Business Pack",'PP'=>"Platinum Pack",'4S'=>"FOUR STAR",'5S'=>"FIVE STAR",'SS'=>"SILVER STAR",'GS'=>"GOLD STAR "
	,'JA'=>"JADE ",'PE'=>"PEARL ",'SA'=>"Sapphire",'RB'=>"RUBY ",'EM'=>"EMERALD EXCUTIVE",'D'=>"DIAMOND EXCUTIVE"
	,'DD'=>"DOUBLE DIAMOND EXCUTIVE ",'TD'=>"TRIPLE DIAMOND EXCUTIVE ");
	$array_status = array('1'=>"250",'2'=>"750");



// Expire Date
	$selectch = "select id as id,mdate from  ".$dbprefix."member where mcode = '".$_SESSION["usercode"]."'";
	$rsch = mysql_query($selectch);
	$idi = mysql_result($rsch,0,'id');
	$mdate = mysql_result($rsch,0,'mdate');

	$select = "SELECT mid,MAX(exp_date) AS exp_date FROM ".$dbprefix."expdate where mid='$idi' GROUP BY mid";
	$rs = mysql_query($select);
	if(mysql_num_rows($rs) > 0)	$expdate = mysql_result($rs,0,'exp_date');

$cmc = $_SESSION["usercode"];


	////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////// new





////////////////////////////////////////////////////////////////////////////////////////////
$sql123="SELECT rcode,fdate,tdate FROM ".$dbprefix."around WHERE calc='1' ORDER BY rcode DESC LIMIT 1";
$rs123 = mysql_query($sql123);
$where_cause = "";
$max_rcode = 0;
if(mysql_num_rows($rs123)>0){
	$fdate = mysql_result($rs123,0,'fdate');
}else{
	$fdate = "";
}



///////////////////////////////////////////// chart //////////////////////////////////////////////

// ตรวจสอบว่า $cmc อยู่ในสายงานของ $smc หรือไม่
// ตรวจสอบว่า $cmc อยู่ในสายงานของ $smc หรือไม่
$cmc = gencode($cmc);
$chk = gencode($_POST["cause1"]);

$cur=$cmc;

///////////////////// new
$result=mysql_query("select name_f,name_t,name_b,cname_f,mtype1,cname_t,upa_code,sp_code,pos_cur2,pos_cur,DATE_FORMAT(birthday, '%d-%m-%Y') as birthday from ".$dbprefix."member where mcode='".$cmc."'");

		//echo "select * from ".$dbprefix."member where mcode='".$usercode."'";
		if (mysql_num_rows($result)>0) {
				$row123 = mysql_fetch_array($result, MYSQL_ASSOC);
				$name_f = firstName($row123["name_f"]);
				$name_b = $row123["name_b"];
				$cname_f = $row123["cname_f"];
				$cname_t = $row123["cname_t"];
				$cmc_upa_code = $row123["upa_code"];
				$cmc_upa_code = $row123["upa_code"];
				$cmc_sp_code = $row123["sp_code"];
				$pos_cur2=$row123["pos_cur2"];
				$pos_cur123=$row123["pos_cur"];
				$mtype=$row123["mtype1"];
				if($name_b !=""){$name_t = $name_f.' '.$row123["name_b"];}else{$name_t = $name_f.' '.$row123["name_t"];}
				$type = $arr_mtype1[$mtype];
				if(empty($pos_cur2))$pos_cur2 = $row123["pos_cur"];

				//echo $row["name_t"];
		}
		

?><table width="500">
    <tr >
      <td colspan="2" ><font size="3" color="#0000FF" ><?=$wording_lan["tab1_1_1"]?><br><?=$wording_lan["tab1_1_2"]?> : <?=$name_t?></font><? if(!empty($cname_t))echo '<br><font color="#0000FF" size="3">'.$wording_lan["tab1_1_3"].' : '.$cname_f.' '.$cname_t;?> </td>
    </tr>
	<tr>
		<td></font><font color="#0000FF" size="3"><?=$wording_lan["tab1_1_5"]?> : <?=$type?></font></td>
	</tr>
    <tr >
      <td colspan="2" align="center" bgcolor="#FFFF00">Dash Board</td>
  </tr style ="display:none" > 
   <tr style ="display:none" >
     <td colspan="2"><table border="3" bordercolor="#00FFFF" width="100%"> <tr>
      <td width="50%" ><?=$wording_lan["tab2_1_5"]?></td>
    <td width="50%"><?=$cmc?></td>
  </tr >   <tr style ="display:none" >
    <td><?=$wording_lan["tab2_1_6"]?></td>
	<td><?=$mdate?></td>
  </tr> 
  
  <!--tr >
	<td><?=$wording_lan["tab2_1_9"]?></td>
    <td><? echo posname($pos_cur222); ?> 
    <?if(isset($pos_cur222))echo '('.$pos_cur222_date.')'?>
	</td>
    </tr-->
  <!--tr>
    <td><?=$wording_lan["tab2_1_10"]?></td>
    <td><?=posname($pos_cur333)?>
       <?if(isset($pos_cur333))echo '('.$pos_cur333_date.')'?>
	 </td>
  </tr-->
 <tr style ="display:none">
    <td ><?=$wording_lan["tab2_1_10"]?></td>
    <td nowrap="nowrap"><?= posname($pos_cur22)?>
(
  <?=$pos_cur22_date?>
) </td>
  </tr>
  <tr style ="display:none">
    <td ><?=$wording_lan["tab2_1_11"]?></td>
    <td nowrap="nowrap"><?= posname($pos_cur222)?>
      &nbsp;(
      <?=$pos_cur222_date?>
      ) </td>
  </tr>
  
    </table></td></tr><tr>
      <td >    
	  <?$member_main = 1;?>

	 		<?php include_once("../backoffice/redialog_member.php"); ?>
			<BR>
			<?php include_once("../backoffice/redialog_point.php"); ?>

</td></tr><tr><td colspan="2"></td></tr>
  <tr>
    <td colspan="2"><table border="3" bordercolor="#00FFFF" width="100%" style='display:none'>
      <tr>
        <td width="50%"><?=$wording_lan["tab2_1_13"]?></td>
        <td width="50%"><?=$row["cmp3"]==""?"<font color='#FF0000'>".$wording_lan["tab2_1_incomplete"]."</font>":"<font color='#66FF00'>".$wording_lan["tab2_1_complete"]."</font>"?>
          &nbsp;
          <?=$row["bmdate3"]?></td>
      </tr>
      <tr>
        <td><?=$wording_lan["tab2_1_14"]?></td>
        <td><?=$row["cmp"]==""?"<font color='#FF0000'>".$wording_lan["tab2_1_incomplete"]."</font>":"<font color='#66FF00'>".$wording_lan["tab2_1_complete"]."</font>"?>
          &nbsp;
          <?=$row["bmdate1"]?></td>
      </tr>
      <tr>
        <td><?=$wording_lan["tab2_1_15"]?></td>
        <td><?=$row["cmp2"]==""?"<font color='#FF0000'>".$wording_lan["tab2_1_incomplete"]."</font>":"<font color='#66FF00'>".$wording_lan["tab2_1_complete"]."</font>"?>
          &nbsp;
          <?=$row["bmdate2"]?></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="2"><? if(!empty($row["cname_t"])) {?>
      <table border="3" bordercolor="#00FFFF" width="100%">
        <tr>
          <td width="50%"><?=$wording_lan["tab1_1_4"]?></td>
          <td width="50%">&nbsp;</td>
        </tr>
        <tr>
          <td><?=$wording_lan["tab2_1_16"]?></td>
          <td><?=$row["ccmp"]==""?"<font color='#FF0000'>".$wording_lan["tab2_1_incomplete"]."</font>":"<font color='#66FF00'>".$wording_lan["tab2_1_complete"]."</font>"?>
            &nbsp;
            <?=$row["cbmdate1"]?></td>
        </tr>
      </table>
      <? }?></td>
  </tr></table>

  <?
  
function gettotalpv($dbprefix,$mcode){
	$sql3 = "select mcode, SUM(tot_pv) AS tot_pv from ".$dbprefix."special_point WHERE  sa_type='VA' AND mcode='$mcode' group by mcode ";
				//if($mcode == '0000075')echo "$sql3<BR>";
		$rs3=mysql_query($sql3);
		if (mysql_num_rows($rs3)>0) {
			$sqlObj3 = mysql_fetch_object($rs3);
			$total_fv3= $sqlObj3->tot_pv;
		}else{
			$total_fv3=0;
		}
		mysql_free_result($rs3);
				//if($mcode == '0000075')echo "$total_fv3<BR>";
	return $total_fv3;
} 
function dateDiff($startDate, $endDate) { 
    // Parse dates for conversion 
    $startArry = date_parse($startDate); 
    $endArry = date_parse($endDate); 

    // Convert dates to Julian Days 
    $start_date = gregoriantojd($startArry["month"], $startArry["day"], $startArry["year"]); 
    $end_date = gregoriantojd($endArry["month"], $endArry["day"], $endArry["year"]); 

    // Return difference 
    return round(($end_date - $start_date), 0); 

} 
function expdate($startdate,$datenum){
 $startdatec=strtotime($startdate); // ทำให้ข้อความเป็นวินาที
 $tod=$datenum*86400; // รับจำนวนวันมาคูณกับวินาทีต่อวัน
 $ndate=$startdatec+$tod; // นับบวกไปอีกตามจำนวนวันที่รับมา
 return $ndate; // ส่งค่ากลับ
}
function posname($pos_cur) {
	
	$sql = "SELECT posname FROM ali_position WHERE posshort ='".$pos_cur."' ";
		//echo $sql;
		$rs = mysql_query($sql);
		if(mysql_num_rows($rs) > 0){
		$posname = mysql_result($rs,0,'posname'); 
			mysql_free_result($rs);
		}
		if($posname =='')$posname='-';
	return $posname;
}
function firstName($name_f){
	$language = $_SESSION["wording"];
	$name_f = trim($name_f);
	if($language == "EN"){
		if($name_f == "นาย"){
			$name_f = "Mr.";
		}
		else if($name_f == "นาง"){
			$name_f = "Mrs.";
		}
		else if($name_f == "นางสาว"){
			$name_f = "Miss";
		}
		else if($name_f == "บริษัทจำกัด"){
			$name_f = "Co.";
		}
		else if($name_f == "ห้างหุ้นส่วนจำกัด"){
			$name_f = "limited partnership";
		}
		else{
			$name_f = $name_f;
		}
	}
	return $name_f;
}
  ?>