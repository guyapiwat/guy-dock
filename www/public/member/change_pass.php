<?php
require './connectmysql.php';
$mcode=$_SESSION["usercode"];
//echo $_SESSION["userpass"];
?>
	<script type="text/javascript" language="javascript">
		var desc = new Array('Old Passord','New Password','Confirm New Password');
		var box = new Array("old","new","cnew");
		function check(){
		//var chpass = document.getElementById("cpass");
			for(i=0;i<3;i++)
				if(document.getElementById(box[i]).value==""){
					alert(	"Leave in "+desc[i]);
					document.getElementById(box[i]).focus();
					return;
				}

			if(document.getElementById(box[1]).value == document.getElementById(box[0]).value){
				alert(	desc[1]+" Not Equal to "+desc[0]);
				document.getElementById(box[1]).focus();
				return;
			}

			if(document.getElementById(box[2]).value != document.getElementById(box[1]).value){
				alert(	desc[2]+" Equal to "+desc[1]);
				document.getElementById(box[2]).focus();
				return;
			}
			conf = confirm("Confirm Password");
			if(conf){
				document.chpass.submit();
			}else{
				return;
			}	
		}
	</script>
<table width="100%" border="0">
  <tr>
    <td valign="top">

<?
	if($_GET['ed']==1){
		?><br /><?
		$name_t="";
		$sv_code="";
		$result=mysql_query("select * from ".$dbprefix."member where mcode='".$_SESSION["usercode"]."' LIMIT 1" );
		if(mysql_num_rows($result)>0){
			$pass = mysql_result($result,0,sv_code);
			$opass = $_POST['old'];
			$npass = $_POST['new'];
			$cpass = $_POST['cnew'];
			if($opass != $pass){ ?>
				<table align="center" width="200" border="0" bgcolor="#CC0000">
				  <tr>
					<td align="center"><?=$wording_lan["sub12_4"]?> <br /><a href="<?=$PHP_SELF ?>?sessiontab=1&sub=2"><?=$wording_lan["sub12_5"]?></a></td>
				  </tr>
				</table>

			<? }else{
					if(mysql_query("UPDATE ".$dbprefix."member SET sv_code='$npass' WHERE mcode='".$_SESSION["usercode"]."' ")){?>
						<table align="center" width="200" border="0" bgcolor="#00CC00">
						  <tr>
							<td align="center"><?=$wording_lan["sub12_6"]?><br /><?=$wording_lan["sub12_7"]?><br />
							  <a href="index.php"><?=$wording_lan["sub12_8"]?></a></td>
						  </tr>
						</table>
					<? }else{ ?>
					
						<table align="center" width="200" border="0" bgcolor="#CC0000">
						  <tr>
							<td align="center"><?=$wording_lan["sub12_9"]?> <br /><a href="<?=$PHP_SELF ?>?sessiontab=1&sub=2"><?=$wording_lan["sub12_10"]?></a></td>
						  </tr>
						</table>
					<? }
			}
		}
	}else{
?>
<br />
<form name="chpass" id="chpass" action="<?=$PHP_SELF ?>?sessiontab=1&sub=2&ed=1" method="post">

<div class="row">
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->
		<div class="clearfix">
		<div>
			<div id="user-profile-1" class="user-profile row ">
				<div class="col-xs-12 col-sm-2 " >&nbsp;</div>
				<div class="col-xs-12 col-sm-8 " >
					<div class="profile-user-info profile-user-info-striped">
						<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan["mcode"];?> </div>

							<div class="profile-info-value">
								<span class="editable" id="username"><?=$_SESSION["usercode"]?></span>
							</div>
						</div>
					</div>
					<div class="profile-user-info profile-user-info-striped">
						<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan["name"];?> </div>

							<div class="profile-info-value">
								<span class="editable" id="username"><?=$_SESSION["name_t"]?></span>
							</div>
						</div>
					</div>
					<div class="profile-user-info profile-user-info-striped">
						<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan["sub12_1"];?> </div>

							<div class="profile-info-value">
								<div class="input-group col-sm-9">
									<input class="form-control" type="password" name="old" id="old" value=""  />
								</div>
							</div>
						</div>
					</div>
					<div class="profile-user-info profile-user-info-striped">
						<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan["sub12_2"];?> </div>

							<div class="profile-info-value">
								<div class="input-group col-sm-9">
									<input class="form-control" type="password" name="new" id="new" value=""  />
								</div>
							</div>
						</div>
					</div>
					<div class="profile-user-info profile-user-info-striped">
						<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan["sub12_3"];?> </div>

							<div class="profile-info-value">
								<div class="input-group col-sm-9">
									<input class="form-control" type="password" name="cnew" id="cnew" value=""  />
								</div>
							</div>
						</div>
					</div>
					<div class="profile-user-info profile-user-info-striped">
						<div class="profile-info-row">
							<div class="profile-info-name"></div>

							<div class="profile-info-value">
								<span class="editable" id="username"><input type="button" value="<?=$wording_lan["submit"]?>" onclick="check()" /></span>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-2 " >&nbsp;</div>
			</div>
		</div>
		<!-- PAGE CONTENT ENDS -->
	</div><!-- /.col -->
</div><!-- /.row -->


		</div><!-- /.page-content -->
	</div>
</div><!-- /.main-content -->
</form>
	<? }?>
