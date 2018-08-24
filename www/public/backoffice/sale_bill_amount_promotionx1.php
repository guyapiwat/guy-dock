<script language="javascript" type="text/javascript">
	function sale_print(id){
		var wlink = 'invoice_aprint.php?bid='+id;
		window.open(wlink);
	}
</script>
<?
mysql_query("TRUNCATE TABLE ".$dbprefix."report_promotion");
mysql_query("TRUNCATE TABLE ".$dbprefix."report_promotion1");
//require("./cls/sqlAnalizer.php");


if($fdate!=""){
	$sqlwhere .= " and sadate BETWEEN '$fdate' AND '$tdate' ";
}
if($satype !=""){
	$sqlwhere .= " and  sa_type = '$satype' ";
}




if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
$sql = "select sum(tot_pv) as tot_pv,mcode,name_t from (
select sum(tot_pv) as tot_pv,mcode,name_t from ".$dbprefix."asaleh where cancel = 0 $sqlwhere and sa_type = 'A' group by mcode

union all

select sum(tot_pv) as tot_pv,mcode,name_t from ".$dbprefix."holdhead where cancel = 0 $sqlwhere and sa_type = 'A' group by mcode

) 
as a where 1=1 group by mcode
 ";
$rs = mysql_query($sql);
for($j=0;$j<mysql_num_rows($rs);$j++){
	$sqlObj = mysql_fetch_object($rs);
	$tot_pv = $sqlObj->tot_pv;
	$xmcode = $sqlObj->mcode;
	$xname_t = $sqlObj->name_t;
	$sqlc 	= "SELECT  m1.mcode,m1.pos_cur2,m1.pos_cur,m1.name_t  FROM ".$dbprefix."member as m1 left join ".$dbprefix."member as m2 on (m1.mcode = m2.sp_code) where m2.mcode = '$xmcode'  ";
	//and m1.pos_cur2 <> '' and m1.pos_cur2 <> 'MB'  and m1.pos_cur2 <> 'NM'
	
	$rs1 = mysql_query($sqlc);
	for($i=0;$i<mysql_num_rows($rs1);$i++){
		$sqlObjx = mysql_fetch_object($rs1);
		$nmcode = $sqlObjx->mcode;
		$pos_cur2 = $sqlObjx->pos_cur2;
		$pos_cur = $sqlObjx->pos_cur;
		$nsp_name = $sqlObjx->name_t;
			//echo "insert into ".$dbprefix."report_promotion (mcode,name_t,sp_code,sp_name,pos_cur,pos_cur2,fdate,tdate,tot_pv) values('$xmcode','$name_t','$nmcode','$nsp_name','$pos_cur','$pos_cur2','$fdate','$tdate','$tot_pv') ";
		//	exit;
			mysql_query("insert into ".$dbprefix."report_promotion (mcode,name_t,sp_code,sp_name,pos_cur,pos_cur2,fdate,tdate,tot_pv) values('$xmcode','$name_t','$nmcode','$nsp_name','$pos_cur','$pos_cur2','$fdate','$tdate','$tot_pv') ");
			
		}
		
	}
	
$sql = " insert into ".$dbprefix."report_promotion1  (sp_code,sp_name,pos_cur,pos_cur2,fdate,tdate,tot_pv) ";
$sql .= "	select sp_code,sp_name,pos_cur,pos_cur2,fdate,tdate,sum(tot_pv) from ".$dbprefix."report_promotion where 1=1 group by sp_code ";
mysql_query($sql);


$sql = "select * from ".$dbprefix."report_promotion1 where 1=1 ";

if(!empty($strpv))$sql .= " and tot_pv $strpv ";
if(!empty($sp_pos))$sql .= " and pos_cur2 = '$sp_pos' ";
//if(!empty($strtotal))$sql .= " and tot_pv $strpv ";

//echo $sql;
//echo $sql;
	if($_GET['state']==1){
		include("sale_del.php");
	}else if($_GET['state']==2){
		include("sale_editadd.php");
	}else if($_GET['state']==3){
		include("sale_cancel.php");
	}else if($_GET['state']==4){
		include("product_sale_bill.php");
	}
	else if($_GET['state']==5){
		include("sale_editaddh.php");
	}
	else if($_GET['state']==6){
		include("change_held.php");
	}
	else{
		//echo $sql;
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
		$rec->setOrder($_GET['ord']==""?" id ":$_GET['ord']);
		$rec->setLimitPage("5000");	
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		$rec->setSize("99%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=3&sub=1777&fdate=$fdate&tdate=$tdate&satype=$satype&logistic=$logistic&strpv=$strpv&strtotal=$strtotal&struid=$struid&sspv=$sspv&inv_code=$inv_code&sp_pos=$sp_pos&strSearch=$strSearch&strtype=$strtype&sregister=$sregister&locationbase=$locationbase&vip=$vip&bank_pay=$bank_pay");
		$rec->setBackLink($PHP_SELF,"sessiontab=3");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("fdate,tdate,sp_code,sp_name,pos_cur,pos_cur2,tot_pv");
		$rec->setFieldDesc("เริ่มต้นวันที่,สิ้นสุดวันที่,รหัสสมาชิก,ชื่อสมาชิก,ตำแห่ง,เกรียติยศ,คะแนนชั้นลูก");
		$rec->setFieldFloatFormat(",,,,,,0");
		$rec->setFieldAlign("center,center,center,left,center,center,right");
		$rec->setFieldSpace("6%,6%,8%,55%,8%,8%,8%");
		$rec->setFieldLink(",");
		//$rec->setSearch("sano,hono,sadate,smcode,inv_code,tot_pv");
		//$rec->setSearchDesc("เลขบิล,เลขบิลแจง,วันที่,รหัสผู้ซื้อ,ผู้บันทึก,จำนวน PV");
		$rec->setSum(true,false,",,,,,,true");
		$rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");
		if($_GET['excel']==1){
			$rec->exportXls("ExportXls","sale_bill_promotion".date("Ymd").".xls","SH_QUERY");
			$str = "<fieldset><a href='".$rec->download("ExportXls","sale_bill_promotion".date("Ymd").".xls")."' >";
			$str .= "<img border='0' src='./images/download.gif'>โหลด Excel</a></fieldset>";
			//$rec->getParam();
			$rec->setSpace($str);
		}
		//$rec->setSpecial("./images/search.gif","","view","mcode","IMAGE","");
		$str = "<fieldset ><a href='".$rec->getParam()."&excel=1' target='_self'>";
		$str .= "<img border='0' src='./images/excel.gif'>สร้าง Excel</a></fieldset>";
		$rec->setSpace($str);
		$rec->showRec(1,'SH_QUERY');
	}


?>