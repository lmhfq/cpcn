<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2022/2/15
 * Time: 上午11:00
 */

namespace Lmh\Cpcn\Service\Ep\Notify;


use InvalidArgumentException;
use Lmh\Cpcn\Support\ArrayUtil;
use Lmh\Cpcn\Support\SignatureFactory;
use Lmh\Cpcn\Support\Xml;

class BaseNotify
{
    /**
     * @var string
     */
    protected $noticePlainText;
    /**
     * @var array
     */
    protected $noticeData;
    /**
     * @var array
     */
    protected $noticeBody = [];
    /**
     * @var string 交易编码
     */
    protected $txCode;

    public function handle(string $message, string $signature)
    {
        $this->noticePlainText = trim(base64_decode($message));
        $result = SignatureFactory::getSigner()->verify($this->noticePlainText, $signature);
        if ($result != 1) {
            throw new InvalidArgumentException("验证签名失败:MK2001");
        }
        $this->noticeData = Xml::parse($this->noticePlainText);

        $head = ArrayUtil::get('Head', $this->noticeData, []);
        $this->txCode = ArrayUtil::get('TxCode', $head);

        $this->noticeBody = ArrayUtil::get('Body', $this->noticeData, []);
    }
}