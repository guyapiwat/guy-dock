<?
switch($_GET['sub']){
	case 1:
	?>
		<legend>
		   <strong><font color="#666666"><?=$wording_lan["tab2_1"]?>&nbsp;&nbsp;</font></strong></legend>
		 <?
		include("mem_chart_f3c_sv.php");
		break;
	case 2:
		?>
		<legend>
		   <strong><font color="#666666"><?=$wording_lan["tab2_2"]?>&nbsp;&nbsp;</font></strong></legend>
		<?
		include("mem_chart_stairstep.php");
		break;
	case 3:
		?>
		<legend>
		   <strong><font color="#666666"><?=$wording_lan["report_tree"]?>&nbsp;&nbsp;</font></strong></legend>
		<?   
		include("team_list.php");
		break;
	
	case 4:
		?>
		<legend>
		   <strong><font color="#666666"><?=$wording_lan["rep_spcode"];?>&nbsp;&nbsp;</font></strong></legend>
		<?   
		include("team_list1.php");
		break;
	default :
		header("Location: index.php?sessiontab=$sesstab");
	break;
}
?>
