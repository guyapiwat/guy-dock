<script language="javascript" type="text/javascript">
	function sale_print(id){
		var wlink = 'invoice_aprinthqq.php?bid='+id;
		//var wlink = 'http://yourbizasia.tua-lek.com/billprint.aspx?sano='+id;
		window.open(wlink);
	}
	function sale_cancel(id){
		if(confirm("��ͧ���¡��ԡ��Ź��")){
			window.location='index.php?sessiontab=5&sub=23&state=3&bid='+id;
		}
	}
</script>
<?
require("connectmysql.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
$sql = "SELECT h.cancel,h.id,h.inv_code,h.total+h.tot_pv/100 as alltotal,h.sano,h.sadate,h.tot_pv,h.tot_bv,h.tot_fv,h.total,m.inv_desc as name_t,h.mcode AS smcode,h.txtoption,h.receive as receive22 ";

//$sql .= ",CASE sender WHEN '0' THEN '�ͨѴ��'  WHEN '1' THEN '���Ѻ�ͧ' END as  receive ";
//$sql .= ",IF(h.sender=0 and h.receive = 0,'�ͨѴ��','���Ѻ�ͧ') AS receive  ";
$sql .= ",CASE 
 WHEN h.sender = 0 and h.receive = 0 THEN concat('<font color = red >','���Ѻ�ͧ','</font>')
 WHEN h.sender = 1 and h.receive = 0 THEN '���Ѻ�ͧ'
 WHEN h.sender = 1 and h.receive = 1 THEN '�Ѻ�ͧ����'
 WHEN h.sender = 0 and h.receive = 1 THEN '�Ѻ�ͧ����'

 ELSE ''
 END as receive ";
  $sql.=",CASE h.receive_date WHEN '' THEN '<img src=./images/false.gif>' ELSE h.receive_date END AS receive_date";
//$sql .= "ELSE CONCAT('<a href=\"index.php?sessiontab=".$_GET['sessiontab']."&sub=".$_GET['sub']."&state=5&aid=',id,'&mcode=',mcode,'&id=\"><img src=\"./images/true.gif\"></a>') END AS receive ";


$sql .= " FROM ".$dbprefix."tsaleh  h ";
$sql .= "LEFT JOIN ".$dbprefix."invent m ON (h.inv_code=m.inv_code)  "; //WHERE smcode='".$_SESSION['usercode']."' 
$sql .= "where h.sa_type = 'HO'  and   h.inv_code = '{$_SESSION["admininvent"]}'   "; //WHERE smcode='".$_SESSION['usercode']."' 
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
		include("schange_held.php");//receive
	}else if($_GET['state']==5){		
	}else{
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']==""?"DOWN":$_GET['srt']);
		$rec->setOrder($_GET['ord']==""?" receive22 ":$_GET['ord']);
		$rec->setLimitPage($_GET['lp']);	
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=5&sub=23");
		$rec->setBackLink($PHP_SELF,"sessiontab=5");
		if(isset($page))
			$rec->setCurPage($page);
		//$rec->setShowField("sano,smcode,name_t,preserve,ability,hold,sadate,tot_pv,total");
		$rec->setShowField("sadate,receive_date,receive,sano,inv_code,name_t,tot_pv,alltotal,total,txtoption");
		$rec->setFieldFloatFormat(",,,,,,2,2,2");
		//$rec->setFieldDesc("�Ţ���,���ʼ�����,���ͼ�����,�ѡ���ʹ,�Ӥس���ѵ�,hold�ʹ,�ѹ������,�ӹǹ���  PV,�ӹǹ�Թ���");
		$rec->setFieldDesc("".$wording_lan["Date"].",�ѹ����Ѻ,�Ѻ�ͧ,".$wording_lan["sano"].",".$wording_lan["inv_code"].",".$wording_lan["inv_name"].",".$wording_lan["totalpv"].",".$wording_lan["totalmoney"].",".$wording_lan["Amount"].",�����˵�");
		$rec->setFieldAlign("center,center,center,left,center,left,right,right,right,left,right");
		$rec->setFieldSpace("7%,7%,5%,10%,5%,10%,10%,10%,10%,40%");
		//$rec->setFieldLink(",index.php?sessiontab=1&sub=4&cmc=,");
		$rec->setSearch("sano,".$dbprefix."tsaleh.mcode,name_t,sadate,tot_pv,total");
		$rec->setSearchDesc("".$wording_lan["sano"].",".$wording_lan["mcode"].",".$wording_lan["name"].",".$wording_lan["Date"].",".$wording_lan["totalpv"].",".$wording_lan["totalmoney"]."");
		$rec->setSum(true,false,",,,,,,true,true,true");
		$rec->setSpecial("./images/Amber-Printer.gif","","sale_print","id","IMAGE","�����");
		//$rec->setSpecial("./images/cancel.gif","","sale_cancel","id","IMAGE","¡��ԡ");
		 $rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");
		// $rec->setHLight("receive22",1,array("#B5E61D","#C1FF00"),"HIDE");
		//if($acc->isAccess(4)){
		//	$rec->setDel("index.php","id","id","sessiontab=5&sub=23");
		//	$rec->setFromDelAttr("maindel","./index.php?sessiontab=5&sub=23&state=1","post","delfield");
		//}
		//if($acc->isAccess(2))
		//	$rec->setEdit("index.php","id","id","sessiontab=5&sub=23");
	  //	$rec->setSpecial("./images/true.gif","","sale_receive","id","IMAGE","�Ѻ�ͧ");
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