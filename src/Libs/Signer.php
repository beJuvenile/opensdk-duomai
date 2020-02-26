<?php
/**
 * 签名
 * 
 * User: Ken.Zhang <kenphp@yeah.net>
 * Date: 2020/02/26
 * Time: 22:13
 */
namespace OpenSDK\DuoMai\Libs;

class Signer
{

    /**
     * 生成签名
     *
     * @param array $data // 数据
     * @param string $secret // 密钥
     * @return string
     */
    public static function make($data, $secret)
    {
        ksort($data);
        return md5(join('',  array_values($data)).$secret);
    }
    
}