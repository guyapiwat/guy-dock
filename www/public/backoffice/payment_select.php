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
   $pd = query('*','ali_payment pm',"pm.shows = '1' order by order_by asc ");    
   if(count($pd))
   {  
?>
<div class='cart-package'>
<table>
  <caption>Payment</caption>
  <thead>
    <tr>  
      <th><strong>ประเภท</strong></th>
      <th><strong>Show<input type="checkbox" onClick="toggle(this)" /></th>   
    </tr> 
  </thead> 
  <tbody> 
    <?php 
        $pb = query('*','ali_payment_branch pn',"pn.inv_code = '{$_POST["inv_code"]}'");    
        if(count($pb)){
            $show_list = explode(",",$pb[0]['payment_id']);
        } 
        foreach ($pd as $key => $val){ ?>
          <tr>
            <td><a onclick="edit('<?=$val['id']?>','<?=$_POST["inv_code"]?>')"><?php echo iconv("tis-620","utf-8",$val['payment_name']);?><img src="../images/font-awesome/open-wrench-tool-silhouette.png" alt="remove" width="10px"></a></td>
            <td align='center'><input type='checkbox' id='show_branch' name='show_branch[]' value='<?=$val['id']?>' <?echo (in_array($val['id'], $show_list)==1?"checked":"");?> /></td>
          </tr>
      <?  }  ?>
  </tbody>
   <tfoot>
     <tr class="submit"> 
       <th colspan="2" align=right>
         <input name="button" id="button" type="button" onclick="eproductcheck()" value="ตรวจสอบ" />
             &nbsp;
         <input type="submit" value="บันทึก" name="ok" id="ok"  onclick="submit()"  disabled="disabled" />
             &nbsp;
          <input name="reset" type="reset" id="reset"   onclick="window.location='index.php?sessiontab=5'" value="ยกเลิก" />
       </th>
     </tr>
    
  </tfoot> 
 </table>
 </div>
<?}else{ ?>
    <div class='error' onClick='get_package_listpicker_mcode()'  >ไม่พบข้อมูล เลือกสาขา</div>
<?} 
 }?>

