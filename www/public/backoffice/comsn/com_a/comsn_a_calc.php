<script language="javascript">
function checkround(){
	if(document.getElementById("ftrcode").value==""){
		alert("��س�����ͺ��äӹǳ");
		document.getElementById("ftrcode").focus();
		return false;
	}else{
		var numCheck = document.getElementById("ftrcode").value;
		var numVal = numCheck.split("-");
		if(numVal.length>2){
			alert("��سҡ�͡�ٻẺ�ͺ��äӹǳ���١��ͧ");
			return false;
		}
	}
	document.rform.submit();
}
function chknum(key){
	if((key>=48&&key<=57)||key==45)
		return true;
	else
		return false;
}
</script>
<? include("connectmysql.php");?>
<? include("prefix.php");?>
<? include("global.php");?>
<? require_once ("function.log.inc.php");?>
<? require_once ("comsn_a_calc_func.php");?>
<? require_once("gencode.php");?>
<?

set_time_limit( 0);
ini_set("memory_limit","1024M");
ob_start();
if(!isset($_REQUEST["ftrcode"])){
	showdialog();
}else{ ?>
<br />
<table width="95%" border="0" align="center">
  <tr>
    <td align="center">
	<?
		$ftrcode = $_REQUEST["ftrcode"];
		if (strpos($ftrcode,"-")===false){
			//�ͺ������� == �ͺ����ش
			$ftrc[0]=$ftrcode;
			$ftrc[1]=$ftrcode;
		}else{
			$ftrc = explode('-',$ftrcode);
		}
		if($ftrc[0]>$ftrc[1]){
			?><FONT COLOR="#ff0000">�ͺ������� ��ͧ���¡���������ҡѺ �ͺ����ش ��س�����ͺ��äӹǳ����</FONT><?
			showdialog();
			exit;
		}else{
		$rof = $ftrc[0];
		$rot = $ftrc[1];

//================================================================================

$sql = "select * from ".$dbprefix."around where rcode between '".$rof."' and '".$rot."' and calc='1'";
$result = mysql_query($sql);
for($i=0;$i<mysql_num_rows($result);$i++){
	$data = mysql_fetch_object($result);
	?><font color="#ff0000">�ͺ <?=$data->rcode?> �ӹǳ����� <br /></font><?
}
mysql_free_result($result);
if($i>0){
	?><font color="#ff0000">��ͧź��äӹǳ����Ԫ��� �ͺ����͹ �֧�Фӹǳ������<br /></font><?
	showdialog();
	exit;
}		
$step="1";
$time_start = getmicrotime();
echo "�������äӹǳ ".date("Y-m-d H:i:s")." ".strtotime("now"),"<BR>";
echo "1.����Ѻ�����ͺ Ro �����ҧ Frcode-Trcode � around<BR>";
for($ro=$ftrc[0];$ro<=$ftrc[1];$ro++){
	$sql="select * from ".$dbprefix."around where  rcode='".$ro."'  ";
	$result=mysql_query($sql);
	if (mysql_num_rows($result)>'0') {
		$row= mysql_fetch_array($result, MYSQL_ASSOC);
		$fsano=$row["fsano"];
		$tsano=$row["tsano"];
		$tdate=$row["tdate"];
		$fdate=$row["fdate"];
		$rdate=$row["rdate"];
		$fpdate=$row["fpdate"];
		$tpdate=$row["tpdate"];
		$paydate=$row["paydate"];

		//----------------------------------------����ᨧ-----------------------------------//
		$sql="SELECT id,mcode,hpv,htotal,hdate,locationbase,name_f,name_t,crate FROM ".$dbprefix."asaleh where sa_type = 'H' and hdate <= '$tdate' and hdate <> '0000-00-00' and (hpv >0 or htotal >0) and cancel = 0  ";
		$rs = mysql_query($sql);
		for($i=0;$i<mysql_num_rows($rs);$i++){
			$sqlObj = mysql_fetch_object($rs);
			$sano =$sqlObj->id;		
			$smcode =$sqlObj->mcode;
			$shpv =$sqlObj->hpv;
			$shtotal =$sqlObj->htotal;
			$cdate = $sqlObj->hdate;
			$locationbase = $sqlObj->locationbase;
			$name_f =$sqlObj->name_f;
			$name_t =$sqlObj->name_t;
			$crate = $sqlObj->crate;
			$bprice = $shtotal*$crate;
			$sql = "SELECT MAX(id) AS id FROM ".$dbprefix."holdhead ";
			$rs2 = mysql_query($sql);
			$mid = $hono = mysql_result($rs2,0,'id');
			$mid = ++$hono;   //-----------�Ţ���+1
			$sql="insert into ".$dbprefix."holdhead (id, hono, sano, sadate,  mcode,  sa_type, inv_code,  total, tot_pv, uid,bmcauto ,locationbase,bprice,crate,name_f,name_t) values ('$mid' ,'$hono' ,'".$sano."' ,'".$cdate."' ,'$smcode', 'A' ,'' ,'$shtotal' ,'$shpv' ,'system','1','$locationbase','$bprice','$crate','$name_f','$name_t') ";
			mysql_query($sql);

			$sql = "SELECT ".$dbprefix."asaled.pcode,".$dbprefix."asaled.pdesc,".$dbprefix."asaled.price,";
			$sql .= $dbprefix."asaled.pv,(".$dbprefix."asaled.qty-IFNULL(SUM(".$dbprefix."holddesc.qty),0)) AS qty FROM ".$dbprefix."asaled ";
			$sql .= "LEFT JOIN ".$dbprefix."holdhead ON (".$dbprefix."asaled.sano=".$dbprefix."holdhead.sano and ".$dbprefix."holdhead.cancel=0 ) ";
			$sql .= "LEFT JOIN ".$dbprefix."holddesc ";
			$sql .= "ON (".$dbprefix."holdhead.hono=".$dbprefix."holddesc.hono AND ".$dbprefix."holddesc.pcode=".$dbprefix."asaled.pcode) ";
			$sql .= "WHERE ".$dbprefix."asaled.sano='".$sano."'  GROUP BY pcode";
			$rs1 = mysql_query($sql);
			for($j=0;$j<mysql_num_rows($rs1);$j++){
				$sqlObj1 = mysql_fetch_object($rs1);
					$pcode =$sqlObj1->pcode;
					$pdesc =$sqlObj1->pdesc;
					$price =$sqlObj1->price;
					$pv =$sqlObj1->pv;
					$qty =$sqlObj1->qty;
					$totalprice = $price*$qty;

					$sql="SELECT weight,bprice FROM ".$dbprefix."product_package where pcode = '".$pcode."'";
					$rsvv = mysql_query($sql);
					if(mysql_num_rows($rsvv) > 0)
					{
						for($m=0;$m<mysql_num_rows($rs);$m++){
							
							$sqlObjvv = mysql_fetch_object($rsvv);
							$bpriced =$sqlObjvv->bprice;	
						}
					}else{
						$sql="SELECT weight,bprice FROM ".$dbprefix."product where pcode = '".$pcode."'";
						$rsvv = mysql_query($sql);
						if(mysql_num_rows($rsvv) > 0)
						{
							$sqlObjvv = mysql_fetch_object($rsvv);
							$bpriced =$sqlObjvv->bprice;	
						}
					}

					$sql="insert into ".$dbprefix."holddesc (hono,pcode,pdesc,price,pv,qty,amt,locationbase,crate,bprice) values ('$mid','$pcode','$pdesc','$price' ,'$pv','$qty','$totalprice','$locationbase','$crate','$bpriced') ";
					if($qty>0)mysql_query($sql);
			}
            updatePos($dbprefix,$smcode,$cdate,$shpv,'A');   //-----------�ѿഴ���˹�-----------//
			mysql_query("update ".$dbprefix."asaleh set hpv=0,htotal=0,bmcauto=1 where id = '$sano'"); //----�ѿ����ŷ��١ᨧ������ 0
		}
		//-----�� ����ᨧ -----//

		echo "<BR><BR>�ӹǳ⺹���ͺ��� RO=$ro<BR>";
		$sql2 = " select * from ".$dbprefix."around where rcode >= '$ro' order by rid desc ";
        $rs12 = mysql_query($sql2);
        if (mysql_num_rows($rs12)>0) {
            for($x=0;$x<mysql_num_rows($rs12);$x++){
                $sqlObj = mysql_fetch_object($rs12);
                $xrcode =$sqlObj->rcode;        
                $xcalc =$sqlObj->calc;        
                $xfdate =$sqlObj->fdate;    
                $xtdate =$sqlObj->tdate;       
				//-----------�¡��ԡ��� ��ҧ � -------------------//
				return_ewallet($dbprefix,'ewallet',$xrcode,$xtdate,'A');
				return_ewallet($dbprefix,'eatoship',$xrcode,$xtdate,'A');
                mysql_query("update ".$dbprefix."asaleh set cancel ='1' where rcode = '".$xrcode."' and scheck = 'ato'");
                $xaround = array('calc'=>'','calc_date' => "0000-00-00 00:00:00",'timequery' => 0);
                update('ali_around',$xaround," rcode='$xrcode' "); 
            } 
        }   
		del_cals($dbprefix,$ro,array('apv','ac','ambonus'));		
		del_cals($dbprefix,$ro,array('bm','bm1','bmbonus'));				
		del_cals($dbprefix,$ro,array('eatoship','commission','log_wallet','ewallet_commission'));
		
		$sql="update ".$dbprefix."global set statusformat ='close' "; //-----�ѿഴʶҹС����ҹ�������Ѻ member (�Դ�����ҹ�ǻ)-------//
		mysql_query($sql);
		//-----���¡��ѧ��蹤ӹǹ ����Ԫ���----------//
		fnc_calc_fast_bonus($dbprefix,$ro,$fdate,$tdate,$fpdate,$tpdate);//fast start
		fnc_calc_b_bonus($dbprefix,$ro,$fdate,$tdate,$fpdate,$tpdate);//w/s	
		fnc_summary_bonus($dbprefix,$ro,$fdate,$tdate,$fpdate,$tpdate);//commission/Autoship
		fnc_calc_stamp_wallet($dbprefix,$ro,$fdate,$tdate,$fpdate,$tpdate);//stamp wallet
		//------��������㹡�äӹǹ------------//
		$time_end = getmicrotime();
		$time = $time_end - $time_start;
		$sql="update ".$dbprefix."around set calc='1',calc_date = '".date("Y-m-d H:i:s")."',timequery = '".$time."',uid='".$_SESSION['adminusercode']."' where rcode='$ro' ";
		if(mysql_query($sql))mysql_query("COMMIT");
		$sql="update ".$dbprefix."global set statusformat ='open'"; //-----�ѿഴʶҹС����ҹ�������Ѻ member (�Դ�����ҹ�ǻ)-------//
		mysql_query($sql);
	}
	mysql_free_result($result);
	//$ro �����ҧ Frcode-Trcode/////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////
}

echo "<b><font color=green>";
echo "����ش��äӹǳ ".date("Y-m-d H:i:s")." ".strtotime("now"),"<BR>";
echo "��äӹǳ�����ҷ����� $time �Թҷ�<BR>";
echo "</b></font>";

	} //end else 
	?>
	</td>
	</tr>
</table>
<br />
<?
}//end else
function showdialog(){
?>
<table width="95%"><tr><td><br />
<form name="rform" method="post" action="./index.php?sessiontab=4&sub=2">
<table width="40%" border="1" cellpadding="0" cellspacing="0" bordercolor="#FF7F00" align="center">
  <tr>
    <td colspan="2" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center">��͡�ͺ��äӹǳ⺹�ʷ���ͧ��äӹǹ�� 1-9</td>
	<tr>
	<td colspan="2" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.��Ǩ�ͺ��û�Ѻ���˹�</td>
	</tr>
	<tr>
	<td colspan="2" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.��Ǩ�ͺ����ѡ���ʹ</td>
	</tr>
	<tr>
	<td colspan="2" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3.�ӹǳ����Ԫ��蹼���й�</td>
	<tr>
	<td colspan="2" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4.�ӹǳ����Ԫ��蹺����÷�����</td>
	</tr>
	<tr>
	<td colspan="2" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5.�ӹǳ������</td>
	</tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="40%" align="right">�ͺ&nbsp;&nbsp;</td>
    <td width="60%">
      <input type="text" name="ftrcode" id="ftrcode" onkeypress="return chknum(window.event.keyCode)" /></td>
  </tr>
  <tr align="center">
    <td colspan="2">&nbsp;&nbsp;<input type="button" name="Submit" value="�ӹǳ�����" onClick="checkround()"></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
</td></tr></table>
<?
}

?>