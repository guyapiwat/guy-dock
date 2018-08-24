<? 
include("../backoffice/connectmysql.php");
include("../function/function_pos.php");
/*
echo $_POST["action"]." ".$_POST["cprovince"]." ".$_POST["camphur"]." ".$_POST["cdistrict"];
if($_POST["action"] == "camphur"){echo getCamphur($_POST["cprovince"]);}
else if($_POST["action"] == "cdistrict"){echo getCdistrict($_POST["cprovince"],$_POST["camphur"]);}
else if($_POST["action"] == "czip"){echo getCzip($_POST["cprovince"],$_POST["camphur"],$_POST["cdistrict"]);}
*/
//$_POST["action"] = "";
switch($_POST["action"]){ 
	case "camphur":
		echo iconv('TIS-620','UTF-8',getCamphur($_POST["cprovince"]));
		break;
	case "cdistrict":
		echo iconv('TIS-620','UTF-8',getCdistrict($_POST["cprovince"],$_POST["camphur"]));
		break;
	case "czip":
		echo iconv('TIS-620','UTF-8',getCzip($_POST["cprovince"],$_POST["camphur"],$_POST["cdistrict"]));
		break;
	case "all":
		echo iconv('TIS-620','UTF-8',getAll($_POST["mcode"]));
		break;
	default :
		echo "";	
		break;
}


 


function getCamphur($provinceId,$where=""){
	$data = "";
	$camphur = query("*","amphur","provinceId='".$provinceId."' ".$where);
	if(count($camphur)){
		foreach($camphur as $keys => $values){
			$data .= "<option value=".$values["amphurId"].">";
			$data .= $values["amphurName"];
			$data .= "</option>";
		}
	}
	else{
		$data .= "<option value=''>กรุณาเลือก</option>";
	}
	return $data;
}
function getCdistrict($provinceId,$amphurId,$where=""){
	$data = "";
	$district = query("*","district","provinceId='".$provinceId."' and amphurId='".$amphurId."' ".$where);
	if(count($district)){
		foreach($district as $keys => $values){
			$data .= "<option value=".$values["districtId"].">";
			$data .= $values["districtName"];
			$data .= "</option>";
		}
	}
	else{
		$data .= "<option value=''>กรุณาเลือก</option>";
	}
	return $data;
}
function getCzip($provinceId,$amphurId,$districtId){
	$data = "";
	$zip = query("*","district","provinceId='".$provinceId."' and amphurId='".$amphurId."' and districtId='".$districtId."'");
	if(count($zip)){
		$data .= $zip[0]["zipcode"];
	}
	else{ 
		$data .= "";
	}
	$data = iconv('TIS-620','UTF-8',$data);
	return $data;
}
function getAll($mcode){
	$data = "";
	$member = query("*","ali_member","mcode='".$mcode."'");
	$province = query("*","province","provinceName LIKE '".$member[0]["cprovinceId"]."'");
	$amphur = query("*","amphur","amphurName LIKE '".$member[0]["camphurId"]."'");
	$district = query("*","district","districtName LIKE '".$member[0]["cdistrictId"]."'");
	$data .= "cname:".$member[0]["name_f"].$member[0]["name_t"];
	$data .= "|cmobile:".$member[0]["mobile"];
	$data .= "|caddress:".$member[0]["caddress"];
	if(!empty($member[0]["cbuilding"]))$data .= " อาคาร ".$member[0]["cbuilding"];
	if(!empty($member[0]["cvillage"]))$data .= " หมู่บ้าน ".$member[0]["cvillage"];
	if(!empty($member[0]["cstreet"]))$data .= " ถนน ".$member[0]["cstreet"];
	if(!empty($member[0]["csoi"]))$data .= " ซอย ".$member[0]["csoi"];
	$data .= "|cprovince:".$province[0]["provinceId"];
	$data .= "|camphur:".getCamphur($province[0]["provinceId"],$where="and amphurId='".$amphur[0]["amphurId"]."'");
	$data .= "|cdistrict:".getCdistrict($province[0]["provinceId"],$amphur[0]["amphurId"],$where="and districtId='".$district[0]["districtId"]."'");
	$data .= "|czip:".$district[0]["zipcode"];
	return $data;
}










?>