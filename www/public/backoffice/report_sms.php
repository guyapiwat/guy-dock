<script language="javascript">
var win
function view(code){
	var param = 'fmcode='+code;
	var url = './mem_detailview.php?'+param;
	//window.location = wlink;
	//window.location = url;
	if(win!=null) win.close();
	win = window.open(url,'','fullscreen=yes scrollbars=yes' );
}
function confirm_approve(id){
	if(confirm("�չ�ѹ�������¹�ŧ")){
		window.location='index.php?sessiontab=1&sub=2&state=3&cmc='+id;
	}
}
</script>

<?
require("connectmysql.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
//$sql = "SELECT * FROM ".$dbprefix."member ";
// JOIN ����͵�ͧ��â������ѹ�������������
$sql = "SELECT mobile,mobile_desc,DATE_FORMAT(mobile_date, '%d-%m-%Y %H:%I:%S') as mobile_date ,mobile_status from ".$dbprefix."sms  ";
//echo $sql;
//echo $sql;

//echo $sql;
//$wherecause = " WHERE ";

	//$link = mysql_connect('localhost', 'root', '1422528');
	//$charset = "SET NAMES 'tis620'"; 
    //mysql_query($charset) or die('Invalid query: ' . mysql_error()); 
	//mysql_select_db('free_style',$link);
	//$rs = mysql_query("SELECT * FROM usaaba_member");
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
		$rec->setOrder($_GET['ord']==""?" id ":$_GET['ord']);
		$rec->setLimitPage($_GET['lp']);
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=1&sub=19");
		$rec->setBackLink($PHP_SELF,"sessiontab=1");
		if(isset($page))
			$rec->setCurPage($page);
		//$rec->setShowField("mcode,name_t,mdate,exp_date,pos_cur,upa_code,sp_code,ewallet,all_pv");
		//$rec->setFieldDesc("������Ҫԡ,����,�ѹ�����Ѥ�,�ѹ�������,���˹�,�����Ѿ�Ź�,���ʼ���й�,�������Թ,��ṹ��ǹ���");
		$rec->setShowField("mobile,mobile_desc,mobile_date,mobile_status");
		$rec->setFieldDesc("�������Ѿ��,��������´,�ѹ�����SMS,ʶҹ�");
		//$rec->setShowField("mcode,name_t,mdate,pos_cur,upa_code,sp_code");
		//$rec->setFieldDesc("������Ҫԡ,����,�ѹ�����Ѥ�,���˹�,�����Ѿ�Ź�,���ʼ���й�");
		$rec->setFieldAlign("center,left,center,center,center,center,center,center");
		$rec->setFieldSpace("10%,60%,20%,10%");
		//$rec->setFieldLink("index.php?sessiontab=1&sub=4&cmc=,");
		$rec->setFieldFloatFormat(",,,,,,,,,");
		$rec->setSearch("mobile,status");
		$rec->setSearchDesc("������Ҫԡ,ʶҹС����sms");
		$rec->setHLight("mobile_status",Fail,array("#FF7777","#FF9999"),"HIDE");
		$rec->setHLight("mobile_status",Fail,array("#FF0000","#FF9999"),"HIDE");

		//$rec->setSpecial("./images/search.gif","","view","mcode","IMAGE","��");
		
		
		//$rec->setSpace($str);
		$rec->showRec(1,'SH_QUERY');
		//---------------------------------

?>