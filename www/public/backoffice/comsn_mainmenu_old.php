<?
	if(!isset($_GET['sub'])){
?>
<table border="0" cellspacing="0" cellpadding="0" width="100%" height="395">
	<tr>
		<td width="5%">&nbsp;</td>
		<td width="95%" align="left" valign="top"><table border="0" cellspacing="4" cellpadding="0" width="90%">
          <tr>
            <td  valign="top" colspan="2"><img src="images/comsn.gif" align="absmiddle" border="0" /><font size="+2" ><b>คอมมิชชั่น Commission</b></font><br />
                <br /></td >
          </tr>
          <tr>
            <td height="28" width="50%"><img src="images/user.gif" width="32" height="32" align="absmiddle" />&nbsp;<? echo  "<strong>รหัสผู้ใช้ :</strong> ".$_SESSION["adminusercode"]." <strong>ชื่อผู้ใช้ :</strong> ".$_SESSION["adminusername"]."<br /><br />";?> </td>
            <td align="right">&nbsp;</td>
          </tr>
          <tr>
          <td width="50%" height="40" valign="top"><table width="97%" border="1" bordercolor="#FF7F00" cellspacing="0" cellpadding="0">
                <tr>
                  <td colspan="2" background="./images/bar_box.gif">&nbsp;คอมมิชชั่นรายวัน</td>
                </tr>
                <tr>
                  <td colspan="2">&nbsp;</td>
                </tr>
				<tr>
                  <td align="right"><img src="./images/mon.gif" align="absmiddle"/>&nbsp;&nbsp;</td>
                  <td><strong>คำนวณคอมมิชชั่นแผน (A)</strong></td>
                </tr>
                <tr>
                  <td width="16%"  align="right">&nbsp;</td>
                  <td width="84%"><img src="./images/round_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=1">ข้อมูลรอบการคำนวณคอมมิชชั่นแผน (A)</a></td>
                </tr> 
                <tr>
                  <td  align="right">&nbsp;</td>
                  <td><img src="./images/cal_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=2">คำนวณคอมมิชชั่นแผน (A)</a></td>
                </tr>
            <? if($acc->isAccess(4)){   ?> <tr>
                  <td  align="right">&nbsp;</td>
                  <td><img src="./images/del_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=3">ลบการคำนวณคอมมิชชั่นแผน (A)</a></td>
                </tr> <? }?>
                <tr style="display:none">
                  <td  align="right"><img src="./images/folder.gif" align="absmiddle" />&nbsp;&nbsp;</td>
                  <td><strong>รายงานรายละเอียดคะแนนระหว่างวันที่</strong></td>
                </tr>
                <tr style="display:none">
                  <td  align="right">&nbsp;</td>
                  <td><img src="./images/rp_pay_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=4">รายงานรายละเอียดคะแนนคอมมิชชั่นผู้แนะนำ</a></td>
                </tr>
				<tr style="display:none">
                  <td  align="right">&nbsp;</td>
                  <td><img src="./images/rp_pay_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=5">รายงานรายละเอียดคะแนนบริหารทีมขาย</a></td>
                </tr>
				<tr style="display:none">
                  <td  align="right">&nbsp;</td>
                  <td><img src="./images/rp_pay_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=6">รายงานรายละเอียดคะแนนแมชชิ่ง</a></td>
                </tr>
                
			 <tr>
                  <td  align="right"><img src="./images/folder.gif" align="absmiddle" />&nbsp;&nbsp;</td>
                  <td><strong>รายงานสรุปรายได้ระหว่างวันที่</strong></td>
              </tr>
              <tr style="display:none">
                  <td  align="right">&nbsp;</td>
                  <td><img src="./images/rp_detail_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=46">รายงานสรุป Cap Adjust</a></td>
              </tr>
                <tr>
                  <td  align="right">&nbsp;</td>
                  <td><img src="./images/rp_detail_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=7">รายงานแสดงสถานะการปรับตำแหน่งของสมาชิก</a></td>
                </tr>
				<tr>
                  <td  align="right">&nbsp;</td>
                  <td><img src="./images/rp_detail_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=54">รายงานแสดงสถานะการปรับตำแหน่งของสมาชิก</a></td>
                </tr>
				<tr>
                  <td  align="right">&nbsp;</td>
                  <td><img src="./images/rp_detail_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=55">รายงานแสดงสถานะการปรับตำแหน่งของสมาชิก</a></td>
                </tr>
				<tr>
                  <td  align="right">&nbsp;</td>
                  <td><img src="./images/rp_detail_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=56">รายงานแสดงสถานะการปรับตำแหน่งของสมาชิก</a></td>
                </tr>
                <tr>
                  <td  align="right">&nbsp;</td>
                  <td><img src="./images/rp_detail_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=20">รายงานรักษายอด</a></td>
                </tr>
                <tr>
                  <td  align="right">&nbsp;</td>
                  <td><img src="./images/rp_pay_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=8">รายงานสรุปรายได้คอมมิชชั่นผู้แนะนำ</a></td>
                </tr>
                
				<tr>
                  <td  align="right">&nbsp;</td>
                  <td><img src="./images/rp_pay_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=9">รายงานสรุปรายได้คอมมิชชั่นบริหารทีมขาย</a></td>
                </tr>
				<tr>
				  <td  align="right">&nbsp;</td>
				  <td><a href="./index.php?sessiontab=<?=$sesstab?>&amp;sub=57"></a><img src="./images/rp_pay_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&amp;sub=100">&#3619;&#3634;&#3618;&#3591;&#3634;&#3609;&#3619;&#3623;&#3617;&#3585;&#3634;&#3619;&#3588;&#3635;&#3609;&#3623;&#3603; Cycle &#3649;&#3621;&#3632; FOB </a></td>
			  </tr>
				<tr style="display:none">
                  <td  align="right">&nbsp;</td>
                  <td><img src="./images/rp_pay_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=52">รายงานสรุปรายได้คอมมิชชั่นบริหา&#3619; BV </a></td>
                </tr>
				
               <tr  style="display:none">
                <td  align="right"><img src="./images/folder.gif" align="absmiddle" />&nbsp;&nbsp;</td>
                <td><strong>รายงานรายละเอียดคะแนน สาขา</strong></td>
              </tr>
              <tr  style="display:none">
                <td  align="right">&nbsp;</td>
                <td><img src="./images/rp_detail_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=41">รายละเอียดคะแนน</a></td>
              </tr>
               <tr  style="display:none">
                <td  align="right">&nbsp;</td>
                <td><img src="./images/rp_detail_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=43">รายละเอียดบิล</a></td>
              </tr>
              <tr style="display:none">
                <td  align="right"><img src="./images/folder.gif" align="absmiddle" />&nbsp;&nbsp;</td>
                <td><strong>รายงานสรุปรายได้ สาขา</strong></td>
              </tr>
              <tr style="display:none">
                <td  align="right">&nbsp;</td>
                <td><img src="./images/rp_detail_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=42">รายงานสรุปรายได้</a></td>
              </tr>
            </table>
			
            <br>
            <br>
            <table width="97%" border="1" bordercolor="#FF7F00" cellspacing="0" cellpadding="0">
              <tr>
                <td colspan="2" background="./images/bar_box.gif">&nbsp;&#3588;&#3635;&#3609;&#3623;&#3603;&#3619;&#3629;&#3610;&#3585;&#3634;&#3619;&#3592;&#3656;&#3634;&#3618;</td>
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
              <tr>
                <td  align="right">&nbsp;</td>
                <td><img src="./images/del_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=27">&#3621;&#3610;&#3585;&#3634;&#3619;&#3588;&#3635;&#3609;&#3623;&#3603;&#3619;&#3629;&#3610;&#3585;&#3634;&#3619;&#3592;&#3656;&#3634;&#3618;</a></td>
              </tr>
              <? } ?>
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
              <tr>
                <td  align="right"><img src="./images/folder.gif" align="absmiddle" />&nbsp;&nbsp;</td>
                <td><strong>&#3619;&#3634;&#3618;&#3591;&#3634;&#3609;&#3626;&#3619;&#3640;&#3611;&#3619;&#3629;&#3610;&#3585;&#3634;&#3619;&#3592;&#3656;&#3634;&#3618;</strong></td>
              </tr>
              <tr style="display:none">
                <td  align="right">&nbsp;</td>
                <td><img src="./images/rp_detail_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=47">&#3619;&#3634;&#3618;&#3591;&#3634;&#3609;&#3626;&#3619;&#3640;&#3611; Cap Adjust</a></td>
              </tr>
              <tr>
                <td  align="right">&nbsp;</td>
                <td><img src="./images/rp_detail_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=28">&#3619;&#3634;&#3618;&#3591;&#3634;&#3609;&#3626;&#3619;&#3640;&#3611;&#3619;&#3629;&#3610;&#3585;&#3634;&#3619;&#3592;&#3656;&#3634;&#3618;</a></td>
              </tr>
              <tr>
                <td  align="right">&nbsp;</td>
                <td><img src="./images/rp_detail_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=34">&#3619;&#3634;&#3618;&#3591;&#3634;&#3609;&#3626;&#3619;&#3640;&#3611;&#3619;&#3629;&#3610;&#3585;&#3634;&#3619;&#3652;&#3617;&#3656;&#3592;&#3656;&#3634;&#3618;</a></td>
              </tr>
              <tr>
                <td  align="right">&nbsp;</td>
                <td><img src="./images/rp_detail_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=36">&#3619;&#3634;&#3618;&#3591;&#3634;&#3609;&#3626;&#3619;&#3640;&#3611; Pack File</a></td>
              </tr>
 <tr>
                <td  align="right">&nbsp;</td>
                <td><img src="./images/rp_detail_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=58">&#3619;&#3634;&#3618;&#3591;&#3634;&#3609;&#3619;&#3623;&#3617;&#3585;&#3634;&#3619;&#3592;&#3656;&#3634;&#3618; &#3588;&#3629;&#3617;&#3617;&#3636;&#3594;&#3594;&#3633;&#3656;&#3609; </a></td>
              </tr>
              <!--<tr>
                  <td  align="right">&nbsp;</td>
                  <td><img src="./images/rp_pay_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=19">&#3619;&#3634;&#3618;&#3591;&#3634;&#3609;&#3588;&#3629;&#3617;&#3617;&#3636;&#3594;&#3594;&#3633;&#3656;&#3609; &#3619;&#3634;&#3618;&#3652;&#3604;&#3657;&#3595;&#3639;&#3657;&#3629;&#3619;&#3633;&#3585;&#3625;&#3634;&#3618;&#3629;&#3604;</a></td>
                </tr-->
            </table>
            <br></td>
            <td width="50%" height="50" valign="top"><table  width="97%"  border="1" bordercolor="#FF7F00" cellspacing="0" cellpadding="0">
              <tr>
                <td colspan="2" background="./images/bar_box.gif">&nbsp;&#3588;&#3629;&#3617;&#3617;&#3636;&#3594;&#3594;&#3633;&#3656;&#3609;&#3619;&#3634;&#3618;&#3648;&#3604;&#3639;&#3629;&#3609;</td>
              </tr>
              <tr>
                <td colspan="2">&nbsp;</td>
              </tr>
              <tr>
                <td align="right"><img src="./images/mon.gif" align="absmiddle"/>&nbsp;&nbsp;</td>
                <td><strong>&#3588;&#3635;&#3609;&#3623;&#3603;&#3588;&#3629;&#3617;&#3617;&#3636;&#3626;&#3594;&#3633;&#3656;&#3609;&#3649;&#3612;&#3609; (B)</strong></td>
              </tr>
              <tr>
                <td width="16%"  align="right">&nbsp;</td>
                <td width="84%"><img src="./images/round_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=11">&#3586;&#3657;&#3629;&#3617;&#3641;&#3621;&#3619;&#3629;&#3610;&#3585;&#3634;&#3619;&#3588;&#3635;&#3609;&#3623;&#3603;&#3588;&#3629;&#3617;&#3617;&#3636;&#3626;&#3594;&#3633;&#3656;&#3609;&#3649;&#3612;&#3609; (B)</a></td>
              </tr>
              <tr>
                <td  align="right">&nbsp;</td>
                <td><img src="./images/cal_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=12">&#3588;&#3635;&#3609;&#3623;&#3603;&#3588;&#3629;&#3617;&#3617;&#3636;&#3626;&#3594;&#3633;&#3656;&#3609;&#3649;&#3612;&#3609; (B)</a></td>
              </tr>
              <tr>
                <td  align="right">&nbsp;</td>
                <td><img src="./images/del_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=13">&#3621;&#3610;&#3585;&#3634;&#3619;&#3588;&#3635;&#3609;&#3623;&#3603;&#3588;&#3629;&#3617;&#3617;&#3636;&#3626;&#3594;&#3633;&#3656;&#3609;&#3649;&#3612;&#3609; (B)</a></td>
              </tr>
              <tr style="display:none">
                <td  align="right"><img src="./images/folder.gif" align="absmiddle" />&nbsp;&nbsp;</td>
                <td><strong>&#3619;&#3634;&#3618;&#3591;&#3634;&#3609;&#3619;&#3634;&#3618;&#3621;&#3632;&#3648;&#3629;&#3637;&#3618;&#3604;&#3588;&#3632;&#3649;&#3609;&#3609;</strong></td>
              </tr>
              <tr style="display:none">
                <td  align="right">&nbsp;</td>
                <td><img src="./images/rp_detail_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=21">&#3619;&#3634;&#3618;&#3591;&#3634;&#3609;&#3619;&#3633;&#3585;&#3625;&#3634;&#3618;&#3629;&#3604;(&#3619;&#3634;&#3618;&#3648;&#3604;&#3639;&#3629;&#3609;)</a></td>
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
                <td><img src="./images/rp_pay_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=15">&#3619;&#3634;&#3618;&#3591;&#3634;&#3609;&#3619;&#3634;&#3618;&#3621;&#3632;&#3648;&#3629;&#3637;&#3618;&#3604;&#3626;&#3619;&#3640;&#3611;&#3619;&#3634;&#3618;&#3652;&#3604;&#3657;&#3585;&#3629;&#3591;&#3607;&#3640;&#3609;</a></td>
              </tr>
              <tr>
                <td  align="right"><img src="./images/folder.gif" align="absmiddle" />&nbsp;&nbsp;</td>
                <td><strong>&#3619;&#3634;&#3618;&#3591;&#3634;&#3609;&#3626;&#3619;&#3640;&#3611;&#3619;&#3634;&#3618;&#3652;&#3604;&#3657;</strong></td>
              </tr>

              <tr style="display:none" >
                <td  align="right">&nbsp;</td>
                <td><img src="./images/rp_detail_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=17">&#3619;&#3634;&#3618;&#3591;&#3634;&#3609;&#3626;&#3619;&#3640;&#3611;&#3619;&#3634;&#3618;&#3652;&#3604;&#3657; UNILEVEL </a></td>
              </tr>
              <tr  style="display:none">
                <td  align="right">&nbsp;</td>
                <td><img src="./images/rp_pay_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=18">&#3619;&#3634;&#3618;&#3591;&#3634;&#3609;&#3626;&#3619;&#3640;&#3611;&#3619;&#3634;&#3618;&#3652;&#3604;&#3657;&#3585;&#3629;&#3591;&#3607;&#3640;&#3609;</a></td>
              </tr>
              <tr  style="display:none">
                <td  align="right">&nbsp;</td>
                <td><img src="./images/rp_pay_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=22">&#3619;&#3634;&#3618;&#3591;&#3634;&#3609;&#3626;&#3619;&#3640;&#3611;&#3619;&#3634;&#3618;&#3652;&#3604;&#3657; Unilevel+&#3585;&#3629;&#3591;&#3607;&#3640;&#3609;</a></td>
              </tr>
			   <tr >
                <td  align="right">&nbsp;</td>
                <td><img src="./images/rp_pay_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=143">&#3619;&#3634;&#3618;&#3591;&#3634;&#3609; Star BONUS </a></td>
              </tr>
			  <tr  >
                  <td  align="right">&nbsp;</td>
                  <td><img src="./images/rp_pay_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=10">รายงานสรุปรายได้คอมมิชชั่นแมชชิ่ง</a></td>
                </tr>
			   <tr >
                <td  align="right">&nbsp;</td>
                <td><img src="./images/rp_pay_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=18">&#3619;&#3634;&#3618;&#3591;&#3634;&#3609; ONE TIME BONUS </a></td>
              </tr>
              <!--<tr>
                  <td  align="right">&nbsp;</td>
                  <td><img src="./images/rp_pay_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=19">&#3619;&#3634;&#3618;&#3591;&#3634;&#3609;&#3588;&#3629;&#3617;&#3617;&#3636;&#3594;&#3594;&#3633;&#3656;&#3609; &#3619;&#3634;&#3618;&#3652;&#3604;&#3657;&#3595;&#3639;&#3657;&#3629;&#3619;&#3633;&#3585;&#3625;&#3634;&#3618;&#3629;&#3604;</a></td>
                </tr-->
            </table>
              <br>
              <table width="97%" border="1" bordercolor="#FF7F00" cellspacing="0" cellpadding="0">
                <tr>
                  <td colspan="2" background="./images/bar_box.gif">&nbsp;&#3588;&#3635;&#3609;&#3623;&#3603;&#3619;&#3629;&#3610;&#3585;&#3634;&#3619;&#3592;&#3656;&#3634;&#3618;</td>
                </tr>
                <tr>
                  <td colspan="2">&nbsp;</td>
                </tr>
                <tr>
                  <td align="right"><img src="./images/mon.gif" align="absmiddle"/>&nbsp;&nbsp;</td>
                  <td><strong>&#3588;&#3635;&#3609;&#3623;&#3603;&#3619;&#3629;&#3610;&#3585;&#3634;&#3619;&#3592;&#3656;&#3634;&#3618;(&#3649;&#3612;&#3609; B)</strong></td>
                </tr>
                <tr>
                  <td width="16%"  align="right">&nbsp;</td>
                  <td width="84%"><img src="./images/round_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=48">&#3586;&#3657;&#3629;&#3617;&#3641;&#3621;&#3619;&#3629;&#3610;&#3585;&#3634;&#3619;&#3588;&#3635;&#3609;&#3623;&#3603;&#3619;&#3629;&#3610;&#3585;&#3634;&#3619;&#3592;&#3656;&#3634;&#3618;</a></td>
                </tr>
                <? if($acc->isAccess(4)){   ?>
                <tr>
                  <td  align="right">&nbsp;</td>
                  <td><img src="./images/cal_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=49">&#3588;&#3635;&#3609;&#3623;&#3603;&#3619;&#3629;&#3610;&#3585;&#3634;&#3619;&#3592;&#3656;&#3634;&#3618;</a></td>
                </tr>
                <? }?>
                <? if($acc->isAccess(4)){ ?>
                <tr>
                  <td  align="right">&nbsp;</td>
                  <td><img src="./images/del_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=50">&#3621;&#3610;&#3585;&#3634;&#3619;&#3588;&#3635;&#3609;&#3623;&#3603;&#3619;&#3629;&#3610;&#3585;&#3634;&#3619;&#3592;&#3656;&#3634;&#3618;</a></td>
                </tr>
                <? } ?>
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
                <tr>
                  <td  align="right"><img src="./images/folder.gif" align="absmiddle" />&nbsp;&nbsp;</td>
                  <td><strong>&#3619;&#3634;&#3618;&#3591;&#3634;&#3609;&#3626;&#3619;&#3640;&#3611;&#3619;&#3629;&#3610;&#3585;&#3634;&#3619;&#3592;&#3656;&#3634;&#3618;</strong></td>
                </tr>
                <tr style="display:none">
                  <td  align="right">&nbsp;</td>
                  <td><img src="./images/rp_detail_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=52">&#3619;&#3634;&#3618;&#3591;&#3634;&#3609;&#3626;&#3619;&#3640;&#3611; Cap Adjust</a></td>
                </tr>
                <tr>
                  <td  align="right">&nbsp;</td>
                  <td><img src="./images/rp_detail_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=51">&#3619;&#3634;&#3618;&#3591;&#3634;&#3609;&#3626;&#3619;&#3640;&#3611;&#3619;&#3629;&#3610;&#3585;&#3634;&#3619;&#3592;&#3656;&#3634;&#3618;</a></td>
                </tr>
                <tr>
                  <td  align="right">&nbsp;</td>
                  <td><img src="./images/rp_detail_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=53">&#3619;&#3634;&#3618;&#3591;&#3634;&#3609;&#3626;&#3619;&#3640;&#3611;&#3619;&#3629;&#3610;&#3585;&#3634;&#3619;&#3652;&#3617;&#3656;&#3592;&#3656;&#3634;&#3618;</a></td>
                </tr>
                <tr>
                  <td  align="right">&nbsp;</td>
                  <td><img src="./images/rp_detail_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=37">&#3619;&#3634;&#3618;&#3591;&#3634;&#3609;&#3626;&#3619;&#3640;&#3611; Pack File</a></td>
                </tr>
                <!--<tr>
                  <td  align="right">&nbsp;</td>
                  <td><img src="./images/rp_pay_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=19">&#3619;&#3634;&#3618;&#3591;&#3634;&#3609;&#3588;&#3629;&#3617;&#3617;&#3636;&#3594;&#3594;&#3633;&#3656;&#3609; &#3619;&#3634;&#3618;&#3652;&#3604;&#3657;&#3595;&#3639;&#3657;&#3629;&#3619;&#3633;&#3585;&#3625;&#3634;&#3618;&#3629;&#3604;</a></td>
                </tr-->
              </table></td>
          </tr>
          <tr height=10>
          	<td></td>
          	<td></td>
          </tr>
	<tr>


  </table>
 <table width="100%"> <tr><td colspan="3">&nbsp;</td></tr>
				<tr>
				  <td align="center">&nbsp;</td>
				  <td width="86%" align="left">
                  <fieldset><legend><b>รายงานสรุปการจ่าย ผลประโยชน์</b></legend>
                  <table width="100%" border="0" bordercolor="#FF7F00" cellspacing="0" cellpadding="0">
                  	<tr><td>&nbsp;</td>
                  	  <td>&nbsp;</td>
               	    <td>&nbsp;</td></tr>
                    <tr>

                      <td width="1%">&nbsp;</td>
                      <td width="50%"><img src="./images/report.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&amp;sub=57">&#3619;&#3634;&#3618;&#3591;&#3634;&#3609;&#3626;&#3619;&#3640;&#3611;&#3585;&#3634;&#3619;&#3592;&#3656;&#3634;&#3618;&#3616;&#3634;&#3625;&#3637;<br>
                      </a><br>
                        <!--<img src="./images/report.gif" align="absmiddle" border="0" />&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&amp;sub=142">รายงานส่งสรรพากร (A)--><br>
                      </a><img src="./images/report.gif" align="absmiddle" /><a href="./index.php?sessiontab=<?=$sesstab?>&amp;sub=112"> รายงานสรุปรายได้ตามสมาชิกแผน (A)รายรอบ</a></td>
                      <td width="50%" ><img src="./images/report.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&amp;sub=101">&#3619;&#3634;&#3618;&#3591;&#3634;&#3609;&#3626;&#3619;&#3640;&#3611;&#3619;&#3634;&#3618;&#3652;&#3604;&#3657;&#3605;&#3634;&#3617;&#3626;&#3617;&#3634;&#3594;&#3636;&#3585;&#3649;&#3612;&#3609;  matching</a><br>
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
<td width="50">
<a href="javascript:history.back()"><img border="0" src="./images/back.gif" height="40" width="40" alt="เมนูคอมมิชชั่น" /></a>
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
		           <strong><font color="#666666">ข้อมูลรอบการคำนวณคอมมิชชั่นแผน (A)&nbsp;&nbsp;</font></strong>
                   <? if($acc->isAccess(2)){?>
                   <img border="0" src="./images/add.gif" alt="เพิ่มข้อมูลรอบการคำนวณคอมมิชชั่นแผน (A)" align="absmiddle" width="16" height="16" />&nbsp;&nbsp;<a href='./index.php?sessiontab=4&sub=1&state=2'>เพิ่มข้อมูลรอบการคำนวณคอมมิชชั่นแผน (A)</a>
					&nbsp;&nbsp;||&nbsp;&nbsp;<!--<a href='./index.php?sessiontab=4&sub=1&state=3'>Auto เพิ่มรอบ (A)</a>
                   --><? }?>
                </legend>
				<?
				include("./comsn/com_a/around.php");
				break;
			case 2:
				?>
				<legend>
		           <strong><font color="#666666">คำนวณคอมมิชชั่นแผน (A)</font></strong></legend>
				<?
				include("./comsn/com_a/comsn_a_calc.php");
				break;
			case 3:
				?>
				<legend>
		           <strong><font color="#666666">ลบการคำนวณคอมมิชชั่นแผน (A)</font></strong></legend>
				<?
				include("./comsn/com_a/comsn_a_delete.php");
				break;
			case 4:
				?>
				<legend>
		           <strong><font color="#666666">รายงานรายละเอียดคะแนนคอมมิชชั่นผู้แนะนำ</font></strong></legend>
				<?
				include("./comsn/com_a/rep_fast_comsn.php");
				break;
			case 5:
				?>
				<legend>
		           <strong><font color="#666666">รายงานรายละเอียดคะแนนบริหารทีมขาย</font></strong></legend>
				<?
				include("./comsn/com_a/rep_bc_comsn.php");
				break;
			case 6:
				?>
				<legend>
		           <strong><font color="#666666">รายงานรายละเอียดคะแนนแมชชิ่ง</font></strong></legend>
				<?
				include("./comsn/com_a/rep_dc_comsn.php");
				break;
			case 7:
				?>
				<legend>
		           <strong><font color="#666666">รายงานแสดงสถานะการปรับตำแหน่งของสมาชิก</font></strong></legend>
				<?
				include("./comsn/com_a/rep_newpositon.php");
				break;
			case 8:
				?>
				<legend>
		           <strong><font color="#666666">รายงานสรุปรายได้คอมมิชชั่นผู้แนะนำ</font></strong></legend>
				<?
				include("./comsn/com_a/rep_ambonus_comsn.php");
				break;
			case 9:
				?>
				<legend>
		           <strong><font color="#666666">รายงานสรุปรายได้คอมมิชชั่นบริหารทีมขาย</font></strong></legend>
				<?
				include("./comsn/com_a/rep_bmbonus_comsn.php");
				break;
			case 10:
				?>
				<legend>
		           <strong><font color="#666666">รายงานสรุปรายได้คอมมิชชั่นแมชชิ่ง</font></strong></legend>
				<?
				include("./comsn/com_a/rep_dmbonus_comsn.php");
				break;
			case 11:
				?>
				<legend>

		           <strong><font color="#666666">ข้อมูลรอบการคำนวณคอมมิสชั่นแผน (B)</font></strong>
                   <? if($acc->isAccess(2)){?>
                   <img border="0" src="./images/add.gif" alt="เพิ่มข้อมูลรอบการคำนวณคอมมิสชั่นแผน (B)" align="absmiddle" width="16" height="16" />&nbsp;&nbsp;<a href='./index.php?sessiontab=4&sub=11&state=2'>เพิ่มข้อมูลรอบการคำนวณคอมมิสชั่นแผน (B)</a>
                   <? }?>
                </legend>
				<?
				include("./comsn/com_b/bround.php");
				break;
			case 12:
				?>
				<legend>
		           <strong><font color="#666666">คำนวณคอมมิสชั่นแผน (B)</font></strong></legend>
				<?
				include("./comsn/com_b/comsn_b_calc.php");
				break;
			case 13:
				?>
				<legend>
		           <strong><font color="#666666">ลบการคำนวณคอมมิสชั่นแผน (B)</font></strong></legend>
				<?
				include("./comsn/com_b/comsn_b_delete.php");
				break;
			case 14:
				?>
				<legend>
		           <strong><font color="#666666">รายละเอียดคะแนน ALL SALE</font></strong></legend>
				<?
				include("./comsn/com_b/rep_bc_comsn.php");
				break;
			case 15:
				?>
				<legend>
		           <strong><font color="#666666">รายละเอียดคะแนน Pool Bonus</font></strong></legend>
				<?
				include("./comsn/com_b/rep_pc_comsn.php");
				break;
			case 16:
				?>
				<legend>
		           <strong><font color="#666666">รายงานรายละเอียดสรุปรายได้กองทุน</font></strong></legend>
				<?
				include("./comsn/com_b/rep_pm_comsn.php");
				break;
			case 17:
				?>
				<legend>
		           <strong><font color="#666666">รายงานสรุปรายได้ ALL SALE</font></strong></legend>
				<?
				include("./comsn/com_b/rep_bmbonus_comsn.php");
				break;
			case 18:
				?>
				<legend>
		           <strong><font color="#666666">รายงานสรุปรายได้ ONE TIME BONUS</font></strong></legend>
				<?
				include("./comsn/com_b/rep_pmbonus_comsn.php");
				break;
			case 19:
				?>
				<legend>
		           <strong><font color="#666666">รายงานคอมมิชชั่น รายได้ Rebate</font></strong></legend>
				<?
				include("./comsn/com_b/rep_personalbonus_comsn.php");
				break;
			case 20:
				?>
				<legend>
		           <strong><font color="#666666">รายงานซื้อรักษายอด</font></strong></legend>
				<?
				include("./comsn/com_a/rep_status_comsn.php");
				break;
			case 21:
				?>
				<legend>
		           <strong><font color="#666666">รายงานซื้อรักษายอด</font></strong></legend>
				<?
				include("./comsn/com_b/rep_status_comsn.php");
				break;
			
			case 100:
				?>
				<legend>
		           <strong><font color="#666666">&#3619;&#3634;&#3618;&#3591;&#3634;&#3609;&#3619;&#3623;&#3617;&#3585;&#3634;&#3619;&#3588;&#3635;&#3609;&#3623;&#3603; Cycle &#3649;&#3621;&#3632; FOB </font></strong></legend>
				<?
				include("./comsn/report/rep_all_fast_team_comsn.php");
				break;
			case 101:
				?>
				<legend>
		           <strong><font color="#666666">รายงานสรุปรายได้ตามสมาชิกแผน (B) </font></strong></legend>
				<?
				//include("./comsn/report/rep_all_uni_pool_comsn.php");
			
				include("./comsn/report/rep_all_matching_comsn.php");
				break;
			case 22:

				?>
				<legend>
		           <strong><font color="#666666">รายงานสรุปรายได้ MTA+กองทุน</font></strong></legend>
				<?
				include("./comsn/com_b/rep_pmbonus_comsn1.php");
				break;
			case 102:
				?>
				<legend>
		           <strong><font color="#666666">รายงานสรุป คอมมิชชั่นรวม </font></strong></legend>
				<?
				include("./comsn/report/rep_all_uni_pool_comsn1.php");
				break;
			case 25:
				?>
				<legend>
		           <strong><font color="#666666">ข้อมูลรอบการคำนวณรอบการจ่าย&nbsp;&nbsp;</font></strong>
                   <? if($acc->isAccess(2)){?>
                   <img border="0" src="./images/add.gif" alt="เพิ่มข้อมูลรอบการคำนวณคอมมิชชั่นแผน (A)" align="absmiddle" width="16" height="16" />&nbsp;&nbsp;<a href='./index.php?sessiontab=4&sub=25&state=2'>เพิ่มข้อมูลรอบการคำนวณรอบการจ่าย</a>
                   <? }?>
                </legend>
				<?
				include("./comsn/com_c/cround.php");
				break;
			case 26:
				?>
				<legend>
		           <strong><font color="#666666">คำนวณรอบการจ่าย</font></strong></legend>
				<?
				include("./comsn/com_c/comsn_c_calc.php");
				break;
			case 27:
				?>
				<legend>
		           <strong><font color="#666666">ลบการคำนวณรอบการจ่าย</font></strong></legend>
				<?
				include("./comsn/com_c/comsn_c_delete.php");
				break;
			case 28:
				?>
				<legend>
		           <strong><font color="#666666">รายงานสรุปรอบการจ่าย</font></strong></legend>
				<?
				include("./comsn/com_c/rep_cmbonus_comsn.php");
				break;
			
			case 29:
				?>
				<legend>
		           <strong><font color="#666666">ข้อมูลรอบการคำนวณรอบการจ่าย&nbsp;&nbsp;</font></strong>
                   <? if($acc->isAccess(2)){?>
                   <img border="0" src="./images/add.gif" alt="เพิ่มข้อมูลรอบการคำนวณคอมมิชชั่นแผน (B)" align="absmiddle" width="16" height="16" />&nbsp;&nbsp;<a href='./index.php?sessiontab=4&sub=25&state=2'>เพิ่มข้อมูลรอบการคำนวณรอบการจ่าย</a>
                   <? }?>
                </legend>
				<?
				include("./comsn/com_p/pround.php");
				break;
			case 30:
				?>
				<legend>
		           <strong><font color="#666666">คำนวณรอบการจ่าย</font></strong></legend>
				<?
				include("./comsn/com_p/comsn_p_calc.php");
				break;
			case 31:
				?>
				<legend>
		           <strong><font color="#666666">ลบการคำนวณรอบการจ่าย</font></strong></legend>
				<?
				include("./comsn/com_p/comsn_p_delete.php");
				break;
			case 33:
				?>
				<legend>
		           <strong><font color="#666666">รายงานสรุปรอบการจ่าย</font></strong></legend>
				<?
				include("./comsn/com_p/rep_pmbonus_comsn.php");
				break;
			case 34:
				?>

				<legend>
		           <strong><font color="#666666">รายงานสรุปรอบการไม่จ่ายแผน A</font></strong></legend>
				<?
				include("./comsn/com_c/rep_cc_comsn.php");
				break;
			case 35:
				?>
				<legend>
		           <strong><font color="#666666">รายงานสรุปรอบการจ่ายแผน B</font></strong></legend>
				<?
				include("./comsn/com_p/rep_pp_comsn.php");
				break;
			case 36:
				?>
				<legend>
		           <strong><font color="#666666">รายงานสรุป Pack File แผน A</font></strong></legend>
				<?
				include("./comsn/com_c/packfile.php");
				break;
			case 37:
				?>
				<legend>
		           <strong><font color="#666666">รายงานสรุป Pack File แผน B</font></strong></legend>
				<?
				include("./comsn/com_p/packfile.php");
				break;
			case 58:
				?>
				<legend>
		           <strong><font color="#666666">&#3619;&#3634;&#3618;&#3591;&#3634;&#3609;&#3619;&#3623;&#3617;&#3585;&#3634;&#3619;&#3592;&#3656;&#3634;&#3618; &#3588;&#3629;&#3617;&#3617;&#3636;&#3594;&#3594;&#3633;&#3656;&#3609; </font></strong></legend>
				<?
				include("./comsn/com_c/re_packfile.php");
				break;
			case 111:
				?>
				<legend>
		           <strong><font color="#666666">รายงานสรุป Travel Point</font></strong></legend>
				<?
				include("./comsn/report/point.php");
				break;
			case 112:
				?>
				<legend>
		           <strong><font color="#666666">รายรอบ</font></strong></legend>
				<?
				include("./comsn/report/rep_all_fast_team_comsn1.php");
				break;
			case 38:
				?>
				<legend>
		           <strong><font color="#666666">ข้อมูลรอบการคำนวณคอมมิชชั่นแผน (C)&nbsp;&nbsp;</font></strong>
                   <? if($acc->isAccess(2)){?>
                   <img border="0" src="./images/add.gif" alt="เพิ่มข้อมูลรอบการคำนวณคอมมิชชั่นแผน (C)" align="absmiddle" width="16" height="16" />&nbsp;&nbsp;<a href='./index.php?sessiontab=4&sub=38&state=2'>เพิ่มข้อมูลรอบการคำนวณคอมมิชชั่นแผน (C)</a>
                   <? }?>
                </legend>
				<?
				include("./comsn/com_f/bround.php");
				break;
			case 39:
				?>
				<legend>
		           <strong><font color="#666666">คำนวณคอมมิชชั่นแผน (C)</font></strong></legend>
				<?
				include("./comsn/com_f/comsn_b_calc.php");
				break;
			case 40:
				?>

				<legend>
		           <strong><font color="#666666">ลบการคำนวณคอมมิชชั่นแผน (C)</font></strong></legend>
				<?
				include("./comsn/com_f/comsn_b_delete.php");
				break;
			case 41:
				?>
				<legend>
		           <strong><font color="#666666">รายละเอียดคะแนนคอมมิชชั่นแผน (C)</font></strong></legend>
				<?
				include("./comsn/com_f/rep_bc_comsn.php");
				break;
			case 42:
				?>
				<legend>
		           <strong><font color="#666666">ลบการคำนวณคอมมิชชั่นแผน (C)</font></strong></legend>
				<?
				include("./comsn/com_f/rep_bmbonus_comsn.php");
				break;
			case 43:
				?>
				<legend>
		           <strong><font color="#666666">รายละเอียดบิลแผน (C)</font></strong></legend>
				<?
				include("./comsn/com_f/rep_dc_comsn.php");
				break;
			case 44:
				?>
				<legend>
		           <strong><font color="#666666">ข้อมูลรอบโปรโมชั่น&nbsp;&nbsp;</font></strong>
                   <? if($acc->isAccess(2)){?>
                   <img border="0" src="./images/add.gif" alt="เพิ่มข้อมูลรอบโปรโมชั่น" align="absmiddle" width="16" height="16" />&nbsp;&nbsp;<a href='./index.php?sessiontab=4&sub=44&state=2'>เพิ่มข้อมูลรอบโปรโมชั่น</a>
                   <? }?>
                </legend>
				<?
				include("./comsn/com_t/tround.php");
				break;
			case 45:
				?>
				<legend>
		           <strong><font color="#666666">รายงานการจับคู่ในแต่ละเดือนของ EP</font></strong></legend>
				<?
				include("./comsn/com_a/rep_ep.php");
				break;
			case 46:
				?>
				<legend>
		           <strong><font color="#666666">รายงานสรุป Cap Adjust</font></strong></legend>
				<?
				include("./comsn/com_a/cap_adjust.php");
				break;
			case 47:
				?>
				<legend>
		           <strong><font color="#666666">รายงานสรุป Cap Adjust</font></strong></legend>
				<?
				include("./comsn/com_a/cap_adjust1.php");
				break;

			/*case 48:
				?>
				<legend>
		           <strong><font color="#666666">รายงานสรุป Matching</font></strong></legend>
				<?
				include("./comsn/com_a/rep_dmbonus1.php");
				break;*/
			case 48:
				?>
				<legend>
		           <strong><font color="#666666">ข้อมูลรอบการคำนวณรอบการจ่าย&nbsp;&nbsp;</font></strong>
                   <? if($acc->isAccess(2)){?>
                   <img border="0" src="./images/add.gif" alt="เพิ่มข้อมูลรอบการคำนวณคอมมิชชั่นแผน (A)" align="absmiddle" width="16" height="16" />&nbsp;&nbsp;<a href='./index.php?sessiontab=4&sub=48&state=2'>เพิ่มข้อมูลรอบการคำนวณรอบการจ่าย</a>
                   <? }?>
                </legend>
				<?
				include("./comsn/com_d/cround.php");
				break;
			/*case 49:
				?>
				<legend>
		           <strong><font color="#666666">รายงานสรุป Autoship</font></strong></legend>
				<?
				include("./comsn/com_a/rep_gmbonus.php");
				break;
			case 50:
				?>
				<legend>
		           <strong><font color="#666666">รายงานสรุปรายได้คอมมิชชั่นผู้แนะนำ</font></strong></legend>
				<?
				include("./comsn/com_b/rep_ambonus_comsn.php");
				break;
			case 51:
				?>
				<legend>
		           <strong><font color="#666666">รายงานรายละเอียดคะแนนคอมมิชชั่นผู้แนะนำ</font></strong></legend>
				<?
				include("./comsn/com_b/rep_fast_comsn.php");
				break;
			case 52:
				?>
				<legend>
		           <strong><font color="#666666">รายงานสรุปรายได้คอมมิชชั่นบริหารทีมขาย BV</font></strong></legend>
				<?
				include("./comsn/com_a/rep_bmbonus_comsn1.php");
				break;
			case 53:
				?>
				<legend>
		           <strong><font color="#666666">รายงานรายละเอียดคะแนนบริหารทีมขาย</font></strong></legend>
				<?
				include("./comsn/com_a/rep_bc_comsn1.php");
				break;*/
			case 49:
				?>
				<legend>
		           <strong><font color="#666666">คำนวณรอบการจ่าย</font></strong></legend>
				<?
				include("./comsn/com_d/comsn_c_calc.php");
				break;
			case 50:
				?>
				<legend>
		           <strong><font color="#666666">ลบการคำนวณรอบการจ่าย</font></strong></legend>
				<?
				include("./comsn/com_d/comsn_c_delete.php");
				break;
			case 51:
				?>
				<legend>
		           <strong><font color="#666666">รายงานสรุปรอบการจ่าย</font></strong></legend>
				<?
				include("./comsn/com_d/rep_cmbonus_comsn.php");
				break;
			case 52:
				?>
				<legend>
		           <strong><font color="#666666">รายงานสรุป Cap Adjust</font></strong></legend>
				<?
				include("./comsn/com_d/cap_adjust1.php");
				break;
			case 53:
				?>
				<legend>
		           <strong><font color="#666666">รายงานสรุปรอบการไม่จ่ายแผน B</font></strong></legend>
				<?
				include("./comsn/com_d/rep_cc_comsn.php");
				break;
			case 142:
				?>
				<legend>
		           <strong><font color="#666666">รายงานรายละเอียดคะแนนคอมมิชชั่นผู้แนะนำ</font></strong></legend>
				<?
				include("./comsn/report/rep_all_fast_team_comsn2.php");
				break;
			case 143:
				?>
				<legend>
		           <strong><font color="#666666">รายงาน Star Maker</font></strong></legend>
				<?
				include("./comsn/com_a/rep_smbonus.php");
				break;
			case 144:
				?>
				<legend>
		           <strong><font color="#666666">รายงานละเอียด Star Maker</font></strong></legend>
				<?
				include("./comsn/com_a/rep_sc_comsn.php");
				break;
			case 54:
				?>
				<legend>
		           <strong><font color="#666666">รายงานแสดงสถานะการปรับตำแหน่งของสมาชิก</font></strong></legend>
				<?
				include("./comsn/com_a/rep_newpositon1.php");
				break;
			case 55:
				?>
				<legend>
		           <strong><font color="#666666">รายงานแสดงสถานะการปรับตำแหน่งของสมาชิก</font></strong></legend>
				<?
				include("./comsn/com_a/rep_newpositon2.php");
				break;
			case 56:
				?>
				<legend>
		           <strong><font color="#666666">รายงานแสดงสถานะการปรับตำแหน่งของสมาชิก</font></strong></legend>
				<?
				include("./comsn/com_a/rep_newpositon3.php");
				break;
			case 57:
				?>
				<legend>
		           <strong><font color="#666666">รายงานสรุปการจ่ายภาษี</font></strong></legend>
				<?
				include("./comsn/com_a/rep_tax.php");
				break;
			}

			

?>
</fieldset></td>
</tr></table>
<?
	}
?>