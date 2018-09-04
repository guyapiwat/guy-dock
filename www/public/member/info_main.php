<?
if(!isset($_GET['sub'])){
	$cmc = $_SESSION["usercode"];
	//echo $cmc;
	$data = get_detail_meber($cmc);
	$imgphoto = posimg($data["pos_cur"]);
	$maintain_1 = $wording_lan["sub21_3"];
	$maintain_2 = getStatus($cmc,$data['pos_cur'],0);
	$autoship_1 = $autoship_1;
	$completely = $wording_lan["tab2_1_complete"];
	$incomplete = $incomplete;
	$status=check_status($cmc,$data['pos_cur'],date('Y-m-d'));
	$status1=check_status($cmc,$data['pos_cur'],date("Y-m-d", strtotime("first day of -1 month")));
	//if($status['status'] == '1')$status['status'] = "<font color=#31B404><b>�ѡ���ʹ����</b></font>";
	//else $status['status'] ='"<font color=#c00000><b>(�ѧ����ѡ���ʹ)</b></font>"';

   ////////////// PV LR //////////////////////
	$point = new point_member;
	$bmbonus = $point->get_bmbonus($dbprefix,$cmc);
	$bmbonusx = $point->get_bmbonus_thismonth($dbprefix,$cmc);
	$pos_cur = $point->position($dbprefix,'calc_poschange','pos_cur',$cmc);
	$pos_cur2 = $point->position($dbprefix,'calc_poschange2','pos_cur2',$cmc);

	$mtype1 = $arr_mtype1[$data["mtype"]];
	$weak_month=	$bmbonusx['balance'];
   $rs = mysql_query("SELECT * FROM ".$dbprefix."position order by posid");
	for($i=0;$i<mysql_num_rows($rs);$i++){
		$posid[$i] = mysql_result($rs,$i,'posshort');
		$imgPosDef[mysql_result($rs,$i,'posshort')] = "./images/".mysql_result($rs,$i,'posavt');
		$tabUPosDef[mysql_result($rs,$i,'posshort')] = mysql_result($rs,$i,'posutab');
		$namePosDef[mysql_result($rs,$i,'posshort')] = mysql_result($rs,$i,'posname');
	}

	if(!empty($data['pos_cur2'])){$imgavatar = $imgPosDef[$data['pos_cur2']];
	}else{ $imgavatar = $imgPosDef[$data['pos_cur']];}

	//var_dump($imgavatar);

	//$imgavatar = "../assets/avatars/profile-pic.jpg";

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script type="text/javascript">
$(window).load(function()
{
    $('#myModal').modal('show');
});
 </script>

<? 
$sql = "SELECT * FROM ".$dbprefix."news WHERE popup = 'Y' order by id desc LIMIT 0,1";
$rs = mysql_query($sql);
if(mysql_num_rows($rs)>0){
	$row = mysql_fetch_object($rs);
	$id=$row->id;
	$head=$row->head;
	$bodys=$row->body;
	$date=$row->dates;
	$status=$row->status;
	
	echo '<div class="container">
	  <!-- Modal -->
	  <div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog">
		
		  <!-- Modal content-->
		  <div class="modal-content">
			<div class="modal-header">
			  <button type="button" class="close" data-dismiss="modal">&times;</button>
			  <h1 class="modal-title">������áԨ����</h1>
			</div>
			<div class="modal-body">
			<h2>'.$head.'</h2>
			  <p>'.$bodys.'</p>
			</div>
			<div class="modal-footer">
			  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		  </div>
		  
		</div>
	  </div>
	</div>';
}
?>



<div class="row">
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->
		<div class="clearfix">
		<div>
			<div id="user-profile-1" class="user-profile row">
				<div class="col-xs-12 col-sm-3 center">
					<div>

						<!-- #section:pages/profile.picture -->
						<span class="profile-picture">
							<img id="avatar" class="editable img-responsive" src="<?=$imgavatar?>" width ="140px"/>
						</span>

						<!-- /section:pages/profile.picture -->

						<div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
							<div class="inline position-relative">
								<a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
									<i class="ace-icon fa fa-circle light-green"></i>
									&nbsp;
									<span class="white"><?php echo $data['mcode'];?>(<?php if($data['name_b']!=""){echo $data['name_b'];}else{echo $data['name_t'];}?>)</span>
								</a>

								<ul class="align-left dropdown-menu dropdown-caret dropdown-lighter">
									<li class="dropdown-header"> Detail Status </li>

									<li>
										<a href="#">
											<i class="ace-icon fa fa-circle green"></i>
&nbsp;
											<span class="green">Actived</span>
										</a>
									</li>

									<li>
										<a href="#">
											<i class="ace-icon fa fa-circle red"></i>
&nbsp;
											<span class="red">Suspend</span>
										</a>
									</li>

									<li>
										<a href="#">
											<i class="ace-icon fa fa-circle black"></i>
&nbsp;
											<span class="grey">Terminated</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>

<?

//var_dump($data);

?>

					<div class="space-6"></div>

					

						<div class="profile-user-info profile-user-info-striped">
								<div class="profile-info-row">
								<div class="profile-info-name1"><?=$wording_lan["tab1_1_5"];?></div>

								<div class="profile-info-value">
									<span class="editable" id="username">
									<?php 
									if($data['mtype'] == 0){
										echo "Member";
									}else if($data['mtype'] == 1){
										echo "Franchise";
									}else{
										echo "Agency";
									}
									?> &nbsp;
									</span>
								</div>
							</div>

							<div class="profile-info-row">
								<div class="profile-info-name1"><?=$wording_lan["tab1_1_6"];?></div>

								<div class="profile-info-value">
									<span class="editable" id="username"><?php echo $pos_cur['pos_cur']; ?>&nbsp;<?  if($pos_cur['date'] != '')echo '('.$pos_cur['date'].')' ;?></span>
								</div>
							</div>
							<div class="profile-info-row">
								<div class="profile-info-name1"><?=$wording_lan["tab2_1_10"];?></div>

								<div class="profile-info-value">
									<span class="editable" id="username"><?php echo $pos_cur2['pos_cur'];?>&nbsp;<?  if($pos_cur2['date'] != '')echo '('.$pos_cur2['date'].')' ;?></span>
								</div>
							</div>

							<div class="profile-info-row">
								<div class="profile-info-name1"><?=$wording_lan["withdraw"];?></div>

								<div class="profile-info-value">
									<span class="editable" id="username"><?php 
									if($data[atocom]=="0")echo 'Auto';
									else echo 'No Auto';
									?></span>
								</div>
							</div>
						</div>				
					<div class="hr hr16 dotted"></div>

					   <?if($_SESSION["usercode"]<>""){?>
					   <div  class="btn btn-danger"><a class="" href="doc/doc_member.pdf" style="text-decoration: none;color:#FFF"  target="_blank"><?=$wording_lan["manual"];?></a></div><? } ?>


				</div>

				<div class="col-xs-12 col-sm-9" >
					<div class="space-12"></div>
					<div class="profile-user-info profile-user-info-striped" style="display: none">

						<div class="profile-info-row">
							<div class="profile-info-name"> LINK URL </div>

							<div class="profile-info-value">
								<div class="input-group col-sm-12 col-xs-12">
								<input type="text" id="mcode"  name="mcode"  class="form-control" value="http://www.cci-system.com/l/<?=$_SESSION["uid"]?>" placeholder="Some path" id="copy-input">
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="space-12"></div>	

				<div class="col-xs-12 col-sm-9">
					<div class="space-12"></div>
					
					<!-- #section:pages/profile.info -->
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

						<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan["tab2_1_18"]?></div>

							<div class="profile-info-value">
								<span class="editable" id="username"><?php echo number_format($point->get_allPointThisMonth($dbprefix,$cmc,date("Y-m")),0,'',',')?></a></span>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name1"> <?=$wording_lan["tab2_1_33"]?></div>

							<div class="profile-info-value">
								<span class="editable" id="age"> <?=number_format($weak_month,0,'',',')?></span>
							</div>
						</div>
						<div class="profile-info-row">
							<div class="profile-info-name1"> HPV</div>

							<div class="profile-info-value">
								<span class="editable" id="age"> <?=number_format($data['hpv'],0,'',',')?></span>
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

					<div class="space-12"></div>

					<!-- #section:pages/profile.info -->
					<div class="profile-user-info profile-user-info-striped">
						

						<div class="profile-info-row">
							<div class="profile-info-name1"> <?=$wording_lan['tab5']['1_1_5']?> :	 <?php echo number_format($bmbonus['pcarry'][1],0,'.',',');?></div>

							<div class="profile-info-value">
								<span class="editable" id="age"><?=$wording_lan['tab5']['1_1_6']?> : <?php echo number_format($bmbonus['pcarry'][2],0,'.',',');?></span>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name1"> <?=$wording_lan['tab5']['1_1_7']?> : <?echo number_format($point->get_newPoint($dbprefix,$cmc,1),0,'.',',');?></div>

							<div class="profile-info-value">
								<span class="editable" id="age"> <?=$wording_lan['tab5']['1_1_8']?> :  <?echo number_format($point->get_newPoint($dbprefix,$cmc,2),0,'.',',');?></span>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name1"> <?=$wording_lan['tab5']['1_1_9']?> :  <?php echo number_format($bmbonus['pcarry'][1]+$point->get_newPoint($dbprefix,$cmc,1),0,'.',',');?></div>

							<div class="profile-info-value">
								<span class="editable" id="age"> <?=$wording_lan['tab5']['1_1_10']?>: <?php echo number_format($bmbonus['pcarry'][2]+$point->get_newPoint($dbprefix,$cmc,2),0,'.',',');?></span>
							</div>
						</div>


					</div>

<?
$sqlall = "SELECT *,CASE WHEN status = 'Y'  THEN 'Yes' ELSE 'No' END as status FROM ".$dbprefix."news where status ='Y' order by id desc ";
$rs12 = mysql_query($sqlall);      

?>
					<!-- /section:pages/profile.info -->
					<div class="space-10"></div>

					<div class="widget-box transparent">
						<div class="widget-header widget-header-small">
							<h4 class="widget-title blue smaller">
								<i class="ace-icon fa fa-rss orange"></i>
								<?=$wording_lan["news"];?>
							</h4>
						</div>

						<div class="widget-body">
							<div class="widget-main padding-8">
								<!-- #section:pages/profile.feed -->
								<div id="profile-feed-1" class="profile-feed">
									<? 
									if (mysql_num_rows($rs12)>0) {
										for($x=0;$x<mysql_num_rows($rs12);$x++){
											$sqlObj = mysql_fetch_object($rs12);
											$id =$sqlObj->id;  
											$head =$sqlObj->head;  
											$dates =$sqlObj->dates;  
									?>
									<div class="profile-activity clearfix">
										<div>
											<i class="pull-left thumbicon fa fa-check btn-success no-hover"></i>
											<a href="./index.php?sessiontab=1&sub=10&ids=<?=$id?>"><?=$head?></a>
											<div class="time">
												<i class="ace-icon fa fa-clock-o bigger-110"></i>
												<?=$dates?>
											</div>
										</div>
									</div>
									<?
										}
									}
									?>
								</div>
								<!-- /section:pages/profile.feed -->
							</div>
						</div>
					</div>
					<div class="space-6"></div>
					<div class="space-6"></div>
					<div class="space-6"></div>
					<div class="space-6"></div>
				</div>
			</div>
		</div>
		<!-- PAGE CONTENT ENDS -->
	</div><!-- /.col -->
</div><!-- /.row -->


		</div><!-- /.page-content -->
	</div>
</div><!-- /.main-content -->
<?
}else{
	switch($_GET['sub']){

			case 1:
				?><legend><strong><font color="#666666">User Infomation&nbsp;&nbsp;</font></strong></legend><?
				include("user_detail.php");
				break;
			case 2:
				?><legend><strong><font color="#666666"><?=$wording_lan["tab1_2"]?>&nbsp;&nbsp;</font></strong></legend><?
				include("change_pass.php");
				break;
		    case 3:
				?><legend><strong><font color="#666666"><?=$wording_lan["tab1_4"]?>&nbsp;&nbsp;</font></strong></legend><?
				include("member_editadd.php");
				break;
		    case 4:
				?><legend><strong><font color="#666666"><?=$wording_lan["tab1_44"]?>&nbsp;&nbsp;</font></strong></legend><?
				include("member_upload.php");
				break;
			case 7:
				?><legend><strong><font color="#666666"><?=$wording_lan["tab1_6"]?>&nbsp;&nbsp;</font></strong></legend><?
				include("member_editadd1.php");
				break;
			case 8:
				?><legend><strong><font color="#666666"><?=$wording_lan["tab1_7"]?>&nbsp;&nbsp;</font></strong></legend><?
				include("member_success.php");
				break;
			case 10:
				?><legend><strong><font color="#666666"><?=$wording_lan["news"];?></font></strong></legend><?
				include("news_show.php");
				break;
			case 31:
				?><legend><strong><font color="#666666"><?=$wording_lan["new_member"];?></font></strong></legend><?
				include("new_member_report.php");
				break;
			default :
				echo "<script language='JavaScript'>window.location='index.php?sessiontab=".$sesstab."'</script>";
			break;
		}
}
?>