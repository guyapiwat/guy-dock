<?
require("connectmysql.php");
include("global.php");
require("./cls/piority.php");
?>
<?
	if(isset($_GET['id'])){
		$sql = "SELECT * FROM ".$dbprefix."user WHERE uid='".$_GET['id']."'";
		$rs = mysql_query($sql);
		if(mysql_num_rows($rs) > 0){
			$obj = mysql_fetch_object($rs);
			$sysinfo['nodata'] = "-";
			$sysinfo['usercode'] = $obj->usercode;
			$sysinfo['username'] = $obj->username;
			$sysinfo['object1'] = $obj->object1;
			$sysinfo['object2'] = $obj->object2;
			$sysinfo['object3'] = $obj->object3;
			$sysinfo['object4'] = $obj->object4;
			$sysinfo['object5'] = $obj->object5;
		}
		
		$obj = array($sysinfo['object1'],$sysinfo['object2'],$sysinfo['object3'],$sysinfo['object4'],$sysinfo['object5']);
		$objdef = array("��Ҫԡ","vip","���","����Ԫ���","�������к�");
		$acc = new piority();
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620" />
<title>'EPOUS'EE</title>
<link rel="stylesheet" type="text/css" href="./../style.css" />

</head>
<table border="0" cellspacing="0" cellpadding="0" width="100%">
 <tr bgcolor="#FFCC33">
   <td height="20" colspan="2">&nbsp;&nbsp;<b>�����ż����</b></td>
 </tr>
 <tr>
 	<td width="30%" height="20" align="right" class="texh"><b>���ʼ���� :</b></td>
	<td width="70%" class="texd">&nbsp;<? echo ($sysinfo['usercode']!="")?$sysinfo['usercode']:$sysinfo['nodata']; ?></td>
 </tr>
 <tr>
 	<td height="20" align="right" class="texh"><b>���ͼ���� :</b></td>
	<td class="texd">&nbsp;<? echo ($sysinfo['username']!="")?$sysinfo['username']:$sysinfo['nodata']; ?></td>
 </tr>
 <tr bgcolor="#FFCC33">
   <td height="20" colspan="2">&nbsp;&nbsp;<b>�Է�ԡ����ҹ�����</b></td>
 </tr>
 <tr>
   <td colspan="2" height="10"></td>
 </tr>
 <tr>
   <td colspan="2">
   <fieldset>
      <table border="0" cellspacing="0" cellpadding="0" width="100%">
	    <tr bgcolor="#FFCCCC">
		  <td width="26%" height="20" align="center" class="texh"><b>����</b></td>
		  <td width="16%" align="center" class="texh"><b>��</b></td>
		  <td width="16%" align="center" class="texh"><b>����</b></td>
		  <td width="16%" align="center" class="texh"><b>���</b></td>
		  <td width="16%" align="center" class="texh"><b>ź</b></td>
		</tr>

		<?  
		  for($i=0;$i<5;$i++){ 
			echo "<tr>";
		    echo "<td class='texh1'><b>".$objdef[$i]."</b></td>";
			
		   	$acc->calc($obj[$i]);
            foreach(array_keys($acc->getAllAccess()) as $key){
			//echo "<td width='50' align='center'><input type='checkbox' name='accobj".($i+1).$key."' value='$key' ".($acc->isAccess($key)==true?"checked":"")." /></td>";
			//echo $objdef[$i]."<br />";
				echo "<td class='texd' align='center' width='16%' height='20'>";
				echo ($acc->isAccess($key)==true)?"<font color='green'><b>yes</b></font>":"<font color='red'><b>no</b></font>";
				echo "</td>";
			}
			
			echo "</tr>";
		   } ?>
	  </table>
	  </fieldset>
   </td>
 </tr>
</table>

