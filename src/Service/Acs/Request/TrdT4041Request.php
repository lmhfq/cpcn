<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Service\Acs\Request;


use Lmh\Cpcn\Constant\TransactionFlag;
use Lmh\Cpcn\Exception\InvalidConfigException;
use Lmh\Cpcn\Support\Xml;

class TrdT4041Request extends TrdBaseRequest
{
    protected $msghd_trcd = "T4041";
    /**
     * @var string 业务标示 A00:普通退款
     */
    protected $trsflag = TransactionFlag::A00;
    /**
     * @var string 原交易标志 UIN:渠道入金 ENTRCV:收款业务 JUHEPAY:聚合支付 PAY：订单支付 INPAY：入金支付
     */
    protected $dtrcd = 'UIN';
    /**
     * @var string 原交易的合作方交易流水号
     */
    protected $dptnsrl;
    /**
     * @var string 退款原因
     */
    protected $usage;

    protected $amt_aclamt;

    protected $amt_ccycd = 'CNY';

    protected $amt_payfee = '0';

    protected $amt_payeefee = '0';

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
    public function getDtrcd()
    {
        return $this->dtrcd;
    }

    /**
     * @param mixed $dtrcd
     */
    public function setDtrcd($dtrcd): void
    {
        $this->dtrcd = $dtrcd;
    }

    /**
     * @return mixed
     */
    public function getDptnsrl()
    {
        return $this->dptnsrl;
    }

    /**
     * @param mixed $dptnsrl
     */
    public function setDptnsrl($dptnsrl): void
    {
        $this->dptnsrl = $dptnsrl;
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
    public function getAmtPayfee()
    {
        return $this->amt_payfee;
    }

    /**
     * @param mixed $amt_payfee
     */
    public function setAmtPayfee($amt_payfee): void
    {
        $this->amt_payfee = $amt_payfee;
    }

    /**
     * @return mixed
     */
    public function getAmtPayeefee()
    {
        return $this->amt_payeefee;
    }

    /**
     * @param mixed $amt_payeefee
     */
    public function setAmtPayeefee($amt_payeefee): void
    {
        $this->amt_payeefee = $amt_payeefee;
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
            'TrsFlag' => $this->trsflag,
            'DTrCd' => $this->dtrcd,
            'DPtnSrl' => $this->dptnsrl,
            'Usage' => $this->usage,
            'Amt' => [
                'AclAmt' => $this->amt_aclamt,
                'CcyCd' => $this->amt_ccycd,
                'PayFee' => $this->amt_payfee,
                'PayeeFee' => $this->amt_payeefee,
            ],
        ]);
        $xml = Xml::build($data);
        parent::process($xml);
    }
}