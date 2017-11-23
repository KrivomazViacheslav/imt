<?php
//echo 'Hello';
//an.laskevych@gmail.com
//Passwor1
$user = 'an.laskevych@gmail.com';
$password = 'Password1';

/*$ch = curl_init();
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type: application/json'));
curl_setopt($ch, CURLOPT_URL, 'https://esputnik.com/api/v1/balance');
curl_setopt($ch,CURLOPT_USERPWD, $user.':'.$password);
curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);

$output = curl_exec($ch);
$res = json_decode($output);
//echo($output);
curl_close($ch);
print_r($res);*/

/*$message_id = '968735'; 
//$user = 'user@esputnik.com';
//$password = 'secret';
$send_message_url = 'https://esputnik.com/api/v1/message/'.$message_id.'/smartsend';

$json_value = new stdClass();
$data = array();
$data['discount'] = '33';
$json_value->recipients = array(array('email'=>'mihaskep@gmail.com', 'jsonParam'=>json_encode($data)));

// В подготовленном сообщении можно использовать передаваемое значение "discount" для каждого контакта, обратившись к нему таким образом: $data.get('discount')
// Есть возможность передавать массивы объектов и строить контент сообщения с использованием циклов

send_request($send_message_url, $json_value, $user, $password);

function send_request($url, $json_value, $user, $password) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($json_value));
	curl_setopt($ch, CURLOPT_HEADER, 1);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type: application/json'));
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch,CURLOPT_USERPWD, $user.':'.$password);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);
	$output = curl_exec($ch);
	curl_close($ch);
	echo($output);
}*/

/*//$user = 'user@esputnik.com';
//$password = 'qwerty123';
$first_name = 'Vasiliy';
$email = 'Vasia@mail.com';	// email контакта
$sms = '380991236543';	// номер телефона
$subscribe_contact_url = 'https://esputnik.com/api/v1/contact/subscribe';

$json_contact_value = new stdClass();
$contact = new stdClass();
$contact->firstName = $first_name;
$contact->channels = array(
		array('type'=>'email', 'value' => $email),
		array('type'=>'sms', 'value' => $sms)
		);
$contact->address = array('region'=> 'Kyivska obl.',
		'town'=> 'Kyiv',
		'address' => '25, Main str.',
		'postcode' => 78900
		);
$contact->fields = array(array('id'=>60920, 'value' => 'Some value'));	// дополнительные поля контакта
$json_contact_value->contact = $contact;
$json_contact_value->groups = array('Subscribers');	// группы, в которые будет помещен контакт
send_request($subscribe_contact_url, $json_contact_value, $user, $password);

function send_request($url, $json_value, $user, $password) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($json_value));
	curl_setopt($ch, CURLOPT_HEADER, 1);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type: application/json'));
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch,CURLOPT_USERPWD, $user.':'.$password);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);
	$output = curl_exec($ch);
	echo($output);
	curl_close($ch);
}*/
require_once 'np/src/Delivery/NovaPoshtaApi2.php';
$np = new NovaPoshtaApi2('02483f2cad7df6ee4b3dbd44562277e2');
/*$result = $np->documentsTracking('20450050772244');
print_r($result);*/

// В параметрах указывается город и область (для более точного поиска)
$city = $np->getCity('Днепр', 'Днепропетровская');
$cityRef = $city['data'][0]['Ref'];
$result = $np->getWarehouses($cityRef);
print_r($result);