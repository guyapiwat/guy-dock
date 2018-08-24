<? 
session_start();
include("connectmysql.php");
include("prefix.php");
require_once("function.php");
require_once("logtext.php");

if(isset($_GET['state'])){
	$sql = "SELECT MAX(id) AS id FROM ".$dbprefix."holdhead ";
	$rs = mysql_query($sql);
	$mid = $hono = mysql_result($rs,0,'id');
	mysql_free_result($rs);
	if (isset($_POST["id"])){$id=$_POST["id"];}else{$id="";}
	if (isset($_POST["mcode"])){$mcode=$_POST["mcode"];}else{$mcode="";}	
	if (isset($_POST["inv_code"])){$inv_code=$_POST["inv_code"];}else{$inv_code="";}
	if (isset($_POST["satype"])){$satype=$_POST["satype"];}else{$satype="";}
	if (isset($_POST["sadate"])){$sadate=$_POST["sadate"];}else{$sadate="";}
	if (isset($_POST["sumtotal"])){$total=$_POST["sumtotal"];}else{$total="";}
	if (isset($_POST["sumpv"])){$tot_pv=$_POST["sumpv"];}else{$tot_pv="";}
}
if($_GET['state']==0){
	$mid = ++$hono;
	
	//koob 25/05/2009
	list ( $year, $month, $day ) = split("-|:", $sadate);
	$heal_mouth=$year.$month;
	
	$sql="insert into ".$dbprefix."holdhead (id, hono, sano, sadate,  mcode,  sa_type, inv_code,  total, tot_pv, uid ) values ('$mid' ,'$hono' ,'".$_POST['hid']."' ,'$sadate' ,'$mcode', '$satype' ,'$inv_code' ,'$total' ,'$tot_pv' ,'".$_SESSION['adminusercode']."') ";
	logtext(true,$_SESSION['adminusercode'],$sql);
	echo "$sql<br>";
	mysql_query($sql);
	if(isset($_POST['pcode'])){
		$pcode=$_POST['pcode'];
		$pdesc=$_POST['pdesc'];
		$price=$_POST['price'];
		$pv=$_POST['pv'];
		$qty=$_POST['qty'];
		$totalprice=$_POST['totalprice'];
	}
	for($i=0;$i<sizeof($pcode);$i++){
		$sql="insert into ".$dbprefix."holddesc (hono,pcode,pdesc,price,pv,qty,amt) values ('$mid','$pcode[$i]','$pdesc[$i]','$price[$i]' ,'$pv[$i]','$qty[$i]','$totalprice[$i]') ";
		logtext(true,$_SESSION['adminusercode'],$sql);
		echo "$sql<br>";
		mysql_query($sql);
	}
	updatePos($dbprefix,$mcode,$sadate);
}else if($_GET['state']==1){
	
	//koob 25/05/2009
	list ( $year, $month, $day ) = split("-|:", $sadate);
	$heal_mouth=$year.$month;
	
	$sql="update ".$dbprefix."holdhead set hono='$id', id='$id', ";
	$sql.="mcode='$mcode' ,sa_type='$satype' ,sadate='$sadate' , inv_code='$inv_code', total='$total', tot_pv='$tot_pv' where id= '$id' ";
	logtext(true,$_SESSION['adminusercode'],$sql);
	mysql_query($sql);
	$sql = "DELETE FROM ".$dbprefix."holddesc WHERE hono='$id'";
	logtext(true,$_SESSION['adminusercode'],$sql);
	mysql_query($sql);
	if(isset($_POST['pcode'])){
		$pcode=$_POST['pcode'];
		$pdesc=$_POST['pdesc'];
		$price=$_POST['price'];
		$pv=$_POST['pv'];
		$qty=$_POST['qty'];
		$totalprice=$_POST['totalprice'];
	}
	for($i=0;$i<sizeof($pcode);$i++){
		$sql="insert into ".$dbprefix."holddesc (hono,pcode,pdesc,price,pv,qty,amt) values ('$id','$pcode[$i]','$pdesc[$i]','$price[$i]' ,'$pv[$i]','$qty[$i]','$totalprice[$i]') ";
		logtext(true,$_SESSION['adminusercode'],$sql);
		mysql_query($sql);
	}
	updatePos($dbprefix,$mcode,$sadate);
}

$sql = "UPDATE ".$dbprefix."billhd SET trf='1' WHERE sano='".$_POST['hid']."' LIMIT 1 ";
echo "$sql<br>";
//====================LOG===========================
$text="uid=".$_SESSION["adminuserid"]." action=saleoperate =>$sql";
writelogfile($text);
//=================END LOG===========================
mysql_query($sql);

exit;
echo "<script language='JavaScript'>window.location='index.php?sessiontab=3&sub=9'</script>";	

?>

<?
//update ตำแหน่ง แบบไม่สะสมคะแนน
	function updatePos($dbprefix,$mcode,$cur_date){
		$pos_piority = array('G'=>2,'S'=>1,''=>0);
		$pos_exp = array('G'=>2000,'S'=>1000,''=>0);
		//-----เก็บคะแนนสูงสุดที่มีการซื้อ
		$sql = "SELECT SUM(tot_pv) as pv from ".$dbprefix."holdhead WHERE mcode='$mcode' and sa_type='A' ";
		$rs = mysql_query($sql);
		$mexp = 0;
		if(mysql_num_rows($rs)>0) $mexp = mysql_result($rs,0,'pv');
		mysql_free_result($rs);
		//-----เก็บตำแหน่งปัจจุบัน
		$sql = "SELECT pos_cur from ".$dbprefix."member WHERE mcode='$mcode' ";
		$rs = mysql_query($sql);
		$pos_old = '';
		if(mysql_num_rows($rs)>0) $pos_old = mysql_result($rs,0,'pos_cur');
		mysql_free_result($rs);
		//คำนวณตำแหน่ง
		$flg=false;
		switch ($pos_old){
			case 'S':
				$flg=true;
				break;
			case 'G':
				$flg=false;
				break;
			case 'P':
				$flg=false;
				break;
			case 'D':
				$flg=false;
				break;
			case 'SD':
				$flg=false;
				break;
			case 'CD':
				$flg=false;
				break;
			default:
				$flg=true;
				break;
		}
			if($flg==true){
				$pos_new = $pos_old;
				foreach(array_keys($pos_exp) as $key){
					//echo $key;
					if($mexp>=$pos_exp[$key]){ $pos_new = $key; break;}
				}
				//echo $pos_old."=>".$pos_new;
				if($pos_new != $pos_old && $pos_piority[$pos_new]>$pos_piority[$pos_old]){
					$sql = "UPDATE ".$dbprefix."member SET pos_cur='$pos_new' WHERE mcode='$mcode' LIMIT 1 ";
					//====================LOG===========================
					$text="uid=".$_SESSION["adminuserid"]." action=saleoperate =>$sql";
					writelogfile($text);
					//=================END LOG===========================
					mysql_query($sql);
					$sql = "INSERT INTO ".$dbprefix."poschange (mcode,pos_before,pos_after,date_change) ";
					$sql .= "VALUES('".$mcode."','".$pos_old."','".$pos_new."','".$cur_date."')";
					//====================LOG===========================
					$text="uid=".$_SESSION["adminuserid"]." action=saleoperate =>$sql";
					writelogfile($text);
					//=================END LOG===========================
					mysql_query($sql);
				}
			}
	}
?>