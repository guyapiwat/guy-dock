<?
session_start();
if($_GET["cmc"])$cmc = $_GET["cmc"];
else $cmc = $_SESSION['usercode'];
if($_GET["bid"])$id = $_GET["bid"];
	$result=mysql_query("select *,DATE_FORMAT(birthday, '%d-%m-%Y') as birthday from ".$dbprefix."member where mcode='".$cmc."' and uid = '".$_SESSION["usercode"]."' ");
	if (mysql_num_rows($result)>0) {
			$row = mysql_fetch_array($result, MYSQL_ASSOC);
			$name_f = $row["name_f"];
			$name_t = $row["name_t"];
			$cname_f = $row["cname_f"];
			$cname_t = $row["cname_t"];
			$email = $row["email"];
			$mdate = $row["mdate"];
			 

			$cardid=substr($row["id_card"],9,4);
			$mdate = strtotime($mdate);
			$cmc_upa_code = $row["upa_code"];
			$cmc_upa_code = $row["upa_code"];
			$cmc_sp_code = $row["sp_code"];
			$pos_cur2=$row["pos_cur2"];
			$pos_cur123=$row["pos_cur"];
			$pos_cur33=$row["pos_cur2"];
			if(empty($pos_cur2))$pos_cur2 = $row["pos_cur"];
	}
	$result=mysql_query("select id from ".$dbprefix."asaleh where mcode='".$cmc."' order by id ASC");
	if (mysql_num_rows($result)>0) {
			$row = mysql_fetch_array($result, MYSQL_ASSOC);
			$id = $row["id"];
	}
?>
<div class="row">
	
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->
		<div class="clearfix">
		<div>
			<div id="user-profile-1" class="user-profile row">

				<div class="col-xs-12 col-sm-12">
					<!-- #section:pages/profile.info -->
					<div class="profile-user-info profile-user-info-striped">
						<div class="profile-info-row">
							<div class="profile-info-value">
								<span class="editable" id="username"><h1><Center>WELCOME TO MLM SYSTEM</h1></Center></span>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12">
					<!-- #section:pages/profile.info -->
					<div class="profile-user-info profile-user-info-striped">
						<div class="profile-info-row">
							<div class="profile-info-name">
							รหัสสมาชิก และ Username ในการ login เข้าสู่ระบบ
							<?//=$wording_lan["newmember"]?></div>

							<div class="profile-info-value">
								<span class="editable" id="username"><?=$cmc?></span>
							</div>
						</div>

<?if($cname_f."x"!="x"){?>
	<div class="profile-info-row">
							<div class="profile-info-name">ผู้สมัครร่วม</div>

							<div class="profile-info-value">
								<span class="editable" id="username"><?=$cname_f?> <?=$cname_t?></span>
							</div>
						</div>

<?}?>
						<div class="profile-info-row">
							<div class="profile-info-name">รหัสผ่าน คือ 4 ตัวท้ายบัตรประชาชน</div>

							<div class="profile-info-value">
								<span class="editable" id="username"><?=$cardid?></span>
							</div>
						</div>


						<div class="profile-info-row">
							<div class="profile-info-name"><?=$wording_lan["membern"]?></div>

							<div class="profile-info-value">
								<span class="editable" id="age"><?=$name_f.' '.$name_t?></span>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name">
							
							<?//=$wording_lan["systemmail"]?></div>

							<div class="profile-info-value">
								<span class="editable" id="age">
								บริษัทจะทำการตรวจสอบบัตรประชาชนของท่าน เพื่อความถูกต้องภายใน 2 สัปดาห์ และกรุณาส่งสำเนาหน้าแรกสมุดบัญชีไปที่	
								<?//=$email?></span>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name">
							
							<?//=$wording_lan["report"]?></div>

							<div class="profile-info-value">
								<span class="editable" id="username">
								ท่านสามารถเข้าสู่ระบบได้ที่ www.cciofficial.com
								<?//=date("Y-m-d",strtotime("+1 Month",$mdate));?></span>
							</div>

						</div>
					</div>
					<div class="space-12"></div>
				</div>
				<div class="col-xs-12 col-sm-12" >
					<!-- #section:pages/profile.info -->
					<div class="profile-user-info profile-user-info-striped">
						<div class="profile-info-row">
							<div class="profile-info-value">
								<span class="editable" id="username"><Center><h2>
								<button class="btn" ><a href="./index.php?sessiontab=1&sub=1&cmc=<?=$cmc?>" target="_blank"><?=$wording_lan["userinformation"]?></a></button>
								
								<button class="btn" >
								<a href="../invoice/aprint_sale_member.php?cmc=<?=$cmc?>&bid=<?=$id?>" target="_blank"><?=$wording_lan["Printreceipt"]?></a></button></h2></Center></span>
							</div>
						</div>
					</div>
				</div>
		</div>
		<!-- PAGE CONTENT ENDS -->
	</div><!-- /.col -->
</div><!-- /.row -->


		</div><!-- /.page-content -->
	</div>
</div><!-- /.main-content -->