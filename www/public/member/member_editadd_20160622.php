<? 
session_start();
$_SESSION["type_regist"]=1;//  ��Ѥ� 300
include("global.php"); 
function func_check(){
	$sqll="SELECT price FROM ali_product WHERE pcode='".$GLOBALS["pcode_register"]."'";
	$res=mysql_query($sqll);
	if(mysql_num_rows($res)>0){
		$price=mysql_result($res,0,'price');
	}

	$sql="SELECT ewallet FROM ali_member WHERE mcode='".$_SESSION["usercode"]."' HAVING ewallet >= '$price'";
	$rs=mysql_query($sql);
	if(mysql_num_rows($rs)<1){
		echo "<script language='JavaScript'>alert('Ewallet �����§����Ѥ���Ҫԡ');window.history.back()</script>";	
		exit;
	}
}
func_check();
$result1=mysql_query("select * from ".$dbprefix."member where mcode = '{$_SESSION["usercode"]}'");

//echo "select * from ".$dbprefix."member where mcode = '{$_SESSION["usercode"]}'";
if(mysql_num_rows($result1) > 0){
	$row1 = mysql_fetch_object($result1);
	$ewallet = $row1->ewallet;
	$sql1 = "SELECT *  FROM ".$dbprefix."product where pcode = '0001' ";
	$rs1 = mysql_query($sql1);
	$total  = @mysql_result($rs1,0,'price');
	$pdesc  = @mysql_result($rs1,0,'pdesc');
	$tot_pv  = @mysql_result($rs1,0,'pv');
 
}

$result1=mysql_query("select * from ".$dbprefix."member where mcode = '{$_SESSION["usercode"]}'");
if(mysql_num_rows($result1) > 0){
	$row1 = mysql_fetch_object($result1);
	$ewallet = $row1->ewallet;
	$sql1 = "SELECT *  FROM ".$dbprefix."product where pcode = '".$GLOBALS["pcode_register"]."' ";
	$rs1 = mysql_query($sql1);
	$total  = @mysql_result($rs1,0,'price');
	$pdesc  = @mysql_result($rs1,0,'pdesc');
	$tot_pv  = @mysql_result($rs1,0,'pv');
	if($ewallet < $total){
		echo "<script language='JavaScript'>alert('".$wording_lan["operate"]["11"]."');window.location='index.php?sessiontab=1'</script>";	
		exit;
	}
}

if(!empty($_GET["upa_code"]))$upa_code = $_GET["upa_code"];
if(!empty($_GET["upa_name"]))$upa_name = $_GET["upa_name"];
if(!empty($_GET["lr"]))$lr = $_GET["lr"];
?>
<script type="text/javascript">

function check_dash(ele)
{
	var vchar = String.fromCharCode(event.keyCode);
	if ((vchar<'0' || vchar>'9') ) return false;
	ele.onKeyPress=vchar;
}

function getRadioValueByName(name){

		if(name == '���')document.forms[0].sex[0].checked = true;
		if(name == '�ҧ���')document.forms[0].sex[1].checked = true;
		if(name == '�ҧ')document.forms[0].sex[1].checked = true;
	}
function getRadioValueByName1(name){
		if(name == '���')document.forms[0].csex[0].checked = true;
		if(name == '�ҧ���')document.forms[0].csex[1].checked = true;
		if(name == '�ҧ')document.forms[0].csex[1].checked = true;
	}
 function checkForm(frm)
  {

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
function sendget_sponsor(value) {
     var req = Inint_AJAX(); //���ҧ Object
	// alert(value)
	value = str_pad(value,7,0,false);
	//alert(test);
     req.open('GET', 'search_memberm.php?value='+encodeURIComponent(value), true); //��˹� ʶҹС�÷ӧҹ�ͧ AJAX Ẻ GET ����觢����ż�ҹ�ҧ URL
     req.onreadystatechange = function() { //�˵ء�ó�������ա�õͺ��Ѻ
          if (req.readyState==4) {
               if (req.status==200) { //���Ѻ��õͺ��Ѻ���º����
                    var data=req.responseText; 
					var myarr = data.split("|");
			 			 
					 //��ͤ���������Ҩҡ��÷ӧҹ�ͧ test3.php
					//alert(req.responseText);
					if(data == 1234){
					document.getElementById('sp_code').value="";
					document.getElementById("sp_name").value="������������§ҹ";
					document.getElementById("l1").innerHTML="";//�ʴ���
					document.getElementById("l2").innerHTML="";
					document.getElementById("l3").innerHTML="";

					}else{
					document.getElementById('sp_code').value=value;
                    document.getElementById("sp_name").value=myarr[0].trim();
					document.getElementById("l1").innerHTML="���� "+myarr[1];//�ʴ���
					document.getElementById("l2").innerHTML="���� "+myarr[2];
					document.getElementById("l3").innerHTML="���� "+myarr[3];

					}
					//alert(data);
					//if(data == "No Data"){
					//	alert('a');
					//	document.getElementById("mcode").innerHTML="";}
					
               }
          }
     };
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //Header ������
     req.send(null); //�ӡ����
};
function sendget_sponsor1(value,value1) {
	if(value1 == ''){
		alert('Please Choose Sponser First');
		document.getElementById('upa_code').value="";
		exit;
	}
     var req = Inint_AJAX(); //���ҧ Object
	// alert(value)
	value = str_pad(value,7,0,false);
	value1 = str_pad(value1,7,0,false);
	//alert(value);
	//alert(value1);

     req.open('GET', 'search_member11.php?value='+encodeURIComponent(value)+'&value1='+encodeURIComponent(value1), true); //��˹� ʶҹС�÷ӧҹ�ͧ AJAX Ẻ GET ����觢����ż�ҹ�ҧ URL
     req.onreadystatechange = function() { //�˵ء�ó�������ա�õͺ��Ѻ
          if (req.readyState==4) {
               if (req.status==200) { //���Ѻ��õͺ��Ѻ���º����
                    var data=req.responseText; //��ͤ���������Ҩҡ��÷ӧҹ�ͧ test3.php
					//alert(req.responseText);
					if(data == 1234){
					document.getElementById('upa_code').value="";
					document.getElementById("upa_name").value="������������§ҹ";
					}else{
						var myArray = data.split(':');
						var left = myArray[0];
						var right = myArray[1];
						var name = myArray[2];
						var left = left.trim();
						
						 if(left == '1' && right == '1'){
							alert('�Ѿ�Ź��բ� 2 ��ҹ����');
							document.getElementById('upa_code').value="";
							document.forms[0].lr[0].disabled = true;
							document.forms[0].lr[0].checked = false;
							document.forms[0].lr[1].disabled = true;
							document.forms[0].lr[1].checked = false;
						}else {
							var l_alert = document.forms[0].lr[0].checked;
							var r_alert = document.forms[0].lr[1].checked;
							if(left == '1'){
								if(l_alert == true)alert('�Ѿ�Ź��մ�ҹ���� ������');
								document.forms[0].lr[0].disabled = true;
								document.forms[0].lr[0].checked = false;
							}
							else {
								document.forms[0].lr[0].disabled = false;
							}

							if(right == '1'){
								if(r_alert == true)alert('�Ѿ�Ź��մ�ҹ��� ������');
								document.forms[0].lr[1].disabled = true;
								document.forms[0].lr[1].checked = false;
							}
							else {
								document.forms[0].lr[1].disabled = false;
							}
							document.getElementById('upa_code').value=value;
							document.getElementById("upa_name").value=name; //�ʴ���
						 }
						

						 
						
					}
					//alert(data);
					//if(data == "No Data"){
					//	alert('a');
					//	document.getElementById("mcode").innerHTML="";}
					
               }
          }
     };
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //Header ������
     req.send(null); //�ӡ����
};
</script>
<script language="javascript" type="text/javascript" src="./datetimepick/datetimepicker.js"></script>
<script language="javascript" type="text/javascript" src="./js/newcheck.js"></script>
<script language="javascript">
function onclickaddress(){

//alert(document.forms[0].chkaddress.checked);
	if(document.forms[0].chkaddress.checked == true){
		document.getElementById('caddress').value=document.getElementById('address').value;
	  document.getElementById('caddress').value=document.getElementById('address').value;
	  document.getElementById('cbuilding').value=document.getElementById('building').value;
	  document.getElementById('cvillage').value=document.getElementById('village').value;
	  document.getElementById('csoi').value=document.getElementById('soi').value;
	  document.getElementById('cstreet').value=document.getElementById('street').value;
	checkaddress(document.getElementById('cprovince').value=document.getElementById('province').value,document.getElementById('camphur').value=		document.getElementById('amphur').value,document.getElementById('cdistrict').value=document.getElementById('district').value);
	  document.getElementById('czip_1').value=document.getElementById('zip_1').value;
	  }else{
		document.getElementById('caddress').value='';
	  document.getElementById('caddress').value='';
	  document.getElementById('cbuilding').value='';
	  document.getElementById('cvillage').value='';
	  document.getElementById('csoi').value='';
	  document.getElementById('cstreet').value='';
		checkaddress('','','');
	  document.getElementById('czip_1').value='';
	  
	  }
}
function check_zipcode(value,value1,value2) {
     var req = Inint_AJAX(); //���ҧ Object
	// alert(value)
	//value = str_pad(value,7,0,false);
	//alert(value);
	//alert(value);alert(value1);alert(value2);
     req.open('GET', 'search_zipcode.php?value='+encodeURIComponent(value)+'&value1='+encodeURIComponent(value1)+'&value2='+encodeURIComponent(value2), true); //��˹� ʶҹС�÷ӧҹ�ͧ AJAX Ẻ GET ����觢����ż�ҹ�ҧ URL
     req.onreadystatechange = function() { //�˵ء�ó�������ա�õͺ��Ѻ
          if (req.readyState==4) {
               if (req.status==200) { //���Ѻ��õͺ��Ѻ���º����
                    var data=req.responseText; //��ͤ���������Ҩҡ��÷ӧҹ�ͧ test3.php
				//	alert(req.responseText);
					//alert(data);
					if(data == 1234){
						 document.getElementById("zip_1").value=''; //�ʴ���
					}else{
					//	alert(data);
						 document.getElementById("zip_1").value=data.replace(/^\s+|\s+$/g,""); //�ʴ���
					}
               }
          }
     };
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //Header ������
     req.send(null); //�ӡ����
}
function check_zipcode1(value,value1,value2) {
     var req = Inint_AJAX(); //���ҧ Object
	// alert(value)
	//value = str_pad(value,7,0,false);
	//alert(value);
	//alert(value);alert(value1);alert(value2);
     req.open('GET', 'search_zipcode.php?value='+encodeURIComponent(value)+'&value1='+encodeURIComponent(value1)+'&value2='+encodeURIComponent(value2), true); //��˹� ʶҹС�÷ӧҹ�ͧ AJAX Ẻ GET ����觢����ż�ҹ�ҧ URL
     req.onreadystatechange = function() { //�˵ء�ó�������ա�õͺ��Ѻ
          if (req.readyState==4) {
               if (req.status==200) { //���Ѻ��õͺ��Ѻ���º����
                    var data=req.responseText; //��ͤ���������Ҩҡ��÷ӧҹ�ͧ test3.php
				//	alert(req.responseText);
					//alert(data);
					if(data == 1234){
						 document.getElementById("czip_1").value=''; //�ʴ���
					}else{
					//	alert(data);
						 document.getElementById("czip_1").value=data.replace(/^\s+|\s+$/g,""); //�ʴ���
					}
               }
          }
     };
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //Header ������
     req.send(null); //�ӡ����
}
function checkaddress(value,value1,value2) {
     var req = Inint_AJAX(); //���ҧ Object
	// alert(value)
	//value = str_pad(value,7,0,false);
	//alert(value);
     req.open('GET', 'search_addressm.php?value='+encodeURIComponent(value)+'&value1='+encodeURIComponent(value1)+'&value2='+encodeURIComponent(value2), true); //��˹� ʶҹС�÷ӧҹ�ͧ AJAX Ẻ GET ����觢����ż�ҹ�ҧ URL
     req.onreadystatechange = function() { //�˵ء�ó�������ա�õͺ��Ѻ
          if (req.readyState==4) {
               if (req.status==200) { //���Ѻ��õͺ��Ѻ���º����
                    var data=req.responseText; //��ͤ���������Ҩҡ��÷ӧҹ�ͧ test3.php
				//	alert(req.responseText);
					if(data == 1234){
					//document.getElementById("mname").innerHTML="������������§ҹ";
					}else{
					//	alert(data);
                    document.getElementById("idchksaddress").innerHTML=data; //�ʴ���
					}
               }
          }
     };
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //Header ������
     req.send(null); //�ӡ����
}
function imembercheck(){
	sendget_sponsor1(document.getElementById('upa_code').value,document.getElementById('sp_code').value);
	/*var val = document.getElementById('mcode').value;
	var field = "mcode";
	var flag = "1-7-0-1-0";
	var errDesc = '<?=$wording_lan["tab1_mem_73"]?>';*/
	
	var val = '';
	var field = "";
	var flag = "";
	var errDesc = '';



	var val = document.getElementById('upa_name').value;
	var field = "upa_name";
	var flag = "1-0-0-0-0";
	var errDesc = '�����Ѿ�Ź�';
	
	val = val + ","+document.getElementById('upa_code').value;
    field = field +",upa_code";
    flag = flag+",1-7-0-0-0-0";
    errDesc = errDesc + ",�����Ѿ�Ź�";
	
	val = val + ","+document.getElementById('sp_code').value;
    field = field +",sp_code";
    flag = flag+",1-7-0-0-0-0";
    errDesc = errDesc + ",���ʼ���й�";

	val = val + ","+document.getElementById('sp_name').value;
    field = field +",sp_name";
    flag = flag+",1-0-0-0-0-0";
    errDesc = errDesc + ",���ͼ���й�";

    val = val + ","+document.getElementById('name_f').value;
    field = field +",name_f";
    flag = flag+",1-0-0-0-0";
    errDesc = errDesc + ",�ӹ�˹�Ҫ���";

    val = val + ","+document.getElementById('name_t').value;
    field = field +",name_t";
    flag = flag+",1-0-0-0-0";
    errDesc = errDesc + ",����-���ʡ��";

    val = val + ","+document.getElementById('birthday1').value;
    field = field +",birthday1";
    flag = flag+",1-0-0-0-0";
    errDesc = errDesc + ",�ѹ�Դ";
	
	 val = val + ","+document.getElementById('birthday2').value;
    field = field +",birthday2";
    flag = flag+",1-0-0-0-0";
    errDesc = errDesc + ",��͹�Դ";

	 val = val + ","+document.getElementById('birthday3').value;
    field = field +",birthday3";
    flag = flag+",1-0-0-0-0";
    errDesc = errDesc + ",���Դ";
  
  
    val = val + ","+document.getElementById('id_card').value;
    field = field +",id_card";
    flag = flag+",1-0-0-0-0";
    errDesc = errDesc + ",�Ţ��Шӵ�ǻ�ЪҪ�";

    val = val + ","+document.getElementById('mobile').value;
    field = field +",mobile";
    flag = flag+",1-0-0-0-0";
    errDesc = errDesc + ",������";


	val = val + ","+document.getElementById('address').value;
    field = field +",address";
    flag = flag+",1-0-0-0-0";
    errDesc = errDesc + ",�Ţ���/��ͧ";

	val = val + ","+document.getElementById('province').value;
    field = field +",province";
    flag = flag+",1-0-0-0-0";
    errDesc = errDesc + ",�ѧ��Ѵ";

	val = val + ","+document.getElementById('amphur').value;
    field = field +",amphur";
    flag = flag+",1-0-0-0-0";
    errDesc = errDesc + ",�����";

	val = val + ","+document.getElementById('district').value;
    field = field +",district";
    flag = flag+",1-0-0-0-0";
    errDesc = errDesc + ",�Ӻ�";

	val = val + ","+document.getElementById('zip_1').value;
    field = field +",zip_1";
    flag = flag+",1-0-0-0-0";
    errDesc = errDesc + ",������ɳ���";

	val = val + ","+document.getElementById('caddress').value;
    field = field +",caddress";
    flag = flag+",1-0-0-0-0";
    errDesc = errDesc + ",�Ţ���/��ͧ �Ѵ��";

	val = val + ","+document.getElementById('cprovince').value;
    field = field +",cprovince";
    flag = flag+",1-0-0-0-0";
    errDesc = errDesc + ",�ѧ��Ѵ �Ѵ��";

	val = val + ","+document.getElementById('camphur').value;
    field = field +",camphur";
    flag = flag+",1-0-0-0-0";
    errDesc = errDesc + ",����� �Ѵ��";

	val = val + ","+document.getElementById('cdistrict').value;
    field = field +",cdistrict";
    flag = flag+",1-0-0-0-0";
    errDesc = errDesc + ",�Ӻ� �Ѵ��";

	val = val + ","+document.getElementById('czip_1').value;
    field = field +",czip_1";
    flag = flag+",1-0-0-0-0";
    errDesc = errDesc + ",������ɳ��� �Ѵ��";

   
    if(document.getElementById('email').value != ''){
        var Email=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
        if(!document.getElementById('email').value.match(Email)){
        alert('<?=$wording_lan["info_main_1"]["25"]?>');
        document.getElementById('email').focus();
        exit;
        }

    }
	/*if( document.getElementById('sumpv').value <1500){
		alert("�ʹ�Թ��Ң�鹵�� 1500 PV ��س����͡�Թ���");
		document.getElementById('ok').disabled=true;
		exit;
	}*/
		
	/*    if(mobile != ''){
        if(mobile.charAt(0) != '0'){
            alert('������Ͷ�͵�ͧ��鹵鹴��� �ٹ��');
            exit;
        }
    }*/
	
    if(document.getElementById('national').value == 'Thailand'){
        var a = document.getElementById('id_card').value;
        var id_card = "";
        var t = a.split("-");  //�������äᵡ��ŧ array t
        for(var i=0; i<t.length ; i++){
            id_card = id_card+ t[i];
        }
        var id = document.getElementById('id_card').value;
        
            if( id.charAt(0) < 1 || id.charAt(0) > 8 ) {alert("�Ţ�ѵû�ЪҪ����������"); document.getElementById('ok').disabled = true;document.getElementById('id_card').focus();exit;}
            for(i=0,sum=0;i<12;i++){
                sum += parseInt(id.charAt(i))*(13-i);
            }
            sum = sum%11;
            if(sum <= 1) 
                sum = 1-sum;
            else
                sum = 11-sum;
            if(sum != parseInt(id.charAt(12))){alert("�Ţ�ѵû�ЪҪ����������");document.getElementById('ok').disabled = true;document.getElementById('id_card').focus();
			exit;}

        val = val + ","+document.getElementById('id_card').value;
        field = field +",id_card";
        flag = flag+",1-13-0-1-0";
        errDesc = errDesc + ",�Ţ�ѵû�ЪҪ����������";
        
    }
    document.getElementById('checkstate').innerHTML= "<img align='center' src='./images/loading.gif' />";
    startRQ(field,val,"",flag,errDesc,"member","checkstate");
}
function chknum(key){
	if(key>=48&&key<=57)
		return true;
	else
		return false;
}
</script>
<?
$sql = "SELECT MAX(mcode) AS code FROM ".$dbprefix."member 
		";
$rs = mysql_query($sql);
$code = mysql_result($rs,0,'code');
$code = substr($code,1);
$mcode = gencode($code+1);
$sv_code = substr($mcode,3,strlen($mcode));
mysql_free_result($rs);
	if($_GET['id']){
		exit;
	}else{
		if (isset($_GET["sp_code"])){$sp_code=$_GET["sp_code"];}
		if (isset($_GET["sp_name"])){$sp_name=$_GET["sp_name"];}
		if (isset($_GET["upa_code"])){$upa_code=$_GET["upa_code"];}
		if (isset($_GET["upa_name"])){$upa_name=$_GET["upa_name"];}
		if (isset($_GET["lr"])){$lr=$_GET["lr"];}
	}
?>
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
<div id="err">
  
</div>
<form name='frm' method="post" onKeyDown="document.getElementById('ok').disabled=true;" action="memoperate.php?state=<?=$_GET['id']==""?0:1?>" onSubmit="return checkForm(this)">

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
							<div class="profile-info-value">�����ż���й�</div>

							<div class="profile-info-value">
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> ���ʼ���й� </div>

							<div class="input-group">
								<input class="form-control" type="text" id="sp_code" name="sp_code" value="">
								<span class="input-group-btn">
								<button class="btn btn-sm btn-default" type="button" onclick="sendget_sponsor(document.getElementById('sp_code').value)" >
									<i class="ace-icon fa fa-search bigger-110"></i>
									Search
								</button>
								</span>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> ���ͼ���й� </div>

							<div class="input-group col-sm-9 col-xs-9">
								<input type="text" id="sp_name" name="sp_name" readonly placeholder="" class="form-control">
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name">&nbsp</div>

							<div class="profile-info-value">
								<span class="editable" id="age">&nbsp</span>
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
							<div class="profile-info-value">�������Ѿ�Ź�</div>

							<div class="profile-info-value">
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> �����Ѿ�Ź� </div>

							<div class="input-group">
								<input class="form-control" type="text" id="upa_code" name="upa_code" value="<?=$upa_code?>">
								<span class="input-group-btn">
								<button class="btn btn-sm btn-default" type="button" onclick="sendget_sponsor1(document.getElementById('upa_code').value,document.getElementById('sp_code').value)"  >
									<i class="ace-icon fa fa-search bigger-110"></i>
									Search
								</button>
								</span>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> �����Ѿ�Ź� </div>

							<div class="input-group col-sm-9 col-xs-9">
								<input class="form-control" type="text" id="upa_code" name="upa_code" readonly value="<?=$upa_name?>" >
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name">��ҹ</div>
							<div class="control-group">
								<div class="radio">
									<?
									$rs = mysql_query("SELECT * FROM ".$dbprefix."lr_def");
									for($i=0;$i<mysql_num_rows($rs);$i++){
									?>
									<label>
										<input name="form-field-radio" onClick="document.getElementById('ok').disabled=true;" type="radio"   disabled="disabled" name="lr" id="lr"
										<?=$lr==mysql_result($rs,$i,'lr_id')?"checked":""?>
										value="<?=mysql_result($rs,$i,'lr_id')?>"
										class="ace" />
										<span class="lbl">&nbsp&nbsp<?=mysql_result($rs,$i,'lr_name')?></span>
									</label>
									<?}?>
								</div>
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
							<div class="profile-info-value">�����ż����Ѥ�</div>

							<div class="profile-info-value">
							</div>
						</div>
						<div class="profile-info-row">
							<div class="profile-info-name"> �ӹ�˹�Ҫ��� </div>

							<div class="profile-info-value">
								<div class="controls">
									<select class="span2" name="name_f" id="name_f" onchange="getRadioValueByName(this.value);document.getElementById('name_ff').value=this.value;if(this.value == '123'){document.getElementById('name_ff').value = '';document.getElementById('name_ff').disabled  = false;document.getElementById('name_ff').focus();}else {document.getElementById('name_ff').disabled = true;}">
									  <option value="" selected="">�ӹ�˹��</option>
									  <option value="���">���</option>
									  <option value="�ҧ���">�ҧ���</option>
									  <option value="�ҧ">�ҧ</option>
									  <option value="123">����</option>
									</select>
									<input class="span4" type="text" name="name_ff" disabled id="name_ff" value="" tabindex="24">
								</div>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> ����-���ʡ�� ���� ���͹ԵԺؤ�� </div>

							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input class="form-control" type="text" id="name_t" name="name_t" value="">
								</div>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> Name & LastName or Company Name </div>

							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input class="form-control" type="text" id="name_e" name="name_e" value="">
								</div>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> ���ͷҧ��áԨ </div>

							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input class="form-control" type="text" id="name_b" name="name_b" value="">
								</div>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> �� </div>

							<div class="control-group">
								
								<div class="radio">
									<label>
										<input type="radio" class="ace" id='sex'  name='sex' value="&#3594;&#3634;&#3618;"></input>
										<span class="lbl">&nbsp&nbsp ���</span>
									</label>
									<label>
										<input type="radio" class="ace" id='sex'  name='sex' value="&#3627;&#3597;&#3636;&#3591;" />
										<span class="lbl">&nbsp&nbsp ˭ԧ</span>
									</label>
								</div>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> �ѹ����Դ </div>

							<div class="profile-info-value">
								<div class="controls">
									<select class="span2" name="birthday1"  id="birthday1">
										<option value=""><?=$wording_lan["tab1_mem_82"]?></option>
										<?PHP
										$year =  1; for ($i = 0; $i <= 30; $i++) {echo "<option ".(gencode2($birthday1)==gencode2($year)?"selected":"")." value='".gencode2($year)."' >".gencode2($year)."</option>"; $year++;}
										?>
									</select>
									<select  class="span2" name="birthday2"  id="birthday2">
										<option value=""><?=$wording_lan["tab1_mem_83"]?></option>
										<?PHP
										$year =  1; for ($i = 0; $i <= 11; $i++) {echo "<option ".(gencode2($birthday2)==gencode2($year)?"selected":"")." value='".gencode2($year)."' >".gencode2($year)."</option>"; $year++;}
										?>
									</select>
									<select class="span2" name="birthday3"  id="birthday3" >
									<option value=""><?=$wording_lan["tab1_mem_84"]?></option>
									 <?PHP
										if($_SESSION["m_locationbase"] == '1'){
										$year = date("Y")+543 - 18; for ($i = 0; $i <= 62; $i++) {echo "<option ".($birthday3==$year?"selected":"")." value='$year'>$year</option>"; $year--;}
										}else{
										$year = date("Y") - 18; for ($i = 0; $i <= 62; $i++) {echo "<option ".($birthday3==$year?"selected":"")." value='$year'>$year</option>"; $year--;}	
										}
									?>
									</select>
								</div>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> �ѭ�ҵ� </div>

							<div class="profile-info-value">
								<div class="controls">
									<select class="span4" name="national" id="national" >
									 <?					
									  if(empty($national))$national = $_SESSION["m_cname"];
										$result1=mysql_query("select * from ".$dbprefix."nation order by nation");
										for ($i=1;$i<=mysql_num_rows($result1);$i++){
											$row1 = mysql_fetch_object($result1);
											//echo "<option value=\"\" ";
											echo "<option value=\"".$row1->nation."\" ";
											if($national=="") {echo "selected";}
											if ($national==$row1->nation) {echo "selected";}
											echo ">".$row1->nation."</option>";
										}
										?>
									</select>
								</div>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> �Ţ��Шӵ�ǻ�ЪҪ�/��ʻ��� </div>

							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input class="form-control" type="text" id="id_card" name="id_card" value="">
								</div>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> �Ţ����¹�ԵԺؤ�� </div>

							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input class="form-control" type="text" id="id_tax" name="id_tax" value="">
								</div>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> ���Ѿ���ҹ </div>

							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input class="form-control" type="text" id="home_t" name="home_t" value="">
								</div>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> ���Ѿ����Ͷ�� </div>

							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input class="form-control" type="text" id="mobile" name="mobile" value="">
								</div>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> �����	 </div>

							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input class="form-control" type="text" id="fax" name="fax" value="">
								</div>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> ������� </div>

							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input class="form-control" type="text" id="email" name="email" value="">
								</div>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> Line ID </div>

							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input class="form-control" type="text" id="line_id" name="line_id" value="">
								</div>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> Facebook </div>

							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input class="form-control" type="text" id="facebook_name" name="facebook_name" value="">
								</div>
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
							<div class="profile-info-value">�����ż����Ѥ�����</div>

							<div class="profile-info-value">
							</div>
						</div>
						<div class="profile-info-row">
							<div class="profile-info-name"> �ӹ�˹�Ҫ��� </div>

							<div class="profile-info-value">
								<div class="controls">
									<select class="span2" name="cname_f" id="cname_f" onchange="getRadioValueByName1(this.value);document.getElementById('cname_ff').value=this.value;if(this.value == '123'){document.getElementById('cname_ff').value = ''; document.getElementById('cname_ff').disabled  = false;document.getElementById('cname_ff').focus();}else {document.getElementById('cname_ff').disabled  = true;}">
									  <option value="" selected="">�ӹ�˹��</option>
									  <option value="���">���</option>
									  <option value="�ҧ���">�ҧ���</option>
									  <option value="�ҧ">�ҧ</option>
									  <option value="123">����</option>
									</select>
									<input class="span4" type="text" name="cname_ff" id="cname_ff" value="" tabindex="24">
								</div>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> ����-���ʡ�� ���� ���͹ԵԺؤ�� </div>

							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input class="form-control" type="text" id="cname_t" name="cname_t" value="">
								</div>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> Name & LastName or Company Name </div>

							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input class="form-control" type="text" id="cname_e" name="cname_e" value="">
								</div>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> ���ͷҧ��áԨ </div>

							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input class="form-control" type="text" id="cname_b" name="cname_b" value="">
								</div>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> �� </div>

							<div class="control-group">
								
								<div class="radio">
									<label>
										<input type="radio" id="csex" name="csex" class="ace" value="&#3594;&#3634;&#3618;" />
										<span class="lbl">&nbsp&nbsp ���</span>
									</label>
									<label>
										<input type="radio" id="csex" name="csex" class="ace" value="&#3627;&#3597;&#3636;&#3591;"/>
										<span class="lbl">&nbsp&nbsp ˭ԧ</span>
									</label>
								</div>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> �ѹ����Դ </div>

							<div class="profile-info-value">
								<div class="controls">
									<select class="span2" name="cbirthday1"  id="cbirthday1">
										<option value=""><?=$wording_lan["tab1_mem_82"]?></option>
										<?PHP
										$year =  1; for ($i = 0; $i <= 30; $i++) {echo "<option ".(gencode2($birthday1)==gencode2($year)?"selected":"")." value='".gencode2($year)."' >".gencode2($year)."</option>"; $year++;}
										?>
									</select>
									<select  class="span2" name="cbirthday2"  id="cbirthday2">
										<option value=""><?=$wording_lan["tab1_mem_83"]?></option>
										<?PHP
										$year =  1; for ($i = 0; $i <= 11; $i++) {echo "<option ".(gencode2($birthday2)==gencode2($year)?"selected":"")." value='".gencode2($year)."' >".gencode2($year)."</option>"; $year++;}
										?>
									</select>
									<select class="span2" name="cbirthday3"  id="cbirthday3" >
									<option value=""><?=$wording_lan["tab1_mem_84"]?></option>
									 <?PHP
										if($_SESSION["m_locationbase"] == '1'){
										$year = date("Y")+543 - 18; for ($i = 0; $i <= 62; $i++) {echo "<option ".($birthday3==$year?"selected":"")." value='$year'>$year</option>"; $year--;}
										}else{
										$year = date("Y") - 18; for ($i = 0; $i <= 62; $i++) {echo "<option ".($birthday3==$year?"selected":"")." value='$year'>$year</option>"; $year--;}	
										}
									?>
									</select>
								</div>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> �ѭ�ҵ� </div>

							<div class="profile-info-value">
								<div class="controls">
									<select class="span4" name="cnational" id="cnational" >
									 <?					
									  if(empty($cnational))$cnational = $_SESSION["m_cname"];
										$result1=mysql_query("select * from ".$dbprefix."nation order by nation");
										for ($i=1;$i<=mysql_num_rows($result1);$i++){
											$row1 = mysql_fetch_object($result1);
											//echo "<option value=\"\" ";
											echo "<option value=\"".$row1->nation."\" ";
											if($cnational=="") {echo "selected";}
											if ($cnational==$row1->nation) {echo "selected";}
											echo ">".$row1->nation."</option>";
										}
										?>
									</select>
								</div>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> �Ţ��Шӵ�ǻ�ЪҪ�/��ʻ��� </div>

							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input class="form-control" type="text" id="cid_card" name="cid_card" value="">
								</div>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> �Ţ����¹�ԵԺؤ�� </div>

							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input class="form-control" type="text" id="cid_tax" name="cid_tax" value="">
								</div>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> ���Ѿ���ҹ </div>

							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input class="form-control" type="text" id="chome_t" name="chome_t" value="">
								</div>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> ���Ѿ����Ͷ�� </div>

							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input class="form-control" type="text" id="cmobile" name="cmobile" value="">
								</div>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> �����	 </div>

							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input class="form-control" type="text" id="cfax" name="cfax" value="">
								</div>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> ������� </div>

							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input class="form-control" type="text" id="cemail" name="cemail" value="">
								</div>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> Line ID </div>

							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input class="form-control" type="text" id="cline_id" name="cline_id" value="">
								</div>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> Facebook </div>

							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input class="form-control" type="text" id="cfacebook_name" name="cfacebook_name" value="">
								</div>
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
							<div class="profile-info-value">�������������¹��ҹ</div>

							<div class="profile-info-value">
							</div>
						</div>
	
						<div class="profile-info-row">
							<div class="profile-info-name">�Ţ���/��ͧ</div>

							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input class="form-control" type="text" id="address" name="address" value="">
								</div>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name">�Ҥ��</div>

							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input class="form-control" type="text" id="building" name="building" value="">
								</div>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name">�����ҹ/�͹�</div>

							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input class="form-control" type="text" id="village" name="village" value="">
								</div>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name">��͡/���</div>

							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input class="form-control" type="text" id="soi" name="soi" value="">
								</div>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name">���</div>

							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input class="form-control" type="text" id="street" name="street" value="">
								</div>
							</div>
						</div>
						 <? 
							if($_SESSION["m_locationbase"] == '1'){
								if($provinceId==""){
									include("thaiaddress.php");
								}else{
									include("thaiaddressshow.php");
								}
							}else{
						?>
						<div class="profile-info-row">
							<div class="profile-info-name">�ѧ��Ѵ</div>

							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input class="form-control" type="text" id="provinceId" name="provinceId" value="">
								</div>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name">�����</div>

							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input class="form-control" type="text" id="amphurId" name="amphurId" value="">
								</div>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name">�Ӻ�</div>

							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input class="form-control" type="text" id="districtId" name="districtId" value="">
								</div>
							</div>
						</div>
						<? } ?>

						<div class="profile-info-row">
							<div class="profile-info-name">������ɳ���</div>

							<div class="input-group">
								<input class="form-control" type="text" id="zip" name="zip" value="">
								<span class="input-group-btn">
								<button class="btn btn-sm btn-default" type="button" onClick="check_zipcode(document.getElementById('cprovince').value,document.getElementById('camphur').value,document.getElementById('cdistrict').value)"  >
									<i class="ace-icon fa fa-search bigger-110"></i>
									Search
								</button>
								</span>
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
							<div class="profile-info-value">�����������Ѻ�Ѵ�� / ���͡��� </div>

							<div class="profile-info-value">
							</div>
						</div>
	
						<div class="profile-info-row">
							<div class="profile-info-name">�Ţ���/��ͧ</div>

							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input class="form-control" type="text" id="caddress" name="caddress" value="">
								</div>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name">�Ҥ��</div>

							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input class="form-control" type="text" id="cbuilding" name="cbuilding" value="">
								</div>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name">�����ҹ/�͹�</div>

							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input class="form-control" type="text" id="cvillage" name="cvillage" value="">
								</div>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name">��͡/���</div>

							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input class="form-control" type="text" id="cstreet" name="cstreet" value="">
								</div>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name">���</div>

							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input class="form-control" type="text" id="csoi" name="csoi" value="">
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
							<div class="profile-info-name">�ѧ��Ѵ</div>

							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input class="form-control" type="text" id="cprovinceId" name="cprovinceId" value="">
								</div>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name">�����</div>

							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input class="form-control" type="text" id="camphurId" name="camphurId" value="">
								</div>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name">�Ӻ�</div>

							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input class="form-control" type="text" id="cdistrictId" name="cdistrictId" value="">
								</div>
							</div>
						</div>
						<? } ?>

						<div class="profile-info-row">
							<div class="profile-info-name">������ɳ���</div>

							<div class="input-group">
								<input class="form-control" type="text" id="czip" name="czip" value="">
								<span class="input-group-btn">
								<button class="btn btn-sm btn-default" type="button" onClick="check_zipcode1(document.getElementById('cprovince').value,document.getElementById('camphur').value,document.getElementById('cdistrict').value)"  >
									<i class="ace-icon fa fa-search bigger-110"></i>
									Search
								</button>
								</span>
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
							<div class="profile-info-value">�����š���Ѻ�Ż���ª��</div>

							<div class="profile-info-value">
							</div>
						</div>
						<div class="profile-info-row">
							<div class="profile-info-name"> ��Ҥ�� </div>

							<div class="profile-info-value">
								<div class="controls">
									<select class="span4" size="1" name="bankcode" id="bankcode" tabindex="28"  >
									<?					
									$result1=mysql_query("select * from ".$dbprefix."bank order by bankname");
									for ($i=1;$i<=mysql_num_rows($result1);$i++){
										$row1 = mysql_fetch_object($result1);
										//echo "<option value=\"\" ";
										echo "<option value=\"".$row1->bankcode."\" ";
										if($bankcode==""&&$row1->bankcode==26) {echo "selected";}
										if ($bankcode==$row1->bankcode) {echo "selected";}
										echo ">".$row1->bankname."</option>";
									}
									?>
								</select>
								</div>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> �Ң� </div>

							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input class="form-control" type="text" id="branch" name="branch" value="">
								</div>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> �������ѭ��	 </div>

							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input class="form-control" readonly type="text" id="acc_type" name="acc_type" value="�����Ѿ��">
								</div>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> �Ţ���ѭ�� </div>

							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input class="form-control" type="text" id="acc_no" name="acc_no" value="">
								</div>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> ���ͺѭ�� </div>

							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input class="form-control" type="text" id="acc_name" name="acc_name" value="">
								</div>
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
							<div class="profile-info-value">����Ѻ�Ż���ª��ҧ��áԨ</div>

							<div class="profile-info-value">
							</div>
						</div>
						<div class="profile-info-row">
							<div class="profile-info-name"> �ӹ�˹�Ҫ���</div>

							<div class="profile-info-value">
								<div class="controls">
									<select class="span2" name="iname_f" id="iname_f" onChange="document.getElementById('iname_ff').value=this.value;if(this.value == '123'){document.getElementById('iname_ff').value = ''; document.getElementById('iname_ff').readOnly  = false;document.getElementById('iname_ff').focus();}else {document.getElementById('iname_ff').readOnly  = true;}" >
									  <option value="" selected="">�ӹ�˹��</option>
									  <option value="���">���</option>
									  <option value="�ҧ���">�ҧ���</option>
									  <option value="�ҧ">�ҧ</option>
									  <option value="123">����</option>
									</select>
									<input class="span4" type="text" name="iname_ff"  id="iname_ff" readonly value="" tabindex="24">
								</div>
							</div>						
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> ����-ʡ�� </div>

							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input class="form-control" type="text" id="iname_f" name="iname_f" value="">
								</div>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> ��������ѹ�� </div>

							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input class="form-control" type="text" id="irelation" name="irelation" value="">
								</div>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> ���Ѿ��</div>

							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input class="form-control" type="text" id="iphone" name="iphone" value="">
								</div>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> �Ţ�ѵû�ЪҪ� </div>

							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input class="form-control" type="text" id="iid_card" name="iid_card" value="">
								</div>
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
<center>
	<button class="btn btn-info" type="button" onClick="<?=(isset($_GET['id'])?"emembercheck()":"imembercheck()")?>" >
		<i class="ace-icon fa-dot-circle-o bigger-110"></i>
		��Ǩ�ͺ
	</button>
	&nbsp; &nbsp; &nbsp;
	<button class="btn btn-info" name="ok"  id="ok" disabled  type="submit">
		<i class="ace-icon fa fa-check bigger-110"></i>
		�ѹ�֡
	</button>
	&nbsp; &nbsp; &nbsp;
	<button class="btn" type="reset">
		<i class="ace-icon fa fa-undo bigger-110"></i>
		¡��ԡ
	</button>
</center>

</form>
					<div class="space-6"></div>
					<div class="space-6"></div>
					<div class="space-6"></div>
					<div class="space-6"></div>
					<div class="space-6"></div>
					<div class="space-6"></div>
					<div class="space-6"></div>
					<div class="space-6"></div>
		</div><!-- /.page-content -->
	</div>
</div><!-- /.main-content -->