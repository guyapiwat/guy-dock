<style type="text/css">
<!--
.style2 {font-family: "MS Sans Serif"; color:#666666; font-weight: bold; font-size: 14px; }
.style11 {font-size: 14px; color: #0000FF; font-family: "MS Sans Serif"; }
.style11 {font-size: 14px; color: #0099FF; font-family: "MS Sans Serif"; }
.style11 {font-size: 14px; color: #B1C3D9; font-family: "MS Sans Serif"; }
.style11 {font-size: 14px; color: #33CC66; font-family: "MS Sans Serif"; }
.style11 {font-size: 14px; color: #339900; font-family: "MS Sans Serif"; }
-->
</style>

<? include("global.php");
//echo "kkkkkk";
if (isset($_GET["smc"])) {$smc=$_GET["smc"];} 
else {$smc="";$_GET["smc"]=$smc;};

require_once 'connectmysql.php';

$result=mysql_query("select * from ".$dbprefix."member where mcode='".$smc."'");
//echo "select * from ".$dbprefix."member where mcode='".$smc."'";
if (mysql_num_rows($result)>0) {
		$row = mysql_fetch_array($result, MYSQL_ASSOC);
		//echo $row["name_t"];
		$sql="UPDATE ".$dbprefix."member SET view_flg='1' where mcode= '".$smc."'";
		if(mysql_query($sql)){
			mysql_query("COMMIT");
		}else{
			echo "error $sql<BR>";
		}
}
?>
</strong></legend>
<table width="100%" border="0">
  <tr valign="top">
    <td width="1%">&nbsp;</td>
    <td width="48%"><strong class="style2">
      <fieldset><legend>ข้อมูลส่วนตัว</legend>
    <table width="100%" border="0">
      <tr>
        <td class="style2" colspan="6">&nbsp;</td>
      </tr>
      <tr>
        <td class="style2">
        	<div align="right"><strong class="style2">ชื่อ :</strong></div>
        </td>
        <td bordercolor="#000000" class="style11" colspan="5"><p>
             <?=$row["name_t"]?></p>              
        </td>
      </tr>
      <tr>
        <td class="style2"><div align="right">ชื่อ(อังกฤษ) : </div></td>
        <td class="style11" colspan="5"> <?=$row["name_e"]?> &nbsp;</td>
      <tr>
        <td width="25%" class="style2"><div align="right">เพศ : </div></td>
        <td width="23%" class="style11"><?=$row["sex"]?>&nbsp;</td>
        <td class="style2"  colspan="2"><div align="right">วัน/เดือน/ปีเกิด : </div></td>
        <td class="style11"  colspan="2"><?=$row["birthday"]?>&nbsp;</td>
      </tr>
      <tr>
            <td width="25%"><div align="right" class="style2">อายุ :</div></td>
          <td width="23%" class="style11"> <?=$row["age"]?>&nbsp;</td>
          <td width="11%" class="style2"><div align="right">สัญชาติ : </div></td>
          <td width="18%" class="style11"> <?=$row["national"]?> &nbsp;</td>
          <td width="10%" class="style2"><div align="right">สถานะ : </div></td>
          <td width="13%" class="style11"> <?=$row["status"]?></td>
      </tr>
      
      <tr>
            <td width="25%" class="style2"><div align="right">อาชีพ : </div></td>
          <td width="23%" class="style11"> <?=$row["occupation"]?>&nbsp;</td>
          <td class="style2" colspan="2"><div align="right">เบอร์โทรศัพท์ : </div></td>
          <td class="style11" colspan="2"> <?=$row["home_t"]?>&nbsp;</td>
      </tr>
      <tr>
            <td width="25%" class="style2"> <div align="right">มือถือ : </div></td>
          <td width="23%" class="style11"> <?=$row["mobile"]?>&nbsp;</td>
          <td class="style2" colspan="2"><div align="right">แฟกซ์ :</div></td>
          <td class="style11" colspan="2"> <?=$row["fax"]?>&nbsp;</td>
      </tr>
      <tr>
          <td width="25%" class="style2"><div align="right">ที่อยู่ : </div></td>
          <td class="style11" colspan="5"> <?=$row["address"]?></td>
      </tr>
      <tr>
          <td width="25%" class="style2"><div align="right">แขวง/ตำบล : </div></td>
            <td width="23%" class="style11">
			<? $dis = getdistrict($row["districtId"]);
				echo $dis;
		    ?>
			 
			 &nbsp;</td>
          <td class="style2" colspan="2"><div align="right">เขต/อำเภอ: </div></td>
            <td class="style11" colspan="2"> 
			<? $amp = getamphur($row["amphurId"]);
			   echo $amp;
			?>
			
			&nbsp;</td>
      </tr>
      <tr>
            <td width="25%" class="style2"><div align="right">จังหวัด : </div></td>
          <td width="23%" class="style11"> 
			<?=getprovince($row["provinceId"])?>
			&nbsp;</td>
          <td class="style2" colspan="2"><div align="right">รหัสไปรษณีย์ : </div></td>
          <td class="style11" colspan="2"> <?=$row["zip"]?>&nbsp;</td>
      </tr>
      <tr>
            <td width="25%" class="style2"><div align="right">ชื่อคู่สมรส : </div></td>
          <td width="23%" class="style11"> <?=$row["mar_name"]?>&nbsp;</td>
          <td class="style2" colspan="2"><div align="right">อายุ :</div></td>
          <td class="style11" colspan="2"> <?=$row["mar_age"]?>&nbsp;</td>
      </tr>
      <tr>
            <td class="style2" colspan="2" align="right">เลขประจำตัวผู้เสียภาษี : </td>
          <td class="style11" colspan="4"><?=$row["id_tax"]?>&nbsp;</td>
      </tr>
      <tr>
            <td class="style2" colspan="2" align="right">เลขที่บัตรประจำตัวประชาชน : </td>
          <td class="style11" colspan="4"> <?=$row["id_card"]?>&nbsp;</td>
      </tr>
    </table>
    <p>&nbsp;</p>
    </fieldset>
    </strong></td>
    <td width="1%">&nbsp;</td>
    <td width="49%"><strong class="style2">
      <fieldset><legend>ข้อมูลธุรกิจ</legend>
      <table width="100%" border="0">
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
            <td width="28%" class="style2"><div align="right">รหัสสมาชิก : </div></td>
          <td width="21%" class="style11"><?=$row["mcode"]?>&nbsp;</td>
          <td width="18%" class="style2"><div align="right">รหัสสาขา : </div></td>
          <td width="33%" class="style11"><?=getinv($row["inv_code"])?>&nbsp;</td>
      </tr>
      <tr>
            <td width="28%" class="style2"><div align="right">ตำแหน่ง : </div></td>
          <td colspan="3" class="style11"><?=getpositionname($row["pos_cur"])?>&nbsp;</td>
        </tr>
      <tr>
          <td width="28%" class="style2"><div align="right">PV รวม : </div></td>
          <td colspan="3" class="style11"><?=$_SESSION["PV"]?>&nbsp; </td>
        </tr>
      <tr>
            <td width="28%" class="style2"><div align="right">เลขที่บัญชี : </div></td>
          <td class="style11" colspan="3"><?=$row["acc_no"]?></td>
      </tr>
      <tr>
            <td width="28%" class="style2"><div align="right">ชื่อบัญชี : </div></td>
        <td colspan="3"><span class="style11">
              <?=$row["acc_name"]?>
            </span></td>
      </tr>
      <tr>
            <td width="28%" class="style2"><div align="right">ธนาคาร : </div></td>
            <td width="21%" class="style11"> 
			<?=getbank($row["bankcode"])?>&nbsp;</td>
          <td width="18%" class="style2"><div align="right">สาขา : </div></td>
          <td width="33%" class="style11"> <?=$row["branch"]?>&nbsp;</td>
      </tr>
      <tr>
            <td width="28%" class="style2"><div align="right">ชื่อผู้แนะนำ : </div></td>
          <td class="style11" colspan="3"><?=$row["sp_name"]?>&nbsp;</td>
      </tr>
      <tr>
            <td width="28%" class="style2"><div align="right">รหัสผู้แนะนำ : </div></td>
          <td class="style11" colspan="3"><?=$row["sp_code"]?>&nbsp;</td>
      </tr>
      <tr>
            <td width="28%" class="style2"><div align="right">ชื่ออัพไลน์ : </div></td>
          <td class="style11" colspan="3"><?=$row["upa_name"]?>&nbsp;</td>
      </tr>
      <tr>
            <td width="28%" class="style2"><div align="right">รหัสอัพไลน์ : </div></td>
            <td class="style11" colspan="3"><?=$row["upa_code"]?>&nbsp;</td>
      </tr>
      <tr>
            <td width="28%" class="style2" align="right">ชื่อผู้รับมรดก : </td>
          <td class="style11" colspan="3"><?=$row["beneficiaries"]?>&nbsp;</td>
      </tr>
      <tr>
            <td width="28%" class="style2" align="right">ความสัมพันธ์ : </td>
          <td class="style11" colspan="3"> <?=$row["relation"]?>&nbsp;</td>
      </tr>
    </table>
    <p>&nbsp;</p>
    </fieldset>
    </strong></td>
    <td width="1%">&nbsp;</td>
  </tr>
</table>


 <table width="100%" border="0">
   <tr>
     <td class="style11">&nbsp;</td>
   </tr>
 </table>


 <?
 function getdistrict($mc){
 
 global $dbprefix;
	// connect to database 
	include_once "connectmysql.php";
	$sql="select * from district where districtId=".$mc." ";
	//echo "$sql<BR>";
	if ($mc==""){return "ไม่มีตำบล";}
	$result=mysql_query($sql);
	if (mysql_num_rows($result)>0) {
		$row = mysql_fetch_object($result);
		//echo $row->districtName;
		return $row->districtName;
	}else{
		return "ไม่มีตำบล";
	}
}
function getamphur($mc){
 
 global $dbprefix;
	// connect to database 
	include_once "connectmysql.php";
	$sql="select * from amphur where amphurId=".$mc." ";
	//echo "$sql<BR>";
	if ($mc==""){return "ไม่มีอำเภอ";}
	$result=mysql_query($sql);
	if (mysql_num_rows($result)>0) {
		$row = mysql_fetch_object($result);
		//echo $row->districtName;
		return $row->amphurName;
	}else{
		return "ไม่มีอำเภอ";
	}
}

function getprovince($mc){
 
 global $dbprefix;
	// connect to database 
	include_once "connectmysql.php";
	$sql="select * from province where provinceId=".$mc." ";
	//echo "$sql<BR>";
	if ($mc==""){return "ไม่มีจังหวัด";}
	$result=mysql_query($sql);
	if (mysql_num_rows($result)>0) {
		$row = mysql_fetch_object($result);
		//echo $row->districtName;
		return $row->provinceName;
	}else{
		return "ไม่มีจังหวัด";
	}
}

function getinv($mc){
 //echo $mc;
 global $dbprefix;
	// connect to database 
	include_once "connectmysql.php";
	
	$sql="select * from ".$dbprefix."invent where inv_code='".$mc."' ";
	//echo "$sql<BR>";
	if ($mc==""){return "ไม่มีสาขา";}
	$result=mysql_query($sql);
	if (mysql_num_rows($result)>0) {
		$row = mysql_fetch_object($result);
		//echo $row->districtName;
		return $row->inv_desc;
	}else{
		return "ไม่มีสาขา";
	}
}

function getpositionname($p){
	global $dbprefix;
	// connect to database 
	include_once "connectmysql.php";
	$sql="select * from ".$dbprefix."position where posshort='".$p."' ";
	//echo "$sql<BR>";
	if ($p==""){return "ไม่มีตำแหน่ง";}
	$result=mysql_query($sql);
	if (mysql_num_rows($result)>0) {
		$row = mysql_fetch_object($result);
		return $row->posname." ($p)";
	}else{
		return "ไม่มีตำแหน่ง";
	}
}
function getbank($p){
	global $dbprefix;
	// connect to database 
	include_once "connectmysql.php";
	$sql="select * from ".$dbprefix."bank where bankcode=".$p." ";
	//echo "$sql<BR>";
	if ($p==""){return "ไม่มีิbank";}
	$result=mysql_query($sql);
	if (mysql_num_rows($result)>0) {
		$row = mysql_fetch_object($result);
		return $row->bankname;
	}else{
		return "ไม่มีธนาคาร";
	}
}


 ?>