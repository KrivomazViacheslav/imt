<?php
class magic
{
	private $data = array();
	public $k;

	public function __construct($var)
	{
		$this->k = $var;
	}

	public function __toString()
	{
		return $this->k;
	}

	public function __isset($name)
	{
		echo 'isset ?';
		return isset($this->data[$name]);
	}

	public function __unset($name)
	{
		echo 'deleted';
		unset($this->data[$name]);
	}

	public function __set($name, $value)
	{
		$this->data[$name] = $value;
	}
}

$magic = new Magic('is object');
echo $magic."<br>";
$magic->v = '111';
var_dump(isset($magic->v));
echo "<br>";
unset($magic->v);
var_dump(isset($magic->v));
