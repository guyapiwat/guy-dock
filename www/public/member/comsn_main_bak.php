<? include("connectmysql.php");?>
<? include("prefix.php");?>
<?
if (isset($_SESSION["usercode"])){$smc=$_SESSION["usercode"];}else{$smc="";}
if (isset($_GET["cmc"])){$cmc=$_GET["cmc"];}else{$cmc="";}
if (isset($_POST["pmc"])){$cmc=$_POST["pmc"];}
if ($cmc=="") {$cmc=$smc;}
if ($cmc=="") {
	$cmc=$_SESSION["usercode"];
}
?>
<?
	if(!isset($_GET['sub'])){
?>

<table align="center" height="100%"><tr valign="top"><td>
<fieldset>
    <table align="center"  border="0"><tr align="center" valign="top">
<tr>
<tr align="center">
<td align="center" style="display:none">
<fieldset>
    <legend><b>��§ҹ��������´��ṹ⺹������ѹ (A)</b></legend>
    <table align="center" width="50%" border="0">
	<tr align="center" valign="top"  width="50%">
        <td align="center" width="20%">
        <a href="index.php?sessiontab=5&sub=1"><img src="images/repall.gif" width="120" height="120" border="0" alt="��ṹ����й�">
        </a><br>��ṹ����й�
        </td>
        <td align="center" width="15%">
        <a href="index.php?sessiontab=5&sub=2"><img src="images/repall.gif" width="120" height="120" border="0" alt="��ṹ�����÷�����">
        </a><br>��ṹ�����÷�����
        </td>
        <td align="center" width="15%"><a href="index.php?sessiontab=5&sub=3"><img src="images/repall.gif" width="120" height="120" border="0" alt="��ṹ������"></a><br>��ṹ������
        </td>
	</tr>
	</table>
</fieldset>
<td style="display:none">
<fieldset>
	<legend><b>��§ҹ��������´��ṹ⺹�������͹ (B)</b></legend>
	<table align="center" width="50%" border="0"><tr align="center" valign="top">
		<td >
		<a href="index.php?sessiontab=5&sub=8"><img src="images/repall.gif" width="120" height="120" border="0" alt="�����������͹">
		</a><br>�����������͹
		</td>
		<td>
		<a href="./index.php?sessiontab=5&sub=9"><img src="images/coinD.gif" width="120" height="120" border=0 alt="��ṹ Pool ">
		</a><br>��ṹ Pool 
		</td>
		<!--td>
		<a href="./index.php?sessiontab=5&sub=10"><img src="images/coinD.gif" width="120" height="120" border=0 alt="⺹�� Pool ">
		</a><br>⺹�� Pool 
		</td-->
	</tr>
</table>
</fieldset>
			</td>
</tr>
<tr>

			<td>
			<fieldset>
			  <legend><b>��ػ��������Ԫ�������ѹ (A)</b></legend>
				<table align="center" width="300" border="0"><tr align="center" valign="top">
				  <td><a href="index.php?sessiontab=5&sub=103"><img src="images/repall.gif" width="100" height="100" border="0" alt="��§ҹ������ṹ"> </a><br>
			      ��ػ��������Ԫ�������ͺ</td>
					<td>
					<a href="index.php?sessiontab=5&sub=100"><img src="images/repall.gif" width="100" height="100" border="0" alt="��§ҹ������ṹ">					</a><br>��ػ��������Ԫ�������ѹ					</td>
				    <td style="display:none"><a href="./index.php?sessiontab=5&sub=111" ><img src="images/repall.gif" width="100" height="100" border="0" alt="��§ҹ������ṹ"><br></a>Travel Point</td>
				</tr>
			</table>
			</fieldset>
			</td>
			<td>
			<fieldset>
				<legend><b>��ػ��������Ԫ��������͹ (B)</b></legend>
				<table align="center" width="300" border="0"><tr align="center" valign="top">
					<td>
					<a href="index.php?sessiontab=5&sub=101"><img src="images/repall.gif" width="100" height="100" border="0" alt="��ػ��������Ԫ�������ѹ">
					</a><br>��ػ��������Ԫ��������͹
					</td>
				</tr>
			</table>
			</fieldset>
			</td>


</tr>
<tr>
<td>
<fieldset>
    <legend><b>��§ҹ��ػ�����⺹������ѹ (A)</b></legend>
    <table align="center" width="400" border="0"><tr align="center" valign="top">
        <td>
        <a href="index.php?sessiontab=5&sub=4"><img src="images/repall.gif" width="120" height="120" border="0" alt="ʶҹС�û�Ѻ���˹�">
        </a><br>��Ѻ���˹�
        </td><td ><a href="index.php?sessiontab=5&sub=13"><img src="images/repall.gif" width="120" height="120" border="0" alt="Travel Point"> </a><br>
			       Travel Point</td>
        <td>
        <a href="index.php?sessiontab=5&sub=5"><img src="images/coinA.gif" width="120" height="120" border="0" alt="⺹�ʼ���й�">
        </a><br>⺹�ʼ���й�
        </td>
		 <td>
        <a href="index.php?sessiontab=5&sub=6"><img src="images/coinA.gif" width="120" height="120" border="0" alt="⺹�ʺ����÷�����">
        </a><br>⺹�ʺ����÷�����
        </td>
		<td>
        <a href="index.php?sessiontab=5&sub=7"><img src="images/coinA.gif" width="120" height="120" border="0" alt="⺹��������">
        </a><br>⺹��������
        </td>

    </tr></table>
</fieldset>
</td>

<td>
			<fieldset>
			  <legend><b>��§ҹ��ػ����� ����Ԫ��������͹ (B)</b></legend>
				<table align="center" width="300" border="0"><tr align="center" valign="top">
				  <td >
					<a href="index.php?sessiontab=5&sub=102"><img src="images/repall.gif" width="120" height="120" border="0" alt="⺹�ʤ�Һ����������͹">
					</a><br>��§ҹ����ѡ���ʹ
					</td>
					<td >
					<a href="index.php?sessiontab=5&sub=11"><img src="images/repall.gif" width="120" height="120" border="0" alt="⺹�ʤ�Һ����������͹">
					</a><br>⺹�ʤ�Һ����������͹
					</td>
					<td>
					<a href="./index.php?sessiontab=5&sub=12"><img src="images/coinC.gif" width="120" height="120" border=0 alt="⺹�� Pool Bonus">
					</a><br>⺹�� Pool Bonus
					</td>
				</tr>
			</table>
			</fieldset>
			</td>


 
</tr>


<!--tr><td>
<fieldset>
    <legend><b>��§ҹ��ػ��è��� �Ż���ª��</b></legend>
    <table align="center" width="100%" border="0"><tr align="center" valign="top">
        <td>
        <a href="index.php?sessiontab=5&sub=100"><img src="images/repall.gif" width="100" height="100" border="0" alt="��§ҹ ��ػ��è���⺹�ʷ�����">
        </a><br>��§ҹ ��ػ��è���⺹�ʷ�����
        </td>
    </tr></table>
</fieldset>
</td>

</tr-->


</table>

<br />
<?
	}else{
?>
<table border="0" height="390"><tr valign="top">
<td width="50">
<a href="javascript:history.back()"><img border="0" src="./images/back.gif" height="40" width="40" alt="��Ѻ" /></a>
<!--a href="./index.php?sessiontab=<?=$sesstab?>&sub=1"><img border="0" src="./images/coinA.gif" height="40" width="40" alt="��������´��ṹ" /></a>
<a href="./index.php?sessiontab=<?=$sesstab?>&sub=2"><img border="0" src="./images/repall.gif" height="40" width="40" alt="��ػ��������й�" /></a-->


<? if($_GET['sub'] >= 1 && $_GET['sub'] <= 2) { ?>
<a href="./index.php?sessiontab=<?=$sesstab?>&sub=1"><img border="0" src="./images/coinA.gif" height="40" width="40" alt="��������´��ṹ" /></a>
<a href="./index.php?sessiontab=<?=$sesstab?>&sub=2"><img border="0" src="./images/repall.gif" height="40" width="40" alt="��ػ��������й�" /></a>

<? }else if($_GET['sub'] >=3 && $_GET['sub'] <= 4) { ?>
<a href="./index.php?sessiontab=<?=$sesstab?>&sub=3"><img border="0" src="./images/coinA.gif" height="40" width="40" alt="��§ҹ������ṹ" /></a>
<a href="./index.php?sessiontab=<?=$sesstab?>&sub=4"><img border="0" src="./images/repall.gif" height="40" width="40" alt="��ػ�����ҡ��ṹ�����͹" /></a>

<? }else if($_GET['sub'] >=5 && $_GET['sub'] <= 6) { ?>
<a href="./index.php?sessiontab=<?=$sesstab?>&sub=5"><img border="0" src="./images/coinA.gif" height="40" width="40" alt="��§ҹ������ṹ" /></a>
<a href="./index.php?sessiontab=<?=$sesstab?>&sub=6"><img border="0" src="./images/repall.gif" height="40" width="40" alt="��ػ�����������" /></a>
<? }else if($_GET['sub'] >=7 && $_GET['sub'] <= 8) { ?>
<a href="./index.php?sessiontab=<?=$sesstab?>&sub=7"><img border="0" src="./images/coinA.gif" height="40" width="40" alt="��§ҹ������ṹ" /></a>
<a href="./index.php?sessiontab=<?=$sesstab?>&sub=8"><img border="0" src="./images/repall.gif" height="40" width="40" alt="��ػ��û�Ѻ���˹�" /></a>
<? }else if($_GET['sub'] >=10 && $_GET['sub'] <= 13) { ?>
<!--<a href="./index.php?sessiontab=<?=$sesstab?>&sub=10"><img border="0" src="./images/coinA.gif" height="40" width="40" alt="��§ҹ������ṹ" /></a>
<a href="./index.php?sessiontab=<?=$sesstab?>&sub=11"><img border="0" src="./images/repall.gif" height="40" width="40" alt="��ػ��û�Ѻ���˹�" /></a>
<a href="./index.php?sessiontab=<?=$sesstab?>&sub=12"><img border="0" src="./images/repall.gif" height="40" width="40" alt="ʶҹС���ѡ���ʹ" /></a>
<a href="./index.php?sessiontab=<?=$sesstab?>&sub=13"><img border="0" src="./images/repall.gif" height="40" width="40" alt="ʶҹС���ѡ���ʹ" /></a>
-->
<? }else if($_GET['sub'] >=100 && $_GET['sub'] <= 100) { ?>
<a href="./index.php?sessiontab=<?=$sesstab?>&sub=100"><img border="0" src="./images/coinA.gif" height="40" width="40" alt="��ػ��������Ԫ�������ѹ" /></a>
<? }  ?>

</td>
<td align="left" width="100%">
<fieldset>
<?
		switch($_GET['sub']){
			case 1:
			?><legend><strong><font color="#666666">��ṹ����й�&nbsp;&nbsp;</font></strong></legend><?
				include("./comsn/com_a/rep_ac_comsn.php");
				break;
			case 2:
				?>
				<legend><strong><font color="#666666">��ṹ�����÷�����&nbsp;&nbsp;</font></strong></legend><?
				include("./comsn/com_a/rep_bc_comsn.php");
				break;
			break;
			case 222:
			?>
			<legend><strong><font color="#666666">��ṹ�����÷�����&nbsp;&nbsp;</font></strong></legend><?
			include("./comsn/com_a/rep_bc_comsn1.php");
			break;
			break;
			case 3:
			?><legend><strong><font color="#666666">��ṹ������&nbsp;&nbsp;</font></strong></legend><?
				include("./comsn/com_a/rep_dc_comsn.php");
				break;
			case 4:
				?>
				<legend><strong><font color="#666666">��Ѻ���˹�&nbsp;&nbsp;</font></strong></legend><?
				include("./comsn/com_a/rep_newpositon.php");
				break;

			case 5:
				?>
				<legend><strong><font color="#666666">⺹�ʼ���й�&nbsp;&nbsp;</font></strong></legend><?
				include("./comsn/com_a/rep_ambonus_comsn.php");
				break;
			case 6:
				?>
				<legend><strong><font color="#666666">⺹�ʺ����÷�����&nbsp;&nbsp;</font></strong></legend><?
				include("./comsn/com_a/rep_bmbonus_comsn.php");
				break;
			case 7:
				?>
				<legend><strong><font color="#666666">⺹��������&nbsp;&nbsp;</font></strong></legend><?
				include("./comsn/com_a/rep_dmbonus_comsn.php");
				break;
			case 8:
				?>
				<legend><strong><font color="#666666">�����������͹ &nbsp;&nbsp;</font></strong></legend><?
				include("./comsn/com_b/rep_bc_comsn.php");
				break;
			default :
				header("Location: index.php?sessiontab=$sesstab");
			case 9:
				?>
				<legend><strong><font color="#666666">��ṹ Pool &nbsp;&nbsp;</font></strong></legend><?
				include("./comsn/com_b/rep_pc_comsn.php");
				break;
			default :
				header("Location: index.php?sessiontab=$sesstab");
			break;
			case 10:
				?>
				<legend><strong><font color="#666666">⺹�� Pool &nbsp;&nbsp;</font></strong></legend><?
				include("./comsn/com_d/rep_pp_comsn.php");
				break;
			default :
				header("Location: index.php?sessiontab=$sesstab");
			case 11:
				?>
				<legend><strong><font color="#666666">⺹�ʤ�Һ����������͹ &nbsp;&nbsp;</font></strong></legend><?
				include("./comsn/com_b/rep_bmbonus_comsn.php");
				break;
			default :
				header("Location: index.php?sessiontab=$sesstab");
			break;
			case 12:
				?>
				<legend><strong><font color="#666666">⺹�� Pool Bonus &nbsp;&nbsp;</font></strong></legend><?
				include("./comsn/com_b/rep_pmbonus_comsn.php");
				break;
			default :
				header("Location: index.php?sessiontab=$sesstab");
			break;
			case 13:
				?>
				<legend><strong><font color="#666666">Travel Point &nbsp;&nbsp;</font></strong></legend><?
				//include("./comsn/com_b/rep_persobalbonus_comsn.php");
				include("./comsn/com_t/tround.php");
				break;
			default :
				header("Location: index.php?sessiontab=$sesstab");
			break;
			case 99:
				?>
				<legend><strong><font color="#666666">��§ҹ��ṹ�������ѹ&nbsp;&nbsp;</font></strong></legend><?
				include("./rep_comsn_cr.php");
				break;
			case 100:
				?>
				<legend><strong><font color="#666666">��ػ��������Ԫ�������ѹ &nbsp;&nbsp;</font></strong></legend><?
				include("./comsn/report/rep_all_fast_team_comsn.php");
				break;
			case 103:
				?>
				<legend><strong><font color="#666666">��ػ��������Ԫ�������ѹ &nbsp;&nbsp;</font></strong></legend><?
				include("./comsn/report/rep_all_fast_team_comsn1.php");
				break;
			case 101:
				?>
				<legend><strong><font color="#666666">��ػ��������Ԫ��������͹ &nbsp;&nbsp;</font></strong></legend><?
				include("./comsn/report/rep_all_uni_pool_comsn.php");
				break;
			case 102:
				?>
				<legend><strong><font color="#666666">��§ҹ����ѡ���ʹ &nbsp;&nbsp;</font></strong></legend><?
				include("./comsn/com_a/rep_status_comsn.php");
				break;
			case 111:
					?>
				<legend><strong><font color="#666666">������� &nbsp;&nbsp;</font></strong></legend><?
				include("./comsn/report/point.php");
				break;
			default :
				header("Location: index.php?sessiontab=$sesstab");
			break;
			
		}
?>
</fieldset>
</td>
</tr></table>
<?
	}
function showmenuc2(){

}
?>
