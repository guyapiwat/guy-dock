<?
    require_once ('../share/textConverter.php');
	if(!isset($_GET['sub'])){

		$result=mysql_query("select * from ".$dbprefix."log where sys_id='".$_SESSION["adminusercode"]."'");
if (mysql_num_rows($result)>0) {
	$row = mysql_fetch_array($result, MYSQL_ASSOC);
			$logdatetime=$row["logdate"].' '.$row["logtime"];
}
?>

<table border="0" width="100%" align="center" height="370">
		<tr><td valign="top"><br />
	<blockquote>
	
		<br>
	รหัส&nbsp;<?=TisToUtf($usercode)?>&nbsp;ชื่อ&nbsp;<?=TisToUtf($username)?><br>
	<br>
	Last Login  :  <?=$logdatetime?>
	<br>
	<br>
	
<a href="index.php?sessiontab=0&sub=1">เปลี่ยนรหัสผ่านผู้ใช้งานระบบ</a>
	<br><br>
	<br><br>
	[<a href="logout.php">Logout</a>]
	<br>
	<br>
	</blockquote>
	</td>
	</tr></table>
<?
}else{	
switch($_GET['sub']){
			case 1:
				?>
				<?
				include("./change_pass.php");
				break;
}
?>
<?
	
}?>