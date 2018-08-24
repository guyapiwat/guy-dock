<?
session_start();
?><meta http-equiv="Content-Language" content="th">
<meta http-equiv="Content-Type" content="text/html; charset=tis-620">
<link rel="stylesheet" type="text/css" href="./../style.css" />
<?
require("connectmysql.php");
require("./cls/chartGenerator.php");
include("global.php");
require("adminchecklogin.php");set_time_limit (0);
ini_set("memory_limit","1000M");

//include("dbprefix.php");
//echo $GLOBALS["numofchild"];
	$chart = new chartGenerator();
	$chart->setMaxLevel($GLOBALS["numofleveltoshow"]);
	$chart->setNumChild($GLOBALS["numofchild"]);
	$chart->setLink("./index.php?sessiontab=1&sub=4&cmc=");
	//$chart->setEmptyLink("./index.php?sessiontab=1&sub=910");

	if(isset($_GET['cmc']) && $_GET['cmc']!="") $cmc=$_GET['cmc'];
	else if(isset($_POST['cmc']) && $_GET['cmc']!="") $cmc=$_POST['cmc'];
	if(isset($_GET['chk']) && $_GET['chk']!="") $chk=$_GET['chk'];
	else if(isset($_POST['chk']) && $_GET['chk']!="") $chk=$_POST['chk'];
	if(empty($cmc))$cmc = 'TH0000001';
	
	$chart->setStartCode($cmc);
	//$chart->setLrDef(array(1,$GLOBALS["numofchild"]));
	$chart->setPrefix($dbprefix);
	$chart->setGoLrMost();
	$chart->setLrDef(array(1,2));
	//$chart->setBlock('0000010');
	
	if(!empty($chk) and $chk != '0000000'){
		//var_dump($chk);
		if($chart->isUp($chk,$cmc)){
			echo "<table align='center' bgcolor='#990000'><tr><td><font color='#FFFFFF'>ไม่สามารถดูข้อมูลในระดับสูงกว่าได้</font></td></tr></table>";
			exit;
		}else if(!$chart->isLine($chk,$cmc)){
			echo "<table align='center' bgcolor='#990000'><tr><td><font color='#FFFFFF'>ไม่สามารถดูข้อมูลต่างสายงานได้</font></td></tr></table>";
			exit;
		}
	}
	$rs = mysql_query("SELECT * FROM ".$dbprefix."position ");
	for($i=0;$i<mysql_num_rows($rs);$i++){
		$imgPosDef[mysql_result($rs,$i,'posshort')] = "../backoffice/images/".mysql_result($rs,$i,'posimg');
		$tabUPosDef[mysql_result($rs,$i,'posshort')] = mysql_result($rs,$i,'posutab');
		$tabDPosDef[mysql_result($rs,$i,'posshort')] = mysql_result($rs,$i,'posdtab');
	}
	if($GLOBALS["treeformat"]=="ball"){
		$chart->setPosImgDef($imgPosDef);//array(''=>"./images/balls_02.gif")
		$chart->setNullChild("IMG","./images/balls_11.gif");
		$chart->setPosTxtDef(array(''=>"#000000"),array(''=>"#000000"));
	}else{
		$chart->setPosTabDef($tabUPosDef,$tabDPosDef);
		$chart->setNullChild("COL","#EEEEEE");
		$arrUTxt = array('E'=>"#FFFFFF",'D'=>"#FFFFFF",'P'=>"#FFFFFF",'G'=>"#FFFFFF",''=>"#FFFFFF");
		$arrDTxt = array('E'=>"#000000",'D'=>"#000000",'P'=>"#000000",'G'=>"#000000",''=>"#000000");
		$chart->setPosTxtDef($arrUTxt,$arrDTxt);
	}
	$chart->showChart();
mysql_close($link);

?>