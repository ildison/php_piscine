<?php

require_once 'Color.class.php';

class Vertex
{
	private $_x = 0.0;
	private $_y = 0.0;
	private $_z = 0.0;
	private $_w = 1.0;
	private $_color;

	static $verbose=FALSE;

	public function getX(){ return $this->_x;}
	public function getY(){ return $this->_y;}
	public function getZ(){ return $this->_z;}
	public function getW(){ return $this->_w; }
	public static function doc()
	{
		if (file_exists("./Vertex.doc.txt"))
			if (($doc = file_get_contents("./Vertex.doc.txt")))
				return ($doc);
	}
	public function __construct(array $kwargs)
	{
		$this->_x = $kwargs['x'];
		$this->_y = $kwargs['y'];
		$this->_z = $kwargs['z'];
		$this->_w = array_key_exists('w', $kwargs) ? $kwargs['w'] : 1.0;
		$this->_color = array_key_exists('color', $kwargs) ? $kwargs['color'] : new Color(array('rgb'=>0xffffff));
		if (Vertex::$verbose === TRUE)
			print($this." constructed".PHP_EOL);
	}
	function __toString()
	{
		$str = sprintf("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f", $this->_x, $this->_y, $this->_z, $this->_w);
		if (Vertex::$verbose === TRUE)
			$str .= ", ".$this->_color;
		return ($str." )");
	}
	public function __destruct()
	{
		if (Vertex::$verbose === TRUE)
			print($this." destructed".PHP_EOL);
	}
}
?>