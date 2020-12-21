<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('vendor/autoload.php');

$startFull = microtime(true);
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// генерация переменных

$startTime = microtime(true);

$mainLog = new Logger('main');
$sh = new StreamHandler('log/main.log', Logger::INFO);

$stopTime = microtime(true);

sleep(3);
$mainLog->pushHandler($sh);
$memory = memory_get_usage();

$mainLog->info('Использование памяти после инициализации ' . $memory);
$s = "Это очень длинная строка для использования памяти";
$s1 = "Это очень длинная строка для использования памяти 1";
$s2 = "Это очень длинная строка для использования памяти 2";
$s3 = "Это очень длинная строка для использования памяти 3";
$s4 = "Это очень длинная строка для использования памяти 4";

for ($i = 0; $i < 100000; $i++) {
  echo $s;
}
echo $s;
echo $s1;
echo $s2;
echo $s3;
echo $s4;
$mainLog->debug('Генерация переменных заняла ' . ($stopTime - $startTime));

$r = 0;
echo $rt;
echo "Hello" . $r ;

$stopFull = microtime(true);

$mainLog->debug('Полное время выполнения скрипта ' . ($stopFull - $startFull));

$mainLog->critical('Использование памяти всего' . memory_get_usage() - $memory);
