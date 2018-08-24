<?	
	$wording_lan["sms"]["company"] = 'Champ of Champ Innovation';
	
	if($_SESSION["lan"] == "EN"){
		$wording_lan["satype"]["A"] = 'UPGRADE';
		$wording_lan["satype"]["L"] = 'Voucher';
		$wording_lan["satype"]["Y"] = 'Transfer';
		$wording_lan["satype"]["Q"] = 'Maintain'; 
		$wording_lan["satype"]["H"] = 'HOLD';
		$wording_lan["satype"]["Z"] = 'Autoship';
		$wording_lan["satype"]["L"] = 'Voucher';
		$wording_lan["satype"]["B"] = "Maintain";
		$wording_lan["satype"]["D"] = "DIS";
		$wording_lan["logistic"]["1"] = 'sending' ;
		$wording_lan["logistic"]["2"] =  'receive' ;
		$wording_lan["sregister"]["register"]= 'register';
		$wording_lan["sregister"]["extend"]='extend';
		$wording_lan["sregister"]["3"]='buy products' ;
		$wording_lan["sspv"]["1"]='HQ' ;
		$wording_lan["sspv"]["2"]='ATO' ;
		$wording_lan["sspv"]["3"]='Branch' ;
		$wording_lan["sspv"]["4"]='Online' ;
		$wording_lan["sspv"]["5"]='HUB / CENTER' ;
        $wording_lan["sspv"]["6"]='All' ;
        $wording_lan["mtype"]["0"]='Member' ;
        $wording_lan["mtype"]["1"]='Franchise' ;
        $wording_lan["mtype"]["2"]='Agency' ;
        $wording_lan["mtype"]["3"]='Hub' ;
	}
	else{
		$wording_lan["satype"]["A"] = 'บิลปกติ';
		$wording_lan["satype"]["L"] = 'บิลแลกของ';
		$wording_lan["satype"]["Y"] = 'โอนคะแนน';
		$wording_lan["satype"]["Q"] = 'รักษายอดล่วงหน้า'; 
		$wording_lan["satype"]["H"] = 'บิล HOLD';
		$wording_lan["satype"]["Z"] = 'บิล Autoship';
		$wording_lan["satype"]["L"] = 'บิลแลกของ';
		$wording_lan["satype"]["B"] = "รักษายอดภายในเดือน";
		$wording_lan["satype"]["D"] = "DIS";
		$wording_lan["logistic"]["1"] = 'จัดส่ง' ;
		$wording_lan["logistic"]["2"] =  'ไม่จัดส่ง' ;
		$wording_lan["sregister"]["register"]= 'สมัคร';
		$wording_lan["sregister"]["extend"]='ต่ออายุ';
		$wording_lan["sregister"]["3"]='ซื้อของ' ;
		$wording_lan["sspv"]["1"]='HQ' ;
		$wording_lan["sspv"]["2"]='ATO' ;
		$wording_lan["sspv"]["3"]='Branch' ;
		$wording_lan["sspv"]["4"]='Online' ;
		$wording_lan["sspv"]["5"]='HUB / CENTER' ;
        $wording_lan["sspv"]["6"]='ทั้งหมด' ;
        $wording_lan["mtype"]["0"]='Member' ;
        $wording_lan["mtype"]["1"]='Franchise' ;
        $wording_lan["mtype"]["2"]='Agency' ;
        $wording_lan["mtype"]["3"]='Center' ;
	}
		
      

		 $arr_mtype1=array(
		 '0'=>$wording_lan["mtype"]["0"],
		 '1'=>$wording_lan["mtype"]["1"],
		 '2'=>$wording_lan["mtype"]["2"]

		 );
		/////// mtype1 member edit add ///////

$sqlmtype = ",CASE mtype1 WHEN '0' THEN '".$wording_lan["mtype"]["0"]
	."' WHEN '1' THEN '".$wording_lan["mtype"]["1"]
	."' WHEN '2' THEN '".$wording_lan["mtype"]["2"]
	."' WHEN '3' THEN '".$wording_lan["mtype"]["3"]
	."' END AS mtype ";


$sqlscheck = ",CASE scheck WHEN '' THEN 'ซื้อของ' ELSE'Register'END AS ty_sale";
$sqlWhere_satype = ",CASE ash.sa_type WHEN 'A' THEN '".$wording_lan['satype']['A']."' WHEN 'B' THEN '".$wording_lan['satype']['B']."' WHEN 'C' THEN '".$wording_lan['satype']['C']."' WHEN 'Q' THEN '".$wording_lan['satype']['Q']."' WHEN 'H' THEN '".$wording_lan['satype']['H']."' WHEN 'D' THEN '".$wording_lan['satype']['D']."' WHEN 'Z' THEN '".$wording_lan['satype']['Z']."'  WHEN 'L' THEN '".$wording_lan['satype']['L']."' 
 WHEN 'Y' THEN '".$wording_lan['satype']['Y']."' 
 END AS ability";

$sqlWhere_satype1 = ",CASE ali_asaleh.sa_type WHEN 'A' THEN '".$wording_lan['satype']['A']."' WHEN 'B' THEN '".$wording_lan['satype']['B']."' WHEN 'C' THEN '".$wording_lan['satype']['C']."' WHEN 'Q' THEN '".$wording_lan['satype']['Q']."' WHEN 'H' THEN '".$wording_lan['satype']['H']."' WHEN 'D' THEN '".$wording_lan['satype']['D']."' WHEN 'Z' THEN '".$wording_lan['satype']['Z']."' WHEN 'L' THEN '".$wording_lan['satype']['L']."'
 WHEN 'Y' THEN '".$wording_lan['satype']['Y']."' 

END AS ability";

$sqlWhere_satypeh1 = ",CASE ".$dbprefix."holdhead.sa_type WHEN 'A' THEN '".$wording_lan['satype']['A']."' WHEN 'B' THEN '".$wording_lan['satype']['B']."' WHEN 'C' THEN '".$wording_lan['satype']['C']."' WHEN 'Q' THEN '".$wording_lan['satype']['Q']."' WHEN 'H' THEN '".$wording_lan['satype']['H']."' WHEN 'D' THEN '".$wording_lan['satype']['D']."' WHEN 'Z' THEN '".$wording_lan['satype']['Z']."' WHEN 'L' THEN '".$wording_lan['satype']['L']."'
 WHEN 'Y' THEN '".$wording_lan['satype']['Y']."' 
END AS preserve ";

$sqlWhere_satypeh2 = ",CASE h.sa_type WHEN 'A' THEN '".$wording_lan['satype']['A']."' WHEN 'B' THEN '".$wording_lan['satype']['B']."' WHEN 'C' THEN '".$wording_lan['satype']['C']."' WHEN 'Q' THEN '".$wording_lan['satype']['Q']."' WHEN 'H' THEN '".$wording_lan['satype']['H']."' WHEN 'D' THEN '".$wording_lan['satype']['D']."' WHEN 'Z' THEN '".$wording_lan['satype']['Z']."' WHEN 'L' THEN '".$wording_lan['satype']['L']."'
 WHEN 'Y' THEN '".$wording_lan['satype']['Y']."' 
END AS preserve ";

$arr_payment_type=array(
			'เงินสด'=>"เงินสด",
			'เงินโอน'=>"เงินโอน",
			'บัตรเครดิต'=>"บัตรเครดิต",
			'Ewallet'=>"Ewallet",
			'คูปอง'=>"คูปอง"
		);

	  $arr_satype=array(
			'A'=>$wording_lan["satype"]["A"],
			//'Q'=>$wording_lan["satype"]["Q"],				
			'H'=>$wording_lan["satype"]["H"],				
			'Z'=>$wording_lan["satype"]["Z"],				
			'L'=>$wording_lan["satype"]["L"]
			
			);
	  $arr_satype1=array(
			'A'=>$wording_lan["satype"]["A"],
			//'Q'=>$wording_lan["satype"]["Q"],				
			'H'=>$wording_lan["satype"]["H"],				
			'L'=>$wording_lan["satype"]["L"]
			
			);
		/////// บิล บิลขาย  member edit add ///////
		  $arr_satype_upgrade=array(
			'A'=>$wording_lan["satype"]["A"],
			'H'=>$wording_lan["satype"]["H"]	
			);

		   $arr_satype_show_bill=array(
            'A'=>$wording_lan["satype"]["A"],
			//'Q'=>$wording_lan["satype"]["Q"],
			'H'=>$wording_lan["satype"]["H"],	
			'Z'=>$wording_lan["satype"]["Z"],	
			'L'=>$wording_lan["satype"]["L"]	
            );
		/////// บิล บิลขาย  member edit add ///////
		  $arr_satype_m=array(
			'A'=>$wording_lan["satype"]["A"],
			//'Q'=>$wording_lan["satype"]["Q"],
			'H'=>$wording_lan["satype"]["H"]	
			);

			$arr_satype_mh=array(
			'A'=>$wording_lan["satype"]["A"],				
			'H'=>$wording_lan["satype"]["H"]				
			//'Q'=>$wording_lan["satype"]["Q"]
			);
			$arr_satype_m0=array(
			'A'=>$wording_lan["satype"]["A"]			
			//'Q'=>$wording_lan["satype"]["Q"]
			);
			$arr_satype_mmm=array(
			'L'=>$wording_lan["satype"]["L"]	
			);

			/// Branch
			 $arr_satype_b=array(
			'A'=>$wording_lan["satype"]["A"],
			//'Q'=>$wording_lan["satype"]["Q"],
			'H'=>$wording_lan["satype"]["H"]	
			);

			  $arr_satype_mm=array(
			'A'=>$wording_lan["satype"]["A"],			
			//'Q'=>$wording_lan["satype"]["Q"],
			'H'=>$wording_lan["satype"]["H"]	
			);
			
			$arr_sspv1=array(
			''=>$wording_lan["sspv"]["6"],  // ทั้งหมด ไม่รวม Stockist
			//'1'=>$wording_lan["sspv"]["1"],  // HQ
			//'2'=>$wording_lan["sspv"]["2"],  // ATO
			'2'=>$wording_lan["sspv"]["3"],  //Branch
		//	'3'=>$wording_lan["sspv"]["4"],  //Online
		//	'5'=>$wording_lan["sspv"]["5"]	// Stockist
			);
		/////// mtype1 member edit add ///////

		////// logistic/////
		 $arr_logistic=array(
			'1'=>$wording_lan["logistic"]["1"],
			'2'=>$wording_lan["logistic"]["2"]
		 );

		////// sregister ////////
		 $arr_sregister=array(
			'register'=>$wording_lan["sregister"]["register"],
		//	'extend'=>$wording_lan["sregister"]["extend"],
			'3'=>$wording_lan["sregister"]["3"]
		 );

		////sspv ///////
		  $arr_sspv=array(
			''=>$wording_lan["sspv"]["6"],  // ทั้งหมด ไม่รวม Stockist
			//'1'=>$wording_lan["sspv"]["1"],  // HQ
			//'2'=>$wording_lan["sspv"]["2"],  // ATO
			'2'=>$wording_lan["sspv"]["3"],  //Branch
			'3'=>$wording_lan["sspv"]["4"],  //Online
			//'5'=>$wording_lan["sspv"]["5"]	// Stockist
			);

		 $arr_sspv_hub=array(
			//'6'=>$wording_lan["sspv"]["6"],  // ทั้งหมด ไม่รวม Stockist
			//'1'=>$wording_lan["sspv"]["1"],  // HQ
			//'2'=>$wording_lan["sspv"]["2"],  // ATO
			//'3'=>$wording_lan["sspv"]["3"],  //Branch
			//'4'=>$wording_lan["sspv"]["4"],  //Online 
			'5'=>$wording_lan["sspv"]["5"]	// Stockist
			);
 		 $arr_satypeh1=array(
			'A'=>$wording_lan["satype"]["A"],
			 'R'=>"สมัครสมาชิก",
			'Y'=>$wording_lan["satype"]["Y"]	
			);

 		 $arr_satypeh2=array(
			'A'=>$wording_lan["satype"]["A"],
             'R'=>"สมัครสมาชิก",
			);


/** <select name="satype" id="satype">
                <option  value="" >เลือกรูปแบบการซื้อ  </option>     
				<?php		
					foreach($arr_satype as $key => $value):			
					echo '<option value="'.$key.'"';
						if($satype==$key)echo "selected";
					echo'>'.$value.'</option>'; 
					endforeach;
				?>
              </select>

*/
?>


   