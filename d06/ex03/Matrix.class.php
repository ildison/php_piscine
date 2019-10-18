<?php

require_once 'Vertex.class.php';
require_once 'Vector.class.php';

class Matrix
{
	const IDENTITY		= "IDENTITY";
	const SCALE			= "SCALE";
	const RX			= "RX";
	const RY			= "RY";
	const RZ			= "RZ";
	const TRANSLATION	= "TRANSLATION";
	const PROJECTION	= "PROJECTION";

	private $_vctX = array('x'=>1.0, 'y'=>0.0, 'z'=>0.0, 'w'=> 0.0);
	private $_vctY = array('x'=>0.0, 'y'=>1.0, 'z'=>0.0, 'w'=> 0.0);
	private $_vctZ = array('x'=>0.0, 'y'=>0.0, 'z'=>1.0, 'w'=> 0.0);
	private $_vtxO = array('x'=>0.0, 'y'=>0.0, 'z'=>0.0, 'w'=> 1.0);
	static $verbose=FALSE;

	private function translation_matrix(Vector $vtc)
	{
		$this->_vtxO['x'] = $vtc->getX();
		$this->_vtxO['y'] = $vtc->getY();
		$this->_vtxO['z'] = $vtc->getZ();
	}
	private function scale_matrix($scale)
	{
		$this->_vctX['x'] = $scale;
		$this->_vctY['y'] = $scale;
		$this->_vctZ['z'] = $scale;
	}
	private function rx_matrix($R, $angel)
	{
		$cos = cos($angel);
		$sin = sin($angel);
		switch($R) {
			case 'RX':
				$this->_vctY['y'] = $cos;
				$this->_vctY['z'] = $sin;
				$this->_vctZ['y'] = -$sin;
				$this->_vctZ['z'] = $cos;
				break;
			case 'RY':
				$this->_vctX['x'] = $cos;
				$this->_vctX['z'] = -$sin;
				$this->_vctZ['x'] = $sin;
				$this->_vctZ['z'] = $cos;
				break;
			case 'RZ':
				$this->_vctX['x'] = $cos;
				$this->_vctX['y'] = $sin;
				$this->_vctY['x'] = -$sin;
				$this->_vctY['y'] = $cos;
		}
	}
	private function projection_matrix($kwargs)
	{
		$this->_vctX['x'] = 1 / ($kwargs['ratio'] * tan(deg2rad($kwargs['fov']) / 2));
		$this->_vctY['y'] = 1 / tan(deg2rad($kwargs['fov']) / 2);
		$this->_vctZ['z'] = -(($kwargs['far'] + $kwargs['near']) / ($kwargs['far'] - $kwargs['near']));
		$this->_vctZ['w'] = -1;
		$this->_vtxO['z'] =  -((2 * $kwargs['far'] * $kwargs['near']) / ($kwargs['far'] - $kwargs['near']));
	}
	public function __construct(array $kwargs)
	{
		switch($kwargs['preset']) {
			case 'TRANSLATION':
				$this->translation_matrix($kwargs['vtc']);
				break;
			case 'SCALE':
				$this->scale_matrix($kwargs['scale']);
				break;
			case 'RX': case 'RY': case 'RZ':
				$this->rx_matrix($kwargs['preset'], $kwargs['angle']);
				break;
			case PROJECTION:
				$this->projection_matrix($kwargs);
		}
		if (Matrix::$verbose === TRUE)
			print("Matrix ".$kwargs['preset']." instance constructed".PHP_EOL);
	}
	public function transformVertex(Vertex $vtx)
	{
		$new = new Vertex(array('x' => 0, 'y' => 0, 'z' => 0));
		$new->setX($this->_vctX['x'] * $vtx->getX()
					+ $this->_vctX['y'] * $vtx->getY()
					+ $this->_vctX['z'] * $vtx->getZ()
					+ $this->_vctX['w'] * $vtx->getW());
		$new->setY($this->_vctY['x'] * $vtx->getX()
					+ $this->_vctY['y'] * $vtx->getY()
					+ $this->_vctY['z'] * $vtx->getZ()
					+ $this->_vctY['w'] * $vtx->getW());
		$new->setZ($this->_vctZ['x'] * $vtx->getX()
					+ $this->_vctZ['y'] * $vtx->getY()
					+ $this->_vctZ['z'] * $vtx->getZ()
					+ $this->_vctZ['w'] * $vtx->getW());
		$new->setW($this->_vtxO['x'] * $vtx->getX()
					+ $this->_vtxO['y'] * $vtx->getY()
					+ $this->_vtxO['z'] * $vtx->getZ()
					+ $this->_vtxO['w'] * $vtx->getW());
		return ($new);
	}
	public static function doc()
	{
		if (file_exists("./Matrix.doc.txt"))
			if (($doc = file_get_contents("./Matrix.doc.txt")))
				return ($doc);
	}
	function __toString()
	{
		$str = sprintf("M | vtcX | vtcY | vtcZ | vtxO\n-----------------------------\n");
		$str .= sprintf("x | %.2f | %.2f | %.2f | %.2f\n", $this->_vctX['x'], $this->_vctY['x'], $this->_vctZ['x'], $this->_vtxO['x']);
		$str .= sprintf("x | %.2f | %.2f | %.2f | %.2f\n", $this->_vctX['y'], $this->_vctY['y'], $this->_vctZ['y'], $this->_vtxO['y']);
		$str .= sprintf("x | %.2f | %.2f | %.2f | %.2f\n", $this->_vctX['z'], $this->_vctY['z'], $this->_vctZ['z'], $this->_vtxO['z']);
		$str .= sprintf("x | %.2f | %.2f | %.2f | %.2f", $this->_vctX['w'], $this->_vctY['w'], $this->_vctZ['w'], $this->_vtxO['w']);
		return ($str);
	}
	public function __destruct()
	{
		if (Vector::$verbose === TRUE)
			print("Matrix ".$kwargs['preset']." instance destructed".PHP_EOL);
	}
}
?>