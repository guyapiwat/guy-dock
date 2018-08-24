<? include("connectmysql.php");?>
<? include("../function/function_pos.php");?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
<style>
    
    .cart-package table {
       font-family: "Helvetica Neue", Helvetica, sans-serif;
       width: 100%;
    }
    .cart-package caption {
     text-align: left;
      color: silver;
      font-weight: bold;
      text-transform: uppercase;
      padding: 5px;
    }

    .cart-package a {
     cursor: pointer;
    }
    .cart-package thead {
      background: SteelBlue;
      color: white;
    }

    .cart-package th,.cart-package td {
      padding: 5px 10px;
    }

    .cart-package tr th:last-child {
       background: SeaGreen;
    }
    .cart-package tbody tr:nth-child(even) {
      background: WhiteSmoke;
    }

    .cart-package tbody tr td:nth-child(2) {
      text-align:center;
    }

    .cart-package tbody tr td:nth-child(3),tbody tr td:nth-child(4) {
     /* text-align: right; */
      font-family: monospace;
    }

    .cart-package tfoot {
      background: SeaGreen;
      color: white;
      text-align: right;
    }

    .cart-package tfoot tr th:last-child {
      font-family: monospace;
    }
</style>
<?
 if(!empty($_POST["inv_code"])) {     
   $pd = query('*','ali_invent',"inv_code= '{$_POST['inv_code']}'");    
   if(count($pd))
   {  
?>
<div class='cart-package'>
<table>
  <caption>Invent</caption>
  <thead>
    <tr>  
      <th><strong><?=iconv("tis-620","utf-8",$pd[0]['inv_code'])?></strong></th>
      <th><strong><?=iconv("tis-620","utf-8",$pd[0]['inv_desc'])?></strong></th>  
      <th><a><img src="../images/font-awesome/open-folder.png" onClick='get_package_listpicker_mcode()' alt="open-folder" width="20px"></a></th>
      <input type="hidden" id="inv_code" name="inv_code" value="<?=$pd[0]['inv_code'];?>"/>  
    </tr> 
  </thead> 
 </table>
 </div>
<?}else{ ?>
    <div class='error' onClick='get_package_listpicker_mcode()'  >ไม่พบข้อมูล เลือกสาขา</div>
<?} 
 }?>

