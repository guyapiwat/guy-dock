<?
 function logtext($islog,$syscode,$subject,$objcode){
 	include("prefix.php");
	require_once ("function.log.inc.php");
	/*$mem_main = array(2=>"��ª�����Ҫԡ",4=>"Ἱ�����Ѿ�Ź�",5=>"Ἱ���Լ���й�",8=>"Ἱ���Ե�����Ѿ�Ź�",9=>"Ἱ���Ե�������й�",6=>"��ª�����Ҫԡ������Ѿ�Ź�",7=>"��ª�����Ҫԡ����ռ���й�");
	$sale_main = array(1=>"�������Թ���",2=>"�������Ң�",6=>"�����š�ë��͢��");
	$sys_main = array(1=>"���ͧ������",2=>"�����Ũѧ��Ѵ",3=>"�����Ÿ�Ҥ��",4=>"�����ż�����к�/������ʼ�ҹ",5=>"��駤��");
	$mainSubjectDesc = array(1=>"˹����ѡ��Ҫԡ",3=>"˹����ѡ��ë��͢��",5=>"˹����ѡ�������к�");
	$subjectDesc = array(1=>$mem_main,3=>$sale_main,5=>$sys_main);
	list($session,$sub,$state) = explode("-",$subject);
	switch($state){
		case 1 : $stateDesc = "ź"; break;
		case 2 : $stateDesc = "����/���"; break;
		case 3 : $stateDesc = "����"; break;
		case 4 : $stateDesc = "���"; break;
		default : $stateDesc = "��"; break;
	}
	$subject = $stateDesc.($subjectDesc[$session][$sub]==""?$mainSubjectDesc[$session]:$subjectDesc[$session][$sub]);*/
	if($islog){
		$sql = "INSERT INTO ".$dbprefix."log (sys_id,subject,object,ip,logdate,logtime) VALUES('$syscode','$subject','$objcode','".$_SERVER['REMOTE_ADDR']."','".date('Y-m-d')."','".date('H:i:s')."')";
		//====================LOG===========================
$text="uid=".$_SESSION["adminuserid"]." action=logtext =>$sql";
writelogfile($text);
//=================END LOG===========================
		//echo $sql;
		mysql_query($sql);
	}
 }
?>