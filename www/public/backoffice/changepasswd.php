<? require_once "adminchecklogin.php";?>
<? include("prefix.php");?>
<? require_once ("function.log.inc.php");?>
<table border="0" cellspacing="0" cellpadding="0" width="100%" height="365">
<tr valign="top">
	<td width="25%" height="179"><br />
    <table align="center" width="300" height="150" background="./images/log_banner.jpg">
      <form method="get" action="<?=$_SERVER["PHP_SELF"]?>?dosave=1">
        <tr>
          <td align="left" colspan="2" height="2"><strong> &nbsp;����¹���ʼ�ҹ��Ҫԡ</strong></td>
        </tr>
        <tr>
          <td width="40%" align="right">���ʼ�ҹ��� : </td>
          <td width="60%"><input name="pwdold" type="password" size="15"  maxlength="15" value="<? echo $pwdold;?>"  width="60">          </td>
        </tr>
        <tr>
          <td width="40%" align="right">���ʼ�ҹ���� : </td>
          <td width="60%"><input name="pwdnew" type="password" size="15"  maxlength="15" value="<? echo $pwdnew;?>"  width="60">          </td>
        </tr>
        <tr>
          <td width="40%" align="right">�׹�ѹ���ʼ�ҹ���� :</td>
          <td width="60%"><input name="pwdnewconfirm" type="password" size="15"  maxlength="15" value="<? echo $pwdnewconfirm;?>"  width="60"></td>
        </tr>
        <tr>
          <td colspan="2" align="center"><input type="hidden" name="dosearch" value="1">
              <input type="submit" name="search" value="����¹���ʼ�ҹ">          </td>
          </tr>
      </form>
    </table>
 </td>
	
</tr>
</table>
<?
if (isset($_GET["dosearch"])){$dosearch=$_GET["dosearch"];}else{$dosearch="";}
if ($dosearch<>""){
	if (isset($_GETt["username"])){$username=$_GET["username"];}else{$username="";}
	if (isset($_GET["pwdold"])){$pwdold=$_GET["pwdold"];}else{$pwdold="";}	
	if (isset($_GET["pwdnew"])){$pwdnew=$_GET["pwdnew"];}else{$pwdnew="";}
	if (isset($_GET["pwdnewconfirm"])){$pwdnewconfirm=$_GET["pwdnewconfirm"];}else{$pwdnewconfirm="";}
	//$usercode =  $_SESSION["adminusercode"];
	$password = EncodePwd($pwdold);
	echo $password;
	$oktosave=true;
	if(chkoldpwd($usercode,$password) == 'no'){
		$oktosave=false;
		echo " <h2>  ���ʼ�ҹ������١��ͧ </h2>";
	}
	if( $pwdnew  <> $pwdnewconfirm){
	$oktosave=false;
	echo "  <h2>  �׹�ѹ���ʼ�ҹ���١��ͧ </h2>";
	}
	if ($oktosave){
		$pwdnew = EncodePwd($pwdnew);
		require 'connectmysql.php';
		if($usercode<>'999'){
			$sql2="update ".$dbprefix."user set  password='$pwdnew' where usercode='". $usercode . "'  ";
			//====================LOG===========================
			$text="uid=".$_SESSION["adminuserid"]." action=changepasswd =>$sql2";
			writelogfile($text);
			//=================END LOG===========================
			mysql_query($sql2);			
				echo " <h2>   ����¹���ʼ�ҹ �١��ͧ ��س� Log in ������ҹ����</h2>";
		}
	}
}	
?>
