<script type="text/javascript">

function Inint_AJAX() {
   try { return new ActiveXObject("Msxml2.XMLHTTP"); } catch(e) {} //IE
   try { return new ActiveXObject("Microsoft.XMLHTTP"); } catch(e) {} //IE
   try { return new XMLHttpRequest(); } catch(e) {} //Native Javascript
   alert("XMLHttpRequest not supported")
   return null
}
   function checkForm()
  {
	document.getElementById('chkline').disabled = true;
    document.getElementById('chkline').value = "Please wait...";
    document.getElementById('chkdownline').innerHTML = "<img src='images/ProgressBar.gif'>";
    var req = Inint_AJAX(); //���ҧ Object
	// alert(value)
	//value = str_pad(value,7,0,false);
	//alert(test);
     req.open('GET', 'getchkline.php?chkre=1', true); //��˹� ʶҹС�÷ӧҹ�ͧ AJAX Ẻ GET ����觢����ż�ҹ�ҧ URL
	 req.onreadystatechange = function() { //�˵ء�ó�������ա�õͺ��Ѻ
       //   alert(req);
     if (req.readyState==4) {
               if (req.status==200) { //���Ѻ��õͺ��Ѻ���º����
                    var data=req.responseText; //��ͤ���������Ҩҡ��÷ӧҹ�ͧ test3.php
					//alert(req.responseText);
					if(data == 1234){
					document.getElementById('chkline').disabled = false;
					document.getElementById('chkline').value = "����Ҫԡ�ѡ���ʹ";
					document.getElementById('chkdownline').innerHTML = "";
					//document.getElementById('mcode').value="";
					//document.getElementById("mname").innerHTML="������������§ҹ";
					}else{
					document.getElementById('chkline').disabled = false;
					document.getElementById('chkline').value = "����Ҫԡ�ѡ���ʹ";
                    document.getElementById("chkdownline").innerHTML=data; //�ʴ���
					}
               }
          }
     };
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //Header ������
     req.send(null); //�ӡ����

  };
</script>
<?
	if(!isset($_GET['sub'])){
		$cmc = $_SESSION["usercode"];


?><center><font size=10>Payment Gateway</font></center><?
	}else{
?>
<table border="0" height="390"><tr valign="top">
<td width="50">
<a href="javascript:history.back()"><img border="0" src="./images/back.gif" height="40" width="40" alt="������Ҫԡ" /></a>
</td>
<td align="left" width="100%">
<?
		switch($_GET['sub']){
			case 1:
			?><legend>
		           <strong><font color="#666666">Payment Success</font></strong>
                   <!--img border="0" src="./images/add.gif" alt="��䢢�������Ҫԡ" align="absmiddle" width="16" height="16" />&nbsp;&nbsp;<a href='./index.php?sessiontab=1&sub=3'>��䢢�������Ҫԡ</a-->
                </legend>
				<?
				include("payment_success.php");
				break;
			case 2:
				?><legend><strong><font color="#666666">Payment Fail&nbsp;&nbsp;</font></strong></legend><?
				include("payment_fail.php");
				break;
				case 3:
				?><legend><strong><font color="#666666">Payment Cancel&nbsp;&nbsp;</font></strong></legend><?
				include("payment_cancel.php");
				break;
							case 4:
				?><legend><strong><font color="#666666">Payment Success&nbsp;&nbsp;</font></strong></legend><?
				include("payment_success1.php");
				break;
							case 5:
				?><legend><strong><font color="#666666">Payment Fail&nbsp;&nbsp;</font></strong></legend><?
				include("payment_fail1.php");
				break;
							case 6:
				?><legend><strong><font color="#666666">Payment Cancel&nbsp;&nbsp;</font></strong></legend><?
				include("payment_cancel1.php");
				break;
			default :
				header("Location: index.php?sessiontab=$sesstab");
			break;
		}
?>

</td>
</tr></table>
<?
	}

function gettotalpv($dbprefix,$mcode){
	$sql3 = "select mcode, SUM(tot_pv) AS tot_pv from ".$dbprefix."special_point WHERE  sa_type='VA' AND mcode='$mcode' group by mcode ";
				//if($mcode == '0000075')echo "$sql3<BR>";
		$rs3=mysql_query($sql3);
		if (mysql_num_rows($rs3)>0) {
			$sqlObj3 = mysql_fetch_object($rs3);
			$total_fv3= $sqlObj3->tot_pv;
		}else{
			$total_fv3=0;
		}
		mysql_free_result($rs3);
				//if($mcode == '0000075')echo "$total_fv3<BR>";
	return $total_fv3;
} 
function dateDiff($startDate, $endDate) { 
    // Parse dates for conversion 
    $startArry = date_parse($startDate); 
    $endArry = date_parse($endDate); 

    // Convert dates to Julian Days 
    $start_date = gregoriantojd($startArry["month"], $startArry["day"], $startArry["year"]); 
    $end_date = gregoriantojd($endArry["month"], $endArry["day"], $endArry["year"]); 

    // Return difference 
    return round(($end_date - $start_date), 0); 

} 
function expdate($startdate,$datenum){
 $startdatec=strtotime($startdate); // ������ͤ������Թҷ�
 $tod=$datenum*86400; // �Ѻ�ӹǹ�ѹ�Ҥٳ�Ѻ�Թҷյ���ѹ
 $ndate=$startdatec+$tod; // �Ѻ�ǡ��ա����ӹǹ�ѹ����Ѻ��
 return $ndate; // �觤�ҡ�Ѻ
}


?>
