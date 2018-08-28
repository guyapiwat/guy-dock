<script language="javascript" type="text/javascript">
	function sale_print(id){
		var wlink = 'invoice_aprinthqq.php?bid='+id;
		//var wlink = 'http://yourbizasia.tua-lek.com/billprint.aspx?sano='+id;
		window.open(wlink);
	}
	function sale_cancel(id,send,sender,receive,cancel){
		if(cancel == '0'){
			if(receive == '0'){
				if(confirm("ต้องการยกเลิกบิลนี้")){
					window.location='index.php?sessiontab=6&sub=2323&state=3&bid='+id;
				}
			}
			else{
				alert("บิลนี้รับของไปแล้ว ไม่สามารถยกเลิกได้ค่ะ");
			}
		}
		else{
			alert("บิลนี้ยกเลิกไปแล้วค่ะ");
		}
	}
	function sale_change(id,send,sender,receive,cancel){
		if(cancel == '0'){
			if(receive == '0'){
				if(confirm("ต้องการ รับของ บิลนี้")){
					window.location='index.php?sessiontab=6&sub=2323&state=4&bid='+id;
				}
			}
			else{
				alert("บิลนี้รับของไปแล้วค่ะ");
			}
		}
		else{
			alert("บิลนี้ยกเลิกไปแล้วค่ะ");
		}
	}
</script>
<?
require("connectmysql.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
$sql = "SELECT h.cancel,h.id,h.inv_code,h.total+h.tot_pv/100 as alltotal,h.sano,h.sadate,h.tot_pv,h.tot_bv,h.tot_fv,h.total,m.inv_desc as name_t,h.mcode AS smcode,h.txtoption,h.receive as receive22,h.sender,h.send ";

//$sql .= ",CASE sender WHEN '0' THEN 'รอจัดส่ง'  WHEN '1' THEN 'รอรับของ' END as  receive ";
//$sql .= ",IF(h.sender=0 and h.receive = 0,'รอจัดส่ง','รอรับของ') AS receive  ";
$sql .= ",CASE 
 WHEN h.sender = 0 and h.receive = 0 THEN concat('<font color = red >','รอรับของ','</font>')
 WHEN h.sender = 1 and h.receive = 0 THEN 'รอรับของ'
 WHEN h.sender = 1 and h.receive = 1 THEN 'รับของแล้ว'
 WHEN h.sender = 0 and h.receive = 1 THEN 'รับของแล้ว'

 ELSE ''
 END as receive ";
 $sql.=",CASE h.receive_date WHEN '' THEN '<img src=./images/false.gif>' ELSE h.receive_date END AS receive_date";
//$sql .= "ELSE CONCAT('<a href=\"index.php?sessiontab=".$_GET['sessiontab']."&sub=".$_GET['sub']."&state=5&aid=',id,'&mcode=',mcode,'&id=\"><img src=\"./images/true.gif\"></a>') END AS receive ";


$sql .= " FROM ".$dbprefix."tsaleh  h ";
$sql .= "LEFT JOIN ".$dbprefix."invent m ON (h.inv_code=m.inv_code)  "; //WHERE smcode='".$_SESSION['usercode']."' 
$sql .= "where h.sa_type = 'HO'"; //WHERE smcode='".$_SESSION['usercode']."' 
//$sql .= " order by h.sadate DESC "; //WHERE smcode='".$_SESSION['usercode']."' 

///$wherecause = " WHERE ";
//echo $sql;
	//$link = mysql_connect('localhost', 'root', '1422528');
	//$charset = "SET NAMES 'tis620'"; 
    //mysql_query($charset) or die('Invalid query: ' . mysql_error()); 
	//mysql_select_db('free_style',$link);
	//$rs = mysql_query("SELECT * FROM usaaba_member");
	if($_GET['state']==1){
		include("transferhq_del.php");
	}else if($_GET['state']==2){
		include("transferhq_editadd.php");
	}else if($_GET['state']==3){
		include("transferhq_cancel.php");
	}else if($_GET['state']==4){
		include("transferhq_change.php");
	}else if($_GET['state']==5){		
	}else{
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
		$rec->setOrder($_GET['ord']==""?" sadate ":$_GET['ord']);
		$rec->setLimitPage($_GET['lp']);	
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=6&sub=2323");
		$rec->setBackLink($PHP_SELF,"sessiontab=5");
		if(isset($page))
			$rec->setCurPage($page);
		//$rec->setShowField("sano,smcode,name_t,preserve,ability,hold,sadate,tot_pv,total");
		$rec->setShowField("sadate,receive_date,receive,sano,inv_code,name_t,tot_pv,alltotal,total,txtoption");
		$rec->setFieldFloatFormat(",,,,,,2,2,2");
		//$rec->setFieldDesc("เลขบิล,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,รักษายอด,ทำคุณสมบัติ,holdยอด,วันที่ซื้อ,จำนวนรวม  PV,จำนวนเงินรวม");
		$rec->setFieldDesc("".$wording_lan["Date"].",วันที่รับ,รับของ,".$wording_lan["sano"].",".$wording_lan["inv_code"].",".$wording_lan["inv_name"].",".$wording_lan["totalpv"].",".$wording_lan["totalmoney"].",".$wording_lan["Amount"].",หมายเหตุ");
		$rec->setFieldAlign("center,center,center,left,center,left,right,right,right,left,right");
		$rec->setFieldSpace("7%,7%,5%,10%,5%,10%,10%,10%,10%,40%");
		//$rec->setFieldLink(",index.php?sessiontab=1&sub=4&cmc=,");
		$rec->setSearch("sano,".$dbprefix."tsaleh.mcode,name_t,sadate,tot_pv,total");
		$rec->setSearchDesc("".$wording_lan["sano"].",".$wording_lan["mcode"].",".$wording_lan["name"].",".$wording_lan["Date"].",".$wording_lan["totalpv"].",".$wording_lan["totalmoney"]."");
		$rec->setSum(true,false,",,,,,,true,true,true");
		$rec->setSpecial("./images/Amber-Printer.gif","","sale_print","id","IMAGE","พิมพ์");
		$rec->setSpecial("./images/cancel.gif","","sale_cancel","id,send,sender,receive22,cancel","IMAGE","ยกเลิก");
		$rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");
		// $rec->setHLight("receive22",1,array("#B5E61D","#C1FF00"),"HIDE");
		//if($acc->isAccess(4)){
		//	$rec->setDel("index.php","id","id","sessiontab=6&sub=2323");
		//	$rec->setFromDelAttr("maindel","./index.php?sessiontab=6&sub=2323&state=1","post","delfield");
		//}
		//if($acc->isAccess(2))
		//	$rec->setEdit("index.php","id","id","sessiontab=6&sub=2323");
	    $rec->setSpecial("./images/true.gif","","sale_change","id,send,sender,receive22,cancel","IMAGE","รับของ");
		$rec->showRec(1,'SH_QUERY');
/*$sql = "SELECT cancel,".$dbprefix."tsaleh.id,sano,sadate,tot_pv,total,name_t,".$dbprefix."tsaleh.mcode AS smcode";
$sql .= ",CASE sa_type WHEN 'Q' THEN '1' ELSE '' END AS preserve ";
$sql .= ",CASE sa_type WHEN 'A' THEN '1' ELSE '' END AS ability ";
$sql .= ",CASE sa_type WHEN 'H' THEN '1' ELSE '' END AS hold ";
$sql .= "FROM ".$dbprefix."tsaleh ";
$sql .= "LEFT JOIN ".$dbprefix."member ON (".$dbprefix."tsaleh.mcode=".$dbprefix."member.mcode) "; //WHERE smcode='".$_SESSION['usercode']."' 
		$rec->setQuery($sql);*/
	}

?>