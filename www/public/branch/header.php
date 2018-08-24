<?
if (! isset($prefix)) {$prefix="";}
if($_GET["sessiontab"]==""){
	$_SESSION["tab"] = $_SESSION["tab"];
}else{
	$_SESSION["tab"] = $_GET["sessiontab"];
}
if(isset($_GET["sessiontab"]) && $_GET["sessiontab"]!=0 && $_SESSION["inventobj".$_SESSION["tab"]]==0){
	//echo "<script language='javascript' type='text/javascript'>window.location='index.php'</script>";
	//exit;
}
if($_SESSION["inv_usercode"]<>"") {
$bgtab8 = "images/menu_bar_01.gif";
}
if(($_SESSION["inv_usercode"]<>"") and  ($_SESSION["inventobj1"]!=0)){$bgtab1 = "images/menu_bar_01.gif";}
if(($_SESSION["inv_usercode"]<>"") and  ($_SESSION["inventobj2"]!=0)){$bgtab2 = "images/menu_bar_01.gif";}
if(($_SESSION["inv_usercode"]<>"") and  ($_SESSION["inventobj3"]!=0)){$bgtab3 = "images/menu_bar_01.gif";}
if(($_SESSION["inv_usercode"]<>"") and  ($_SESSION["inventobj4"]!=0)){$bgtab4 = "images/menu_bar_01.gif";}
if(($_SESSION["inv_usercode"]<>"") and  ($_SESSION["inventobj5"]!=0)){$bgtab5 = "images/menu_bar_01.gif";}
if(($_SESSION["inv_usercode"]<>"") and  ($_SESSION["inventobj6"]!=0)){$bgtab6 = "images/menu_bar_01.gif";}
if(($_SESSION["inv_usercode"]<>"") and  ($_SESSION["inventobj7"]!=0)){$bgtab7 = "images/menu_bar_01.gif";}

if(($_SESSION["tab"]  == "1") and ($_SESSION["inv_usercode"]<>"")){
$bgtab1 = "images/menu_bar_01_back.gif";
}
if(($_SESSION["tab"]  == "2") and ($_SESSION["inv_usercode"]<>"")){
$bgtab2 = "images/menu_bar_01_back.gif";
}
if(($_SESSION["tab"]  == "3") and ($_SESSION["inv_usercode"]<>"")){
$bgtab3 = "images/menu_bar_01_back.gif";
}
if(($_SESSION["tab"]  == "4") and ($_SESSION["inv_usercode"]<>"")){
$bgtab4 = "images/menu_bar_01_back.gif";
}
if(($_SESSION["tab"]  == "5") and ($_SESSION["inv_usercode"]<>"")){
$bgtab5 = "images/menu_bar_01_back.gif";
}
if(($_SESSION["tab"]  == "6") and ($_SESSION["inv_usercode"]<>"")){
$bgtab6 = "images/menu_bar_01_back.gif";
}
if(($_SESSION["tab"]  == "7") and ($_SESSION["inv_usercode"]<>"")){
$bgtab7 = "images/menu_bar_01_back.gif";
}
//writelogfile($text);	
if(isset($_SERVER['QUERY_STRING']))
$request_string = $_SERVER['QUERY_STRING'];
if($_GET["lan"])
$request_string = substr($request_string,7);
global $wording_lan;

?>
<!--body  bgproperties="fixed" leftMargin="0" topMargin="0" marginheight="0" marginwidth="0"-->

<table bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" width="100%" border="0">
 <tr>
    <td width="11%"><a href="index.php"><img src="images/logo.jpg" height="100" border="0" align="left"></a></td>
    <td align="center" > <font size="6">Branch<?//='('.$_SESSION["limitcredit"].')'?></font></td>

    <td align="right" valign="bottom"><br><br><? if(!empty($_SESSION["inv_username"])){?><img src="images/user.gif" width="18" height="18" align="bottom" />&nbsp;<? echo  "<strong>".$wording_lan["word"]["usercode"]."&nbsp;:&nbsp;</strong>".$_SESSION["inv_usercode"]."&nbsp;&nbsp;<strong>".$wording_lan["word"]["username"]."&nbsp;:&nbsp;</strong>".$_SESSION["inv_username"]."";?>
	<? echo  "<br /><strong>".$wording_lan["inv_code"]."&nbsp;:&nbsp;</strong> ".$_SESSION["admininvent"]."&nbsp;&nbsp;<strong>".$wording_lan["inv_name"]."&nbsp;:&nbsp;</strong>".$_SESSION["admininventname"]."<br /><br />"; }?>
<!--		  <span id="lbltime" style="color:Red;"></span> -->
	</td>
	<td align="right" >&nbsp; &nbsp; </td>
  </tr>
</table>

<table   width="100%" height="20" cellspacing="0" cellpadding="0" border="0" background="./images/bar_box.gif">
<tr>
<td align="right" >
<table width="100%" height="30" cellspacing="0" cellpadding="0" border="0">
<tr>
	<? if(($_SESSION["inv_usercode"]=="")){ ?>
		<td width="23">&nbsp;</td><td width="232"><b>Branch</b></td>
	<? } ?>
	<? if(($_SESSION["inv_usercode"]<>"") and  ($_SESSION["inventobj1"]!=0)){ ?>
		<td width="125" align="center"  background="<? echo $bgtab1;?>" > 
   	<? echo "<a href='index.php?sessiontab=1'><div align='center'><font color='#000000'><b>".$wording_lan["header_1"]."</b></font></div></a>";?> 
		</td>
	<? } ?>

	<?  if(($_SESSION["inv_usercode"]<>"") and  ($_SESSION["inventobj3"]!=0)){?>
      	<td width="125" align="center"    background="<? echo $bgtab3;?>"> 
      	<? echo "<a href='index.php?sessiontab=3'><div ><font color='#000000'><b>".$wording_lan["Header1"]."</b></font></div></a>";?>
    	</td>

	<? }
		if(($_SESSION["inv_usercode"]<>"") and  ($_SESSION["inventobj4"]!=0)){ ?>
		<td width="125"  align="center"  background="<? echo $bgtab4;?>"> 
      	<? echo "<a href='index.php?sessiontab=4'><div><font color='#000000'><b><b>".$wording_lan["header_2"]."</b></font></div></a>";?>
    	</td>
	<? } 
		if(($_SESSION["inv_usercode"]<>"") and  ($_SESSION["inventobj5"]!=0)){ ?>
		<td width="125"  align="center"  background="<? echo $bgtab5;?>"> 
      	<? echo "<a href='index.php?sessiontab=5'><div><font color='#000000'><b><b>".$wording_lan["header_3"]."</b></font></div></a>";?>
    	</td>
	<? } if(($_SESSION["inv_usercode"]<>"") and  ($_SESSION["inventobj6"]!=0)){ ?>
		<td width="125"  align="center"  background="<? echo $bgtab6;?>"> 
      	<? echo "<a href='index.php?sessiontab=6'><div><font color='#000000'><b><b>".$wording_lan["header_4"]."</b></font></div></a>";?>
    	</td>
	<? } if(($_SESSION["inv_usercode"]<>"") and  ($_SESSION["inventobj7"]!=0)){ ?>
		<td width="125" style="display:none"  align="center"  background="<? echo $bgtab7;?>"> 
      	<? echo "<a href='index.php?sessiontab=7'><div><font color='#000000'><b><b>".$wording_lan["header_7"]."</b></font></div></a>";?>
    	</td>
	<? } ?>


        <td width="125" align="center" background="<? echo $bgtab8;?>">
	&nbsp; 
        <? if($_SESSION["inv_usercode"]<>""){echo "<a href='".$prefix."logout.php?sessiontab=8'><font color='#000000'><b>".$wording_lan["word"]["logout"]."</b></font></a>&nbsp;";}?>

		
      </td>

	<td align="left" >&nbsp;&nbsp;&nbsp;<font size="3"></font></td>
	  <td  align="right">&nbsp;</td>

<td width="50" align="right" >&nbsp;</td>

 <td width="650"  nowrap align="center" ><? if(!empty($_SESSION["admininvent"])){ ?><b><span class="LinkD"><a href="index.php?sessiontab=1&sub=910"><? if($_SESSION["inventobj1"]!=0)echo $wording_lan["register"];?></a></span>&nbsp;&nbsp;&nbsp;<span class="LinkD"><a href="index.php?sessiontab=3&sub=139&state=2"><? if($_SESSION["inventobj3"]!=0)echo $wording_lan["buyitem"];?></a>&nbsp;&nbsp;&nbsp;<a href="index.php?sessiontab=0"><?=$wording_lan["header_5"]?></a>&nbsp;&nbsp;&nbsp;<a href="logout.php?sessiontab=8"><?=$wording_lan["first_4"]?></a></b><? }?>
 <span class="LinkD">&nbsp;&nbsp;&nbsp;<a style="display:none" href="?lan=TH&<?=$request_string?>">TH</a><a style="display:none"  href="?lan=EN&<?=$request_string?>">EN</a><b></span></td>
 </tr>
</table>

<table width="100%" height="5" cellspacing="0" cellpadding="0" border="0">
<tr><td height="5" colspan="3" bgcolor="#0099CC"></td></tr>
<tr><td height="5" colspan="3" background="./images/bar_box_shadow.gif"></td></tr>
</table>

</td>
 </tr>
</table>
             
