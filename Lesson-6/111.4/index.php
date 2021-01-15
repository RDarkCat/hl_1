<?php

session_start();
echo "This is 192.168.111.4";

$mc = new Memcached();
$mc->addServer('192.168.111.4', 11211);
$mc->set("foo", "Memchached works fine"); 

var_dump($mc->get("foo"));
