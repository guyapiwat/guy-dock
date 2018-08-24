<? include("prefix.php");?>
<?
	//if the form was filled out, set the session variables
	
	if (isset($_POST["usercode"]) && isset($_POST["password"]) ) {
		$_SESSION["usercode"] = $_POST["usercode"];
		$_SESSION["usercode"] = gencode($_SESSION["usercode"]);
		$_SESSION["password"] = $_POST["password"];
		$sql = "SELECT * FROM ".$dbprefix."member WHERE mcode='".$_SESSION["usercode"]."' AND sv_code='".$_SESSION["password"]."' LIMIT 1";
		//echo $sql;
		$rs=mysql_query($sql);
		if(mysql_num_rows($rs)>0){
			$_SESSION["username"] = mysql_result($rs,0,'name_t');
			$_SESSION["ewallet"] = mysql_result($rs,0,'ewallet');
			$sql = "TRUNCATE TABLE ".$dbprefix."cnt_bm ";
					mysql_query($sql);
			////////check lr/////////////
					$sql="SELECT rcode,fdate,tdate FROM ".$dbprefix."around WHERE calc='1' ORDER BY rcode DESC LIMIT 1";
					//echo $sql.'<br>';
					
					$rs = mysql_query($sql);
					$where_cause = "";
					$max_rcode = 0;
					if(mysql_num_rows($rs)>0){
						$where_cause = "AND sadate>'".mysql_result($rs,0,'tdate')."' ";
						$max_tdate = mysql_result($rs,0,'tdate');
						//exit;
						$max_rcode = mysql_result($rs,0,'rcode');
					}
					$sql="SELECT * FROM ".$dbprefix."member ORDER BY lr DESC";
					$rs = mysql_query($sql);
					for($i=0;$i<mysql_num_rows($rs);$i++){
						$sqlObj = mysql_fetch_object($rs);
						$mcode[$i] =$sqlObj->mcode;		
						$name_t[$i] =$sqlObj->name_t;		
						$upa_code[$mcode[$i]] = $sqlObj->upa_code;
						$lr[$mcode[$i]] = $sqlObj->lr;
						$pos_cur[$mcode[$i]] = $sqlObj->pos_cur;
						$tot_pv[$mcode[$i]] = 0; 
						$sum_pv[$mcode[$i]][1] =0;
						$sum_pv[$mcode[$i]][2] =0;
						$sum_pv[$mcode[$i]][3] =0;
						$count[$mcode[$i]][1] =0;
						$count[$mcode[$i]][2] =0;
						$count[$mcode[$i]][3] =0;
						$old_quota[$mcode[$i]] = 0;
					}
					mysql_free_result($rs);

					$sql 	= "SELECT mcode,sum(tot_pv) as tot_pv FROM ".$dbprefix."holdhead ";
					$sql .= "WHERE   sa_type='A' $where_cause AND cancel=0   group by mcode";
					$rs = mysql_query($sql);
					if(mysql_num_rows($rs) > 0){
						for($i=0;$i<mysql_num_rows($rs);$i++){
							
							$sqlObj = mysql_fetch_object($rs);
							$tot_pv[$sqlObj->mcode] += $sqlObj->tot_pv;
						}
						mysql_free_result($rs);						
					}
					
					

					$sql 	= "SELECT mcode,sum(tot_pv) as tot_pv FROM ".$dbprefix."asaleh ";
					$sql .= "WHERE  sa_type='A' $where_cause AND cancel=0   group by mcode";
					$rs = mysql_query($sql);
					if(mysql_num_rows($rs) > 0){
						for($i=0;$i<mysql_num_rows($rs);$i++){
							//var_dump(mysql_num_rows($rs));
							//exit;
							$sqlObj = mysql_fetch_object($rs);
							$tot_pv[$sqlObj->mcode] += $sqlObj->tot_pv;
						}
						mysql_free_result($rs);
					}
					//คำนวน bm ไม่ใช้ในส่วน bmbonus
					
					for($i=0;$i<sizeof($mcode);$i++){
						if($tot_pv[$mcode[$i]] > 0){
							$up = $mcode[$i];
							$lev = 0;
							while($up <> ""){
								if($upa_code[$up] <>"" and $upa_code[$up] <> '0000000'){
									$sql = "INSERT INTO ".$dbprefix."cnt_bm (rcode,mcode,upa_code,pv,lr,fdate,tdate) VALUES";
									$sql .= "(".$max_rcode.",'$mcode[$i]','$upa_code[$up]','".$tot_pv[$mcode[$i]]."','$lr[$up]','$max_tdate','$max_tdate') ";
									mysql_query($sql);
									//echo " $sql ,<br>";
								}
								$up = $upa_code[$up];
							}
						}
					}
					//	exit;
				$mcode = "";
			echo "<script language='javascript' type='text/javascript'>window.location='./index.php?sessiontab=1'</script>";
			exit;
		}else{
			unset($_SESSION["usercode"]);
			echo "<script language='javascript' type='text/javascript'>window.location='./index.php'</script>";
			exit;
		}
	}else{
	//include("header.php")?>
    
<table align="center" cellspacing="0" cellpadding="5" border="0" width="300">
  <tr>
    <td valign="top"><form method="post" action="<?=$_SERVER["PHP_SELF"]?>" name="Form1" autocomplete="off">
      กรุณาพิมพ์ รหัสสมาชิก และ รหัสผ่าน แล้วกด [Login]<br />
      <br />
      <table border="0" cellpadding="0" cellspacing="1" width="300" height="150" background="./images/log_banner.jpg" style="background-repeat:no-repeat">
        <tr>
          <td  width="30%" align="right">&nbsp;</td>
          <td width="70%" align="left"></td>
        </tr>
        <tr>
          <td  align="right">รหัสสมาชิก&nbsp;:&nbsp;</td>
          <td  align="left"><input type="text" name="usercode" size="20" /></td>
        </tr>
        <tr>
          <td  align="right">รหัสผ่าน&nbsp;:&nbsp;</td>
          <td  align="left"><input type="password" name="password" size="20" /></td>
        </tr>
		<tr>
			<td></td>
			<td><div style="width: 150px; float: left; height: 50px">
      <img id="siimage" align="left" style="padding-right: 5px; border: 0" src="securimage_show.php?sid=<?php echo md5(time()) ?>" />

        <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0" width="19" height="19" id="SecurImage_as3" align="middle">
			    <param name="allowScriptAccess" value="sameDomain" />
			    <param name="allowFullScreen" value="false" />
			    <param name="movie" value="securimage_play.swf?audio=securimage_play.php&bgColor1=#777&bgColor2=#fff&iconColor=#000&roundedCorner=5" />
			    <param name="quality" value="high" />
			
			    <param name="bgcolor" value="#ffffff" />
			    <embed src="securimage_play.swf?audio=securimage_play.php&bgColor1=#777&bgColor2=#fff&iconColor=#000&roundedCorner=5" quality="high" bgcolor="#ffffff" width="19" height="19" name="SecurImage_as3" align="middle" allowScriptAccess="sameDomain" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
			  </object>

        <br />
        
        <!-- pass a session id to the query string of the script to prevent ie caching -->
        <a tabindex="-1" style="border-style: none" href="#" title="Refresh Image" onclick="document.getElementById('siimage').src = 'securimage_show.php?sid=' + Math.random(); return false"><img src="images/refresh.gif" alt="Reload Image" border="0" onclick="this.blur()" align="bottom" /></a>
</div></a>
</div>
<div style="clear: both"></div>
<!--Code:<br />-->

<!-- NOTE: the "name" attribute is "code" so that $img->check($_POST['code']) will check the submitted form field -->
<input type="text" name="code" size="12" /><br /><br /></td>
		</tr>
        <tr>
          <td align="right"></td>
          <td align="left">
              <input type="submit"  name="B1" value="Login" />
            &nbsp;&nbsp;</td>
        </tr>
        <tr>
          <td  align="right">&nbsp;</td>
          <td  align="left"></td>
        </tr>
      </table>
    </form>
        <u><b>หมายเหตุ</b></u> สมาชิกที่ยังไม่มีรหัสผ่าน กรุณาติดต่อสำนักงานใหญ่เพื่อขอรหัสผ่าน<br />    </td>
    <!-- 
            <td width="284" align="center" valign="middle">
                <p></p><img src="pic/mematairstep.jpg" width="170" height="121" border=0 alt="แผนภูมิสมาชิก"><br><FONT face="MS Sans Serif" SIZE="2" COLOR="">ดูแผนภูมิสายงานสมาชิก</td>
 -->
  </tr>
</table>
<? 
	}
	//include("footer.php")
?>




