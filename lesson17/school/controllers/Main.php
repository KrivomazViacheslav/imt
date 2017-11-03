<?php
class Main extends Core
{
	public function fetch()
	{
		//echo 'hello';
		$obj = new Test();

		$array_vars = array(
			'name' => $obj->say(),
			'site' => 'mysite.com'
		);

		return $this->view->render('main.html', $array_vars);
	}
}