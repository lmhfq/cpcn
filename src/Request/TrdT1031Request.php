<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2020/10/20
 * Time: 上午10:45
 */

namespace Cpcn\Request;


use Cpcn\Support\Xml;

class TrdT1031Request extends TrdBaseRequest
{
    protected $msghd_trcd = "T1031";

    public function toXml()
    {
        $data = [];
        $data = array_merge($data, parent::getMsghd());
        $data = array_merge($data, parent::getSrl());
        $data = array_merge($data, [
            'CltAcc' => [

            ]
        ]);

        $xml = Xml::build($data);
        parent::handle($xml);
    }
}