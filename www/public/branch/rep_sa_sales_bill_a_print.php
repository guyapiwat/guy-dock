<? include("adminchecklogin.php");?>
<? include("prefix.php");?>
<script language="javascript" type="text/javascript" src="datetimepick/datetimepicker.js"></script>

<?
set_time_limit(0);
$showrep = $_POST['showrep'];
$member = $_POST['member'];
$sano = $_POST['sano'];
$invent = $_POST['invent'];
$uid = $_POST['uid'];
$fmdate = $_POST['fmdate'];
$tmdate = $_POST['tmdate'];
$orderby = $_POST['orderby'];
$sortby = $_POST['sortby'];
$chkmember = $_POST['chkmember'];
$chksano = $_POST['chksano'];
$chkinvent = $_POST['chkinvent'];
$chkuid = $_POST['chkuid'];
$chkmdate = $_POST['chkmdate'];
if ($showrep==''){
	show_rep_dialogbox();
}
else{
	//��Ǩ�ͺ�����١��ͧ�ͧ��ҷ���觨ҡ dialog
	$oktoshow=true;
	if ($chkmember=="" AND $chksano=="" AND $chkinvent=="" AND $chkuid=="" AND $chkmdate=="") {
		$errormsg.="��س����͡�����ŷ���ͧ��ä��Ҿ��������кؤ�ҷ���ͧ���<br>";
		$oktoshow=false;
	}
		
	if($chksano<>""){
		if($sano==""){
			$errormsg.="�Ţ������觫���������͡<br>";
			$oktoshow=false;
		}
	}
			
	if($chkmdate<>""){
		if($fmdate==""){
			$errormsg.="�ѹ���������� ������͡<br>";
			$oktoshow=false;
		}
		if($tmdate==""){
			$errormsg.="�ѹ�������ش ������͡<br>";
			$oktoshow=false;
		}
	}

	// �ҡ���������١��ͧ ����ʴ�
	if(! $oktoshow){
		echo "<font color=red>$errormsg</font>";
		echo "<br>";
		echo "<a href=\"javascript:window.close();\">Close Window</a>";
		exit;
	}
	//�� sql statement
	$rep_sql="select * from ".$dbprefix."asaleh";
	$where_sql="";

	if ($chkmember <>"") {
	list($fmc,$tmc)=explode("-",$member);
		if($fmc <>"" and $tmc<>""){
			for ($i=strlen($fmc);$i<7;$i++) {$fmc="0".$fmc;}
			for ($i=strlen($tmc);$i<7;$i++) {$tmc="0".$tmc;}
			$where_sql.= " WHERE (mcode>='$fmc' and  mcode<='$tmc') ";
		} else {
			if($fmc <>""){
				for ($i=strlen($fmc);$i<7;$i++) {$fmc="0".$fmc;}
				$where_sql.= " WHERE (mcode='$fmc') ";
			}
		}
	}
	
	if ($chksano <>"") {
	list($fmsa,$tmsa)=explode("-",$sano);
		if($fmsa <>"" and $tmsa<>""){
			if ($where_sql=="") {
				$where_sql.= " WHERE (sano>='$fmsa' and  sano<='$tmsa') ";
			} else {
				$where_sql.= " AND (sano>='$fmsa' and  sano<='$tmsa') ";
			}
		}
		else{
			if($fmsa <>""){
				if ($where_sql=="") {
					$where_sql.= " WHERE (sano='$fmsa') ";
				} else {
					$where_sql.= " AND (sano='$fmsa') ";
				}
			}
		}
	}
	
	if ($chkinvent <> "") {
	list($fminv,$tminv)=explode("-",$invent);
		if($fminv <>"" and $tminv<>""){
			if ($where_sql=="") {
				$where_sql.= " WHERE (inv_code>='$fminv' and inv_code<='$tminv') ";
			} else {
				$where_sql.= " AND (inv_code>='$fminv' and inv_code<='$tminv') ";
			}
		} else {
			if($fminv <>""){
				if ($where_sql=="") {
					$where_sql.= " WHERE (inv_code='$fminv') ";
				} else {
					$where_sql.= " AND (inv_code='$fminv') ";
				}
			}
		}
	}
	
	if ($chkuid <> "") {
	list($fmuid,$tmuid)=explode("-",$uid);
		if($fmuid <>"" and $tmuid<>""){
			if ($where_sql=="") {
				$where_sql.= " WHERE (uid>='$fmuid' and uid<='$tmuid') ";
			} else {
				$where_sql.= " AND (uid>='$fmuid' and uid<='$tmuid') ";
			}
		} else {
			if($fmuid <>""){
				if ($where_sql=="") {
					$where_sql.= " WHERE (uid='$fmuid') ";
				} else {
					$where_sql.= " AND (uid='$fmuid') ";
				}
			}
		}
	}
	
	if ($chkmdate <> "") {
		if ($where_sql=="") {
			$where_sql.=" WHERE (sadate>='$fmdate' AND sadate<='$tmdate') ";
		} else {
			$where_sql.=" AND (sadate>='$fmdate' AND sadate<='$tmdate') ";
		}
	}
	
	$where_sql.=" ORDER BY '$orderby' $sortby ";
		
	// html
	echo "<html>\n";
	echo "<head>\n";
	echo "<meta http-equiv='Content-Type' content='text/html; charset=windows-874'>\n";
	echo "<meta http-equiv='Content-Language' content='th'>\n";
	echo "<title>��§ҹ ���觫����Թ���Ἱ A</title>\n";
	echo "</head>\n";
	echo "<body>\n";
	
	echo "<div align='center'><font size='+1'><B>��§ҹ ���觫����Թ���Ἱ A</B></font></div>";
	echo "<br>";
	echo "<a href=\"javascript:window.close();\">Close Window</a><br>";
	echo "������ѹ��� ".date("Y-m-d h:i:s");

	echo "<table width='100%'>";
	echo "<tr>";
	echo "<td bgcolor='#FFFFFF'>";

	echo "<table width='100%'>";
	echo "<tr>";
	echo "<td  bgcolor='#EEEEEE' width='5%'>�ӴѺ</td>";
	echo "<td  bgcolor='#EEEEEE' width='5%'>�Ţ�������</td>";
	echo "<td  bgcolor='#EEEEEE' width='10%'>�ѹ���</td>";
	echo "<td  bgcolor='#EEEEEE' width='10%'>������Ҫԡ</td>";
	echo "<td  bgcolor='#EEEEEE' width='15%'>������Ҫԡ</td>";
	echo "<td  bgcolor='#EEEEEE' width='10%'>�ʹ�Թ</td>";
	echo "<td  bgcolor='#EEEEEE' width='10%'>PV</td>";
	echo "<td  bgcolor='#EEEEEE' width='7%'>�Ң�</td>";
	echo "<td  bgcolor='#EEEEEE' width='7%'>UID</td>";
	echo "<td  bgcolor='#EEEEEE' width='10%'>�����˵�</td>";
	echo "</tr>";
	
	include("connectmysql.php");
	mysql_query("set NAMES tis620");
	$sql=$rep_sql.$where_sql;
	echo $sql;
	$result = mysql_query($sql);
	$ncount = 1;
	$sbgdolor = " bgcolor = '#FFFFFF'";
		
	while($row=mysql_fetch_object($result)){	
		$sano = $row->sano; 
		$sadate = $row->sadate; 
		$mcode = $row->mcode; 
		$name_t = get_data("name_t","member","mcode='$mcode' " );
		$total = $row->total;
		$tot_pv = $row->tot_pv;
		$inv_code = $row->inv_code;
		$inv_desc = get_data("inv_desc","invent","inv_code='$inv_code' ");
		$uid = $row->uid;
		$remark = $row->remark;
		
		echo "<tr ".  $sbgdolor .">";
		echo "<td>";								
		echo  $ncount;
		echo "</td>";
		echo "<td>";								
		echo  $sano;
		echo "</td>";
		echo "<td>";								
		echo  $sadate;
		echo "</td>";
		echo "<td>";								
		echo  $mcode;
		echo "</td>";
		echo "<td>";								
		echo  $name_t;
		echo "</td>";							
		echo "<td>";								
		echo  $total;
		echo "</td>";
		echo "<td>";								
		echo  $tot_pv;
		echo "</td>";
		echo "<td>";								
		echo  $inv_desc;
		echo "</td>";
		echo "<td>";								
		echo  $uid;
		echo "</td>";
		echo "<td>";								
		echo  $remark;
		echo "</td>";
		echo "</tr>";

		if($ncount%2 =='0'){
				$sbgdolor=  " bgcolor = '#ffffff'";			
		}else{
				$sbgdolor=  " bgcolor = '#eeeeee'";						  
		}
		$ncount = $ncount + 1;				  
	}	// �Դ while																					
	echo "</table>";

	echo "</td>";
	echo "</tr>";
	echo "</table>";
	echo "</body>\n";
	echo "</html>\n";
}  //�Դ if showrep

function show_rep_dialogbox(){
?>
	<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
	<meta http-equiv="Content-Language" content="th">
	<title>��§ҹ ���觫����Թ���Ἱ A</title>
	<link href="istyle.css" rel="stylesheet" type="text/css">
	</head>
	<body>
	<? include "header.php";?>
	<br>

	<?////////////////////////// dialog //////////////////////////////////////////?>	
	<table border=0 cellspacing=0 cellpadding=0 width='100%'>
	<tr>
		<td width='10%' height='179'></td>
		<td width='80%' valign=top>
		<?////////////////////////////////////////////////////////////////////?>
		<?///////////////////// ��ͺ�͡ //////////////////////////////?>
		<TABLE cellSpacing=0 cellPadding=0 border=0>
		<TBODY>
			<TR>
				<TD><IMG height=7 alt='' src='images/crn_f2f2f2_tl.gif' width=8></TD>
				<TD width=566 background='images/crn_f2f2f2_t.gif' height=7></TD>
				<TD><IMG height=7 alt='' src='images/crn_f2f2f2_tr.gif' width=8></TD>
			</TR>
			<TR>
				<TD width=8 background='images/crn_f2f2f2_l.gif' height=46></TD>
				<TD bgColor=#f2f2f2 height=46> 
		<?///////////////////// ��ͺ�͡ //////////////////////////////?>


				<?//////////////////////////////////////////////////////////////////////?>
				<?///////////////////// inner dialog //////////////////////////////?>
				<table width='101%' border='0' cellspacing='2' cellpadding='1'>
				  <form method='post' name='rep_sa_sales_bill_a_print' id='rep_sa_sales_bill_a_print' action='rep_sa_sales_bill_a_print.php' target='_blank' onSubmit="return check()">
					<tr> 
					  <td align='left' colspan='3' height='2'><b>��§ҹ ���觫����Թ���Ἱ A</b></td>
					</tr>			
					<tr> 
					  <td width='4%' align='right'>&nbsp;</td>
					  <td width='32%' align='right'>&nbsp;</td>
					  <td width='64%'>&nbsp; </td>
					</tr>
					  <tr> 
					  <td width='4%' align='right'><label>
					  <input name="chkmember" type="checkbox" value="checkbox">
					  </label></td>
					  <td width='32%' align='right'>������Ҫԡ :</td>
					  <td width='64%'> <input name='member' type='text' size='20' maxlength='20' id='member'>
					    <font color=808080>( ��. ���� 1-1009 )</font></td>
					</tr>
					<tr> 
					  <td width='4%' align='right'><label>
					  <input type="checkbox" name="chksano" value="checkbox">
					  </label></td>
					  <td width='32%' align='right'>�����ҧ���觫����Ţ��� : </td>
					  <td width='64%'><input name='sano' type='text' id='sano' size='20' maxlength="20"> 
					    <label><font color=808080>( ��. �Ţ��� 1-9 )</font></label></td>
					</tr>
					<tr>
                      <td align='right'><label>
                        <input type="checkbox" name="chkinvent" value="checkbox">
                      </label></td>
					  <td align='right'>�����Ң� :</td>
					  <td><input name='invent' type='text' size='20' maxlength='20' id='invent'>
                          <font color=808080>( ���� 1-1009 )</font></td>
				    </tr>
					<tr>
                      <td align='right'><label>
                        <input type="checkbox" name="chkuid" value="checkbox">
                      </label></td>
					  <td align='right'>���ʾ�ѡ�ҹ :</td>
					  <td><input name='uid' type='text' size='20' maxlength='20' id='uid'>
				      <font color=808080>( ���� 1-1009 )</font></td>
					</tr>				
					
					<tr> 
					  <td width='4%' align='right'><input type='checkbox' value='checkbox' name='chkmdate'></td>
					  <td width='32%' align='right'>���觫��������ҧ�ѹ��� : </td>
					  <td width='64%'><input name='fmdate' type='text' size='10' value='<? echo $fmdate;?>'>&nbsp;<a href="javascript:NewCal('fmdate','yyyymmdd',false,24)"><img src="./datetimepick/images/cal.gif" width="16" height="16" border="0" alt="���͡�ѹ���"></a> �֧ <input name='tmdate' type='text' size='10' value='<? echo $tmdate;?>'>&nbsp;<a href="javascript:NewCal('tmdate','yyyymmdd',false,24)"><img src="./datetimepick/images/cal.gif" width="16" height="16" border="0" alt="���͡�ѹ���"></a> <font color=808080>(����-��-��)</font></td>
					</tr>	
					
					<tr> 
					  <td width='4%' align='right'><label></label></td>
					  <td width='32%' align='right'>&nbsp;���§ :</td>
					  <td width='64%'>
						<select name='orderby'>
						  <option value='sano' selected>���§�Ţ������觫���</option>
						  <option value='sadate'>���§�ѹ������觫���</option>
						  <option value='mcode'>���§������Ҫԡ</option>
						  <option value='uid'>���§���ʾ�ѡ�ҹ</option>
						</select>
						�ҡ
						<input type='radio' name='sortby' value='asc' checked >
						������ҡ 
						<input type='radio' name='sortby' value='desc'>
					  �ҡ仹���						</td>
					</tr>
									
					<tr> 
					  <td colspan='2' align='right'>&nbsp;</td>
					  <td width='64%'>&nbsp; </td>
					</tr>
					
					
					<tr> 
					  <td colspan='2' align='right'>&nbsp;</td>
					  <td width='64%'> 
					  <input type='submit' id='submit' name='showrep' value=' �ʴ���§ҹ '>					  </td>
					</tr>
					<tr> 
					  <td colspan='2' align='right'>&nbsp;</td>
					  <td width='64%'>&nbsp;  </td>
					</tr>
				</form>
				</table>
				<?///////////////////// ��ǹ dialog //////////////////////////////?>
				<?//////////////////////////////////////////////////////////////////////?>

						
		<?///////////////////// ��ͺ�͡ //////////////////////////////?>
				</TD>
				<TD width=8 background='images/crn_f2f2f2_r.gif' height=46></TD>
			</TR>
			<TR>
				<TD><IMG height=7 alt='' src='images/crn_f2f2f2_bl.gif' width=8></TD>
				<TD width=566 background='images/crn_f2f2f2_b.gif' height=8></TD>
				<TD><IMG height=7 alt='' src='images/crn_f2f2f2_br.gif' width=8></TD>
			</TR>
		</TBODY>
		</TABLE>
		<?///////////////////// ��ͺ�͡ //////////////////////////////?>
		<?////////////////////////////////////////////////////////////////////?>
		
		</td>
		<td width='10%'></td>
	</tr>
	</table>
	<?////////////////////////// dialog //////////////////////////////////////////?>	


	<br>
	<br>
	<? include "footer.php";?>
	</body>
	</html>
<?
	}
?>
<script language="Javascript">
function check() {
	var v1 = document.rep_sa_sales_bill_a_print.member.value;
	var v2 = document.rep_sa_sales_bill_a_print.sano.value;
	var v3 = document.rep_sa_sales_bill_a_print.invent.value;
	var v4 = document.rep_sa_sales_bill_a_print.uid.value;
	var v5 = document.rep_sa_sales_bill_a_print.fmdate.value;
	var v6 = document.rep_sa_sales_bill_a_print.tmdate.value;
	if (v1.length==0&&v2.length==0&&v3.length==0&&v4.length==0&&v5.length==0&&v6.length==0) {
		alert("��س����͡�����ŷ���ͧ��ä��Ҿ��������кؤ�ҷ���ͧ���");
        document.rep_sa_sales_bill_a_print.member.focus();           
		return false;
	} else {
	return true;
	}
}
</script>
<?
function get_data($field,$table,$field_and_value){
	//��ҹ��� �ҡ  select $field from $table where $field_and_value
	// $field=field name to get data
	// table=scm_xxxxxx ����ͧ��� scm
	// $field_and_value="fieldname='value' "
	global $dbprefix;
	$sql="select * from ".$dbprefix."$table where $field_and_value ";
	$result=mysql_query($sql);
	if($result){
		if($row=mysql_fetch_object($result)){
			return $row->$field;
		}
	}
	return false;
}
?>