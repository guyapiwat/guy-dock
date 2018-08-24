<script type="text/javascript">
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;
     document.body.innerHTML = printContents;
     window.print();
}
 
</script>
<?php
//$message = file_get_contents("http://pr9network.com/backoffice/sale_bill_amount_odernum_print_all.php");

//echo "<div id='divprint'>" . $message . "</div>";

//echo "<script type='application/javascript'>window.onload=function(){printDiv('divprint');}</script>";
?>
