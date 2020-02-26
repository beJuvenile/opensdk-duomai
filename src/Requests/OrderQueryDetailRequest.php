<?php
/**
 * 订单详情明细查询
 *
 * @link: https://showdoc.duomai.com/web/#/1?page_id=14
 *
 * User: Ken.Zhang <kenphp@yeah.net>
 * Date: 2020/02/26
 * Time: 21:01
 */
namespace OpenSDK\DuoMai\Requests;

use OpenSDK\DuoMai\Interfaces\Request;

class OrderQueryDetailRequest implements Request
{

    /**
     * 是否需要密钥
     */
    public $isAuth = true;

    /**
     * 操作
     *
     * @var string
     */
    private $action = 'query_detail';

    /**
     * 数据类型
     *
     * @var string
     */
    private $format = 'json';

    /**
     * 请求方式
     *
     * @var string
     */
    public $requestType = 'post';

    private $order_sn;    // 订单号

    private $apiParams = [];


    public function setOrderSn($val)
    {
        $this->order_sn = (string)$val;
        $this->apiParams['order_sn'] = (string)$val;
    }

    /**
     * 获取参数
     */
    public function getParams()
    {
        $this->apiParams['action'] = $this->action;
        $this->apiParams['format'] = $this->format;

        return $this->apiParams;
    }

}