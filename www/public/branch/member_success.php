<?
include_once("global.php");
if($_GET["cmc"])$cmc = $_GET["cmc"];
else $cmc = $_SESSION['usercode'];

	$result=mysql_query("select *,DATE_FORMAT(birthday, '%d-%m-%Y') as birthday from ".$dbprefix."member where mcode='".$cmc."' ");
	if (mysql_num_rows($result)>0) {
			$row = mysql_fetch_array($result, MYSQL_ASSOC);
			$name_f = $row["name_f"];
			$name_t = $row["name_t"];
			$cname_f = $row["cname_f"];
			$cname_t = $row["cname_t"];
			$email = $row["email"];
			$mdate = $row["mdate"];
			$mdate = strtotime($mdate);
			$cmc_upa_code = $row["upa_code"];
			$cmc_upa_code = $row["upa_code"];
			$cmc_sp_code = $row["sp_code"];
			$pos_cur2=$row["pos_cur2"];
			$pos_cur123=$row["pos_cur"];
			$pos_cur33=$row["pos_cur2"];
			if(empty($pos_cur2))$pos_cur2 = $row["pos_cur"];

			//echo $row["name_t"];
	}

	$result=mysql_query("select sano from ".$dbprefix."asaleh where mcode='".$cmc."' order by id ASC");
	if (mysql_num_rows($result)>0) {
			$row = mysql_fetch_array($result, MYSQL_ASSOC);
			$id = $row["sano"];
	}
?><table align=center width=500	>
<tr>
      <td  align="center" bgcolor="#FFFF00">ยินดีต้อนรับสู่</td>
      </tr>
   <tr><td>
<table border="3" bordercolor="#00FFFF" width="100%"> <tr>
      <td width="50%" >รหัสสมาชิกใหม่คือ</td>
    <td width="50%"><?=$cmc?></td>
  </tr>  <tr >
    <td>ชื่อผู้สมัครหลัก</td>
	<td><?=$name_f.' '.$name_t?></td>
  </tr>  <tr  style="display:none">
    <td>ชื่อผู้สมัครร่วม</td>
	<td><?=$cname_f.' '.$cname_t?></td>
  </tr>  
  <tr >
    <td>ระบบได้ส่งรหัสผ่านในการเข้าใช้งานไปที่ Email : <br>
      (กรุณาเช็คดูที่ Inbox , Spam email หรือ Junk email)</td>
    <td><?=$email?></td>
  </tr>
  <tr >
    <td nowrap="nowrap">กรุณานำส่งใบสมัครและหลักฐานประกอบการสมัครภายในวันที่ </td>
    <td><?=date("Y-m-d",strtotime("+1 Month",$mdate));?></td>
  </tr> 
  <tr><td colspan=2 align=center>
  <table><tr>
  <td width=100 align=center><a href="mem_detailview.php?fmcode=<?=$cmc?>" target="_blank">ข้อมูลสมาชิก</a></td>
  <?if( $_SESSION["admininvent"] == $GLOBALS["main_inv_code"]){?>
	<td width=100 align=center><a href="../invoice/aprint_sale_branch.php?bid=<?=$id?>" target="_blank">พิมพ์ใบเสร็จรับเงิน</a></td>
	<? } else { ?>
	<td width=100 align=center><a href="../invoice/aprint_salelook.branch.php?bid=<?=$id?>" target="_blank">พิมพ์ใบเสร็จรับเงิน</a></td>
	<? } ?>
  <td width=100 align=center><a href="index.php?sessiontab=3&sub=139&state=2&cmc=<?=$cmc?>" target="_blank">สั่งซื้อสินค้า</a></td></tr></table>
  </td></tr>
  </table></td></tr></table>