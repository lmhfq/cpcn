<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2021/2/25
 * Time: 下午1:46
 */

namespace Lmh\Cpcn\Notify;


class NtcT3009Request extends NtcBaseRequest
{
    /**
     * @var string 资金账号
     */
    protected $cltacc_subno;
    /**
     * @var string 户名
     */
    protected $cltacc_cltnm;
    /**
     * @var string 客户号
     */
    protected $cltacc_cltno;
    /**
     * @var int 发生额
     */
    protected $amt_aclamt;
    /**
     * @var string 收款方手续费
     */
    protected $amt_feeamt;
    /**
     * @var string 总金额(发生额+转账手续费)
     */
    protected $amt_tamt;
    /**
     * @var string
     */
    protected $amt_ccycd;


    public function handle(string $message, string $signature)
    {
        // TODO: Implement handle() method.
    }
}