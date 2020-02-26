<?php
/**
 * 客户端
 *
 * User: Ken.Zhang <kenphp@yeah.net>
 * Date: 2019/9/22
 * Time: 20:54
 */
namespace OpenSDK\DuoMai;

use OpenSDK\DuoMai\Libs\Format;
use OpenSDK\DuoMai\Libs\Http;
use OpenSDK\DuoMai\Interfaces\Request;
use OpenSDK\DuoMai\Libs\Signer;

class Client
{

    /**
     * 接口地址
     *
     * @var string
     */
    public $gateway = '';

    /**
     * AppKey
     *
     * @var string
     */
    public $appKey;

    /**
     * 数据类型
     *
     * @var string
     */
    public $format = 'json';

    /**
     * request对象
     * 
     * @var object
     */
    public $request;



    public function __construct($appKey='')
    {
        $this->appKey = $appKey;
    }
    
    /**
     * 设置请求对象
     * 
     * @param Request $request
     */
    public function setRequest(Request $request)
    {
        $this->request = $request;
    }

    /**
     * 执行
     *
     * @return mixed
     */
    public function execute()
    {
        $commonParams = [];
        $this->request->isAuth && $commonParams['hash'] = $this->appKey;
        $params = array_merge($commonParams, $this->request->getParams());

        if (strtolower($this->request->requestType)=='post') {
            $result = Http::post($this->gateway, $params);
        } else {
            $result = Http::get($this->gateway, $params);
        }

        return strtolower($this->format)=='json' ? Format::deJSON($result) : Format::deSimpleXML($result);
    }

    /**
     * 校验签名
     *
     * @param array $data
     * @param string $sign
     * @return bool
     */
    public function checkSign($data, $sign)
    {
        $localSign = Signer::make($data, $this->appKey);
        return $localSign==$sign;
    }



}