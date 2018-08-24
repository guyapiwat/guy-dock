<?
 
include_once("modules/payments/paypal/config.php");
?>
 
<form method="post" action="modules/payments/paypal/process.php?paypal=checkout">
<input type="hidden" name="itemname" value="Canon EOS Rebel XS" /> 
<input type="hidden" name="itemnumber" value="10000" /> 
<input type="hidden" name="itemdesc" value="Capture all your special moments with the Canon EOS Rebel XS/1000D DSLR camera and cherish the memories over and over again." /> 
<input type="hidden" name="itemprice" value="225.00" />
Quantity : <select name="itemQty"><option value="1">1</option><option value="2">2</option><option value="3">3</option></select> 
<input class="dw_button" type="submit" name="submitbutt" value="Buy (225.00 <?php echo PPL_CURRENCY_CODE; ?>)" />
</form>
 