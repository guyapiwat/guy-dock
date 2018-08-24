<?
	switch($_GET['sub']){
		case 1:
			?>
			<legend>
				<strong><font color="#666666"><?=$wording_lan["up_history_ewallet"]?>&nbsp;&nbsp;</font></strong>
											   
			</legend>
			<?
			include("ewallet.php");
			break;
		case 2:
			?>
			<legend>
				<strong><font color="#666666"><?=$wording_lan["tab4_11"]?>&nbsp;&nbsp;</font></strong> 
			</legend>
			<?
			include("ewallet1.php");
			break;
		case 8:
		?>
		<legend>
			<strong><font color="#666666">&nbsp;&nbsp;</font></strong>
		</legend>
		<?
		include("ewallet_tranfer_new.php");
		break;
		case 88:
		?>
		<legend>
			<strong><font color="#666666"><?=$wording_lan["tab4_22"]?></font></strong>
		</legend>
		<?
		include("eautoship_editadd.php");
		break;
		case 4:
		?>
		<legend>
			<strong><font color="#666666"><?=$wording_lan["tab4_18"]?> &nbsp;&nbsp;</font></strong>
		</legend>
		<?
		//include("ecom_tranfer.php");
		include("ewallet_ecom.php");
		break;
		case 112:
			?>
			<legend>
				<strong><font color="#666666">Transfer Ecommision</font></strong>
			</legend>
			<?
			include("ecom_tranfer_operate.php");
		break;
		case 5:
		?>
		<legend>
			<strong><font color="#666666"><?=$wording_lan["tab4_14"]?> &nbsp;&nbsp;</font></strong>
		</legend>
		<?
		include("ecom_report.php");
		break;
		case 222:
			?>
			<legend>
				<strong><font color="#666666"><?=$wording_lan["tab4_113"]?>&nbsp;&nbsp;</font></strong> 
			</legend>
			<?
			include("eatoship.php");
			break;
		case 225:
			?>
			<legend>
				<strong><font color="#666666"><?=$wording_lan["up_history_eautoship"]?>&nbsp;&nbsp;</font></strong> 
			</legend>
			<?
			include("eatoship_report.php");
			break;
		case 23:
			?>
			<legend>
				<strong><font color="#666666"><?=$wording_lan["exchange"]?>&nbsp;&nbsp;</font></strong> 
			</legend>
			<?
			include("voucher.php");
			break;
		case 223:
			?>
			<legend>
				<strong><font color="#666666"><?=$wording_lan["tab4_112"]?>&nbsp;&nbsp;</font></strong> 
			</legend>
			<?
			include("voucher.php");
			break;
		case 224:
			?>
			<legend>
				<strong><font color="#666666"><?=$wording_lan["tab4_14"]?>&nbsp;&nbsp;</font></strong> 
			</legend>
			<?
			include("voucher.php");
			break;
       case 3:
			?>
			<legend>
				<strong><font color="#666666">Transfer wallet</font></strong>
			</legend>
			<?
			//include("ewallet_tranfer.php");
		break;

		default :
			header("Location: index.php");
		break;
	}
?>