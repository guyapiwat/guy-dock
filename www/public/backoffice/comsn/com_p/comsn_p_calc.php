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
<?
//select * from gug_ad WHERE (rcode_l >=367 and rcode_l <=367) or (rcode_r >=367 and rcode_r <=367) ORDER BY rcode_l,mcode 
set_time_limit( 0);
ini_set("memory_limit","200M");
ob_start();
?><font color="#ff0000">Demo ��������ö�ӹǳ��<br /></font><?
				//showdialog();
				exit;
if(!isset($_POST["ftrcode"])){
	showdialog();
}else{ ?>
<br />
<table width="95%" border="0" align="center">
  <tr>
    <td align="center">
	<?
		$ftrcode = $_POST["ftrcode"];
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
			$sql = "select * from ".$dbprefix."pround where rcode between '".$rof."' and '".$rot."' and calc='1'";
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
$text="uid=".$_SESSION["adminuserid"]." action=binary calc rcode=$ftrc[0]-$ftrc[1]";
writelogfile($text);
//       1.����Ѻ�����ͺ Ro �����ҧ Frcode-Trcode � around
//           1.1 ��ҹ Ro, FSaNo, TSaNo
//           1.2 ���ҧ��� BM+rcode, BC+rcode
//           1.3 ź������ BTOTSALE ��ͺ RO ����͡��͹
for($ro=$ftrc[0];$ro<=$ftrc[1];$ro++){
	///////////////////////////////////////////////////////////////////////
	//$ro �����ҧ Frcode-Trcode/////////////////////////////////////////
	//           1.1 ��ҹ ro, FSaNo, TSaNo
	//$step="1.1";
	//echo "***ro=$ro<BR>";
	//$bonusperpair = 500;
	$maxlv		=15;
	$taxrate 	= (5/100);
	$bonuslv1 = 0.50;
	$bonuslv2 = 0.25;
	$bonuslv3 = 0.25;
	$sql="select * from ".$dbprefix."pround where  rcode='".$ro."'  ";
	$result=mysql_query($sql);
	if (mysql_num_rows($result)>'0') {
		$row= mysql_fetch_array($result, MYSQL_ASSOC);
		$fsano=$row["fsano"];
		$tsano=$row["tsano"];
		$tdate=$row["tdate"];
		$fdate=$row["fdate"];
		$tpdate=$row["tpdate"];
		$fpdate=$row["fpdate"];
		$rdate=$row["rdate"];
		$paydate=$row["paydate"];
		//�������
		$pfdate = explode("-",$fdate);
		$pfyear=$pfdate[0];
		$pfmonth=$pfdate[1];
		$pfday=$pfdate[2];
		//����ش
		$ptdate = explode("-",$tdate);
		$ptyear=$ptdate[0];
		$ptmonth=$ptdate[1];
		$ptday=$ptdate[2];
		//�����͹
		$psmonth=$pfdate[0].$pfdate[1];
		///////////////////////////////////////////////////////////////////////
		//�ӹǳ �����ͺ $ro
		echo "<BR><BR>�ӹǳ⺹���ͺ��� RO=$ro<BR>";
		//			 1.4 �� ambonus = �纤�ṹ����Ѻ 3 �� L-C-R

		//ź������� apv ���������ͺ $ro
		$sql="delete from ".$dbprefix."ppv where rcode= ".$ro." ";
		if(mysql_query($sql)){
			mysql_query("COMMIT");
		}else{
			echo "error $sql<BR>";
		}

		//ź������� ambonus ���������ͺ $ro
		$sql="delete from ".$dbprefix."pmbonus where rcode= '".$ro."'";
		if(mysql_query($sql)){
			mysql_query("COMMIT");
		}else{
			echo "error $sql<BR>";
		}
		
		//ź������� am ���������ͺ $ro
		$sql="delete from ".$dbprefix."pc where rcode= ".$ro." ";
		if(mysql_query($sql)){
			mysql_query("COMMIT");
		}else{
			echo "error $sql<BR>";
		}

		$sql="delete from ".$dbprefix."my_pv where rcode= ".$ro." ";
		if(mysql_query($sql)){
			mysql_query("COMMIT");
		}else{
			echo "error $sql<BR>";
		}

		
		//    2. ���͡��Ţ�·�������ͺ���
		//       2.1 ����Ѻ���к�Ţ�� �����㹵��ҧ Total PV
		echo "            2. ����Ѻ��Ţͧ sMC �ء��� asaleh ��ͺ $ro ���<BR>";
		//-=- update21082008 
		//$cnt =0;
		//unset($mcode_chk);

		
///////////////// Sum bill in round ////////////////////////  ��� PV �ͧ�ء��� APV
			fnc_calc_status($dbprefix,$ro,$fdate,$tdate,$fpdate,$tpdate,$mcode);

	//��Ѻ calc �ͧ bround ����� '1'
	$sql="update ".$dbprefix."pround set calc='1' where rcode='$ro' ";

	if(mysql_query($sql)){
		mysql_query("COMMIT");
	}else{
		echo "error $sql<BR>";
	}
		///////////////////////////////////////////////////////////////////////
 
	}
	mysql_free_result($result);
	//$ro �����ҧ Frcode-Trcode/////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////
}

$time_end = getmicrotime();
$time = $time_end - $time_start;
echo "����ش��äӹǳ ".date("Y-m-d H:i:s")." ".strtotime("now"),"<BR>";
echo "��äӹǳ�����ҷ����� $time �Թҷ�<BR>";

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
<form name="rform" method="post" action="./index.php?sessiontab=4&sub=30">
<table width="60%" border="1" cellpadding="0" cellspacing="0" bordercolor="#FF7F00" align="center">
  <tr>
    <td colspan="2" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center">��͡�ͺ��äӹǳ�ͺ��è��� Ἱ B ����ͧ��äӹǹ�� 1-12</td>
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
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr align="center">
    <td colspan="2"><input type="button" name="Submit" value="�ӹǳ�����" onClick="checkround()"></td>
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
function fnc_calc_status($dbprefix,$ro,$strfdate,$strtdate,$fpdate,$tpdate,$fmcode){
		
		if($strfdate!=""&&$strtdate!=""&&$fmcode!=""){
			$whereclass = " AND fdate>= '$strfdate' and tdate<= '$strtdate' and m.mcode='".$fmcode."'";
		}else if($strfdate!=""&&$strtdate!=""){
			$whereclass = " AND fdate>= '$strfdate' and tdate<= '$strtdate' ";
		}else if($fmcode!=""){
			$whereclass = " AND m.mcode='".$fmcode."'";
		}
		$sql = "SELECT m.mcode,m.name_t,m.mobile,bk.bankcode,bk.bankname,m.branch,m.acc_type,m.acc_no,m.acc_name,		
		(((SELECT ifnull(sum(total),0) from ".$dbprefix."mmbonus a where a.mcode=m.mcode  ".$whereclass." )+ 
		(SELECT ifnull(sum(total),0) from ".$dbprefix."embonus b where b.mcode=m.mcode  ".$whereclass." ))*0.95) as totalamt 
		from ".$dbprefix."member m 
		LEFT JOIN ".$dbprefix."bank bk ON m.bankcode=bk.bankcode 
		where (SELECT ifnull(sum(total),0) from ".$dbprefix."mmbonus a where a.mcode=m.mcode  ".$whereclass." )+ 
		(SELECT ifnull(sum(total),0) from ".$dbprefix."embonus b where b.mcode=m.mcode  ".$whereclass." )>0";
		//echo $sql;
		//exit;
		$rs = mysql_query($sql);
		for($m=0;$m<mysql_num_rows($rs);$m++){
			$sqlObj = mysql_fetch_object($rs);
			$mcode =$sqlObj->mcode;
			$name_t =$sqlObj->name_t;
			$moneyb = backmonthpv($dbprefix,$mcode,$ro);
			$totalamt =$sqlObj->totalamt;
			$totalamt1 =  $moneyb+$sqlObj->totalamt;
			$select = "SELECT * from ".$dbprefix."member where mcode = '$mcode'";
			$rs1 = mysql_query($select);
			$sqlObj1 = mysql_fetch_object($rs1);
			$acc_no =$sqlObj1->acc_no;
			$cmp =$sqlObj1->cmp;
			$cmp2 =$sqlObj1->cmp2;
			//if(mysql_num_rows($rs1)>0){
				
			//}
			//echo $mcode.' '.$totalamt.' '.$acc_no.' '.$cmp.' '.$cmp.'<br>';
			//if($totalamt1 >= 200){
			if($cmp == '�ú' and $cmp2 == '�ú' and !empty($acc_no)){
				$sql = "INSERT INTO ".$dbprefix."pmbonus (rcode,mcode,status,pv,pvb,total,mdate,month_pv,mpos) ";
				$sql .= "VALUES('$ro','".$mcode."','1','$moneyb','$totalamt','".$totalamt1."','".$fdate."','".$month[0].$month[1]."','".$pos_cur."')";
				//echo $sql.'<br>';
				mysql_query($sql);
			}else{
				$sql = "INSERT INTO ".$dbprefix."pmbonus (rcode,mcode,status,pv,pvb,total,mdate,month_pv,mpos) ";
				$sql .= "VALUES('$ro','".$mcode."','0','".$totalamt1."','$totalamt','0','".$fdate."','".$month[0].$month[1]."','".$pos_cur."')";
				mysql_query($sql);
			}
		}
	
}
 function backmonthpv($dbprefix,$mcode,$ro){
	$sql2 = "select mcode,pv,status from ".$dbprefix."pmbonus WHERE  mcode='$mcode' order by rcode desc limit 0,1 ";
	$rs2=mysql_query($sql2);
	if (mysql_num_rows($rs2)>0) {
		$sqlObj2 = mysql_fetch_object($rs2);
		if($sqlObj2->status == 0)$pv= $sqlObj2->pv;
		else $pv = 0;
	}else{
		$pv = 0;
	}
	return $pv;
}

 function get_sp_code($dbprefix,$n_mcode,$pos_cur){
	$sql4="SELECT COUNT(mcode) as cnt FROM ".$dbprefix."member where sp_code='".$n_mcode."' and pos_cur='$pos_cur' ";
	//echo "$sql4<br>";
	$rs4 = mysql_query($sql4);
	if(mysql_num_rows($rs4)>0){
		$row4 = mysql_fetch_object($rs4);
		$cnt=$row4->cnt;
		return $cnt;
	}else{
		return 0;
	}
}
function get_data_sql($field,$sql){
	//��ҹ��� �ҡ  select $field from $table where $field_and_value
	$result=mysql_query($sql);
	if($result){
		if($row=mysql_fetch_object($result)){
			$value=$row->$field;
			mysql_free_result($result);
			return $value;
		}
	}
	return false;
}

function get_data_object($field,$sql){
	//��ҹ��� �ҡ  select $field from $table where $field_and_value
	$result=mysql_query($sql);
	if($result){
		if($row=mysql_fetch_object($result)){
			$value=$row;
			mysql_free_result($result);
			return $value;
		}
	}
	return false;
}


function getmicrotime() { 
    list($usec, $sec) = explode(" ", microtime()); 
    return ((float)$usec + (float)$sec); 
} 

function createTree($ro, $mcode){
	//�ѧ��������Ѻ�ӹǳ
	global $dbprefix,$ro;
	
	$sql = "select mcode from ".$dbprefix. " where upa_code = '$mcode' ";
	for($i= 0; $i < 2; $i++){
				
	}
}

function checkpvformcode($pvmcode,$dbpre){
global $gpv_new,$pv_new;
	$sql="SELECT mcode,gpv,pv FROM ".$dbpre."cm Where mcode='$pvmcode' ";
	$rs = mysql_query($sql);
	if(mysql_num_rows($rs)>0){
		$row = mysql_fetch_object($rs);
		$gpv_new = $row->gpv;
		$pv_new  = $row->pv;
		echo "��ṹ : ����  $gpv_new ��� $pv_new ���� $pvmcode<BR> ";
	}else{
		$gpv_new = 0;
		$pv_new = 0;
	}
	//mysql_free_result($sql);
}

function getpositionnow($posmcode,$dbpre){
global $pos_new;
	$sql="SELECT mcode,pos_cur FROM ".$dbpre."member Where mcode='$posmcode' ";
	$rs = mysql_query($sql);
	if(mysql_num_rows($rs)>0){
		$row = mysql_fetch_object($rs);
		$pos_new = $row->pos_cur;
		echo "���˹觻Ѩ�غѹ : $pos_new ���� $posmcode <BR>";
	}else{
		$pos_new = "";
	}
	//mysql_free_result($sql);
}

function getlastpvcmbonus($pmcode,$prcode,$dbpre){
global $pcarry_l, $pcarry_r;
	$sql="SELECT rcode,mcode,carry_l,carry_r FROM ".$dbpre."cmbonus WHERE rcode=(SELECT max(rcode) FROM ".$dbpre."cmbonus WHERE rcode<".$prcode.") and mcode='$pmcode' ";
	//echo "��Ǩ�ͺ ��ṹ��͹˹�� : $sql <BR>";
	$rs = mysql_query($sql);
	if(mysql_num_rows($rs)>0){
		$row = mysql_fetch_object($rs);
		$pcarry_l = $row->carry_l;
		$pcarry_r = $row->carry_r;
		echo "��ṹ������͡�͹˹�� : $pcarry_l   $pcarry_r ���� $pmcode<BR> ";
	}else {
		$pcarry_l=0;
		$pcarry_r=0;
		echo "����դ�ṹ������� : $pcarry_l   $pcarry_r ���� $pmcode<BR>";
	}
	//mysql_free_result($sql);
}

function getPair($cur_r, $cur_l,$remain_r, $remain_l ){
global $cut, $tot_l, $tot_r , $strongside, $sumright, $sumleft;
	$sumleft = ($cur_l + $remain_l);
	$sumright = ($cur_r + $remain_r);
	$lsum = floor(($sumleft - fmod($sumleft,1000))/1000);
	$rsum = floor(($sumright - fmod($sumright,1000))/1000);
 	
	$cut = min($lsum, $rsum);
	
	if($lsum == $rsum){
		//------ 2:1 ��Ѻ 1:2 ---------//
	 	$t1 = floor($lsum / 3);
	 	$tot_l = $sumleft - ($t1 * 3)*1000;
	 	$tot_r = $sumright - ($t1 * 3)*1000;
	 	$cut = $t1 * 2;
	 	if(($lsum - ($t1 * 3)) ==2)  { // left high priority
	 	  $tot_l = 0;
	 	  $tot_r = 1000;
	 	  $cut += 1;
	 	}
		echo "�ҡ��觫��� $lsum ��觢�� $rsum �Ѵ $cut ����ͫ��� $tot_l ����͢�� $tot_r <br>";   
	 	$strongside = "E";
	 	
	}else if($lsum > $rsum){
		 
		$t1  = floor($lsum / 2 ) ;
		if($t1 > $rsum)	$t1 = $rsum;
		$tot_l = $sumleft - ($t1 * 2)*1000;
		$tot_r = $sumright - ($t1)*1000;
		$cut= $t1;
		$strongside = "L";
		echo "�ҡ��觫��� $lsum ,��觢�� $rsum �Ѵ $cut ����ͫ��� $tot_l ����͢�� $tot_r <br>";   
				
	}else { // rsum > lsum
		$t1  = floor($rsum / 2  );
		if($t1 > $lsum)	$t1 = $lsum;
		$tot_r = $sumright - ($t1 * 2)*1000;
		$tot_l = $sumleft - ($t1)*1000;
		$cut= $t1;
		$strongside = "R";
	 	echo "�ҡ��觫��� $lsum  , ��觢�� $rsum �Ѵ $cut ����ͫ��� $tot_l ����͢�� $tot_r <br>";   
	}
 
}

 
?>