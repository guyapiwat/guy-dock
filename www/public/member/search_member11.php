<? session_start();?>
<?
//  ไม่ไปเอาจาก cache
  header("Expires: Sat, 1 Jan 2005 00:00:00 GMT");
  header("Last-Modified: ".gmdate( "D, d M Y H:i:s")."GMT");
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache");
  
  //กำหนด header ตอนรับ
  header("content-type: application/x-javascript; charset=TIS-620");

include("prefix.php");
include("connectmysql.php");
 $value=(isset($_POST["value"])) ? $_POST["value"] : $_GET["value"];
 $value1=(isset($_POST["value1"])) ? $_POST["value1"] : $_GET["value1"];
 //$value = "0000001";
  //$value1 = "0000009";
  //echo $value1.' '.$value;
  //exit;
  if(!empty($value) and isLine($dbprefix,$value,$value1) ){
//if(!empty($value)){
		$sql = "SELECT name_t";
		$sql .= " FROM ".$dbprefix."member  where mcode like '%$value%'  limit 0,1";
		$result = mysql_query($sql) or die("haha") ;
		if(mysql_num_rows($result) > 0){
			$data = mysql_fetch_object($result);
			$name_t = $data->name_t;
			
			$sql = "SELECT lr";
			$sql .= " FROM ".$dbprefix."member  where upa_code like '%$value%' and lr=1 limit 0,1";
			$result = mysql_query($sql) or die("haha") ;
			if(mysql_num_rows($result) > 0){
				$left = '1';
			}else $left = '0';
			
			$sql = "SELECT lr";
			$sql .= " FROM ".$dbprefix."member  where upa_code like '%$value%' and lr=2 limit 0,1";
			$result = mysql_query($sql) or die("haha") ;
			if(mysql_num_rows($result) > 0){
				$right = '1';
			}else $right = '0';
		
			echo $left.':'.$right.":".$name_t;
		}else{
			echo "1234";
		}	
  }else{
		echo '1234';
  }
 function isLine($dbprefix,$scode,$testcode){
		$sql = "SELECT upa_code FROM ".$dbprefix."member WHERE mcode='$scode' LIMIT 1 ";
		$rs = mysql_query($sql);
		//echo $scode.' '.$testcode.'<br>';
		if($scode==$testcode)
			return true;
		if(mysql_num_rows($rs)<=0)
			return false;
		else if(mysql_result($rs,0,'upa_code')!=$testcode)
			return isLine($dbprefix,mysql_result($rs,0,'upa_code'),$testcode);
		else
			return true;
	}

?>