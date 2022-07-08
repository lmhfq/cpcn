<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Service\Ep\Response;


use Lmh\Cpcn\Constant\TxResponseCode;
use Lmh\Cpcn\Support\ArrayUtil;

class Tx4616Response extends BaseResponse
{
    protected $parentUserId;
    /**
     * @var int 状态:
     * 10=已受理 15=待短信验证 16=审核通过 17=待被动打款验 证18=被动已打款待 验证20=处理中 28=待账户验证 29=审核中 30=成功 40=失败
     */
    protected $status;
    /**
     * @var int|null 绑卡状态:10=已受理 20=处理中 30=成功 40=失败
     * 交易类型为 4601-开户时， 业务类型为开户绑卡时出现且非空；
     */
    protected $bindingStatus;
    /**
     * @var int 剩余可验证次数
     * 1.验证方式为小额打款时返回 （开户并打款绑卡或者企业打款绑卡） 2.付款行名称与账号只在银行打款时返回 3.如果业务类型为绑卡，则可验 证有效期自申请之日起 3 个自然日
     */
    protected $availableVeriCount;
    /**
     * @var string 打款截止日期
     */
    protected $deadLine;
    /**
     * @var string 付款行名称
     */
    protected $payerAccountName;
    /**
     * @var string 付款行账号
     */
    protected $payerAccountNumber;

    /**
     * @return mixed
     */
    public function getParentUserId()
    {
        return $this->parentUserId;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @return int|null
     */
    public function getBindingStatus(): ?int
    {
        return $this->bindingStatus;
    }

    /**
     * @param int|null $bindingStatus
     */
    public function setBindingStatus(?int $bindingStatus): void
    {
        $this->bindingStatus = $bindingStatus;
    }

    /**
     * @return int
     */
    public function getAvailableVeriCount(): int
    {
        return $this->availableVeriCount;
    }

    /**
     * @param int $availableVeriCount
     */
    public function setAvailableVeriCount(int $availableVeriCount): void
    {
        $this->availableVeriCount = $availableVeriCount;
    }

    /**
     * @return string
     */
    public function getDeadLine(): string
    {
        return $this->deadLine;
    }

    /**
     * @param string $deadLine
     */
    public function setDeadLine(string $deadLine): void
    {
        $this->deadLine = $deadLine;
    }

    /**
     * @return string
     */
    public function getPayerAccountName(): string
    {
        return $this->payerAccountName;
    }

    /**
     * @param string $payerAccountName
     */
    public function setPayerAccountName(string $payerAccountName): void
    {
        $this->payerAccountName = $payerAccountName;
    }

    /**
     * @return string
     */
    public function getPayerAccountNumber(): string
    {
        return $this->payerAccountNumber;
    }

    /**
     * @param string $payerAccountNumber
     */
    public function setPayerAccountNumber(string $payerAccountNumber): void
    {
        $this->payerAccountNumber = $payerAccountNumber;
    }

    /**
     * @param string $message
     * @author lmh
     */
    public function handle(string $message)
    {
        parent::handle($message);
        if ($this->code == TxResponseCode::SUCCESS) {
            $this->status = intval(ArrayUtil::get('Status', $this->responseBody));
            $this->parentUserId = ArrayUtil::get('ParentUserID', $this->responseBody);
            $this->availableVeriCount = intval(ArrayUtil::get('AvailableVeriCount', $this->responseBody));
            $this->deadLine = ArrayUtil::get('DeadLine', $this->responseBody);
            $this->payerAccountName = ArrayUtil::get('PayerAccountName', $this->responseBody);
            $this->payerAccountNumber = ArrayUtil::get('PayerAccountNumber', $this->responseBody);
            $this->bindingStatus = ArrayUtil::get('BindingStatus', $this->responseBody, null);
            if ($this->bindingStatus) {
                $this->bindingStatus = intval($this->bindingStatus);
            }
        }
    }
}