<?php
header('Content-Type: text/html; charset=utf-8');
session_start();

class Database
{
	private $db_host  = 'localhost';
	private $db_login = 'root';
	private $db_pass  = '';
	private $db_name  = 'hw15';
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
			if ($this->mysqli->connect_error) {
    			die('Ошибка подключения к базе данных (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    		}
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

	public function __destruct()
	{
		$this->mysqli->close();
	}
}

class TextFile
{
	private $file;

	public function __construct($filename, $mode)
	{
		$this->file = fopen($filename, $mode);
		if (!$this->file) {
			die('Ошибка открытия файла!');
		}
	}

	public function read()
	{
		$text = array();
		while ($line = fgets($this->file)) {
			$text[] = trim($line);
		}
		return $text;
	}

	public function __destruct()
	{
		fclose($this->file);
	}
}

class Game
{
	private $db;

	public function __construct()
	{
		$this->db = new Database();

		if (!$_SESSION['initialization']) {

			$query = "TRUNCATE TABLE cities";
			$this->db->query($query);

			$file = new TextFile('cities.txt', 'r');
			$text = $file->read();
			foreach ($text as $city) {
				$query = "INSERT INTO cities (name) VALUES ('$city')";
				$this->db->query($query);
			}

			$_SESSION['initialization'] = true;
		}	
	}

	public function say($word)
	{
		$query = "SELECT * FROM cities WHERE name = '$word'";
		$this->db->query($query);
		$res = $this->db->result();
		if (empty($res)) {
			echo "Города $word не существует!<br>";
			return false;
		} else {
			$wordId = $res->id;
		}

		$usedWords = $_SESSION['usedWords'];

		if (!empty($usedWords)) {
			if (!(array_search($word, $usedWords) === false)) {
				echo "Город $word уже был назван ранее!<br>";
				return false;
			}

			$lastWord = end($usedWords);
			mb_internal_encoding("UTF-8");
			if (!(mb_substr(mb_strtolower($lastWord), -1, 1) === mb_substr(mb_strtolower($word), 0, 1))) {
				echo "Назовите город на последнюю букву города $lastWord!<br>";
				return false;
			}
		}

		$usedWords[$wordId] = $word;
		$_SESSION['usedWords'] = $usedWords;
		echo "Город $word принят.<br>";
		return true;
	}

	public function answer()
	{
		mb_internal_encoding("UTF-8");
		$usedWords  = $_SESSION['usedWords'];
		$lastWord   = end($usedWords);
		$lastLetter = mb_substr(mb_strtolower($lastWord), -1, 1);

		$strUsedWords = '';
		foreach ($usedWords as $usedWord) {
			if (!empty($strUsedWords)) {
				$strUsedWords = $strUsedWords . ',';	
			}
			$strUsedWords = $strUsedWords . $usedWord;
		}
		
		if (!empty($strUsedWords)) {
			$query = "SELECT * FROM cities WHERE name LIKE '$lastLetter%'";
		} else {
			$query = "SELECT * FROM cities WHERE name LIKE '$lastLetter%' AND !(id IN ($strUsedWords))";	
		}
		$this->db->query($query);
		$res = $this->db->result();
		if (empty($res)) {
			echo "Вы выграли!<br>";
		} else {
			$wordId = $res->id;
			$word   = $res->name;
			$usedWords[$wordId] = $word;
			$_SESSION['usedWords'] = $usedWords;
			echo "Ответ: $word.<br>";
		}	
	}
}

$game = new Game();
$result = $game->say('Киев');
if ($result) {
	$game->answer();
}