<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Service\Acs\Notify;


use Lmh\Cpcn\Support\Xml;

class NoticeResponse extends NtcBaseResponse
{
    /**
     * NoticeResponse constructor.
     * @param NtcBaseRequest $request
     */
    public function __construct(NtcBaseRequest $request)
    {
        parent::__construct($request);
    }

    /**
     *
     */
    public function process()
    {
        $data = [];
        $data = array_merge($data, parent::getMsghd());
        $data = array_merge($data, parent::getSrl());
        $xml = Xml::build($data);
        parent::postProcess($xml);
    }
}