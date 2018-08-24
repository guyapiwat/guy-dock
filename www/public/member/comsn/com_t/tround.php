<script language="javascript">
var win
function view(strfdate,strtdate){
	var param = 'strfdate='+strfdate+'&strtdate='+strtdate;
	var url = './index.php?sessiontab=5&sub=111&'+param;
	//window.location = wlink;
	//window.location = url;
	if(win!=null) win.close();
	win = window.open(url,'','fullscreen=yes scrollbars=yes' );
}
</script>

<?
require("connectmysql.php");
require("./cls/repGenerator.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
$sql = "SELECT *,REPLACE(calc,'1','<img src=./images/true.gif>') AS cal FROM ".$dbprefix."promotion ";
//echo $sql;
//$wherecause = " WHERE ";

	if($_GET['state']==1){
		include("tround_del.php");
	}else if($_GET['state']==2){
		include("tround_editadd.php");
	}else{
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
		$rec->setOrder($_GET['ord']==""?" rcode ":$_GET['ord']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=4&sub=29");
		$rec->setBackLink($PHP_SELF,"sessiontab=4");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("rcode,rdate,fdate,tdate,name");
		$rec->setFieldDesc("".$wording_lan["rcode"].",".$wording_lan["sdate"].",".$wording_lan["fdate"].",".$wording_lan["tdate"].",".$wording_lan["promotion"]."");
		$rec->setFieldAlign("center,center,center,center,left");
		$rec->setFieldSpace("10%,15%,15%,15%,45%");
		$rec->setFieldLink("index.php?sessiontab=4&sub=44&cmc=,");
		/*if($acc->isAccess(4)){
			$rec->setDel("index.php","rid","rid","sessiontab=4&sub=44");
			$rec->setFromDelAttr("maindel","./index.php?sessiontab=4&sub=44&state=1","post","delfield");
		}*/
		//if($acc->isAccess(2))
		//	$rec->setEdit("index.php","rid","rid","sessiontab=4&sub=44");
		$rec->setSpecial("./images/search.gif","","view","fdate,tdate","IMAGE","´Ù");
		$rec->showRec(1,'SH_QUERY');
		//---------------------------------
		$rec = new repGenerator();
		//$sql = "SELECT * FROM ".$dbprefix."promotion";
		$rec->setQuery($sql);
		//echo $rec->getSql();
	}

?>