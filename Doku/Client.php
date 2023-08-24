<?php
namespace Doku;
use Doku\Service\ApiGenerated;
require_once('Doku/Service/ApiGenerated.php');
/**
 * 
 */
class Client
{
	/**
     * @var array
     */
	private $config = array();
	public function setClientID($clientID)
    {
        $this->config['client_id'] = $clientID;
    }

    public function setSharedKey($key)
    {
        $this->config['shared_key'] = $key;
    }

    public function generateGTB2B($params)
    {
        return ApiGenerated::tokenB2b($this->config, $params);
    }
    public function generateGTB2c($params)
    {
        return ApiGenerated::tokenB2c($this->config, $params);
    }
    public function generateBinding($token, $params)
    {
        return ApiGenerated::apiBinding($this->config, $params, $token);
    }
    public function generateAI($token, $params)
    {
        return ApiGenerated::apiAccountInquiry($this->config, $params, $token);
    }
    public function generateVerifyOtp($token, $params)
    {
        return ApiGenerated::apiVerifyOtp($this->config, $params, $token);
    }
    public function generateCC($token, $params)
    {
        return ApiGenerated::apiCreatAccount($this->config, $params, $token);
    }
    public function generateBI($tokenB2b, $tokenB2b2c, $params)
    {
        return ApiGenerated::apiBalanceInquiry($this->config, $params, $tokenB2b, $tokenB2b2c);
    }
    public function generateQr($tokenB2b, $params)
    {
        return ApiGenerated::apiGenerateQr($this->config, $params, $tokenB2b);
    }
}

