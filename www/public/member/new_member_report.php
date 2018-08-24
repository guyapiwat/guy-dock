<script language="javascript" type="text/javascript">
	function view(code){
		var wlink = './mem_detailview.php?code='+code;
		window.open(wlink);
	}
	function Edit(id,sa){
		var wlink = './index.php?sessiontab=1&sub=3&bid='+id;
		window.location.href = wlink;
	}	
</script>
<?
$cmc = $_SESSION['usercode'];
require("connectmysql.php");
require("./cls/repGenerator.php");

if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
$sql = "SELECT * ";
$sql .= "FROM ".$dbprefix."member_tmp ";
//$sql .= "LEFT JOIN ".$dbprefix."member ON (".$dbprefix."asaleh.mcode=".$dbprefix."member.mcode) ";
$sql .= " where uid = '$cmc' "; //WHERE 

$sql="SELECT mdate,name_f,name_t,mobile,id_card FROM `ali_member`  WHERE lr='' AND sp_code='".$_SESSION["usercode"]."'";
$rec = new repGenerator();
$rec->setQuery($sql);
$rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
$rec->setOrder($_GET['ord']==""?" id ":$_GET['ord']);

if(isset($_POST['skey']))$rec->setCause($_POST['skey'],$_POST['scause']);
else if(isset($_GET['skey']))$rec->setCause($_GET['skey'],$_GET['scause']);

$rec->setSize("95%","");
$rec->setAlign("center");
$rec->setPageLinkAlign("right");
$rec->setLink($PHP_SELF,"sessiontab=4&sub=1");
$rec->setBackLink($PHP_SELF,"sessiontab=4");
if(isset($page))$rec->setCurPage($page);

$rec->setShowField("mdate,name_t,mobile,id_card");
$rec->setFieldDesc($wording_lan["startdate"].",".$wording_lan["name"].",".$wording_lan["mobile"].",".$wording_lan["id_card"]."");
$rec->setFieldAlign("center,left,center,center");
$rec->setSpecial("./images/editlink.gif","","Edit","id","IMAGE","Register");
$rec->showRec(1,'SH_QUERY');
?>
