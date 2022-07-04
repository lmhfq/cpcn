<?php
declare(strict_types=1);

namespace Lmh\Cpcn\Service\Ep\Response;


use Lmh\Cpcn\Constant\TxResponseCode;
use Lmh\Cpcn\Entity\Tx\FileInfoEntity;
use Lmh\Cpcn\Support\ArrayUtil;

class Tx2902Response extends BaseResponse
{
    /**
     * @var array|null
     */
    protected $files;

    /**
     * @return array|null
     */
    public function getFiles(): ?array
    {
        return $this->files;
    }

    /**
     * @param array|null $files
     */
    public function setFiles(?array $files): void
    {
        $this->files = $files;
    }


    /**
     * @param string $message
     * @author lmh
     */
    public function handle(string $message)
    {
        parent::handle($message);
        if ($this->code == TxResponseCode::SUCCESS) {
            $files = ArrayUtil::get('Files', $this->responseBody, []);
            if (!isset($files[0])) {
                $files = [$files];
            }
            foreach ($files as $item) {
                $fileEntity = new FileInfoEntity();
                $fileEntity->setFileName(ArrayUtil::get('FileName', $item));
                $fileEntity->setFileId(ArrayUtil::get('FileID', $item));
                $this->files[] = $fileEntity;
            }
        }
    }
}