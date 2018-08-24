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
if(isset($_GET['bid'])){
   $bid=$_GET['bid'];
	if($bid=='ALL'){
		$sql="SELECT* FROM ".$dbprefix."ecommision where mcode = '".$_SESSION["usercode"]."' and cancel = 0 and status_tranfer=0 and cmbonus=0";  
		$result = mysql_query($sql) or die(mysql_error());
		   for($i=0;$i<mysql_num_rows($result);$i++){
			$obj = mysql_fetch_object($result);
			$id[$i]=$obj->id;
		   }
	}else{
		$id[]=$bid;
	}

	for($m=0;$m< sizeof($id);$m++ ){

				$sql="SELECT* FROM ".$dbprefix."ecommision WHERE id='".$id[$m]."' and status_tranfer=0 ";
				//echo $sql.'<br>';
				$result=mysql_query($sql);
				if (mysql_num_rows($result)>0) {
					$row = mysql_fetch_object($result);
					$sano = $row->sano;	
					$rcode = $row->rcode;	
					//$sadate = $row->sadate;	
					$xsadate = $row->sadate;	
					$sadate = date("Y-m-d");	
					$mcode = $row->mcode;	
					$total = $row->total;	
				
				$sano_ewallet = gencodesale('E','ewallet');
				  $insert = array(                    
					"sano"           => $sano_ewallet,
					"sadate"         => $sadate,
					"mcode"          => $mcode,                    
					"sa_type"        => 'T',
					"total"          => $total,
					"uid"            => $_SESSION['usercode'],       
					"chkCommission"  => 'on',
					"txtCommission"  => $total,    
					"txtMoney"		 => $total,    
					"checkportal"    => 3,                                                                     
					"id_ecom"        => $id[$m]                                                                    
				); 
			
				insert('ali_ewallet',$insert); 
			
				mysql_query("update ".$dbprefix."member set ewallet=ewallet+'$total',ecom=ecom-'$total' WHERE mcode='".$mcode."' ");
				mysql_query("update ".$dbprefix."ecommision set status_tranfer=1 WHERE id='".$id[$m]."' ");
				$option = "transfer to Ewallet(".$sano_ewallet.") Date : $xsadate ";  
				log_ewallet('ecom',$mcode,$sano,$total,'TO',$sadate,$option);
				$optionx = "transfer from Ecommision Date : $xsadate";  
				log_ewallet('ewallet',$mcode,$sano_ewallet,$total,'I',$sadate,$optionx);  
			}	
	}

   
echo "<script language='JavaScript'>window.top.location.href = 'index.php?sessiontab=3&sub=5'; </script>";    
exit;

}
?>
 