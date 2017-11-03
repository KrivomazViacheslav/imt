<?php
class Route
{

	public static function run()
	{
		$models_dir = 'models/';
		$controllers_dir = 'controllers/';
		$uri = parse_url($_SERVER['REQUEST_URI']);

		//print_r($uri);

		$uri_array = array(
			'/' => 'Main',
			'catalog' => 'Catalog'
		);

		if ($uri['path']) {
			
			//echo $uri['path'];
			//echo $controllers_dir . $uri_array[$uri['path']] . '.php';

			if (file_exists($controllers_dir . $uri_array[$uri['path']] . '.php')) {
			
				//echo 'ds';	
				require $controllers_dir . $uri_array[$uri['path']] . '.php';
				$controller = new $uri_array[$uri['path']]();

				if (method_exists($controller, 'fetch')) {
					print $controller->fetch();
				} else {
					Route::error404();	
				}
			} else {
				Route::error404();
			}
		}
	}

	public static function error404()
	{
		echo 'error';
	}
}