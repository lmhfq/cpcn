<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Service\Acs\Request;


use Lmh\Cpcn\Constant\BalFlag;
use Lmh\Cpcn\Constant\TransactionFlag;
use Lmh\Cpcn\Exception\InvalidConfigException;
use Lmh\Cpcn\Support\Xml;

class TrdT2022Request extends TrdBaseRequest
{
    protected $msghd_trcd = "T2022";
    /**
     * @var string 资金账号
     */
    protected $cltacc_subno;
    /**
     * @var string 户名
     */
    protected $cltacc_cltnm;
    /**
     * @var string 银行账号(卡号)
     */
    protected $bkacc_accno;
    /**
     * @var string 开户名称
     */
    protected $bkacc_accnm;
    /**
     * @var int 发生额
     */
    protected $amt_aclamt;
    /**
     * @var int 转账手续费
     */
    protected $amt_feeamt = 0;
    /**
     * @var int 总金额(发生额+转账手续费)
     */
    protected $amt_tamt = 0;
    /**
     * @var string 资金用途(附言)
     */
    protected $amt_ccycd = 'CNY';

    protected $usage;

    protected $trsflag = TransactionFlag::A00;

    protected $balflag = BalFlag::T1;

    /**
     * @return mixed
     */
    public function getCltaccSubno()
    {
        return $this->cltacc_subno;
    }

    /**
     * @param mixed $cltacc_subno
     */
    public function setCltaccSubno($cltacc_subno): void
    {
        $this->cltacc_subno = $cltacc_subno;
    }

    /**
     * @return mixed
     */
    public function getCltaccCltnm()
    {
        return $this->cltacc_cltnm;
    }

    /**
     * @param mixed $cltacc_cltnm
     */
    public function setCltaccCltnm($cltacc_cltnm): void
    {
        $this->cltacc_cltnm = $cltacc_cltnm;
    }

    /**
     * @return mixed
     */
    public function getBkaccAccno()
    {
        return $this->bkacc_accno;
    }

    /**
     * @param mixed $bkacc_accno
     */
    public function setBkaccAccno($bkacc_accno): void
    {
        $this->bkacc_accno = $bkacc_accno;
    }

    /**
     * @return mixed
     */
    public function getBkaccAccnm()
    {
        return $this->bkacc_accnm;
    }

    /**
     * @param mixed $bkacc_accnm
     */
    public function setBkaccAccnm($bkacc_accnm): void
    {
        $this->bkacc_accnm = $bkacc_accnm;
    }

    /**
     * @return mixed
     */
    public function getAmtAclamt()
    {
        return $this->amt_aclamt;
    }

    /**
     * @param mixed $amt_aclamt
     */
    public function setAmtAclamt($amt_aclamt): void
    {
        $this->amt_aclamt = $amt_aclamt;
    }

    /**
     * @return mixed
     */
    public function getAmtFeeamt()
    {
        return $this->amt_feeamt;
    }

    /**
     * @param mixed $amt_feeamt
     */
    public function setAmtFeeamt($amt_feeamt): void
    {
        $this->amt_feeamt = $amt_feeamt;
    }

    /**
     * @return mixed
     */
    public function getAmtTamt()
    {
        return $this->amt_tamt;
    }

    /**
     * @param mixed $amt_tamt
     */
    public function setAmtTamt($amt_tamt): void
    {
        $this->amt_tamt = $amt_tamt;
    }

    /**
     * @return mixed
     */
    public function getAmtCcycd()
    {
        return $this->amt_ccycd;
    }

    /**
     * @param mixed $amt_ccycd
     */
    public function setAmtCcycd($amt_ccycd): void
    {
        $this->amt_ccycd = $amt_ccycd;
    }

    /**
     * @return mixed
     */
    public function getUsage()
    {
        return $this->usage;
    }

    /**
     * @param mixed $usage
     */
    public function setUsage($usage): void
    {
        $this->usage = $usage;
    }

    /**
     * @return mixed
     */
    public function getTrsflag()
    {
        return $this->trsflag;
    }

    /**
     * @param mixed $trsflag
     */
    public function setTrsflag($trsflag): void
    {
        $this->trsflag = $trsflag;
    }

    /**
     * @return mixed
     */
    public function getBalflag()
    {
        return $this->balflag;
    }

    /**
     * @param mixed $balflag
     */
    public function setBalflag($balflag): void
    {
        $this->balflag = $balflag;
    }

    /**
     * @throws InvalidConfigException
     */
    public function handle()
    {
        $data = [];
        $data = array_merge($data, parent::getMsghd());
        $data = array_merge($data, parent::getSrl());
        $data = array_merge($data, [
            'CltAcc' => [
                'SubNo' => $this->cltacc_subno,
                'CltNm' => $this->cltacc_cltnm,
            ],
            'BkAcc' => [
                'AccNo' => $this->bkacc_accno,
                'AccNm' => $this->bkacc_accnm,
            ],
            'Amt' => [
                'AclAmt' => $this->amt_aclamt,
                'FeeAmt' => $this->amt_feeamt,
                'TAmt' => $this->amt_tamt,
                'CcyCd' => $this->amt_ccycd,
            ],
            'Usage' => $this->usage,
            'TrsFlag' => $this->trsflag,
            'BalFlag' => $this->balflag,
        ]);
        $xml = Xml::build($data);
        parent::process($xml);
    }
}