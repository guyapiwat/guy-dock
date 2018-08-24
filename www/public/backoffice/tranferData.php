<?
require("connectmysql.php");
$dbprefix = 'gug_';
$sql = "SELECT * FROM ".$dbprefix."member where province != '' ";
echo $sql .'=<br>';
$result=mysql_query($sql);
	for ($i =0;$i<mysql_num_rows($result);$i++) {
		echo $i .'=i<br>';
		$sqlObj = mysql_fetch_object($result);
		$province[$sqlObj->mcode] = $sqlObj->province;
		echo  $province[$sqlObj->mcode].'=province<br>';
		$id = $sqlObj->id;
		if($province[$sqlObj->mcode]!=''){
			$sql1 = "SELECT provinceId FROM province where provinceName ='".trim($province[$sqlObj->mcode])."' ";
			echo $sql1.'=<br>';
			$result1=mysql_query($sql1);
			if(mysql_num_rows($result1)>0) {
				$row1= mysql_fetch_array($result1, MYSQL_ASSOC);
				$provinceId=$row1["provinceId"];
				$sql="update ".$dbprefix."member set provinceId='$provinceId' where id = '$id' ";
				echo $sql.'=<br>';
				mysql_query($sql);
			}
		}
	}
?>