<?
exit;
$FILE = fopen( "member.csv", "r");//������� ��� ���� r ������ҹ�����Ũҡ������ҧ���� 
$data = fgetcsv( $FILE , 1024 );//���红�ͤ������� Array data �觵��������� 
$i=1;
do
{
if ($i == 1){
//������������ҹ����� ŧ�ҹ������ 
$data = fgetcsv( $FILE , 1024 );
$i++;
}
else{
//������Դ��Ͱҹ������
$host="localhost"; 
$user="jasmine";
$password="teeteetee";
$dbname="jasmine_db";
$conetion=mysql_connect($host,$user,$password) or die("�������ö�Դ��Ͱ�ҹ��������");
$db=mysql_select_db($dbname) or die("�������ö���͡�ҹ��������");
mysql_query("SET NAMES TIS620");
/*if($data[9] == '����')$data[9] = 1;
if($data[9] == '���')$data[9] = 2;
if($data[9] == '0')$data[9] = '';
$mdate = explode('/',$data[12]);
$mdate[2] = $mdate[2]-543;
$mdate = $mdate[2].'-'.$mdate[1].'-'.$mdate[0];*/
/*$sql="INSERT INTO ali_member  (id,mcode,name_t,name_b,mobile,address,email,id_card,pos_cur,lr,upa_code,sp_code,mdate) VALUES ('$data[0]', '$data[1]','$data[2]', '$data[3]', '$data[4]', '$data[5]', '$data[6]', '$data[7]', '$data[8]', '$data[9]', '$data[10]', '$data[11]', '$mdate');";
$sql="INSERT INTO ali_product  (pcode,pdesc,price,pv) VALUES ('$data[0]', '$data[1]','$data[2]', '$data[3]');";
$sql="update ali_bmbonus set carry_l = '$data[1]',carry_c = '$data[2]' where mcode = '$data[0]'";
$sql="update ali_member set acc_name = '$data[1]',branch = '$data[2]',acc_type = '$data[3]',acc_no  = '$data[4]',bankcode   = '$data[5]' where mcode = '$data[0]'";*/
//var_dump($data);
//exit;
//$sql="INSERT INTO ali_special_point (sadate,mcode,sa_type,tot_pv) VALUES ('2010-12-25', '$data[1]','VQ', '1000');";
$sql="update ali_member set pos_cur = '$data[1]' where mcode = '$data[0]'";
echo $sql.'<br>';
//exit;
$dbquery=mysql_db_query($dbname,$sql);
mysql_close();
$data = fgetcsv( $FILE , 1024 );
$i++;
}}while ( !feof( $FILE ) );
?>
