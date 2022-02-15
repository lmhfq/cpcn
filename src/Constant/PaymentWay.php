<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2022/2/13
 * Time: 上午11:47
 */

namespace Lmh\Cpcn\Constant;


class PaymentWay
{
    /**
     * 支付方式:
     * 00=余额支付
     * 02=信用支付
     * 10=快捷支付
     * 20=网银支付
     * 30=代收支付
     * 40=聚合支付(停止接入新商户)
     * 42=条码支付
     * 50=O2O
     * 60=POS（暂不支持）
     * 80-跳转支付
     */
    public const BALANCE_PAY = '00';
    public const CREDIT_PAY = '02';
    public const QUICK_PAY = '10';
    public const EBANK_PAY = '20';
    public const QR_PAY = '40';
    public const BARCODE_PAY = '42';
    public const REDIRECT_PAY = '80';

}