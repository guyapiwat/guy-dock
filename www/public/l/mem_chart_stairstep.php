<meta name="viewport" content="initial-scale = 0.4,maximum-scale = 2,width=device-width" />
<?
include("./cls/unlimitChartGenerator.php");
include("global.php");
include_once("wording".$_SESSION["lan"].".php");



if($_REQUEST["cmc"])$cmc = $_REQUEST["cmc"];

if(isset($_POST["key"])){
	if($_POST["cause"]==""){
		$cmc = $_SESSION["usercode"];
	}else{ 
		if($_POST["key"]=="code"){
			$sql = "select * from ".$dbprefix."member where mcode like '%".trim($_POST["cause"])."' limit 0,1";
			$rs = mysql_query($sql);
			if(mysql_num_rows($rs)>0){
				$cmc = mysql_result($rs,0,"mcode");
			}else{
				$cmc = $_POST["cause"];
			}
			mysql_free_result($rs);
		}else if($_POST["key"]=="name"){
			$sql = "select * from ".$dbprefix."member where name_b like '".$_POST["cause"]."%' or name_t like '".$_POST["cause"]."%' limit 0,1";
			
			$rs = mysql_query($sql);
			if(mysql_num_rows($rs)>0){
				$cmc = mysql_result($rs,0,"mcode");
			}else{
				?>
				<table width="100%" border="0">
				  <tr align="center">
					<td><br><font color="#c00000"><?=$wording_lan["tab2_1_1"]?> <?=$_POST["cause"]?></font></td>
				  </tr>
				  <tr align="center">
					<td><br><img src="./images/upa_s.gif" width="24" height="24" align="absmiddle" />[<a href="./index.php?sessiontab=1&sub=4"><?=$wording_lan["tab2_1_2"]?> </a>]</td>
				  </tr>
				</table>
				<?
				exit;
			}
		}
	}
}

if($cmc=="")$cmc = $_SESSION['usercode'];
$cmc = gencode($cmc);
$chk = gencode($_POST["cause1"]);
$chart = new chartGenerator();
$chart->setStartCode($cmc);
$chart->setPrefix($dbprefix);
$chart->setBlock($_SESSION['usercode']);
if($chart->isUp($cmc,$_SESSION['usercode'])){
	echo '<table width="100%" border="0">
	<tr>
	<td width="58%" valign="top">
	<table width="100%" cellspacing="0" cellpadding="0" border="0"><tr><td width="50%" align="left" valign="top">
	<form method="post" action="./index.php?sessiontab=2&sub=2">
		<input type="text" name="cause">
		<select name="key">
			<option value="code">'.$wording_lan["mcode"].'</option>
			<option value="name">'.$wording_lan["name"].'</option>
		</select>
		<input type="submit" value='.$wording_lan["tab2_1_search"].'>
	</form></td></tr></table>';
	echo "<table align='center' bgcolor='#990000'><tr><td><font color='#FFFFFF'>".$wording_lan["tab2_1_3"]."</font></td></tr></table>";
	exit;
}else if(!$chart->isLine($cmc,$_SESSION['usercode'])){
	echo '<table width="100%" border="0">
	<tr>
	<td width="58%" valign="top">
	<table width="100%" cellspacing="0" cellpadding="0" border="0"><tr><td width="50%" align="left" valign="top">
	<form method="post" action="./index.php?sessiontab=2&sub=2">
		<input type="text" name="cause">
		<select name="key">
			<option value="code">'.$wording_lan["mcode"].'</option>
			<option value="name">'.$wording_lan["name"].'</option>
		</select>
		<input type="submit" value='.$wording_lan["tab2_1_search"].'>
	</form></td></tr></table>';
	echo "<table align='center' bgcolor='#990000'><tr><td><font color='#FFFFFF'>".$wording_lan["tab2_1_3"]."</font></td></tr></table>";
	exit;
}

$data = get_detail_meber($cmc);
$imgphoto = posimg($data["pos_cur"]);
	$status=check_status($cmc,$data['pos_cur'],date('Y-m-d'));
	$status1=check_status($cmc,$data['pos_cur'],date("Y-m-d", strtotime("first day of -1 month")));
	//if($status['status'] == '1')$status['status'] = "<font color=#31B404><b>�ѡ���ʹ����</b></font>";
	//else $status['status'] ='"<font color=#c00000><b>(�ѧ����ѡ���ʹ)</b></font>"';

////////////// PV LR //////////////////////
$point = new point_member;
$bmbonus = $point->get_bmbonus($dbprefix,$cmc);
$pos_cur = $point->position($dbprefix,'calc_poschange','pos_cur',$cmc);
$pos_cur2 = $point->position($dbprefix,'calc_poschange2','pos_cur2',$cmc);
$da = get_detail_meber($cmc);
$mtype1 = $arr_mtype1[$da["mtype"]];

if($bmbonus['sum_pv'][1]>$bmbonus['sum_pv'][2]){
	$weak_point=  $bmbonus['sum_pv'][2];
}else{
	$weak_point=	$bmbonus['sum_pv'][1];
} 
if($bmbonus['pv_month'][1]>$bmbonus['pv_month'][2]){
	$weak_month=  $bmbonus['pv_month'][2];
}else{
	$weak_month=	$bmbonus['pv_month'][1];
} 


   ////////////// PV LR //////////////////////

   ///////////// Positin /////////////////////
   $rs = mysql_query("SELECT * FROM ".$dbprefix."position order by posid");
	for($i=0;$i<mysql_num_rows($rs);$i++){
		$posid[$i] = mysql_result($rs,$i,'posshort');
		$imgPosDef[mysql_result($rs,$i,'posshort')] = "./images/".mysql_result($rs,$i,'posimg');
		$tabUPosDef[mysql_result($rs,$i,'posshort')] = mysql_result($rs,$i,'posutab');
		//$tabDPosDef[mysql_result($rs,$i,'posshort')] = mysql_result($rs,$i,'posdtab');
		$namePosDef[mysql_result($rs,$i,'posshort')] = mysql_result($rs,$i,'posname');
	}
	$posid[$i] = "null";
	$imgPosDef[$posid[$i]] = "images/balls_11.gif";
	$tabUPosDef[$posid[$i]] = "#EEEEEE";
	//$tabDPosDef[$posid[$i]] = mysql_result($rs,$i,'posdtab');
	$namePosDef[$posid[$i]] = $wording_lan["tab2_1_nomember"];
	mysql_free_result($rs);
   ///////////// Positin /////////////////////
?>
<div class="row">
	<div class="col-xs-12 col-sm-12 center">
		<form method="post" action="./index.php?sessiontab=2&sub=2">
			<div class="control-group">
				<input type="text" class="input-block-level" placeholder="��͡�����ŷ���ͧ��ä���..." name="cause" value="<?=$cmc?>">

				<select data-placeholder="�ô���͡���͡" name="key" class="chzn-select-deselect span12" tabindex="-1" id="selCSI"> 
					<option value="code"><?=$wording_lan["mcode"]?></option> 
					<option value="name"><?=$wording_lan["name"]?></option> 
				</select> 
				
				<button type="submit" class="btn  "><?=$wording_lan["tab2_1_search"]?></button>
			</div>
		</form>
	</div>
</div>
<div class="hr hr16 dotted"></div>

<div class="row">
	
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->
		<div class="clearfix">
		<div>
			<div id="user-profile-1" class="user-profile row">

				<div class="col-xs-12 col-sm-7">
					<div class="profile-user-info profile-user-info-striped">
						<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan["mcode"];?> </div>

							<div class="profile-info-value">
								<span class="editable" id="username"><?php echo $data['mcode'];?>(<?php if($data['name_b']!=""){echo $data['name_b'];}else{echo $data['name_t'];}?>)</span>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan["tab3_4"];?> </div>

							<div class="profile-info-value">
								<span class="editable" id="age"><?php echo $data['mdate'];?></span>
							</div>
						</div>
						

						<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan["wording8"];?>&nbsp;(<?=$month_2;?>) </div>

							<div class="profile-info-value">
								<span class="editable" id="age"><?=$status1['tot_pv']?></span>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan["wording8"];?>&nbsp;(<?=$month_1;?>) </div>

							<div class="profile-info-value">
								<span class="editable" id="age"><?=$status['tot_pv']?></span>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan["tab2_1_17"]?> </div>

							<div class="profile-info-value">
								<span class="editable" id="username"><a href='./index.php?sessiontab=4&sub=38&cmc=<?php echo $cmc;?>' target = '_bank' ><?php echo number_format($point->get_allPoint($dbprefix,$cmc),0,'',',')?></a></span>
							</div>
						</div>
						<div class="profile-info-row" style="display:none">
							<div class="profile-info-name"> PV ������ǹ��� (������͹)</div>

							<div class="profile-info-value">
								<span class="editable" id="username"><?php echo number_format($point->get_allPointThisMonth($dbprefix,$cmc),0,'',',')?></a></span>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan["tab3_6"];?> </div>

							<div class="profile-info-value">
								<span class="editable" id="age"><?php echo  $data['sp_code'];?>(<?php echo  $data['sp_name'];?>)</span>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan["tab3_5"];?> </div>

							<div class="profile-info-value">
								<span class="editable" id="age"><?php echo  $data['upa_code'];?>(<?php echo  $data['upa_name'];?>)</span>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan["tab2_1_13"];?> </div>

							<div class="profile-info-value">
								<span class="editable" id="age"><?php echo $data['cmp3']==""?"<font color='#FF0000' class='blink' >".$incomplete."</font>":"<font color='#66FF00'>".$completely."</font>  ( ".$data["bmdate3"]." )"?></span>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan["tab2_1_14"];?> </div>

							<div class="profile-info-value">
								<span class="editable" id="age"><?php echo $data['cmp']==""?"<font color='#FF0000' class='blink' >".$incomplete."</font>":"<font color='#66FF00'>".$completely."</font> ( ".$data["bmdate1"]." )"?></span>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan["tab2_1_15"];?> </div>

							<div class="profile-info-value">
								<span class="editable" id="age"><?php echo $data['cmp2']==""?"<font color='#FF0000' class='blink' >".$incomplete."</font>":"<font color='#66FF00'>".$completely."</font> ( ".$data["bmdate2"]." )"?></span>
							</div>
						</div>
					</div>
				</div>

				<!--col3-->
				<div class="col-xs-12 col-sm-4">
					<div class="profile-user-info ">
						<? for($i=0;$i<sizeof($posid)/2;$i++){?>
						<div class="profile-info-row">
							<div class="profile-info-value"><? echo "<img src='".$imgPosDef[$posid[2*$i]]."'width='25px'>"; 
							
							if(!empty($namePosDef[$posid[2*$i]]))echo "&nbsp;&nbsp;&nbsp;=&nbsp;&nbsp;&nbsp;".$namePosDef[$posid[2*$i]];?></div>&nbsp;&nbsp;&nbsp;
							<div class="profile-info-value">
								<span class="editable" id="username"><?echo "<img src='".$imgPosDef[$posid[2*$i+1]]."'width='25px'>"; if(!empty($namePosDef[$posid[2*$i+1]]))echo "&nbsp;&nbsp;&nbsp;=&nbsp;&nbsp;&nbsp;".$namePosDef[$posid[2*$i+1]];?></span>
							</div>
						</div>
						<? }?>
					</div>
					
				</div>

				<!--row2-->
				<div class="col-xs-12 col-sm-12">
				<div class="hr hr16 dotted"></div>
					<div class="profile-user-info profile-user-info-striped">
						<div class="profile-info-row">
							<div style="overflow:scroll !important; -webkit-overflow-scrolling:touch !important;">
								<iframe src="./mem_chart_stairstep_frame.php?cmc=<?=$cmc?>" width="100%" height="500"style="padding-top: 20px;"></iframe>
							</div>
						</div>
					</div>
				<div class="hr hr16 dotted"></div>
				</div>
			</div>
		</div>
		<!-- PAGE CONTENT ENDS -->
	</div><!-- /.col -->
</div><!-- /.row -->


		</div><!-- /.page-content -->
	</div>
</div><!-- /.main-content -->