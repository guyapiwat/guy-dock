<?
class winbox{
	private $width = 200;
	private $height = 200;
	private $title = array('head'=>"title",'foot'=>"");
	private $colorSet = array("#999999","#FFFFFF","#EEEEEE");
	public winbox($w,$h){
		$this->width = $w;
		$this->height = $h;
	}
	public setHead($str,$color){
		$this->title['head'] = $str;
		$this->colorSet[0] = $color;
	}
	public setHead($type,$info,$color){
		//$this->title = $str;
		$this->colorSet[1] = $color;
	}
	public setHead($str,$color){
		$this->title['foot'] = $str;
		$this->colorSet[2] = $color;
	}
}
?>