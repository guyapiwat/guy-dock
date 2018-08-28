<?
session_start();
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620" />
<title>รายละเอียดการสั่งซื้อสินค้า online</title>
<link rel="stylesheet" type="text/css" href="./css/pgstyle.css" />
</head>

<body>
<?
	include("connectmysql.php");
	include("prefix.php");
	include("inc.wording.php");
require("checklogin.php");

	$id = $_GET['pid'];
	$sql = "SELECT *";
	//$sql .= "CASE accno1 WHEN '' THEN accno2 ELSE accno1 END AS accno, ";
	//$sql .= "CASE accname1 WHEN '' THEN accname2 ELSE accname1 END AS accname ";
	$sql .= "FROM ".$dbprefix."transfersale_h  ";
	$sql .= " LEFT JOIN district ON (".$dbprefix."transfersale_h.cdistrictId=district.districtId)";
	$sql .= " LEFT JOIN amphur ON (".$dbprefix."transfersale_h.camphurId=amphur.amphurId)";
	$sql .= " LEFT JOIN province ON (".$dbprefix."transfersale_h.cprovinceId=province.provinceId) WHERE ".$dbprefix."transfersale_h.id='".$id."' and  uid = '".$_SESSION['usercode']."' ";

	$rs = mysql_query($sql);
	if(mysql_num_rows($rs) > 0){
	$name_t = mysql_result($rs,0,'name_t');
	//$total_bv =mysql_result($rs,0,'total_bv');
	//$transferdate =mysql_result($rs,0,'transferdate');
	$transferdate =mysql_result($rs,0,'sctime');
	//$transfertime =mysql_result($rs,0,'transfertime');
	//$transfertime =mysql_result($rs,0,'transfertime');
	//$transferbank =mysql_result($rs,0,'transferbank');
	//$mobile =mysql_result($rs,0,'mobile');
	//$accno =mysql_result($rs,0,'accno');
	//$accname =mysql_result($rs,0,'accname');
	$total =mysql_result($rs,0,'total');
	$tot_pv =mysql_result($rs,0,'tot_pv');
	//$ssend =mysql_result($rs,0,'ssend');
	//$saddress =mysql_result($rs,0,'saddress');
	$saddress = mysql_result($rs,0,'caddress');
	$saddress .= mysql_result($rs,0,'districtName')==""?"":" ต.".mysql_result($rs,0,'districtName');
	$saddress .= mysql_result($rs,0,'amphurName')==""?"":" อ.".mysql_result($rs,0,'amphurName');
	$saddress .= mysql_result($rs,0,'provinceName')==""?"":" จ.".mysql_result($rs,0,'provinceName');
	$saddress .= " ".mysql_result($rs,0,'czip')

?>

<table border="0" cellpadding="0" cellspacing="0" width="95%" align="center">
  <tr>
    <td><img src="../images/logo.png"><br><br><div style="font-weight:bold; font-size:14px; color:#0099CC;"><?=$wording_lan["company_name"]?><br><?=$wording_lan["company_address"]?><br><?=$wording_lan["company_phone"]?><br></div></td>
  </tr>
    <tr>
    <td><div style="color:#0099CC;">รายละเอียดการสั่งซื้อสินค้า ผ่านทางเว็บไซต์ของสมาชิก</div></td>
  </tr>
  <tr><td>&nbsp;</td></tr>
  <tr>
    <td>
    <div>
    <b>ชื่อ</b>&nbsp;&nbsp;<?=$name_t?>
    &nbsp;&nbsp;<b>ซื้อสินค้าเป็นเงิน</b>&nbsp;&nbsp;<?=$total?>&nbsp;<b>บาท</b>&nbsp;&nbsp;<b>เมื่อวันที่</b>&nbsp;&nbsp;<?=$transferdate?>
    &nbsp;&nbsp;
    </div>
	ที่อยู่การจัดส่ง : <?=$saddress?>
  </td>
  </tr>
</table>
<br />
<table border="0" cellpadding="0" cellspacing="0" width="95%" align="center" style="border:solid 1px #000000;">
  <tr bgcolor="#71D0FF">
    <td align="center"><b>ลำดับ</b></td>
    <td align="center"><b>รหัส</b></td>
    <td align="center"><b>รายการสินค้า</b></td>
    <td align="center"><b>ราคา</b></td>
    <td align="center"><b>คะแนน</b></td>
    <td align="center"><b>จำนวน</b></td>
    <td align="center"><b>รวมราคา</b></td>
    <td align="center"><b>รวม P.V.</b></td>
  </tr>
  <?
  $sql = "SELECT * FROM ".$dbprefix."transfersale_d WHERE sano = '".$id."' ORDER BY id ASC ";
//  echo $sql."<br />";
  $rs = mysql_query($sql);
  $row = mysql_num_rows($rs);
  if($row > 0){
  	for($i = 0 ; $i < $row ; $i++){
		$info = mysql_fetch_object($rs);
		echo "<tr>";
		echo "<td align='center'>".($i+1)."</td>";
		echo "<td align='center'>".$info->pcode."</td>";
		echo "<td align='left'>".$info->pdesc."</td>";
		echo "<td align='center'>".$info->price."</td>";
		echo "<td align='center'>".$info->pv."</td>";
		echo "<td align='center'>".$info->qty."</td>";
		echo "<td align='center'>".($info->qty*$info->price)."</td>";
		echo "<td align='center'>".($info->qty*$info->pv)."</td>";
		echo "</tr>";
	}
  }
  ?>
  <tr>
    <td colspan="6" align="right"><b>รวม</b></td>
    <td align="center"><b><?=$total?></b></td>
    <td align="center"><b><?=$tot_pv?></b></td>
  </tr>
</table>

<?
}else{
?>
<br />
<table border="0" cellpadding="0" cellspacing="0" width="95%" align="center" style="border:solid 1px #000000; background-color:#9F0000;">
  <tr>
    <td align="center" style="color:#FFFFFF;">ไม่พบข้อมูลการซื้อขาย</td>
  </tr>
</table>
<?
}
?>
</body>
</html>
