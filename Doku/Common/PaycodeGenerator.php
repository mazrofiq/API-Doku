<?php
namespace Doku\Common;
require_once('Doku/Common/Utils.php');

use DOKU\Common\Config;

use DOKU\Common\Utils;

class PaycodeGenerator
{

    public static function post($config, $params)
    {
        $dateTime = gmdate("Y-m-d H:i:s");
        $dateTime = date(DATE_ISO8601, strtotime($dateTime));
        $dateTimeFinal = substr($dateTime, 0, 19) . "Z";
        
        $header = array(
            'Content-Type: application/json',
            'X-TIMESTAMP:' . $dateTimeFinal
        );

        $getUrl = 'https://api-sandbox.doku.com';

        $targetPath = $config['pathUrl'];
        $url = $getUrl . $targetPath;
        
        if(!isset($config['getTokenB2b'])){
            $dataSign = $config['client_id']."|".$dateTimeFinal;
            $signature = Utils::signatureToken($dataSign);
            array_push($header,
                "X-CLIENT-KEY:" . $config['client_id'],
                "X-SIGNATURE:" . $signature
            );
        }else{
            $bodyReq = hash('sha256', json_encode($params,JSON_UNESCAPED_SLASHES));
            $data = "POST".":".$targetPath.":".$config['getTokenB2b'].":".$bodyReq.":".$dateTimeFinal;
            $signature = base64_encode(hash_hmac('sha512', $data, $config['shared_key'], true)); 
            $externalId = date('YmdHis');
            array_push($header,
                "X-PARTNER-ID:" . $config['client_id'],
                "X-EXTERNAL-ID:".$externalId,
                "X-SIGNATURE:".$signature,
                "Authorization:Bearer ".$config['getTokenB2b']
            );
            if(isset($config['getTokenB2b2c'])){
                array_push($header,
                    "Authorization-Customer:Bearer ".$config['getTokenB2b2c']
                );
            }
        }

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

        $responseJson = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

        if (is_string($responseJson) && $httpcode == 200) {
            return json_decode($responseJson, true);
            //echo $responseJson;
        } else {
            //echo $responseJson;
            return $responseJson;
        }
    }
}
