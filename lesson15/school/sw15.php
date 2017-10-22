<?php

/*class Test
{
	public function __construct()
	{
		echo 'hello';
	}

	public function say()
	{
		echo 'world';
	}

	public function __destruct()
	{
		echo 'DESTRUCT';
	}
}

class Test2 extends Test
{
	public function __construct()
	{
		parent::__construct();
		echo 'TEST2';
	}

	public function go()
	{
		$this->say();
	}

	public function __destruct()
	{
		parent::__destruct();
		echo 'DESTRUCT2';
	}
}

$obj = new Test2();
$obj->go();*/

/********************************************************/

/*class St
{
	static public $name;
	const NAME = 'CONST NAME';

	static public function say()
	{
		echo self::$name;
		echo self::NAME;
	}
}

class St2 extends St
{
	static public function say()
	{
		parent::say();
	}
}

St::say();
echo St::NAME;*/

/********************************************************/

/*abstract class A
{
	abstract public function say();
}

class B extends A
{
	public function say()
	{
		echo 'hello';
	}
}

$obj = new B();*/

/********************************************************/

/*interface iTest
{
	public function say();
	public function say1();
}

class TestI implements iTest
{
	public function say()
	{

	}

	public function say1()
	{

	}	
}*/

/********************************************************/

/*final class F
{
	final public function say()
	{
		echo 'hello';
	}
}

class F2 extends F
{
	public function get()
	{
		$this->say();
	}

	public function say()
	{
		echo 'world';
	}

}

$f = new F2();
$f->get();*/

/********************************************************/

class Magic
{
	private $data = array();

	public function getData()
	{
		return $this->data;
	}

	public function __set($name, $value)
	{
		$this->data[$name] = $value;
	}

	public function __get($name)
	{
		return $this->data[$name];
	}
}

$magic = new Magic();
$magic->name = 'test';
$magic->age  = 22;
$data = $magic->getData();

print_r($data);

echo $magic->age;

