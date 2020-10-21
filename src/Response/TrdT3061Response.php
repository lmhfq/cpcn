<?php
declare(strict_types=1);


namespace Cpcn\Response;


use Cpcn\Support\ArrayUtil;
use Cpcn\Support\ResponseCode;

class TrdT3061Response extends TrdBaseResponse
{
    protected $url;
    protected $imageurl;
    protected $state;
    protected $authcode;

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url): void
    {
        $this->url = $url;
    }

    /**
     * @return mixed
     */
    public function getImageurl()
    {
        return $this->imageurl;
    }

    /**
     * @param mixed $imageurl
     */
    public function setImageurl($imageurl): void
    {
        $this->imageurl = $imageurl;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param mixed $state
     */
    public function setState($state): void
    {
        $this->state = $state;
    }

    /**
     * @return mixed
     */
    public function getAuthcode()
    {
        return $this->authcode;
    }

    /**
     * @param mixed $authcode
     */
    public function setAuthcode($authcode): void
    {
        $this->authcode = $authcode;
    }

    public function handle(string $message)
    {
        parent::process($message);
        if ($this->msghd_rspcode == ResponseCode::SUCCESS) {
            $this->url = ArrayUtil::get('Url', $this->responseData);
            $this->imageurl = ArrayUtil::get('ImageUrl', $this->responseData);
            $this->state = ArrayUtil::get('State', $this->responseData);
            $this->authcode = ArrayUtil::get('AuthCode', $this->responseData);
        }
    }
}