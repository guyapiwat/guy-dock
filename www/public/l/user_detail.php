<?
	include("../function/global_center.php");
	//var_dump($_GET);
	//exit;
	if(empty($_GET["cmc"]))$cmc = $_SESSION["usercode"];
	else $cmc = $_GET["cmc"];
	//var_dump($cmc);
	//exit;

	$sql = "SELECT *,".$dbprefix."member.uid as uid1 FROM ".$dbprefix."member ";
	$sql .= " LEFT JOIN (SELECT posshort,posname FROM ".$dbprefix."position) AS tabname1 ON (".$dbprefix."member.pos_cur=tabname1.posshort)";
	$sql .= " LEFT JOIN (SELECT username ,uid FROM ".$dbprefix."user) AS tabname3 ON (".$dbprefix."member.uid=tabname3.uid)";
	$sql .= " LEFT JOIN (SELECT mcode AS smcode,CONCAT(name_f ,' ', name_t) AS spname FROM ".$dbprefix."member) AS tabname ON (".$dbprefix."member.sp_code=tabname.smcode)";
	$sql .= " LEFT JOIN (SELECT mcode AS umcode,CONCAT(name_f ,' ', name_t) AS upaname FROM ".$dbprefix."member) AS tabname2 ON (".$dbprefix."member.upa_code=tabname2.umcode)";
	$sql .= " WHERE mcode='".$cmc."' and ".$dbprefix."member.uid = '".$_SESSION["usercode"]."' ";
	$rs = mysql_query($sql);
	if(mysql_num_rows($rs)<=0 and $cmc != $_SESSION["usercode"]){
	   echo "<script language='JavaScript'>window.location='index.php?sessiontab=1&sub=8&cmc=$mcode&bid=$mid'</script>";	
	   exit;
	}
	$data = get_detail_meber($cmc);
	$data_spcode = get_detail_meber($data["sp_code"]);
	$data_upacode = get_detail_meber($data["sp_code"]);
	$imgphoto = posimg($data["pos_cur"]);
	$status=get_status($cmc,date('Y-m-d'),$data['pos_cur']);

	$point = new point_member;
	$bmbonus = $point->get_bmbonus($dbprefix,$cmc);
	$pos_cur = $point->position($dbprefix,'calc_poschange','pos_cur',$cmc);
	$pos_cur2 = $point->position($dbprefix,'calc_poschange2','pos_cur2',$cmc);
	$mtype1 = $arr_mtype1[$data["mtype"]];
	
?>

<div class="row">
	
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->
		<div class="clearfix">
		<div>
			<div id="user-profile-1" class="user-profile row">
				<div class="col-xs-12 col-sm-6 ">
					<!-- #section:pages/profile.info -->
					<div class="profile-user-info profile-user-info-striped ">

						<div class="profile-info-row table-header">
							<div class="profile-info-value"><?=$wording_lan["tab1_mem_1"]?> </div>

							<div class="profile-info-value">
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan["tab1_mem_4"]?> </div>

							<div class="profile-info-value">
								<span class="editable" id="username"><?php echo $data['sp_code'];?></span>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan["tab1_mem_6"]?>  </div>

							<div class="profile-info-value">
								<span class="editable" id="age"><?php echo $data_spcode['name_t'];?></span>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> Member Type </div>

							<div class="profile-info-value">
								<span class="editable" id="age"><?php echo $mtype1;?></span>
							</div>
						</div>

					</div>
					<div class="space-6"></div>
					<div class="space-6"></div>
					<div class="space-6"></div>
					<div class="space-6"></div>
				</div>
				<div class="col-xs-12 col-sm-6">
					<!-- #section:pages/profile.info -->
					<div class="profile-user-info profile-user-info-striped">
						<div class="profile-info-row table-header">
							<div class="profile-info-value"><?=$wording_lan["tab1_mem_2"]?> </div>

							<div class="profile-info-value">
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan["tab1_mem_7"]?>  </div>

							<div class="profile-info-value">
								<span class="editable" id="username"><?php echo $data['upa_code'];?></span>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan["tab1_mem_7"]?>  </div>

							<div class="profile-info-value">
								<span class="editable" id="age"><?php echo $data_upacode['name_t'];?></span>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan["tab1_mem_9"]?>  </div>

							<div class="profile-info-value">
								<span class="editable" id="age"><? echo ($data['lr']!="")? ($data['lr']=="1")?"ซ้าย":"ขวา": $data['nodata']; ?></span>
							</div>
						</div>

					</div>
					<div class="space-6"></div>
					<div class="space-6"></div>
					<div class="space-6"></div>
					<div class="space-6"></div>
				</div>

				<!-- Col 2 -->

				<!-- Row 2 -->
				<div class="col-xs-12 col-sm-6">
					<!-- #section:pages/profile.info -->
					<div class="profile-user-info profile-user-info-striped">

						<div class="profile-info-row table-header">
							<div class="profile-info-value"><?=$wording_lan["tab1_mem_11"]?></div>

							<div class="profile-info-value">
							</div>
						</div>
						<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan["tab1_mem_13"]?> </div>

							<div class="profile-info-value">
								<span class="editable" id="username"><?php echo $data['name_f']?></span>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan["tab1_mem_20"]?> </div>

							<div class="profile-info-value">
								<span class="editable" id="age"><?php echo $data['name_t'];?></span>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> Name & LastName or Company Name </div>

							<div class="profile-info-value">
								<span class="editable" id="age"><?=$data['name_e']?></span>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan["tab1_mem_22"]?> </div>

							<div class="profile-info-value">
								<span class="editable" id="username"><?php echo $data['name_b'];?></span>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan["tab1_mem_23"]?> </div>

							<div class="profile-info-value">
								<span class="editable" id="age"><?php echo $data['sex'];?></span>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan["tab1_mem_24"]?> </div>

							<div class="profile-info-value">
								<span class="editable" id="age"><?php echo  $data['birthday'];?></span>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan["tab1_mem_25"]?> </div>

							<div class="profile-info-value">
								<span class="editable" id="age"><?php echo  $data['national'];?></span>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan["tab1_mem_26"]?></div>

							<div class="profile-info-value">
								<span class="editable" id="age"><?php echo  $data['id_card'];?></span>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan["tab1_mem_27"]?> </div>

							<div class="profile-info-value">
								<span class="editable" id="age"><?php echo  $data['id_tax'];?></span>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan["tab1_mem_28"]?> </div>

							<div class="profile-info-value">
								<span class="editable" id="age"><?php echo  $data['home_t'];?></span>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan["tab1_mem_29"]?> </div>

							<div class="profile-info-value">
								<span class="editable" id="age"><?php echo  $data['mobile'];?></span>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan["tab1_mem_30"]?>	 </div>

							<div class="profile-info-value">
								<span class="editable" id="age"><?php echo  $data['fax'];?></span>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan["tab1_mem_31"]?> </div>

							<div class="profile-info-value">
								<span class="editable" id="age"><?php echo  $data['email'];?></span>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> Line ID </div>

							<div class="profile-info-value">
								<span class="editable" id="age"><?php echo  $data['line_id'];?></span>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> Facebook </div>

							<div class="profile-info-value">
								<span class="editable" id="age"><?php echo  $data['facebook_name'];?></span>
							</div>
						</div>

					</div>
					<div class="space-6"></div>
					<div class="space-6"></div>
					<div class="space-6"></div>
					<div class="space-6"></div>
				</div>
				<div class="col-xs-12 col-sm-6">
					<!-- #section:pages/profile.info -->
					<div class="profile-user-info profile-user-info-striped">
						<div class="profile-info-row table-header">
							<div class="profile-info-value"><?=$wording_lan["tab1_mem_12"]?> </div>

							<div class="profile-info-value">
							</div>
						</div>
						<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan["tab1_mem_13"]?>  </div>

							<div class="profile-info-value">
								<span class="editable" id="username"><?php echo  $data['cname_f'];?></span>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"><?=$wording_lan["tab1_mem_20"]?>  </div>

							<div class="profile-info-value">
								<span class="editable" id="age"><?php echo  $data['cname_t'];?></span>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> Name & LastName or Company Name </div>

							<div class="profile-info-value">
								<span class="editable" id="age"><?php echo  $data['cname_e'];?></span>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan["tab1_mem_22"]?>  </div>

							<div class="profile-info-value">
								<span class="editable" id="username"><?php echo  $data['cname_b'];?></span>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan["tab1_mem_23"]?>  </div>

							<div class="profile-info-value">
								<span class="editable" id="age"><?php echo  $data['csex'];?></span>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan["tab1_mem_24"]?>  </div>

							<div class="profile-info-value">
								<span class="editable" id="age"><?php echo  $data['cbirthday'];?></span>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan["tab1_mem_25"]?>  </div>

							<div class="profile-info-value">
								<span class="editable" id="age"><?php echo  $data['cnational'];?></span>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan["tab1_mem_26"]?> </div>

							<div class="profile-info-value">
								<span class="editable" id="age"><?php echo  $data['cid_card'];?></span>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan["tab1_mem_27"]?>  </div>

							<div class="profile-info-value">
								<span class="editable" id="age"><?php echo  $data['cid_tax'];?></span>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan["tab1_mem_28"]?> </div>

							<div class="profile-info-value">
								<span class="editable" id="age"><?php echo  $data['chome_t'];?></span>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan["tab1_mem_29"]?> </div>

							<div class="profile-info-value">
								<span class="editable" id="age"><?php echo  $data['cmobile'];?></span>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan["tab1_mem_30"]?> </div>

							<div class="profile-info-value">
								<span class="editable" id="age"><?php echo  $data['cfax'];?></span>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan["tab1_mem_31"]?> </div>

							<div class="profile-info-value">
								<span class="editable" id="age"><?php echo  $data['cemail'];?></span>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> Line ID </div>

							<div class="profile-info-value">
								<span class="editable" id="age"><?php echo  $data['cline_id'];?></span>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> Facebook </div>

							<div class="profile-info-value">
								<span class="editable" id="age"><?php echo  $data['cfacebook_name'];?></span>
							</div>
						</div>

					</div>
					<div class="space-6"></div>
					<div class="space-6"></div>
					<div class="space-6"></div>
					<div class="space-6"></div>
				</div>

				<!-- Col 2 -->

				<!-- Row 3 -->
				<div class="col-xs-12 col-sm-6">
					<!-- #section:pages/profile.info -->
					<div class="profile-user-info profile-user-info-striped">
						<div class="profile-info-row table-header">
							<div class="profile-info-value"><?=$wording_lan["tab1_mem_37"]?></div>

							<div class="profile-info-value">
							</div>
						</div>
	
						<div class="profile-info-row">
							<div class="profile-info-name"><?=$wording_lan["tab1_mem_39"]?></div>

							<div class="profile-info-value">
								<span class="editable" id="username"><?php echo $data['address'];?></span>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"><?=$wording_lan["tab1_mem_40"]?></div>

							<div class="profile-info-value">
								<span class="editable" id="age"><?php echo $data['building'];?></span>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"><?=$wording_lan["tab1_mem_41"]?></div>

							<div class="profile-info-value">
								<span class="editable" id="username"><?php echo $data['village'];?></span>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"><?=$wording_lan["tab1_mem_42"]?></div>

							<div class="profile-info-value">
								<span class="editable" id="age"><?php echo $data['soi'];?></span>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"><?=$wording_lan["tab1_mem_43"]?></div>

							<div class="profile-info-value">
								<span class="editable" id="age"><?php echo $data['street'];?></span>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"><?=$wording_lan["tab1_mem_44"]?></div>

							<div class="profile-info-value">
								<span class="editable" id="age"><?php echo $data['districtId'];?></span>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"><?=$wording_lan["tab1_mem_45"]?></div>

							<div class="profile-info-value">
								<span class="editable" id="age"><?php echo $data['amphurId'];?></span>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"><?=$wording_lan["tab1_mem_46"]?></div>

							<div class="profile-info-value">
								<span class="editable" id="age"><?php echo $data['provinceId'];?></span>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"><?=$wording_lan["tab1_mem_47"]?></div>

							<div class="profile-info-value">
								<span class="editable" id="age"><?php echo $data['zip'];?></span>
							</div>
						</div>

					</div>
					<div class="space-6"></div>
					<div class="space-6"></div>
					<div class="space-6"></div>
					<div class="space-6"></div>
				</div>
				<div class="col-xs-12 col-sm-6">
					<!-- #section:pages/profile.info -->
					<div class="profile-user-info profile-user-info-striped">
						<div class="profile-info-row table-header">
							<div class="profile-info-value"><?=$wording_lan["tab1_mem_74"]?> </div>

							<div class="profile-info-value">
							</div>
						</div>
	
						<div class="profile-info-row">
							<div class="profile-info-name"><?=$wording_lan["tab1_mem_39"]?></div>

							<div class="profile-info-value">
								<span class="editable" id="username"><?php echo $data['caddress'];?></span>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"><?=$wording_lan["tab1_mem_40"]?></div>

							<div class="profile-info-value">
								<span class="editable" id="age"><?php echo $data['cbuilding'];?></span>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"><?=$wording_lan["tab1_mem_41"]?></div>

							<div class="profile-info-value">
								<span class="editable" id="username"><?php echo $data['cvillage'];?></span>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"><?=$wording_lan["tab1_mem_42"]?></div>

							<div class="profile-info-value">
								<span class="editable" id="age"><?php echo $data['csoi'];?></span>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"><?=$wording_lan["tab1_mem_43"]?></div>

							<div class="profile-info-value">
								<span class="editable" id="age"><?php echo $data['cstreet'];?></span>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"><?=$wording_lan["tab1_mem_44"]?></div>

							<div class="profile-info-value">
								<span class="editable" id="age"><?php echo $data['cdistrictId'];?></span>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"><?=$wording_lan["tab1_mem_45"]?></div>

							<div class="profile-info-value">
								<span class="editable" id="age"><?php echo $data['camphurId'];?></span>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"><?=$wording_lan["tab1_mem_46"]?></div>

							<div class="profile-info-value">
								<span class="editable" id="age"><?php echo $data['cprovinceId'];?></span>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"><?=$wording_lan["tab1_mem_47"]?></div>

							<div class="profile-info-value">
								<span class="editable" id="age"><?php echo $data['czip'];?></span>
							</div>
						</div>

					</div>
					<div class="space-6"></div>
					<div class="space-6"></div>
					<div class="space-6"></div>
					<div class="space-6"></div>
				</div>

				<!-- Col 2 -->

				<!-- Row 4 -->
				<div class="col-xs-12 col-sm-6">
					<!-- #section:pages/profile.info -->
					<div class="profile-user-info profile-user-info-striped">
						<div class="profile-info-row table-header">
							<div class="profile-info-value"><?=$wording_lan["tab1_mem_48"]?></div>

							<div class="profile-info-value">
							</div>
						</div>
						<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan["tab1_mem_50"]?> </div>

							<div class="profile-info-value">
								<span class="editable" id="username"><?php echo $data['bankname'];?></span>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan["tab1_mem_51"]?> </div>

							<div class="profile-info-value">
								<span class="editable" id="age"><?php echo $data['branch'];?></span>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan["tab1_mem_52"]?>	 </div>

							<div class="profile-info-value">
								<span class="editable" id="age"><?php echo $data['acc_type'];?></span>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan["tab1_mem_53"]?> </div>

							<div class="profile-info-value">
								<span class="editable" id="username"><?php echo $data['acc_no'];?></span>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan["tab1_mem_54"]?> </div>

							<div class="profile-info-value">
								<span class="editable" id="age"><?php echo $data['acc_name'];?></span>
							</div>
						</div>
					</div>
					<div class="space-6"></div>
					<div class="space-6"></div>
					<div class="space-6"></div>
					<div class="space-6"></div>
					<div class="space-6"></div>
					<div class="space-6"></div>
					<div class="space-6"></div>
					<div class="space-6"></div>
				</div>
				<div class="col-xs-12 col-sm-6">
					<!-- #section:pages/profile.info -->
					<div class="profile-user-info profile-user-info-striped">
						<div class="profile-info-row table-header">
							<div class="profile-info-value"><?=$wording_lan["tab1_mem_49"]?></div>

							<div class="profile-info-value">
							</div>
						</div>
						<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan["tab1_mem_13"]?></div>

							<div class="profile-info-value">
								<span class="editable" id="username"><?php echo $data['iname_f'];?></span>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan["tab1_mem_56"]?></div>

							<div class="profile-info-value">
								<span class="editable" id="age"><?php echo $data['iname_t'];?></span>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan["tab1_mem_57"]?> </div>

							<div class="profile-info-value">
								<span class="editable" id="age"><?=$data['irelation']?></span>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan["tab1_mem_58"]?></div>

							<div class="profile-info-value">
								<span class="editable" id="username"><?=$data['iphone']?></span>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan["tab1_mem_79"]?> </div>

							<div class="profile-info-value">
								<span class="editable" id="age"><?=$data['iid_card']?></span>
							</div>
						</div>

					</div>
					<div class="space-6"></div>
					<div class="space-6"></div>
					<div class="space-6"></div>
					<div class="space-6"></div>
					<div class="space-6"></div>
					<div class="space-6"></div>
					<div class="space-6"></div>
					<div class="space-6"></div>
				</div>

				<!-- Col 2 -->
			</div>
		</div>
		<!-- PAGE CONTENT ENDS -->
	</div><!-- /.col -->
</div><!-- /.row -->


		</div><!-- /.page-content -->
	</div>
</div><!-- /.main-content -->