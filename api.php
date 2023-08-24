<?php
require_once('Doku/Client.php');
$DOKUClient = new Doku\Client;
$DOKUClient->setClientID($_POST['clientid']);
$DOKUClient->setSharedKey($_POST['secretkey']);

$sz = $_POST['API'];
$param = array (
        'grantType' => 'client_credentials'
        );
    $getTokenB2b = $DOKUClient->generateGTB2B($param);

if($sz == 'AB' or $sz == 'VO' or $sz == 'CC' or $sz == 'AI' or $sz == 'QR'){
    switch ($sz) {
            // creat account
        case 'CC':
            $params = array(
                    'partnerReferenceNo' => date('YmdHis'),
                    'email' => 'mazrofiq+22332013@gmail.com',
                    'name' => 'rafik',
                    'phoneNo' => '087805898787',
                    'redirectUrl' => 'https://webhook.site/211174c4-542e-474e-bc3a-484ab9d597bc'
                    );
                $creatAccount = $DOKUClient->generateCC($getTokenB2b['accessToken'], $params);
                var_dump($creatAccount);
            break;
            // verfify OTP
        case 'VO':
            $params = array(
                    'originalPartnerReferenceNo' => '20230808052748',
                    'originalReferenceNo' => 'a8b26aa5-1d41-4141-9009-c27e4501138b',
                    'otp' => '898701'
                );
                $verifyOtp = $DOKUClient->generateVerifyOtp($getTokenB2b['accessToken'], $params);
                var_dump($verifyOtp);
            break;
            // account binding
        case 'AB':
            $params = array(
                    'partnerReferenceNo' => date('YmdHis'),
                    'redirectUrl' => 'https://webhook.site/211174c4-542e-474e-bc3a-484ab9d597bc',
                    'successParams' =>
                        array(
                            'accountId' => '1944898701'
                        )
                    );
            var_dump($params);
                $getBinding = $DOKUClient->generateBinding($getTokenB2b['accessToken'], $params);
                var_dump($getBinding);
            break;
            // Account Inquiry
        case 'AI':
            $params = array(
                    'partnerReferenceNo' => date('YmdHis'),
                    'additionalInfo' => 
                            array(
                                'accountId' => '1944898701'
                            )
                    );
                $accountInquiry = $DOKUClient->generateAI($getTokenB2b['accessToken'], $params);
                var_dump($accountInquiry);
            break;
            // Generate QR
            case 'QR':
            $params = array(
                    'partnerReferenceNo' => date('YmdHis'),
                    'amount' => 
                        array(
                            'value' => '10000.00',
                            'currency' => 'IDR'
                        ),
                    'feeAmount' => 
                        array(
                            'value' => '500.00',
                            'currency' => 'IDR'
                        ),
                    'merchantId' => '5712',
                    'terminalId' => 'K45',
                    'additionalInfo' => 
                        array(
                            'postalCode' => '13120',
                            'feeType' => '2'
                        ),
                    );
                $generateQr = $DOKUClient->generateQr($getTokenB2b['accessToken'], $params);
                var_dump($generateQr);
            break;
        }
}else{

    $params = array (
        'grantType' => 'authorization_code',
        'authCode' => '074ce75a-e0c3-4688-81e1-4660aa596b31'
        //2ff7eb36-c046-4b85-a5d4-d8bbb767921a
        );
    $getTokenB2c = $DOKUClient->generateGTB2c($params);
    switch ($sz) {
        // Balance Inquiry
        case 'BI':
            $params = array(
                    'partnerReferenceNo' => date('YmdHis')
                );
            $balanceInquiry = $DOKUClient->generateBI($getTokenB2b['accessToken'], $getTokenB2c['accessToken'], $params);
            var_dump($balanceInquiry);
            break;
        }
}

