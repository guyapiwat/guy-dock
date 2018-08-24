<script language="javascript">
var win
function view(code){
	var param = 'fmcode='+code;
	var url = './mem_detailview.php?'+param;
	//window.location = wlink;
	//window.location = url;
	if(win!=null) win.close();
	//win = window.open(url,'','fullscreen=yes scrollbars=yes' );
	win = window.open(url,'','' );
}
</script>
<script language="javascript" type="text/javascript">
	
	function sale_status(id){
		if(confirm("ต้องการ Reset Password")){
			window.location='index.php?sessiontab=1&sub=25&state=3&bid='+id;
		}
	}
</script>
<?
require("connectmysql.php");

//$sql="delete from ".$dbprefix."member_allpv where id>0 ";
//mysql_query($sql);

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



/*$sql="SELECT mcode FROM ".$dbprefix."member";
$rss = mysql_query($sql);

for($i=0;$i<@mysql_num_rows($rss);$i++){
	$sqlObj = mysql_fetch_object($rss);
	$n_mcode = $sqlObj->mcode;	
	
	$sql = "select sum(ro_l) as total_pv_l,sum(ro_c) as total_pv_c from ali_bmbonus where  mcode = '$n_mcode' group by mcode";
	$rs = mysql_query($sql);
	$sqlObj11 = mysql_fetch_object($rs);
	$total_pv_l = $sqlObj11->total_pv_l;
	$total_pv_c = $sqlObj11->total_pv_c;

	
	$sql1111="insert into ".$dbprefix."member_allpv (mcode,tot_pv_l,tot_pv_c) values ('$n_mcode','$total_pv_l','$total_pv_c') ";

	//echo $n_mcode.'-'.$all_pv_asaleh.'-'.$all_pv.'</br>';
	if($total_pv_l > 0 or $total_pv_c > 0)mysql_query($sql1111);
 
	 
	
}*/
 
 

if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
//$sql = "SELECT * FROM ".$dbprefix."member ";
//var_dump($_SESSION);


// JOIN เมื่อต้องการข้อมูลวันหมดอายุในโปรแกรม
/*if($_GET['excel']==1){
	$sql = "SELECT ".$dbprefix."member.*,CONCAT(".$dbprefix."member.name_f,' ',".$dbprefix."member.name_t) as name_t ,allpv.tot_pv as tot_pv,ewallet,".$dbprefix."member.id_card";
	$sql .= ",CASE status_doc WHEN '1' THEN 'ครบ' ELSE 'ไม่ครบ' END AS status_doc ";
	$sql .= ",CASE lr WHEN '1' THEN 'ซ้าย' WHEN '2' THEN 'ขวา'  END AS statur_lr ";
	$sql .= ",CASE status_expire WHEN '1' THEN 'เปิด' ELSE 'ปิด' END AS status_expire ";
	$sql .= ",CASE status_terminate WHEN '1' THEN 'เปิด' ELSE 'ปิด' END AS status_terminate1 ";
	$sql .= ",CASE status_ato WHEN '1' THEN 'เปิด' ELSE 'ปิด' END AS status_ato ";
	$sql .= ",CASE status_suspend WHEN '0' THEN CONCAT('ปิด') ";
	$sql .= "ELSE CONCAT('เปิด') END AS status_suspend ";

	$sql .= ",CASE status_blacklist WHEN '0' THEN CONCAT('ปิด') ";
	$sql .= "ELSE CONCAT('เปิด') END AS status_blacklist ";


	$sql .= ",DATE_FORMAT(".$dbprefix."member.mdate, '%d-%m-%Y') as mdate,allpv.tot_pv_l,allpv.tot_pv_c FROM ".$dbprefix."member ";
	$sql .= " LEFT JOIN ".$dbprefix."member_allpv AS allpv ON (".$dbprefix."member.mcode=allpv.mcode) ";

} 
else {
	$sql = "SELECT ".$dbprefix."member.*,CONCAT(".$dbprefix."member.name_f,' ',".$dbprefix."member.name_t) as name_t ,ewallet,".$dbprefix."member.id_card";
	$sql .= ",CASE lr WHEN '1' THEN 'ซ้าย' WHEN '2' THEN 'ขวา'  END AS statur_lr ";
	$sql .= ",DATE_FORMAT(".$dbprefix."member.mdate, '%d-%m-%Y') as mdate, allpv.tot_pv_l,allpv.tot_pv_c FROM ".$dbprefix."member ";
	$sql .= " LEFT JOIN ".$dbprefix."member_allpv AS allpv ON (".$dbprefix."member.mcode=allpv.mcode) ";
	//echo $sql;
	//$sql .= " ORDER  BY ali_member.id";
}*/
	$sql = "select a.pvall,b.mcode,sum(b.ro_l) as total_pv_l,sum(b.ro_c) as total_pv_c,a.name_t,a.id_card,a.mdate,a.pos_cur,a.pos_cur2,a.upa_code";
	$sql .= ",CASE a.lr WHEN '1' THEN 'ซ้าย' WHEN '2' THEN 'ขวา'  END AS statur_lr ,a.sp_code from ".$dbprefix."bmbonus as b ";

	$sql .= "left join ".$dbprefix."member as a on (b.mcode = a.mcode) group by b.mcode";

	//$sql .= "left join ".$dbprefix."apv as a on (b.mcode = a.mcode)  group by b.mcode";
//$sql .= " ORDER  BY ali_member.id ";

//echo $sql;

//echo $sql;
//$wherecause = " WHERE ";

	//$link = mysql_connect('localhost', 'root', '1422528');
	//$charset = "SET NAMES 'tis620'"; 
    //mysql_query($charset) or die('Invalid query: ' . mysql_error()); 
	//mysql_select_db('free_style',$link);
	//$rs = mysql_query("SELECT * FROM usaaba_member");
	if($_GET['state']==1){
		include("member_del.php");
	}else if($_GET['state']==2){
		include("member_editadd.php");
	}else if($_GET['state']==3){
		include("member_reset.php");
	}else if($_GET['state']==4){
		include("member_suspend.php");
	}else if($_GET['state']==5){
		include("member_blacklist.php");
	}else{
		$rec = new repGenerator();
		$rec->setQuery($sql);
	//	$rec->setSort($_GET['srt']==""?"up":$_GET['srt']);
	//	$rec->setOrder($_GET['ord']==""?" b.mcode ":$_GET['ord']);
	$rec->setLimitPage("500");
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=1&sub=25");
		$rec->setBackLink($PHP_SELF,"sessiontab=1");
		if(isset($page))
			$rec->setCurPage($page);
		//$rec->setShowField("mcode,name_t,mdate,exp_date,pos_cur,upa_code,sp_code,ewallet,all_pv");
		//$rec->setFieldDesc("รหัสสมาชิก,ชื่อ,วันที่สมัคร,วันหมดอายุ,ตำแหน่ง,รหัสอัพไลน์,รหัสผู้แนะนำ,กระเป๋าเงิน,คะแนนส่วนตัว");
		//$rec->setShowField("mcode,name_t,id_card,mdate,pos_cur,upa_code,statur_lr,sp_code,status_doc,status_suspend,status_terminate1,ewallet,sv_code");
		$rec->setShowField("mcode,name_t,total_pv_l,total_pv_c,id_card,mdate,pos_cur,pos_cur2,upa_code,statur_lr,sp_code,pvall");
		$rec->setHLight("status_terminate",1,array("#FF7777","#FF9999"),"HIDE");

		$rec->setFieldDesc("รหัสสมาชิก,ชื่อ,คะแนนซ้าย,คะแนนขวา,รหัสประชาชน,วันที่สมัคร,ตำแหน่ง,ตำแหน่งเกรียติยศง,รหัสอัพไลน์,ด้าน,รหัสผู้แนะนำ,pv สะสม");
		//$rec->setShowField("mcode,name_t,mdate,pos_cur,upa_code,sp_code");
		//$rec->setFieldDesc("รหัสสมาชิก,ชื่อ,วันที่สมัคร,ตำแหน่ง,รหัสอัพไลน์,รหัสผู้แนะนำ");
		$rec->setFieldAlign("center,left,right,right,center,center,center,center,center,center,center,right");
		$rec->setFieldSpace("6%,16%,10%,10%,8%,6%,4%,8%,6%,3%,6%,5%");
		$rec->setFieldLink("index.php?sessiontab=1&sub=4&cmc=,");
		$rec->setFieldFloatFormat(",,2,2,,,,,,,,0");
		if($acc->isAccess(4)){
			//$rec->setDel("index.php","id","id","sessiontab=1&sub=2");
			//$rec->setFromDelAttr("maindel","./index.php?sessiontab=1&sub=2&state=1","post","delfield");
		}
		$rec->setSearch($dbprefix."member.mcode,".$dbprefix."member.name_t,".$dbprefix."member.mdate,exp_date,".$dbprefix."member.pos_cur,".$dbprefix."member.upa_code,".$dbprefix."member.sp_code,".$dbprefix."member.id_card,status_doc,status_suspend,status_blacklist,status_ato");
		$rec->setSearchDesc("รหัสสมาชิก,ชื่อ,วันที่สมัคร,วันหมดอายุ,ตำแหน่ง,รหัสอัพไลน์,รหัสผู้แนะนำ,รหัสประชาชน,เอกสาร,suspend,blacklist,Autoship,LB");
		if($acc->isAccess(2))
			//$rec->setEdit("index.php","id","id","sessiontab=1&sub=2");
			
		if($_GET['excel']==1){
			$rec->exportXls("ExportXls","member".date("Ymd").".xls","SH_QUERY");
			$str = "<fieldset><a href='".$rec->download("ExportXls","member".date("Ymd").".xls")."' >";
			$str .= "<img border='0' src='./images/download.gif'>โหลด Excel</a></fieldset>";
			//$rec->getParam();
			$rec->setSpace($str);
		}
		//$rec->setSpecial("./images/search.gif","","view","mcode","IMAGE","ดู");
		$str = "<fieldset><a href='".$rec->getParam()."&excel=1' target='_self'>";
		$str .= "<img border='0' src='./images/excel.gif'>สร้าง Excel</a></fieldset>";
			//$rec->setSpecial("./images/true.gif","","sale_status","id","IMAGE","Reset Password");
	
		$rec->setSpace($str);
		$rec->showRec(1,'SH_QUERY');
		//---------------------------------
	}

?>