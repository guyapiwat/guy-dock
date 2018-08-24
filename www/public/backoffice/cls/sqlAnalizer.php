<?
class sqlAnalizer{
	private $sqlcmd = array('SELECT','FROM','WHERE','ORDER BY','LIMIT');
	private $sqlkeyval = array('field'=>0,'table'=>1,'cause'=>2,'order'=>3,'limit'=>4);
	private $sqlval = array("*","","","","");
	public function sqlAnalizer(){}
	public function setQuery($str){
		$str = str_replace("select","SELECT",$str);
		$str = str_replace("from","FROM",$str);
		$str = str_replace("where","WHERE",$str);
		$str = str_replace("order","ORDER",$str);
		$str = str_replace("by","BY",$str);
		$str = str_replace("limit","LIMIT",$str);
		$this->qry = $str;
		list($tmp,$str) = explode("SELECT",$str);
		list($this->sqlval[0],$str) = explode("FROM",$str);
		list($this->sqlval[1],$str) = explode("WHERE",$str);
		list($this->sqlval[2],$str) = explode("ORDER BY",$str);
		list($this->sqlval[3],$str) = explode("LIMIT",$str);
	}
	public function getSql(){
		$sql = $this->sqlcmd[0]." ".$this->sqlval[0]." ";	//SELECT
		$sql .= $this->sqlcmd[1]." ".$this->sqlval[1]." ";	//FROM
		$sql .= $this->sqlval[2]==""?"":$this->sqlcmd[2]." ".$this->sqlval[2]." ";	//WHERE
		$sql .= $this->sqlval[3]==""?"":$this->sqlcmd[3]." ".$this->sqlval[3]." ";	//ORDER
		$sql .= $this->sqlval[4]==""?"":$this->sqlcmd[4]." ".$this->sqlval[4]." ";	//LIMIT
		return $sql;
	}
}
?>