<?php
/**
 * 订单查询
 *
 * @link: https://showdoc.duomai.com/web/#/1?page_id=5
 *
 * User: Ken.Zhang <kenphp@yeah.net>
 * Date: 2020/02/26
 * Time: 21:01
 */
namespace OpenSDK\DuoMai\Requests;

use OpenSDK\DuoMai\Interfaces\Request;

class OrderQueryRequest implements Request
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
    private $action = 'query';

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

    private $site_id;    // 媒体ID

    private $ads_id;       // 推广计划ID

    private $euid;           // 订单反馈标签值

    private $time_from;     // 订单生成（下单）开始时间，格式 例如 2012-05-12 12:18:22 支持到秒

    private $time_to;// 订单生成（下单）结束时间 格式同上

    private $charge_from; // 订单结算开始时间 格式同上

    private $charge_to;   // 订单结算结束时间 格式同上

    private $status;          // 查询特定状态的订单 可选值： -1 无效 0 未确认 1 确认 2 结算

    private $limit;             // 获取的结果集数量，格式为：开始值，条数 。例如 0,100 表示结果集按照订单时间排序后 取偏移0 开始的 100条数据。不传递 则获取全部满足条件的订单

    private $order; // 结果排序，格式为：[time/id],[desc/asc] 大小写不限制，例如 order=time,desc 按下单时间倒排。不填则默认为id 降序 排序， time 按订单下单时间排序。desc 为降序， asc 为升序

    private $apiParams = [];


    public function setSiteId($val)
    {
        $this->site_id = (int)$val;
        $this->apiParams['site_id'] = (int)$val;
    }

    public function setAdsId($val)
    {
        $this->ads_id = (int)$val;
        $this->apiParams['ads_id'] = (int)$val;
    }

    public function setEuid($val)
    {
        $this->euid = (string)$val;
        $this->apiParams['euid'] = (string)$val;
    }

    public function setTimeFrom($val)
    {
        $this->time_from = (string)$val;
        $this->apiParams['time_from'] = (string)$val;
    }

    public function setTimeTo($val)
    {
        $this->time_to = (string)$val;
        $this->apiParams['time_to'] = (string)$val;
    }

    public function setChargeFrom($val)
    {
        $this->charge_from = (string)$val;
        $this->apiParams['charge_from'] = (string)$val;
    }

    public function setChargeTo($val)
    {
        $this->charge_to = (string)$val;
        $this->apiParams['charge_to'] = (string)$val;
    }

    public function setStatus($val)
    {
        $this->status = (int)$val;
        $this->apiParams['status'] = (int)$val;
    }

    public function setLimit($val)
    {
        $this->limit = (string)$val;
        $this->apiParams['limit'] = (string)$val;
    }

    public function setOrder($val)
    {
        $this->order = (string)$val;
        $this->apiParams['order'] = (string)$val;
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