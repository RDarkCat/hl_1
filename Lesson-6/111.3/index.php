<?php
echo "This is 192.168.111.3";

$mc = new Memcached(); 
$mc->addServer('192.168.111.4', 11211);

var_dump($mc->get("foo"));