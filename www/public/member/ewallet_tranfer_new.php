<?
$_SESSION["perbuy"] = 1;
if($_POST["ok"] == 'ok'){
	include("logtext.php");
	include("function.log.inc.php");
	mysql_query("update ali_member set atocom = '".$_POST["comauto"]."' where mcode = '".$_SESSION["usercode"]."' ");
	$subject = "Auto Witdraw : ".$_POST["comauto"];
	$objcode = $_POST["comauto"];
	logtext(true,$_SESSION['usercode'],$subject,$_SESSION['usercode']);
	echo "<script language='JavaScript'>window.location='index.php?sessiontab=3&sub=8'</script>";	
}
$cmc = $_SESSION["usercode"];
$data = get_detail_meber($cmc);

?>
<form method="post" action="" id="frm" name="frm"  onsubmit="return checkForm(this)" onKeyDown="document.getElementById('ok').disabled=true;" >
<div class="row">
	<div class="col-xs-offset-3 col-xs-6">
		<!-- PAGE CONTENT BEGINS -->
		<div class="clearfix">
		<div>
			<div id="user-profile-1" class="user-profile row">
				<div class="col-xs-12 col-sm-2 " >&nbsp;</div>
				<div class="col-xs-12 col-sm-7">
				<div class="profile-user-info profile-user-info-striped " style="padding: 0px 15px 0px 18px;">
					<div class="profile-info-row ">
						<center><h1><?=$wording_lan["withdraw"]?></h1></center>
						<select name='comauto' class="form-control col-xs-12">
						<option value="0" <?if($data['atocom']=="0")echo 'selected';?>><?=$wording_lan["tab3_7"]?></option>
						<option value="1" <?if($data['atocom']=="1")echo 'selected';?>><?=$wording_lan["tab3_8"]?></option>
						</select>
					</div>
					<br><center>
&nbsp; &nbsp; &nbsp;
<button class="btn btn-info" name="ok"  id="ok" value='ok'  type="submit">
	<i class="ace-icon fa fa-check bigger-110"></i>
	<?=$wording_lan["tab4"]["5_18"]?>
</button>
&nbsp; &nbsp; &nbsp;
<button style="display:none" class="btn" type="reset">
	<i class="ace-icon fa fa-undo bigger-110"></i>
	<?=$wording_lan["tab4"]["5_19"]?>
</button>
</center><br>
					</div>
					 <div class="space-6"></div>
					 <div id="checkstate" class="text-center"></div>
					 <div class="space-6"></div>
				 </div>
				 <div class="col-xs-12 col-sm-2 " ></div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-xs-12">
  
</div>
</div>
</form>
<div style="clear:both"></div>
