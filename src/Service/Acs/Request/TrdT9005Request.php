<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Service\Acs\Request;


use Lmh\Cpcn\Exception\InvalidConfigException;
use Lmh\Cpcn\Support\Xml;

class TrdT9005Request extends TrdBaseRequest
{
    protected $msghd_trcd = "T9005";
    /**
     * @var string 资金账号(多个资金账号之 间用英文逗号隔开)
     */
    protected $subno;
    /**
     * @var int 分页查询：每页 N 条数据 (10<=N<=200)
     */
    protected $pagsiz;
    /**
     * @var int 分页查询：当前页数
     */
    protected $curpag;

    /**
     * @return mixed
     */
    public function getSubno()
    {
        return $this->subno;
    }

    /**
     * @param mixed $subno
     */
    public function setSubno($subno): void
    {
        $this->subno = $subno;
    }

    /**
     * @return mixed
     */
    public function getPagsiz()
    {
        return $this->pagsiz;
    }

    /**
     * @param mixed $pagsiz
     */
    public function setPagsiz($pagsiz): void
    {
        $this->pagsiz = $pagsiz;
    }

    /**
     * @return mixed
     */
    public function getCurpag()
    {
        return $this->curpag;
    }

    /**
     * @param mixed $curpag
     */
    public function setCurpag($curpag): void
    {
        $this->curpag = $curpag;
    }

    /**
     * @throws InvalidConfigException
     */
    public function handle()
    {
        $data = [];
        $data = array_merge($data, parent::getMsghd());
        if ($this->subno) {
            $data['SubNo'] = $this->subno;
        }
        $data = array_merge($data, [
            'PagSiz' => $this->pagsiz,
            'CurPag' => $this->curpag
        ]);
        $xml = Xml::build($data);
        parent::process($xml);
    }
}