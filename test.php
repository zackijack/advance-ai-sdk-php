<?php
namespace Zackyjack\AdvanceAI;

use Zackyjack\AdvanceAI\CurlClient;

$blackList = array(
    'idNumber' => '1371105402630002',
    'name' => 'WIRDANANI',
    'phoneNumber' => array(
        'countryCode' => '+62',
        'areaCode' => '',
        'number' => '0751461090'
    )
);


$kyc = array(
    "companyName" => "BANK CENTRAL ASIA",
    "companyZipCode" => "14460",
    "name" => "NICKY ARDIAN",
    "idNumber" => "6171012811870005",
    "province" => "SULAWESI SELATAN",
    "city" => "PINRANG",
    "district" => "SUPPA",
    "village" => "LOTANG SALO"
);
$kycImage = array(
    'idHoldingImage' => "/Users/kaijia.weiadvance.ai/php-learn/id-hold.jpg"
);

$idImage = array(
    'idHoldingImage' => "/Users/kaijia.weiadvance.ai/php-learn/id-hold.jpg"
);




$api_host = 'https://api.advance.ai';
$idcheck_name = '/advance_api/openapi/face-recognition/v1/id-check';
$kyc_name = '/advance_api/openapi/face-recognition/v1/kyc';
$ocr = '/advance_api/openapi/face-recognition/v1/ocr-check';
$access_key = '';
$secret_key = '';

/**
 * NOTE 请求如果没有任何响应，请查看client->requestError，如果提示SSL certificate : unable to get local issuer certificate,
 * 是本地https证书安装的有问题，请参考如下网站解决：
 * https://stackoverflow.com/questions/24611640/curl-60-ssl-certificate-unable-to-get-local-issuer-certificate
 */

$client = new CurlClient($api_host, $access_key, $secret_key);

//json形式
//$result = $client->request($black, $blackList,null);
//echo $result;

//ocr
$ocrImage = array(
    'ocrImage' => "/Users/kaijia.weiadvance.ai/php-learn/id-hold.jpg"
);
$result = $client->request($ocr, null, $ocrImage);
echo $result . "\n";

//face comparision
$face_comparision = "/advance_api/openapi/face-recognition/v1/check";
$face_comparision_image = array(
    'firstImage' => "/Users/kaijia.weiadvance.ai/Desktop/20/2.jpg",
    "secondImage" => "/Users/kaijia.weiadvance.ai/Desktop/20/1.jpg"
);

$result = $client->request($face_comparision, null, $face_comparision_image);
echo $result;
//kyc
//$result = $clientKyc -> request($kyc_name,$kyc,$kycImage);
//echo $result;


