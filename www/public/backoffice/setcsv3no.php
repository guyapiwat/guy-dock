<html>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620">
<head>
<title>ThaiCreate.Com PHP & Read CSV</title>
</head>
<body>
<?
$objConnect = mysql_connect("localhost","praram9_db","whanwhanwhan") or die("Error Connect to Database"); // Conect to MySQL
$objDB = mysql_select_db("praram9_db");
mysql_query("SET NAMES TIS620");

$objCSV = fopen("status.csv", "r");
?>
<table width="600" border="1">
  <tr>
   <th width="91"> <div align="center">mcode </div></th>
    <th width="91"> <div align="center">mcode1 </div></th>
  </tr>
<?
while (($objArr = fgetcsv($objCSV, 10000, ",")) !== FALSE) {

if(!empty($objArr[0])){
	echo $objArr[0];
	$sql = "select * from ali_status where mcode = '".$objArr[0]."' and month_pv = '".$objArr[1]."' ";
	$rss = mysql_query($sql);
	if(mysql_num_rows($rss)==0){
		 $strSQL = "insert ali_status(rcode,mcode,status,month_pv) values('0','".$objArr[0]."','1','".$objArr[1]."') ";
		echo $strSQL.' <br>';
		$objQuery = mysql_query($strSQL);
	}
}

?>
  <tr>
      <td><div align="center"><?=$objArr[0];?></div></td>

    <td><div align="center"><?=$objArr[1];?></div></td>
  </tr>
<?
}
fclose($objCSV);
?>
</table>
</body>
</html>