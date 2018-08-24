<script language="javascript">
function checkround(){
	if(document.getElementById("ftrcode").value==""){
		alert("กรุณาใส่รอบการคำนวณ");
		document.getElementById("ftrcode").focus();
		return false;
	}
	document.rform.submit();
}
function chknum(key){
	if(key>=48&&key<=57)
		return true;
	else
		return false;
}
</script>
<?
if(!isset($_POST["ftrcode"])){
	showdialog();
}else{ 
	$ro = $_POST["ftrcode"];
?><br />
<table width="95%" border="1" align="center">
  <tr>
    <td align="center"><br />
	<?
		$sql="select count(*) as cnt from ".$dbprefix."bround where rcode='$ro' ";
		$rs = mysql_query($sql);
		if(mysql_num_rows($rs)>0){
			$cnt = mysql_result($rs,0,"cnt");
		}
		if($cnt<1){
			echo "<FONT COLOR=\"ff0000\">ไม่พบ รอบ $ro ที่ต้องการลบ กรุณาใส่รอบที่ต้องการลบใหม่</FONT><BR>";
			showdialog();
			exit;
		}
		//bc
		//ลบข้อมูลใน bc ที่อยู่ในรอบ >=$ro
		$sql="delete from ".$dbprefix."mc where rcode>= '$ro'  ";
		if(mysql_query($sql)){
			mysql_query("COMMIT");
		}else{
			echo "error $sql<BR>";
		}

		$sql="delete from ".$dbprefix."mm where rcode>= '$ro'  ";
		if(mysql_query($sql)){
			mysql_query("COMMIT");
		}else{
			echo "error $sql<BR>";
		}
		//bmbonus
		//ลบข้อมูลใน bmbonus ที่อยู่ในรอบ >=$ro
		$sql="delete from ".$dbprefix."mmbonus where rcode>= '$ro'  ";
		if(mysql_query($sql)){
			mysql_query("COMMIT");
		}else{
			echo "error $sql<BR>";
		}
		

		$sql="delete from ".$dbprefix."mpv where rcode>= '$ro'  ";
		if(mysql_query($sql)){
			mysql_query("COMMIT");
		}else{
			echo "error $sql<BR>";
		}

		$sql="delete from ".$dbprefix."epv where rcode>= '$ro'  ";
		if(mysql_query($sql)){
			mysql_query("COMMIT");
		}else{
			echo "error $sql<BR>";
		}
		$sql="delete from ".$dbprefix."ec where rcode>= '$ro'  ";
		if(mysql_query($sql)){
			mysql_query("COMMIT");
		}else{
			echo "error $sql<BR>";
		}
		$sql="delete from ".$dbprefix."ed where rcode>= '$ro'  ";
		if(mysql_query($sql)){
			mysql_query("COMMIT");
		}else{
			echo "error $sql<BR>";
		}
		$sql="delete from ".$dbprefix."em where rcode>= '$ro'  ";
		if(mysql_query($sql)){
			mysql_query("COMMIT");
		}else{
			echo "error $sql<BR>";
		}
		$sql="delete from ".$dbprefix."embonus where rcode>= '$ro'  ";
		if(mysql_query($sql)){
			mysql_query("COMMIT");
		}else{
			echo "error $sql<BR>";
		}
		$sql="delete from ".$dbprefix."ombonus where rcode>= '$ro'  ";
		if(mysql_query($sql)){
			mysql_query("COMMIT");
		}else{
			echo "error $sql<BR>";
		}
		
		$sql="delete from ".$dbprefix."pospv where rcode= ".$ro."   ";
		if(mysql_query($sql)){
			mysql_query("COMMIT");
		}else{
			echo "error $sql<BR>";
		}
				$sql="delete from ".$dbprefix."dm  where rcode>= '$ro'  ";
		if(mysql_query($sql)){
			mysql_query("COMMIT");
		}else{
			echo "error $sql<BR>";
		}
		$sql="delete from ".$dbprefix."dc   where rcode>= '$ro'  ";
		if(mysql_query($sql)){
			mysql_query("COMMIT");
		}else{
			echo "error $sql<BR>";
		}
		$sql="delete from ".$dbprefix."dpv   where rcode>= '$ro'  ";
		if(mysql_query($sql)){
			mysql_query("COMMIT");
		}else{
			echo "error $sql<BR>";
		}
		$sql="delete from ".$dbprefix."dmbonus   where rcode>= '$ro'  ";
		if(mysql_query($sql)){
			mysql_query("COMMIT");
		}else{
			echo "error $sql<BR>";
		}
		$sql="delete from ".$dbprefix."sc where rcode= ".$ro." ";
		if(mysql_query($sql)){
			mysql_query("COMMIT");
		}else{
			echo "error $sql<BR>";
		}

		$sql="delete from ".$dbprefix."smbonus where rcode= '".$ro."'";
		if(mysql_query($sql)){
			mysql_query("COMMIT");
		}else{
			echo "error $sql<BR>";
		}

		$sql="delete from ".$dbprefix."status where rcode>= '".$ro."'";
		if(mysql_query($sql)){
			mysql_query("COMMIT");
		}else{
			echo "error $sql<BR>";
		}

	
		//ปรับ CALC ให้เป็น ''
		$sql="update ".$dbprefix."bround set calc='' where rcode>= '$ro'   ";
		if(mysql_query($sql)){
			mysql_query("COMMIT");
		}else{
			echo "error $sql<BR>";
		}
	
	
		$sql = " SELECT a.mcode,a.id,a.rcode,a.pos_before,a.pos_after,a.date_change FROM ".$dbprefix."calc_poschange1 as a WHERE a.date_change >= '$fdate' order by a.id desc ";
			//$sql = " SELECT mcode,pos_cur from ".$dbprefix."member a WHERE a.rcode >= '$ro' ORDER by  id desc";
			$rs = mysql_query($sql);
			if(mysql_num_rows($rs) > 0){
				while($row = mysql_fetch_object($rs)){
					$pos_before = $row->pos_before;
					if($pos_before == "SU" or $pos_before == "EX")$pos_before = "";
					$sql =" UPDATE ".$dbprefix."member  ";
					$sql.=" SET pos_cur1 = '".$pos_before."'";
					$sql.=" WHERE mcode  = '".$row->mcode."'";
					
					if($debug) echo "$sql <br>";
					if($row->pos_before <> ""){
						if(mysql_query($sql)){
							mysql_query("COMMIT");
						}else{
							echo "error $sql<BR>";
						}	
					}
				}
			$sqlDel = "delete from ".$dbprefix."calc_poschange1 where rcode >= '$ro' ";
		//	echo $sqlDel;
		//	exit;
					if(mysql_query($sqlDel)){
						mysql_query("COMMIT");
					}else{
						echo "error $sql<BR>";
					}
			}
			
		
			$sql = " SELECT a.mcode,a.id,a.rcode,a.pos_before,a.pos_after,a.date_change FROM ".$dbprefix."calc_poschange2 as a WHERE a.date_change >= '$fdate' order by a.id desc ";
			//$sql = " SELECT mcode,pos_cur from ".$dbprefix."member a WHERE a.rcode >= '$ro' ORDER by  id desc";
			$rs = mysql_query($sql);
			if(mysql_num_rows($rs) > 0){
				while($row = mysql_fetch_object($rs)){
					$sql =" UPDATE ".$dbprefix."member  ";
					$sql.=" SET pos_cur2 = '".$row->pos_before."'";
					$sql.=" WHERE mcode  = '".$row->mcode."'";
					
					if($debug) echo "$sql <br>";
					if($row->pos_before <> ""){
						if(mysql_query($sql)){
							mysql_query("COMMIT");
						}else{
							echo "error $sql<BR>";
						}	
					}
				}
			$sqlDel = "delete from ".$dbprefix."calc_poschange2 where rcode >= '$ro'  ";
					if(mysql_query($sqlDel)){
						mysql_query("COMMIT");
					}else{
						echo "error $sql<BR>";
					}
			}


			$sql = " SELECT a.mcode,a.id,a.rcode,a.pos_before,a.pos_after,a.date_change FROM ".$dbprefix."calc_poschange3 as a WHERE a.date_change >= '$fdate' order by a.id desc ";
			//$sql = " SELECT mcode,pos_cur from ".$dbprefix."member a WHERE a.rcode >= '$ro' ORDER by  id desc";
			$rs = mysql_query($sql);
			if(mysql_num_rows($rs) > 0){
				while($row = mysql_fetch_object($rs)){
					$sql =" UPDATE ".$dbprefix."member  ";
					$sql.=" SET pos_cur3 = '".$row->pos_before."'";
					$sql.=" WHERE mcode  = '".$row->mcode."'";
					
					if($debug) echo "$sql <br>";
					if($row->pos_before <> ""){
						if(mysql_query($sql)){
							mysql_query("COMMIT");
						}else{
							echo "error $sql<BR>";
						}	
					}
				}
			$sqlDel = "delete from ".$dbprefix."calc_poschange3 where rcode >= '$ro' ";
					if(mysql_query($sqlDel)){
						mysql_query("COMMIT");
					}else{
						echo "error $sql<BR>";
					}
			}



						/////////////////////รักษายอดล่วงหน้า รายวัน////////////////////////////////////////////////////////////////////////////////////
			$sqlC = "select mcode, SUM(tot_pv) AS total_fv from ".$dbprefix."asaleh WHERE sadate between '$fdate' and '$tdate' AND sa_type='Q'  and cancel=0  group by mcode ";
			//exit;
				//	if($mcode == '0019157')echo $sqlC.'<br>';
			$total_fvC=0;
			$rsC=mysql_query($sqlC);
			for($i=0;$i<mysql_num_rows($rsC);$i++){
				$sqlObj = mysql_fetch_object($rsC);
				$mcode = $sqlObj->mcode;
				$total_fvQ1 = $sqlObj->total_fv;
				$sqlselect = "select id from ".$dbprefix."status  WHERE mcode = '$mcode' order by id desc limit 0,1 ";
				$rsSelect = mysql_query($sqlselect);
				if(mysql_num_rows($rsSelect) > 0){
					$ObjSelect = mysql_fetch_object($rsSelect);
					$id = $ObjSelect->id;
					mysql_free_result($rsSelect);
					$sqlUpdate = "update ".$dbprefix."status set pv = pv-$total_fvQ1 where id = '$id' ";
					mysql_query($sqlUpdate);
				}
			}
			mysql_free_result($rsC);

			$total_fvC = 0;
			$sqlC = "select mcode, SUM(tot_pv) AS total_fv from ".$dbprefix."holdhead WHERE sadate between '$fdate' and '$tdate' AND sa_type='Q'  and cancel=0  group by mcode ";
					
			$total_fvC=0;
			$rsC=mysql_query($sqlC);
			for($i=0;$i<mysql_num_rows($rsC);$i++){
				$sqlObj = mysql_fetch_object($rsC);
				$mcode = $sqlObj->mcode;
				$total_fvQ2 = $sqlObj->total_fv;
				$sqlselect = "select id from ".$dbprefix."status  WHERE mcode = '$mcode' order by id desc limit 0,1 ";
				$rsSelect = mysql_query($sqlselect);
				if(mysql_num_rows($rsSelect) > 0){
					$ObjSelect = mysql_fetch_object($rsSelect);
					$id = $ObjSelect->id;
					mysql_free_result($rsSelect);
					$sqlUpdate = "update ".$dbprefix."status set pv = pv-$total_fvQ2 where id = '$id' ";
					mysql_query($sqlUpdate);
				}
			}
			mysql_free_result($rsC);


		echo "ลบการคำนวณ ตั้งแต่รอบที่ $ro เรียบร้อยแล้ว<BR><BR>";

	?>
	</td>
	</tr>
</table>
<br />
<?
}
function showdialog(){
?>
<table width="95%"><tr><td><br />
<form name="rform" method="post" action="./index.php?sessiontab=4&sub=13">
<table width="60%" border="1" cellpadding="0" cellspacing="0" bordercolor="#FF7F00" align="center">
  <tr>
    <td colspan="2" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center">กรอกรอบการคำนวณแมทชิ่งที่ต้องการลบเช่น 1</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="40%" align="right">รอบ&nbsp;&nbsp;</td>
    <td width="60%">
      <input type="text" name="ftrcode" id="ftrcode" onkeypress="return chknum(window.event.keyCode)" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr align="center">
    <td colspan="2"><input type="button" name="Submit" value="ลบการคำนวณ" onClick="checkround()"></td>
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