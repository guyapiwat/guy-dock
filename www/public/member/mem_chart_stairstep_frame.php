<? session_start();?>
<meta http-equiv="Content-Language" content="th">
<meta http-equiv="Content-Type" content="text/html; charset=tis-620">
<link rel="stylesheet" type="text/css" href="./../style.css" />
<?
require("connectmysql.php");
require("./cls/unlimitChartGenerator.php");
include("global.php");
include_once("wording".$_SESSION["lan"].".php");
//set_time_limit (0);
set_time_limit (0);
ini_set("memory_limit","1000M");

//include("dbprefix.php");
//echo $GLOBALS["numofchild"];
	$maxlvlimit=$GLOBALS["numofleveltoshow"];
	$chart = new chartGenerator();
	$chart->setMaxLevel($maxlvlimit);
	//$chart->setNumChild($GLOBALS["numofchild"]);
	$chart->setLink("./index.php?sessiontab=2&sub=2&cmc=");
	//$chart->setEmptyLink("./index.php?sessiontab=1&sub=2&state=2&");
	if(isset($_GET['cmc']) && $_GET['cmc']!="") $cmc=$_GET['cmc'];
	else if(isset($_POST['cmc']) && $_GET['cmc']!="") $cmc=$_POST['cmc'];
	if($cmc=="")
		$cmc = $GLOBALS["defmcode"];
	$chart->setStartCode($cmc);
	$chart->setPrefix($dbprefix);
	$chart->setBlock($_SESSION['usercode']);
	if($chart->isUp($cmc,$_SESSION['usercode'])){
		echo "<table align='center' bgcolor='#990000'><tr><td><font color='#FFFFFF'>".$wording_lan["tab2_1_3"]."</font></td></tr></table>";
		exit;
	}else if(!$chart->isLine($cmc,$_SESSION['usercode'])){
		echo "<table align='center' bgcolor='#990000'><tr><td><font color='#FFFFFF'>".$wording_lan["tab2_1_2"]."</font></td></tr></table>";
		exit;
	}
	$rs = mysql_query("SELECT * FROM ".$dbprefix."position ");
	for($i=0;$i<mysql_num_rows($rs);$i++){
		$imgPosDef[mysql_result($rs,$i,'posshort')] = "./images/".mysql_result($rs,$i,'posimg');
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