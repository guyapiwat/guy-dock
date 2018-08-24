<? include("global.php");?>
<?
$_SESSION["perbuy"] = 1;
?>

<script type="text/javascript" src="js/jquery.1.11.0.min.js"></script>
<script type="text/javascript">
 function checkForm(frm)
  {
    //
    // check form input values
    //

    frm.ok.disabled = true;
    frm.ok.value = "Please wait...";
    return true;
  }
function Inint_AJAX() {
   try { return new ActiveXObject("Msxml2.XMLHTTP"); } catch(e) {} //IE
   try { return new ActiveXObject("Microsoft.XMLHTTP"); } catch(e) {} //IE
   try { return new XMLHttpRequest(); } catch(e) {} //Native Javascript
   alert("XMLHttpRequest not supported")
   return null
}
function str_pad(input, pad_length, pad_string, pad_type){ 
for(i=input.length; i<pad_length; i++){ 
if(pad_type) 
input = input + pad_string; 
else 
input = pad_string + input; 
} 
return input; 
} 
function check_zipcode1(value,value1,value2) {
     var req = Inint_AJAX(); //สร้าง Object
	 req.open('GET', 'search_zipcode.php?value='+encodeURIComponent(value)+'&value1='+encodeURIComponent(value1)+'&value2='+encodeURIComponent(value2), true); //กำหนด สถานะการทำงานของ AJAX แบบ GET และส่งข้อมูลผ่านทาง URL
      req.onreadystatechange = function() { //เหตุการณ์เมื่อมีการตอบกลับ
       if (req.readyState==4) {
              if (req.status==200) { //ได้รับการตอบกลับเรียบร้อย
                    var data=req.responseText; //ข้อความที่ได้มาจากการทำงานของ test3.php
					if(data == 1234){
						 document.getElementById("czip").value=''; //แสดงผล
					}else{
						 document.getElementById("czip").value=data.replace(/^\s+|\s+$/g,""); //แสดงผล
					}
               }
          }
     };
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //Header ที่ส่งไป
     req.send(null); //ทำการส่ง
}
</script>

<script language="javascript" type="text/javascript" src="./datetimepick/datetimepicker1.js"></script>
<script language="javascript" type="text/javascript" src="./js/newcheck.js"></script>
<script language="javascript">
function emembercheck(){
	document.getElementById('checkstate').innerHTML= "<img align='center' src='./images/loading.gif' />";
	//alert(skipval);
	startRQ(field,val,skipval,flag,errDesc,"member","checkstate");
}

function chknum(key){
	if(key>=48&&key<=57)
		return true;
	else
		return false;
}
</script>

<?
	$_GET['id'] = $cmc = $_SESSION["usercode"];
	$data = get_detail_meber($cmc);
	$imgphoto = posimg($data["pos_cur"]);
	$status=get_status($cmc,date('Y-m-d'),$data['pos_cur']);
	$cprovinceId = $data["cprovinceId"];
	$camphurId = $data["camphurId"];
	$cdistrictId = $data["cdistrictId"];
	$provinceId = $data["provinceId"];
	$amphurId = $data["amphurId"];
	$districtId = $data["districtId"];

	//echo $cprovinceId.' : '.$camphurId.' : '.$cdistrictId.'<br>';
	$amphur = $amphurId = $camphurId = $camphur = getamphurId($camphurId);
	$province = $provinceId = $cprovinceId = $cprovince = getprovinceId($cprovinceId);
	$district = $districtId = $cdistrictId = $cdistrict = getdistrictId1($cdistrictId,$camphurId,$cprovinceId);
	//$amphurId = $amphur = getamphurId($amphurId);
	//$provinceId = $province = getprovinceId($provinceId);	
	//$districtId = $district = getdistrictId1($districtId,$amphurId,$provinceId);

	//echo $cprovinceId.' : '.$camphurId.' : '.$cdistrictId;
   ////////////// PV LR //////////////////////
	$point = new point_member;
	$bmbonus = $point->get_bmbonus($dbprefix,$cmc);
	$pos_cur = $point->position($dbprefix,'calc_poschange','pos_cur',$cmc);
	$pos_cur2 = $point->position($dbprefix,'calc_poschange2','pos_cur2',$cmc);
	$mtype1 = $arr_mtype1[$cmc["mtype"]];
 
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

?>
<div id="err"></div>
<!--onKeyDown="document.getElementById('ok').disabled=true;"-->
<form name='frm' method="post"  action="memoperate1.php?state=<?=$_GET['id']==""?0:1?>"  onsubmit="return checkForm(this)" >
  <p>
    <input type="hidden" name="oid" value="<?=$oid?>">
  </p>
<div class="row">
	<div class="table-header">&nbsp<?=$wording_lan["tab4"]["4_12"]?></div>
	<div class="col-xs-12 col-sm-4">
		<div class="widget-box">
			<div class="widget-header">
				<h4 class="widget-title"><?=$wording_lan["tab1_mem_11"]?></h4>
			</div>

			<div class="widget-body">
				<div class="profile-user-info profile-user-info-striped">
					<div class="profile-info-row">
						<div class="profile-info-name"> <?=$wording_lan["tab1_mem_28"]?> </div>
						<div class="profile-info-value">
							<div class="input-group col-sm-11 col-xs-11">
								<input class="form-control" type="text" id="home_t" name="home_t"  value="<?=$data["home_t"]?>" >
							</div>
						</div>
					</div>

					<div class="profile-info-row">
						<div class="profile-info-name"> <?=$wording_lan["tab1_mem_29"]?> </div>
						<div class="profile-info-value">
							<div class="input-group col-sm-11 col-xs-11">
								<input class="form-control" type="text" id="mobile" name="mobile" value="<?=$data["mobile"]?>">
							</div>
						</div>
					</div>

					<div class="profile-info-row">
						<div class="profile-info-name"> <?=$wording_lan["tab1_mem_30"]?> </div>
						<div class="profile-info-value">
							<div class="input-group col-sm-11 col-xs-11">
								<input class="form-control" type="text" id="fax" name="fax" value="<?=$data["fax"]?>">
							</div>
						</div>
					</div>

					<div class="profile-info-row">
						<div class="profile-info-name"> <?=$wording_lan["tab1_mem_31"]?> </div>
						<div class="profile-info-value">
							<div class="input-group col-sm-11 col-xs-11">
								<input class="form-control" type="text" id="email" name="email" value="<?=$data["email"]?>">
							</div>
						</div>
					</div>

					<div class="profile-info-row">
						<div class="profile-info-name"> Line ID </div>
						<div class="profile-info-value">
							<div class="input-group col-sm-11 col-xs-11">
								<input class="form-control" type="text" id="line_id" name="line_id" value="<?=$data["line_id"]?>">
							</div>
						</div>
					</div>

					<div class="profile-info-row">
						<div class="profile-info-name"> Facebook </div>
						<div class="profile-info-value">
							<div class="input-group col-sm-11 col-xs-11">
								<input class="form-control" type="text" id="facebook_name" name="facebook_name" value="<?=$data["facebook_name"]?>">
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div><!-- /.span -->

	<div class="col-xs-12 col-sm-4">
		<div class="widget-box">
			<div class="widget-header">
				<h4 class="widget-title"><?=$wording_lan["tab1_mem_12"]?></h4>
			</div>

			<div class="widget-body">
				<div class="profile-user-info profile-user-info-striped">
					<div class="profile-info-row">
						<div class="profile-info-name"> <?=$wording_lan["tab1_mem_28"]?> </div>
						<div class="profile-info-value">
							<div class="input-group col-sm-11 col-xs-11">
								<input class="form-control" type="text" id="chome_t" name="chome_t"  value="<?=$data["chome_t"]?>" >
							</div>
						</div>
					</div>

					<div class="profile-info-row">
						<div class="profile-info-name"> <?=$wording_lan["tab1_mem_29"]?> </div>
						<div class="profile-info-value">
							<div class="input-group col-sm-11 col-xs-11">
								<input class="form-control" type="text" id="cmobile" name="cmobile"  value="<?=$data["cmobile"]?>" >
							</div>
						</div>
					</div>

					<div class="profile-info-row">
						<div class="profile-info-name"> <?=$wording_lan["tab1_mem_30"]?> </div>
						<div class="profile-info-value">
							<div class="input-group col-sm-11 col-xs-11">
								<input class="form-control" type="text" id="cfax" name="cfax"  value="<?=$data["cfax"]?>" >
							</div>
						</div>
					</div>

					<div class="profile-info-row">
						<div class="profile-info-name"> <?=$wording_lan["tab1_mem_31"]?> </div>
						<div class="profile-info-value">
							<div class="input-group col-sm-11 col-xs-11">
								<input class="form-control" type="text" id="cemail" name="cemail"  value="<?=$data["cemail"]?>" >
							</div>
						</div>
					</div>

					<div class="profile-info-row">
						<div class="profile-info-name"> Line ID </div>
						<div class="profile-info-value">
							<div class="input-group col-sm-11 col-xs-11">
								<input class="form-control" type="text" id="cline_id" name="cline_id"  value="<?=$data["cline_id"]?>" >
							</div>
						</div>
					</div> 

					<div class="profile-info-row">
						<div class="profile-info-name"> Facebook</div>
						<div class="profile-info-value">
							<div class="input-group col-sm-11 col-xs-11">
								<input class="form-control" type="text" id="cfacebook_name" name="cfacebook_name"  value="<?=$data["cfacebook_name"]?>" >
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div><!-- /.span -->

	<div class="col-xs-12 col-sm-4">
		<div class="widget-box">
			<div class="widget-header">
				<h4 class="widget-title"><?=$wording_lan["tab1_mem_74"]?></h4>
			</div>

			<div class="widget-body">
				<div class="profile-user-info profile-user-info-striped">
					<div class="profile-info-row">
						<div class="profile-info-name"> <?=$wording_lan["tab1_mem_39"]?> </div>
						<div class="profile-info-value">
							<div class="input-group col-sm-11 col-xs-11">
								<input class="form-control" type="text" id="caddress" name="caddress"  value="<?=$data["caddress"]?>" >
							</div>
						</div>
					</div>

					<div class="profile-info-row">
						<div class="profile-info-name"> <?=$wording_lan["tab1_mem_40"]?> </div>
						<div class="profile-info-value">
							<div class="input-group col-sm-11 col-xs-11">
								<input class="form-control" type="text" id="cbuilding" name="cbuilding"  value="<?=$data["cbuilding"]?>" >
							</div>
						</div>
					</div>

					<div class="profile-info-row">
						<div class="profile-info-name"> <?=$wording_lan["tab1_mem_41"]?></div>
						<div class="profile-info-value">
							<div class="input-group col-sm-11 col-xs-11">
								<input class="form-control" type="text" id="cvillage" name="cvillage"  value="<?=$data["cvillage"]?>" >
							</div>
						</div>
					</div>

					<div class="profile-info-row">
						<div class="profile-info-name"> <?=$wording_lan["tab1_mem_42"]?></div>
						<div class="profile-info-value">
							<div class="input-group col-sm-11 col-xs-11">
								<input class="form-control" type="text" id="csoi" name="csoi"  value="<?=$data["csoi"]?>" >
							</div>
						</div>
					</div>

					<div class="profile-info-row">
						<div class="profile-info-name"> <?=$wording_lan["tab1_mem_43"]?></div>
						<div class="profile-info-value">
							<div class="input-group col-sm-11 col-xs-11">
								<input class="form-control" type="text" id="cstreet" name="cstreet"  value="<?=$data["cstreet"]?>" >
							</div>
						</div>
					</div>
					
					<? 
						if($_SESSION["m_locationbase"] == '1'){
							if($provinceId==""){
								include("cthaiaddress.php");
							}else{
								include("cthaiaddressshow.php");
							}
						}else{
					?>
					<div class="profile-info-row">
						<div class="profile-info-name"><?=$wording_lan["tab1_mem_46"]?></div>

						<div class="profile-info-value">
							<div class="input-group col-sm-9 col-xs-9">
								<input class="form-control" type="text" id="cprovince" name="cprovince" value="<?=$data["cprovince"]?>">
							</div>
						</div>
					</div>

					<div class="profile-info-row">
						<div class="profile-info-name"><?=$wording_lan["tab1_mem_45"]?></div>

						<div class="profile-info-value">
							<div class="input-group col-sm-9 col-xs-9">
								<input class="form-control" type="text" id="camphur" name="camphur" value="<?=$data["camphur"]?>">
							</div>
						</div>
					</div>

					<div class="profile-info-row">
						<div class="profile-info-name"><?=$wording_lan["tab1_mem_44"]?></div>

						<div class="profile-info-value">
							<div class="input-group col-sm-9 col-xs-9">
								<input class="form-control" type="text" id="cdistrict" name="cdistrict" value="<?=$data["cdistrict"]?>">
							</div>
						</div>
					</div>
					<? } ?>

					<div class="profile-info-row">
						<div class="profile-info-name"><?=$wording_lan["tab1_mem_47"]?></div>

						<div class="input-group">
							<input class="form-control" type="text" id="czip" name="czip" value="<?=$data["czip"]?>">
							<span class="input-group-btn">
							<button class="btn btn-sm btn-default" type="button" onClick="check_zipcode1(document.getElementById('cprovince').value,document.getElementById('camphur').value,document.getElementById('cdistrict').value)"  >
								<i class="ace-icon fa fa-search bigger-110"></i>
								<?=$wording_lan["search"]?>
							</button>
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div><!-- /.span -->
</div><!-- /.row -->

<div class="row">
	<div class="clearfix form-actions center">
			<button class="btn btn-info" type="submit">
				<i class="ace-icon fa fa-check bigger-110"></i>
				<?=$wording_lan["tab1_mem_68"]?>
			</button>
			&nbsp; &nbsp; &nbsp;
			<button class="btn" type="reset">
				<i class="ace-icon fa fa-undo bigger-110"></i>
				<?=$wording_lan["tab1_mem_69"]?>
			</button>
	</div>
</div>



</form>