# opensdk-duomai

#### 介绍
本类库是对多麦开放平台API的封装  
接口文档请参见 [多麦开放平台](https://showdoc.duomai.com/web)

#### 使用示例
~~~php
require 'vendor/autoload.php';

use OpenSDK\DuoMai\Client;
use OpenSDK\DuoMai\Requests\OrderQueryRequest;

$c = new Client();
$c->gateway = 'https://www.duomai.com/api/order.php';
$c->appKey = $this->appKey;
$req = new OrderQueryRequest();
$c->setRequest($req);
$result = $c->execute();

var_dump($result);
~~~