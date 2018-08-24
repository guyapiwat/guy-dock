<?
switch($_GET['sub']){
	case 1:
		?>
		<legend>
			<strong><font color="#666666"><?=$wording_lan["tab4"]["2"]?>&nbsp;&nbsp;</font></strong>
										   
		</legend>
		<?
		include("sale_detail.php");
		break;
	case 3:
		?>
		<legend>
			<strong><font color="#666666"><?=$wording_lan["tab4"]["8"]?>&nbsp;&nbsp;</font></strong> 
		</legend>
		<?
		include("hold_editadd_new.php");
		break;
	case 5:

		?>
		<legend>
			<strong><font color="#666666"><?=$wording_lan["tab4"]["10"]?> &nbsp;&nbsp;</font></strong>
		</legend>
		<?
		include("sale_holdto.php");
		break;
	case 6:
		?>
		<legend>
			<strong><font color="#666666"><?=$wording_lan["tab4"]["9"]?>&nbsp;&nbsp;</font></strong>
		</legend>
		<?
		include("sale_holdfrom.php");
		break;
	case 7:
		?>
		<legend>
			<strong><font color="#666666"><?=$wording_lan["tab4"]["3"]?>&nbsp;&nbsp;</font></strong>
		</legend>
		<?
		include("sale_to.php");
		break;
	case 21:
		?>
		<legend>
			<strong><font color="#666666"><?=$wording_lan["tab4"]["1"]?>&nbsp;&nbsp;</font></strong>
		</legend>
		<?
		include("billb.php");
		break;	
	case 38:
		?>
		<legend> <strong><font color="#666666"><?=$wording_lan["sales_summary"];?></font></strong> </legend>
		<?
		include("sale_all.php");
		break;
	default :
		header("Location: index.php");
	break;
}
?>