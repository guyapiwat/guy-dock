<? 
include("global.php");
?>
<? 

	if($_GET['sid']){
		$sql = "SELECT detail FROM ".$dbprefix."log where id = '".$_GET['sid']."' ";

		//echo $sql;
		$rs = mysql_query($sql);
		if(mysql_num_rows($rs)<=0){
			$txtdetail = "ไม่พบข้อมูลตามเงื่อนไข";
			//exit;
		}else{
			$row = mysql_fetch_object($rs);
			$txtdetail = $row->detail;
		}
	}
?>
<html>
<head>
<meta http-equiv="Content-Language" content="th">
<meta http-equiv="Content-Type" content="text/html; charset=tis-620">
<title>ยินดีต้อนรับสู่ความมั่นคงของธุรกิจ </title>
<link rel="stylesheet" type="text/css" href="./../style.css" />
</head>

<body>
<?=$txtdetail?>
</body>
</html>