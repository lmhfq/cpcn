<?php
declare(strict_types=1);

namespace Lmh\Cpcn\Service\Ep\Request;

use Lmh\Cpcn\Entity\Tx\FileInfoEntity;
use Lmh\Cpcn\Support\Xml;

class Tx2902Request extends BaseRequest
{
    /**
     * @var string
     */
    protected $uri = '/Gateway4File/InterfaceII';
    /**
     * @var string
     */
    protected $txCode = '2902';
    /**
     * @var array
     * @see FileInfoEntity
     */
    protected $files = [];

    /**
     * @return array
     */
    public function getFiles(): array
    {
        return $this->files;
    }

    /**
     * @param array $files
     */
    public function setFiles(array $files): void
    {
        $this->files = $files;
    }

    public function handle()
    {
        $data = [];
        $head = parent::getHead();
        $head['Head']['InstitutionID'] = $this->getInstitutionId();
        $data = array_merge($data, $head);
        $body = [
        ];
        $files = [];
        foreach ($this->files as $v) {
            /**
             * @var $v FileInfoEntity
             */
            $files[] = [
                'FileName' => $v->getFileName(),
                'Content' => $v->getFileContent(),
            ];
        }
        $body = array_merge($body, $files);
        $data = array_merge($data, [
            'Body' => $body
        ]);
        $this->requestPlainText = Xml::build($data, 'Request', 'Files', 'UTF-8');
        parent::handle();
    }
}