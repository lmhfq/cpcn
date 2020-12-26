<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Request;


use Lmh\Cpcn\Exception\InvalidConfigException;
use Lmh\Cpcn\Support\Xml;

class TrdT9005Request extends TrdBaseRequest
{
    protected $msghd_trcd = "T9005";

    protected $subno;

    protected $pagsiz;

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
        $data = array_merge($data, [
            'SubNo' => $this->subno,
            'PagSiz' => $this->pagsiz,
            'CurPag' => $this->curpag
        ]);
        $xml = Xml::build($data);
        parent::process($xml);
    }
}