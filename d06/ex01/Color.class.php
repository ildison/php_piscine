<?php
class Color
{
	public $red;
	public $green;
	public $blue;
	static $verbose=FALSE;

	public static function doc()
	{
		if (file_exists("./Color.doc.txt"))
			if (($doc = file_get_contents("./Color.doc.txt")))
				return ($doc);
	}
	public function __construct(array $args)
	{
		if (array_key_exists('rgb', $args))
		{
			$this->red = ($args['rgb'] >> 16) & 0xff;
			$this->green = ($args['rgb'] >> 8) & 0xff;
			$this->blue = $args['rgb'] & 0xff;
		}
		else
		{
			$this->red = array_key_exists('red', $args) ? $args['red'] : 0;
			$this->green = array_key_exists('green', $args) ? $args['green'] : 0;
			$this->blue = array_key_exists('blue', $args) ? $args['blue'] : 0;
		}
		if (Color::$verbose === TRUE)
			print($this . " constructed.\n");
	}
	public function __destruct()
	{
		if (Color::$verbose === TRUE)
			print($this . " destructed.\n");
	}
	function add($color)
	{
		$red	= $this->red + $color->red;
		$green	= $this->green + $color->green;
		$blue	= $this->blue + $color->blue;
		return (new Color(array('red' => $red, 'green' => $green, 'blue' => $blue)));
	}
	function sub($color)
	{
		$red	= $this->red - $color->red;
		$green	= $this->green - $color->green;
		$blue	= $this->blue - $color->blue;
		return (new Color(array('red' => $red, 'green' => $green, 'blue' => $blue)));
	}
	function mult($f)
	{
		$red	= $this->red * $f;
		$green	= $this->green * $f;
		$blue	= $this->blue * $f;
		return (new Color(array('red' => $red, 'green' => $green, 'blue' => $blue)));
	}
	function __toString()
	{
		$str = sprintf("Color( red: %3d, green: %3d, blue: %3d )", $this->red, $this->green, $this->blue);
		return ($str);
	}
}
?>