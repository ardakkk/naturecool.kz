<?php
/**
 * Created by PhpStorm.
 * User: FUSE
 * Date: 10.08.2017
 * Time: 11:15
 */

header("Content-Type: text/html; charset=utf-8");

$area = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/api/map/almaty.json');
if(!empty($_GET['query'])) {
	$arr = json_decode($area, true);
	$searchResult = array();

	foreach($arr as $value) {
		$pos = stripos($value['name'], $_GET['query']);
		if ($pos === 0) {
			$searchResult[] = $value;
		}
	}

	$area = json_encode($searchResult);
}
print_r($area); 

