<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('vendor/autoload.php');

Predis\Autoloader::register();
try {
    $redis = new Predis\Client();
}
catch (Exception $e) {
    die($e->getMessage());
}

$arr = [];
if($_POST['product'] == "product1") {	
	if (!empty($redis->get('product1_name'))){ // есть ли продукт в redis
	    $startFull = microtime(true);
		$arr['name'] = $redis->get('product1_name');
		$arr['price'] = $redis->get('product1_price');
		$arr['description'] = $redis->get('product1_description');
		$stopFull = microtime(true);
		$arr['time'] = $stopFull - $startFull;
	} else {
		$startFull = microtime(true);
		sleep(1); //имитатор запроса к БД
		$redis->set('product1_name', "Cool product");
		$redis->set('product1_price', 1000);
		$redis->set('product1_description', "This is a very good product");
		
		$arr['name'] = $redis->get('product1_name');
		$arr['price'] = $redis->get('product1_price');
		$arr['description'] = $redis->get('product1_description');
		$stopFull = microtime(true);
		$arr['time'] = $stopFull - $startFull;
	}
}

echo json_encode($arr);
