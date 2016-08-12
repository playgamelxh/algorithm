<?php
include "lru.php";
$lruObj = new LRU(10);

$arr = array();
while (count($arr) < 100) {
	$arr[] = rand(1, 30);
}

foreach ($arr as $value) {
	$memKey = "mem:{$value}";
	$lruObj->set($memKey, $value);
}

$list = $lruObj->list;
$data = $lruObj->data;

print_r($list);

print_r($data);