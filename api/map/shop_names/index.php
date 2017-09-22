<?php
header("Content-Type: text/html; charset=utf-8");
/**
 * Created by PhpStorm.
 * User: FUSE
 * Date: 09.08.2017
 * Time: 19:20
 */
$shop_names = file_get_contents('shop_names.json');

print_r($shop_names);