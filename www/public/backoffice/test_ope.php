<?
include("connectmysql.php");
include("../function/function_pos.php"); 
$data =  get_detail_meber('0000001',date('Y-m-d'));   
echo '<pre>';
print_r($data);
echo '</pre>';
$table = 'ewallet';
$sano = gencodesale_news('E',"ali_".$table,"ONLIN",$data['locationbase']);
echo $sano,'<br>';



exit;




$product['pcode'] = array('BS001','PK001');
$product['qty'] = array('2','3');
$product['price'] = array('1000','5000');


foreach($product['pcode'] as $key => $val){ 
    $pd = locationbase::get_product($val);  
    $asaleds[$val]['pcode'] = $pd['pcode'];
    $asaleds[$val]['pdesc'] =  $pd['pdesc'];;
    $asaleds[$val]['weight'] =  $pd['weight'];;
    $asaleds[$val]['qty'] = $product['qty'][$key];
    $asaleds[$val]['price'] = $product['price'][$key];
    $asaleds[$val]['pv'] = $product['pv'][$key];
    if($data['satype'] == 'D') $asaleds[$val]['pv'] = '0';
    $asaleds[$val]['bprice'] = $pd['bprice'];
    $asaleds[$val]['amt'] = $product['qty'][$key]*$product['price'][$key];
    $asaleds[$val]['sadate'] = $data['sadate'];
    $asaleds[$val]['mcode'] = $data['mcode'];
    $asaleds[$val]['inv_code'] = $data["inv_code"];
    $asaleds[$val]['locationbase'] = $_SESSION["inv_locationbase"];  
    $data['tot_bprice'] += $pd['bprice'];
    $data['tot_weight'] += $pd['weight']*$product['qty'][$key];
    $asaleds[$val]['vat'] = $pd['vat'];
    if($pd['type'] == 'sending'){
        $data['sending'] += $pd['price'];
    }
    if($pd['vat'] == 0){
        $total_exvat+=($asaleds[$val]['amt']); //รราคา ไม่รวม vat
    }else{
        $vat_sum = ($asaleds[$val]['amt']*$pd['vat']/(100+$pd['vat']));
        $total_vat+=($asaleds[$val]['amt']*$pd['vat']/(100+$pd['vat']));
        $total_invat_sum+= ($asaleds[$val]['amt'])-$vat_sum;
    }
 
}

echo '<pre>';
print_r($total_invat_sum);
echo '</pre>';


?>


