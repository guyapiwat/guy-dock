<? include("global.php");?>
<?
$_SESSION["perbuy"] = 1;
?>

<script type="text/javascript" src="js/jquery.1.11.0.min.js"></script>
<script type="text/javascript"> 
$(function(){
/*	����ö����¹�ҡ citizen_ �繤�ҷ���ͧ���  */
	$("input[name^='zip_']").keyup(function(event){
		if(event.keyCode==5){
			if($(this).val().length==0){
				$(this).prev("input").focus();  
			}
			return false;
		}		    
		if($(this).val().length==$(this).attr("maxLength")){
			$(this).next("input").focus();
		}
	});	
});
$(function(){
/*	����ö����¹�ҡ citizen_ �繤�ҷ���ͧ���  */
	$("input[name^='czip_']").keyup(function(event){
		if(event.keyCode==5){
			if($(this).val().length==0){
				$(this).prev("input").focus();  
			}
			return false;
		}		    
		if($(this).val().length==$(this).attr("maxLength")){
			$(this).next("input").focus();
		}
	});	
});
$(function(){
/*	����ö����¹�ҡ citizen_ �繤�ҷ���ͧ���  */
	$("input[name^='acc_no_']").keyup(function(event){
		if(event.keyCode==10){
			if($(this).val().length==0){
				$(this).prev("input").focus();  
			}
			return false;
		}		    
		if($(this).val().length==$(this).attr("maxLength")){
			$(this).next("input").focus();
		}
	});	
});

</script>
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
function autoTab(obj){
	/* ��˹��ٻẺ��ͤ�������� _ ᷹������á��� ���ǵ����������ͧ����
	�����ѭ�ѡɳ������� �蹡�˹���  �ٻẺ�Ţ���ѵû�ЪҪ�
	4-2215-54125-6-12 ������ö��˹���  _-____-_____-_-__
	�ٻẺ�������Ѿ�� 08-4521-6521 ��˹��� __-____-____
	���͡�˹������� 12:45:30 ��˹��� __:__:__
	������ҧ��ҧ��ҧ�繡�á�˹��ٻẺ�Ţ�ѵû�ЪҪ�
	*/
		var pattern=new String("_-____-_____-__-_"); // ��˹��ٻẺ㹹��
		var pattern_ex=new String("-"); // ��˹��ѭ�ѡɳ���������ͧ���·������㹹��
		var returnText=new String("");
		var obj_l=obj.value.length;
		var obj_l2=obj_l-1;
		for(i=0;i<pattern.length;i++){			
			if(obj_l2==i && pattern.charAt(i+1)==pattern_ex){
				returnText+=obj.value+pattern_ex;
				obj.value=returnText;
			}
		}
		if(obj_l>=pattern.length){
			obj.value=obj.value.substr(0,pattern.length);			
		}
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
     var req = Inint_AJAX(); //���ҧ Object
	 req.open('GET', 'search_zipcode.php?value='+encodeURIComponent(value)+'&value1='+encodeURIComponent(value1)+'&value2='+encodeURIComponent(value2), true); //��˹� ʶҹС�÷ӧҹ�ͧ AJAX Ẻ GET ����觢����ż�ҹ�ҧ URL
      req.onreadystatechange = function() { //�˵ء�ó�������ա�õͺ��Ѻ
       if (req.readyState==4) {
              if (req.status==200) { //���Ѻ��õͺ��Ѻ���º����
                    var data=req.responseText; //��ͤ���������Ҩҡ��÷ӧҹ�ͧ test3.php
					if(data == 1234){
						 document.getElementById("czip").value=''; //�ʴ���
					}else{
						 document.getElementById("czip").value=data.replace(/^\s+|\s+$/g,""); //�ʴ���
					}
               }
          }
     };
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //Header ������
     req.send(null); //�ӡ����
}

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
  <p><?=$wording_lan["tab4"]["3_9"]?> : <?=$uid?><br>
  <?
  
   $sqlLog1 = "SELECT sys_id,logdate,logtime FROM ".$dbprefix."log  WHERE object ='$id' and subject = '".$wording_lan["tab1_mem_98"]."' order by id desc";
$rs1=mysql_query($sqlLog1);
	if(mysql_num_rows($rs1) > 0){
			$obj1 = mysql_fetch_object($rs1);
		echo ' <br>Key Update : '.$obj1->sys_id.' ,Date : '.$obj1->logdate.' ,Time : '.$obj1->logtime;
	}
	
	?></p>
<div class="row">
	<div class="table-header">&nbsp��ͧ�ҧ��õԴ���</div>
	<div class="col-xs-12 col-sm-4">
		<div class="widget-box">
			<div class="widget-header">
				<h4 class="widget-title">�����ż����Ѥ�</h4>
			</div>

			<div class="widget-body">
				<div class="widget-main">
					<label for="form-field-mask-1">
						<small class="text-success">���Ѿ���ҹ</small>
					</label>

					<!-- #section:plugins/input.masked-input -->
					<div class="input-group col-sm-9">
						<input class="form-control" type="text" id="home_t" name="home_t"  value="<?=$data["home_t"]?>" />
					</div>

					<label for="form-field-mask-1">
						<small class="text-success">���Ѿ����Ͷ��</small>
					</label>

					<!-- #section:plugins/input.masked-input -->
					<div class="input-group col-sm-9">
						<input class="form-control" type="text" name="mobile" id="mobile"  value="<?=$data["mobile"]?>"  />
					</div>

					<label for="form-field-mask-1">
						<small class="text-success">�����</small>
					</label>

					<!-- #section:plugins/input.masked-input -->
					<div class="input-group col-sm-9">
						<input class="form-control" type="text" name="fax" id="fax"  value="<?=$data["fax"]?>"  />
					</div>

					<label for="form-field-mask-1">
						<small class="text-success">�������</small>
					</label>

					<!-- #section:plugins/input.masked-input -->
					<div class="input-group col-sm-9">
						<input class="form-control" type="text" name="email" id="email" value="<?=$data["email"]?>"  />
					</div>

					<label for="form-field-mask-1">
						<small class="text-success">Line ID</small>
					</label>

					<!-- #section:plugins/input.masked-input -->
					<div class="input-group col-sm-9">
						<input class="form-control" type="text" name="line_id" id="line_id"   value="<?=$data["line_id"]?>"  />
					</div>

					<label for="form-field-mask-1">
						<small class="text-success">Facebook</small>
					</label>

					<!-- #section:plugins/input.masked-input -->
					<div class="input-group col-sm-9">
						<input class="form-control" type="text" name="facebook_name" id="facebook_name"  value="<?=$data["facebook_name"]?>" />
					</div>

				</div>
			</div>
		</div>
	</div><!-- /.span -->

	<div class="col-xs-12 col-sm-4">
		<div class="widget-box">
			<div class="widget-header">
				<h4 class="widget-title">�����ż����Ѥ�����</h4>
			</div>

			<div class="widget-body">
				<div class="widget-main">
					<div>
						<label for="form-field-mask-1">
						<small class="text-success">���Ѿ���ҹ</small>
					</label>

					<!-- #section:plugins/input.masked-input -->
					<div class="input-group col-sm-9">
						<input class="form-control" type="text" id="chome_t" name="chome_t" value="<?=$data["chome_t"]?>" />
					</div>

					<label for="form-field-mask-1">
						<small class="text-success">���Ѿ����Ͷ��</small>
					</label>

					<!-- #section:plugins/input.masked-input -->
					<div class="input-group col-sm-9">
						<input class="form-control" type="text"  id="cmobile" name="cmobile" value="<?=$data["cmobile"]?>"/>
					</div>

					<label for="form-field-mask-1">
						<small class="text-success">�����</small>
					</label>

					<!-- #section:plugins/input.masked-input -->
					<div class="input-group col-sm-9">
						<input class="form-control" type="text"  id="cfax" name="cfax" value="<?=$data["cfax"]?>" />
					</div>

					<label for="form-field-mask-1">
						<small class="text-success">�������</small>
					</label>

					<!-- #section:plugins/input.masked-input -->
					<div class="input-group col-sm-9">
						<input class="form-control" type="text"  id="cemail" name="cemail" value="<?=$data["cemail"]?>" />
					</div>

						<!-- /section:plugins/input.masked-input -->
					</div>
				</div>
			</div>
		</div>
	</div><!-- /.span -->

	<div class="col-xs-12 col-sm-4">
		<div class="widget-box">
			<div class="widget-header">
				<h4 class="widget-title">�����������Ѻ�Ѵ�� / ���͡���</h4>
			</div>

			<div class="widget-body">
				<div class="widget-main">
					<div>

						<label for="form-field-mask-1">
							<small class="text-success">�Ţ���/��ͧ</small>
						</label>

						<!-- #section:plugins/input.masked-input -->
						<div class="input-group col-sm-9">
							<input class="form-control" type="text" id="caddress" name="caddress" value="<?=$data["caddress"]?>" />
						</div>

						<label for="form-field-mask-1">
							<small class="text-success">�Ҥ��	</small>
						</label>

						<!-- #section:plugins/input.masked-input -->
						<div class="input-group col-sm-9">
							<input class="form-control" type="text" id="cbuilding" name="cbuilding" value="<?=$data["cbuilding"]?>" />
						</div>

						<label for="form-field-mask-1">
							<small class="text-success">�����ҹ/�͹�	</small>
						</label>

						<!-- #section:plugins/input.masked-input -->
						<div class="input-group col-sm-9">
							<input class="form-control" type="text" id="cvillage" name="cvillage" value="<?=$data["cvillage"]?>" />
						</div>

						<label for="form-field-mask-1">
							<small class="text-success">��͡/���	</small>
						</label>

						<!-- #section:plugins/input.masked-input -->
						<div class="input-group col-sm-9">
							<input class="form-control" type="text" id="csoi" name="csoi" value="<?=$data["csoi"]?>" />
						</div>

						<label for="form-field-mask-1">
							<small class="text-success">���	</small>
						</label>

						<!-- #section:plugins/input.masked-input -->
						<div class="input-group col-sm-9">
							<input class="form-control" type="text" id="cstreet" name="cstreet" value="<?=$data["cstreet"]?>" />
						</div>

						<div class="clearfix">&nbsp</div>
						
						<label for="form-field-mask-1">
							<small class="text-success"><?
							
							if($cprovinceId==""){
								include("cthaiaddress.php");	
							}else{
							//	var_dump($cprovinceId);
								include("cthaiaddressshow.php");
							}
							?></small>
						</label>

						<div class="clearfix"></div>

						<label for="form-field-mask-1">
							<small class="text-success">������ɳ���	</small>
						</label>

						<!-- #section:plugins/input.masked-input -->
						<div class="input-group">
							<input class="form-control" type="text" id="czip" name="czip" value="<?=$data["czip"]?>" />
							<span class="input-group-btn">
								<button class="btn btn-sm btn-default" type="button" onClick="check_zipcode1(document.getElementById('cprovince').value,document.getElementById('camphur').value,document.getElementById('cdistrict').value)" >
									<i class="ace-icon fa fa-search bigger-110"></i>
									Search
								</button>
							</span>
						</div>

						<!-- /section:plugins/input.masked-input -->
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
				�ѹ�֡
			</button>
			&nbsp; &nbsp; &nbsp;
			<button class="btn" type="reset">
				<i class="ace-icon fa fa-undo bigger-110"></i>
				¡��ԡ
			</button>
	</div>
</div>



</form>