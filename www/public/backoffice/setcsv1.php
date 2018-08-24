<html>
<head>
<title>ThaiCreate.Com PHP & CSV To MySQL</title>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620">
</head>
<body>
<?
//copy($_FILES["fileCSV"]["tmp_name"],$_FILES["fileCSV"]["name"]); // Copy/Upload CSV
/*
$objConnect = mysql_connect("localhost","praram9_db","whanwhanwhan") or die("Error Connect to Database"); // Conect to MySQL
$objDB = mysql_select_db("praram9_db");
mysql_query("SET NAMES TIS620");

$objCSV = fopen("5m-praram9.csv", "r");
//var_dump($objCSV);
//while (($objArr = fgetcsv($objCSV, 1000, ",")) !== FALSE) {
while (($objArr = fgetcsv($objCSV, 1000, ",")) !== FALSE) {

	$strSQL = "INSERT INTO ali_member2 ";
	$strSQL .="(id,mcode,name_t,sv_code,sp_code,sp_name,upa_code,upa_name,lr,pos_cur) ";
	$strSQL .="VALUES ";
	$strSQL .="('".$objArr[0]."','".$objArr[1]."','".$objArr[2]."' ";
	$strSQL .=",'".$objArr[3]."','".$objArr[4]."','".$objArr[5]."') ";
	$strSQL .=",'".$objArr[6]."','".$objArr[7]."','".$objArr[8]."') ";
	$strSQL .=",'".$objArr[9]."') ";
	//echo $strSQL.'<br>';
	//$objQuery = mysql_query($strSQL);
}
fclose($objCSV);

?>

</table>*/
<?
$objCSV = fopen("csv/5m-praram9.csv", "r");
?>
<table width="600" border="1">
  <tr>
    <th width="91"> <div align="center">CustomerID </div></th>
    <th width="98"> <div align="center">Name </div></th>
    <th width="198"> <div align="center">Email </div></th>
    <th width="97"> <div align="center">CountryCode </div></th>
    <th width="59"> <div align="center">Budget </div></th>
    <th width="71"> <div align="center">Used </div></th>
  </tr>
<?
while (($objArr = fgetcsv($objCSV, 1000, ",")) !== FALSE) {
?>
  <tr>
    <td><div align="center"><?=$objArr[0];?></div></td>
    <td><?=$objArr[1];?></td>
    <td><?=$objArr[2];?></td>
    <td><div align="center"><?=$objArr[3];?></div></td>
    <td align="right"><?=$objArr[4];?></td>
    <td align="right"><?=$objArr[5];?></td>
  </tr>
<?
}
fclose($objCSV);
?>
</body>
</html>

