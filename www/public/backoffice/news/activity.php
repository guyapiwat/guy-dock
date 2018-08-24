<? 
$page = $_GET['page'];

?>

<? include("header.php"); ?>

<style type="text/css">
<!--
@import url("css/table.css");
-->
</style>

<!-- start content-outer ........................................................................................................................START -->
<div id="content-outer">
<!-- start content -->
<div id="content">

	<!--  start page-heading -->
	<div id="page-heading">
		<h1>กิจกรรมทั้งหมด | <a href="activity_add.php?lang=<? echo $_SESSION['lang']; ?>" >เพิ่มกิจกรรม</a> </h1>
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
		
			<!--  start table-content  -->
			<div id="table-content">
			
				<!--  start message-yellow -->
				<div id="message-yellow">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td valign="top" align="center">
                    
                    
                    <?php

connect(); // เชื่อมต่อกับฐานข้อมูล
$sql="SELECT * FROM tbl_activity_".$_SESSION['lang']." ORDER BY  short ASC ";
$qr=select($sql); // select ข้อมูลในฐานข้อมูลมาแสดง
$total=count($qr);	// จำนวนรายการทั้งหมด ที่ select
$i=0; // จำเป็นต้องกำหนด

?>
                      <table id="box-table-a"  summary="Employee Pay Sheet" width="100% ">
                        <tr>
                          <th>ID</th>
						  <th>ลำดับ</th>
                          <th>รูปภาพ</th>
                          <th>ชื่อ</th>
                          <th>รายละเอียด</th>
                          <th>วันเริ่มงาน</th>
                          <th>วันสิ้นสุดงาน</th>
						  <th>สไลด์โชว์</th>
                          <th>ดำเนินการ</th>
                        </tr>
                        <?
while($i<count($qr)) // วนลูปแสดงข้อมูล 
{
	$rs=$qr[$i]; // จำเป็นต้องกำหนด
	$detail = $rs['act_name'];
	echo "<tr>";
	echo "<td align=\"center\">".$rs['act_id']."</td>";
	echo "<td align=\"center\">".$rs['short']."</td>";
	echo "<td align=\"center\"><img width=\"50\" height=\"50\" src=\"MyResize/".$rs['image']."\" /></td>";
	echo "<td>".$rs['act_name']."</td>";
	echo "<td>".$rs['desc_s']."</td>";
	echo "<td align=\"center\">".$rs['start_date']."</td>";
	echo "<td align=\"center\">".$rs['end_date']."</td>";
	echo "<td align=\"center\">".$rs['slideshow']."</td>";
	echo "<td align=\"center\"> <a href=\"activity_edit.php?lang=".$_SESSION['lang']."&id=".$rs['act_id']."\"> แก้ไข </a>  | <a href=\"activity_del.php?lang=".$_SESSION['lang']."&id=".$rs['act_id']."\"onclick=\"return confirm('คุณแน่ใจที่จะลบข้อมูลนี้ ?') \">ลบ</a></td>";
	echo "</tr>";



	$i++; // จำเป็นต้องกำหนด
	

}

?>
                      </table>
                    
                    </td>
				</tr>
				<tr>
				  <td>&nbsp;</td>
				  </tr>
				<tr>
				  <td align="center">&nbsp;</td>
				  </tr>
				</table>
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
		<!--  end content-table-inner ............................................END  -->
		</td>
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