<html>
<head>
<title>Import Member</title>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620">
<style>body{background-color:black;color:#008000;font-size:17px;font-family:tahoma;}</style>
</head>
<body>
 
<?
$objConnect = mysql_connect("localhost","pplan_db","songsongsong") or die("Error Connect to Database"); 
$objDB = mysql_select_db("pplan_db");mysql_query("SET NAMES TIS620");
 
echo "Start import database to table<br>==============================<br>";

exit;
 
$objCSV = fopen("member.csv", "r");
$row = 0;
while (($objArr = fgetcsv($objCSV, 1000, ",")) !== FALSE) {
	$row++;
	if($row > 2) {
		$member = array(
			"mcode"			=> gencode(trim($objArr[0])),
			"name_f"		=> ' ',
			"name_t"		=> str_replace("'","",$objArr[9].' '.$objArr[10]),
			"sv_code"		=> trim($objArr[5]),
			"pos_cur"		=> '',
			"sp_code"		=> gencode(trim($objArr[2])),
			"upa_code"		=> gencode(trim($objArr[3])),
			"lr"			=> gen_lr(trim($objArr[4])),
			"cmp"			=> "ครบ",
			"cmp2"			=> "ครบ",
			"cmp3"			=> "ครบ",
 			"ccmp"			=> "",
			"locationbase"	=> '1',
			"acc_name"		=> $objArr[9].' '.$objArr[10]
		);
		insert("ali_member_dev",$member) ;

	}
} 
fclose($objCSV);
 
echo "Import Member Succsess...<br><br><br>";
 
function gencode($source){
	for($i=strlen($source);$i<7;$i++)
		$source = "0".$source;
	return $source;
}

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
	$sql = "UPDATE ali_member_dev SET pos_cur='$pos_new' WHERE mcode='$mcode' LIMIT 1 ";	
	mysql_query($sql);

	//echo $pos_new.'<br/>'.$sql.'<br>';

	$sql = "INSERT INTO ".$dbprefix."calc_poschange (rcode,mcode,pos_before,pos_after,date_change) ";
	$sql .= "VALUES('','".$mcode."','".$pos_old."','".$pos_new."','".$cur_date."')";
	mysql_query($sql);		
	}
}
function bank($bank) {
	$bank_code = array(
		'ธ. กรุงเทพ จำกัด (มหาชน)'							=>51,
		'ธ. กรุงไทย จำกัด (มหาชน)'						=>49,
		'ธ. กสิกรไทย จำกัด (มหาชน)'		=>08,
		'ธ. ไทยพาณิชย์ จำกัด (มหาชน)'					=>06,
		'ธ. กรุงศรีอยุธยา จำกัด (มหาชน)'						=>05,
		'ธ. ทหารไทย จำกัด (มหาชน)'						=>02,
		'ธ. ธนชาต จำกัด (มหาชน)'						=>04,
		'ธ. ยูโอบี จำกัด (มหาชน)'						=>01,
		'ธ. เพื่อการเกษตรและสหกรณ์การเกษตร'					=>40,
		'ธ. ออมสิน'					=>07,
		'-'				=>26
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
	if($source!=""){
		for($i=strlen($source);$i<10;$i++){
			$source = "0".$source;
			return $source;
		}
	}
}
function gen_code7($source){
	if($source!=""){
		for($i=strlen($source);$i<7;$i++){
			$source = "0".$source;
			return $source;
		}
	}
}
function gencode_new($text,$source){
	for($i=strlen($source);$i<$source;$i++)
		$source = "0".$source;
	return $text.$source;
}
function gen_pass($idcard,$mcode){
	if($idcard=="")$idcard=$mcode;
	//$idcard = substr($idcard,4,strlen($idcard));
	$idcard = substr($idcard,-4);
	return $idcard;
}
function gen_lr($lr){
	if($lr=='L'){$lr='2';}
	elseif($lr=='R'){$lr='1';}
	else {$lr='';} 
	return $lr;
}
function gen_cmp($cmp){
	if($cmp=='True'){$cmp='ครบ';}
	elseif($cmp=='False'){$cmp='';}
	return $cmp;
}
function gen_poscur2($poscur){
	if($poscur=='DIS'){$poscur='MB';}
	elseif($poscur=='DIS-10'){$poscur='10%';}
	elseif($poscur=='DIS-15'){$poscur='15%';}
	elseif($poscur=='DIS-20'){$poscur='20%';}
	elseif($poscur=='DIS-25'){$poscur='25%';}
	else{$poscur='25%';}
	return $poscur;
}
function gen_poscur($poscur){
	 if($poscur=='BS' or $poscur=='SS' or $poscur=='GS' or $poscur=='DS' or $poscur=='SDS' or $poscur=='TDS' or $poscur=='TSDS'){}
	else{$poscur='MB';} 
	return $poscur;
}
function gen_mdate($mdate){
	$mdate = explode(" ",$mdate);
	
	if($mdate[0]=="" || $mdate[0]=="00-00-0000" || $mdate[0] == "0-0-0000"){
		$mdate="";
	}else {
		$mdate = explode("/",$mdate[0]);
		for($i=strlen($mdate[1]);$i<2;$i++){
			$mdate[1] = "0".$mdate[1];
		}
		for($i=strlen($mdate[0]);$i<2;$i++){
			$mdate[0] = "0".$mdate[0];
		}
		$mdate[2] = $mdate[2]-543;
		$mdate = $mdate[2].'-'.$mdate[1].'-'.$mdate[0];
	}
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
 $sql = "INSERT INTO $table ($fields) VALUES ($values) ";

 //echo $sql;
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