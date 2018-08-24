<? include("header.php"); ?>
<? $lang = $_GET['lang'];?>

<? $id = $_GET['id'] ?>

<?php

connect(); // เชื่อมต่อกับฐานข้อมูล
$sql="SELECT * FROM tbl_activity_".$lang." WHERE act_id=".$id."";
$qr=select($sql); // select ข้อมูลในฐานข้อมูลมาแสดง
$total=count($qr);	// จำนวนรายการทั้งหมด ที่ select
$i=0; // จำเป็นต้องกำหนด
$act_id = "";
$image = "";
$act_name = "";
$desc_s = "";
$desc_l = "";
$start_date = "";
$end_date = "";
$slideshow = "";
$short="";

while($i<count($qr)) // วนลูปแสดงข้อมูล 
{
	$rs=$qr[$i]; // จำเป็นต้องกำหนด
	
	$act_id = $rs['act_id'];
	$short = $rs['short'];
	$image = $rs['image'];
	$act_name = $rs['act_name'];
	$desc_s = $rs['desc_s'];
	$desc_l = $rs['desc_l'];
	$start_date = $rs['start_date'];
	$end_date = $rs['end_date'];
	$slideshow = $rs['slideshow'];
	
	$i++; // จำเป็นต้องกำหนด
	

}

?>


<link rel="stylesheet" type="text/css" href="css/smoothness/jquery-ui-1.7.2.custom.css">
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.7.2.custom.min.js"></script>
<script type="text/javascript">
$(function(){
	// แทรกโค้ต jquery
	$("#dateInput").datepicker();
	$("#dateInput2").datepicker();
});
</script>

<style type="text/css">
.ui-datepicker{
	width:150px;
	font-family:tahoma;
	font-size:11px;
	text-align:center;
}
</style>

<!-- start content-outer ........................................................................................................................START -->
<div id="content-outer">
<!-- start content -->
<div id="content">

	<!--  start page-heading -->
	<div id="page-heading">
		<h1>แก้ไขกิจกรรม <? echo $id; ?></h1>
	</div>
	<!-- end page-heading -->

	<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
	
	<tr>
	  <th rowspan="3" class="sized"><img src="images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
		<th class="topleft"></th>
		<td id="tbl-border-top">&nbsp;</td>
		<th class="topright"></th>
	    <th rowspan="3" class="sized"><img src="images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
	</tr>
	<tr>
		<td id="tbl-border-left"></td>
		<td>
		<!--  start content-table-inner ...................................................................... START -->
		<div id="content-table-inner">
		<form action="activity_saveEdit.php" method="post" enctype="multipart/form-data"  >
			<!--  start table-content  -->
			<div id="table-content">
			
				<!--  start message-yellow -->
				<div id="message-yellow">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
				  <td>&nbsp;</td>
				  </tr>
				<tr>
				  <td><table width="984" border="0" cellspacing="3" cellpadding="3">
                    <tr>
                      <th width="128" rowspan="9" scope="col"><img src="MyResize/<? echo $image;?>" width="128" height="128" /></th>
                      <th width="26" scope="col">&nbsp;</th>
                      <th width="87" scope="col">&nbsp;</th>
                      <th width="11" height="19" scope="col">&nbsp;</th>
                      <th width="684" scope="col">&nbsp;</th>
                    </tr>
<tr>
                      <td height="35">&nbsp;</td>
                      <td>ภาพไอคอน </td>
                      <td>:</td>
                      <td>
                          <input type="file" name="fileUpload" />
                      </td>
					  <td><input type="hidden" name="lang" value="<? echo $_SESSION['lang']; ?>"/><input type="hidden" name="id" value="<? echo $act_id; ?>"/></td>
                    </tr>
                    
                    <tr>
                      <td height="35">&nbsp;</td>
                      <td>ภาพสไล์โชว์ </td>
                      <td>:</td>
                      <td>
                          <input type="file" name="fileUpload2" />
                      </td>
					 
                    </tr>


                    <tr>
                      <td height="35">&nbsp;</td>
                      <td>สไลด์โชว์</td>
                      <td>:</td>
                      <td>
					  
					  
				
				
				
				 <input name="slideshow" type="radio"  value="1" <? if($slideshow=="1"){  $ck = "checked=\"checked\""; echo $ck; }else{}?>>แสดง
						  <input name="slideshow" type="radio" value="0" <? if($slideshow=="0"){  $ck = "checked=\"checked\""; echo $ck; }else{}?>>ไม่แสดง
  
                        </td>
                      <td>&nbsp;</td>
                    </tr>


                    <tr>
                      <td height="30">&nbsp;</td>
                      <td>หัวข้อ</td>
                      <td>:</td>
                      <td><input name="title" type="text" size="50"  value="<? echo $act_name; ?>"/></td>
                    </tr>
                    <tr>
                      <td height="33">&nbsp;</td>
                      <td>รายละเอียด</td>
                      <td>:</td>
                      <td><input name="detail" type="text" size="80"  value="<? echo $desc_s?>"/></td>
                    </tr>
                
                    <tr>
                      <td height="30">&nbsp;</td>
                      <td>วันเริ่ม</td>
                      <td>:</td>
                      <td><input type="text" name="dateInput" id="dateInput" value="<? echo $start_date?>"/>
                      </td>
                    </tr>
                    <tr>
                      <td height="33">&nbsp;</td>
                      <td>วันสิ้นสุด</td>
                      <td>:</td>
                      <td><input type="text" name="dateInput2" id="dateInput2"  value="<? echo $end_date?>"/></td>
                    </tr>
					    <tr>
                      <td height="30">&nbsp;</td>
                      <td>จัดลำดับ</td>
                      <td>:</td>
                      <td><input type="text" name="short" value="<? echo $short?>" size="4"/></td>
                    </tr>
                  </table></td>
				  </tr>
				<tr>
				  <td  >&nbsp;</td>
				  </tr>
				<tr>
				  <td  style="background:url(images/bgdotted.gif) repeat-x;">&nbsp;</td>
				  </tr>
				<tr>
				  <td>&nbsp;&nbsp; <strong>รายละเอียดทั้งหมด</strong></td>
				  </tr>
				<tr>
				  <td>&nbsp;</td>
				  </tr>
				<tr>
					<td align="center"><textarea cols="80" id="editor1" name="editor1" rows="10" class="ckeditor"><? echo $desc_l;?>
</textarea></td>
				  </tr>
				<tr>
				  <td>&nbsp;</td>
				  </tr>
				<tr>
				  <td align="center"><input type="submit" name="button" id="button" value=" บันทึก" />&nbsp;<input type="reset" name="Reset" id="button" value="ยกเลิก" />				    </td>
				  </tr>
				</table></form>
				</div>
				<!--  end message-yellow -->
				
				<!--  start message-red -->
				<div id="message-red"></div>
				<!--  end message-red -->
				
				<!--  start message-blue -->
				<div id="message-blue"></div>
				<!--  end message-blue -->
			
				<!--  start message-green -->
			  <div id="message-green"></div>
				<!--  end message-green -->
		
		 
			<!--  start product-table ..................................................................................... --></div>
			<!--  end content-table  -->
		
			<!--  start actions-box ............................................... -->
			<div id="actions-box">
			  <div id="actions-box-slider"></div>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
		</div>
		<!--  end content-table-inner ............................................END  -->		</td>
		<td id="tbl-border-right"></td>
	</tr>
	<tr>
		<th class="sized bottomleft"></th>
		<td id="tbl-border-bottom">&nbsp;</td>
		<th class="sized bottomright"></th>
	</tr>
	</table>
	<div class="clear">&nbsp;</div>

</div>
<!--  end content -->
<div class="clear">&nbsp;</div>
</div>
<!--  end content-outer........................................................END -->
            
<? include("footer.php"); ?>      
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="cke_config.js"></script>		
<script type="text/javascript">
var editorObj=CKEDITOR.replace( 'editor1',cke_config); 
// editor1 ชื่อ id ของ textarea ที่ต้องการใช้งาน ckeditor
// var editorObj=CKEDITOR.replace( 'editor1',cke_config,dataValue);  // กรณีดึงข้อมูลมาแก้ไข
</script>

