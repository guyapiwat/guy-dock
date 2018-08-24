<?
switch($_GET['sub']){
	case 1:
		?><legend><strong><font color="#666666"><?=$wording_lan["tab5_7"]?>&nbsp;&nbsp;</font></strong></legend><?
		include("./comsn/com_a/rep_ac_comsn.php");
		break;
	case 3:
		?><legend><strong><font color="#666666"><?=$wording_lan["dmbonus1"]?>&nbsp;&nbsp;</font></strong></legend><?
		include("./comsn/com_a/rep_dc_comsn.php");
		break;
	case 333:
		?><legend><strong><font color="#666666">��������´ Unilevel&nbsp;&nbsp;</font></strong></legend><?
		include("./comsn/com_b/rep_mc_comsn.php");
		break;
	case 5:
		?>
		<legend><strong><font color="#666666"><?=$wording_lan["ambonus"]?>&nbsp;&nbsp;</font></strong></legend><?
		include("./comsn/com_a/rep_ambonus_comsn.php");
		break;
	case 6:
		?>
		<legend><strong><font color="#666666"><?=$wording_lan["bmbonus"]?>&nbsp;&nbsp;</font></strong></legend><?
		include("./comsn/com_a/rep_bmbonus_comsn.php");
		break;
	case 7:
		?>
		<legend><strong><font color="#666666"><?=$wording_lan["dmbonus"]?>&nbsp;&nbsp;</font></strong></legend><?
		include("./comsn/com_a/rep_dmbonus_comsn.php");
		break;
	case 10:
		?>
		<legend>
		   <strong><font color="#666666"><?=$wording_lan["fmbonus"];?></font></strong></legend>
		<?
		include("./comsn/com_a/rep_fmbonus_comsn.php");
		break;
	case 13:
		?>
		<legend><strong><font color="#666666"><?=$wording_lan["embonus"]?>&nbsp;&nbsp;</font></strong></legend><?
		include("./comsn/com_b/rep_embonus_comsn.php");
		break;
	case 66:
		?>
		<legend><strong><font color="#666666">��������´��ṹ W/S&nbsp;&nbsp;</font></strong></legend><?
		include("./comsn/com_a/rep_bm_comsn.php");
		break;
	case 103:
		?>
		<legend><strong><font color="#666666"><?=$wording_lan["tab5_3"]?> &nbsp;&nbsp;</font></strong></legend><?
		include("./comsn/report/rep_all_fast_team_comsn1.php");
		break;
	case 122:
		?>
		<legend>
		   <strong><font color="#666666"><?=$wording_lan["fmbonus"];?></font></strong></legend>
		<?
		include("./comsn/com_a/rep_fc_comsn.php");
		break;
	case 3003:
		?>
		<legend>
		   <strong><font color="#666666">All Sale</font></strong></legend>
		<?
		include("./comsn/com_b/rep_em_comsn.php");
		break;
	case 3004:
		?>
		<legend>
		   <strong><font color="#666666">����� Unilevel</font></strong></legend>
		<?
		include("./comsn/com_b/rep_mmbonus_comsn.php");
		break;
	case 112:
		?>
		<legend><strong><font color="#66x6666"><?=$wording_lan["com51"];?> &nbsp;&nbsp;</font></strong></legend><?
		include("./comsn/report/cap_adjust.php");
		break;
	case 1033:
		?>
		<legend><strong><font color="#666666"><?=$wording_lan["tab5"]['2_29'] ?> &nbsp;&nbsp;</font></strong></legend><?
		include("./comsn/report/rep_all_fast_team_comsn2.php");
		break;
	case 666:
		?>
		<legend><strong><font color="#666666">��¡����觫��� &nbsp;&nbsp;</font></strong></legend><?
		include("./comsn/report/sale1.php");
		break;
	case 116:
		?>
		<legend><strong><font color="#666666"><?=$wording_lan['tab4']['1_82']?>&nbsp;&nbsp;</font></strong></legend><?
		include("./comsn/com_a/rep_bc_comsn3.php");
		break;
	default :
		header("Location: index.php?sessiontab=$sesstab");
	break;
}
	
?>