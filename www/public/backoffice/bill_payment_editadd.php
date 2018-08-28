
<?
require("connectmysql.php");

if($_POST){
	move_uploaded_file($_FILES["fileCSV"]["tmp_name"],"bill_payment_import/".$_FILES["fileCSV"]["name"]); // Copy/Upload CSV

	$objCSV = fopen("bill_payment_import/".$_FILES["fileCSV"]["name"], "r");
	$i=1;
	$true = "";
	$true_c =0;
	$false = "";
	$false_c =0;
	while (($objArr = fgetcsv($objCSV, 1000, ",")) !== FALSE) {
		$date = explode("/",$objArr[0]);
		$date1  = $date[2].'-'.gen_code($date[1]).'-'.$date[0];
		
		$time = explode(":",$objArr[8]);
		$bill_no = $objArr[2];

		$amount = explode(",",$objArr[7]);
		$amount = $amount[0].$amount[1];
		if($i>1){

		$sqlcheck = " select ref1 from ".$dbprefix."billpayment where ref1 = '".$bill_no."'";
		$rscheck = mysql_query($sqlcheck);
		$check_bill_no = mysql_num_rows($rscheck);
	
			if($check_bill_no==0){
				$true_c++;
				$true .= "<tr>
								<td>$objArr[0]</td>
							<td>$objArr[1]</td>
							<td>$objArr[2]</td>
							<td>$objArr[3]</td>
							<td>$objArr[4]</td>
							<td>$objArr[5]</td>
							<td>$objArr[6]</td>
							<td>$amount</td>
							<td>$objArr[8]</td>
							<td>$objArr[9]</td>
							<td>$objArr[10]</td>
							<td>$objArr[11]</td>
							<td>$objArr[12]</td>
							<td>$objArr[13]</td>
							<td>$objArr[14]</td>
						  </tr>";
				
					$billpayment = array(
						"no"					=> $objArr[0],
						"tx"					=> $objArr[1],
						"ref1"					=> $objArr[2],
						"ref2"					=> $objArr[3],
						"ref3"					=> $objArr[4],
						"player_name"			=> $objArr[5],
						"cheque_bank"			=> $objArr[6],
						"amount"				=> $amount,
						"payment_time"			=> $objArr[8],
						"teller_id"				=> $objArr[9],
						"branch_no"				=> $objArr[10],
						"branch_name"			=> $objArr[11],
						"cheque_no"				=> $objArr[12],
						"fee_zone1"				=> $objArr[13],
						"fee_zone2"				=> $objArr[14],
						"uid"					=> $_SESSION['adminusercode']
						
					);
					insert("ali_billpayment",$billpayment) ;
					//echo "Upload & Import Done.";

			}else {
				$false_c++;
				$false .= "<tr>
							<td>$objArr[0]</td>
							<td>$objArr[1]</td>
							<td>$objArr[2]</td>
							<td>$objArr[3]</td>
							<td>$objArr[4]</td>
							<td>$objArr[5]</td>
							<td>$objArr[6]</td>
							<td>$amount</td>
							<td>$objArr[8]</td>
							<td>$objArr[9]</td>
							<td>$objArr[10]</td>
							<td>$objArr[11]</td>
							<td>$objArr[12]</td>
							<td>$objArr[13]</td>
							<td>$objArr[14]</td>
					  </tr>";
			}
		}
		$i++;
	}
	@unlink("bill_payment_import/".$_FILES["fileCSV"]["name"]);
}

function gen_code($source){
	for($i=strlen($source);$i<2;$i++)
		$source = "0".$source;
	return $source;
}

?>
<form action="index.php?sessiontab=3&sub=203&state=2" method="post" enctype="multipart/form-data" name="form1">
  <input name="fileCSV" type="file" id="fileCSV">
  <input name="btnSubmit" type="submit" id="btnSubmit" value="Submit">
</form>

<h2>รายการที่นำเข้าสำเร็จ  <?=$true_c?>  รายการ</h2>
<div class="datagrid">
<table >
<thead>
<tr>
	<th>No.</th>
	<th>Tx</th>
	<th>Reference No-1</th>
	<th>Reference No-2</th>
	<th>Reference No-3</th>
	<th>Payer Name</th>
	<th>Cheque Bank Code</th>
	<th>Amount</th>
	<th>Payment Time</th>
	<th>Teller ID</th>
	<th>Branch No</th>
	<th>Branch Name</th>
	<th>Cheque No</th>
	<th>Fee (Same Zone)</th>
	<th>Fee (Diff Zone)</th>
</tr>
<thead>
<? echo $true;?>
</table>
</div>
<hr/>

<h2>รายการที่ไม่สามารถนำเข้าได้   <?=$false_c?>  รายการ</h2>
<div class="datagrid">
<table>
<thead>
<tr>
	<th>No.</th>
	<th>Tx</th>
	<th>Reference No-1</th>
	<th>Reference No-2</th>
	<th>Reference No-3</th>
	<th>Payer Name</th>
	<th>Cheque Bank Code</th>
	<th>Amount</th>
	<th>Payment Time</th>
	<th>Teller ID</th>
	<th>Branch No</th>
	<th>Branch Name</th>
	<th>Cheque No</th>
	<th>Fee (Same Zone)</th>
	<th>Fee (Diff Zone)</th>
</tr>
<thead>
<? echo $false;?>
</table>
</div>

