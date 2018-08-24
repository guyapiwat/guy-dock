<?
session_start();
?>
<script language="javascript">

function checkround(){
	if(document.getElementById("dateInput1").value==""){
 		swal("<?=$wording_lan["errorfound"];?>", "<?=$wording_lan["startdate1"]?>", "error");
		document.getElementById("dateInput1").focus();
		return false;
	}
	if(document.getElementById("dateInput2").value==""){
		swal("<?=$wording_lan["errorfound"];?>", "<?=$wording_lan["enddate"]?>", "error");
		document.getElementById("dateInput2").focus();
		return false;
	}
	if(document.getElementById("dateInput2").value < document.getElementById("dateInput1").value  ){
		swal("<?=$wording_lan["errorfound"];?>", "<?=$wording_lan["startdate2"]?>", "error");
		document.getElementById("dateInput1").focus();
		return false;
	}
	document.rform.submit();
}
 
</script>

<?

function rpdialog_m($sub){ 
session_start();
require("wording".$_SESSION["lan"].".php"); ?>

<form name="rform" method="post" action="./index.php?sessiontab=<?=$_GET['sessiontab']?>&sub=<?=$_GET['sub']?>">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
			<div class="input-daterange input-group">
				<span class="input-group-addon">
					<?=$wording_lan["Date"];?>
				</span>
				<input type="text" id="dateInput1" class="input-sm form-control" name="strfdate" value="<?=$_REQUEST['strfdate']?>" >
				<span class="input-group-addon">
					<?=$wording_lan["to"];?>
				</span>
				<input type="text" id="dateInput2" class="input-sm form-control" name="strtdate" value="<?=$_REQUEST['strtdate']?>" >
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-2 col-lg-4">
			<div class="space-6 visible-xs"></div>
			<button class="btn btn-xs btn-info col-xs-12 col-sm-12 col-md-12 col-lg-2" type="button" name="Submit" onclick="checkround()"><i class="ace-icon fa fa-check bigger-110"></i><?=$wording_lan["search"];?></button>
		</div>
	</div> 
</form>
<Br>
<?}?>
 
<? function rpdialog_new($sub,$fdate,$tdate){ 
session_start();
require("wording".$_SESSION["lan"].".php");?>

<form name="rform" method="post" action="./index.php?sessiontab=<?=$_GET['sessiontab']?>&sub=<?=$_GET['sub']?>">
	 <table width="50%" border="0" cellpadding="0" cellspacing="0" align="center">
	  <tr><td colspan="6" align="center">&nbsp;</td></tr> 
	  <tr>
	   <td align="center"><?=$wording_lan["Date"];?>
		<input type="text" id="dateInput1" onkeypress="return chknum(window.event.keyCode)" name="strfdate" size="10" maxlength="10" value="<?=$fdate?>" placeholder="2014-01-20"/>
		&nbsp;&nbsp;
		<?=$wording_lan["to"];?>
		&nbsp;&nbsp;
		<input type="text" id="dateInput2" onkeypress="return chknum(window.event.keyCode)" name="strtdate" size="10" maxlength="10" value="<?=$tdate?>" placeholder="2014-01-31"/>		 
		&nbsp;<button class="btn btn-info" type="button" name="Submit" onclick="checkround()"><i class="ace-icon fa fa-check bigger-110"></i><?=$wording_lan["search"];?></button></td>
	  </tr>
	 <tr><td colspan="6" align="center">&nbsp;</td></tr>
	</table>
</form>
<?}?>

<?function rpdialog_sale($sub,$fdate,$tdate,$sale){
 require("wording".$_SESSION["lan"].".php");?>

<form name="rform" method="post" action="./index.php?sessiontab=<?=$_GET['sessiontab']?>&sub=<?=$sub?>">
	 <table width="60%"  cellpadding="0" cellspacing="0"  align="center">
	  <tr><td colspan="5" align="center">&nbsp;</td></tr> 
	  <tr>	
	   <td align="center">วันที่
		<input type="text" id="dateInput1" onkeypress="return chknum(window.event.keyCode)" name="fdate" size="10" maxlength="10" value="<?=$fdate?>" placeholder="2014-01-20"/>
		&nbsp;&nbsp;
		ถึง
		&nbsp;&nbsp;
		<input type="text" id="dateInput2" onkeypress="return chknum(window.event.keyCode)" name="tdate" size="10" maxlength="10" value="<?=$tdate?>" placeholder="2014-01-31"/>		 
		</td>
		
 
	   <td align="center"> 
		<select name="sale" id="sale">
			<option value="" >บิลทั้งหมด </option>     
			<option value="0" <?if($_REQUEST['sale']=='0')echo "selected"; ?>>บิลที่ไม่ยกเลิก</option>
			<option value="1" <?if($_REQUEST['sale']=='1')echo "selected"; ?>>บิลที่ยกเลิก</option>
	   </select>	
	   <!-- <input type="submit" name="Submit" value="ตกลง"> -->
		&nbsp;<button class="btn btn-info" type="button" name="Submit" onclick="checkround()"><i class="ace-icon fa fa-check bigger-110"></i><?=$wording_lan["search"];?></button></td>
	  </tr>
	 <tr><td colspan="6" align="center">&nbsp;</td></tr>
	</table>
</form>
<?}?>

<?
$sale = $_POST['sale']==""?$_GET['sale']:$_POST['sale'];
$fdate = $_POST['fdate']==""?$_GET['fdate']:$_POST['fdate'];
$tdate = $_POST['tdate']==""?$_GET['tdate']:$_POST['tdate'];
$fmcode = $_POST['fmcode']==""?$_GET['fmcode']:$_POST['fmcode'];
?>