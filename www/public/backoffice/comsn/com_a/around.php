<script language="javascript" type="text/javascript">
	function sale_status(id){
		if(confirm("Re Confirm?")){
			window.location='index.php?sessiontab=4&sub=2&ftrcode='+id;
		}
	}
		function sale_status1(fdate,tdate){
	//	if(confirm("Re Confirm?")){
			window.location='index.php?sessiontab=4&sub=100&ftrcode='+fdate;
	//	}
	}
	function sale_look(id,calc){
		if(calc == ''){
			alert("�ͺ����ѧ�����ӹǹ���");
		}
		else{
			if(confirm("Re Confirm?")){  
				window.location='commission_pay_rcode.php?id='+id+'&com=a';
			}
		}
    }
</script>
<?

require("connectmysql.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
$sql = "SELECT *,DATE_FORMAT(fdate, '%Y-%m-%d') as fdate,timequery
,DATE_FORMAT(rdate, '%Y-%m-%d') as rdate
,DATE_FORMAT(tdate, '%Y-%m-%d') as tdate
,DATE_FORMAT(fpdate, '%Y-%m-%d') as fpdate
,DATE_FORMAT(tpdate, '%Y-%m-%d') as tpdate
,DATE_FORMAT(paydate, '%Y-%m-%d') as paydate,REPLACE(calc,'1','<img src=./images/true.gif>') AS cal,calc_date,

'<a href=\"index.php?sessiontab=4&sub=100&strfdate=\" target=\"_blank\"></a>' as click
FROM ".$dbprefix."around ";
//$wherecause = " WHERE ";

	if($_GET['state']==1){
		include("around_del.php");
	}else if($_GET['state']==2){
		include("around_editadd.php");
	}else if($_GET['state']==3){
		include("around_auto.php");
	}else{
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
		$rec->setOrder($_GET['ord']==""?" rcode ":$_GET['ord']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=4&sub=1");
		$rec->setBackLink($PHP_SELF,"sessiontab=4");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("rcode,rdate,fdate,tdate,paydate,cal,calc_date,timequery");
		$rec->setFieldDesc("�����ͺ,�ѹ��������ͺ,�ѹ���ӹǹ�������,�ѹ���ӹǳ����ش,�ѹ������,�ӹǳ����,���ҷ�衴�ӹǹ,���ҷ����<br>�Թҷ�");
		$rec->setFieldAlign("center,center,center,center,center,center,center,center,center,center");
	//	$rec->setFieldSpace("5%,10%,15%,15%,15%,15%,8%");
	//	$rec->setFieldLink("index.php?sessiontab=4&sub=1&cmc=,");
		if($acc->isAccess(8)){
		//	$rec->setDel("index.php","rid","rid","sessiontab=4&sub=1");
		//	$rec->setFromDelAttr("maindel","./index.php?sessiontab=4&sub=1&state=1","post","delfield");
		}
		$rec->setSpecial("Calculate","","sale_status","rcode","","Calculate");
		$rec->setSpecial("��§ҹ","","sale_status1","rcode","","��§ҹ");
		//$rec->setSpecial("./images/hold_s.gif","","sale_look","rid,calc","IMAGE","����");
		if($acc->isAccess(2))
			$rec->setEdit("index.php","rid","rid","sessiontab=4&sub=1");
		$rec->showRec(1,'SH_QUERY');
		//---------------------------------
		$rec = new repGenerator();
		$sql = "SELECT * FROM ".$dbprefix."around";
		$rec->setQuery($sql);
		//echo $rec->getSql();
	}

?>