<?include("connectmysql.php");?>
<?
$sql2="select * from usaaba_member where MCODE='0018791' ";
		$result3=mysql_query($sql2);
		if (mysql_num_rows($result3) > '0') {
			$row3 = mysql_fetch_array($result3, MYSQL_ASSOC);
			$name_t3=$row3["NAME_T"];
			$acc_no3=$row3["ACC_NO"];
			$acc_name3=$row3["ACC_NAME"];
		}else{$name_t3="";}
		mysql_free_result($result3);
		echo"�ͧ��".$name_t3;
?>