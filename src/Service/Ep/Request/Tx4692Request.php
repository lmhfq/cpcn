<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2022/2/13
 * Time: 下午2:18
 */

namespace Lmh\Cpcn\Service\Ep\Request;


use Lmh\Cpcn\Support\Xml;

class Tx4692Request extends BaseRequest
{
    protected $txCode = '4692';
    /**
     * @var string 开始日期
     * 格式：yyyyMMdd
     */
    protected $startDate;
    /**
     * @var string 结束日期
     * 开始日期和结束日期不得大于 7 个自然日
     */
    protected $endDate;
    /**
     * @var int 分页
     */
    protected $pageIndex = 1;
    /**
     * @var int 分页大小
     * 最大 100 条
     */
    protected $pageSize = 20;

    /**
     * @return string
     */
    public function getStartDate(): string
    {
        return $this->startDate;
    }

    /**
     * @param string $startDate
     */
    public function setStartDate(string $startDate): void
    {
        $this->startDate = $startDate;
    }

    /**
     * @return string
     */
    public function getEndDate(): string
    {
        return $this->endDate;
    }

    /**
     * @param string $endDate
     */
    public function setEndDate(string $endDate): void
    {
        $this->endDate = $endDate;
    }

    /**
     * @return int
     */
    public function getPageIndex(): int
    {
        return $this->pageIndex;
    }

    /**
     * @param int $pageIndex
     */
    public function setPageIndex(int $pageIndex): void
    {
        $this->pageIndex = $pageIndex;
    }

    /**
     * @return int
     */
    public function getPageSize(): int
    {
        return $this->pageSize;
    }

    /**
     * @param int $pageSize
     */
    public function setPageSize(int $pageSize): void
    {
        $this->pageSize = $pageSize;
    }


    public function handle()
    {
        $data = [];
        $data = array_merge($data, parent::getHead());
        $body = [
            'InstitutionID' => $this->getInstitutionId(),
            'UserID' => $this->getUserId(),
            'StartDate' => $this->getStartDate(),
            'EndDate' => $this->getEndDate(),
            'PageIndex' => $this->getPageIndex(),
            'PageSize' => $this->getPageSize(),
        ];
        $data = array_merge($data, [
            'Body' => $body
        ]);
        $this->requestPlainText = Xml::build($data, 'Request', '', 'UTF-8');
        parent::handle();
    }
}