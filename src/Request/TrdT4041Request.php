<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Request;


use Lmh\Cpcn\Exception\InvalidConfigException;
use Lmh\Cpcn\Support\Xml;

class TrdT4041Request extends TrdBaseRequest
{
    protected $msghd_trcd = "T4041";

    protected $trsflag;

    protected $dtrcd;

    protected $dptnsrl;

    protected $usage;

    protected $amt_aclamt;

    protected $amt_ccycd;

    protected $amt_payfee;

    protected $amt_payeefee;

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