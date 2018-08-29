<script language="javascript">
var win
function view(code){
	var param = 'sid='+code;
	var url = './log_detailview.php?'+param;
	//window.location = wlink;
	//window.location = url;
	if(win!=null) win.close();
	//win = window.open(url,'','fullscreen=yes scrollbars=yes' );
	win = window.open(url,'','' );
}
</script>
<script language="javascript" type="text/javascript">
	function sale_print(id){
		var wlink = 'invoice_aprint.php?bid='+id;
		//var wlink = 'http://yourbizasia.tua-lek.com/billprint.aspx?sano='+id;
		window.open(wlink);
	}
	function sale_cancel(id){
		if(confirm("ต้องการยกเลิกบิลนี้")){
			window.location='index.php?sessiontab=3&sub=6&state=3&bid='+id;
		}
	}
</script>
<?
require("connectmysql.php");


/*$sql 	= "SELECT carry_r,mcode  FROM ".$dbprefix."bmbonus  ";
		//echo "$sql <br>";
		$rs = mysql_query($sql);
		for($i=0;$i<mysql_num_rows($rs);$i++){
			$sqlObj = mysql_fetch_object($rs);
			$mcode = $sqlObj->mcode;
			$carry_r = $sqlObj->carry_r;
			 $sqlUpdate = "update ".$dbprefix."bmbonus set carry_c = '$carry_r' where mcode = '$mcode'";
			 //echo "$sqlUpdate <br>";
			 $rsUpdate = mysql_query($sqlUpdate);
		}*/



if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
		$sql = "SELECT a.id as idi ,IFNULL(m.name_t,u.username) as name1,a.sys_id,a.subject ,a.detail ";
		$sql .= ",CASE a.chk_mobile WHEN '1' THEN '<img src=./images/true.gif>' ELSE '' END AS chk_mobile ";
		$sql .= ",CASE a.chk_sp_code WHEN '1' THEN '<img src=./images/true.gif>' ELSE '' END AS chk_sp_code ";
		$sql .= ",CASE a.chk_upa_code WHEN '1' THEN '<img src=./images/true.gif>' ELSE '' END AS chk_upa_code ";
		$sql .= ",CASE a.chk_acc_no WHEN '1' THEN '<img src=./images/true.gif>' ELSE '' END AS chk_acc_no ";
		$sql .= ",CASE a.chk_id_card WHEN '1' THEN '<img src=./images/true.gif>' ELSE '' END AS chk_id_card ";
		$sql.= ",m.name_t,m.mcode,a.logdate,a.ip,a.logtime ";
		$sql .= " FROM ".$dbprefix."log a ";
		$sql .= " LEFT JOIN ".$dbprefix."member m ON a.sys_id=m.mcode   ";
		$sql .= " LEFT JOIN ".$dbprefix."user u ON a.sys_id=u.usercode   ";
		$sql .= " where 1=1 ";
		
		//echo $sql;
//$wherecause = " WHERE ";

	//$link = mysql_connect('localhost', 'root', '1422528');
	//$charset = "SET NAMES 'tis620'"; 
    //mysql_query($charset) or die('Invalid query: ' . mysql_error()); 
	//mysql_select_db('free_style',$link);
	//$rs = mysql_query("SELECT * FROM usaaba_member");
	if($_GET['state']==1){
		include("sale_del.php");
	}else if($_GET['state']==2){
		include("sale_editadd.php");
	}else if($_GET['state']==3){
		include("sale_cancel.php");
	}else{
		echo '<font color="#ff0000"><b>ตัวอย่างการใส่ วันที่ 2010-12-04</b></font>';
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
		$rec->setOrder($_GET['ord']==""?" a.id ":$_GET['ord']);
		$rec->setLimitPage($_GET['lp']);	
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=5&sub=8");
		$rec->setBackLink($PHP_SELF,"sessiontab=5");
		if(isset($page))
			$rec->setCurPage($page);
		//$rec->setShowField("sano,smcode,name_t,preserve,ability,hold,sadate,tot_pv,total");
		$rec->setShowField("sys_id,name1,ip,logdate,logtime,subject,chk_mobile,chk_id_card,chk_sp_code,chk_upa_code,chk_acc_no");
		$rec->setFieldDesc("รหัสผู้ใช้งาน,ชื่อผู้ใช้งาน,ไอพี,วันที่ทำรายการ,เวลา,รายละเอียดดำเนิการ,เบอร์มือถือ,เลขบัตรประชาชน,ผู้แนะนำ,อัพไลน์,เลขบัญชี");
		$rec->setFieldAlign("center,left,center,center,center,left,center,center,center,center");
		$rec->setFieldSpace("7%,10%,10%,7%,7%,25%,7%,7%,7%,7%,7%");//10
		$rec->setSpecial("./images/search.gif","","view","idi","IMAGE","ดูข้อมูลที่แก้ไข");

		//$rec->setFieldLink(",index.php?sessiontab=5&sub=8&cmc=,");
		$rec->setSearch("sys_id,subject,mcode,logdate,logtime");
		$rec->setSearchDesc("รหัสผู้ใช้ระบบ,รายการที่ทำ,รหัสสมาชิก,วันที่,เวลา");
		$rec->setSum(true,false,",,,,,,,,,,");
		$rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");
		$rec->showRec(1,'SH_QUERY');
	}

?>