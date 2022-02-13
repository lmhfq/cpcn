<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2022/2/11
 * Time: 下午5:56
 */

namespace Lmh\Cpcn\Service\Ecommerce\Request;


class Tx4611Request extends BaseRequest
{
    protected $txCode = '4611';

    protected $bindingTxSn;
    protected $userID;
    protected $payeeUserId;
    /**
     * @var int 卡类型
     * 10=借记账户
     * 20=贷记账户
     */
    protected $bankCardType = 10;
    /**
     * @var int 操作标识
     * 10=绑卡
     * 20=解绑
     * 30=升级
     */
    protected $operationFlag = 10;
    /**
     * @var string 绑卡升级交易流水号
     */
    protected $upgradeTxSN;
    /**
     * @var string 绑卡验证方式：
     * 10=短信验证-快捷绑卡
     * 20=小额打款-提现绑卡
     * 30=静默绑卡-提现绑卡
     * 个人银行账户支持全部验证方式，默认为 10-短信验证-快捷绑卡；
     * 企业银行账户仅支持 20、30 验证方式，默认为 20-小额打款-提现绑卡
     */
    protected $bindingWay = 10;
    /**
     * @var int 证件类型
     * 0=身份证
     * OperationFlag=10 时和个人时必填
     */
    protected $credentialType = 0;
    /**
     * @var string 身份证号
     * OperationFlag=10 时和个人时必填
     */
    protected $credentialNumber;
    /**
     * @var string 绑定银行 ID
     */
    protected $bankId;
    /**
     * @var int 账户类型：
     * 11=个人账户
     * 12=企业账户
     * OperationFlag=10 时必填
     */
    protected $bankAccountType;
    /**
     * @var string 银行账户名称
     * OperationFlag=10 时必填
     */
    protected $bankAccountName;
    /**
     * @var string 银行账户号码
     * OperationFlag=10 时必填
     */
    protected $bankAccountNumber;
    /**
     * @var string 银行卡预留手机号码
     * 个人用户开户绑卡时必填；
     */
    protected $bankPhoneNumber;
    /**
     * @var string 分支行名称
     * 企业用户开户绑卡时必填；
     */
    protected $branchName;
    /**
     * @var string 省份
     * 企业用户开户绑卡时必填；
     */
    protected $province;
    /**
     * @var string 分支行名称
     * 企业用户开户绑卡时必填；
     */
    protected $city;
    /**
     * @var int 转账充值开通标识：
     * 0=不开通
     * 1=开通
     */
    protected $transferChargeFlag = 0;

    public function handle()
    {
        // TODO: Implement handle() method.
    }
}