<?
if($_SESSION["usercode"]) {
	$result=mysql_query("select * from ".$dbprefix."member where mcode='".$_SESSION["usercode"]."'");
//	echo "select * from ".$dbprefix."member where mcode='".$_SESSION["usercode"]."'";
	if (mysql_num_rows($result)>0) {
		$row = mysql_fetch_array($result, MYSQL_ASSOC);
		$cl_sv_code=$row["sv_code"];
		$cl_mcode=$row["mcode"];
		$ewallet=$row["ewallet"];
		$rv_point=$row["rv_point"];
		$voucher=$row["voucher"];
		$mtype1=$row["mtype1"];
		$hpv=$row["hpv"];
		$ecom=$row["ecom"];
		$name_f=firstName($row["name_f"]);
		
		$eatoship=$row["eatoship"];
		$_SESSION["sv_code"] = $cl_sv_code;
		$_SESSION["ewallet"] = $ewallet;
		$_SESSION["ecom"] = $ecom;
		$_SESSION["hpv"] = $hpv;
		$_SESSION["voucher"] = $voucher;
		$_SESSION["eatoship"] = $eatoship;
		$_SESSION["mtype1"] = $mtype1;
		$_SESSION["evwallet"] = $voucher+$ewallet;
		$_SESSION["name_f11"] = $name_f;
		if(!empty($_GET["lan"]))$_SESSION["wording"] = $_GET["lan"];
	}

	
	$sessiontab = $_GET["sessiontab"];
	$state = $_GET["state"];
	$sub = $_GET["sub"];
	if($sessiontab == '1'){
		$info_main = ' class="active open" ';
		if($sub == '3'){
			$info_main_["3"] = ' class="active" ';
			$info_main= "";
		}
		if($sub == '31'){
			$info_main_["31"] = ' class="active" ';
			$info_main= "";
		}
	}else if($sessiontab == '2'){
		$chart_main = ' class="active open" ';
		if($sub == '1')$chart_main_["1"] = ' class="active" ';
		if($sub == '2')$chart_main_["2"] = ' class="active" ';
		if($sub == '3')$chart_main_["3"] = ' class="active" ';
		if($sub == '4')$chart_main_["4"] = ' class="active" ';
	}else if($sessiontab == '4'){
		$sale_main = ' class="active open" ';
		if($sub == '21')$sale_main_["21"] = ' class="active" ';
		if($sub == '7')$sale_main_["7"] = ' class="active" ';
		if($sub == '1')$sale_main_["1"] = ' class="active" ';
		if($sub == '3')$sale_main_["3"] = ' class="active" ';
		if($sub == '5')$sale_main_["5"] = ' class="active" ';
		if($sub == '6')$sale_main_["6"] = ' class="active" ';
	}else if($sessiontab == '3'){
		if($sub == '1' or $sub == '2' or $sub == '3' or $sub == '8')$ewallet_main_1 = ' class="active open" ';
		if($sub == '4' or $sub == '5')$ewallet_main_2 = ' class="active open" ';
		if($sub == '223' or $sub == '23' )$ewallet_main_3 = ' class="active open" ';
		if($sub == '222')$ewallet_main_4 = ' class="active open" ';
		if($sub == '225')$ewallet_main_4 = ' class="active open" ';
		if($sub == '88')$ewallet_main_4 = ' class="active open" ';
		$ewallet_main = ' class="active open" ';
		if($sub == '1')$ewallet_main_["1"] = ' class="active" ';
		if($sub == '2')$ewallet_main_["2"] = ' class="active" ';
		if($sub == '3')$ewallet_main_["3"] = ' class="active" ';
		if($sub == '4')$ewallet_main_["4"] = ' class="active" ';
		if($sub == '5')$ewallet_main_["5"] = ' class="active" ';
		if($sub == '6')$ewallet_main_["6"] = ' class="active" ';
		if($sub == '7')$ewallet_main_["7"] = ' class="active" ';
		if($sub == '8')$ewallet_main_["8"] = ' class="active" ';
		if($sub == '9')$ewallet_main_["9"] = ' class="active" ';
		if($sub == '23' and $state == '1')$ewallet_main_["23"] = ' class="active" ';
		else if($sub == '23')$ewallet_main_["233"] = ' class="active" ';

		if($sub == '222')$ewallet_main_["222"] = ' class="active" ';
		if($sub == '225')$ewallet_main_["225"] = ' class="active" ';
		if($sub == '88')$ewallet_main_["88"] = ' class="active" ';
		if($sub == '223')$ewallet_main_["223"] = ' class="active" ';
	}else if($sessiontab == '5'){
		if($sub == '5' or $sub == '6' or $sub == '10' or $sub == '103')$com_main1 = ' class="active open" ';
		if($sub == '13' or $sub == '14' or $sub == '1033' or $sub == '77')$com_main2 = ' class="active open" ';
		
		$com_main = ' class="active open" ';
		//if($sub == '771')
		//	$com_main1 = ' class="active open" ';
		if($sub == '5')$com_main_["5"] = ' class="active" ';
		if($sub == '6')$com_main_["6"] = ' class="active" ';
		if($sub == '7')$com_main_["7"] = ' class="active" ';
		if($sub == '10')$com_main_["10"] = ' class="active" ';
		if($sub == '13')$com_main_["13"] = ' class="active" ';
		if($sub == '14')$com_main_["14"] = ' class="active" ';
		if($sub == '103')$com_main_["103"] = ' class="active" ';
		if($sub == '1033')$com_main_["1033"] = ' class="active" ';
		if($sub == '112')$com_main_["112"] = ' class="active" ';
		if($sub == '77')$com_main_["77"] = ' class="active" ';
	}else{
		$info_main = ' class="active" ';
	}


}
?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="tis-620" />
		<title><?=$wording_lan["Title"]?></title>
		<meta name="robots" content="noindex,nofollow">
		<meta name="googlebot" content="noindex,noarchieve">
		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="../assets/css/bootstrap.css" />
		<link rel="stylesheet" href="../assets/css/font-awesome.css" />
		<link rel="stylesheet" href="../assets/css/sweetalert.css" />

		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="../assets/css/jquery-ui.css" />
 		<link rel="stylesheet" href="../assets/css/jquery-ui.custom.css" />

		<!-- page specific plugin styles -->

		<!-- text fonts -->
		<link rel="stylesheet" href="../assets/css/ace-fonts.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="../assets/css/ace.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="../assets/css/ace-part2.css" class="ace-main-stylesheet" />
		<![endif]-->

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="../assets/css/ace-ie.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="../assets/js/ace-extra.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="../assets/js/html5shiv.js"></script>
		<script src="../assets/js/respond.js"></script>
		<![endif]-->

	</head>

	<body class="no-skin">
		<div id="navbar2" class="navbar2 navbar2-default">
			<span>
			<a href="?lan=TH&<?=$request_string?>"><img src="./images/TH.jpg" width="20px" hight="20px"/>&nbsp;<font color='#ffffff'>Thai</font></a>
			|
			<a href="?lan=EN&<?=$request_string?>"><img src="./images/EN.jpg" width="20px" hight="20px"/>&nbsp;<font color='#ffffff'>Eng</font></a>
			
			</span>
		
		</div>

		<!-- #section:basics/navbar.layout -->
		<div id="navbar" class="navbar navbar-default">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>

			<div class="navbar-container" id="navbar-container">
				<!-- #section:basics/sidebar.mobile.toggle -->
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<!-- /section:basics/sidebar.mobile.toggle -->
				<div class="navbar-header pull-left">
					<!-- #section:basics/navbar.layout.brand -->
					<a href="./index.php" class="navbar-brand">
						<small>
							<i class="fa fa-globe"></i>
							MLM SYSTEM
						</small>
					</a>

					<!-- /section:basics/navbar.layout.brand -->

					<!-- #section:basics/navbar.toggle -->

					<!-- /section:basics/navbar.toggle -->
				</div>

				<!-- #section:basics/navbar.dropdown -->
				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<li class="grey">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<span>EW : <?php echo number_format($_SESSION["ewallet"],2,'.',',')?></span>
							</a>
						</li>
						<li class="grey">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">

								<span>EA : <?php echo number_format($_SESSION["eatoship"],2,'.',',')?></span>
							</a>
						</li>

						<li class="grey">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<span>EV : <?php echo number_format($_SESSION["voucher"],2,'.',',')?></span>
							</a>
						</li>

						<li class="grey">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<span>Hold PV : <?php echo number_format($_SESSION["hpv"],0,'.',',')?></span>
							</a>
						</li>

						<!-- #section:basics/navbar.user_menu -->
						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<!--<img class="nav-user-photo" src="../assets/avatars/user.jpg" alt="Jason's Photo" />	-->
								<span class="user-info">
									<small><?=$wording_lan["tab1_7"]?>,</small>
									<?=$_SESSION["name_t"]?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">


								<li>
									<a href="./index.php?sessiontab=1&sub=1">
										<i class="ace-icon fa fa-user"></i>
										<?=$wording_lan["Header1"]?>
									</a>
								</li>								<li>
									<a href="./index.php?sessiontab=1&sub=4">
										<i class="ace-icon fa fa-cloud-upload"></i>
										<?=$wording_lan["tab1_44"]?>
									</a>
								</li>	
								<li>
									<a href="./index.php?sessiontab=1&sub=7">
										<i class="ace-icon fa fa-edit"></i>
										<?=$wording_lan["tab1_9"]?>
									</a>
								</li>
 								<li>
									<a href="./index.php?sessiontab=1&sub=2">
										<i class="ace-icon fa fa-cog"></i>
										<?=$wording_lan["tab1_2"]?>
									</a>
								</li>
								<li class="divider"></li>

								<li>
									<a href="logout.php">
										<i class="ace-icon fa fa-power-off"></i>
										<?=$wording_lan["menutop_4"]?>
									</a>
								</li>
							</ul>
						</li>

						<!-- /section:basics/navbar.user_menu -->
					</ul>
				</div>

				<!-- /section:basics/navbar.dropdown -->
			</div><!-- /.navbar-container -->
		</div>

		<!-- /section:basics/navbar.layout -->
		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<!-- #section:basics/sidebar -->
			<div id="sidebar" class="sidebar responsive">
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
				</script>

				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<a href="index.php"><img src = 'images/logo.png' border=0 width = 100%></a>
						<!-- /section:basics/sidebar.layout.shortcuts -->
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div><!-- /.sidebar-shortcuts -->

				<ul class="nav nav-list" >
					<li <?=$info_main_["3"]?> <?if($GLOBALS["status_regis_mb"] <> '1')echo 'style="display:none"';?>>
						<a href="index.php?sessiontab=1&sub=3">
							<i class="menu-icon fa fa-plus"></i>
							<span class="menu-text"> <?=$wording_lan["register"]?>  </span>
						</a>

						<b class="arrow"></b>
					</li>
					<li <?=$info_main_["31"]?>>
						<a href="index.php?sessiontab=1&sub=31">
							<i class="menu-icon fa fa-user"></i>
							<span class="menu-text"> <?=$wording_lan["new_register"]?>  </span>
						</a>

						<b class="arrow"></b>
					</li>
					<li <?=$info_main?>>
						<a href="index.php">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> <?=$wording_lan["Header7"]?> </span>
						</a>

						<b class="arrow"></b>
					</li>

					<li <?=$chart_main?>>
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-group"></i>
							<span class="menu-text">
								<?=$wording_lan["Header2"]?>
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li <?=$chart_main_["1"]?>>
								<a href="./index.php?sessiontab=2&sub=1">
									<i class="menu-icon fa fa-caret-right"></i>
									<?=$wording_lan["main_1-1"]?> 
								</a>
							</li>

							<li <?=$chart_main_["2"]?>>
								<a href="index.php?sessiontab=2&sub=2">
									<i class="menu-icon fa fa-caret-right"></i>
									<?=$wording_lan["main_1-2"]?>
								</a>

								<b class="arrow"></b>
							</li>

							<li <?=$chart_main_["3"]?>>
								<a href="index.php?sessiontab=2&sub=3">
									<i class="menu-icon fa fa-caret-right"></i>
									<?=$wording_lan["main_1-3"]?>
								</a>

								<b class="arrow"></b>
							</li>

							<li <?=$chart_main_["4"]?>>
								<a href="index.php?sessiontab=2&sub=4">
									<i class="menu-icon fa fa-caret-right"></i>
									<?=$wording_lan["main_1-4"]?>
								</a>

								<b class="arrow"></b>
							</li>

						</ul>
					</li>
					<li <?=$sale_main?>>
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-list"></i>
							<span class="menu-text"> <?=$wording_lan["Header4"]?> </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li <?=$sale_main_["21"]?> <?if($GLOBALS["status_sale_mb"] <> '1')echo 'style="display:none"';?>>
								<a href="./index.php?sessiontab=4&sub=21&state=1">
									<i class="menu-icon fa fa-caret-right"></i>
									<?=$wording_lan["buyitem"]?>
								</a>

								<b class="arrow"></b>
							</li>

							<li <?=$sale_main_["7"]?>>
								<a href="./index.php?sessiontab=4&sub=7">
									<i class="menu-icon fa fa-caret-right"></i>
									<?=$wording_lan["tab4_3"]?>
								</a>

								<b class="arrow"></b>
							</li>

							<li <?=$sale_main_["1"]?>>
								<a href="./index.php?sessiontab=4&sub=1">
									<i class="menu-icon fa fa-caret-right"></i>
									<?=$wording_lan["tab4"]["2"]?>
								</a>

								<b class="arrow"></b>
							</li>

							<li <?=$sale_main_["3"]?> <?if($GLOBALS["status_hold_mb"] <> '1')echo 'style="display:none"';?>>
								<a href="./index.php?sessiontab=4&sub=3">
									<i class="menu-icon fa fa-caret-right"></i>
									<?=$wording_lan["tab4"]["8"]?> 
								</a>

								<b class="arrow"></b>
							</li>

							<li <?=$sale_main_["5"]?>>
								<a href="./index.php?sessiontab=4&sub=5">
									<i class="menu-icon fa fa-caret-right"></i>
									<?=$wording_lan["tab4_10"]?>
								</a>

								<b class="arrow"></b>
							</li>

							<li <?=$sale_main_["6"]?>>
								<a href="./index.php?sessiontab=4&sub=6">
									<i class="menu-icon fa fa-caret-right"></i>
									<?=$wording_lan["tab4_9"]?>
								</a>

								<b class="arrow"></b>
							</li>

						</ul>
					</li>

					<li <?=$ewallet_main?>>
								<a href="#" class="dropdown-toggle">
									<i class="menu-icon fa fa-list-alt"></i>

									<?=$wording_lan["Header8"]?>
									<b class="arrow fa fa-angle-down"></b>
								</a>

								<b class="arrow"></b>

								<ul class="submenu">
									<li <?=$ewallet_main_1?>>
										<a href="#" class="dropdown-toggle">
											<i class="menu-icon fa fa-caret-right"></i>
											<?=$wording_lan["tab4"]["7_15"]?>
											<b class="arrow fa fa-angle-down"></b>
										</a>

										<b class="arrow"></b>

										<ul class="submenu">
											
											<li <?=$ewallet_main_["8"]?>>
												<a href="./index.php?sessiontab=3&sub=8">
													<i class="menu-icon fa fa-plus"></i>
													<?=$wording_lan["withdraw"]?>
												</a>

												<b class="arrow"></b>
											</li>
											<li <?=$ewallet_main_["1"]?>>
												<a href="./index.php?sessiontab=3&sub=1">
													<i class="menu-icon fa fa-plus"></i>
													<?=$wording_lan["tab4_7"]?>
												</a>

												<b class="arrow"></b>
											</li>
											
			
											<li <?=$ewallet_main_["2"]?>>
												<a href="./index.php?sessiontab=3&sub=2">
													<i class="menu-icon fa fa-plus"></i>
													<?=$wording_lan["tab4_111"]?>
												</a>

												<b class="arrow"></b>
											</li>

											
										</ul>
									</li>
								</ul>

								<ul class="submenu">
									<li <?=$ewallet_main_4?>>
										<a href="#" class="dropdown-toggle">
											<i class="menu-icon fa fa-caret-right"></i>
											Eautoship
											<b class="arrow fa fa-angle-down"></b>
										</a>

										<b class="arrow"></b>

										<ul class="submenu">
											<!---<li <?=$ewallet_main_["88"]?>>
												<a href="./index.php?sessiontab=3&sub=88">
													<i class="menu-icon fa fa-plus"></i>
													����Թ Eautoship
												</a>

												<b class="arrow"></b>
											</li>--->
											<li <?=$ewallet_main_["225"]?>>
												<a href="./index.php?sessiontab=3&sub=225">
													<i class="menu-icon fa fa-plus"></i>
													<?=$wording_lan["tab4_7_1"]?>
												</a>

												<b class="arrow"></b>
											</li>
											<li <?=$ewallet_main_["222"]?>>
												<a href="./index.php?sessiontab=3&sub=222">
													<i class="menu-icon fa fa-plus"></i>
													<?=$wording_lan["tab4_111"]?>
												</a>

												<b class="arrow"></b>
											</li>
										</ul>

									</li>
								</ul>


								<ul class="submenu">
									<li <?=$ewallet_main_3?>>
										<a href="#" class="dropdown-toggle">
											<i class="menu-icon fa fa-caret-right"></i>
											Evoucher
											<b class="arrow fa fa-angle-down"></b>
										</a>

										<b class="arrow"></b>

										<ul class="submenu">
											<li <?=$ewallet_main_["23"]?> <?=$sale_main_["3"]?> <?if($GLOBALS["status_swap_mb"] <> '1')echo 'style="display:none"';?>>
												<a href="index.php?sessiontab=3&sub=23&state=1">
													<i class="menu-icon fa fa-plus"></i>
													<?=$wording_lan["exchange"]?>
												</a>

												<b class="arrow"></b>
											</li>
											<li <?=$ewallet_main_["233"]?>>
												<a href="./index.php?sessiontab=3&sub=223">
													<i class="menu-icon fa fa-plus"></i>
													<?=$wording_lan["tab4_111"]?>
												</a>

												<b class="arrow"></b>
											</li>

											
										</ul>
									</li>
								</ul>


							</li>


					<li <?=$com_main?>>
								<a href="#" class="dropdown-toggle">
									<i class="menu-icon fa fa-list-alt"></i>

									<?=$wording_lan["commission"]?>
									<b class="arrow fa fa-angle-down"></b>
								</a>

								<b class="arrow"></b>

								<ul class="submenu">
									<li <?=$com_main1?>>
										<a href="#" class="dropdown-toggle">
											<i class="menu-icon fa fa-caret-right"></i>
											<?=$wording_lan["tab5"]['2_21']?>
											<b class="arrow fa fa-angle-down"></b>
										</a>

										<b class="arrow"></b>

										<ul class="submenu">
											<li <?=$com_main_["5"]?>>
												<a href="./index.php?sessiontab=5&sub=5">
													<i class="menu-icon fa fa-plus"></i>
													<?=$wording_lan["fmbonus"]?>
												</a>

												<b class="arrow"></b>
											</li>

											<li <?=$com_main_["6"]?>>
												<a href="./index.php?sessiontab=5&sub=6">
													<i class="menu-icon fa fa-plus"></i>
													<?=$wording_lan["tab5"]['2_30']?> 
												</a>

												<b class="arrow"></b>
											</li>



											<li <?=$com_main_["103"]?>>
												<a href="./index.php?sessiontab=5&sub=103">
													<i class="menu-icon fa fa-plus"></i>
													<?=$wording_lan["tab5"]['2_22']?>
												</a>

												<b class="arrow"></b>
											</li>
										</ul>
									</li>
								</ul>

								<ul class="submenu">
									<li  <?=$com_main_["112"]?>>
										<a href="./index.php?sessiontab=5&sub=112">
											<i class="menu-icon fa fa-caret-right"></i>
											<?=$wording_lan["com51"]?> 
											</a>
									</li>
								</ul>


								<ul class="submenu">
									<li <?=$com_main2?>>
										<a href="#" class="dropdown-toggle">
											<i class="menu-icon fa fa-caret-right"></i>
											<?=$wording_lan["tab5_18"] ?>
											<b class="arrow fa fa-angle-down"></b>
										</a>

										<b class="arrow"></b>

										<ul class="submenu">
											<li <?=$com_main_["13"]?>>
												<a href="./index.php?sessiontab=5&sub=13">
													<i class="menu-icon fa fa-plus"></i>
													All sale
												</a>

												<b class="arrow"></b>
											</li>
											<li <?=$com_main_["14"]?>>
												<a href="./index.php?sessiontab=5&sub=7">
													<i class="menu-icon fa fa-plus"></i>
													<?=$wording_lan["jub"]?>
												</a>

												<b class="arrow"></b>
											</li>

											<li <?=$com_main_["1033"]?>>
												<a href="./index.php?sessiontab=5&sub=1033">
													<i class="menu-icon fa fa-plus"></i>
													<?=$wording_lan["tab5"]['2_29']?>
												</a>

												<b class="arrow"></b>
											</li>
										</ul>
									</li>
								</ul>
					</li>

					<li class="">
						<a href="logout.php">
							<i class="menu-icon fa fa-power-off"></i>
							<span class="menu-text"> <?=$wording_lan["logout"]?> </span>
						</a>

						<b class="arrow"></b>
					</li>


				</ul><!-- /.nav-list -->

				<!-- #section:basics/sidebar.layout.minimize -->
				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>

				<!-- /section:basics/sidebar.layout.minimize -->
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
				</script>
			</div>

			<!-- /section:basics/sidebar -->
			<div class="main-content">
				<div class="main-content-inner">
					<!-- #section:basics/content.breadcrumbs -->
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="./index.php"><?=$wording_lan["Header6"]?></a>
							</li>
							<li <?if($GLOBALS["status_regis_mb"] <> '1')echo 'style="display:none"';?>>
								<i class="menu-icon fa fa-plus"></i>
								<a href="./index.php?sessiontab=1&sub=3"><?=$wording_lan["register"]?></a>
							</li>
							
							<li <?if($GLOBALS["status_sale_mb"] <> '1')echo 'style="display:none"';?>>
								<i class="menu-icon fa fa-plus"></i>
								<a href="./index.php?sessiontab=4&sub=21&state=1"><?=$wording_lan["buyitem"]?></a>
							</li>
							<li <?if($GLOBALS["status_swap_mb"] <> '1')echo 'style="display:none"';?>>
								<i class="menu-icon fa fa-plus"></i>
								<a href="./index.php?sessiontab=3&sub=23&state=1"><?=$wording_lan["exchange"]?></a>
							</li>
							
							<li <?if($GLOBALS["status_hold_mb"] <> '1')echo 'style="display:none"';?>>
								<i class="menu-icon fa fa-plus"></i>
								<a href="./index.php?sessiontab=4&sub=3"><?=$wording_lan["tab4"]["8_1_1"]?></a>
							</li>
							<!--<li class="active">Dashboard</li>  -->
						</ul><!-- /.breadcrumb -->
					</div>
					<!-- /section:basics/content.breadcrumbs -->
					<div class="page-content">
						
						
<?
function firstName($name_f){
	$language = $_SESSION["wording"];
	if($language == "EN"){
		if($name_f == "���"){
			$name_f = "Mr.";
		}
		else if($name_f == "�ҧ"){
			$name_f = "Mrs.";
		}
		else if($name_f == "�ҧ���"){
			$name_f = "Miss";
		}
		else if($name_f == "����ѷ�ӡѴ"){
			$name_f = "Co.";
		}
		else if($name_f == "��ҧ�����ǹ�ӡѴ"){
			$name_f = "limited partnership";
		}
		else{
			$name_f = $name_f;
		}
	}
	return $name_f;
}
?>