<?require "adminchecklogin.php";?>
<?include("prefix.php");?>
<link href="istyle.css" rel="stylesheet" type="text/css">
<?php
//include("./config/config.php");
include("header.php"); 

$htmlTitle="NetMan - position";		// ��� html
$title="������ ���˹�";								// �������ͧ
$mlink="mem_position_main.php";					// link �˹�� main
$elink="mem_position_editadd.php";				// link �˹�� editadd
$plink="showprint.php";					// link �˹�� print
$dbtable=$dbprefix."position";		// ���� table � database
$numoffield=3;									//�ӹǹ��Ŵ����ͧ����ʴ� ��Ŵ� 0 - ��Ŵ� $numoffield-1
//field name in database : �����ӹǹ���Ϳ�Ŵ�㹰ҹ������������ͧ���
$fields[0]="posid";							//��ͧ�� primary key �ͧ database ����
$fields[1]="posname";
$fields[2]="posdesc";
$fields[3]="";
$fields[4]="";
$fields[5]="";
$fields[6]="";
$fields[7]="";
$fields[8]="";
$fields[9]="";
$fields[10]="";
$fields[11]="";
$fields[12]="";
$fields[13]="";
//���Ϳ�Ŵ����ͧ����ʴ���˹�����  : �����ӹǹ���Ϳ�Ŵ����ͧ����ʴ���˹�����������ͧ���
$showname[0]="id";
$showname[1]="���͵��˹�";
$showname[2]="��������´";
$showname[3]="";
$showname[4]="";
$showname[5]="";
$showname[6]="";
$showname[7]="";
$showname[8]="";
$showname[9]="";
$showname[10]="";
$showname[11]="";
$showname[12]="";
$showname[13]="";
//�������ҧ�ͧ column
$colwidth[0]="5%";
$colwidth[1]="20%";
$colwidth[2]="20%";
$colwidth[3]="10%";
$colwidth[4]="10%";
$colwidth[5]="10%";
$colwidth[6]="10%";
$colwidth[7]="10%";
$colwidth[8]="10%";
$colwidth[9]="10%";
$colwidth[10]="10%";
$colwidth[11]="10%";
$colwidth[12]="10%";
$colwidth[13]="10%";

//�ʴ� column ������������ $showprint "1" =�ʴ� / "" = ����ʴ�
$showprint="";
$showprintmsg="��";
$showprinttarget_blank="1";					//1=target=_blank

//��ä���
//column ����ͧ����ʴ� ����ͧ��������ͤ��Ҿ� (��ͧ���¡��� $numoffield)
$columntoshowfind=2;

$findfield="posid";			// �������� field ���� 㹷������ ppdate
$findfieldname="����";
$sortdirection="asc";		//��ȷҧ������§ desc=���§�ҡ�ҡ仹���  asc=���§�ҡ������ҡ

//�֧�����Ũҡ�ѧ��ѹ �óշ���ա�ô֧�������ҡ�ҡ 2 table
$field_function="";			//����Ţ��� field ����ͧ������֧�ҡ table ����
// select
$field_function_name[2]="";
$field_function_name[3]="makename";
// from
$table[2] =$dbprefix."";
$table[3] =$dbprefix."vehicle_make";
//where
$field_function_namewhere[2]="";
$field_function_namewhere[3]="id";

function showfieldval($i,$vc){
	global $dbtable2,$table,$fields,$field_function_name, $field_function_namewhere;
	require './config/connectmysql.php';
		$sql="select ".$field_function_name[$i]." from  ".$table[$i]."  where ".$field_function_namewhere[$i]." ='$vc'  ";
		//echo "***sql=$sql<BR>";
		$result=mysql_query($sql);
		if(mysql_num_rows($result)){
			$row=mysql_fetch_object($result);
			return $row->$field_function_name[$i];
		} else {
			return "";
		}
}

?>


<?
$call_from_main="1";
include("main.inc.php");
?>
