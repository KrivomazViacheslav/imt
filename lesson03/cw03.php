<?php


$arr = array();
$arr[] = 'test1';
$arr['name'] = 'user';
$arr[] = 'test2';

$arr2 = array(0,1,2,3,4,5,6,7,8,9);
$arr[] = $arr2;

//print_r($arr);

//echo count($arr,1);

/*$cnt = count($arr2);
for($i=0;$i<$cnt;$i++){
	echo $arr2[$i].'<br>';
}*/

/*foreach ($arr2 as $key => $value) {
	echo $value.'<br>';
}*/

/*$obj = new stdClass();
$obj->name = 'test';
$obj->email = 'gmail.com';

foreach ($obj as $key => $value) {
	echo 'key:'.$key.' val:'.$value.'<br>';
}*/

<select>
	<?php
		for($i=1;$i<100;$i++){
			echo '<option>'.$i.'</option>'
		}
	?>
</select>



//echo $arr[2][0];

/*$a = array_merge($arr,$arr2);

echo '<pre>';
print_r($a);
echo '</pre>';*/

/*echo '<table border = 1>';
for($i=1;$i<10;$i++){
	echo '<tr>';
	for($j=1;$j<10;$j++){
		echo '<td>'.$i*$j.'</td>';
	}
	echo '</tr>';
}
echo '</table>';*/

/*echo '<table border = 1>';
for($i=1;$i<10;$i++){
	echo '<tr>';
	for($j=1;$j<10;$j++){
		if($i % 2 == 0){
			if($j % 2 != 0){
				echo '<td style = "background:black; color:#fff">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>';
			} else{
				echo '<td style = "background:white">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>';
			}
		} else{
			if($j % 2 == 0){
				echo '<td style = "background:black; color:#fff"">'.'000'.'</td>';
			} else{
				echo '<td style = "background:white">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>';
			}
		}
	}
	echo '</tr>';
}
echo '</table>';*/





?>