<?php
namespace Doku\Service;
use Doku\Common\PaycodeGenerator;
require_once('Doku/Common/PaycodeGenerator.php');
class ApiGenerated
{
	public static function tokenB2b($config, $param){
		$config['pathUrl'] = '/authorization/v1/access-token/b2b';
		return PaycodeGenerator::post($config, $param);
	}
	
	public static function tokenB2c($config, $param){
		$config['pathUrl'] = '/authorization/v1/access-token/b2b2c';
		return PaycodeGenerator::post($config, $param);
	}

	public static function apiBinding($config, $param, $token){
		$config['pathUrl'] = '/snap-adapter/b2b/v1.0/registration-account-binding';
		$config['getTokenB2b'] = $token;
		return PaycodeGenerator::post($config, $param);
	}
	public static function apiVerifyOtp($config, $param, $token){
		$config['pathUrl'] = '/snap-adapter/b2b/v1.0/otp-verification';
		$config['getTokenB2b'] = $token;
		return PaycodeGenerator::post($config, $param);
	}
	public static function apiCreatAccount($config, $param, $token){
		$config['pathUrl'] = '/snap-adapter/b2b/v1.0/registration-account-creation';
		$config['getTokenB2b'] = $token;
		//var_dump($config);die;
		return PaycodeGenerator::post($config, $param);
	}
	public static function apiAccountInquiry($config, $param, $token){
		$config['pathUrl'] = '/snap-adapter/b2b/v1.0/registration-account-inquiry';
		$config['getTokenB2b'] = $token;
		//var_dump($config);die;
		return PaycodeGenerator::post($config, $param);
	}
	public static function apiBalanceInquiry($config, $param, $tokenB2b, $tokenB2b2c){
		$config['pathUrl'] = '/snap-adapter/b2b2c/v1.0/balance-inquiry';
		$config['getTokenB2b'] = $tokenB2b;
		$config['getTokenB2b2c'] = $tokenB2b2c;
		//var_dump($config);die;
		return PaycodeGenerator::post($config, $param);
	}
	public static function apiGenerateQr($config, $param, $tokenB2b){
		$config['pathUrl'] = '/snap-adapter/b2b/v1.0/qr/qr-mpm-generate';
		$config['getTokenB2b'] = $tokenB2b;
		//var_dump($config);die;
		return PaycodeGenerator::post($config, $param);
	}

}

?>