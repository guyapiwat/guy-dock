<html>
<head>
<title>Import Member</title>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620">
<style>body{background-color:black;color:#008000;font-size:17px;font-family:tahoma;}</style>
</head>
<body>
 
<?

echo "Start Update database to table<br>==============================<br>";
$objCSV2 = fopen("88/m2.csv", "r");
$row2 = 0;
while (($objArr2 = fgetcsv($objCSV2, 1000, ",")) !== FALSE) {
	$row2++;
	if($row2 > 2) {
		$update = array(
			"id_card"	=>str_replace("x","",trim($objArr2[3]))
		);
	   //update("ali_member",$update,"mcode='".gen_code($objArr2[0])."'");
	}
} 
fclose($objCSV2);

echo "Update Member Succsess...<br><br>";
echo "<script>alert('Member Import and Update Success..');</script>";

function pv($mexp){
	$mexp = explode(".",$mexp);
	$mexp1 = explode(",",$mexp[0]);
	$mexp = $mexp1[0].$mexp1[1].$mexp1[2].$mexp1[3].$mexp1[4];
	return $mexp;
}
function updatePos($mcode,$mexp){
	$mexp = explode(".",$mexp);
	$mexp1 = explode(",",$mexp[0]);
	$mexp = $mexp1[0].$mexp1[1];

	$dbprefix = "ali_";
	$cur_date = date("Y-m-d");
	$pos_piority	= array('TD'=>15,'DD'=>14,'D'=>13,'EM'=>12,'RB'=>11,'SP'=>10,'PL'=>9,
						'JA'=>8,'GS'=>7,'SS'=>6,'5S'=>5,'4S'=>4,'PP'=>3,'BP'=>2,'HP'=>1,'MB'=>0 );
	$pos_exp		= array('PP'=>6000,'BP'=>2500,'HP'=>500,'MB'=>0);
 	$pos_old		='MB';
	foreach(array_keys($pos_exp) as $key){
		if($mexp>=$pos_exp[$key]){ $pos_new = $key; break;}
	}

	if($pos_piority[$pos_new]>$pos_piority['MB']){
	$sql = "UPDATE ".$dbprefix."member SET pos_cur='$pos_new' WHERE mcode='$mcode' LIMIT 1 ";	
	mysql_query($sql);

	//echo $pos_new.'<br/>'.$sql.'<br>';

	$sql = "INSERT INTO ".$dbprefix."calc_poschange (rcode,mcode,pos_before,pos_after,date_change) ";
	$sql .= "VALUES('','".$mcode."','".$pos_old."','".$pos_new."','".$cur_date."')";
	mysql_query($sql);		
	}
}
function bank($bank) {
	$bank_code = array(
		'ไทยธนาคาร'							=>51,
		'SCB CASH CARD'						=>52,
		'ธนาคาร ซีไอเอ็มบี ไทย จำกัด'		=>53,
		'ธนาคารกรุงศรีอยุธยา'					=>54,
		'ธนาคารทหารไทย'						=>55,
		'ธนาคารกรุงเทพ'						=>56,
		'ธนาคารกรุงไทย'						=>57,
		'ธนาคารกสิกรไทย'						=>58,
		'ธนาคารเกียรตินาคิน'					=>59,
		'ธนาคารไทยพาณิชย์'					=>60,
		'ธนาคารธนชาต'						=>61,
		'ธนาคารนครหลวงไทย'					=>62,
		'ธนาคารเพื่อการเกษตรและสหกรณ์การเกษตร'	=>63,
		'ธนาคารยูโอบี'						=>64,
		'ธนาคารสแตนดาร์ดชาร์เตอร์ต นครธน'		=>65,
		'ธนาคารออมสิน'						=>66,
		'ธนาคารอาคารสงเคราะห์'					=>67,
		'ธนาคารอิสลามแห่งประเทศไทย'			=>68,
		'ไม่มีสมุดบัญชีธนาคาร'				=>69
	);
	return $bank_code[$bank];
}
function gen_mem_active(){
	$mem_active = date("Y-m-d");
	return $mem_active;
}
function gen_code($source){
	for($i=strlen($source);$i<7;$i++)
		$source = "0".$source;
	return $source;
}
function gen_code10($source){
	for($i=strlen($source);$i<10;$i++)
		$source = "0".$source;
	return $source;
}
function gen_pass($mcode){
	$mcode = substr($mcode,3,strlen($mcode));
	return $mcode;
}
function gen_lr($lr){
	if($lr=='ขวา'){$lr='2';}
	elseif($lr=='ซ้าย'){$lr='1';}
	return $lr=1;
}
function gen_cmp($cmp){
	if($cmp=='True'){$cmp='ครบ';}
	elseif($cmp=='False'){$cmp='';}
	return $cmp;
}
function gen_poscur($poscur){
	if($poscur=='4Star'){$poscur='4S';}
	elseif($poscur=='5Star'){$poscur='5S';}
	elseif($poscur=='EMERALD'){$poscur='EM';}
	elseif($poscur=='Gold Star'){$poscur='GS';}
	elseif($poscur=='JADE'){$poscur='JA';}
	elseif($poscur=='PEARL'){$poscur='PL';}
	elseif($poscur=='RUBY'){$poscur='RB';}
	elseif($poscur=='SAPPHIRE'){$poscur='SP';}
	elseif($poscur=='Silver Star'){$poscur='SS';}
	elseif($poscur==''){$poscur='';}
	return $poscur;
}
function gen_mdate($mdate){
	$mdate = explode("/",$mdate);
	for($i=strlen($mdate[1]);$i<2;$i++){
		$mdate[1] = "0".$mdate[1];
	}
	for($i=strlen($mdate[0]);$i<2;$i++){
		$mdate[0] = "0".$mdate[0];
	}
	$mdate[2] = $mdate[2]-543;
	$mdate = $mdate[2].'-'.$mdate[1].'-'.$mdate[0];
	return $mdate;
}
function insert($table,$data)
{
  $fields=""; $values="";
  $i=1;
  foreach($data as $key=>$val)
  {
    if($i!=1) { $fields.=", "; $values.=", "; }
    $fields.="$key";
    $values.="'$val'";
    $i++;
  }
  $sql = "INSERT INTO $table ($fields) VALUES ($values)";
  if(@mysql_query($sql)) { return true; } 
  else { die("SQL Error: <br>".$sql."<br>".mysql_error()); return false;}
}
function update($table,$data,$where)
{
  $modifs="";
  $i=1;
  foreach($data as $key=>$val)
  {
    if($i!=1){ $modifs.=", "; }
    $modifs.=$key.' = "'.$val.'"'; 
    $i++;
  }
  $sql = ("UPDATE $table SET $modifs WHERE $where");
  //echo $sql.'<br><br>';
  if(@mysql_query($sql)) { return true; } 
  else { die("SQL Error: <br>".$sql."<br>".mysql_error()); return false; }  
}
?>
 