<?
$_SESSION["perbuy"] = 1;


$sql="SELECT rcode,fdate,tdate FROM ".$dbprefix."cround WHERE  rcode = '".$_GET["rcode"]."'  ";
$rs = mysql_query($sql);
if(mysql_num_rows($rs)>0){
	
	$max_rcode = mysql_result($rs,0,'rcode');
	$fdate = mysql_result($rs,0,'fdate');
	$tdate = mysql_result($rs,0,'tdate');
}


$sql = "SELECT * FROM ".$dbprefix."cmbonus WHERE id='".$_GET['bid']."' and status =1";
$rs = mysql_query($sql);
if(mysql_num_rows($rs)<=0){
	//echo "<script language='JavaScript'>alert('รหัสนี้ไม่ได้นำจ่าย ไม่สามารถ Adjust ได้กรุณาตรวจสอบ'); window.history.back()</script>";	
	//exit;
	echo "<script language='JavaScript'>alert('รหัสนี้ไม่ได้นำจ่าย ไม่สามารถ Adjust ได้กรุณาตรวจสอบ');window.location='index.php?sessiontab=4&sub=282828&fdate=".$fdate."&tdate=".$tdate."'</script>";	
	exit;
	//echo "<script language='JavaScript'>alert('รหัสนี้ไม่ได้นำจ่าย ไม่สามารถ Adjust ได้กรุณาตรวจสอบ'); window.history.back()</script>";	
	//exit;
}
?>
<script language="javascript" type="text/javascript" src="./js/newcheck.js"></script>
<script type="text/javascript">  

 sendget_sponsor("<?=$_GET['mcode']?>");    
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
function sendget_sponsor(value) {
    var rcode = "<?=$_GET['rcode']?>";
     var req = Inint_AJAX(); //สร้าง Object
   
    value = str_pad(value,7,0,false);
    //alert(test);
     req.open('GET', 'search_adjust.php?value='+encodeURIComponent(value)+'&rcode='+encodeURIComponent(rcode), true); //กำหนด สถานะการทำงานของ AJAX แบบ GET และส่งข้อมูลผ่านทาง URL
     req.onreadystatechange = function() { //เหตุการณ์เมื่อมีการตอบกลับ
          if (req.readyState==4) {
               if (req.status==200) { //ได้รับการตอบกลับเรียบร้อย
                    var data=req.responseText; //ข้อความที่ได้มาจากการทำงานของ test3.php
                    //alert(req.responseText);
                    if(data == 1234){
                    document.getElementById('mcode').value="";
                    document.getElementById("mname").innerHTML='<?=$wording_lan["ewallet_1"]?>';
                    }else{

                    var data = data.split("||");
                    document.getElementById('mcode').value=value;
                    document.getElementById("mname").innerHTML=data[0]; //แสดงผ
                    document.getElementById("rvpoint").value=data[1]; 
                    document.getElementById("txtMoney").value=data[1]; 

                    }
               }
          }
     };
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //Header ที่ส่งไป
     req.send(null); //ทำการส่ง
};
  </script>
<script language="javascript">


var xmlHttp; disBotton

function disBotton(){
    frm.ok.disabled = true;
    document.getElementById('checkstate').innerHTML= '';
}
function checkbalance(val1,val2){ 
      if(isNaN(val1)==false){
        var v1=parseInt(val1);
        var v2=parseInt(val2);
        if( v1 > v2 ){
            alert("จำนวนไม่พอ");
            return false;
        }else if(v1 < 1 ){ 
            alert("จำนวนไม่ถูกต้อง");
            return false;
        }else{
            return true;
        }
    }else{
        alert("จำนวนไม่ถูกต้อง");
        return false;
    }
}
function ibillcheck(){
//check(nullCheck, sizeCheck, formatCheck, dupCheck, realCheck, idName, errmsg)
    var val = document.getElementById('dateInput1').value;
    var field = "dateInput1";
    var flag = "1-0-0-0-0";
    var errDesc = "วันที่";
    
    val = val + ","+document.getElementById('mcode').value;
    field = field +",mcode";
    flag = flag+",1-0-0-0-0";
    errDesc = errDesc + ",รหัสสมาชิก";

    var txtMoney = document.getElementById('txtMoney').value;
    var rvpoint = document.getElementById('rvpoint').value;
 
     //var pass = checkbalance(txtMoney,rvpoint);
    var pass = true;
    if(pass == true){
        document.getElementById('checkstate').innerHTML= "<img align='center' src='./images/loading.gif' />";
        startRQ(field,val,"",flag,errDesc,"asaleh","checkstate");
    }else{
        disBotton();
    }
}
function ebillcheck(){

//check(nullCheck, sizeCheck, formatCheck, dupCheck, realCheck, idName, errmsg)
    var val = document.getElementById('dateInput1').value;
    var skipval = "";
    var field = "dateInput1";
    var flag = "1-0-0-0-0";
    var errDesc = "วันที่";
    
/*        val = val + ","+document.getElementById('mcode').value;
    skipval = skipval+",";
    field = field +",mcode";
    flag = flag+",1-0-0-0-0";
    errDesc = errDesc + ",รหัสสมาชิก";
*/
    val = val + ","+document.getElementById('inv_code').value;
    skipval = skipval+",";
    field = field +",inv_code";
    flag = flag+",1-0-0-0-0";
    errDesc = errDesc + ",รหัสสาขา";

    document.getElementById('checkstate').innerHTML= "<img align='center' src='./images/loading.gif' />";
    //alert(skipval);
    startRQ(field,val,skipval,flag,errDesc,"asaleh","checkstate");
}

</script>
<?
    function dialogbox($width,$color,$msg,$link){
        ?><table width=<?=$width?> bgcolor="<?=$color?>">
            <tr valign="top">
            <td align="center"><font color="#FFFFFF"><?=$msg?></font></td>
            </tr>
            <?
            if($link!=""){
                ?><tr valign="top">
                <td align="center"><?=$link?></td>
                </tr><?
            }
            ?>
        </table><? 
    }
?>

 
</head>

<body>
<?
if($_GET["cmc"])$mcode = $_GET["cmc"];
if(isset($_GET['id'])){
        $sql = "SELECT * FROM ".$dbprefix."adjust WHERE id='".$_GET['id']."' LIMIT 1";
        $rs = mysql_query($sql);
        if(mysql_num_rows($rs)<=0){
            $redirect = "[<a href=\"javascript:window.location='index.php?sessiontab=1';\">ไปหน้าสมาชิก</a>]";
            dialogbox("50%","#990000","ไม่พบข้อมูลตามเงื่อนไข",$redirect);
            exit;
        }else{
            $sadate = mysql_result($rs,0,'sadate');
            $inv_code = mysql_result($rs,0,'inv_code');
            $satype = mysql_result($rs,0,'sa_type');
            $mcode = mysql_result($rs,0,'mcode');
            $radsend = mysql_result($rs,0,'send');
            $txtoption = mysql_result($rs,0,'txtoption');
            //$inv_desc = mysql_result($rs,0,'inv_desc');
            //$mname = mysql_result($rs,0,'name_t');
            mysql_free_result($rs);
        }
}
?>
<form method="post" action="adjustoperate.php?state=<?=$_GET['id']==""?0:1?>" name="frm" id="frm" onsubmit="return checkForm(this)">
  <table border="0" width="100%">
  <tr valign="top">
    <td>
    <table border="0" width="100%">
      <tr valign="top">
        <td>
            <table border="1" width="100%" align="center">
            <tr>
              <td width="16%" align="right">เลขบิล</td>
            <td width="38%">
            <? 
                $sql = "SELECT MAX(id) AS id FROM ".$dbprefix."adjust ";
                $rs = mysql_query($sql);
                echo ($_GET['id']==""?mysql_result($rs,0,'id')+1:$_GET['id']);
                mysql_free_result($rs);
            ?> <input type="hidden" value="<?=$_GET['id']?>" name="id"/></td>
            <td width="6%" align="right">วันที่ จ่าย</td>
            <td width="40%">
            <input type="text" id="dateInput1" name="sadate" value="<?=$_GET['paydate']?>">
            <input type="hidden" id="bid" name="bid" value="<?=$_GET['bid']?>">
            <input type="hidden" id="rcode" name="rcode" value="<?=$_GET['rcode']?>">
            <input type="hidden" id="fdate" name="fdate" value="<?=$_GET['fdate']?>">
            <input type="hidden" id="tdate" name="tdate" value="<?=$_GET['tdate']?>">
            </tr>
            <tr valign="top">
              <td width="16%" align="right" >&#3626;&#3617;&#3634;&#3594;&#3636;&#3585; </td>
              <td  > 
               <input style="background-color:#FFFF99;" size="15" type="text" id="mcode" name="mcode" readonly value="<?=$_GET['mcode']?>">
                <!--<input type="button" onClick="get_mem_listpicker_mcode()" value="เลือก">                 
                <input name="button2" type="button" onClick="sendget_sponsor(document.getElementById('mcode').value)" value="<?=$wording_lan["check"]?>" />     -->  
                <div id="mname"></div> </td>
                 <input name="rvpoint" id="rvpoint"  type="hidden"  />

              <td align="right" >&nbsp;</td>
              <td >&nbsp;</td>
            </tr>            
            <tr valign="top" >
              <td align="right"> Adjust </td>
              <td><!--<select name="satype">
                <option  value="A" <?=($satype=="A"?"selected":"")?>>แผน A</option>
                <option value="Q" <?=($satype=="Q"?"selected":"")?>>รักษายอด</option>
              <option value="I" <?=($satype=="I"?"selected":"")?>>ส่งศูนย์</option>
              </select>--><input type="text" name="txtMoney" id="txtMoney" value="" onkeypress="disBotton()"></td>
              <td>&nbsp;</td>
               <td>&nbsp;</td>
              </tr>
              </table>
              <table border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td colspan="4" align="left">หมายเหตุ : <br>
                  <textarea name="txtoption" cols="100" rows="5"><?=$txtoption?></textarea></td>
              </tr>
            </table>
        </td>
      </tr>
      <tr>
        <td id="sale" align="center">
             <input name='button' type='button' onclick='<?=(isset($_GET['id'])?"ebillcheck()":"ibillcheck()")?>' value='ตรวจสอบ' />&nbsp;<input type='submit' value='บันทึก' name='ok'  id='ok' disabled='disabled' />&nbsp;<input name='reset' type='reset'  onclick="window.location='index.php?sessiontab=6&sub=88'" value='ยกเลิก' />

        </td>
      </tr>
      <tr><td><div id="checkstate" align="center"></div>  </td></tr>
    </table>
    </td>
  </tr>
</table>
</form>


