<?php

/**
 * 手机网站支付场景下单并支付
 */

namespace Shunhua\Larapay\Alipay;
use Shunhua\Larapay\Common\PaymentException;


class WapPay extends BasePay
{
    public $method = 'alipay.trade.wap.pay';
}