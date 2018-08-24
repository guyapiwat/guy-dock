<? session_start(); ?>
<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js'></script>
<!-- <script type="text/javascript" src="http://code.jquery.com/ui/1.8.18/jquery-ui.min.js"></script> -->
<!-- <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/themes/base/jquery-ui.css"> -->

 <style type='text/css'> 
    #tabs {width: 98%;height:100%;margin-left: 11px; border: 0;border-radius: 0;    }
    .tab-border {border: 1px solid #D3D3D3;margin-top: -2px;}
    .ui-widget-header {border: 0px solid #fff;background: none;color: #222222;font-weight: bold;}
    .ui-state-active, .ui-widget-content .ui-state-active, .ui-widget-header .ui-state-active {
border: 1px solid #aaaaaa/*{borderColorActive}*/;
background: #009900/*{bgColorActive}*/ url(images/ui-bg_glass_65_ffffff_1x400.png)/*{bgImgUrlActive}*/ 50%/*{bgActiveXPos}*/ 50%/*{bgActiveYPos}*/ repeat-x/*{bgActiveRepeat}*/;
font-weight: normal/*{fwDefault}*/;
color: #212121/*{fcActive}*/;
}
.ui-state-active a {color: #212121 !important;}
  </style>

  <? 
  require("../backoffice/date_picker.php");
    $fdate=$_REQUEST['strfdate'];
	$tdate=$_REQUEST['strtdate'];
	$_SESSION['fdate']=$fdate;
	$_SESSION['tdate']=$tdate;
  rpdialog_sale($_GET["sub"],$fdate,$tdate); 
  
  ?>
  <div id="tabs">
    <ul>
        <li><a id="tabs1" href="#tabs-1">E-Wallet </a></li>
       <!-- <li><a id="tabs2" href="#tabs-2">E-Autoship </a></li>    
        <li><a id="tabs3" href="#tabs-3">E-Voucher</a></li>  -->  
   </ul>
    <div class="tab-border">
	<input type="hidden" id="ttab" value="" />
    <div id="tabs-1">
        <iframe width="100%" height="1000" frameborder="0" src="./ewallet.php" ></iframe>
    </div>
    <!--<div id="tabs-2">
       <iframe width="100%" height="1000" frameborder="0" src="./ewallet_eatoship.php" ></iframe>
    </div>  
     <div id="tabs-3">
       <iframe width="100%" height="1000" frameborder="0" src="./ewallet_voucher.php" ></iframe>
    </div>  -->
    </div>
 
</div>
<?function rpdialog_sale($sub,$fdate,$tdate){ 

?>
<form name="rform" method="post" action="">
	 <table width="60%" border="1" cellpadding="0" cellspacing="0" bordercolor="#FF7F00" align="center">
	  <tr><td colspan="6" align="center">&nbsp;</td></tr> 
	  <tr>	
	   <td align="center">วันที่
		<input type="text" id="dateInput1" onkeypress="return chknum(window.event.keyCode)" name="fdate" size="10" maxlength="10" value="<?=$fdate?>" placeholder="2014-01-20"/>
		&nbsp;&nbsp;
		ถึง
		&nbsp;&nbsp;
		<input type="text" id="dateInput2" onkeypress="return chknum(window.event.keyCode)" name="tdate" size="10" maxlength="10" value="<?=$tdate?>" placeholder="2014-01-31"/>		 
 
	  
	   <input type="button" name="Submit" value="ตกลง" onClick="checkround()" />
		&nbsp;<!--input type="button" name="Submit" value="ดูรายงาน" onclick="checkround()" /--></td>
	  </tr>
	 <tr><td colspan="6" align="center">&nbsp;</td></tr>
	</table>
</form>
<?}?>
  <script>
  function checkround(){
	if(document.getElementById("dateInput1").value==""){
		alert("กรุณาเลือกวันที่เริ่มต้น");
		document.getElementById("dateInput1").focus();
		return false;
	}
	if(document.getElementById("dateInput2").value==""){
		alert("กรุณาเลือกวันที่สิ้นสุด");
		document.getElementById("dateInput2").focus();
		return false;
	}

	if(document.getElementById("dateInput1").value > document.getElementById("dateInput2").value){
		alert("วันเรื่มต้นมากกว่าวันสิ้นสุด");
		document.getElementById("dateInput1").focus();
		return false;
	}
	var fdate = document.getElementById('dateInput1').value;
	var tdate=document.getElementById('dateInput2').value;
	var tab =document.getElementById('ttab').value;
	if(tab==''){
		tab = "<?=$_GET['tab']?>";
	}
	document.rform.action="index.php?sessiontab=4&sub=23&strfdate="+fdate+"&strtdate="+tdate+"&tab="+tab;
	document.rform.submit();
} 
	
$( document ).ready(function() {
	tab = "<?=$_GET['tab']?>";
	if(tab=='1'){
		$('#tabs1')[0].click();
	}else if(tab=='2'){
		$('#tabs2')[0].click();
	}else if(tab=='3'){
		$('#tabs3')[0].click();
	}

	$("#tabs1").click(function(){
		$("#ttab").val("1");
		//$(location).attr('href', 'index.php?sessiontab=3&sub=1717&tab=2');
   });

	$("#tabs2").click(function(){
		$("#ttab").val("2");
		//$(location).attr('href', 'index.php?sessiontab=3&sub=1717&tab=2');
   });
   $("#tabs3").click(function(){
		$("#ttab").val("3");
		//$(location).attr('href', 'index.php?sessiontab=3&sub=1717&tab=2');
   });
});

</script>
<script type='text/javascript'>//<![CDATA[ 
$(window).load(function(){
$("#tabs").tabs();
});//]]>  

</script>