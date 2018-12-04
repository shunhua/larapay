<?php

/**
 * PC场景下单并支付
 */

namespace Shunhua\Larapay\Alipay;
use Shunhua\Larapay\Common\PaymentException;


class WebPay extends BasePay
{
    public $method = 'alipay.trade.page.pay';
}