<?php header('Content-Type: text/html; charset=utf-8'); ?>

<div style="position: absolute; left: 0; width: 50%;">
	<form method="post" enctype="multipart/form-data">
		<input type="file" name="filename[]" multiple="">
		<input type="submit" name="upload" value="Загрузить">
	</form>

	<?php
	$dirName = 'download';
	if (!file_exists($dirName)) {
		mkdir($dirName);
	}
	$ext = array('png','gif','jpg','jpeg');
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$cnt = 0;
	    foreach ($_FILES['filename']['name'] as $key => $name) {
	    	$name = translit($name);
	    	$file = $_FILES['filename']['tmp_name'][$key];
	    	$file_ext = pathinfo($name,PATHINFO_EXTENSION);
	    	$base = pathinfo($name, PATHINFO_FILENAME);
		    if(in_array($file_ext, $ext)) {
		        while (file_exists($dirName.'/'.$name)) {
		            $name = $base.'_'.uniqid().'.'.$file_ext;
		        }
		        $res = move_uploaded_file($file, $dirName.'/'.$name);
		        if($res) {
		        	$cnt += 1;
		        } else {
	            	echo 'Не удалось загрузить файл '.$name.'<br>';
	        	}
		    } else {
		        echo 'Не допустимый формат для загрузки файла '.$name.'<br>';
		    }
		}
		if ($cnt > 0) {
			echo "Файлы загружены в папку download, количество: $cnt";
		} else {
			echo 'Файлы не загружены!';	
		}
	}

	function translit($str) {
	 	$rus = array('А','Б','В','Г','Д','Е','Ё','Ж','З','И','Й','К','Л','М','Н','О','П','Р','С','Т','У','Ф',
	 				 'Х','Ц','Ч','Ш','Щ','Ъ','Ы','Ь','Э','Ю','Я','а','б','в','г','д','е','ё','ж','з','и','й',
	 				 'к','л','м','н','о','п','р','с','т','у','ф','х','ц','ч','ш','щ','ъ','ы','ь','э','ю','я');
		$lat = array('A','B','V','G','D','E','E','Gh','Z','I','Y','K','L','M','N','O','P','R','S','T','U','F',
	    			 'H','C','Ch','Sh','Sch','Y','Y','Y','E','Yu','Ya','a','b','v','g','d','e','e','gh','z','i','y',
	    			 'k','l','m','n','o','p','r','s','t','u','f','h','c','ch','sh','sch','y','y','y','e','yu','ya');
		return str_replace($rus, $lat, $str);
	}
	?>
</div>

<div style="position: absolute; right: 0; width: 50%;">
	<?php
	if (file_exists($dirName)) {
		$dir = opendir($dirName);
		while ($item = readdir($dir)) {
		    if ($item == '.' || $item == '..') {
		        continue;
		    }
		    $file_ext = pathinfo($item, PATHINFO_EXTENSION);
		    if(!in_array($file_ext, $ext)){
		    	continue;	
		    }
			echo $item."<br>";
		}
		closedir($dir);
	}	
?>
</div>