<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Service\Acs\Request;


use Lmh\Cpcn\Exception\InvalidConfigException;
use Lmh\Cpcn\Support\Xml;

class TrdT1032Request extends TrdBaseRequest
{
    protected $msghd_trcd = "T1032";

    /**
     * @var string 资金账号
     */
    protected $cltacc_subno;
    /**
     * @var string 户名
     */
    protected $cltacc_cltnm;
    /**
     * @var string
     */
    protected $pbusitype;
    /**
     * @var string 激活方式 1 企业主动打款激活; 3 短信验证激活; 4 企业被动打款激活
     */
    protected $actiflag;
    /**
     * @var string 激活内容 ActiFlag=3 时填写短信验 证码; ActiFlag=4 时填写来账金 额（以分为单位）
     */
    protected $actiinfo;

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
    public function getPbusitype()
    {
        return $this->pbusitype;
    }

    /**
     * @param mixed $pbusitype
     */
    public function setPbusitype($pbusitype): void
    {
        $this->pbusitype = $pbusitype;
    }

    /**
     * @return mixed
     */
    public function getActiflag()
    {
        return $this->actiflag;
    }

    /**
     * @param mixed $actiflag
     */
    public function setActiflag($actiflag): void
    {
        $this->actiflag = $actiflag;
    }

    /**
     * @return mixed
     */
    public function getActiinfo()
    {
        return $this->actiinfo;
    }

    /**
     * @param mixed $actiinfo
     */
    public function setActiinfo($actiinfo): void
    {
        $this->actiinfo = $actiinfo;
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
            'PBusiType' => $this->pbusitype,
            'ActiFlag' => $this->actiflag,
            'ActiInfo' => $this->actiinfo,
        ]);
        $xml = Xml::build($data);
        parent::process($xml);
    }
}