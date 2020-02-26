<?php
/**
 * Created by PhpStorm.
 * User: Ken.Zhang
 * Date: 2019/9/23
 * Time: 11:46
 */
require '../vendor/autoload.php';

use OpenSDK\DuoMai\Client;
use OpenSDK\DuoMai\Requests\OrderQueryRequest;

class OrderQueryTest
{

    private $appKey = '366c54281f58b0fe42273c661bee1b6';


    public function __invoke()
    {
        $c = new Client();
        $c->gateway = 'https://www.duomai.com/api/order.php';
        $c->appKey = $this->appKey;
        $req = new OrderQueryRequest();
        $c->setRequest($req);
        $result = $c->execute();

        var_dump($result);
    }

}

(new OrderQueryTest())();