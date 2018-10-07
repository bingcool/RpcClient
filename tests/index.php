<?php

include "../vendor/autoload.php";

use Rpc\Client\RpcClientManager;

$serviceConfig1 = [
	'servers' => '192.168.99.103:9504',
	'timeout' => 0.5,
	'noblock' => 0
];

$client_setting1 = array(
	'open_length_check'     => 1,
    'package_length_type'   => 'N',
    'package_length_offset' => 0,       //第N个字节是包长度的值
    'package_body_offset'   => 56,       //第几个字节开始计算长度
    'package_max_length'    => 2000000,  //协议最大长度
);

$server_header_struct1 = array(
	'length'=>'N', 
	'version'=>'a10', 
	'name'=>'a30', 
	'request_id'=>'a12'
);

$client_header_struct1 = array(
	'length'=>'N', 
	'version'=>'a10', 
	'name'=>'a30', 
	'request_id'=>'a12'
);



$serviceConfig2 = array(
	'servers' => '192.168.99.103:9506',
	'timeout' => 0.5,
	'noblock' => 0
);


$client_setting2= array(
	'open_length_check'     => 1,
    'package_length_type'   => 'N',
    'package_length_offset' => 0,       //第N个字节是包长度的值
    'package_body_offset'   => 56,       //第几个字节开始计算长度
    'package_max_length'    => 2000000,  //协议最大长度
);

$server_header_struct2 = array(
	'length'=>'N', 
	'version'=>'a10', 
	'name'=>'a30', 
	'request_id'=>'a12'
);

$client_header_struct2 = array(
	'length'=>'N', 
	'version'=>'a10', 
	'name'=>'a30', 
	'request_id'=>'a12'
);

$heart_header_struct = array(
	'length'=>'N', 
	'version'=>'a10', 
	'name'=>'a30', 
	'request_id'=>'ping'
);

// 注册产品服务
$ser = RpcClientManager::getInstance()->registerService('productService', $serviceConfig1, $client_setting1, $server_header_struct1, $client_header_struct1, [
	'swoole_keep' => true
]);

$obj = new \Rpc\Tests\controller();

$obj->test();
