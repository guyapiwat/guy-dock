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
      /* font-family: "Helvetica Neue", Helvetica, sans-serif;*/
       width: 100%;
    }
   .cart a {
     cursor: pointer;
    }
    
    .cart productInPackage {
       color: #AAAAAA; 
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

</style>  
<? include("../backoffice/connectmysql.php");?>
<? include("../function/function_pos.php");?>
<? if($_SESSION["checkbackdate"] == '1')include("../function/date_picker.php"); ?>
<?

if(!empty($_POST["action"])) {  
    $pcode = genCartPcode($_POST["pcode"],$_SESSION["cart_item"]); 
    switch($_POST["action"]) { 
        case "add":
            if(!empty($_POST["qty"])) {  
                $mcode=$_POST["mcode"];             
               //$pd = product::get_product($_POST["pcode"],$_POST["qty"]);  
               $pd = product::get_productbymcode($_POST["pcode"],$_POST["qty"],$mcode);  
               //var_dump($pd);
               if($_SESSION['discount'] == true){
                   $pd['pv']=0;
                   $pd['price'] = $pd['price']*0.70;
               }
                 if(count($pd))
                 {   
                    $product[$pcode] = $pd;  
                    if(!empty($_SESSION["cart_item"])) { 
                        $id = searchForId($_POST["pcode"],$_SESSION["cart_item"]); 
                        if($id >=0) { 
                            $qty = $_SESSION["cart_item"][$id]['qty']+$product[$pcode]['qty']; 
                            $_SESSION["cart_item"][$id]['qty'] = $qty;
                            $_SESSION["cart_item"][$id]['price'] = $pd['price'];
                            $_SESSION["cart_item"][$id]['pv'] = $pd['pv'];  
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
               /*  $pd = product::get_product($pcode,$_POST["qty"]);    
                 if(count($pd))
                 {   
                    $qty = $_POST["qty"];
                    $_SESSION["cart_item"][$key]['qty'] = $qty;
                    $_SESSION["cart_item"][$key]['price'] = $pd['price']*$qty;
                    $_SESSION["cart_item"][$key]['pv'] = $pd['pv']*$qty; 
                 }
                 **/
                 
                 $cart = $_SESSION["cart_item"][$key];
                 $_SESSION["cart_item"][$key]['qty'] = $qty;
                // $_SESSION["cart_item"][$key]['price'] = $cart['price']*$qty;
               //  $_SESSION["cart_item"][$key]['pv'] = $cart['pv']*$qty; 
            } 
         break;     
        case "price": 
            if(!empty($_POST["pcode"])) {
                $key = $_POST["pcode"];
                $_SESSION["cart_item"][$key]['price'] = $_POST["qty"]; 
            }
        break; 
        case "discount":
            $_SESSION["discount"] = true;
            if(!empty($_POST["pcode"])) {
               //* $pd = product::get_product($_POST["pcode"],'1');    
               //* if(count($pd))
               //*  {   
                    //*$product['99999'] = $pd;  
                    if(!empty($_SESSION["cart_item"])) { 
                        $id = searchForId($_POST["pcode"],$_SESSION["cart_item"]); 
                        if($id >=0) { 
                            
                            
                        } else { 
                            foreach($_SESSION["cart_item"] as $key => $val){
                                $_SESSION["cart_item"][$key]['pv'] = 0;
                                $_SESSION["cart_item"][$key]['price'] = ($_SESSION["cart_item"][$key]['price']*0.70);
                            }
                           //* $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$product);
                        }
                    } else {
                        //*$_SESSION["cart_item"] = $product;
                    }
               //*  }
            }
        break;   
        case "undiscount":
            $_SESSION["discount"] = false;
            if(!empty($_POST["pcode"])) {
                if(!empty($_SESSION["cart_item"])) { 
                    //*$id = searchForId($_POST["pcode"],$_SESSION["cart_item"]); 
                    //*if($id >=0) { 
                    //*  unset($_SESSION["cart_item"][$id]);  
                       foreach($_SESSION["cart_item"] as $key => $val){
                           $pd = product::get_product($val["pcode"],$val['qty']);   
                            $_SESSION["cart_item"][$key]['pv'] = $pd['pv'];
                            $_SESSION["cart_item"][$key]['price'] = $pd['price'];
                        }
                        
                    //*} 
                }  
            }
        break;      
        case "sending": 
            if(!empty($_POST["weight"])) {
                if(!empty($_SESSION["cart_item"])) { 
                    $pcode = query('*',"ali_sending","minpv <= '{$_POST['sumpv']}' and maxpv >=	  '{$_POST['sumpv']}' "); 
					if(!empty($pcode[0]['overweight-pcode'])){
						$pd = product::get_product($pcode[0]['overweight-pcode'],'1');  
						$pd['type'] = 'sending';
						if(count($pd))
						 {   
							$product['99999'] = $pd;  
							if(!empty($_SESSION["cart_item"])) { 
								$id = searchForId($pcode[0]['overweight-pcode'],$_SESSION["cart_item"]); 
								if($id >=0) { 
									 
								} else { 
									$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$product);
								}
							} else {
								$_SESSION["cart_item"] = $product;
							} 
						}  
					}
                }
            }
        break; 
        
        case "resending": 
            if(!empty($_POST["weight"])) {
                if(!empty($_SESSION["cart_item"])) { 
                    foreach($_SESSION["cart_item"] as $key => $val):
                        if($val['type'] =='sending'){
                            unset($_SESSION["cart_item"][$key]);  
                        }
                    endforeach;   
                    $pcode = query('*',"ali_sending","minpv <= '{$_POST['sumpv']}' and maxpv >= '{$_POST['sumpv']}' "); 

					
                    if(!empty($pcode[0]['overweight-pcode'])){
						$pd = product::get_product($pcode[0]['overweight-pcode'],'1');  
						$pd['type'] = 'sending';
						if(count($pd))
						 {   
							$product['99999'] = $pd;  
							if(!empty($_SESSION["cart_item"])) { 
								$id = searchForId($pcode[0]['overweight-pcode'],$_SESSION["cart_item"]); 
								if($id >=0) { 
									 
								} else { 
									$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$product);
								}
							} else {
								$_SESSION["cart_item"] = $product;
							} 
						}  
					}
                }
            }
        break; 
        
        case "unsending":
            if(!empty($_POST["weight"])) {
                if(!empty($_SESSION["cart_item"])) { 
                    foreach($_SESSION["cart_item"] as $key => $val):
                        if($val['type'] =='sending'){
                            unset($_SESSION["cart_item"][$key]);  
                        }
                    endforeach;  
                }  
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
    echo '<pre>';
   // print_r($_SESSION["cart_item"]);
    echo '</pre>';
    $item_total = 0;
?>    
<div class='cart'> 
    <table>
      <caption>Product</caption>
      <thead>
        <tr>
         <th width="2%"><a onClick="cartAction('empty','','');" ?><img src="../images/font-awesome/trash.png" alt="remove" width="10px"></i></a></th>
          <th width="10%" ><strong>รหัส</strong></th>
          <th width="25%"><strong>ชื่อสินค้า</strong></th>
          <th width="5%"><strong>จำนวน</strong></th>
          <th width="5%"><strong>ราคา</strong></th>
          <th width="5%"><strong>PV</strong></th>
          <th width="10%"><strong>ราคารวม</strong></th>
          <th width="10%"><strong>PVรวม</strong></th>
        </tr>
      </thead>
      <tbody>
      <?php        

   
        foreach ($_SESSION["cart_item"] as $key => $item){ 
        ?> 
            <tr>
            <td align=center><?php
                    if($item["type"] == 'sending' or $item["type"] == 'sending'){ ?>
                         </td> 
                  <?  }else{ ?>
                         <a onClick="cartAction('remove','<?=$key?>')" ><img src="../images/font-awesome/remove-symbol.png" alt="remove" width="10px"></a> 
                  <?   }?> 
           </td> 
            <td align=center><strong><?php echo $item["pcode"]; ?></strong></td>
            <td align=left><?php echo $item["pdesc"]; ?></td>
            <td align=right><input type='number'min='1'style="width: 62px;text-align:right;" value="<?php echo $item["qty"]; ?>" onchange="cartAction('plus','<?=$key?>',this.value);"></td>  
            <td align=right><?php echo $item["price"]; ?></td>
            <td align=right><?php echo $item["pv"]; ?></td>        
            <td align=right><?php echo $item["price"]*$item["qty"]; ?></td>
            <td align=right><?php echo $item["pv"]*$item["qty"]; ?></td>
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
                    <td align=right></td>
                    <td ><strong><font color='#aaaaaa'><?php echo $keys["pcode"]; ?></font> </strong></td>
                    <td ><font color='#aaaaaa'><?php echo $keys["pdesc"]; ?></font></td>
                    <td align=right><font color='#aaaaaa'><?php echo $keys["qty"]*$item["qty"]; ?></td>
                    <td colspan="5"></td>  
                  </tr> 
                <?
                  }  
            } 
            $item_total += ($item["price"]*$item["qty"]);
            $item_qty += $item["qty"];
            $item_pv += ($item["pv"]*$item["qty"]);
            $item_weight += ($item["weight"]*$item["qty"]);
            }
            ?> 
      </tbody>
      <tfoot>
        <tr style="display:none">
            <th>
               <input type="hidden" id="sumqty" name="sumqty" value="<?=$item_qty;?>"/>
               <input type="hidden" id="sumtotal" name="sumtotal" value="<?=$item_total;?>"/>
               <input type="hidden" id="sumpv" name="sumpv" value="<?=$item_pv;?>"/>
               <input type="hidden" id="sumweigh" name="sumweigh" value="<?=$item_weight;?>"/>
            </th>
        </tr>
        <tr>
          <th colspan="5" align=right></th>
          <th align=right><strong>Total:</strong></th>
          <th align=right><?php echo $item_total; ?></th>
          <th align=right><?php echo $item_pv; ?></th>
        </tr> 
         <tr class="submit">
           <th colspan="5" align=right></th>
           <th colspan="3" align=right>
             <input name="button" id="button" type="button" onclick="eproductcheck()" value="ตรวจสอบ" />
                 &nbsp; <!--input type="submit" value="บันทึก"  onclick="checkForm()" name="ok" id="ok"  disabled="disabled" /--> 
             <input type="submit" value="บันทึก"   name="ok" id="ok"  disabled="disabled" /> 
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