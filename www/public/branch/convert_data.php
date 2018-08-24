<script language="javascript">
function checkround(){
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
set_time_limit( 0);
ini_set("memory_limit","200M");
ob_start();

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
			//รอบเริ่มต้น == รอบสิ้นสุด
			$ftrc[0]=$ftrcode;
			$ftrc[1]=$ftrcode;
		}else{
			$ftrc = explode('-',$ftrcode);
		}
		if($ftrc[0]>$ftrc[1]){
			?><FONT COLOR="#ff0000">รอบเริ่มต้น ต้องน้อยกว่าหรือเท่ากับ รอบสิ้นสุด กรุณาใส่รอบการคำนวณใหม่</FONT><?
			showdialog();
			exit;
		}else{
		$rof = $ftrc[0];
		$rot = $ftrc[1];

		$step="1";
		$time_start = getmicrotime();
		
		echo "เริ่มการถ่ายโอนข้อมูล &nbsp;&nbsp;&nbsp;: ".date("Y-m-d H:i:s")." ".strtotime("now"),"<BR>";
		//echo "1.สำหรับแต่ละรอบ Ro ระหว่าง Frcode-Trcode ใน around<BR>";
		//อ่านข้อมูล สมาชิก
		/*$sql="SELECT * FROM ali_member_old ";
		$rs = mysql_query($sql);
		for($i=0;$i<mysql_num_rows($rs);$i++){
			$sqlObj = mysql_fetch_object($rs);
			$mcode= $sqlObj->mcode; //รหัสสมาชิก
			$name_f= $sqlObj->name_f;
			$name_t= $sqlObj->name_t;
			$mdate = $sqlObj->mdate;
			$birthday = $sqlObj->birthday;
			$national= $sqlObj->national;
			$id_card= $sqlObj->id_card;
			$province= $sqlObj->province;
			$zip= $sqlObj->zip;
			$home_t = $sqlObj->home_t;
			$mobile= $sqlObj->mobile;
			$bonusrec= $sqlObj->bonusrec;
			$bankcode= $sqlObj->bankcode;
			$branch= $sqlObj->branch;
			$acc_type= $sqlObj->acc_type;
			$acc_no = $sqlObj->acc_no;
			$acc_name = $sqlObj->acc_name;
			$sv_code  = $sqlObj->sv_code;
			$sp_code = $sqlObj->sp_code;
			$sp_name  = $sqlObj->sp_name;
			$upa_code = $sqlObj->upa_code;
			$upa_name = $sqlObj->upa_name;
			$lr  = $sqlObj->lr;
			$sex = $sqlObj->sex;
			$age = $sqlObj->age;
			$occupation = $sqlObj->occupation;
			$status = $sqlObj->status;
			$mar_name = $sqlObj->mar_name;
			$mar_age = $sqlObj->mar_age;
			$email = $sqlObj->email;
			$beneficiaries = $sqlObj->beneficiaries;
			$relation = $sqlObj->relation;
			$districtId = $sqlObj->districtId;
			$amphurId = $sqlObj->amphurId;
			$provinceId = $sqlObj->provinceId;
			$fax = $sqlObj->fax;
			$pos_cur= $sqlObj->pos_cur;
			$memdesc= $sqlObj->memdesc;
			$cmp= $sqlObj->cmp;
			$address= $sqlObj->address;
			$view_flg = $sqlObj->view_flg;
			
			$sql1="SELECT * from ali_member where mcode='$mcode' ";
			echo "$sql1<br>";
			$rs1 = mysql_query($sql1);
			if(mysql_num_rows($rs1)<=0){
				$sql="insert into ".$dbprefix."member (mcode,name_f,name_t, mdate,  birthday,  national,id_card,province,zip,home_t,mobile,bonusrec,bankcode,branch,acc_type,acc_no,acc_name,sv_code,sp_code,sp_name,upa_code,upa_name,lr,sex,age,occupation,status,mar_name,mar_age,email,beneficiaries,relation,districtId,amphurId,provinceId,fax,pos_cur,memdesc,cmp,address,view_flg) values ('$mcode','$name_f','$name_t','$mdate','$birthday','$national','$id_card','$province','$zip','$home_t','$mobile','$bonusrec','$bankcode','$branch','$acc_type','$acc_no','$acc_name','$sv_code','$sp_code','$sp_name','$upa_code','$upa_name','$lr','$sex','$age','$occupation','$status','$mar_name','$mar_age','$email','$beneficiaries','$relation','$districtId','$amphurId','$provinceId','$fax','$pos_cur','$memdesc','$cmp','$address','$view_flg') ";
				if (! mysql_query($sql)) {
					echo "<font color='#FF0000'>error</font><br>";
					echo  "$sql<br>";
					echo  die(mysql_error());
					mysql_query("ROLLBACK");
					$cmsave=false;
					exit;
				}else{
					$cmsave=true;
				}
			}
			mysql_free_result($rs1);
		}
		mysql_free_result($rs);*/

		$sql1="SELECT * FROM ali_member_old ";
		$rs1 = mysql_query($sql1);
		for($l=0;$l<mysql_num_rows($rs1);$l++){
			$sqlObj1 = mysql_fetch_object($rs1);
			$mcode1= $sqlObj1->mcode; //รหัสสมาชิก
			$pos_cur= $sqlObj1->pos_cur;
			$sql="SELECT sum(tot_pv) as tot_pv FROM ali_asaleh_old where cancel=0 and mcode='$mcode1' and sa_type='A' ";
			$rs = mysql_query($sql);
			if(mysql_num_rows($rs)>0){
				$sqlObj = mysql_fetch_object($rs);
				$btot_pv= $sqlObj->tot_pv; //วันที่สมัคร
				$sadate= "2010-03-09"; //วันที่สมัคร
			}
			mysql_free_result($rs);

			$sql="SELECT sum(tot_pv) as tot_pv FROM ali_holdhead_old where cancel=0 and mcode='$mcode1' and sa_type='A' ";
			$rs = mysql_query($sql);
			if(mysql_num_rows($rs)>0){
				$sqlObj = mysql_fetch_object($rs);
				$htot_pv= $sqlObj->tot_pv; //วันที่สมัคร
			}
			mysql_free_result($rs);
			$sano="-".($l+1);
			$total= 0; //ชื่อสมาชิก
			$sadate= "2010-03-09"; //วันที่สมัคร

			switch ($pos_cur){
				case 'S':
					$totamt=1000;
					$sql = "UPDATE ".$dbprefix."member SET pos_cur='S' WHERE mcode='".$mcode1."' LIMIT 1 ";
					mysql_query($sql);
					break;
				case 'G':
					$totamt=1000;
					$sql = "UPDATE ".$dbprefix."member SET pos_cur='S' WHERE mcode='".$mcode1."' LIMIT 1 ";
					mysql_query($sql);
					break;
				case 'P':
					$totamt=2000;
					$sql = "UPDATE ".$dbprefix."member SET pos_cur='G' WHERE mcode='".$mcode1."' LIMIT 1 ";
					mysql_query($sql);
					break;
				case 'T':
					$totamt=5000;
					$sql = "UPDATE ".$dbprefix."member SET pos_cur='P' WHERE mcode='".$mcode1."' LIMIT 1 ";
					mysql_query($sql);
					break;
				default :
					$totamt=($btot_pv+$htot_pv);
					if($totamt>=1000){
						$totamt=1000;
						$sql = "UPDATE ".$dbprefix."member SET pos_cur='S' WHERE mcode='".$mcode1."' LIMIT 1 ";
						mysql_query($sql);
					}
					break;
			}
			
		}
			/*if($totamt>0){
				$sql="insert into ".$dbprefix."asaleh (sano, sadate,  mcode,  sa_type,  total, tot_pv, uid ) values ('$sano' ,'$sadate' ,'$mcode1', 'A'  ,'$total' ,'$totamt' ,'".$_SESSION['adminuserid']."') ";
					if (! mysql_query($sql)) {
						echo "<font color='#FF0000'>error</font><br>";
						echo  "$sql<br>";
						echo  die(mysql_error());
						mysql_query("ROLLBACK");
						$cmsave=false;
						exit;
					}
			}

			$sql="SELECT * FROM ali_bmbonus_old where mcode='$mcode1' and rcode=(Select MAX(rcode) from ali_bmbonus_old where mcode='$mcode1')  ";
			echo "$sql<br>";
			$rs = mysql_query($sql);
			if(mysql_num_rows($rs)>0){
				$sqlObj = mysql_fetch_object($rs);
				$carry_l= $sqlObj->carry_l ; //วันที่สมัคร
				$carry_r= $sqlObj->carry_r ; //วันที่สมัคร
				$fdate = $sqlObj->fdate; //วันที่สมัคร
				 
				 $sql="insert into ".$dbprefix."bmbonus (mcode,rcode,carry_l, carry_r,  fdate,  tdate) values ('$mcode1','0','$carry_l' ,'$carry_r' ,'$fdate','$fdate') ";
					if (! mysql_query($sql)) {
						echo "<font color='#FF0000'>error</font><br>";
						echo  "$sql<br>";
						echo  die(mysql_error());
						mysql_query("ROLLBACK");
						$cmsave=false;
						exit;
					}else{
						$cmsave=true;
					}
			}
			mysql_free_result($rs);
		}*/


			/*$sql="SELECT * FROM ali_bmbonus where rcode=0";
			echo "$sql<br>";
			$rs = mysql_query($sql);
			for($l=0;$l<mysql_num_rows($rs);$l++){
				$sqlObj = mysql_fetch_object($rs);
				$carry_l= $sqlObj->carry_l ; //วันที่สมัคร
				$carry_r= $sqlObj->carry_r ; //วันที่สมัคร
				$mcode = $sqlObj->mcode; //วันที่สมัคร
				if($carry_r>0){
					$sql="Update ".$dbprefix."bmbonus  set carry_c='$carry_r', carry_r='0',pcrry_r='0' where mcode='$mcode' ";
					echo "$sql<br>";
					mysql_query($sql);
				}
			}
			mysql_free_result($rs);*/

		/*mysql_query("START TRANSACTION");
		$cmsave=true;
		$sql="SELECT * FROM sv_member Order by MEM_ID";
		$rs = mysql_query($sql);
		for($i=0;$i<mysql_num_rows($rs);$i++){
			$sqlObj = mysql_fetch_object($rs);
			$mcode= $sqlObj->MEM_ID; //รหัสสมาชิก
			$name_t= $sqlObj->MEM_Name; //ชื่อสมาชิก
			$mdate= $sqlObj->MEM_Timer; //วันที่สมัคร
			$pos_no= $sqlObj->MEM_CLSTrue; //วันที่สมัคร


			//อ่านข้อมูลธนาคาร จากตาราง sv_member_bank
			$sql1 = "SELECT * FROM sv_member_bank WHERE MEM_ID='".$mcode."' ";
			$rs1 = mysql_query($sql1);
			if(mysql_num_rows($rs1)>0){
				$row = mysql_fetch_object($rs1);
				$bank_name=$row->BNK_Name;
				$bank_branch=$row->BNK_Branch;
				$acc_type=$row->BNK_Type;
				$acc_name=$row->BNK_AccName;
				$acc_no=$row->BNK_AccNo;
				//เอาชื่อธนาคารไปหารหัสธนาคาร
				$sql_b = "SELECT * FROM ".$dbprefix."bank WHERE bankname='".$bank_name."' ";
				$rs_b = mysql_query($sql_b);
				if(mysql_num_rows($rs_b)>0){
					$row_b = mysql_fetch_object($rs_b);
					$bank_code=$row_b->bankcode;
				}else{
					$bank_code="";
				}
				mysql_free_result($rs_b);
			}
			mysql_free_result($rs1);
			
			//อ่านข้อมูลสายงานสมาชิก จากตาราง sv_member_fiber
			$sql1 = "SELECT * FROM sv_member_fiber WHERE MEM_ID='".$mcode."' ";
			$rs1 = mysql_query($sql1);
			if(mysql_num_rows($rs1)>0){
				$row = mysql_fetch_object($rs1);
				$sp_code=$row->FIB_Adviser;
				$upa_code=$row->FIB_Upline;
				$lr=$row->FIB_Field;
				switch ($lr){
					case 'C':
						$lr=0;
						break;
					case 'L':
						$lr=1;
						break;
					case 'R':
						$lr=2;
						break;
					default:
						$lr='';
						break;
				}
				//ไปหาชื่อผู้แนะนำ
				$sql_b = "SELECT * FROM sv_member WHERE MEM_ID='".$sp_code."' ";
				//echo "<br>";
				$rs_b = mysql_query($sql_b);
				if(mysql_num_rows($rs_b)>0){
					$row_b = mysql_fetch_object($rs_b);
					$sp_name=$row_b->MEM_Name;
				}else{
					$sp_name="";
				}
				mysql_free_result($rs_b);
				//ไปหาชื่ออัพไลน์
				$sql_b = "SELECT * FROM sv_member WHERE MEM_ID='".$upa_code."' ";
				$rs_b = mysql_query($sql_b);
				if(mysql_num_rows($rs_b)>0){
					$row_b = mysql_fetch_object($rs_b);
					$upa_name=$row_b->MEM_Name;
				}else{
					$upa_name="";
				}
				mysql_free_result($rs_b);


			}
			mysql_free_result($rs1);

			//อ่านข้อมูลหมายเลขบัตรประชาชนสมาชิก  sv_member_profile
			$sql1 = "SELECT * FROM sv_member_profile WHERE MEM_ID='".$mcode."' ";
			$rs1 = mysql_query($sql1);
			if(mysql_num_rows($rs1)>0){
				$row = mysql_fetch_object($rs1);
				$id_card=$row->PRO_CardNo;
				$address=$row->PRO_Address;
				$tel=$row->PRO_Phone;
				$svcode=$row->PRO_Password;
			}
			mysql_free_result($rs1);

			//อ่านข้อมูลหมายเลขบัตรประชาชนสมาชิก  sv_member_profile
			$sql1 = "SELECT * FROM sv_member_profile WHERE MEM_ID='".$mcode."' ";
			$rs1 = mysql_query($sql1);
			if(mysql_num_rows($rs1)>0){
				$row = mysql_fetch_object($rs1);
				$id_card=$row->PRO_CardNo;
				$address=$row->PRO_Address;
				$tel=$row->PRO_Phone;
				$svcode=$row->PRO_Password;
			}
			mysql_free_result($rs1);

			//อ่านข้อมูลหมายเลขบัตรประชาชนสมาชิก  sv_member_profile
			$sql1 = "SELECT * FROM sv_system_class WHERE CLS_ID='".$pos_no."' ";
			$rs1 = mysql_query($sql1);
			if(mysql_num_rows($rs1)>0){
				$row = mysql_fetch_object($rs1);
				$pos_cur_no=$row->CLS_ID;
				switch ($pos_cur_no){
					case 1:
						$pos_cur="";
						break;
					case 2:
						$pos_cur="S";
						break;
					case 3:
						$pos_cur="G";
						break;
					case 4:
						$pos_cur="P";
						break;
					case 5:
						$pos_cur="T";
						break;
					case 6:
						$pos_cur="D";
						break;
					case 7:
						$pos_cur="SD";
						break;
					case 8:
						$pos_cur="GE";
						break;
					case 9:
						$pos_cur="DE";
						break;
					case 10:
						$pos_cur="CD";
						break;
					case 11:
						$pos_cur="";
						break;
					
				}
			}
			mysql_free_result($rs1);


				$mcode=gencode($mcode);
				$sp_code=gencode($sp_code);
				$upa_code=gencode($upa_code);
				//$svcode=rand(1000,9999);
				if($mcode=='0000001'){
					$sp_code="";
					$upa_code="";
				}
				$sql = "INSERT INTO ".$dbprefix."member (mcode,name_t,mdate,";
				$sql .= "bankcode,branch,acc_type,acc_no,acc_name,";
				$sql .= "sp_code,sp_name,upa_code,upa_name,lr,";
				$sql .= "id_card,address,mobile,sv_code,pos_cur) VALUES";
				$sql .= "('".$mcode."','$name_t','".$mdate."',";
				$sql .= " '".$bank_code."','".$bank_branch."','".$acc_type."','".$acc_no."','".$acc_name."', ";
				$sql .= " '".$sp_code."','".$sp_name."','".$upa_code."','".$upa_name."','".$lr."', ";
				$sql .= " '".$id_card."','".$address."','".$tel."','".$svcode."','$pos_cur') ";
				if (! mysql_query($sql)) {
					echo "<font color='#FF0000'>error</font><br>";
					echo  "$sql<br>";
					echo  die(mysql_error());
					mysql_query("ROLLBACK");
					$cmsave=false;
				}else{
					$cmsave=true;
				}
			
		}
		mysql_free_result($rs);

	//	if($cmsave){
	//		mysql_query("COMMIT");
		//}else{
			//mysql_query("ROLLBACK");
		//}
		//สิ้นสุดการนำเข้าข้อมูลสมาชิก
		
		//ถ่ายโอนข้อมูลบิลขาย
		//mysql_query("START TRANSACTION");
		//$cmsave=true;
		$sql="SELECT * FROM sv_sell Order by SEL_ID";
		$rs = mysql_query($sql);
		for($i=0;$i<mysql_num_rows($rs);$i++){
			$sqlObj = mysql_fetch_object($rs);
			$sano= $sqlObj->SEL_ID; //รหัสสมาชิก
			$mcode= $sqlObj->	MEM_ID; //ชื่อสมาชิก
			$sadate= $sqlObj->SEL_Timer; //วันที่สมัคร
			
			$mcode=gencode($mcode);

			$sql1="SELECT sum(SEL_Sale)*sum(SEL_Quantity) as total,sum(SEL_PV)*sum(SEL_Quantity) as tot_pv FROM sv_sell_detail where SEL_ID='".$sano."' ";
			$rs1 = mysql_query($sql1);
			if(mysql_num_rows($rs1)>0){
				$sqlObj1 = mysql_fetch_object($rs1);
				$total= $sqlObj1->total;
				$tot_pv= $sqlObj1->tot_pv;
			}else{
				mysql_query("ROLLBACK");
				$cmsave=false;
				echo "ไม่พบคะแนนใน Detail<BR>";
				exit;
			}
			mysql_free_result($rs1);

				$sql="insert into ".$dbprefix."asaleh (sano, sadate,  mcode,  sa_type,  total, tot_pv, uid ) values ('$sano' ,'$sadate' ,'$mcode', 'A'  ,'$total' ,'$tot_pv' ,'".$_SESSION['adminuserid']."') ";
				if (! mysql_query($sql)) {
					echo "<font color='#FF0000'>error</font><br>";
					echo  "$sql<br>";
					echo  die(mysql_error());
					mysql_query("ROLLBACK");
					$cmsave=false;
					exit;
				}else{
					$cmsave=true;
				}

			$sql1="SELECT * FROM sv_sell_detail where SEL_ID='".$sano."' ";
			$rs1 = mysql_query($sql1);
			for($d=0;$d<mysql_num_rows($rs1);$d++){
				$sqlObj2 = mysql_fetch_object($rs1);
				$pcode= $sqlObj2->PDT_ID;
				$qty= $sqlObj2->SEL_Quantity;
				$pv= $sqlObj2->SEL_PV;
				$price= $sqlObj2->SEL_Sale;
				$totalprice=($price*$qty);

				$sql2="SELECT * FROM sv_product where PDT_ID='".$pcode."' ";
				echo "$sql2<br>";
				$rs2 = mysql_query($sql2);
				if(mysql_num_rows($rs2)>0){
					$sqlObj2 = mysql_fetch_object($rs2);
					$pdesc= $sqlObj2->PDT_Name;
					echo "Product name ----  $pdesc<br>";
					//exit;
				}else{
					mysql_query("ROLLBACK");
					$cmsave=false;
					echo "ไม่พบชื่อสินค้าใน Detail รหัสสินค้า <BR>";
					exit;
				}
				mysql_free_result($rs2);
				//exit;
				
				$sql="insert into ".$dbprefix."asaled (sano,pcode,pdesc,price,pv,qty,amt) values ('$sano','$pcode','$pdesc','$price' ,'$pv','$qty','$totalprice') ";
				if (! mysql_query($sql)) {
					echo "<font color='#FF0000'>error</font><br>";
					echo  "$sql<br>";
					echo  die(mysql_error());
					mysql_query("ROLLBACK");
					$cmsave=false;
					exit;
				}else{
					$cmsave=true;
				}
			}
			mysql_free_result($rs1);
		}
		mysql_free_result($rs);
		
		if($cmsave){
			mysql_query("COMMIT");
		}else{
			mysql_query("ROLLBACK");
		}*/

		$time_end = getmicrotime();
		$time = $time_end - $time_start;
		echo "สิ้นสุดการถ่ายโอนข้อมูล : ".date("Y-m-d H:i:s")." ".strtotime("now"),"<BR>";
		echo "การถ่ายโอนข้อมูลใช้เวลาทั้งสิ้น $time วินาที<BR>";
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
<form name="rform" method="post" action="./index.php?sessiontab=5&sub=7">
<table width="60%" border="1" cellpadding="0" cellspacing="0" bordercolor="#FF7F00" align="center">
  <tr>
    <td colspan="2" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center">ถ่ายโอนข้อมูลสมาชิกจากระบบเดิม ดังนี้<br>1.ข้อมูลสมาชิก<br>2.ข้อมูลบิลขาย</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <!--td width="40%" align="right">รอบ&nbsp;&nbsp;</td-->
    <td width="60%">
      <input type="hidden" name="ftrcode" id="ftrcode" value="1" onkeypress="return chknum(window.event.keyCode)" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr align="center">
    <td colspan="2"><input type="button" name="Submit" value="ถ่ายโอนข้อมูล" onClick="checkround()"></td>
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
function getmicrotime() { 
    list($usec, $sec) = explode(" ", microtime()); 
    return ((float)$usec + (float)$sec); 
} 

?>