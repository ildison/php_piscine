<?php

require_once 'Vertex.class.php';

class Vector
{
	private $_x = 0.0;
	private $_y = 0.0;
	private $_z = 0.0;
	private $_w = 0.0;

	static $verbose=FALSE;

	public function getX(){ return $this->_x; }
	public function getY(){ return $this->_y; }
	public function getZ(){ return $this->_z; }
	public function getW(){ return $this->_w; }
	public static function doc()
	{
		if (file_exists("./Vector.doc.txt"))
			if (($doc = file_get_contents("./Vector.doc.txt")))
				return ($doc);
	}
	public function __construct(array $kwargs)
	{
		$orig = array_key_exists('orig', $kwargs) ? $kwargs['orig'] : new Vertex(array('x'=>0, 'y'=>0, 'z'=>0));
		$dest = $kwargs['dest'];
		$this->_x = $dest->getX() - $orig->getX();
		$this->_y = $dest->getY() - $orig->getY();
		$this->_z = $dest->getZ() - $orig->getZ();
		if (Vector::$verbose === TRUE)
			print($this." constructed".PHP_EOL);
	}
	function __toString()
	{
		$str = sprintf("Vector( x:%.2f, y:%.2f, z:%.2f, w:%.2f )", $this->_x, $this->_y, $this->_z, $this->_w);
		return ($str);
	}
	public function __destruct()
	{
		if (Vector::$verbose === TRUE)
			print($this." destructed".PHP_EOL);
	}
	public function magnitude()
	{
		$norm = floatval(sqrt(pow($this->_x, 2) + pow($this->_y, 2) + pow($this->_z, 2)));
		return ($norm);
	}
	public function normalize()
	{
		$norm = $this->magnitude();
		$x = $this->_x / $norm;
		$y = $this->_y / $norm;
		$z = $this->_z / $norm;
		$vector = new Vertex(array('x'=>$x,'y'=>$y,'z'=>$z));
		return (new Vector(array('dest'=>$vector)));
	}
	public function add(Vector $addend)
	{
		$x = $this->_x + $addend->_x;
		$y = $this->_y + $addend->_y;
		$z = $this->_z + $addend->_z;
		$vector = new Vertex(array('x'=>$x,'y'=>$y,'z'=>$z));
		return (new Vector(array('dest'=>$vector)));
	}
	public function sub(Vector $sub)
	{
		$x = $this->_x - $sub->_x;
		$y = $this->_y - $sub->_y;
		$z = $this->_z - $sub->_z;
		$vector = new Vertex(array('x'=>$x,'y'=>$y,'z'=>$z));
		return (new Vector(array('dest'=>$vector)));
	}
	public function scalarProduct($mul)
	{
		$x = $this->_x * $mul;
		$y = $this->_y * $mul;
		$z = $this->_z * $mul;
		$vector = new Vertex(array('x'=>$x,'y'=>$y,'z'=>$z));
		return (new Vector(array('dest'=>$vector)));
	}
	public function opposite()
	{
		return ($this->scalarProduct(-1));
	}
	public function dotProduct(Vector $rhs)
	{
		return ($this->_x * $rhs->_x + $this->_y * $rhs->_y + $this->_z * $rhs->_z);
	}
	public function crossProduct(Vector $rhs)
	{
		$x = $this->_y * $rhs->_z - $this->_z * $rhs->_y;
		$y = $this->_z * $rhs->_x - $this->_x * $rhs->_z;
		$z = $this->_x * $rhs->_y - $this->_y * $rhs->_x;
		$vector = new Vertex(array('x'=>$x,'y'=>$y,'z'=>$z));
		return (new Vector(array('dest'=>$vector)));
	}
	public function cos(Vector $rhs)
	{
		return ($this->dotProduct($rhs) / ($this->magnitude() *  $rhs->magnitude()));
	}
}
?>