
<? include("connectmysql.php");?>
<? include("prefix.php");?>
<? include("global.php");?>
<?
mysql_query("TRUNCATE TABLE ".$dbprefix."sponsor");
$sql1 = "select * from ".$dbprefix."member  ";
$result = mysql_query($sql1);
///echo $sql1;
if (mysql_num_rows($result)>0) {
	$sql99 = " insert ".$dbprefix."sponsor (`mcode`,`sponsor`) VALUES ";
		for($i=0;$i<mysql_num_rows($result);$i++){
			$row = mysql_fetch_object($result);
			$mcode=$row->mcode;
			$oid=$row->id;
			$sql = "SELECT count(*) AS num FROM ".$dbprefix."member WHERE sp_code='$mcode' and mdate >= '2013-01-01' and mdate <= '2014-01-04' ";
			$rs = mysql_query($sql);
			$numsp = mysql_result($rs,0,'num'); 
			mysql_free_result($rs);
			if($numsp>0){$sql99.= "('$mcode',$numsp),"; }
		}

	$rest = substr($sql99, 0, -1);
	//echo $rest."<br>";
	mysql_query($rest);
	}
?>