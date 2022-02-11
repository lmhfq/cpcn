<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2022/2/11
 * Time: 下午4:35
 */

namespace Lmh\Cpcn\Entity\Tx;


class IndividualEntity
{
    /**
     * @var string 开户手机号码
     */
    protected $phoneNumber;
    /**
     * @var string 用户姓名
     */
    protected $userName;
    /**
     * @var string 证件类型
     * 0-身份证
     */
    protected $credentialType = 0;
    /**
     * @var string 证件号码
     */
    protected $credentialNumber;
    /**
     * @var string 证件发证日
     * 格式：yyyyMMdd；亿联银行存管必填；
     */
    protected $issDate;
    /**
     * @var string 证件到期日
     * 当证件长期有效时为 99991231
     */
    protected $expiryDate;
    /**
     * @var string 联系地址
     */
    protected $indAddress;
    /**
     * @var string 个人邮箱
     */
    protected $indEmail;
    /**
     * @var string 身份证地址
     * 亿联银行存管必填；
     */
    protected $credentialAddress;
    /**
     * @var string 职业
     * 1A=各类专业，技术人员
     * 1B=国家机关，党群组织，企事业单位的负责人
     * 1C=办事人员和有关人员
     * 1D=商业工作人员
     * 1E=服务性工作人员
     * 1F=农林牧渔劳动者
     * 1G=生产工作，运输工作和部分体力劳动者
     * 1H=不便分类的其他劳动者
     * 亿联银行存管必填；
     */
    protected $occupation = '1H';


}