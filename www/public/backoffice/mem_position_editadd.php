<?require "adminchecklogin.php";?>
<?include("prefix.php");?>
<link href="./../style.css" rel="stylesheet" type="text/css">
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
$colwidth0="26%";		//�������ҧ�ͧ���Ϳ�Ŵ����ͧ����红�����
$colwidth1="74%";					//�������ҧ�ͧ input ������Ѻ������

//�������ҧ�ͧ input type='text' �ҡ��ҧ�������������������ҧ����ͧ
$size[1]="";			$maxlength[1]="";
$size[2]="";			$maxlength[2]="";
$size[3]="";			$maxlength[3]="";
$size[4]="";			$maxlength[4]="";
$size[5]="";			$maxlength[5]="";
$size[6]="";			$maxlength[6]="";
$size[7]="";			$maxlength[7]="";
$size[8]="";			$maxlength[8]="";
$size[9]="";			$maxlength[9]="";
$size[10]="";		$maxlength[10]="";
$size[11]="";		$maxlength[11]="";
$size[12]="";		$maxlength[12]="";
$size[13]="";		$maxlength[13]="";

//��ҹ��ҵ���� fieldsval[$i] �ҡ ����÷�����Ҫ��� fields[$i]
$fieldsval[1]=$val1;
$fieldsval[2]=$val2;
$fieldsval[3]=$val3;
$fieldsval[4]=$val4;
$fieldsval[5]=$val5;
$fieldsval[6]=$val6;
$fieldsval[7]=$val7;
$fieldsval[8]=$val8;
$fieldsval[9]=$val9;
$fieldsval[10]=$val10;
$fieldsval[11]=$val11;
$fieldsval[12]=$val12;
$fieldsval[13]=$val13;

//////////////////////////////////////////////////////////////
//select options
$optionfield="";		// "2,3," ��Ŵ����ͧ�������� option
function showoption($i){
	if($i=='3'){
		showoptionlist("$i",$dbprefix."vehicle_make","id","nakename");
	}
}
function showoptionlist($fieldi,$tablename,$returnvaluefield,$showfield){
	global $dbprefix,$fieldsval;
	$sql="select $returnvaluefield,$showfield from ".$dbprefix."$tablename ";
	$result=mysql_query($sql);
	echo "<select name=\"val$fieldi\">";
	echo "<option value=\"\" ";
	echo ">";
	echo "</option>";
	if($result){
		while($row=mysql_fetch_object($result)){
			$returnvalue=$row->$returnvaluefield;
			$showvalue=$row->$showfield;
			echo "<option value=\"$returnvalue\" ";
			if($fieldsval[$fieldi]==$returnvalue){
				echo " selected ";
			}
			echo ">";
			echo "$showvalue";
			echo "</option>";
		}
	}	
	echo "</select>";
}
//select options
//////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////
//date
$datefield="";		// "2,3," ��Ŵ����ͧ�������� date
function showdate($i){
		if($i=='1'){
			showdatetime("$i");
		}	
		if($i=='2'){
			showdatetime("$i");
		}	
}
function showdatetime($i){
	global $fieldsval;
	echo "<input type='text' name='val$i' size='10' maxlength='10' value='".$fieldsval[$i]."' onBlur=\"chkISODate('frm','val$i','$proj_text30')\">";
	echo " &nbsp;<a href='javascript://' onclick='callPick(document.frm.val$i)'><img src='./datepicker/images/cal.gif' border=0></a>\n";
}
//date
//////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////
//checkbox
$checkboxfield="8,9";		// "8,9" ��Ŵ����ͧ�������� checkbox
// ��ҷ��� retrun �� 1
$checkboxreturnval="1";  //�������繤�ҷ���ͧ�������觡�Ѻ�������ա�� check � box ��� (������ checked)
function showcheckbox($i){
		if($i=='8'){
			showcheckboxfield("$i");
		}	
		if($i=='9'){
			showcheckboxfield("$i");
		}	
}
function showcheckboxfield($i){
	global $fieldsval,$checkboxreturnval;
	echo "<input type='checkbox' name='val$i' value='$checkboxreturnval' ";
	if($fieldsval[$i]=="$checkboxreturnval"){
		echo " checked ";
	}
	echo ">";
}
//checkbox
//////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////////
//��Ǩ�ͺ�����١��ͧ�ͧ������ ��͹ save edit ���� add
$validatefield="";
function checkvalidatefield($i){
	global $oktosave,$fieldsval;
	if($i=='1'){
		if ($fieldsval[$i]==""){
			$oktosave=false;
			echo "<font color='#FF0000'>������͹ �����Թ���</font><br>";
		}
	}
	if($i=='2'){
		if ($fieldsval[$i]==""){
			$oktosave=false;
			echo "<font color='#FF0000'>������͹ ��������´�Թ���</font><br>";
		}
	}
	if($i=='3'){
		if ($fieldsval[$i]==""){
			$oktosave=false;
			echo "<font color='#FF0000'>��������͡ �к�</font><br>";
		}
	}
	if($i=='4'){
		if ($fieldsval[$i]==""){
			$oktosave=false;
			echo "<font color='#FF0000'>��������͡ ������</font><br>";
		}
	}
	if($i=='5'){
		if ($fieldsval[$i]==""){
			$oktosave=false;
			echo "<font color='#FF0000'>������͹ �ҤҢ��</font><br>";
		}
			else{
				if(! is_numeric($fieldsval[$i])){
					$oktosave=false;
					echo "<font color='#FF0000'>�ҤҢ�� ��������Ţ</font><br>";
				}
			}
	}
	if($i=='6'){
		if ($fieldsval[$i]==""){
			$oktosave=false;
			echo "<font color='#FF0000'>������͹ �ӹǹ</font><br>";
		}
			else{
				if(! is_numeric($fieldsval[$i])){
					$oktosave=false;
					echo "<font color='#FF0000'>�ӹǹ ��������Ţ</font><br>";
				}
			}
	}
}
//��Ǩ�ͺ�����١��ͧ�ͧ������ ��͹ save edit ���� add
////////////////////////////////////////////////////////////////////////////////////////
?>


<?
$call_from_editadd="1";
include_once("editadd.inc.php");
?>
