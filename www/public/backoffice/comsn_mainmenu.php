<?
	if(!isset($_GET['sub'])){
?>
<table border="0" cellspacing="0" cellpadding="0" width="100%" height="395">
	<tr>
		<td width="5%">&nbsp;</td>
		<td width="95%" align="left" valign="top"><table border="0" cellspacing="4" cellpadding="0" width="90%">
          <tr>
            <td  valign="top" colspan="2"><img src="images/comsn.gif" align="absmiddle" border="0" /><font size="+2" ><b>����Ԫ��� Commission</b></font><br />
                <br /></td >
          </tr>
          <tr>
            <td height="28" width="50%"><img src="images/user.gif" width="32" height="32" align="absmiddle" />&nbsp;<? echo  "<strong>���ʼ���� :</strong> ".$_SESSION["adminusercode"]." <strong>���ͼ���� :</strong> ".$_SESSION["adminusername"]."<br /><br />";?> </td>
            <td align="right">&nbsp;</td>
          </tr>
          <tr>
          <td width="50%" height="40" valign="top"><table width="97%" border="1" bordercolor="#0099CC" cellspacing="0" cellpadding="0">
                <tr>
                  <td colspan="2" background="./images/bar_box.gif"><font size=5>&nbsp;����Ԫ�������ѻ����</font></td>
                </tr>
                <tr>
                  <td colspan="2">&nbsp;</td>
                </tr>
				<tr>
                  <td align="right"><img src="./images/mon.gif" align="absmiddle"/>&nbsp;&nbsp;</td>
                  <td><strong><?=$wording_lan["com_a_cal"];?></strong></td>
                </tr>
                <tr>
                  <td width="16%"  align="right">&nbsp;</td>
                  <td width="84%"><img src="./images/round_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=1"><?=$wording_lan["com_a"];?></a></td>
                </tr> 
                <tr>
                  <td  align="right">&nbsp;</td>
                  <td><img src="./images/cal_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=2"><?=$wording_lan["com_a_cal"];?></a></td>
                </tr>
				
            <? if($acc->isAccess(4)){   ?> <tr style="display:none">
                  <td  align="right">&nbsp;</td>
                  <td><img src="./images/del_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=3">ź��äӹǳ����Ԫ��� - Fast - W/S</a></td>
                </tr> <? }?>
                <tr style="display:none">
                  <td  align="right"><img src="./images/folder.gif" align="absmiddle" />&nbsp;&nbsp;</td>
                  <td><strong>��§ҹ��������´��ṹ�����ҧ�ѹ���</strong></td>
                </tr>
                <tr style="display:none">
                  <td  align="right">&nbsp;</td>
                  <td><img src="./images/rp_pay_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=4">��§ҹ��������´��ṹ����Ԫ��蹼���й�</a></td>
                </tr>
                
			 <tr>
                  <td  align="right"><img src="./images/folder.gif" align="absmiddle" />&nbsp;&nbsp;</td>
                  <td><strong>��§ҹ��ػ����������ҧ�ѹ���</strong></td>
              </tr>
                <tr >
                  <td  align="right">&nbsp;</td>
                  <td><img src="./images/rp_detail_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=7">��§ҹ��û�Ѻ���˹���Ҫԡ</a></td>
                </tr>
				<tr style="display:none"> 
                  <td  align="right">&nbsp;</td>
                  <td><img src="./images/rp_detail_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=54">��§ҹ�ʴ�ʶҹС�û�Ѻ���˹觢ͧ��Ҫԡ Star Diamond</a></td>
                </tr>
				<tr style="display:none">
                  <td  align="right">&nbsp;</td>
                  <td><img src="./images/rp_detail_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=55">��§ҹ�ʴ�ʶҹС�û�Ѻ���˹觢ͧ��Ҫԡ Crown Diamond  </a></td>
                </tr>
                <tr style="display:none">
                  <td  align="right">&nbsp;</td>
                  <td><img src="./images/rp_detail_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=20">��§ҹ�ѡ���ʹ</a></td>
                </tr>
				
                <tr style="display:none">
                  <td  align="right">&nbsp;</td>
                  <td><img src="./images/rp_pay_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=8">��§ҹ��ػ��������Ԫ��蹼���й�</a></td>
                </tr>
				  <tr style="display:none">
                  <td  align="right">&nbsp;</td>
                  <td><img src="./images/rp_pay_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=88">��§ҹ��ػ��������Ԫ���⺹�ʵ��˹�</a></td>
                </tr>
			  <tr  style="display:none" >
              <td  align="right">&nbsp;</td>
              <td><img src="./images/rp_detail_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=100">��§ҹ��ػ����������Ҫԡ</a></td>
            </tr>
			
			
			
			
				<!--------------------------------------->
					<tr>
						<td  align="right">&nbsp;</td>
						<td><img src="./images/rp_detail_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=8">��§ҹ��ػ����� ����й�(Fast)</a></td>
					</tr>
					<tr>
						<td  align="right">&nbsp;</td>
						<td><img src="./images/rp_detail_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=9">��§ҹ��ػ����� W/S</a></td>
					</tr>
					<tr  style="display:none">
						<td  align="right">&nbsp;</td> <!--------------------------------------->
						<td><img src="./images/rp_detail_s.gif" align="absmiddle" />&nbsp;
						<a href="./index.php?sessiontab=<?=$sesstab?>&sub=1212">��§ҹ��ػ����� Matching</a></td>
					</tr>
					<tr style="display:none">
						<td  align="right">&nbsp;</td> <!--------------------------------------->
						<td><img src="./images/rp_detail_s.gif" align="absmiddle" />&nbsp;
						<a href="./index.php?sessiontab=<?=$sesstab?>&sub=6565">��§ҹ��ػ����� key bonus</a></td>
					</tr>
					
					<tr>
						<td  align="right">&nbsp;</td>
						<td><img src="./images/rp_detail_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=100">��§ҹ��ػ����������Ҫԡ Ἱ A</a></td>
					</tr>
					<tr>
						<td  align="right">&nbsp;</td>
						<td><img src="./images/rp_detail_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=103">��§ҹ��� Cron daily positon</a></td>
					</tr>
					<tr style="display:none" >
						<td  align="right">&nbsp;</td>
						<td><img src="./images/rp_detail_s.gif" alt="" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=154">��§ҹ Ewallet</a></td><!--�ѹ�����§ҹ ecom �ͧ����--->
					</tr>

					<tr style="display:none"  >
						<td  align="right">&nbsp;</td>
						<td><img src="./images/rp_detail_s.gif" alt="" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=146">��§ҹ Eautoship</a></td>
					</tr>

					<tr style="display:none" >
						<td  align="right">&nbsp;</td>
						<td><img src="./images/rp_pay_s.gif" alt="" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=155">��§ҹ Ecom to Ewallet</a></td>
					</tr>
              <tr>
                <td colspan="2">&nbsp;</td>
              </tr>
				<!--------------------------------------->
				
            </table>
			
            <br>
            <table width="97%" border="1" bordercolor="#0099CC" cellspacing="0" cellpadding="0" >
              <tr>
                <td colspan="2" background="./images/bar_box.gif"><font size=5>&nbsp;&#3588;&#3635;&#3609;&#3623;&#3603;&#3619;&#3629;&#3610;&#3585;&#3634;&#3619;&#3592;&#3656;&#3634;&#3618����ѻ����</font></td>
              </tr>
              <tr>
                <td colspan="2">&nbsp;</td>
              </tr>
              <tr>
                <td align="right"><img src="./images/mon.gif" align="absmiddle"/>&nbsp;&nbsp;</td>
                <td><strong>&#3588;&#3635;&#3609;&#3623;&#3603;&#3619;&#3629;&#3610;&#3585;&#3634;&#3619;&#3592;&#3656;&#3634;&#3618;(&#3649;&#3612;&#3609; A)</strong></td>
              </tr>
              <tr>
                <td width="16%"  align="right">&nbsp;</td>
                <td width="84%"><img src="./images/round_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=25">&#3586;&#3657;&#3629;&#3617;&#3641;&#3621;&#3619;&#3629;&#3610;&#3585;&#3634;&#3619;&#3588;&#3635;&#3609;&#3623;&#3603;&#3619;&#3629;&#3610;&#3585;&#3634;&#3619;&#3592;&#3656;&#3634;&#3618;</a></td>
              </tr>
              <tr>
                <td  align="right">&nbsp;</td>
                <td><img src="./images/cal_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=26">&#3588;&#3635;&#3609;&#3623;&#3603;&#3619;&#3629;&#3610;&#3585;&#3634;&#3619;&#3592;&#3656;&#3634;&#3618;</a></td>
              </tr>
              <? if($acc->isAccess(4)){ ?>
              <tr style="display:none">
                <td  align="right">&nbsp;</td>
                <td><img src="./images/del_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=27">&#3621;&#3610;&#3585;&#3634;&#3619;&#3588;&#3635;&#3609;&#3623;&#3603;&#3619;&#3629;&#3610;&#3585;&#3634;&#3619;&#3592;&#3656;&#3634;&#3618;</a></td>
              </tr>
              <? } ?>
			    <tr >
                <td  align="right"><img src="./images/folder.gif" align="absmiddle" />&nbsp;&nbsp;</td>
                <td><strong>��§ҹ��ػ�ͺ��è���</strong></td>
              </tr>
				<tr>
                <td  align="right">&nbsp;</td>
                <td><img src="./images/rp_detail_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=282828">��§ҹ��ػ�ͺ (��� ����/������) Ἱ A</a></td>
              </tr>
              <tr style="display:none">
                <td  align="right"><img src="./images/folder.gif" align="absmiddle" />&nbsp;&nbsp;</td>
                <td><strong>&#3619;&#3634;&#3618;&#3591;&#3634;&#3609;&#3619;&#3634;&#3618;&#3621;&#3632;&#3648;&#3629;&#3637;&#3618;&#3604;&#3619;&#3629;&#3610;&#3585;&#3634;&#3619;&#3592;&#3656;&#3634;&#3618;</strong></td>
              </tr>
              <tr style="display:none" >
                <td  align="right">&nbsp;</td>
                <td><img src="./images/rp_detail_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=21">&#3619;&#3634;&#3618;&#3591;&#3634;&#3609;&#3619;&#3629;&#3610;&#3585;&#3634;&#3619;&#3592;&#3656;&#3634;&#3618;</a></td>
              </tr>
              <!-- <tr>
                  <td  align="right">&nbsp;</td>
                  <td><img src="./images/rp_pay_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=16">&#3619;&#3634;&#3618;&#3621;&#3632;&#3648;&#3629;&#3637;&#3618;&#3604;&#3588;&#3632;&#3649;&#3609;&#3609; &#3585;&#3629;&#3591;&#3607;&#3640;&#3609;</a></td>
                </tr>-->
              <tr style="display:none">
                <td  align="right"><img src="./images/folder.gif" align="absmiddle" />&nbsp;&nbsp;</td>
                <td><strong>&#3619;&#3634;&#3618;&#3591;&#3634;&#3609;&#3626;&#3619;&#3640;&#3611;&#3619;&#3629;&#3610;&#3585;&#3634;&#3619;&#3592;&#3656;&#3634;&#3618;</strong></td>
              </tr>
              <tr style="display:none">
                <td  align="right">&nbsp;</td>
                <td><img src="./images/rp_detail_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=47">&#3619;&#3634;&#3618;&#3591;&#3634;&#3609;&#3626;&#3619;&#3640;&#3611; Cap Adjust</a></td>
              </tr>
              <tr  style="display:none">
                <td  align="right">&nbsp;</td>
                <td><img src="./images/rp_detail_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=28">&#3619;&#3634;&#3618;&#3591;&#3634;&#3609;&#3626;&#3619;&#3640;&#3611;&#3619;&#3629;&#3610;&#3585;&#3634;&#3619;&#3592;&#3656;&#3634;&#3618;</a></td>
              </tr>
              <tr  style="display:none">
                <td  align="right">&nbsp;</td>
                <td><img src="./images/rp_detail_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=34">&#3619;&#3634;&#3618;&#3591;&#3634;&#3609;&#3626;&#3619;&#3640;&#3611;&#3619;&#3629;&#3610;&#3585;&#3634;&#3619;&#3652;&#3617;&#3656;&#3592;&#3656;&#3634;&#3618;</a></td>
              </tr>
			  
              <tr style="display:none">
                <td  align="right">&nbsp;</td>
                <td><img src="./images/rp_detail_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=2828">&#3619;&#3634;&#3618;&#3591;&#3634;&#3609;&#3626;&#3619;&#3640;&#3611;&#3619;&#3629;&#3610;&#3585;&#3634;&#3619;&#3592;&#3656;&#3634;&#3618; (��� 3)</a></td>
              </tr>
              <tr style="display:none">
                <td  align="right">&nbsp;</td>
                <td><img src="./images/rp_detail_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=3434">&#3619;&#3634;&#3618;&#3591;&#3634;&#3609;&#3626;&#3619;&#3640;&#3611;&#3619;&#3629;&#3610;&#3585;&#3634;&#3619;&#3652;&#3617;&#3656;&#3592;&#3656;&#3634;&#3618; (��� 3)</a></td>
              </tr>
			  <tr style="display:none">
                <td  align="right">&nbsp;</td>
                <td><img src="./images/rp_detail_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=288">��§ҹ��ػ�ͺ (��� 3 ��� ����/������)</a></td>
              </tr>
			  <tr style="display:none">
                <td  align="right">&nbsp;</td>
                <td><img src="./images/rp_detail_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=282828">��§ҹ��ػ�ͺ��è��� ���. (1, 1�, ˹ѧ����Ѻ�ͧ�����ѡ���� � ������)</a></td>
              </tr>
              <tr>
                <td  align="right">&nbsp;</td>
                <td><img src="./images/rp_detail_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=36">&#3619;&#3634;&#3618;&#3591;&#3634;&#3609;&#3626;&#3619;&#3640;&#3611; Pack File Ἱ A</a></td>
              </tr>
                <tr style="display:none">
                <td  align="right">&nbsp;</td>
                <td><img src="./images/rp_detail_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=2008">��§ҹ adjust</a></td>
              </tr>

			 <tr style="display:none">
                <td  align="right">&nbsp;</td>
                <td><img src="./images/rp_detail_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=2018">��§ҹ ��úѧ�Ѻ����/������</a></td>
              </tr>
              <tr style="display:none">
                <td  align="right">&nbsp;</td>
                <td><img src="./images/rp_detail_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=58">&#3619;&#3634;&#3618;&#3591;&#3634;&#3609;&#3619;&#3623;&#3617;&#3585;&#3634;&#3619;&#3592;&#3656;&#3634;&#3618; &#3588;&#3629;&#3617;&#3617;&#3636;&#3594;&#3594;&#3633;&#3656;&#3609; (Base Currency)</a></td>
              </tr >
			    <tr style="display:none;">
                <td  align="right">&nbsp;</td>
                <td><img src="./images/rp_detail_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=115">&#3619;&#3634;&#3618;&#3591;&#3634;&#3609;&#3619;&#3623;&#3617;&#3585;&#3634;&#3619;&#3592;&#3656;&#3634;&#3618; &#3588;&#3629;&#3617;&#3617;&#3636;&#3594;&#3594;&#3633;&#3656;&#3609; (Local Currency)</a></td>
              </tr>
			  
              <tr>
                <td colspan="2">&nbsp;</td>
              </tr>
              <!--<tr>
                  <td  align="right">&nbsp;</td>
                  <td><img src="./images/rp_pay_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=19">&#3619;&#3634;&#3618;&#3591;&#3634;&#3609;&#3588;&#3629;&#3617;&#3617;&#3636;&#3594;&#3594;&#3633;&#3656;&#3609; &#3619;&#3634;&#3618;&#3652;&#3604;&#3657;&#3595;&#3639;&#3657;&#3629;&#3619;&#3633;&#3585;&#3625;&#3634;&#3618;&#3629;&#3604;</a></td>
                </tr-->
            </table>
            <br>
            <br></td>
            <td width="50%" height="50" valign="top">
		<table  width="97%"  border="1" bordercolor="#FF7F00" cellspacing="0" cellpadding="0">
              <tr>
                <td colspan="2" background="./images/bar_box.gif">&nbsp;<font size=5>&#3588;&#3629;&#3617;&#3617;&#3636;&#3594;&#3594;&#3633;&#3656;&#3609;&#3619;&#3634;&#3618;&#3648;&#3604;&#3639;&#3629;&#3609;</font></td>
              </tr>
              <tr>
                <td colspan="2">&nbsp;</td>
              </tr>
              <tr>
                <td align="right"><img src="./images/mon.gif" align="absmiddle"/>&nbsp;&nbsp;</td>
                <td><strong>�ӹǳ����Ԫ���Ἱ  (B)</strong></td>
              </tr>
              <tr>
                <td width="16%"  align="right">&nbsp;</td>
                <td width="84%"><img src="./images/round_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=11">�������ͺ��äӹǳ����Ԫ���Ἱ (B)</a></td>
              </tr>
              <tr <? if(!$acc->isAccess(1)) echo 'style="display:none"';  ?>>
                <td  align="right">&nbsp;</td>
                <td><img src="./images/cal_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=12">�ӹǳ����Ԫ���Ἱ (B)</a></td>
              </tr>
              <tr style="display:none">
                <td  align="right">&nbsp;</td>
                <td><img src="./images/del_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=13">&#3621;&#3610;&#3585;&#3634;&#3619;&#3588;&#3635;&#3609;&#3623;&#3603;&#3588;&#3629;&#3617;&#3617;&#3636;&#3626;&#3594;&#3633;&#3656;&#3609;&#3649;&#3612;&#3609; (B)</a></td>
              </tr>
              <tr>
                <td  align="right"><img src="./images/folder.gif" align="absmiddle" />&nbsp;&nbsp;</td>
                <td><strong>&#3619;&#3634;&#3618;&#3591;&#3634;&#3609;&#3619;&#3634;&#3618;&#3621;&#3632;&#3648;&#3629;&#3637;&#3618;&#3604;&#3588;&#3632;&#3649;&#3609;&#3609;</strong></td>
              </tr>
              <tr  style="display:none">
                <td  align="right">&nbsp;</td>
                <td><img src="./images/rp_detail_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=21">&#3619;&#3634;&#3618;&#3591;&#3634;&#3609;&#3619;&#3633;&#3585;&#3625;&#3634;&#3618;&#3629;&#3604;</a></td>
              </tr>
              <tr style="display:none">
                <td  align="right">&nbsp;</td>
                <td><img src="./images/rp_detail_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=14">&#3619;&#3634;&#3618;&#3621;&#3632;&#3648;&#3629;&#3637;&#3618;&#3604;&#3588;&#3632;&#3649;&#3609;&#3609; Unilevel</a></td>
              </tr>
              <!-- <tr>
                  <td  align="right">&nbsp;</td>
                  <td><img src="./images/rp_pay_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=16">&#3619;&#3634;&#3618;&#3621;&#3632;&#3648;&#3629;&#3637;&#3618;&#3604;&#3588;&#3632;&#3649;&#3609;&#3609; &#3585;&#3629;&#3591;&#3607;&#3640;&#3609;</a></td>
                </tr>-->
              <tr style="display:none">
                <td  align="right">&nbsp;</td>
                <td><img src="./images/rp_pay_s.gif" alt="" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=18">&#3619;&#3634;&#3618;&#3591;&#3634;&#3609;&#3626;&#3619;&#3640;&#3611;&#3619;&#3634;&#3618;&#3652;&#3604;&#3657;&#3585;&#3629;&#3591;&#3607;&#3640;&#3609;</a></td>
              </tr>
               <tr style="display:none" >
                <td  align="right"><img src="./images/folder.gif" align="absmiddle" />&nbsp;&nbsp;</td>
                <td><strong>&#3619;&#3634;&#3618;&#3591;&#3634;&#3609;&#3626;&#3619;&#3640;&#3611;&#3619;&#3634;&#3618;&#3652;&#3604;&#3657;</strong></td>
              </tr>
			    <tr bordercolor="#0099CC"  >
						<td  align="right">&nbsp;</td>
						<td><img src="./images/rp_detail_s.gif" alt="" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=234">��§ҹ������ Evoucher </a></td>
					</tr>
               <tr style="display:none">
                 <td  align="right">&nbsp;</td>
                 <td><img src="./images/rp_detail_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=20">&#3619;&#3634;&#3618;&#3591;&#3634;&#3609;&#3619;&#3633;&#3585;&#3625;&#3634;&#3618;&#3629;&#3604;</a></td>
               </tr>
               <tr style="display:none">
                 <td   align="right">&nbsp;</td>
                 <td><img src="./images/rp_detail_s.gif" alt="" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=65">
                   <?="&#3619;&#3634;&#3618;&#3591;&#3634;&#3609;&#3626;&#3619;&#3640;&#3611;&#3619;&#3634;&#3618;&#3652;&#3604;&#3657;&#3588;&#3629;&#3617;&#3617;&#3636;&#3594;&#3588;&#3656;&#3634;&#3588;&#3637;&#3618;&#3660;&#3586;&#3634;&#3618;";?></a></td>
               </tr>

              <tr style="display:none" >
                <td  align="right">&nbsp;</td>
                <td><img src="./images/rp_pay_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=17">&#3619;&#3634;&#3618;&#3591;&#3634;&#3609;&#3626;&#3619;&#3640;&#3611;&#3619;&#3634;&#3618;&#3652;&#3604;&#3657; UNILEVEL </a></td>
              </tr>
			   <tr style="display:none" >
                <td  align="right">&nbsp;</td>
                <td><img src="./images/rp_pay_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=18">&#3619;&#3634;&#3618;&#3591;&#3634;&#3609; ONE TIME BONUS </a></td>
              </tr>
			   
			   
			   
			   
			   
			   
				<!--------------------------------------->
					<tr>
						<td  align="right">&nbsp;</td>
						<td><img src="./images/rp_detail_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=54">��§ҹ��û�Ѻ���˹����õ���</a></td>
					</tr>
				<tr>
                  <td  align="right">&nbsp;</td>
                  <td><img src="./images/rp_detail_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=21">��§ҹ����ѡ���ʹ</a></td>
                </tr>
					<tr >
						<td  align="right">&nbsp;</td> <!--------------------------------------->
						<td><img src="./images/rp_detail_s.gif" align="absmiddle" />&nbsp;
						<a href="./index.php?sessiontab=<?=$sesstab?>&sub=1212">��§ҹ��ػ����� Matching</a></td>
					</tr>

					<tr>
						<td  align="right">&nbsp;</td>
						<td><img src="./images/rp_detail_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=22">��§ҹ��ػ����� All Sale</a></td>
					</tr>
					<tr style="display:none">
						<td  align="right">&nbsp;</td>
						<td><img src="./images/rp_detail_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=17">��§ҹ��ػ����� Uni-level</a></td>
					</tr>
				<!--------------------------------------->  
			   
			   
			   
			   
			   
			   
			 <tr  >
              <td  align="right">&nbsp;</td>
              <td><img src="./images/rp_detail_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=1011">��§ҹ��ػ����������Ҫԡ Ἱ B</a></td>
            </tr>
			    <tr >
                <td  align="right">&nbsp;</td>
                <td><img src="./images/rp_detail_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=2525">��§ҹ��ػ�ͺ (��� ����/������) Ἱ B</a></td>
              </tr>
			   <tr >
                <td  align="right">&nbsp;</td>
                <td><img src="./images/rp_detail_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=3636">��§ҹ PackFile  Ἱ B</a></td>
              </tr>
			 
                <tr  style="display:none" >
                <td  align="right">&nbsp;</td>
                <td><img src="./images/rp_pay_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=145">��§ҹ��ػ Travel Point</a></td>
              </tr>
              <tr>
                <td colspan="2">&nbsp;</td>
              </tr>
            
              <!--<tr>
                  <td  align="right">&nbsp;</td>
                  <td><img src="./images/rp_pay_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=19">&#3619;&#3634;&#3618;&#3591;&#3634;&#3609;&#3588;&#3629;&#3617;&#3617;&#3636;&#3594;&#3594;&#3633;&#3656;&#3609; &#3619;&#3634;&#3618;&#3652;&#3604;&#3657;&#3595;&#3639;&#3657;&#3629;&#3619;&#3633;&#3585;&#3625;&#3634;&#3618;&#3629;&#3604;</a></td>
                </tr-->
            </table>
			<br>
			<table  width="97%"  border="1" bordercolor="#FF7F00" cellspacing="0" cellpadding="0">
              <tr>
                <td colspan="2" background="./images/bar_box.gif">&nbsp;<font size=5>��§ҹ��ػ�������Ҫԡ</font></td>
              </tr>
              <tr>
                <td colspan="2">&nbsp;</td>
              </tr>
              <tr>
                <td width="16%"  align="right">&nbsp;</td>
                <td width="84%"><img src="./images/round_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=10111">��§ҹ��ػ�������Ҫԡ A+B</a></td>
              </tr>
              <tr>
                <td colspan="2">&nbsp;</td>
              </tr>
			  </table>
		<br>
		<table width="97%" border="1" bordercolor="#FF7F00" cellspacing="0" cellpadding="0" style="display:none">
          <tr>
            <td colspan="2" background="./images/bar_box.gif">&nbsp;Travel Point</td>
          </tr>
          <tr>
            <td colspan="2">&nbsp;</td>
          </tr>
          <tr>
            <td align="right"><img src="./images/mon.gif" align="absmiddle"/>&nbsp;&nbsp;</td>
            <td><strong>Travel Point </strong></td>
          </tr>
          <tr>
            <td width="16%"  align="right">&nbsp;</td>
            <td width="84%"><img src="./images/round_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=60">&#3619;&#3634;&#3618;&#3591;&#3634;&#3609;&#3648;&#3614;&#3636;&#3656;&#3617;&#3619;&#3629;&#3610; Travel Promotion</a></td>
          </tr>
          <tr style="display:none">
            <td width="16%"  align="right">&nbsp;</td>
            <td width="84%"><img src="./images/round_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=44">&#3586;&#3657;&#3629;&#3617;&#3641;&#3621;&#3585;&#3634;&#3619;&#3648;&#3614;&#3636;&#3656;&#3617;&#3619;&#3629;&#3610; Travel Point</a><a href="./index.php?sessiontab=<?=$sesstab?>&sub=54"><font color="#FF0000"><b>(&#3586;&#3629;&#3591;&#3648;&#3585;&#3656;&#3634;)</b></font></a></td>
          </tr>
          <tr style="display:none">
            <td  align="right"><img src="./images/folder.gif" align="absmiddle" />&nbsp;&nbsp;</td>
            <td><strong>&#3619;&#3634;&#3618;&#3591;&#3634;&#3609;&#3619;&#3634;&#3618;&#3621;&#3632;&#3648;&#3629;&#3637;&#3618;&#3604;&#3588;&#3632;&#3649;&#3609;&#3609;</strong></td>
          </tr>
          <tr style="display:none">
            <td  align="right">&nbsp;</td>
            <td><img src="./images/rp_detail_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=41">&#3619;&#3634;&#3618;&#3621;&#3632;&#3648;&#3629;&#3637;&#3618;&#3604;&#3588;&#3632;&#3649;&#3609;&#3609;</a></td>
          </tr>
          <tr style="display:none">
            <td  align="right">&nbsp;</td>
            <td><img src="./images/rp_detail_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=43">&#3619;&#3634;&#3618;&#3621;&#3632;&#3648;&#3629;&#3637;&#3618;&#3604;&#3610;&#3636;&#3621;</a></td>
          </tr>
          <tr style="display:none">
            <td  align="right"><img src="./images/folder.gif" align="absmiddle" />&nbsp;&nbsp;</td>
            <td><strong>&#3619;&#3634;&#3618;&#3591;&#3634;&#3609;&#3626;&#3619;&#3640;&#3611;</strong></td>
          </tr>
          <tr  >
            <td  align="right">&nbsp;</td>
            <td><img src="./images/rp_pay_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=146">&#3619;&#3634;&#3618;&#3591;&#3634;&#3609;&#3626;&#3619;&#3640;&#3611; Travel Promotion</a></td>
          </tr>
          <!--<tr>
                  <td  align="right">&nbsp;</td>
                  <td><img src="./images/rp_pay_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=19">&#3619;&#3634;&#3618;&#3591;&#3634;&#3609;&#3588;&#3629;&#3617;&#3617;&#3636;&#3594;&#3594;&#3633;&#3656;&#3609; &#3619;&#3634;&#3618;&#3652;&#3604;&#3657;&#3595;&#3639;&#3657;&#3629;&#3619;&#3633;&#3585;&#3625;&#3634;&#3618;&#3629;&#3604;</a></td>
                </tr-->
              <tr>
                <td colspan="2">&nbsp;</td>
              </tr>
        </table>
		<p>&nbsp;</p></td>
          </tr>
          <tr height=10>
          	<td></td>
          	<td></td>
          </tr>
	<tr>


  </table>
 <table width="100%"  style="display:none"> <tr><td colspan="3">&nbsp;</td></tr>
				<tr>
				  <td align="center">&nbsp;</td>
				  <td width="86%" align="left">
                  <fieldset><legend><b>��§ҹ��ػ��è��� �Ż���ª��</b></legend>
                  <table width="100%" border="0" bordercolor="#0099CC" cellspacing="0" cellpadding="0">
                  	<tr><td>&nbsp;</td>
                  	  <td>&nbsp;</td>
               	    <td>&nbsp;</td></tr>
                    <tr>

                      <td width="1%">&nbsp;</td>
                      <td width="50%"><img src="./images/report.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&amp;sub=57">&#3619;&#3634;&#3618;&#3591;&#3634;&#3609;&#3626;&#3619;&#3640;&#3611;&#3585;&#3634;&#3619;&#3592;&#3656;&#3634;&#3618;&#3616;&#3634;&#3625;&#3637;<br>
                      </a><br>
                      <!--<img src="./images/report.gif" align="absmiddle" border="0" />&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&amp;sub=142">��§ҹ����þҡ� (A)--></td>
                      <td width="50%" >
                      <img src="./images/report.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&amp;sub=102">&#3619;&#3634;&#3618;&#3591;&#3634;&#3609;&#3626;&#3619;&#3640;&#3611;&#3619;&#3634;&#3618;&#3652;&#3604;&#3657;&#3619;&#3623;&#3617;&#3588;&#3629;&#3617;&#3617;&#3636;&#3594;&#3594;&#3633;&#3656;&#3609;</a></td>
				    </tr>
			      </table>
                  </fieldset></td>
				  <td width="9%" align="center">&nbsp;</td>

				</tr>
			      </table></td>
			
				  <td width="9%" align="center">&nbsp;</td>
  </tr></table>
<?
	}else{
?>
<table border="0" height="395"  width="99%"><tr valign="top">
<td width="50" style="display:none">
<a href="javascript:history.back()"><img border="0" src="./images/back.gif" height="40" width="40" alt="���٤���Ԫ���" /></a>
<? 	if(isset($_GET['sub']))
		$sub = $_GET['sub'];
	else if(isset($_POST['sub']))
		$sub = $_POST['sub'];
	$hl = "style='border:inset 1 #FF9933;'"; 
?>


</td>
<td align="left" width="100%">
<fieldset>
<?
		switch($_GET['sub']){
			case 1:
				?>
				<legend>
		           <strong><font color="#666666">�������ͺ��äӹǳ����Ԫ���Ἱ (A)&nbsp;&nbsp;</font></strong>
                   <? if($acc->isAccess(2)){?>
                   <img border="0" src="./images/add.gif" alt="�����������ͺ��äӹǳ����Ԫ���Ἱ (A)" align="absmiddle" width="16" height="16" />&nbsp;&nbsp;<a href='./index.php?sessiontab=4&sub=1&state=2'><?=$wording_lan["com_a"];?></a>
					&nbsp;&nbsp;||&nbsp;&nbsp;<a href='./index.php?sessiontab=4&sub=1&state=3'>Auto �����ͺ</a>
                  <? }?>
                </legend>
				<?
				include("./comsn/com_a/around.php");
				break;
			case 2:
				?>

				<legend>
		           <strong><font color="#666666"><?=$wording_lan["com_a_cal"]?></font></strong>
				 </legend>  
				   <?
				include("./comsn/com_a/comsn_a_calc.php");
				break;
			case 3:
				?>
				</legend><legend>
		           <strong><font color="#666666"><?=$wording_lan["commission"]["a"]["4"]?></font></strong><?
				include("./comsn/com_a/comsn_a_delete.php");
				break;
			case 4:
				?>
				</legend><legend>
		           <strong><font color="#666666">��������´����Ԫ��� ����й�(Fast)</font></strong></legend>
				<?
				include("./comsn/com_a/rep_fast_comsn.php");
				break;
			case 5:
				?>
				</legend><legend>
		           <strong><font color="#666666">��������´����Ԫ��� W/S Bonus</font></strong></legend>
				<?
				include("./comsn/com_a/rep_bc_comsn.php");
				break;
			case 7:
				?>
				<legend>
		           <strong><font color="#666666">��§ҹ��û�Ѻ���˹���Ҫԡ</font></strong></legend>
				<?
				include("./comsn/com_a/rep_newpositon.php");
				break;
			case 8:
				?>
				<legend>
		           <strong><font color="#666666">��§ҹ��ػ����� ����й�(Fast)</font></strong></legend>
				<?
				include("./comsn/com_a/rep_ambonus_comsn.php");
				break;
			case 88:
				?>
				<legend>
		           <strong><font color="#666666">��§ҹ��ػ��������Ԫ���⺹�ʵ��˹�</font></strong></legend>
				<?
				include("./comsn/com_a/rep_ambonus_comsn1.php");
				break;
			case 9:
				?>
				<legend>
		           <strong><font color="#666666">��§ҹ��ػ����� W/S</font></strong></legend>
				<?
				include("./comsn/com_a/rep_bmbonus_comsn.php");
				break;
			case 999999:
				?>
				<legend>
		           <strong><font color="#666666">��§ҹ��ػ����� W/S</font></strong></legend>
				<?
				include("./comsn/com_a/rep_bmbonus_comsn_export.php");
				break;
			case 10:
				?>
				<legend>
		           <strong><font color="#666666"><?=$wording_lan["commission"]["salary"]?></font></strong></legend>
				<?
				include("./comsn/com_a/rep_dmbonus_comsn.php");
				break;
			case 1212:
				?>
				<legend>
		           <strong><font color="#666666">��§ҹ��ػ�����  Matching</font></strong></legend>
				<?
				include("./comsn/com_a/rep_dmbonus_comsn.php");
				break;

			case 234:
				?>
				<legend>
		           <strong><font color="#666666">��§ҹ������ Evoucher</font></strong></legend>
				<?
				include("voucher.php");
				break;
			case 2008 :
				?>
				<legend>
		           <strong><font color="#666666">adjust</font></strong></legend>
				<?
				include("./adjust.php");
				break;
			case 2088 :
				?>
				<legend>
		           <strong><font color="#666666">adjust</font></strong></legend>
				<?
				include("./adjust_editadd.php");
				break;
			case 2018 :
				?>
				<legend>
		           <strong><font color="#666666">��§ҹ�ѧ�Ѻ����/������</font></strong></legend>
				<?
				include("./rep_change_comsn.php");
				break;
			case 11:
				?>
				<legend>

		           <strong><font color="#666666">�������ͺ���<?=$wording_lan["commission"]["bdetail"]?></font></strong>
                   <? if($acc->isAccess(2)){?>
                   <img border="0" src="./images/add.gif" alt="�����������ͺ��äӹǳ����Ԫ���Ἱ (B)" align="absmiddle" width="16" height="16" />&nbsp;&nbsp;<a href='./index.php?sessiontab=4&sub=11&state=2'>�����������ͺ��äӹǳ����Ԫ���Ἱ (B)</a>
                   <? }?>
                </legend>
				<?
				include("./comsn/com_b/bround.php");
				break;
			case 12:
				?>
				<legend>
		           <strong><font color="#666666"><?=$wording_lan["commission"]["bdetail"]?></font></strong>
				 </legend>
				   <?
				include("./comsn/com_b/comsn_b_calc.php");
				break;
			case 13:
				?>
			<legend>
		           <strong><font color="#666666">ź��äӹǳ����ѹ���� Stockit - Pool Bonus</font></strong>
				  	</legend> 
				   <?
				include("./comsn/com_b/comsn_b_delete.php");
				break;
			case 14:
				?>
				</legend><legend>
		           <strong><font color="#666666">��������´����Ԫ��� UNILEVEL</font></strong></legend>
				<?
				include("./comsn/com_b/rep_mc_comsn.php");
				break;
			case 15:
				?>
				<legend>
		           <strong><font color="#666666">��������´��ṹ Pool Bonus</font></strong></legend>
				<?
				include("./comsn/com_b/rep_pc_comsn.php");
				break;
			case 16:
				?>
				<legend>
		           <strong><font color="#666666">��§ҹ��������´��ػ�����ͧ�ع</font></strong></legend>
				<?
				include("./comsn/com_b/rep_pm_comsn.php");
				break;
			case 17:
				?>
				<legend>
		           <strong><font color="#666666">��§ҹ��ػ����Ԫ��� UNILEVEL</font></strong></legend>
				<?
				include("./comsn/com_b/rep_mmbonus_comsn.php");
				break;
			case 18:
				?>
				<legend>
		           <strong><font color="#666666">��§ҹ��ػ�����ͧ�ع (CD,SD)</font></strong></legend>
				<?
				include("./comsn/com_b/rep_pmbonus_comsn.php");
				break;
			case 19:
				?>
				<legend>
		           <strong><font color="#666666">��§ҹ��ػ��������Ԫ Leader Bonus</font></strong></legend>
				<?
				include("./comsn/com_b/rep_rmbonus_comsn.php");
				break;
			case 199:
				?>
				</legend><legend>
		           <strong><font color="#666666">��������´��ṹ Leader Bonus</font></strong></legend>
				<?
				include("./comsn/com_b/rep_rc_comsn.php");
				break;
			case 20:
				?>
				<legend>
		           <strong><font color="#666666">��§ҹ�����ѡ���ʹ</font></strong></legend>
				<?
				include("./comsn/com_a/rep_status_comsn.php");
				break;
			case 21:
				?>
				<legend>
		           <strong><font color="#666666">��§ҹ����ѡ���ʹ</font></strong></legend>
				<?
				include("./comsn/com_a/rep_status_comsn.php");
				break;
		 	
			case 100:
				?>
				<legend>
		           <strong><font color="#666666">��§ҹ��ػ����������Ҫԡ Ἱ A</font></strong></legend>
				<?
				include("./comsn/report/rep_all_fast_team_comsn.php");
				break;
			case 103:
				?>
				<legend>
		           <strong><font color="#666666">��§ҹ��� Cron daily positon</font></strong></legend>
				<?
				include("./comsn/report/rep_cron_daily_positon.php");
				break;	
			case 1011:
				?>
				<legend>
		           <strong><font color="#666666">��§ҹ��ػ����������Ҫԡ Ἱ B  <!--?=$_GET['ftrcode']?--> </font></strong></legend>
				<?
				include("./comsn/report/rep_all_fast_team_comsn1.php");
				break;
			case 10111:
				?>
				<legend>
		           <strong><font color="#666666">��§ҹ��ػ����������Ҫԡ Ἱ A+B  <!--?=$_GET['ftrcode']?--> </font></strong></legend>
				<?
				include("./comsn/report/rep_all_fast_team_comsnall.php");
				break;
			case 200:
				?>
				<legend>
		           <strong><font color="#666666">��§ҹ�����äӹǳἹ B</font></strong></legend>
				<?
				include("./comsn/report/rep_all_uni_pool_comsn.php");
				break;
			case 1000:
				?>
				<legend>
		           <strong><font color="#666666">��§ҹ�����äӹǳἹ B �ͺ��� <?=$_GET['ftrcode']?> </font></strong></legend>
				<?
				include("./comsn/report/rep_all_comsn_b.php");
				break;
			case 101:
				?>
				<legend>
		           <strong><font color="#666666">��§ҹ��ػ����������Ҫԡ </font></strong></legend>
				<?
				include("./comsn/report/rep_all_matching_comsn.php");
				break;
			case 22:

				?>
				<legend>
		           <strong><font color="#666666">��§ҹ��ػ����Ԫ���  All-sale</font></strong></legend>
				<?
				include("./comsn/com_b/rep_embonus.php");
				break;
			case 102:
				?>
				<legend>
		           <strong><font color="#666666">��§ҹ��ػ ����Ԫ������ </font></strong></legend>
				<?
				include("./comsn/report/rep_all_uni_pool_comsn1.php");
				break;
			case 25:
				?>
				<legend>
		           <strong><font color="#666666">�������ͺ��äӹǳ�ͺ��è���&nbsp;&nbsp;</font></strong>
                   <? if($acc->isAccess(2)){?>
                   <img border="0" src="./images/add.gif" alt="�����������ͺ��äӹǳ����Ԫ���Ἱ (A)" align="absmiddle" width="16" height="16" />&nbsp;&nbsp;<a href='./index.php?sessiontab=4&sub=25&state=2'>�����������ͺ��äӹǳ�ͺ��è���</a>
                   <? }?>
                </legend>
				<?
				include("./comsn/com_c/cround.php");
				break;
			case 26:
				?>
				<legend>
		           <strong><font color="#666666">�ӹǳ�ͺ��è���</font></strong></legend>
				<?
				include("./comsn/com_c/comsn_c_calc.php");
				break;
			case 27:
				?>
				<legend>
		           <strong><font color="#666666">ź��äӹǳ�ͺ��è���</font></strong></legend>
				<?
				include("./comsn/com_c/comsn_c_delete.php");
				break;
			case 28:
				?>
				<legend>
		           <strong><font color="#666666">��§ҹ��ػ�ͺ��è���</font></strong></legend>
				<?
				include("./comsn/com_c/rep_cmbonus_comsn.php");
				break;
			case 2828:
				?>
				<legend>
		           <strong><font color="#666666">��§ҹ��ػ�ͺ��è���</font></strong></legend>
				<?
				include("./comsn/com_c/rep_cmbonus_comsn_3.php");
				break;
			case 288:
				?>
				<legend>
		           <strong><font color="#666666">��§ҹ��ػ�ͺ��è���</font></strong></legend>
				<?
				include("./comsn/com_c/rep_cmbonus_comsn_5.php");
				break;
			case 282828 :
				?>
				<legend>
		           <strong><font color="#666666">��§ҹ��ػ�ͺ (��� ����/������) Ἱ A</font></strong></legend>
				<?
				include("./comsn/com_c/rep_cmbonus_comsn_4.php");
				break;
			case 34:
				?>

				<legend>
		           <strong><font color="#666666">��§ҹ��ػ�ͺ���������Ἱ A</font></strong></legend>
				<?
				include("./comsn/com_c/rep_cc_comsn.php");
				break;
			case 3434:
				?>

				<legend>
		           <strong><font color="#666666">��§ҹ��ػ�ͺ���������Ἱ A</font></strong></legend>
				<?
				include("./comsn/com_c/rep_cc_comsn_3.php");
				break;
			case 36:
				?>
				<legend>
		           <strong><font color="#666666">��§ҹ��ػ Pack File Ἱ A</font></strong></legend>
				<?
				include("./comsn/com_c/packfile.php");
				break;
			case 58:
				?>
				<legend>
		           <strong><font color="#666666">&#3619;&#3634;&#3618;&#3591;&#3634;&#3609;&#3619;&#3623;&#3617;&#3585;&#3634;&#3619;&#3592;&#3656;&#3634;&#3618; &#3588;&#3629;&#3617;&#3617;&#3636;&#3594;&#3594;&#3633;&#3656;&#3609; (Base Currency) </font></strong></legend>
				<?
				include("./comsn/com_c/re_packfile.php");
				break;
			case 65:
				?>
				<legend>
		           <strong><font color="#666666">
		           <?=$wording_lan["commission"]["stockist"]?>
		           </a></font></strong></legend>
				<?
				include("./comsn/com_b/rep_fmbonus_comsn.php");
				break;
			case 6:
				?>
				<legend>
		           <strong><font color="#666666">��������´����Ԫ��� Matching</font></strong></legend>
				<?
				include("./comsn/com_a/rep_dc_comsn.php");
				break;
			case 6565:
				?>
				<legend>
		           <strong><font color="#666666">
		           ��§ҹ��ػ����� key bonus
		           </a></font></strong></legend>
				<?
				include("./comsn/com_a/rep_fmbonus_comsn.php");
				break;

			case 48:

				?>
				<legend>
       			    <strong><font color="#666666"><?=$wording_lan["comb_pay"]?></font></strong>          
                </legend>
				<?
				include("./comsn/com_c/rep_cmbonus_comsn_44.php");
				break;
			case 49:
				?>
				<legend>
		           <strong><font color="#666666">�ӹǳ�ͺ��è���</font></strong></legend>
				<?
				include("./comsn/com_d/comsn_c_calc.php");
				break;
			case 50:
				?>
				<legend>
		           <strong><font color="#666666">ź��äӹǳ�ͺ��è���</font></strong></legend>
				<?
				include("./comsn/com_d/comsn_c_delete.php");
				break;
			case 51:
				?>
				<legend>
		           <strong><font color="#666666">��§ҹ��ػ�ͺ��è��� Ἱ B</font></strong></legend>
				<?
				include("./comsn/com_d/rep_cmbonus_comsn.php");
				break;
			case 52:
				?>
				<legend>
		           <strong><font color="#666666">��§ҹ��ػ Cap Adjust</font></strong></legend>
				<?
				include("./comsn/com_d/cap_adjust1.php");
				break;
			case 53:
				?>
				<legend>
		           <strong><font color="#666666">��§ҹ��ػ�ͺ���������Ἱ B</font></strong></legend>
				<?
				include("./comsn/com_d/rep_cc_comsn.php");
				break;
			case 142:
				?>
				<legend>
		           <strong><font color="#666666">��§ҹ����þҡ� (A)</font></strong></legend>
				<?
				include("./comsn/report/rep_all_fast_team_comsn2.php");
				break;
			case 54:
				?>
				<legend>
		           <strong><font color="#666666">��§ҹ��û�Ѻ���˹����õ���</font></strong></legend>
				<?
				include("./comsn/com_a/rep_newpositon1.php");
				break;
			case 55:
				?>
				<legend>
		           <strong><font color="#666666">��§ҹ�ʴ�ʶҹС�û�Ѻ���˹觢ͧ��Ҫԡ</font></strong></legend>
				<?
				include("./comsn/com_a/rep_newpositon2.php");
				break;
			case 56:
				?>
				<legend>
		           <strong><font color="#666666">��§ҹ�ʴ�ʶҹС�û�Ѻ���˹觢ͧ��Ҫԡ</font></strong></legend>
				<?
				include("./comsn/com_a/rep_newpositon3.php");
				break;
			case 57:
				?>
				<legend>
		           <strong><font color="#666666">��§ҹ��ػ��è�������</font></strong></legend>
				<?
				include("./comsn/com_a/rep_tax.php");
				break;
			case 115:
				?>
				<legend>
		           <strong><font color="#666666">&#3619;&#3634;&#3618;&#3591;&#3634;&#3609;&#3619;&#3623;&#3617;&#3585;&#3634;&#3619;&#3592;&#3656;&#3634;&#3618; &#3588;&#3629;&#3617;&#3617;&#3636;&#3594;&#3594;&#3633;&#3656;&#3609; (Local Currency)</font></strong></legend>
				<?
				include("./comsn/com_c/re_packfile_lb.php");
				break;
			case 117:
				?>
				<legend>
		           <strong><font color="#666666">��§ҹ��ػ����� ��Ҥ��� ���</font></strong></legend>
				<?
				include("./comsn/report/sale1.php");
				break;
			case 422:
				?>
				<legend>
		           <strong><font color="#666666">
		           ��������´����Ԫ��� Key Bonus
		           </a></font></strong></legend>
				<?
				include("./comsn/com_b/rep_fc_comsn.php");
				break;	
			case 2525:
				?>
				<legend>
		           <strong><font color="#666666">��§ҹ������������� Ἱ B</font></strong></legend>
				<?
				include("./comsn/com_b/rep_cmbonus_comsn_b.php");
				break;
			case 3636:
				?>
				<legend>
		           <strong><font color="#666666">��§ҹ��ػ Pack File Ἱ B</font></strong></legend>
				<?
				include("./comsn/com_b/packfile.php");
				break;
			case 901:
				?>
				<legend>
		           <strong><font color="#666666">��§ҹ��ػ��������Ԫ Mentor Bonus</font></strong></legend>
				<?
				include("./comsn/com_a/rep_ambonus3_comsn.php");
				break;
			case 902:
				?>
				</legend><legend>
		           <strong><font color="#666666">��§ҹ��������´����Ԫ Mentor Bonus</font></strong></legend>
				<?
				include("./comsn/com_a/rep_fast3_comsn.php");
				break;
			case 903:
				?>
				</legend><legend>
		           <strong><font color="#666666">��§ҹ��ػ��������Ԫ Pool 5% of UNLV Bonus</font></strong></legend>
				<?
				include("./comsn/com_b/rep_embonus_comsn.php");
				break;
			case 904:
				?>
				</legend><legend>
		           <strong><font color="#666666">��§ҹ��������´����Ԫ Pool 5% of UNLV Bonus</font></strong></legend>
				<?
				include("./comsn/com_b/rep_em_comsn.php");
				break;
			case 905:
				?>
				</legend><legend>
		           <strong><font color="#666666">��§ҹ��ػ��������Ԫ Rersonal Rebate Bonus</font></strong></legend>
				<?
				include("./comsn/com_b/rep_rmbonus1_comsn.php");
				break;
			case 906:
				?>
				</legend><legend>
		           <strong><font color="#666666">��§ҹ��ػ Travel Point</font></strong></legend>
				<?
				include("./comsn/com_b/rep_trip_comsn.php");
				break;
			case 907:
				?>
				</legend><legend>
		           <strong><font color="#666666">��§ҹ��ػ��������´ Travel Point</font></strong></legend>
				<?
				include("./comsn/com_b/rep_trip_pv_comsn.php");
				break;
			case 908:
				?>
				</legend><legend>
		           <strong><font color="#666666">��§ҹ��ػ��������Ԫ M90(2+2) Bonus</font></strong></legend>
				<?
				include("./comsn/com_b/rep_m90_comsn.php");
				break;
			case 909:
				?>
				</legend><legend>
		           <strong><font color="#666666">��§ҹ��ػ��������´ M90(2+2) Bonus</font></strong></legend>
				<?
				include("./comsn/com_b/rep_m90c_comsn.php");
				break;
			case 60:
				?>
				<legend>
		           <strong><font color="#666666">�������ͺ�������&nbsp;&nbsp;</font></strong>
                   <? if($acc->isAccess(2)){?>
                   <img border="0" src="./images/add.gif" alt="�����������ͺ�������" align="absmiddle" width="16" height="16" />&nbsp;&nbsp;<a href='./index.php?sessiontab=4&sub=60&state=2'>�����������ͺ�������</a>
                   <? }?>
                </legend>
				<?
				include("./comsn/com_t/tround1.php");
				break;
			case 146:
				?>
				<legend>
		           <strong><font color="#666666">��§ҹ Eautoship</font></strong></legend>
				<?
				include("eatoship_ato.php");
				break;
			case 116:
				?>
				<legend>
		           <strong><font color="#666666">�ӹǳ����Ԫ���Ἱ (Travel)</font></strong></legend>
				<?
				include("./comsn/com_t/comsn_t_calc.php");
				break;
			case 154:
                ?>
                <legend>
                   <strong><font color="#666666">��§ҹ Ewallet </font></strong></legend>
                <?
                include("ecom_ato.php");
                break;
			case 155:
                ?>
                <legend>
                   <strong><font color="#666666">��§ҹ Ecom to Ewallet</font></strong></legend>
                <?
                include("ecomtoewallet.php");
                break;
			case 3003:
				?>
				 <legend>
                   <strong><font color="#666666">��������´����Ԫ���  All-sale</font></strong></legend>
                <?
                include("./comsn/com_b/rep_sapv2_comsn.php");
                break;	
			}

			

?> 
</fieldset></td>
</tr></table>
<?
	}
?>