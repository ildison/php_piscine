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

	public static function doc()
	{
		if (file_exists("./Color.doc.txt"))
			if (($doc = file_get_contents("./Color.doc.txt")))
				return ($doc);
	}
	public function __construct(array $args)
	{
		$this->_x = $args['x'];
		$this->_y = $args['y'];
		$this->_z = $args['z'];
		$this->_w = array_key_exists('w', $args) ? $args['w'] : 1.0;
		$this->_color = array_key_exists('color', $args) ? $args['color'] : new Color('rgb'=>0xffffff);
	}
}
?>