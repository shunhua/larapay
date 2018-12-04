<?php

/**
 * 扫码场景下单并支付
 */

namespace Shunhua\Larapay\Wechatpay;

use Shunhua\Larapay\Common\PaymentException;


class NativePay extends BasePay
{

    public $tradeType = 'NATIVE';
    public $device = 'NATIVE';


    /**
     * 下单处理
     * @param $params
     * @return string
     * @throws PaymentException
     */
    public function handle($params)
    {
        $pay_info = $this->pay($params);
        return $pay_info['code_url'];
    }

}