<script language="javascript">
function checkround(){
	if(document.getElementById("ftrcode").value!=""){
		var numCheck = document.getElementById("ftrcode").value;
		var numVal = numCheck.split("-");
		if(numVal.length>2){
			alert("กรุณากรอกรูปแบบรอบให้ถูกต้อง");
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
<?
if(!(isset($_POST["ftrcode"]) || isset($_GET["ftrcode"]))){
	rpdialog();
}else{
	if(isset($_POST["ftrcode"]))
		$ftrcode = $_POST["ftrcode"];
	else if(isset($_GET["ftrcode"]))
		$ftrcode = $_GET["ftrcode"];
	if (strpos($ftrcode,"-")===false){
		//รอบเริ่มต้น == รอบสิ้นสุด
		$ftrc[0]=$ftrcode;
		$ftrc[1]=$ftrcode;
	}else{
	echo "--".$ftrcode;
		$ftrc = explode("-",$ftrcode);
		echo "=";print_r($ftrc);
	}
	if($ftrc[0]>$ftrc[1]){
		?><table width="100%" border="1">
  <tr align="center">
    <td><FONT COLOR="#ff0000">รอบเริ่มต้น ต้องน้อยกว่าหรือเท่ากับ รอบสิ้นสุด กรุณาใส่รอบการคำนวณใหม่</FONT></td>
  </tr>
</table>
<?
		rpdialog();
		exit;
	}else{
		?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="./rep_all_comsn_print.php?ftrcode=<?=$ftrcode?>&fmcode=<?=$fmcode?>" target="_blank"><img border="0" src="./images/Amber-Printer.gif">พิมพ์ทั้งหมด</a><br/>
<?
		require("connectmysql.php");
		//require("./cls/repGenerator.php");
		
		$wheresql = "";
		if($ftrcode!="" && $_POST['fmcode']!=""){
			$wheresql .= " WHERE rcode between '".$ftrc[0]."' and '".$ftrc[1]."' and mcode='".$_POST['fmcode']."'";
		}else if($ftrcode!=""){
			$wheresql .= " WHERE rcode between '".$ftrc[0]."' and '".$ftrc[1]."'";
		}else if($_POST['fmcode']!=""){
			$wheresql .= " WHERE mcode='".$_POST['fmcode']."'";
		}
		//echo $wheresql."<br>";
		if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}

		sumabonus($dbprefix,$_POST['fmcode'],$ftrc[0],$ftrc[1]);

		$sql = "SELECT a.rcode, a.mcode,m.name_t, sum(a.com_a) as com_a,sum(a.com_b) as com_b,sum(a.com_c) as com_c,sum(a.com_d) as com_d,sum(a.total_all) as total_all,sum(a.tax) as tax,sum(a.netprice) as netprice ";
		$sql .= " FROM ali_allbonus a ";
		$sql .= " LEFT JOIN ali_member m ON a.mcode=m.mcode";
		$sql .= " GROUP BY mcode,rcode";
		//echo $sql."<br>";
		?><br /><?
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']);
		$rec->setOrder($_GET['ord']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		$rec->setLink($PHP_SELF,"sessiontab=4&sub=100&ftrcode=$ftrcode");
		$rec->setBackLink($PHP_SELF,"sessiontab=4");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("rcode,mcode,name_t, com_a,com_b,com_c,com_d,total_all,tax,netprice");
		$rec->setFieldDesc("รหัสรอบ,รหัสมาชิก,ชื่อสมาชิก,ค่าแนะนำ,ทีมขาย,พัฒนาทีมขาย,แมชชิ่ง,รวมรายได้,หักภาษี 5%,รายได้สุทธิ");
		$rec->setFieldAlign("center,center,left,right,right,right,right,right,right,right");
		$rec->setFieldSpace("7%,7%,16%,10%,10%,10%,10%,10%,10%,10%");
		$rec->setSum(true,false,",,,true,true,true,true,true,true,true");
		$rec->setFieldFloatFormat(",,,2,2,2,2,2,2,2");
		$rec->setFieldLink("");
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);
	}
}
function sumabonus($dbprefix,$amcode,$srcode,$trcode){

	$a_tot_pv=0;
	$b_tot_pv=0;
	$c_tot_pv=0;
	$d_tot_pv=0;
	$all_sum_pv=0;
	
	$sql="delete from ".$dbprefix."allbonus ";
	if(mysql_query($sql)){
		mysql_query("COMMIT");
	}else{
		echo "error $sql<BR>";
	}
	//for($lv= 0;$lv < $trcode; $lv++){

		$wheresql = "";
		if($srcode!="" && $amcode!=""){
			$wheresql .= " WHERE rcode between '".$srcode."' and '".$trcode."' and mcode='".$_POST['fmcode']."'";
		}else if($srcode!=""){
			$wheresql .= " WHERE rcode between '".$srcode."' and '".$trcode."'";
		}else if($amcode!=""){
			$wheresql .= " WHERE mcode='".$amcode."'";
		}
		
		$sql1="SELECT mcode,rcode,sum(total) as tot_pv FROM ".$dbprefix."ambonus ";
		$sql1 .= $wheresql." GROUP BY mcode,rcode ";
		//echo "$sql1<BR>";
		$rs1 = mysql_query($sql1);
		for($i=0;$i<mysql_num_rows($rs1);$i++){
			$row = mysql_fetch_object($rs1);
			$armcode=$row->mcode;
			$arrcode=$row->rcode;
			$a_tot_pv = $row->tot_pv;
			//$all_sum_pv=$a_tot_pv;
			//$tax = ($all_sum_pv*5/100);
			//$netamt=(($all_sum_pv-($all_sum_pv*5/100));
			if($a_tot_pv!=0){
				$sql = " INSERT into ".$dbprefix."allbonus  (rcode, mcode, com_a,total_all,tax,netprice) VALUES";
				$sql.=" ('".$arrcode."','$armcode','".$a_tot_pv."','".$a_tot_pv."','".($a_tot_pv*5/100)."','".($a_tot_pv-($a_tot_pv*5/100))."') ";
				if(mysql_query($sql)){
					mysql_query("COMMIT");
				}else{
					echo "error $sql<BR>";
				}
			}
		}
		
		$sql2="SELECT mcode,rcode,sum(total) as tot_pv FROM ".$dbprefix."bmbonus ";
		$sql2 .= $wheresql." GROUP BY mcode,rcode ";
		//echo "$sql2<BR>";
		$rs2 = mysql_query($sql2);
		for($i=0;$i<mysql_num_rows($rs2);$i++){
			$row = mysql_fetch_object($rs2);
			$armcode=$row->mcode;
			$arrcode=$row->rcode;
			$b_tot_pv = $row->tot_pv;
			if($b_tot_pv!=0){
				$sql = " INSERT into ".$dbprefix."allbonus  (rcode, mcode, com_b,total_all,tax,netprice) VALUES";
				$sql.=" ('".$arrcode."','$armcode','".$b_tot_pv."','".$b_tot_pv."','".($b_tot_pv*5/100)."','".($b_tot_pv-($b_tot_pv*5/100))."') ";
				if(mysql_query($sql)){
					mysql_query("COMMIT");
				}else{
					echo "error $sql<BR>";
				}
			}
			//$all_sum_pv=($all_sum_pv+$b_tot_pv);
		}

		$sql3="SELECT mcode,rcode,sum(total) as tot_pv FROM ".$dbprefix."cmbonus ";
		$sql3 .= $wheresql." GROUP BY mcode,rcode ";
		//echo "$sql3<BR>";
		$rs3 = mysql_query($sql3);
		for($i=0;$i<mysql_num_rows($rs3);$i++){
			$row = mysql_fetch_object($rs3);
			$armcode=$row->mcode;
			$arrcode=$row->rcode;
			$c_tot_pv = $row->tot_pv;
			//$all_sum_pv=($all_sum_pv+$c_tot_pv);
			if($c_tot_pv!=0){
				$sql = " INSERT into ".$dbprefix."allbonus  (rcode, mcode, com_c,total_all,tax,netprice) VALUES";
				$sql.=" ('".$arrcode."','$armcode','".$c_tot_pv."','".$c_tot_pv."','".($c_tot_pv*5/100)."','".($c_tot_pv-($c_tot_pv*5/100))."') ";
				if(mysql_query($sql)){
					mysql_query("COMMIT");
				}else{
					echo "error $sql<BR>";
				}
			}
		}

		$sql4="SELECT mcode,rcode,sum(total) as tot_pv FROM ".$dbprefix."dmbonus ";
		$sql4 .= $wheresql." GROUP BY mcode,rcode ";
		//echo "$sql4<BR>";
		$rs4 = mysql_query($sql4);
		for($i=0;$i<mysql_num_rows($rs4);$i++){
			$row = mysql_fetch_object($rs4);
			$armcode=$row->mcode;
			$arrcode=$row->rcode;
			$d_tot_pv = $row->tot_pv;
			//$all_sum_pv=($all_sum_pv+$d_tot_pv);
			if($d_tot_pv!=0){
				$sql = " INSERT into ".$dbprefix."allbonus  (rcode, mcode, com_d,total_all,tax,netprice) VALUES";
				$sql.=" ('".$arrcode."','$armcode','".$d_tot_pv."','".$d_tot_pv."','".($d_tot_pv*5/100)."','".($d_tot_pv-($d_tot_pv*5/100))."') ";
				if(mysql_query($sql)){
					mysql_query("COMMIT");
				}else{
					echo "error $sql<BR>";
				}
			}
		}

		/*if($all_sum_pv!=0){
			$tax = ($all_sum_pv*5/100);
			$netamt=(($all_sum_pv-($all_sum_pv*5/100));
			$sql = " INSERT into ".$dbprefix."allbonus  (rcode, mcode, com_a,com_b,com_c,com_d,total_all,tax,netprice) VALUES";
			$sql.=" ('".($lv+1)."','$amcode','".$a_tot_pv."','".$b_tot_pv."','".$c_tot_pv."','".$d_tot_pv."','".$all_sum_pv."') ";
			if(mysql_query($sql)){
				mysql_query("COMMIT");
			}else{
				echo "error $sql<BR>";
			}
		}*/
	//}

}
function rpdialog(){?>
<table width="100%"><tr><td><br />
<form name="rform" method="post" action="./index.php?sessiontab=4&sub=100">
<table width="40%" border="1" cellpadding="0" cellspacing="0" bordercolor="#FF7F00" align="center">
  <tr>
    <td colspan="2" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center"><strong>กรอกรอบ และรหัสสมาชิกที่ต้องการดูรายงาน</strong></td>
  </tr>
  <tr>
    <td colspan="2" align="center">&nbsp;</td>
    </tr>
  <tr>
    <td align="right">รอบ&nbsp;&nbsp;</td>
    <td><input type="text" name="ftrcode" id="ftrcode" onkeypress="return chknum(window.event.keyCode)" />
      &nbsp;( กรอกข้อมูลเป็น 1-9 )</td>
  </tr>
  <tr>
    <td width="24%" align="right">รหัสสมาชิก&nbsp;&nbsp;</td>
    <td width="76%">
      <input type="text" name="fmcode" id="fmcode" /></td>
  </tr>
  <tr align="center">
    <td colspan="2">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="2" align="center"><input type="button" name="Submit" value="ดูรายงาน" onclick="checkround()" /></td>
    </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
</td></tr></table>
<? }
?>