<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2022/2/11
 * Time: 下午4:43
 */

namespace Lmh\Cpcn\Entity\Tx;


class BankAccountEntity
{
    /**
     * @var string 银行账户绑定流水号
     * 流水号前 17 位必须是时间戳
     */
    protected $bindingTxSn;
    /**
     * @var string 绑定银行 ID
     */
    protected $bankId;
    /**
     * @var string 银行账户号码
     */
    protected $bankAccountNumber;
    /**
     * @var string 银行卡预留手机号码
     * 个人用户开户绑卡时，不填默认为开户手机号码
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
    protected $bankProvince;
    /**
     * @var string 城市
     * 企业用户开户绑卡时必填；
     */
    protected $bankCity;
}