<meta http-equiv="Content-Type" content="text/html; charset=tis-620">
<? include("connectmysql.php");?>
<? include("gencode.php");?>
<? include("../function/function_pos.php");?>

<?
    $update = array( 'ewallet' => 0, 
                     'voucher' => 0,   
                     'eatoship' => 0,
					 'bewallet' => 0,
					 'bvoucher' => 0
                    );
    update('ali_member',$update," 1=1 "); 

    del('ali_ewallet'," 1=1  and uid = 'support' "); 
	del('ali_eatoship'," 1=1 and uid = 'support' ");   
    del('ali_voucher'," 1=1 ");    
    
    del('ali_log_ewallet'," 1=1 and sa_type <> 'I'");       
    del('ali_log_eatoship'," 1=1 and sa_type <> 'I'");       
    del('ali_log_voucher'," 1=1 ");    
    del('ali_asaleh'," sa_type = 'Z' ");    
    del('ali_asaled'," pcode = 'AS001' ");    

	$data = query("*","ali_ewallet"," sa_type = 'I' and cancel = 0 order by id asc ");
	foreach($data as $k => $v){
	   mysql_query("UPDATE ali_member SET ewallet = ewallet+{$v['total']} WHERE mcode = '{$v['mcode']}' ");
	   log_ewallet('ewallet',$v['mcode'],$v['sano'],$v['total'],'I',$v['sadate'],""); 
	}

	$data = query("*","ali_eatoship"," sa_type = 'I'  and cancel = 0  order by id asc ");
	foreach($data as $k => $v){
	   mysql_query("UPDATE ali_member SET eatoship = eatoship+{$v['total']} WHERE mcode = '{$v['mcode']}' ");
	   log_ewallet('eatoship',$v['mcode'],$v['sano'],$v['total'],'I',$v['sadate'],""); 
	}
?>