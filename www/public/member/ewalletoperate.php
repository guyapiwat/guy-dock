<? 
session_start();
?>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620">
<?
include("connectmysql.php");
include("prefix.php");
require_once("function.php");
require_once("logtext.php");
require_once("gencode.php");
require_once("global.php");
require_once ("function.log.inc.php");
require_once ("checklogin.php");
include_once("wording".$_SESSION["lan"].".php");
if(isset($_GET['state'])){
   
    
    /*$sql = "SELECT MAX(id) AS id FROM ".$dbprefix."transferewallet_h ";
    $rs = mysql_query($sql);
    $mid = $sano = mysql_result($rs,0,'id');*/
    if($_SESSION["chkewallet"] == '1'){
    //    echo "<script language='JavaScript'>window.location='index.php?sessiontab=4&sub=22';</script>";    
    }
    $_SESSION["chkewallet"] = 1;

    if (isset($_POST["id"])){$id=$_POST["id"];}else{$id="";}
    if (isset($_POST["mcode"])){$mcode=$_POST["mcode"];}else{$mcode="";}    
    if (isset($_POST["inv_code"])){$inv_code=$_POST["inv_code"];}else{$inv_code="";}
    if (isset($_POST["satype"])){$satype=$_POST["satype"];}else{$satype="";}
    if (isset($_POST["sadate"])){$sadate=$_POST["sadate"];}else{$sadate="";}
    if (isset($_POST["sumtotal"])){$total=$_POST["sumtotal"];}else{$total="";}
    if (isset($_POST["sumpv"])){$tot_pv=$_POST["sumpv"];}else{$tot_pv="";}
    if (isset($_POST["sumweight"])){$tot_weight=$_POST["sumweight"];}else{$tot_weight="";}
    if (isset($_POST["sumfv"])){$tot_fv=$_POST["sumfv"];}else{$tot_fv="";}
    if (isset($_POST["radsend"])){$radsend=$_POST["radsend"];}else{$radsend="";}
    if (isset($_POST["chkCash"])){$chkCash=$_POST["chkCash"];}else{$chkCash="";}
    if (isset($_POST["chkFuture"])){$chkFuture=$_POST["chkFuture"];}else{$chkFuture    ="";}
    if (isset($_POST["chkTransfer"])){$chkTransfer=$_POST["chkTransfer"];}else{$chkTransfer="";}
    if (isset($_POST["chkCredit1"])){$chkCredit1=$_POST["chkCredit1"];}else{$chkCredit1="";}
    if (isset($_POST["chkCredit2"])){$chkCredit2=$_POST["chkCredit2"];}else{$chkCredit2="";}
    if (isset($_POST["chkCredit3"])){$chkCredit3=$_POST["chkCredit3"];}else{$chkCredit3="";}
    if (isset($_POST["chkInternet"])){$chkInternet=$_POST["chkInternet"];}else{$chkInternet="";}
    if (isset($_POST["chkDiscount"])){$chkDiscount=$_POST["chkDiscount"];}else{$chkDiscount="";}
    if (isset($_POST["chkOther"])){$chkOther=$_POST["chkOther"];}else{$chkOther="";}
    if (isset($_POST["txtCash"])){$txtCash=$_POST["txtCash"];}else{$txtCash="";}
    if (isset($_POST["txtFuture"])){$txtFuture=$_POST["txtFuture"];}else{$txtFuture="";}
    if (isset($_POST["txtTransfer"])){$txtTransfer=$_POST["txtTransfer"];}else{$txtTransfer="";}
    if (isset($_POST["txtCredit1"])){$txtCredit1=$_POST["txtCredit1"];}else{$txtCredit1="";}
    if (isset($_POST["txtCredit2"])){$txtCredit2=$_POST["txtCredit2"];}else{$txtCredit2="";}
    if (isset($_POST["txtCredit3"])){$txtCredit3=$_POST["txtCredit3"];}else{$txtCredit3="";}
    if (isset($_POST["txtInternet"])){$txtInternet=$_POST["txtInternet"];}else{$txtInternet="";}
    if (isset($_POST["txtDiscount"])){$txtDiscount=$_POST["txtDiscount"];}else{$txtDiscount="";}
    if (isset($_POST["txtOther"])){$txtOther=$_POST["txtOther"];}else{$txtOther="";}
    if (isset($_POST["optionCash"])){$optionCash=$_POST["optionCash"];}else{$optionCash="";}
    if (isset($_POST["optionFuture"])){$optionFuture=$_POST["optionFuture"];}else{$optionFuture="";}
    if (isset($_POST["optionTransfer"])){$optionTransfer=$_POST["optionTransfer"];}else{$optionTransfer="";}
    if (isset($_POST["optionCredit1"])){$optionCredit1=$_POST["optionCredit1"];}else{$optionCredit1="";}
    if (isset($_POST["optionCredit2"])){$optionCredit2=$_POST["optionCredit2"];}else{$optionCredit2="";}
    if (isset($_POST["optionCredit3"])){$optionCredit3=$_POST["optionCredit3"];}else{$optionCredit3="";}
    if (isset($_POST["optionInternet"])){$optionInternet=$_POST["optionInternet"];}else{$optionInternet="";}
    if (isset($_POST["optionDiscount"])){$optionDiscount=$_POST["optionDiscount"];}else{$optionDiscount="";}
    if (isset($_POST["optionOther"])){$optionOther=$_POST["optionOther"];}else{$optionOther="";}
    if (isset($_POST["txtoption"])){$txtoption=$_POST["txtoption"];}else{$txtoption="";}
    if (isset($_POST["txtMoney"])){$txtMoney=$_POST["txtMoney"];}else{$txtMoney="";}
    if (isset($_POST["caddress"])){$caddress=$_POST["caddress"];}else{$caddress="";}
    if (isset($_POST["cprovince"])){$cprovince=$_POST["cprovince"];}else{$cprovince="";}
    if (isset($_POST["camphur"])){$camphur=$_POST["camphur"];}else{$camphur="";}
    if (isset($_POST["cdistrict"])){$cdistrict=$_POST["cdistrict"];}else{$cdistrict="";}
    if (isset($_POST["czip"])){$czip=$_POST["czip"];}else{$czip="";}
    if (isset($_POST["chkaddress"])){$chkaddress=$_POST["chkaddress"];}else{$chkaddress="0";}
    if (isset($_POST["spayment"])){$spayment=$_POST["spayment"];}else{$spayment="0";}
    if (isset($_POST["sv_code"])){$sv_code=$_POST["sv_code"];}else{$sv_code="";}

}
//echo $spayment;
//exit;
//$selectch = "select name_t,name_f from  ".$dbprefix."member where mcode = '$mcode'";
//$rsch = mysql_query($selectch);
//    $name_t = mysql_result($rsch,0,'name_t');
//    $name_f = mysql_result($rsch,0,'name_f');

 
if($_SESSION["sv_code"] != $sv_code or empty($sv_code)){
            echo "<script language='JavaScript'>alert('".$wording_lan["tab1_mem_111"]."');window.location='index.php?sessiontab=4&sub=22&state=1;'</script>";
            exit;

}

if($_SESSION["usercode"] == $mcode){
            echo "<script language='JavaScript'>alert('".$wording_lan["info_main_1"]["55"]."');window.location='index.php?sessiontab=4&sub=22&state=1;'</script>";
            exit;

}
$sadate = $_SESSION["datetimezone"];
$arr_member = searchmember($dbprefix,$mcode);

        $sql="SELECT * FROM ".$dbprefix."member where ewallet < '$txtMoney' and mcode = '".$_SESSION["usercode"]."' ";
        $rs = mysql_query($sql);
        if(mysql_num_rows($rs) > 0 or $txtMoney <= 0)
        {
        //    echo 's';
            echo "<script language='JavaScript'>alert('".$wording_lan["tab1_mem_112"]."');window.location='index.php?sessiontab=4&sub=22&state=1;'</script>";
            exit;
        }

$total = $txtMoney;

    $sqlewallet = " select ewallet,mobile,name_f,name_t from ".$dbprefix."member where mcode = '".$mcode."'";
    //cho $sqlewallet;
    $rsewallet = mysql_query($sqlewallet);
    $ewallet_before=mysql_result($rsewallet,0,'ewallet');
    $mobile=mysql_result($rsewallet,0,'mobile');
    $name_f=mysql_result($rsewallet,0,'name_f');
    $name_t=mysql_result($rsewallet,0,'name_t');
    $ewallet_after = $ewallet_before-$total;

if($_GET['state']==0){
    $satype = 'T';
    //$mid = ++$sano;
    logtext(true,$_SESSION['usercode'],'Ewallet',$mid);
        //$hdate = date("Y-m", strtotime("+1 months")).'-20';
        $hdate = $_SESSION["datetimezone_last"];
    $bprice = $total*$GLOBALS["crate"];
    
    $sql = "SELECT MAX(id) AS id ,MAX(sano) as sano FROM ".$dbprefix."ewallet_tranfer   ";
    $rs = mysql_query($sql);
    $mid = mysql_result($rs,0,'id')+1;
    $sano = gencodesale_ewallet('EO','ewallet_tranfer');
    mysql_free_result($rs);
    $sanoewallet = $sano;

    $sql="insert into ".$dbprefix."ewallet_tranfer (id,  sano, sadate,  mcode,smcode,  sa_type, inv_code,  total,bprice,  uid,lid,send,txtoption
    ,txtMoney,chkCash,chkFuture,chkTransfer,chkCredit1,chkCredit2,chkCredit3,chkWithdraw,txtCash,txtFuture,txtTransfer,txtCredit1,txtCredit2,txtCredit3
    ,txtWithdraw,optionCash,optionFuture,optionTransfer,optionCredit1,optionCredit2,optionCredit3,optionWithdraw,ewallet_before,ewallet_after,checkportal,locationbase,name_f,name_t,mbase,crate
    
    ) values ('$mid' ,'$sano' ,'$sadate' ,'".$_SESSION['usercode']."','$mcode', '$satype' ,'$inv_code' ,'$txtMoney','$bprice' ,'".$_SESSION['usercode']."','','$radsend','$txtoption'
    ,'0','$chkCash','$chkFuture','$chkTransfer','$chkCredit1','$chkCredit2','$chkCredit3','on','$txtCash','$txtFuture',
    '$txtTransfer','$txtCredit1','$txtCredit2','$txtCredit3','$txtMoney','$optionCash','$optionFuture','$optionTransfer','$optionCredit1','$optionCredit2','$optionCredit3','','".$ewallet_before."','".$ewallet_after."','3','','$name_f','$name_t','".$arr_member["locationbase"]."','".$_SESSION["inv_crate"]."'
    ) ";
    //====================LOG===========================
    
    $text="uid=".$_SESSION["usercode"]." action=ewalletoperate =>$sql";
    writelogfile($text);
    if (! mysql_query($sql)) {
//            echo "<font color='#FF0000'>error</font><br>";
//            echo  "$sql";        
        echo "<script language='JavaScript'>alert('".$wording_lan["tab1_mem_109"]."');window.location='index.php?sessiontab=4&sub=22&state=1;'</script>";
        exit;
    }


    $sql = "SELECT MAX(id) AS id ,MAX(sano) as sano FROM ".$dbprefix."ewallet_tranfer   ";
    $rs = mysql_query($sql);
    $mid = mysql_result($rs,0,'id')+1;
    $sano = gencodesale_ewallet('EI','ewallet_tranfer');
    mysql_free_result($rs);


    $sql="insert into ".$dbprefix."ewallet_tranfer (id,  sano, sadate,  mcode,  sa_type, inv_code,  total,bprice,  uid,lid,send,txtoption,
    txtMoney,chkCash,chkFuture,chkTransfer,chkCredit1,chkCredit2,chkCredit3,chkInternet,txtCash,txtFuture,txtTransfer,txtCredit1,txtCredit2,txtCredit3
    ,txtInternet,optionCash,optionFuture,optionTransfer,optionCredit1,optionCredit2,optionCredit3,optionInternet,ewallet_before,ewallet_after,checkportal,locationbase,name_f,name_t,mbase,crate
    
    ) values ('$mid' ,'$sano' ,'$sadate' ,'$mcode', '$satype' ,'$inv_code' ,'$txtMoney','$bprice' ,'".$_SESSION['usercode']."','','$radsend','$txtoption'
    ,'0','$chkCash','$chkFuture','$chkTransfer','$chkCredit1','$chkCredit2','$chkCredit3','on','$txtCash','$txtFuture',
    '$txtTransfer','$txtCredit1','$txtCredit2','$txtCredit3','$txtMoney','$optionCash','$optionFuture','$optionTransfer','$optionCredit1','$optionCredit2','$optionCredit3','','".$ewallet_before."','".$ewallet_after."','3','','$name_f','$name_t','".$arr_member["locationbase"]."','".$_SESSION["inv_crate"]."'
    ) ";
    //====================LOG===========================
    
    $text="uid=".$_SESSION["usercode"]." action=ewalletoperate =>$sql";
    writelogfile($text);
    if (! mysql_query($sql)) {
//            echo "<font color='#FF0000'>error</font><br>";
//            echo  "$sql";        
        echo "<script language='JavaScript'>alert('".$wording_lan["tab1_mem_109"]."');window.location='index.php?sessiontab=4&sub=22&state=1;'</script>";
        exit;
    }
    mysql_query("update ".$dbprefix."member set ewallet = ewallet-".$txtMoney.", bewallet = bewallet-".$bprice." where mcode='".$_SESSION['usercode']."' ");
    mysql_query("update ".$dbprefix."member set ewallet = ewallet+".$txtMoney.", bvoucher = bewallet+".$bprice." where mcode='".$mcode."' ");

//    log_ewallet('ewallet',$mcode,$sanoewallet,$txtMoney,'T',$sadate,'');  
 //   log_ewallet('ewallet',$mcode,$sano,$txtMoney,'I',$sadate,'');  
    
    //minusEwallet($dbprefix,$_SESSION['usercode'],$total);
        logtext(true,$_SESSION['usercode'],'ewallet',$total);
    //====================LOG===========================
$text="uid=".$_SESSION["usercode"]." action=saleoperate =>$sql";
writelogfile($text);
//=================END LOG===========================
    //mysql_query($sql);    
}

//exit;
echo "<script language='JavaScript'>window.location='index.php?sessiontab=4&sub=24';</script>";    
exit;

?>

<?

function keysend($dbprefix,$mid,$pcode,$inv_code,$qty,$weight,$totalprice){
    $sql="SELECT pdesc,price,pv FROM ".$dbprefix."product_package where pcode = '".$pcode."'";
    $rs = mysql_query($sql);
    if(mysql_num_rows($rs) > 0)
    {
        for($m=0;$m<mysql_num_rows($rs);$m++){
            
            $sqlObj = mysql_fetch_object($rs);
            $pdesc =$sqlObj->pdesc;
            $price =$sqlObj->price;
            $pv =$sqlObj->pv;
        }
    }else{
        $sql="SELECT pdesc,price,pv  FROM ".$dbprefix."product where pcode = '".$pcode."'";
        $rs = mysql_query($sql);
        if(mysql_num_rows($rs) > 0)
        {
            $sqlObj = mysql_fetch_object($rs);
            $pdesc =$sqlObj->pdesc;
            $price =$sqlObj->price;
            $pv =$sqlObj->pv;
        }
    }
    $sql="insert into ".$dbprefix."transfersale_d (sano,pcode,pdesc,price,pv,weight,qty,amt,inv_code) values ('$mid','$pcode','$pdesc','$price' ,'$pv','$weight','$qty','$totalprice','$inv_code') ";
    mysql_query($sql);

}

function gencodesale_ewallet($sanof,$table){

	require_once 'connectmysql.php';

		//$sano_f = $sanof.$_SESSION["inv_cshort"].$_SESSION["admininvent"];
		//$admininvent = substr($_SESSION["admininvent"],0,5);
		$sano_f = $sanof;
		//$inv_l = $_SESSION["inv_locationbase"];
			
		$sql = "SELECT  MAX(sano) as sano  FROM ali_".$table." where sano LIKE '$sanof%' order by id DESC limit 0,1 ";
		$rs = mysql_query($sql);
		if(mysql_num_rows($rs) > 0){
			$csano = substr(mysql_result($rs,0,'sano'),-6);
		}
		else
		{
			$csano = '000001';
		}
		
		//	$csano = explode('-',$csano);
		//var_dump($csano);
		$tsano = $csano+1;
		//$csano = substr($csano,4,11);
		$sano = $csano+1;		
		//$tsano = $csano;
		//echo $csano[0]. '<br>';
		//$tsano = substr($sano, 0, 6);
		//$sano = substr($sano, 6, 6);
		$year = date('Y');
		$month = date('m');
		//$day = date('d');
		//$year = $year;
		$year = substr($year,2,2);
		$fsano = $year.$month;
		//echo $fsano.' '.$tsano.'<br>';
		//exit;
		$sano = gencode6($sano);
		$sano = $sano_f.$fsano.$sano;
		//echo $sano .'<br>';
		//exit;
		return $sano; 
}

?>

