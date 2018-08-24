<?
	include("connectmysql.php");
	include("prefix.php");
	
	$id = $_GET['pid'];
	$sql = "SELECT * FROM ".$dbprefix."onlinepoint_h WHERE id='".$id."' ";
	$rs = mysql_query($sql);
	$mcode = mysql_result($rs,0,'mcode');
	$name_t = mysql_result($rs,0,'name_t');
	$point =mysql_result($rs,0,'point');
	$transferdate =mysql_result($rs,0,'transferdate');
	$transfertime =mysql_result($rs,0,'transfertime');
	$transferbank =mysql_result($rs,0,'transferbank');
	$mobile =mysql_result($rs,0,'mobile');
	$address =mysql_result($rs,0,'address');
	$total =mysql_result($rs,0,'total');
	$tot_pv =mysql_result($rs,0,'tot_pv');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620" />
<title>รายละเอียดการสั่งซื้อสินค้า online</title>
<link rel="stylesheet" type="text/css" href="./css/pgstyle.css" />
</head>

<body>
<table border="0" cellpadding="3" cellspacing="0" width="95%" align="center">
  <tr>
    <td><div style="font-weight:bold; font-size:14px; color:#0099CC;">System-bonus.net</div></td>
  </tr>
    <tr>
    <td><div style="color:#0099CC;">รายละเอียดการสั่งซื้อ Point และ สินค้า ผ่านทางเว็บไซต์ของสมาชิก</div></td>
  </tr>
  <tr><td>&nbsp;</td></tr>
  <tr>
    <td>
    <div>
    <b>รหัสสมาชิก</b>&nbsp;&nbsp;<?=$mcode?>&nbsp;&nbsp;<b>ชื่อ</b>&nbsp;&nbsp;<?=$name_t?>
    &nbsp;&nbsp;<b>ซื้อ Point จำนวน</b>&nbsp;&nbsp;<?=$point?>&nbsp;<b>point</b>&nbsp;&nbsp;<b>เมื่อวันที่</b>&nbsp;&nbsp;<?=$transferdate?>
    &nbsp;&nbsp;<b>เวลา</b>&nbsp;&nbsp;<?=$transfertime?>&nbsp;<b>น.</b>
    </div>
  </td>
  </tr>
  <tr>
    <td><b>ที่อยู่สำหรับจัดส่งสินค้า</b>&nbsp;&nbsp;<?=$address?></td>
  </tr>
</table>
<br />
<table border="0" cellpadding="3" cellspacing="0" width="95%" align="center" style="border:solid 1px #000000;">
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
  $sql = "SELECT * FROM ".$dbprefix."onlinepoint_d WHERE pid = '".$id."' ORDER BY id ASC ";
  //echo $sql."<br />";
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
</body>
</html>
