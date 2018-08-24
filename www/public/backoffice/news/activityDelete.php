

<?php
include("db_connect.php"); // incude ครั้งเดียวในไฟล์ที่เรียกใช้งาน
connect(); // เชื่อมต่อกับฐานข้อมูล


delete("tbl_activity_th","act_id=".$_GET['id'])

?>

<META HTTP-EQUIV="Refresh" CONTENT="1;URL=activity.php?page=activity&lang=<? echo $lang; ?>">
