<?session_start();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
<style>
    .red{
       color: red; 
    }
    .green{
       color: green; 
    } 
    
    .satype{
      border: 1px solid #FF0000;
    }
    .member a
    { 
        cursor: pointer;
    }
    .box
    { 
        background-color: #fdf5ce !important;
        width: 100%;
        height: 133px;
            border-color: #2e6e9e;
    border: 4px solid #5c9ccc;
    }
    
    .member
    
    { 

        padding: 10px; 
        width: 45%;
        float: left;
    }
    .detail
    { 

        padding: 10px; 
        width: 45%;
        float: left;
    }
    
    .member label, .member input, .member select
    {
        display: block;
        width: 120px;
        float: left;
        margin-bottom: 5px;
    }
    .radio input
    {
        display: block;
      /*  width: 120px;
        float: left;
        */
        margin-bottom: 5px;
    }
 
    .member label
    {
        text-align: right;
        padding-right: 10px;
    }
 
    br
    {
        clear: left;
    }

</style>  
<? include("../backoffice/connectmysql.php");?>
<? include("../function/function_pos.php");?>
<? include("../function/global_centeru.php");?>
<?// include("../backoffice/date_picker.php"); ?>

<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js'></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/themes/base/jquery-ui.css">
<SCRIPT LANGUAGE="JavaScript">

function selectitem(mcode){  
      
    $('#waiting-item').html(''); 
    $("#ok").prop('disabled', true);
    $('#ok').val("บันทึก");
    
    var mcode =  $('#mcode').val();    
    if(mcode == ''){
       alert("กรุณใส่รหัสสมาชิก");  
    } 
  // 
    dataType: 'application/json; charset=utf-8';
    queryString = 'action=set'+'&mcode='+mcode;
    link = '<?=$actual_link?>cart/member_memitem_hold.php'; 
    $.post(link,queryString,function(data){  
         $('#member-item').html(data);       
    }); 
}
</script>


 
<?php
    if($_POST['mcode']){
         $mcode = genmcode($_POST['mcode']);
         $member = get_detail_meber($mcode,date("Y-m-d"));
    } 
	
    if(count($member) > 0){ 
		foreach ($member as $key => $value){
		   $member[$key] = iconv("TIS-620", "UTF-8", $value);
		}
	}
   
    if(count($member) >= 0){ 
?>
<div class='box'>  
    <div class='member'>  
            <label>รหัสสมาชิก</label>
            <?$check = (count($member) > 0 ? 'check' : 'check-box-empty' );?>
            <input id="mcode" name="mcode" onchange="selectitem()" value="<?=$member['mcode']?>"> &nbsp;
            <input type="button"  style="width:50px" onClick='selectitem()'   value="ตรวจ">
            <!--<a>
            <img src="../images/font-awesome/<?=$check?>.png" onClick='selectitem()' alt="open-folder" width="50px"></a>-->
            <!--input id="mcode" name="mcode" type='hidden'  value="<?=$member['mcode']?>"-->
            
            <br>
            <label>ชื่อ-นามสกุล</label>
            <input disabled="" value="<?=$member['name_t']?>"><br>
            <label>Package</label>
            <input disabled="" value="<?=$member['pos_cur']?>"><br>
            <label>ประเภท</label>
            <input disabled="" value="<?=$arr_mtype1[$member['mtype']]?>"><br>        
    </div>
    <div class='member'> 
            <label>วันที่ซื้อ</label>
            <input type="text" id="dateInput1" onkeypress="return chknum(window.event.keyCode)" disabled=""  value="<?=date("Y-m-d")?>" placeholder="2014-01-20"/><br>
            <input id="sadate" name="sadate" type='hidden' value="<?=date("Y-m-d")?>">
            <label>รูปแบบการซื้อ</label>
             <select name="satype" id="satype" onchange="checksatype(this)" class="satype" >
                    <?php        
                        foreach($arr_satype_mh as $key => $value): 
                        if($member['mtype'] == '0' and $key == 'D'){
                            ///** normal member not have DIS
                        }else{
                            echo '<option value="'.$key.'"';
                            if($satype==$key)echo "selected";
                            echo'>'.iconv( 'TIS-620', 'UTF-8',$value).'</option>'; 
                        }  
                        endforeach;
                    ?>
            </select><br> 
            <br>
    </div>
</div>
<?php
    }else{ ?>
        <div class='error' onClick='get_package_listpicker_mcode()'  >ไม่พบข้อมูล สมาชิก</div>
 <?}?>