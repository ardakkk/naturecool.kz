<?php
header("Content-Type: text/html; charset=utf-8");
/**
 * Created by PhpStorm.
 * User: FUSE
 * Date: 09.08.2017
 * Time: 19:24
 */
$area = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/api/map/almaty.json');


print_r($area);