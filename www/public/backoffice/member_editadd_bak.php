<? include("global.php");?>
<?
$_SESSION["perbuy"] = 1;
?>

<script type="text/javascript" src="js/jquery-1.2.6.min.js"></script>
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
function sendget_sponsor(value) {
     var req = Inint_AJAX(); //���ҧ Object
	// alert(value)
	value = str_pad(value,7,0,false);
	//alert(test);
     req.open('GET', 'search_member.php?value='+encodeURIComponent(value), true); //��˹� ʶҹС�÷ӧҹ�ͧ AJAX Ẻ GET ����觢����ż�ҹ�ҧ URL
     req.onreadystatechange = function() { //�˵ء�ó�������ա�õͺ��Ѻ
          if (req.readyState==4) {
               if (req.status==200) { //���Ѻ��õͺ��Ѻ���º����
                    var data=req.responseText; //��ͤ���������Ҩҡ��÷ӧҹ�ͧ test3.php
					//alert(req.responseText);
					if(data == 1234){
					document.getElementById('sp_code').value="";
					document.getElementById("sp_name").value="������������§ҹ";
					}else{
					document.getElementById('sp_code').value=value;
                    document.getElementById("sp_name").value=data; //�ʴ���
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

     req.open('GET', 'search_member1.php?value='+encodeURIComponent(value)+'&value1='+encodeURIComponent(value1), true); //��˹� ʶҹС�÷ӧҹ�ͧ AJAX Ẻ GET ����觢����ż�ҹ�ҧ URL
     req.onreadystatechange = function() { //�˵ء�ó�������ա�õͺ��Ѻ
          if (req.readyState==4) {
               if (req.status==200) { //���Ѻ��õͺ��Ѻ���º����
                    var data=req.responseText; //��ͤ���������Ҩҡ��÷ӧҹ�ͧ test3.php
					//alert(req.responseText);
					if(data == 1234){
					document.getElementById('upa_code').value="";
					document.getElementById("upa_name").value="������������§ҹ";
					}else{
						document.getElementById('upa_code').value=value;
                    document.getElementById("upa_name").value=data; //�ʴ���
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

<script language="javascript" type="text/javascript" src="./datetimepick/datetimepicker1.js"></script>
<script language="javascript" type="text/javascript" src="./js/newcheck.js"></script>
<script language="javascript">
var wi=null;
function get_mem_listpicker_sp_code(){
		if (wi) wi.close();
		wi=window.open("mem_listpicker_sp_code.php?name="+this.frm.sp_name.value+"","list_picker_window","menubar=no,width=500,height=600,toolbar=no,scrollbars=1");
}
function get_mem_listpicker_upa_code(){
		if (wi) wi.close();
	wi=window.open("mem_listpicker_upa_code.php?name="+this.frm.upa_name.value+"","list_picker_window","menubar=no,width=500,height=600,toolbar=no,scrollbars=1");
}
function get_mem_listpicker_mcode_acc(){
		if (wi) wi.close();
	//alert(this.getElementById('mcode_acc_name').innerHTML);
	wi=window.open("mem_listpicker_mcode_acc.php?name=?","list_picker_window","menubar=no,width=500,height=600,toolbar=no,scrollbars=1");
	//wi=window.open("mem_listpicker_mcode_acc.php?name="+this.getElementById('mcode_acc_name').innerHTML+"","list_picker_window","menubar=no,width=500,height=600,toolbar=no,scrollbars=1");
}
function imembercheck(){
	/*var val = document.getElementById('mcode').value;
	//alert(val);
	var field = "mcode";
	var flag = "1-7-0-0-0";
	var errDesc = "������Ҫԡ";
	var id = document.getElementById('id_card').value;*/
	//alert(id);
	var i =0;
	var j =0;
	var sum =0;
	
/*	val = val + ","+document.getElementById('name_t').value;
	field = field +",name_t";
	flag = flag+",1-0-0-1-0";
	errDesc = errDesc + ",������Ҫԡ";
*/	
	
	//alert(document.getElementById('pos_cur').value);
	/*var radio=document.frm.pos_cur;
    var val11='';
    for(var i=0; i<radio.length;i++){
        if(radio[i].checked){
            val11=radio[i].value
            break;
        }
    }
	if(val11 == ''){
		alert("��س����͡���˹觴���");
		exit;
	}*/
  
	 var val = document.getElementById('sp_code').value;
	var field = "mcode";
	var flag = "1-0-0-0-0";
	var errDesc = "��س�������ʼ���й�";
	//val = val + ","+document.getElementById('sp_code').value;
	//field = field +",sp_code";
	//flag = flag+",1-0-0-0-0";
	//errDesc = errDesc + ",��س�������ʼ���й�";
	
	val = val + ","+document.getElementById('sp_name').value;
	field = field +",sp_name";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",���ʼ���йӼԴ��Ҵ��سҡ���";
	
	val = val + ","+document.getElementById('upa_code').value;
	field = field +",upa_code";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",��س���������Ѿ�Ź�";
	
	val = val + ","+document.getElementById('upa_name').value;
	field = field +",upa_name";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",�����Ѿ�Ź�Դ��Ҵ��سҡ���";
	
	val = val + ","+document.getElementById('mdate').value;
	field = field +",mdate";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",�ѹ�����Ѥ�";

	
	var a = document.getElementById('id_card').value;
	var id_card = "";
	var t = a.split("-");  //�������äᵡ��ŧ array t
	for(var i=0; i<t.length ; i++){
		id_card = id_card+ t[i];
	}
	val = val + ","+id_card;
	field = field +",id_card";
	flag = flag+",1-0-0-1-0";
	errDesc = errDesc + ",�Ţ�ѵû�ЪҪ� ";
	/*if(id.length != 17) {alert("�Ţ�ѵû�ЪҪ����ú");exit;
	}else{
	for(i=0,j=0, sum=0; i < 16; i++) {
			if(id.charAt(i) != '-'){	sum += parseFloat(id.charAt(i))*(13-j);j = j+1;}
		}
		if((11-sum%11)%10!=parseFloat(id.charAt(16))){alert("�Ţ�ѵû�ЪҪ����١���ͧ");exit;}
	}*/
	//alert((11-sum%11)%10);
	//alert(id.charAt(16));
	val = val + ","+document.getElementById('upa_code').value;
	field = field +",upa_code";
	flag = flag+",0-7-0-0-1-1";
	errDesc = errDesc + ",�����Ѿ�Ź�";
	
	val = val + ","+document.getElementById('sp_code').value;
	field = field +",sp_code";
	flag = flag+",0-7-0-0-1-1";
	errDesc = errDesc + ",���ʼ���й�";
	var lrval="";
	var object = eval(document.frm.lr);
	for(i=0;i<object.length;i++){
		if(object[i].checked==true)
			lrval = object[i].value;
	}
	if(lrval == ''){
		alert("��س����͡���¢��");
		exit;
	}
	if(document.getElementById('upa_code').value!=""){
		val = val + ","+lrval+"#"+document.getElementById('upa_code').value;
		field = field +",lr#upa_code";
		flag = flag+",1-0-0-1-0";
		errDesc = errDesc + ",��ҹ";
	}
	//alert(val);
//loop check
	document.getElementById('checkstate').innerHTML= "<img align='center' src='./images/loading.gif' />";
	startRQ(field,val,"",flag,errDesc,"member","checkstate");
}
function emembercheck(){
	var val = document.getElementById('mcode').value;
//check(nullCheck, sizeCheck, formatCheck, dupCheck, realCheck, idName, errmsg)
	var skipval = document.getElementById('omcode').value;
	var id = document.getElementById('id_card').value;
	var field = "mcode";
	var flag = "1-7-0-1-0";
	var errDesc = "������Ҫԡ";
	var i =0;
	var j =0;
	var sum =0;

	/*val = val + ","+document.getElementById('name_t').value;
	skipval = skipval+","+document.getElementById('oid_name_t').value;
	field = field +",name_t";
	flag = flag+",1-0-0-1-0";
	errDesc = errDesc + ",������Ҫԡ";*/
	val = val + ","+document.getElementById('name_t').value;
	field = field +",name_t";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",������Ҫԡ";
	
	val = val + ","+document.getElementById('mdate').value;
	skipval = skipval+",";
	field = field +",mdate";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",�ѹ�����Ѥ�";
	

	var a = document.getElementById('id_card').value;
	var id_card = "";
	var t = a.split("-");  //�������äᵡ��ŧ array t
	for(var i=0; i<t.length ; i++){
		id_card = id_card+ t[i];
	}

	val = val + ","+id_card;
	skipval = skipval+","+document.getElementById('oid_card').value;
	field = field +",id_card";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",�Ţ�ѵû�ЪҪ� ";


	/*if(id.length != 17) {alert("�Ţ�ѵû�ЪҪ����ú");
	}else{
	for(i=0,j=0, sum=0; i < 16; i++) {
			if(id.charAt(i) != '-'){	sum += parseFloat(id.charAt(i))*(13-j);j = j+1;}
		}
		if((11-sum%11)%10!=parseFloat(id.charAt(16))){
			alert("�Ţ�ѵû�ЪҪ����١���ͧ");
			//exit;
		}
	}*/
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
$sql = "SELECT MAX(mcode) AS code FROM ".$dbprefix."member  ";
$rs = mysql_query($sql);
$code = mysql_result($rs,0,'code');
//$bmcode = substr($code,2,$bcsize);
//$bmcode +=1;
//for($i=strlen($bmcode);$i<$bcsize;$i++){
	//$bmcode = "0".$bmcode;
//}
$mcode = gencode($code+1);
$sv_code = substr($mcode,3,strlen($mcode));
//$sv_code = rand(1000,9999);
mysql_free_result($rs);
	if($_GET['id']){
		$sql = "SELECT * FROM ".$dbprefix."member WHERE id='".$_GET['id']."' LIMIT 1";
		$rs = mysql_query($sql);
		if(mysql_num_rows($rs)<=0){
			$notfound = "[<a href=\"javascript:window.location='index.php?sessiontab=1';\">�˹����Ҫԡ</a>]";
        	dialogbox("50%","#990000","��辺�����ŵ�����͹�",$notfound);
			exit;
		}else{
			$row = mysql_fetch_object($rs);
			$id=$row->id;
			$oid=$row->id;
			$mcode=$row->mcode;
			$name_f=$row->name_f;
			$name_t=$row->name_t;
			$oid_name_t=$row->name_t;
			$name_e=$row->name_e;
			$name_b=$row->name_b;
			$sex=$row->sex;
			$age = $row->age;
			$occupation = $row->occupation;
			$status = $row->status;
			$mar_name = $row->mar_name;
			$mar_age = $row->mar_age;
			$email = $row->email;
			$beneficiaries = $row->beneficiaries;
			$relation = $row->relation;
			$national = $row->national;
			$mdate=$row->mdate;
			$birthday=$row->birthday;
			$national=$row->national;
			$id_tax=$row->id_tax;
			$oid_card=$id_card=$row->id_card;
			$oid_card1 = substr($oid_card, 0,1);
			$oid_card2 = substr($oid_card, 1,4);
			$oid_card3 = substr($oid_card, 5,5);
			$oid_card4 = substr($oid_card, 10,2);
			$oid_card5 = substr($oid_card, 12,1);
			$id_card = $od_card = $oid_card1.'-'.$oid_card2.'-'.$oid_card3.'-'.$oid_card4.'-'.$oid_card5;
			$address=$row->address;
			$provinceId=$row->provinceId;
			$amphurId=$row->amphurId;
			$districtId=$row->districtId;
			$zip=$row->zip;
			$home_t=$row->home_t;
			$fax = $row->fax;

			$mobile=$row->mobile;
			$mcode_acc=$row->mcode_acc;
			//$mcode_acc_name=get_data("name_t","member","mcode='$mcode_acc'");
			$bonusrec=$row->bonusrec;
			$bankcode=$row->bankcode;
			$branch=$row->branch;
			$acc_type=$row->acc_type;
			$acc_no=$row->acc_no;
			$acc_name=$row->acc_name;
			$acc_prov=$row->acc_prov;
			$sv_code=$row->sv_code;
			$sp_code=$row->sp_code;
			$sp_name=$row->sp_name;
			$upa_code=$row->upa_code;
			$upa_name=$row->upa_name;
			$modate=$row->modate;
			$stockist=$row->stockist;
			$inv_code=$row->inv_code;
			$usercode=$row->usercode;
			$posid=$row->posid;
			$pos_cur=$row->pos_cur;
			$memdesc=$row->memdesc;
			$bmdate1=$row->bmdate1;
			$bmdate2=$row->bmdate2;
			$olr=$lr=$row->lr;
			$cmp=$row->cmp;
			$cmp2=$row->cmp2;
			
			if ($mdate=="") {
				$mdate_d="";
				$mdate_m="";
				$mdate_y="";
			}
			else {
				$dash1=strpos($mdate,"-");
				$dash2=strpos($mdate,"-",$dash1+1);
				$mdate_d=substr($mdate,8);
				$mdate_m=substr($mdate,5,2);
				$mdate_y=substr($mdate,0,4);
				if ($mdate_y>"0"){
					$mdate_y+=543;
				}
				else {$mdate_y="";}
			}
			if ($birthday=="") {
				$birthday_d="";
				$birthday_m="";
				$birthday_y="";
			}
			else {
				$dash1=strpos($birthday,"-");
				$dash2=strpos($birthday,"-",$dash1+1);
				$birthday_d=substr($birthday,8);
				$birthday_m=substr($birthday,5,2);
				$birthday_y=substr($birthday,0,4);
				if ($birthday_y>"0"){
					$birthday_y+=543;
				}
				else {$birthday_y="";}
			}
			if ($modate=="") {
				$modate_d="";
				$modate_m="";
				$modate_y="";
			}
			else {
				$dash1=strpos($modate,"-");
				$dash2=strpos($modate,"-",$dash1+1);
				$modate_d=substr($modate,8);
				$modate_m=substr($modate,5,2);
				$modate_y=substr($modate,0,4);
				if ($modate_y>"0"){
					$modate_y+=543;
				}
				else {$modate_y="";}
			}
		}
	}else{
		if (isset($_GET["sp_code"])){$sp_code=$_GET["sp_code"];}
		if (isset($_GET["sp_name"])){$sp_name=$_GET["sp_name"];}
		if (isset($_GET["upa_code"])){$upa_code=$_GET["upa_code"];}
		if (isset($_GET["upa_name"])){$upa_name=$_GET["upa_name"];}
		if (isset($_GET["lr"])){$lr=$_GET["lr"];}
	}
?>
<div id="err"></div>
<form name='frm' method="post" onKeyDown="document.getElementById('ok').disabled=true;" action="memoperate.php?state=<?=$_GET['id']==""?0:1?>"  onsubmit="return checkForm(this)" >
  <input type="hidden" name="oid" value="<?=$oid?>">
  <table width="100%" border="0">
  	<tr bgcolor="#FFCC33"><td><b>�����Ÿ�áԨ</b></td></tr>
    <tr>
      <td>
<!--business information--> 
<table width="100%" border="0">
  <tr>
    <td colspan="2"><?  if(!empty($_GET["id"])){?>������Ҫԡ
      <input type="text" id="mcode" name="mcode" size="10" readonly="" maxlength="7" value="<?=$mcode?>"  />
      <input type="hidden" id="omcode" name="omcode" value="<?=$mcode?>" />
      <input type="hidden" name="id" readonly="readonly" size="10" value="<?=$id;?>" />
  &nbsp;&nbsp;&nbsp;<? }?></td>
    <td colspan="2">�ѹ�����Ѥ�

      <input type="text" id="mdate" name="mdate" size="10" maxlength="10" value="<?=($mdate==""?date("Y-m-d"):$mdate)?>" />
&nbsp;<a href="javascript:NewCal('mdate','yyyymmdd',false,24)"><img src="./datetimepick/images/cal.gif" width="16" height="16" border="0" alt="���͡�ѹ���" /></a><font color="#808080">(����-��-��)</font></td>
  </tr>
  
  <tr>
    <td width="12%" align="right">���ʼ���й�<font color="#ff0000">*</font></td>
    <td width="35%"><input style="background-color:#FFFFFF" type="text" name="sp_code" id="sp_code" size="20"  maxlength="20" value="<?=$sp_code?>" />
          <input name="button2" type="button" onClick="sendget_sponsor(document.getElementById('sp_code').value)" value="��" />
          <input name="button2" type="button" onClick="document.getElementById('ok').disabled=true;get_mem_listpicker_sp_code()" value="���͡" />
          <input name="button2" type="button" onClick="document.getElementById('sp_code').value='';document.getElementById('sp_name').value='';" value="ź" />          </td>
    <td width="12%" align="right">�����Ѿ�Ź�<font color="#ff0000">*</font></td>
    <td width="39%"><input style="background-color:#FFFFFF"  type="text" name="upa_code"  id="upa_code" size="20"  maxlength="20" value="<?=$upa_code?>" />
    <input name="button2" type="button" onClick="sendget_sponsor1(document.getElementById('upa_code').value,document.getElementById('sp_code').value)" value="��" />
      <input name="button3" type="button" onClick="document.getElementById('ok').disabled=true;get_mem_listpicker_upa_code()" value="���͡" />
      <input name="button2" type="button" onClick="document.getElementById('upa_code').value='';document.getElementById('upa_name').value='';" value="ź" />      </td>
  </tr>
  <tr>
    <td align="right">���ͼ���й�<font color="#ff0000">*</font></td>
    <td><input style="background-color:#CCCCCC" readonly type="text" name="sp_name" id="sp_name" size="40"  maxlength="40" value="<?=$sp_name?>" /></td>
    <td align="right">�����Ѿ�Ź�<font color="#ff0000">*</font></td>
    <td><input style="background-color:#CCCCCC" readonly type="text" name="upa_name" id="upa_name" size="40"  maxlength="40" value="<?=$upa_name?>" /></td>
  </tr>
  <tr>
    <td valign="top" align="right" >&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right">��ҹ<font color="#ff0000">*</font></td>
    <td><?
                	$rs = mysql_query("SELECT * FROM ".$dbprefix."lr_def");
					for($i=0;$i<mysql_num_rows($rs);$i++){
						?>
      <input onClick="document.getElementById('ok').disabled=true;" type="radio" name="lr" id="lr"  <?=$lr==mysql_result($rs,$i,'lr_id')?"checked":""?> value="<?=mysql_result($rs,$i,'lr_id')?>" />
      <?=mysql_result($rs,$i,'lr_name')?>
      <?
					
					}
					mysql_free_result($rs);
				?>
      <input type="hidden" name="olr" value="<?=$olr?>" />    </td>
  </tr>
   </table>
    </td></tr>
  	<tr bgcolor="#FFCC33">
  	  <td><b>��������Ҫԡ(APPLICANT INFORMATION)</b></td>
  	</tr>
    <tr>
      <td>
<!--member Information-->
<table width="100%" border="0">
  <tr>
    <td width="20%" align="right">�ӹ�˹�Ҫ���<font color="#ff0000">*</font>&nbsp;</td>
    <td width="31%"><select name="name_f" id="name_f">
                <option  value="" <?=($name_f==""?"selected":"")?>>���͡�ӹ�˹��</option>
                <option  value="���" <?=($name_f=="���"?"selected":"")?>>���</option>
                <option value="�ҧ���" <?=($name_f=="�ҧ���"?"selected":"")?>>�ҧ���</option>
                  <option value="�ҧ" <?=($name_f=="�ҧ"?"selected":"")?>>�ҧ</option> 
				  <option value="����ѷ�ӡѴ" <?=($name_f=="����ѷ�ӡѴ"?"selected":"")?>>����ѷ�ӡѴ</option>
             <option value="��ҧ�����ǹ�ӡѴ" <?=($name_f=="��ҧ�����ǹ�ӡѴ"?"selected":"")?>>��ҧ�����ǹ�ӡѴ</option>
              </select></td>
    <td width="10%" align="right">�������Ѩ�غѹ&nbsp;</td>
    <td width="39%"><textarea name="address" id="address" cols="50" rows="3" tabindex="14"><?=$address?></textarea></td>
  </tr>
  <tr>
    <td align="right">����-���ʡ�� &#3627;&#3619;&#3639;&#3629; ���͹ԵԺ�Ť��<font color="#ff0000">*</font>&nbsp;</td>
    <td><input onKeyUp="document.getElementById('name_b').value=this.value;document.getElementById('acc_name').value=this.value;" type="text" id="name_t" name="name_t" size="40" maxlength="40" value="<?=$name_t?>" tabindex="11"/><input type="hidden" name="oid_name_t" id="oid_name_t" maxlength="13" value="<?=$oid_name_t?>" /></td>
    <td colspan="2" rowspan="4" align="center">
	<? 
		if($provinceId==""){
			include("thaiaddress.php");
		}else{
			include("thaiaddressShow.php");
		}
	?></td>
    </tr>
	<tr>
    <td align="right">Name &amp; LastName&nbsp;</td>
    <td><input type="text" name="name_e" size="40" maxlength="40" value="<?=$name_e?>"  tabindex="13"/></td>
    </tr>
  
  <tr>
    <td align="right">��&#3656;ͷҧ��áԨ</td>
    <td><input type="text" id="name_b" name="name_b" size="40" maxlength="40" value="<?=$name_b?>" tabindex="12"/></td>
  </tr>
   <tr>
    <td align="right">��<font color="#ff0000">*</font>&nbsp;</td>
    <td><input type="radio" name="sex" value="���" tabindex="19" <? if($sex=="���") echo "checked=\"checked\""; ?>>���
        <input type="radio" name="sex" value="˭ԧ" tabindex="20" <? if($sex=="˭ԧ") echo "checked=\"checked\""; ?>>˭ԧ    </tr>
   <tr>
    <td align="right">�ѹ����Դ<font color="#ff0000">*</font>&nbsp;</td>
    <td><input type="text" name="birthday" size="10" maxlength="10" tabindex="21" value="<?=$birthday?>" />
&nbsp;<a href="javascript:NewCal('birthday','yyyymmdd',false,24)"><img src="./datetimepick/images/cal.gif" width="16" height="16" border="0" alt="���͡�ѹ���" /></a> <font color="#808080">(����-��-��)</font><font color="#ff0000">*&#3629;&#3634;&#3618;&#3640;&#3605;&#3657;&#3629;&#3591;&#3652;&#3617;&#3656;&#3605;&#3656;&#3635;&#3585;&#3623;&#3656;&#3634; 18 &#3611;&#3637;</font></td>
    <td align="right">������ɳ���&nbsp;</td>
    <td>
    <input name="zip_1" tabindex="18" type="text" id="zip_1" size="1" maxlength="1" style="width:15px;" value="<?=$zip[0]?>" onKeyPress="return chknum(window.event.keyCode)" />
    <input name="zip_2" type="text" id="zip_2" size="1" maxlength="1" style="width:15px;"value="<?=$zip[1]?>" onKeyPress="return chknum(window.event.keyCode)" /> 
  <input name="zip_3" type="text" value="<?=$zip[2]?>" id="zip_3" size="1" maxlength="1" style="width:15px;" onKeyPress="return chknum(window.event.keyCode)" /> 
  <input name="zip_4" type="text" value="<?=$zip[3]?>" id="zip_4" size="1" maxlength="1" style="width:15px;" onKeyPress="return chknum(window.event.keyCode)" /> 
  <input name="zip_5" type="text" id="zip_5" value="<?=$zip[4]?>" size="1" maxlength="1" style="width:15px;" onKeyPress="return chknum(window.event.keyCode)" />
   <!-- <input type="text" name="zip" size="10" maxlength="5" value="<?=$zip?>" />--></td>
  </tr>
   <tr>
    <td align="right">&nbsp;</td>
    <td ><input style="display:none" size="4" type="text" name="age" value="<?=$age?>" /></td>
    <td align="right">���Ѿ���ҹ&nbsp;</td>
    <td><input type="text" name="home_t"  maxlength="20" value="<?=$home_t?>" tabindex="25"/></td>
  </tr>
  <tr>
    <td   align="right">&nbsp;</td>
    <td ><input type="text"  style="display:none" name="occupation" value="<?=$occupation?>" /></td>
    <td align="right">���Ѿ����Ͷ��&nbsp;</td>
    <td><input type="text" name="mobile"  maxlength="20" value="<?=$mobile?>" tabindex="26"/></td>
  </tr>
  <tr>
    <td align="right">�ѭ�ҵ�&nbsp;</td>
    <td><input type="text" name="national" size="20"  tabindex="22" maxlength="20" value="<?=($national=="")?"��": $national;?>" /></td>
    <td align="right">�����&nbsp;</td>
    <td><input type="text" name="fax" value="<?=$fax?>" tabindex="27"/></td>
  </tr>
  <tr>
    <td align="right">�Ţ��Шӵ�ǻ�ЪҪ�<font color="#ff0000">*</font>&nbsp;</td>
    <td>  
  <!--<input name="citizen_1" type="text" id="citizen_1" size="1" maxlength="1" style="width:15px;" onkeypress="return chknum(window.event.keyCode)" /> - 
  <input name="citizen_2" type="text" id="citizen_2" size="1" maxlength="1" style="width:15px;" onkeypress="return chknum(window.event.keyCode)" /> 
  <input name="citizen_4" type="text" id="citizen_4" size="1" maxlength="1" style="width:15px;" onkeypress="return chknum(window.event.keyCode)" /> 
  <input name="citizen_5" type="text" id="citizen_5" size="1" maxlength="1" style="width:15px;" onkeypress="return chknum(window.event.keyCode)" /> 
  <input name="citizen_6" type="text" id="citizen_6" size="1" maxlength="1" style="width:15px;" onkeypress="return chknum(window.event.keyCode)" /> -
  <input name="citizen_6" type="text" id="citizen_6" size="1" maxlength="1" style="width:15px;" onkeypress="return chknum(window.event.keyCode)" />
  <input name="citizen_7" type="text" id="citizen_7" size="1" maxlength="1" style="width:15px;" onkeypress="return chknum(window.event.keyCode)" />
  <input name="citizen_8" type="text" id="citizen_8" size="1" maxlength="1" style="width:15px;" onkeypress="return chknum(window.event.keyCode)" />
  <input name="citizen_9" type="text" id="citizen_9" size="1" maxlength="1" style="width:15px;" onkeypress="return chknum(window.event.keyCode)" />
  <input name="citizen_10" type="text" id="citizen_10" size="1" maxlength="1" style="width:15px;" onkeypress="return chknum(window.event.keyCode)" /> -
  <input name="citizen_11" type="text" id="citizen_11" size="1" maxlength="1" style="width:15px;" onkeypress="return chknum(window.event.keyCode)" />
  <input name="citizen_12" type="text" id="citizen_12" size="1" maxlength="1" style="width:15px;" onkeypress="return chknum(window.event.keyCode)" /> -
  <input name="citizen_13" type="text" id="citizen_13" size="1" maxlength="1" style="width:15px;" onkeypress="return chknum(window.event.keyCode)" />
    -->
	 <input  name="id_card" id="id_card"  tabindex="23"  maxlength="17" type="text" value="<?=$id_card?>" onKeyPress="return chknum(window.event.keyCode)"  onKeyUp="autoTab(this)"  />
		<input type="hidden" name="oid_card" id="oid_card" maxlength="17" value="<?=$oid_card?>" />    </td>   
    <td align="right">&#3629;&#3637;&#3648;&#3617;&#3621;&#3621;&#3660;&nbsp;</td>
    <td><input type="text" name="email" id="email" value="<?=$email?>" tabindex="27"/></td>
 
    <!--
    <input type="text" name="id_card" id="id_card" maxlength="13" value="<?=$id_card?>" onkeypress="return chknum(window.event.keyCode)" />
    <td align="right">�Ѻ⺹�ʼ�ҹ</td>
    <td> <input type="radio" value="1" <? if ($bonusrec=="1") {echo "checked";}?> name="bonusrec">
                ��Ҥ��
                <input type="radio" <? if ($bonusrec=="2") {echo "checked";}?> name="bonusrec" value="2">
                �Ѻ�ͧ</td>
  </tr>-->
  <tr>
    <td align="right"> &#3614;&#3634;&#3626;&#3611;&#3629;&#3619;&#3660;&#3605; &#3627;&#3619;&#3639;&#3629; &#3648;&#3621;&#3586;&#3607;&#3632;&#3648;&#3610;&#3637;&#3618;&#3609;&#3609;&#3636;&#3605;&#3636;&#3610;&#3640;&#3588;&#3588;&#3621; &nbsp;</td>
    <td><input type="text" name="id_tax" value="<?=$id_tax?>" tabindex="24" /></td>
    <td align="right">��Ҥ��</td>
    <td><select size="1" name="bankcode" tabindex="28">
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
                </select></td>
  </tr>
  <tr>
    <td align="right" >&nbsp;</td>
    <td><!--<input type="radio" value="�ʴ" name="status" <? if($status=="�ʴ") echo "checked=\"checked\""; ?>>�ʴ
            <input type="radio" value="���� " name="status" <? if($status=="���� ") echo "checked=\"checked\""; ?>>���� 
            <input type="radio" value="����" name="status" <? if($status=="����") echo "checked=\"checked\""; ?>>����	--></td>
    <td align="right">�Ң�</td>
    <td><input type="text" name="branch" size="20" maxlength="50" value="<?=$branch?>" tabindex="29"></td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right">�������ѭ��</td>
    <td><input name="acc_type" type="radio" <? if($acc_type=="�����Ѿ��") echo "checked=\"checked\""; ?> value="�����Ѿ��" checked />�����Ѿ�� 
	<!--<input name="acc_type" type="radio" <? if($acc_type=="���������ѹ") echo "checked=\"checked\""; ?> value="���������ѹ"  />���������ѹ
	<input name="acc_type" type="radio" <? if($acc_type=="�ҡ��Ш�") echo "checked=\"checked\""; ?> value="�ҡ��Ш�" /> �ҡ��Ш�</td>-->  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right">�Ţ���ѭ��</td>
    <td><!--
    <input name="acc_no_1" type="text" id="acc_no_1" size="1" maxlength="1" style="width:15px;" value="<?=$acc_no[0]?>" onkeypress="return chknum(window.event.keyCode)" />
    <input name="acc_no_2" type="text" id="acc_no_2" size="1" maxlength="1" style="width:15px;"value="<?=$acc_no[1]?>" onkeypress="return chknum(window.event.keyCode)" /> 
  <input name="acc_no_3" type="text" value="<?=$acc_no[2]?>" id="acc_no_3" size="1" maxlength="1" style="width:15px;" onkeypress="return chknum(window.event.keyCode)" /> 
  <input name="acc_no_4" type="text" value="<?=$acc_no[3]?>" id="acc_no_4" size="1" maxlength="1" style="width:15px;" onkeypress="return chknum(window.event.keyCode)" /> 
  <input name="acc_no_5" type="text" id="acc_no_5" value="<?=$acc_no[4]?>" size="1" maxlength="1" style="width:15px;" onkeypress="return chknum(window.event.keyCode)" />
  <input name="acc_no_6" type="text" id="acc_no_6" size="1" maxlength="1" style="width:15px;" value="<?=$acc_no[5]?>" onkeypress="return chknum(window.event.keyCode)" />
    <input name="acc_no_7" type="text" id="acc_no_7" size="1" maxlength="1" style="width:15px;"value="<?=$acc_no[6]?>" onkeypress="return chknum(window.event.keyCode)" /> 
  <input name="acc_no_8" type="text" value="<?=$acc_no[7]?>" id="acc_no_8" size="1" maxlength="1" style="width:15px;" onkeypress="return chknum(window.event.keyCode)" /> 
  <input name="acc_no_9" type="text" value="<?=$acc_no[8]?>" id="acc_no_9" size="1" maxlength="1" style="width:15px;" onkeypress="return chknum(window.event.keyCode)" /> 
  <input name="acc_no_10" type="text" id="acc_no_10" value="<?=$acc_no[9]?>" size="1" maxlength="1" style="width:15px;" onkeypress="return chknum(window.event.keyCode)" />-->
    <input type="text" name="acc_no" id="acc_no" size="13"  maxlength="10" value="<?=$acc_no?>" tabindex="30" onKeyPress="return chknum(window.event.keyCode)" ></td>
  </tr>
  <tr>
    <td align="right">��ѡ�ҹ�ú<font color="#ff0000">*</font></td>
    <td><input type="checkbox" name="cmp" id="cmp" value="�ú" <?=$cmp==""?"":"checked"?> tabindex="34" /> ���Һѵû�ЪҪ�
      <input type="text" id="bmdate1" name="bmdate1" size="10" maxlength="10" value="<?=$bmdate1?>" />
&nbsp;<a href="javascript:NewCal('bmdate1','yyyymmdd',false,24)"><img src="./datetimepick/images/cal.gif" width="16" height="16" border="0" alt="���͡�ѹ���" /></a></td>
    <td align="right">���ͺѭ��&nbsp;</td>
    <td><input type="text" name="acc_name" id="acc_name" size="40"  maxlength="40" tabindex="31" value="<?=$acc_name?>" readonly></td>
  </tr>
   <tr>
    <td align="right">&nbsp;</td>
    <td><input type="checkbox" name="cmp2" id="cmp2" value="�ú" <?=$cmp2==""?"":"checked"?> tabindex="35" /> 
   ���Һѭ�ո�Ҥ��
     <input type="text" id="bmdate2" name="bmdate2" size="10" maxlength="10" value="<?=$bmdate2?>" />
&nbsp;<a href="javascript:NewCal('bmdate2','yyyymmdd',false,24)"><img src="./datetimepick/images/cal.gif" width="16" height="16" border="0" alt="���͡�ѹ���" /></a></td>
    <td align="right">�����˵�&nbsp;</td>
    <td><input type="text" name="memdesc" id="memdesc" size="40" value="<?=$memdesc?>" tabindex="36" /></td>
  </tr>
   <tr>
    <td align="right">&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
   
   <tr>
    <td colspan="4" align="center"><input type="button" value="��Ǩ�ͺ" onClick="<?=(isset($_GET['id'])?"emembercheck()":"imembercheck()")?>" tabindex="37" > 
      &nbsp;
                  <input type="submit" value="�ѹ�֡" name="ok"  id="ok" disabled tabindex="38" > 
                  &nbsp;
            <input type="reset" value="¡��ԡ"  onclick="window.location='index.php?sessiontab=1&sub=2'" tabindex="39" ></td>
    </tr>
</table>

      </td>
    </tr>
  </table>
<br />
      <div id="checkstate" align="center"><font color="#FFFFFF" style="background:#990000"> &nbsp;��ԡ��Ǩ�ͺ���ͷӡ�õ�Ǩ�ͺ������&nbsp; </font></div>
</form>