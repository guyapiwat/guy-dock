<? 
session_start();    
include("global.php");
?>    
<script language="javascript" type="text/javascript">
	function tranfer(id){
	  if(confirm("ต้องการ โอน Ecommission เข้า Ewallet")){
		window.location='index.php?sessiontab=3&sub=112&bid='+id;
	  }
	}
</script>     
<?
if($_SESSION["lan"] != $_GET["lan"] and !empty($_GET["lan"])){
    if(empty($_GET["lan"]))$_SESSION["lan"] = "TH";
    else $_SESSION["lan"] = $_GET["lan"];
}else{
    if(empty($_SESSION["lan"]))$_SESSION["lan"] = "TH";
}
include_once("wording".$_SESSION["lan"].".php"); 
include("connectmysql.php");
include("./cls/repGenerator.php");
include("prefix.php");
$fdate=$_SESSION['fdate'];
$tdate=$_SESSION['tdate'];
?>

                                                                                                    
<?
   
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
 
$sql = "SELECT cancel,e.id,e.uid as uid,sano,txtCash,txtFuture,txtTransfer,total,txtWithdraw,txtCommission,txtTransfer_in,txtTransfer_out,txtCredit1+txtCredit2+txtCredit3 as txtCredit,
CASE checkportal WHEN '1' THEN 'HQ' WHEN '2' THEN 'Branch' WHEN '3' THEN 'ONLINE' END AS checkportal,sadate,txtMoney ,concat(m.name_f,' ',m.name_t) as name_t ";
$sql .= ",CASE e.mcode WHEN '' THEN e.inv_code  ELSE e.mcode END AS smcode ";
$sql .= " FROM ".$dbprefix."ecommision e ";
$sql .= "LEFT JOIN ".$dbprefix."member m ON (e.mcode=m.mcode) "; 
$sql .= "LEFT JOIN ".$dbprefix."invent i ON (e.inv_code=i.inv_code) where e.mcode = '".$_SESSION["usercode"]."' and cancel = 0 and status_tranfer=0 and cmbonus=0"; 
if($fdate !="" and $tdate !="")$sql.=" and sadate BETWEEN '$fdate' and '$tdate'";
echo '<br>'; 
echo "รายงานเงินเข้า Ecommission ";
$rs=mysql_query($sql);
if(mysql_num_rows($rs)>0){
	echo "<button class='btn1' onclick='tranfer(\"ALL\")' style='width: 150px;margin-bottom: 10px;' >โอนเข้า Ewallet ทั้งหมด</button>";
}
$rec = new repGenerator();
$rec->setQuery($sql);
$rec->setLimitPage($_GET['lp']);    
$rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
$rec->setOrder($_GET['ord']==""?" e.id ":$_GET['ord']);
if(isset($_POST['skey']))
	$rec->setCause($_POST['skey'],$_POST['scause']);
else if(isset($_GET['skey']))
	$rec->setCause($_GET['skey'],$_GET['scause']);
$rec->setSize("95%","");
$rec->setAlign("center");
$rec->setPageLinkAlign("right");           
$rec->setLink($PHP_SELF,"sessiontab=4&sub=23");
$rec->setBackLink($PHP_SELF,"sessiontab=4");
if(isset($page))
	$rec->setCurPage($page);                                                             
$rec->setShowField("sadate,sano,smcode,name_t,total");
$rec->setFieldFloatFormat(",,,,2,,,,");  
$rec->setFieldDesc($wording_lan["tab4"]["7_1"].",".$wording_lan["tab4"]["7_2"].",".$wording_lan["tab4"]["7_3"].",".$wording_lan["tab4"]["7_4"].",".$wording_lan["tab4"]["7_5"]."");
$rec->setFieldAlign("center,center,center,left,right,center");
$rec->setFieldSpace("15%,20%,10%,30%,15%");           
$rec->setSum(true,false,",,,,true,,");
//$rec->setSpecial("./images/search.gif","","view","id","IMAGE","ดู");
$rec->setSpecial("โอนเข้า Ewallet","","tranfer","id","TEXT","");
$rec->showRec(1,'SH_QUERY');  

?>