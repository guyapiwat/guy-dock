<? include("./global.php");?>
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
	if(document.getElementById("ftrcode").value!=""){
		var numCheck = document.getElementById("ftrcode").value;
		var numVal = numCheck.split("-");
		if(numVal.length>2){
			alert("กรุณากรอกรูปแบบรอบให้ถูกต้อง");
			return false;
		}
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
require("connectmysql.php");
require("./cls/repGenerator.php");

if (isset($_SESSION["usercode"])){$smc=$_SESSION["usercode"];}else{$smc="";}
if (isset($_GET["cmc"])){$cmc=$_GET["cmc"];}else{$cmc="";}
if (isset($_POST["pmc"])){$cmc=$_POST["pmc"];}
if ($cmc=="") {$cmc=$smc;}
if ($cmc=="") {
	$cmc=$_SESSION["usercode"];
}
		if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
		
		$sql = "SELECT c.rcode,c.mcode,m.name_t,c.pos_cur,c.pv_exp,c.pv,CASE c.status WHEN '1' THEN '<img src=./images/true.gif>' ELSE '<img src=./images/false.gif>' END AS status,c.pmonth ";
		$sql .= " FROM ".$dbprefix."my_pv  c ";
		$sql .= " LEFT OUTER JOIN ".$dbprefix."member m on m.mcode = c.mcode ";
 		if($ftrcode!=""&&$cmc!=""){
			$sql .= " WHERE rcode between '".$ftrc[0]."' and '".$ftrc[1]."' and c.mcode='".$cmc."'";
		}else if($ftrcode!=""){
			$sql .= " WHERE rcode between '".$ftrc[0]."' and '".$ftrc[1]."'";
		}else if($cmc!=""){
			$sql .= " WHERE c.mcode='".$cmc."'";
		}
		//echo "$sql<BR>";
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
		$rec->setOrder($_GET['ord']==""?" rcode ":$_GET['ord']);
		$rec->setLimitPage($_GET['lp']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=5&sub=12&ftrcode=$ftrcode&fmcode=$cmc");
		$rec->setBackLink($PHP_SELF,"sessiontab=5");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("rcode,mcode,name_t,pos_cur,pv_exp,pv,status,pmonth");
		$rec->setFieldDesc("รหัสรอบ,รหัสสมาชิก,ชื่อ,ตำแหน่ง,ยอดขั้นต่ำ,คะแนนรักษายอด,สถานะการรักษายอด,ปีเดือน");
		$rec->setFieldAlign("center,center,left,center,right,right,center,right");
		$rec->setFieldSpace("10%,10%,30%,10%,10%,10%,10%,10%");
		$rec->setSum(true,false,",,,,true,true");
		$rec->setFieldFloatFormat(",,,,2,2");
		$rec->setFieldLink("");
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);

?>