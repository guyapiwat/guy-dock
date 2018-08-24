<?
//var_dump($_POST);
//exit;
require_once("logtext.php");
require_once ("function.log.inc.php");
	if(isset($_POST['delfield'])){
		$postval=$_POST['delfield'];
		$postkey=array_keys($_POST['delfield']);
	}
	// แจ้งว่ามีรายการ ลบข้อมูลสมาชิกใหม่
	echo "<br>รายการสั่งซื้อสินค้า ของเลขบิล :";
	$numpost = sizeof($postkey);
	//echo $numpost;
		for ($i=0;$i<$numpost;$i++) {
		//$sql1 .= " or ".$dbprefix."asaleh.id = '".$postval[$postkey[$i]]."'";
	
		// อ่านข้อมูลเดิมจาก member
		echo $idd = $postval[$postkey[$i]].',';
		/*$sql = "SELECT ".$dbprefix."asaled.sano from ".$dbprefix."asaled where id = '$idd'";
		$rs=mysql_query($sql);
		//echo "SELECT * FROM ".$dbprefix."member WHERE id='".$postval[$postkey[$i]]."' LIMIT 1";
		//echo mysql_num_rows($rs);
		//for ($i=0;$i<=mysql_num_rows($rs);$i++){
			if (mysql_num_rows($rs)>0){
				$row = mysql_fetch_object($rs);
				echo $sano=$row->sano.',';
			}*/
		}
	
	$style_l = "border-left:1 solid #FFFFFF;";
	$style_t = "border-top:1 solid #000000;";
	$style_b = "border-bottom:1 solid #000000;";
	$trcolor = array("#FFFFFF","#EEEEEE");
	?>
	<table width="50%" cellpadding="0" cellspacing="0">
        <tr bgcolor="#999999" align="center">
            <td style="<?=$style_l.$style_t.$style_b?>">รหัสสินค้า</td>
            <td style="<?=$style_l.$style_t.$style_b?>">รายละเอียดสินค้า</td>
            <td style="<?=$style_l.$style_t.$style_b?>">ราคา</td>
            <td style="<?=$style_l.$style_t.$style_b?>">จำนวน</td>
			 <td style="<?=$style_l.$style_t.$style_b?>">เป็นเงิน</td>
        </tr>
	<?
	
	for ($i=0;$i<$numpost;$i++) {
		//$sql1 .= " or ".$dbprefix."asaleh.id = '".$postval[$postkey[$i]]."'";
	
		// อ่านข้อมูลเดิมจาก member
		$idd = $postval[$postkey[$i]];
		//$rs=mysql_query("SELECT * FROM ".$dbprefix."asaleh WHERE id='".$postval[$postkey[$i]]."' LIMIT 1");
		$sql = "SELECT ".$dbprefix."asaled.pcode,".$dbprefix."product.pdesc,".$dbprefix."asaled.price,";
		$sql .= "SUM(".$dbprefix."asaled.qty) AS qty,SUM(amt) AS amt FROM ".$dbprefix."asaled "; 
		$sql .= "LEFT JOIN ".$dbprefix."asaleh ON (".$dbprefix."asaled.sano=".$dbprefix."asaleh.sano) "; 
		$sql .= "LEFT JOIN ".$dbprefix."product ON (".$dbprefix."product.pcode=".$dbprefix."asaled.pcode)  "; 
	
		$sql .= " where ".$dbprefix."asaleh.id = '$idd'";
		//echo $sql;
		$rs=mysql_query($sql);
		//echo "SELECT * FROM ".$dbprefix."member WHERE id='".$postval[$postkey[$i]]."' LIMIT 1";
		//echo mysql_num_rows($rs);
		//for ($i=0;$i<=mysql_num_rows($rs);$i++){
		if (mysql_num_rows($rs)>0){
			$row = mysql_fetch_object($rs);
			$id=$row->id;
			//$rec->setFieldDesc("รหัสสินค้า,รายละเอียดสินค้า,ราคา,จำนวน,เป็นเงิน");
			//$rec->setShowField("pcode,pdesc,price,qty,amt");
			?>
            <tr bgcolor="<?=$trcolor[$i%2]?>">
            	<td style="<?=$style_l?>" align="center"><?=$row->pcode?></td>
            	<td style="<?=$style_l?>" align="center"><?=$row->pdesc?></td>
            	<td style="<?=$style_l?>" align="right"><?=$row->price?></td>
            	<td style="<?=$style_l?>" align="right"><?=$row->qty?></td>
				<td style="<?=$style_l?>" align="right"><?=$row->amt?></td>
            </tr>
            <?
		}
	}
?>

	</table>
	<?
/*if(isset($_POST["fdate"]))
		$fdate = $_POST["fdate"];
	else if(isset($_GET["fdate"]))
		$fdate = $_GET["fdate"];
	if(isset($_POST["tdate"]))
		$tdate = $_POST["tdate"];
	else if(isset($_GET["tdate"]))
		$tdate = $_GET["tdate"];
		
	if($fdate==""){
		$fdate = $tdate;
	}else if($tdate==""){
		$tdate = $fdate;
	}
require("connectmysql.php");
//require("./cls/repGenerator.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
$sql = "SELECT ".$dbprefix."asaled.pcode,".$dbprefix."product.pdesc,".$dbprefix."asaled.price,";
$sql .= "SUM(".$dbprefix."asaled.qty) AS qty,SUM(amt) AS amt FROM ".$dbprefix."asaled "; 
$sql .= "LEFT JOIN ".$dbprefix."asaleh ON (".$dbprefix."asaled.sano=".$dbprefix."asaleh.sano) "; 
$sql .= "LEFT JOIN ".$dbprefix."product ON (".$dbprefix."product.pcode=".$dbprefix."asaled.pcode) "; 
if($fdate!=""){
	$sql .= "WHERE ".$dbprefix."asaleh.sano BETWEEN '$fdate' AND '$tdate' and ".$dbprefix."asaleh.sa_type <> 'I'";
}else{
	$sql .= "WHERE ".$dbprefix."asaleh.sa_type <> 'I'";
}
$sql .= "GROUP BY ".$dbprefix."asaled.pcode";// LEFT JOIN ".$dbprefix."bank ON ".$dbprefix."member.bankcode=".$dbprefix."bank.bankcode";
//echo $sql;
//$wherecause = " WHERE ";

	//$link = mysql_connect('localhost', 'root', '1422528');
	//$charset = "SET NAMES 'tis620'"; 
    //mysql_query($charset) or die('Invalid query: ' . mysql_error()); 
	//mysql_select_db('free_style',$link);
	//$rs = mysql_query("SELECT * FROM usaaba_member");
	//echo $sql;
		//$rec = new sqlAnalizer();
		//echo "<br />";
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']);
		$rec->setOrder($_GET['ord']);
		//$rec->setLimitPage($_GET['lp']);
		$rec->setLimitPage('ALL');
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=3&sub=28&fdate=$fdate&tdate=$tdate");
		$rec->setBackLink($PHP_SELF,"sessiontab=3");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("pcode,pdesc,price,qty,amt");
		$rec->setFieldFloatFormat(",,2,0,2");
		$rec->setFieldDesc("รหัสสินค้า,รายละเอียดสินค้า,ราคา,จำนวน,เป็นเงิน");
		$rec->setFieldAlign("center,left,right,right,right");
		$rec->setFieldSpace("10%,50%,15%,10%,15%");
		//$rec->setFieldLink("index.php?sessiontab=1&sub=4&cmc=,");
		//$rec->setDel("index.php","id","id","sessiontab=1&sub=2");
		//$rec->setFromDelAttr("maindel","./index.php?sessiontab=1&sub=2&state=1","post","delfield");
		$rec->setSum(true,true,",,,true,true");
		//$rec->setSearch("pcode,pdesc,price,qty,amt");
		//$rec->setSearchDesc("รหัสสินค้า,รายละเอียดสินค้า,ราคา,จำนวน,เป็นเงิน");
		//$rec->setEdit("index.php","id","id","sessiontab=1&sub=2");
		$rec->showRec(1,'SH_QUERY');
		//---------------------------------
	//}
*/

?>