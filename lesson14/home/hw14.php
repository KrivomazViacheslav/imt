<?php
header('Content-Type: text/html; charset=utf-8');

class Worker
{
	private $name;
	private $age;
	private $salary;

	public function setName($name)
	{
		$this->name = $name;
	}

	public function getName()
	{
		return $this->name;
	}

	private function checkAge($age)
	{
		if ($age >= 1 && $age <= 100) {
			return $age;
		} else {
			return 0;
		}
	}

	public function setAge($age)
	{
		$newAge = $this->checkAge($age);

		if ($newAge > 0) {
			$this->age = $newAge;	
		}
	}

	public function getAge()
	{
		return $this->age;
	}

	public function setSalary($salary)
	{
		$this->salary = $salary;
	}

	public function getSalary()
	{
		return $this->salary;
	}
}

$worker1 = new Worker();
$worker1->setName('Иван');
$worker1->setAge(25);
$worker1->setSalary(1000);
$worker1->setAge(500);

$worker2 = new Worker();
$worker2->setName('Вася');
$worker2->setAge(26);
$worker2->setSalary(2000);

$sumSalary = $worker1->getSalary() + $worker2->getSalary();
$sumAge    = $worker1->getAge() + $worker2->getAge();

echo 'Сумма зарплат: ' . $sumSalary . '<br>';
echo 'Сумма возрастов: ' . $sumAge . '<br>';

class WorkerConstruct
{
	private $name;
	private $age;
	private $salary;

	public function __construct($name, $age, $salary)
	{
		$this->name   = $name;
		$this->age    = $age;
		$this->salary = $salary;
	}

	public function getName()
	{
		return $this->name;
	}

	public function getAge()
	{
		return $this->age;
	}

	public function getSalary()
	{
		return $this->salary;
	}
}

$workerConstruct = new WorkerConstruct('Дима', 25, 1000);
$ageOnSalary = $workerConstruct->getAge() * $workerConstruct->getSalary();

echo $workerConstruct->getName() . ' произведение возраста и зарплаты: ' . $ageOnSalary . '<br>';

class User
{
	protected $name;
	protected $age;

	public function setName($name)
	{
		$this->name = $name;
	}

	public function getName()
	{
		return $this->name;
	}

	public function setAge($age)
	{
		$this->age = $age;
	}

	public function getAge()
	{
		return $this->age;
	}
}

class WorkerUser extends User
{
	private $salary;

	public function setSalary($salary)
	{
		$this->salary = $salary;
	}

	public function getSalary()
	{
		return $this->salary;
	}
}

$WorkerUser1 = new Worker();
$WorkerUser1->setName('Иван');
$WorkerUser1->setAge(25);
$WorkerUser1->setSalary(1000);

$WorkerUser2 = new Worker();
$WorkerUser2->setName('Вася');
$WorkerUser2->setAge(26);
$WorkerUser2->setSalary(2000);

$sumSalary = $worker1->getSalary() + $worker2->getSalary();
echo 'Сумма зарплат: ' . $sumSalary . '<br>';

class Student extends User
{
	private $stipend;
	private $course;

	public function setStipend($stipend)
	{
		$this->stipend = $stipend;
	}

	public function getStipend()
	{
		return $this->stipend;
	}

	public function setCourse($course)
	{
		$this->course = $course;
	}

	public function getCourse()
	{
		return $this->course;
	}
}

class Driver extends WorkerUser
{
	private $experience;
	private $category;

	public function setExperience($experience)
	{
		$this->experience = $experience;
	}

	public function getExperience()
	{
		return $this->experience;
	}

	public function setCategory($category)
	{
		$this->category = $category;
	}

	public function getCategory()
	{
		return $this->category;
	}
}