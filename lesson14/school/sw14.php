<?php
class Database
{
	public $public = 'public';
	protected $protected = 'protect';
	private $privaate = 'private';

	public function __construct()
	{
		$this->public = 'constr';
	}

	public function say()
	{
		echo $this->public."<br>";
		echo $this->protected."<br>";
		echo $this->privaate."<br>";
	}

	public function get()
	{
		$this->say();
	}
}

class MyDB extends Database
{
	public $public = 'my_public';

	public function get()
	{
		echo $this->public;
	}
}


//$db = new Database();
//$db->public = 'test';
//$db->get();

$mydb = new MyDB();
echo $mydb->public;


/*class Database
{
	private $db_host = 'localhost';
	private $db_login = 'root';
	private $db_pass = '';
	private $db_name = 'php20_shop';
	private $mysqli;
	private $res;

	public function __construct()
	{
		$this->connect();
	}

	private function connect()
	{
		if(isset($this->mysqli)) {
			return $this->mysqli;	
		} else {
			$this->mysqli = new mysqli($this->db_host, $this->db_login, $this->db_pass, $this->db_name);
		}
	}

	public function query($query)
	{
		if(empty($query)) {
			return false;
		}
		return $this->res = $this->mysqli->query($query);
	}

	public function results()
	{
		while ($result = $this->res->fetch_object()) {
			$results[] = $result;
		}
		return $results;
	}

	public function result()
	{
		return $this->res->fetch_object();
	}
}

$db = new Database();
$q = "SELECT * FROM users";
$db->query($q);
$res = $db->results();

print_r($res);*/