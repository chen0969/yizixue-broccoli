<?php

use Ecpay\Sdk\Factories\Factory;

require __DIR__ . '/../../../vendor/autoload.php';

$factory = new Factory([
    'hashKey' => 'ejCk326UnaZWKisg',
    'hashIv' => 'q9jcZX8Ib9LM8wYk',
]);
$postService = $factory->create('PostWithAesJsonResponseService');

$data = [
    'MerchantID' => '2000132',
    'InvoiceNo' => 'MJ80009449',
    'NotifyMail' => 'test-customer@ecpay.com.tw',
    'Notify' => 'E',
    'InvoiceTag' => 'I',
    'Notified' => 'C',
];
$input = [
    'MerchantID' => '2000132',
    'RqHeader' => [
        'Timestamp' => time(),
        'Revision' => '3.0.0',
    ],
    'Data' => $data,
];
$url = 'https://einvoice-stage.ecpay.com.tw/B2CInvoice/InvoiceNotify';

$response = $postService->post($input, $url);
var_dump($response);
