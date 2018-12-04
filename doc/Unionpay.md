# Unionpay 银联支付

## 配置

```php

$config = array(
    'mer_id' => 'xxxxxxxxxxxxx',//商户号
    'private_key_path' => storage_path('cert\xxxx.pfx'),//私钥证书路径
    'private_key_pwd' => '111111',//证书密码 纯数字
    'cert_dir' => storage_path(''),//证书dir
    'is_test' => '0',//是否正式环境 0:正式, 1:测试
);
```


## 银联支付

1. 判断设备选择实例化

	Web网页
	
	```php
	$unionpay = new \Shunhua\Larapay\Unionpay\WebPay($config);
	```
	
	App
	
	```php
	$unionpay = new \Shunhua\Larapay\Unionpay\AppPay($config);
	```

2. 设置支付参数

	代码示例:
	
	```php
	$pay_data = [
        'orderId' => date('YmdHis') . rand(10000, 99999), //商户订单号
        'txnAmt' => 1, //支付价格(单位:分)
        'frontUrl'=>'https://www.baidu.com/',
        'backUrl'=>'https://www.baidu.com/'
    ];
	```

3. 调用执行函数

	代码示例:
	
	```php
	$url = $unionpay->handle($pay_data);
	if ($data['device'] == 'app') {
		//返回数组
	    return [
            'params' => $params,
            'url' => $this->transUrl,
        ];
	} else {
		//返回form表单
	    return $html_form;
	}
	```

4. 处理银联回调

	```php
	//$config同上
	$unionpay = new \Shunhua\Larapay\Unionpay\Notify($config);	
	try {
	    //验签
	    $data = $unionpay->handle();
	}
	catch (\Exception $e) {
	    $error_msg = $e->getMessage();
	    $unionpay->returnFailure();
	}
	```

