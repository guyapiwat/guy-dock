<script language="javascript">
function rep_invent_detail(inv_code){
	var wlink = 'rep_invent_detail.php?inv_code='+inv_code;
	window.open(wlink);
}
</script>
<?
if(isset($_GET['y'])) $y = $_GET['y']; else $y = date('Y');
if(isset($_GET['m'])) $m = $_GET['m']; else $m = date('m');
$start_date = "$y-$m-1";
$end_date = "$y-$m-".cal_days_in_month(CAL_GREGORIAN, $m, $y);
//echo $start_date.';'.$end_date."<BR>";
$last_month_stamp = mktime(0,0,0,$m-1,1,$y);
list($last_start,$last_end) = explode(',',date('Y-m-d,Y-m-t',$last_month_stamp));
//echo date('Y-m-d,Y-m-t',$last_month_stamp).';'.$last_start.';'.$last_end."<BR>";
?>

<form name="month_select">
&nbsp;&nbsp;เดือน 
<select name="m" >
	<option value="01" <?=($m=='01')?'selected':''?>>มกราคม</option>
	<option value="02" <?=($m=='02')?'selected':''?>>กุมภาพันธ์</option>
	<option value="03" <?=($m=='03')?'selected':''?>>มีนาคม</option>
	<option value="04" <?=($m=='04')?'selected':''?>>เมษายน</option>
	<option value="05" <?=($m=='05')?'selected':''?>>พฤภาคม</option>
	<option value="06" <?=($m=='06')?'selected':''?>>มิถุนายน</option>
	<option value="07" <?=($m=='07')?'selected':''?>>กรกฎาคม</option>
	<option value="08" <?=($m=='08')?'selected':''?>>สิงหาคม</option>
	<option value="09" <?=($m=='09')?'selected':''?>>กันยายน</option>
	<option value="10" <?=($m=='10')?'selected':''?>>ตุลาคม</option>
	<option value="11" <?=($m=='11')?'selected':''?>>พฤจิกายน</option>
	<option value="12" <?=($m=='12')?'selected':''?>>ธันวาคม</option>
</select>
ปี 
<select name="y" >
	<?
	$this_year = date("Y");
	for($ss=$this_year-5;$ss<$this_year+5;$ss++){
	?>
	<option value="<?=$ss?>" <?=($y==$ss)?'selected':''?>><?=$ss?></option>
	<?}?>
</select>
<input type="button" value="แสดงข้อมูล" onClick="window.location='index.php?sessiontab=<?=$_GET['sessiontab']?>&sub=<?=$_GET['sub']?>&y='+month_select.y.value+'&m='+month_select.m.value" />
</form>

<?
require("connectmysql.php");
//require("./cls/repGenerator.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
		$sql = "SELECT c.id,c.rcode,c.mcode,m.name_t,c.pos_cur,c.pv_exp,c.pv,CASE c.status WHEN '1' THEN '<img src=./images/true.gif>' ELSE '<img src=./images/false.gif>' END AS status,c.pmonth ";
		$sql .= " FROM ".$dbprefix."my_pv  c ";
		$sql .= " LEFT OUTER JOIN ".$dbprefix."member m on m.mcode = c.mcode ";
		if($y!=""&&$m!=""){
			$sql .= " WHERE c.pmonth=".$y.$m."";
		}
		//echo $sql;
		if($_GET['state']==1){
			include("mypv_del.php");
		}else if($_GET['state']==2){
			include("mypv_editadd.php");
		}else{
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']);
		$rec->setOrder($_GET['ord']);
		$rec->setLimitPage($_GET['lp']);
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=2&sub=4&s=$y&m=$m");
		$rec->setBackLink($PHP_SELF,"sessiontab=2");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("rcode,mcode,name_t,pos_cur,pv_exp,pv,status,pmonth");
		$rec->setFieldDesc("รหัสรอบ,รหัสสมาชิก,ชื่อ,ตำแหน่ง,ยอดขั้นต่ำ,คะแนนรักษายอด,สถานะการรักษายอด,ปีเดือน");
		$rec->setFieldAlign("center,center,left,center,right,right,center,right");
		$rec->setFieldSpace("10%,10%,30%,10%,10%,10%,10%,10%");
		$rec->setSum(true,false,",,,,true,true");
		$rec->setFieldFloatFormat(",,,,2,2");
		//$rec->setFieldLink(",index.php?sessiontab=5&sub=3&cmc=,");
		//$rec->setSearch("mcode,name_t,pos_cur");
		//$rec->setSearchDesc("รหัสสมาชิก,ชื่อ,ตำแหน่ง");
		if($acc->isAccess(2))
			$rec->setEdit("index.php","id","id","sessiontab=2&sub=4");
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);
		}
		/*
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
		$rec->setOrder($_GET['ord']==""?" rcode ":$_GET['ord']);
		$rec->setLimitPage($_GET['lp']);
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		$rec->setSize("100%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=2&sub=4");
		$rec->setBackLink($PHP_SELF,"sessiontab=2");
		if(isset($page))
			$rec->setCurPage($page);
		//$rec->setSpecial("./images/search.gif","","view","rcode,mcode","IMAGE","ดู");
		$rec->setShowField("rcode,mcode,name_t,pos_cur,pv_exp,pv,status,pmonth");
		$rec->setFieldDesc("รหัสรอบ,รหัสสมาชิก,ชื่อ,ตำแหน่ง,ยอดขั้นต่ำ,คะแนนรักษายอด,สถานะการรักษายอด,ปีเดือน");
		$rec->setFieldAlign("center,center,left,center,right,right,center,right");
		$rec->setFieldSpace("10%,10%,30%,10%,10%,10%,10%,10%");
		$rec->setSum(true,false,",,,,true,true");
		$rec->setFieldFloatFormat(",,,,2,2");
		$rec->setSearch("mcode,name_t,pos_cur,status");
		$rec->setSearchDesc("รหัสสมาชิก,ชื่อ,ตำแหน่ง,สถานะการรักษายอด");
		$rec->setFieldLink("");
		if($acc->isAccess(2))
			$rec->setEdit("index.php","id","id","sessiontab=2&sub=4");
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);*/

?>
