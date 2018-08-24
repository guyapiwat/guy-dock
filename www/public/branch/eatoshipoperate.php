<?session_start();?>
<meta http-equiv="Content-Language" content="th">
<meta http-equiv="Content-Type" content="text/html; charset=tis-620">
<? 

if($_SESSION["perbuy"] == 0){
echo "<script language='JavaScript'>window.location='index.php?sessiontab=6&sub=1417'</script>";
exit;
}
include("connectmysql.php");
include("prefix.php");
require("adminchecklogin.php");
require_once("function.php");
require_once("logtext.php");
require_once ("function.log.inc.php");
include("gencode.php");
include("global.php");


if(isset($_GET['state'])){

    
    if (isset($_POST["id"])){$id=$_POST["id"];}else{$id="";}
    if (isset($_POST["mcode"])){$mcode=$_POST["mcode"];}else{$mcode="";}    
    if (isset($_POST["inv_code"])){$inv_code=$_POST["inv_code"];}else{$inv_code="";}
    if (isset($_POST["satype"])){$satype=$_POST["satype"];}else{$satype="";}
    if (isset($_POST["sadate"])){$sadate=$_POST["sadate"];}else{$sadate="";}
    if (isset($_POST["sumtotal"])){$total=$_POST["sumtotal"];}else{$total="";}
    if (isset($_POST["sumpv"])){$tot_pv=$_POST["sumpv"];}else{$tot_pv="";}
    if (isset($_POST["sumbv"])){$tot_bv=$_POST["sumbv"];}else{$tot_bv="";}
    if (isset($_POST["sumfv"])){$tot_fv=$_POST["sumfv"];}else{$tot_fv="";}
    if (isset($_POST["txtMoney"])){$txtMoney=$_POST["txtMoney"];}else{$txtMoney="";}
    if (isset($_POST["chkCash"])){$chkCash=$_POST["chkCash"];}else{$chkCash="";}
    if (isset($_POST["chkFuture"])){$chkFuture=$_POST["chkFuture"];}else{$chkFuture    ="";}
    if (isset($_POST["chkTransfer"])){$chkTransfer=$_POST["chkTransfer"];}else{$chkTransfer="";}
    if (isset($_POST["chkCredit1"])){$chkCredit1=$_POST["chkCredit1"];}else{$chkCredit1="";}
    if (isset($_POST["chkCredit2"])){$chkCredit2=$_POST["chkCredit2"];}else{$chkCredit2="";}
    if (isset($_POST["chkCredit3"])){$chkCredit3=$_POST["chkCredit3"];}else{$chkCredit3="";}
    if (isset($_POST["txtCash"])){$txtCash=$_POST["txtCash"];}else{$txtCash="";}
    if (isset($_POST["txtFuture"])){$txtFuture=$_POST["txtFuture"];}else{$txtFuture="";}
    if (isset($_POST["txtTransfer"])){$txtTransfer=$_POST["txtTransfer"];}else{$txtTransfer="";}
    if (isset($_POST["txtCredit1"])){$txtCredit1=$_POST["txtCredit1"];}else{$txtCredit1="";}
    if (isset($_POST["txtCredit2"])){$txtCredit2=$_POST["txtCredit2"];}else{$txtCredit2="";}
    if (isset($_POST["txtCredit3"])){$txtCredit3=$_POST["txtCredit3"];}else{$txtCredit3="";}
    if (isset($_POST["optionCash"])){$optionCash=$_POST["optionCash"];}else{$optionCash="";}
    if (isset($_POST["optionFuture"])){$optionFuture=$_POST["optionFuture"];}else{$optionFuture="";}
    if (isset($_POST["optionTransfer"])){$optionTransfer=$_POST["optionTransfer"];}else{$optionTransfer="";}
    if (isset($_POST["optionCredit1"])){$optionCredit1=$_POST["optionCredit1"];}else{$optionCredit1="";}
    if (isset($_POST["optionCredit2"])){$optionCredit2=$_POST["optionCredit2"];}else{$optionCredit2="";}
    if (isset($_POST["optionCredit3"])){$optionCredit3=$_POST["optionCredit3"];}else{$optionCredit3="";}
    if (isset($_POST["txtoption"])){$txtoption=$_POST["txtoption"];}else{$txtoption="";}
	$txtMoney = $total;
}
 
if($_GET['state']==0){
    $mid = ++$sano;

//check
$d=explode('-',$sadate);
$dateAuto=$d[0].'-'.$d[1];
$tott=0;
	$sqll="SELECT sum(total) as tot_eato FROM ali_eatoship WHERE cancel=0 and sadate LIKE '%$dateAuto%' and mcode ='$mcode'  ";
	$ress=mysql_query($sqll);
	if(mysql_num_rows($ress)>0){
		$objj=mysql_fetch_object($ress);
		$tott=$objj->tot_eato;	
	}	/*
	$sqll="SELECT sum(ato) as tot_eato FROM ali_commission WHERE  fdate LIKE '%$dateAuto%' and mcode ='$mcode'";
	$ress=mysql_query($sqll);
	if(mysql_num_rows($ress)>0){
		$objj=mysql_fetch_object($ress);
		$tott+=$objj->tot_eato;	
	}	  */

	$total=$tott+$txtMoney;


	if($total > 2200){
         echo "<script language='JavaScript'>alert('ไม่สามารถเติมเกิน 2200 ต่อเดือนได้ค่ะ');history.back();</script>";
        exit;

	}
    
    if(!empty($mcode))$sqlewallet = " select ewallet,mobile,name_f,name_t from ".$dbprefix."member where mcode = '".$mcode."'";
    //echo $sqlewallet;
    $rsewallet = mysql_query($sqlewallet);
    $ewallet_before=mysql_result($rsewallet,0,'ewallet');
    $mobile=mysql_result($rsewallet,0,'mobile');
    $name_f=mysql_result($rsewallet,0,'name_f');
    $name_t=mysql_result($rsewallet,0,'name_t');
    $ewallet_after = $ewallet_before+$txtMoney;
    

    $bprice = $GLOBALS["crate"]*$txtMoney;


    $sql = "SELECT MAX(id) AS id ,MAX(sano) as sano FROM ".$dbprefix."eatoship   ";
    $rs = mysql_query($sql);
    $mid = mysql_result($rs,0,'id')+1;
    $sano = gencodesale1('A','eatoship');
	//echo $sano;
	//exit;
    mysql_free_result($rs);


    $sql="insert into ".$dbprefix."eatoship (id,  sano, sadate,  mcode,  sa_type, inv_code,  total,bprice,  uid,lid,send,txtoption,
    txtMoney,chkCash,chkFuture,chkTransfer,chkCredit1,chkCredit2,chkCredit3,txtCash,txtFuture,txtTransfer,txtCredit1,txtCredit2,txtCredit3,
    optionCash,optionFuture,optionTransfer,optionCredit1,optionCredit2,optionCredit3,ewallet_before,ewallet_after,checkportal,locationbase,name_f,name_t,mbase,crate
    
    ) values ('$mid' ,'$sano' ,'$sadate' ,'$mcode', 'I' ,'$inv_code' ,'$txtMoney','$bprice' ,'".$_SESSION['inv_usercode']."','".$_SESSION['admininvent']."','$radsend','$txtoption'
    ,'$txtMoney','$chkCash','$chkFuture','$chkTransfer','$chkCredit1','$chkCredit2','$chkCredit3','$txtCash','$txtFuture',
    '$txtTransfer','$txtCredit1','$txtCredit2','$txtCredit3','$optionCash','$optionFuture','$optionTransfer','$optionCredit1','$optionCredit2','$optionCredit3','".$ewallet_before."','".$ewallet_after."','2','".$_SESSION["inv_locationbase"]."','$name_f','$name_t','".$arr_member["locationbase"]."','".$_SESSION["inv_crate"]."'
    ) ";
    //echo $sql;
    //exit;
    //====================LOG===========================
    logtext(true,$_SESSION['inv_usercode'],'เติม  Eatusohip รหัส : '.$mid.' จำนวน : '.$txtMoney.' ยอดเดิม :'.$ewallet_before.' คงเหลือ : '.$ewallet_after,$mid);
$text="uid=".$_SESSION["inv_usercode"]." action=ewalletoperate =>$sql";
writelogfile($text);
if (! mysql_query($sql)) {
//            echo "<font color='#FF0000'>error</font><br>";
//            echo  "$sql";        
        echo "<script language='JavaScript'>alert('".$wording_lan["operate"]["6"]."');window.location='index.php?sessiontab=6&sub=1417'</script>";
        exit;
    }

	// update credit branch
	

if(empty($inv_code)){
mysql_query("update ".$dbprefix."member set eatoship = eatoship+".$txtMoney." where mcode='".$mcode."' ");
//log_ewallet('eatoship',$mcode,$sano,$txtMoney,'I',$sadate,'test insert');
$option = "Eautoship (".$sano.") Date : $sadate";
log_ewallet('eatoship',$mcode,$sano,$txtMoney,'I',$sadate,$option); 
}else if(empty($mcode)){
mysql_query("update ".$dbprefix."invent set eatoship = eatoship+".$txtMoney." where inv_code='".$inv_code."' ");
}

//====================LOG===========================
 
if($GLOBALS["status_member"] == 1){
                if(!empty($mobile)){
                    $msisdn = $mobile;
                    $ewallett = $ewallet_before+$txtMoney;
                    
                    $message = "เติม Ewallet สำเร็จ
รหัสสมาชิก $mcode
เติม $txtMoney บ
คงเหลือ $ewallett บ";
                   // if($arr_member["locationbase"]=='1')sendsms($dbprefix,$msisdn,$message,$ScheduledDelivery="",$mcode);
                }
        }
}else if($_GET['state']==1){
    /*logtext(true,$_SESSION['adminusercode'],'แก้ไข Ewallet',$mid);
    $sql="update ".$dbprefix."ewallet set sano='$id', id='$id', ";
    $sql.="mcode='$mcode' ,sa_type='$satype' ,sadate='$sadate' , inv_code='$inv_code', total='$total', txtoption='$txtoption'
    , txtMoney='$txtMoney', chkCash='$chkCash', chkTransfer='$chkTransfer', chkCredit1='$chkCredit1', chkCredit2='$chkCredit2'
    , chkCredit3='$chkCredit3', txtCash='$txtCash', txtTransfer='$txtTransfer', txtCredit1='$txtCredit1', txtCredit2='$txtCredit2'
    , txtCredit3='$txtCredit3', optionCash='$optionCash', optionTransfer='$optionTransfer', optionCredit1='$optionCredit1', optionCredit2='$optionCredit2'
    , optionCredit3='$optionCredit3'
    
    where id= '$id' ";
    //====================LOG===========================
$text="uid=".$_SESSION["adminusercode"]." action=ewalletoperate =>$sql";
writelogfile($text);
//=================END LOG===========================
    mysql_query($sql);*/
}
$_SESSION["perbuy"] = 0;
echo "<script language='JavaScript'>window.open('invoice_eatoship.php?bid=".$mid."');window.location='index.php?sessiontab=6&sub=147'</script>";    

?>

