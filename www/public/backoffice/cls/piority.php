<? class piority{
	//private $accessDef = array(1=>"view",2=>"add",4=>"edit",8=>"del");
	//private $access = array(1=>false,2=>false,4=>false,8=>false);
	private $accessDef = array(1=>"add",2=>"edit",4=>"del",8=>"view");
	private $access = array(1=>false,2=>false,4=>false,8=>false);
	public function setAccess($accessDef,$access){
		$this->accessDef = $accessDef;
		if($accessDef=="")
			$this->access = $acess;
		else
			foreach(array_keys($this->accessDef) as $key){
				$this->access[$key] = 0;
			}
	}
	public function calc($pioriNum){//calculate user access
		$tmp = base_convert($pioriNum,10,2);
		for($i=strlen($tmp);$i<sizeof($this->accessDef);$i++){
			$tmp = "0".$tmp;
		}
		//echo $tmp;
		$i=strlen($tmp);
		foreach(array_keys($this->access) as $key){
			$this->access[$key] = substr($tmp,--$i,1)==0?false:true;
		}
		//print_r($this->access);
	}
	public function isAccess($check){//return on access number value
		return $this->access[$check];
	}
	public function getNameAccess($check){//return defination of access number
		return $this->accessDef[$check];
	}
	public function getAllAccess(){//return array access value
		return $this->access;
	}
	public function getAllAccessDef(){//return array access value
		return $this->accessDef;
	}
}

?>
<?
	/*$acc = new piority();
	$acc->calc(1);
	if($acc->isAccess(4))*/
	
?>