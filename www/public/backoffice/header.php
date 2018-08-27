<?
 if (! isset($prefix)) {$prefix="";}
if(@$_GET["sessiontab"]==""){
	$_SESSION["tab"] = $_SESSION["tab"];
}else{
	$_SESSION["tab"] = $_GET["sessiontab"];
}

if(isset($_GET["sessiontab"]) && $_GET["sessiontab"]!=0 && $_SESSION["adminobj".$_SESSION["tab"]]==0){
		echo "<script language='javascript' type='text/javascript'>window.location='index.php'</script>";
		exit;

}
if($_SESSION["adminusercode"]<>"") {
$bgtab88 = "images/menu_bar_01.gif";
}

if(($_SESSION["adminusercode"]<>"") and  ($_SESSION["adminobj1"]!=0)){$bgtab1 = "images/menu_bar_01.gif";}
if(($_SESSION["adminusercode"]<>"") and  ($_SESSION["adminobj2"]!=0)){$bgtab2 = "images/menu_bar_01.gif";}
if(($_SESSION["adminusercode"]<>"") and  ($_SESSION["adminobj3"]!=0)){$bgtab3 = "images/menu_bar_01.gif";}
if(($_SESSION["adminusercode"]<>"") and  ($_SESSION["adminobj4"]!=0)){$bgtab4 = "images/menu_bar_01.gif";}
if(($_SESSION["adminusercode"]<>"") and  ($_SESSION["adminobj5"]!=0)){$bgtab5 = "images/menu_bar_01.gif";}
if(($_SESSION["adminusercode"]<>"") and  ($_SESSION["adminobj6"]!=0)){$bgtab6 = "images/menu_bar_01.gif";}
if(($_SESSION["adminusercode"]<>"") and  ($_SESSION["adminobj7"]!=0)){$bgtab7 = "images/menu_bar_01.gif";}
if(($_SESSION["adminusercode"]<>"") and  ($_SESSION["adminobj8"]!=0)){$bgtab8 = "images/menu_bar_01.gif";}
if(($_SESSION["adminusercode"]<>"") and  ($_SESSION["adminobj9"]!=0)){$bgtab9 = "images/menu_bar_01.gif";}
if(($_SESSION["adminusercode"]<>"") and  ($_SESSION["adminobj10"]!=0)){$bgtab10 = "images/menu_bar_01.gif";}



if(($_SESSION["tab"]  == "1") and ($_SESSION["adminusercode"]<>"")){
$bgtab1 = "images/menu_bar_01_back.gif";
}
if(($_SESSION["tab"]  == "2") and ($_SESSION["adminusercode"]<>"")){
$bgtab2 = "images/menu_bar_01_back.gif";
}
if(($_SESSION["tab"]  == "3") and ($_SESSION["adminusercode"]<>"")){
$bgtab3 = "images/menu_bar_01_back.gif";
}
if(($_SESSION["tab"]  == "4") and ($_SESSION["adminusercode"]<>"")){
$bgtab4 = "images/menu_bar_01_back.gif";
}
if(($_SESSION["tab"]  == "5") and ($_SESSION["adminusercode"]<>"")){
$bgtab5 = "images/menu_bar_01_back.gif";
}
if(($_SESSION["tab"]  == "6") and ($_SESSION["adminusercode"]<>"")){
$bgtab6 = "images/menu_bar_01_back.gif";
}
if(($_SESSION["tab"]  == "7") and ($_SESSION["adminusercode"]<>"")){
$bgtab7 = "images/menu_bar_01_back.gif";
}
if(($_SESSION["tab"]  == "8") and ($_SESSION["adminusercode"]<>"")){
$bgtab8 = "images/menu_bar_01_back.gif";
}
if(($_SESSION["tab"]  == "9") and ($_SESSION["adminusercode"]<>"")){
$bgtab9 = "images/menu_bar_01_back.gif";
}
if(($_SESSION["tab"]  == "10") and ($_SESSION["adminusercode"]<>"")){
$bgtab10 = "images/menu_bar_01_back.gif";
}
 

//writelogfile($text);	
//if(isset($_SERVER['QUERY_STRING']))
//$request_string = $_SERVER['QUERY_STRING'];
//if($_GET["lan"])
//$request_string = substr($request_string,7);
global $wording_lan;
?>
<!--body  bgproperties="fixed" leftMargin="0" topMargin="0" marginheight="0" marginwidth="0"-->
<!--bgcolor="#FD88A0"-->
<table bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" width="100%" border="0">
 <tr>
    <td width="11%"><a href="index.php"><img src="images/logo.jpg" height="100" border="0" align="left"></a></td>
    <td align="center" > <center><a href="http://203.146.170.60/~bomc/index.php?action=login" target="_blank"><img src="http://www.omc.co.th/mlm/images/s_banner_2.png" border = 0 width=200px></a></center>
</td>
    <td align="right" valign="bottom"><font size="6">Backoffice</font><? if(!empty($_SESSION["adminusercode"])){?><br>&nbsp;<? echo  "<strong>".$wording_lan["header"]["user"]."&nbsp;:&nbsp;</strong>".$_SESSION["adminusercode"]."&nbsp;&nbsp;<strong>".$wording_lan["header"]["name"]."&nbsp;:&nbsp;</strong>".$_SESSION["adminusername"]."<br /><br />"; }?>
<!--	<span id="lbltime" style="color:Red;"></span> -->
     </td>
	<td align="right" >&nbsp;&nbsp;</td>
  </tr>
</table>
<table   width="100%" height="20" cellspacing="0" cellpadding="0" border="0" background="images/bar_box.gif" >
<tr>
<td align="right" >
<table width="100%" height="30" cellspacing="0" cellpadding="0" border="0">
<tr>

	<? if(($_SESSION["adminusercode"]=="")){ ?>
		<td width="23">&nbsp;</td><td width="232"><b>BACK OFFICE</b></td>
	<? } ?>

	<? if(($_SESSION["adminusercode"]<>"") and  ($_SESSION["adminobj1"]!=0)){ ?>
		<td width="125" align="center"  background="<? echo $bgtab1;?>" > 
     	<? echo "<a href='index.php?sessiontab=1'><div align='center'><font color='#000000'><b>".$wording_lan["header"]["member"]."</b></font></div></a>";?> 
		</td>
	<? }
	    if(($_SESSION["adminusercode"]<>"") and  ($_SESSION["adminobj2"]!=0)){ ?>
		<td width="125" align="center"  background="<? echo $bgtab2;?>" > 
     	<? echo "<a href='index.php?sessiontab=2'><div align='center'><font color='#000000'><b>vip</b></font></div></a>";?> 
		</td>
	<? }
	if(($_SESSION["adminusercode"]<>"") and  ($_SESSION["adminobj3"]!=0)){?>
      	<td width="125" align="center"    background="<? echo $bgtab3;?>"> 
      	<? echo "<a href='index.php?sessiontab=3'><div ><font color='#000000'><b>".$wording_lan["header"]["sale"]."</b></font></div></a>";?>
    	</td>
	
	<? }
		if(($_SESSION["adminusercode"]<>"") and  ($_SESSION["adminobj6"]!=0)){ ?>
		<td width="125"   align="center"  background="<? echo $bgtab6;?>"> 
      	<? echo "<a href='index.php?sessiontab=6'><div><font color='#000000'><b>Stock</b></font></div></a>";?>
    	</td>
	<? }
		if(($_SESSION["adminusercode"]<>"") and  ($_SESSION["adminobj4"]!=0)){ ?>
		<td width="125"  align="center"  background="<? echo $bgtab4;?>"> 
      	<? echo "<a href='index.php?sessiontab=4'><div><font color='#000000'><b><b>".$wording_lan["header"]["commission"]."</b></font></div></a>";?>
    	</td>
	<? }
		if(($_SESSION["adminusercode"]<>"") and  ($_SESSION["adminobj5"]!=0)){ ?>
		<td width="125"  align="center"  background="<? echo $bgtab5;?>"> 
      	<? echo "<a href='index.php?sessiontab=5'><div><font color='#000000'><b>".$wording_lan["header"]["system"]."</b></font></div></a>";?>
    	</td>
	<? }
		if(($_SESSION["adminusercode"]<>"") and  ($_SESSION["adminobj7"]!=0)){ ?>
		<td width="125" style="display:none"  align="center"  background="<? echo $bgtab7;?>"> 
      	<? echo "<a href='index.php?sessiontab=7'><div><font color='#000000'><b>บัญชี</b></font></div></a>";?>
    	</td>
	<? }
		if(($_SESSION["adminusercode"]<>"") and  ($_SESSION["adminobj8"]!=0)){ ?>
		<td width="125" style="display:none"  align="center"  background="<? echo $bgtab8;?>"> 
      	<? echo "<a href='index.php?sessiontab=8'><div><font color='#000000'><b>แผนกการตลาด</b></font></div></a>";?>
    	</td>
	<? }
		if(($_SESSION["adminusercode"]<>"") and  ($_SESSION["adminobj9"]!=0)){ ?>
		<td width="125" style="display:none"  align="center"  background="<? echo $bgtab9;?>"> 
      	<? echo "<a href='index.php?sessiontab=9'><div><font color='#000000'><b>Supervisor</b></font></div></a>";?>
    	</td>
	<? }
		if(($_SESSION["adminusercode"]<>"") and  ($_SESSION["adminobj10"]!=0)){ ?>
		<td width="125" style="display:none"  align="center"  background="<? echo $bgtab10;?>"> 
      	<? echo "<a href='index.php?sessiontab=10'><div><font color='#000000'><b>การเงิน</b></font></div></a>";?>
    	</td>
	<? } ?>

        <td width="125" align="center" nowrap background="<? echo $bgtab88;?>">
	&nbsp; 
        <? if($_SESSION["adminusercode"]<>""){echo "<a href='".$prefix."logout.php?sessiontab=8'><font color='#000000'><b>".$wording_lan["header"]["logout"]."</b></font></a>&nbsp;";}?>
      </td>
	  <td>&nbsp;</td>


<td width="500" align="right" >&nbsp;</td>

 <td width="350"  nowrap align="center" ><? if(!empty($_SESSION["adminusername"])){ ?><b><span class="LinkD"><a href="index.php?sessiontab=0">แก้ไขรหัสผ่าน</a>&nbsp;&nbsp;&nbsp;<a href="logout.php?sessiontab=8">Logout</a></b><? }?></span></td></tr>
</table>

<table width="100%" height="5" cellspacing="0" cellpadding="0" border="0">
<tr><td height="5" colspan="3" bgcolor="#0099CC"></td></tr>
<tr><td height="5" colspan="3"  background="images/bar_box_shadow.gif"></td></tr>
</table>

</td>
 </tr>
</table>
             
