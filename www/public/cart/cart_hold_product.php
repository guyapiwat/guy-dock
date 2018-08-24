<?session_start();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 

<style>
    .red{
       color: red; 
    }
    .green{
       color: green; 
    }
    .cart table {
       font-family: "Helvetica Neue", Helvetica, sans-serif;
       width: 100%;
    }
   .cart a {
     cursor: pointer;
    }

    .cart caption {
     text-align: left;
      color: silver;
      font-weight: bold;
      text-transform: uppercase;
      padding: 5px;
    }

    .cart thead {
      background: SteelBlue;
      color: white;
    }

    .cart th,.cart td {
      padding: 5px 10px;
    }

    .cart tbody tr:nth-child(even) {
      background: WhiteSmoke;
    }

    .cart tbody tr td:nth-child(2) {
      text-align:center;
    }

    .cart tbody tr td:nth-child(4),tbody tr td:nth-child(5) {
     /* text-align: right; */
      font-family: monospace;
    }

    .cart tfoot {
      background: SeaGreen;
      color: white;
      text-align: right;
    }

    .cart tfoot tr th:last-child {
      font-family: monospace;
    }
    .submit {    
        background-color: #FDF5CE !important;
    }
    .errorpd {    
    text-align: center;
    background-color: red; 
    width: 192px; 
    padding: 10px;
    color: #FFF;
    margin: 0 auto;
    font-weight: 900;
}

</style>
<? include("../member/connectmysql.php");?>
<? include("../function/function_pos.php");?>
<?
 
if(!empty($_POST["action"])) { 
    $pcode = genCartPcode($_POST["pcode"],$_SESSION["cart_item"]); 
 
    switch($_POST["action"]) { 
        case "add":
            if(!empty($_POST["qty"])) {               
               $pd = hold::get_product($_POST["id"],$_POST["qty"]);   
               if(count($pd))
                 {   
                    $pd['max'] =  $_POST["all_qty"];
                    $product[$pcode] = $pd;   
                    if(!empty($_SESSION["cart_item"])) { 
                        $id = searchForId($_POST["pcode"],$_SESSION["cart_item"]); 
                        if($id >=0) { 
                            $qty = $_SESSION["cart_item"][$id]['qty']+$product[$pcode]['qty']; 
                            if($qty>$_SESSION["cart_item"][$id]['max']){
                                 echo "<div class=errorpd>สินค้า ".$pd['pcode']."ไม่พอ</div>";  
                            }else{
                                $_SESSION["cart_item"][$id]['qty'] = $qty;
                                $_SESSION["cart_item"][$id]['price'] = $pd['price'];
                                $_SESSION["cart_item"][$id]['pv'] = $pd['pv'];   
                            }
                        } else { 
                            $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$product);
                        }
                    } else {
                        $_SESSION["cart_item"] = $product;
                    }
                 }
            }
        break;
        case "set": 
            unset($_SESSION["cart_item"]);
            if(!empty($_POST["bid"])) { 
                 $pdx = hold::get_productInBill($_POST["bid"]);   
                 if(count($pdx)){
                    foreach($pdx as $keys => $val){ 
                      $pd = product::get_product($val["pcode"],$val["qty"]);   
                      $pcode = genCartPcode($pd["pcode"],$_SESSION["cart_item"]);  
                      $_SESSION["cart_item"][$pcode] = $pd;
                    }   
                 }  
            }
        break;
        case "refresh": 
            unset($_SESSION["cart_item"]);
            if(!empty($_POST["pcode"])) { 
                 $pd = product::get_productInPackage($_POST["pcode"]);  
                 if(count($pd)){
                    foreach($pd as $keys => $val){ 
                      $pcode = genCartPcode($val["pcode"],$_SESSION["cart_item"]);  
                      $_SESSION["cart_item"][$pcode] = $val;
                    }   
                 }  
            }
        break; 
        case "plus": 
            if(!empty($_POST["pcode"])) {
                 $pcode = explode('-',$_POST["pcode"]);
                 $key = $_POST["pcode"];
                 $pcode = $pcode[1];
                 $qty = $_POST["qty"];
                 if($qty<=0)$qty=1;
                 
                if($qty>$_SESSION["cart_item"][$key]['max']){
                   $_SESSION["cart_item"][$key]['qty'] = $_SESSION["cart_item"][$key]['max'];  
                }else{
                   $cart = $_SESSION["cart_item"][$key];
                   $_SESSION["cart_item"][$key]['qty'] = $qty;
                }
        
            } 
         break;     
        case "price": 
            if(!empty($_POST["pcode"])) {
                $key = $_POST["pcode"];
                $_SESSION["cart_item"][$key]['price'] = $_POST["qty"]; 
            }
        break;     
        case "pv": 
            if(!empty($_POST["pcode"])) {
                $key = $_POST["pcode"];
                $_SESSION["cart_item"][$key]['pv'] = $_POST["qty"]; 
            }
        break; 
        case "free": 
            if(!empty($_POST["pcode"])) {
                $key = $_POST["pcode"];
                $_SESSION["cart_item"][$key]['price'] = 0; 
                $_SESSION["cart_item"][$key]['pv'] = 0;
            }
        break;
        case "nofree": 
            if(!empty($_POST["pcode"])) {
                $pcode = explode('-',$_POST["pcode"]);
                $key = $_POST["pcode"];
                $pcode = $pcode[1];
                $qty = $_POST["qty"];
                $pd = product::get_product($pcode,$qty);  
                $key = $_POST["pcode"];
                $_SESSION["cart_item"][$key]['price'] = $pd['price']; 
                $_SESSION["cart_item"][$key]['pv'] = $pd['pv'];
            }
        break;
        case "remove":
            if(!empty($_SESSION["cart_item"])) { 
                unset($_SESSION["cart_item"][$_POST["pcode"]]); 
                if(empty($_SESSION["cart_item"]))
                    unset($_SESSION["cart_item"]);
            }
        break;
        case "empty":
            unset($_SESSION["cart_item"]);
        break;        
    }
}

?>

<?php
if(isset($_SESSION["cart_item"])){
    $item_total = 0;
?>    
<div class='cart'>

<table>
  <caption>Product</caption>
  <thead>
    <tr>
      <th><a onClick="cartAction('empty','','');" ?><img src="../images/font-awesome/trash.png" alt="remove" width="10px"></a></th>
      <th><strong>รหัส</strong></th>
      <th><strong>ชื่อสินค้า</strong></th>
      <th><strong>จำนวน</strong></th>
      <th><strong>ราคา</strong></th>
      <th><strong>PV</strong></th>
    </tr>
  </thead>
  <tbody>
  <?php        
    foreach ($_SESSION["cart_item"] as $key => $item){  
    ?> 
        <tr>
        <td align=center><a onClick="cartAction('remove','<?=$key?>')" ><img src="../images/font-awesome/remove-symbol.png" alt="remove" width="10px"></i></a></td>
        
        <td align=center><strong><?php echo $item["pcode"]; ?></strong></td>
        <td align=left><?php echo $item["pdesc"]; ?></td>
        <td align=right><input type='number'min='1' max="<?=$item["max"];?>" style="width: 62px;text-align:right;" value="<?php echo $item["qty"]; ?>" onchange="cartAction('plus','<?=$key?>',this.value);"></td>  
        <td align=right><?php echo $item["price"]; ?></td>
        <td align=right><?php echo $item["pv"]; ?></td>
        <input type="hidden" name="pcode[]" value="<?=$item["pcode"];?>"/>
        <input type="hidden" name="qty[]" value="<?=$item["qty"];?>"/>
        <input type="hidden" name="price[]" value="<?=$item["price"];?>"/>
        <input type="hidden" name="pv[]" value="<?=$item["pv"];?>"/>
        </tr>
    <?php
        if($item['type'] == 'package'){
              $pd = product::get_productInPackage( $item["pcode"]);   
              foreach($pd as $keys){ 
             ?>
               <tr>
                <td></td>
                <td></td>
                <td><strong><?php echo $keys["pcode"]; ?></strong></td>
                <td><?php echo $keys["pdesc"]; ?></td>
                <td align=right><?php echo "".$keys["qty"]*$item["qty"]; ?></td>
                <td align=right><?php echo "".$keys["price"]*$item["qty"]; ?></td>
                <td align=right><?php echo "".$keys["pv"]*$item["qty"]; ?></td>
              </tr> 
            <?
              }  
        }
        $item_total += ($item["price"]*$item["qty"]);
        $item_qty += $item["qty"];
        $item_pv += ($item["pv"]*$item["qty"]);
        }
        ?> 
  </tbody>
  <tfoot>
    <tr style="display:none">
        <th>
           <input type="hidden" id="sumqty" name="sumqty" value="<?=$item_qty;?>"/>
           <input type="hidden" id="sumtotal" name="sumtotal" value="<?=$item_total;?>"/>
           <input type="hidden" id="sumpv" name="sumpv" value="<?=$item_pv;?>"/>
        </th>
    </tr>
    <tr>
      <th colspan="3" align=right><strong>Total:</strong></th>
      <th align=right><?php echo $item_qty; ?></th>
      <th align=right><?php echo $item_total; ?></th>
      <th align=right><?php echo $item_pv; ?></th>
    </tr> 
     <tr class="submit">
       <th colspan="3" align=right></th>
       <th colspan="3" align=right>
         <input name="button" id="button" type="button" onclick="eproductcheck()" value="ตรวจสอบ" />
             &nbsp;
         <input type="submit" value="บันทึก" name="ok" id="ok" onclick="checkForm()"  disabled="disabled" />
             &nbsp;
          <input name="reset" type="reset" id="reset"   onclick="window.location='index.php?sessiontab=3&sub=12'" value="ยกเลิก" />
       </th>
     </tr>
    
  </tfoot>
</table>
</div>      
  <?php
} else {
    echo "<div class='error'>Choose Product</div>";
}
?>