<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2022/1/22
 * Time: 下午3:47
 */

namespace Lmh\Cpcn\Service\Ecommerce\Request;

class Tx4600Request extends BaseRequest
{
    /**
     * @var string
     */
    protected $uri = '/Gateway4File/InterfaceII';

    protected $txCode = 'Tx4600';

    /**
     * @var int 业务类型：
     * 10-壹企付-开户上传身份影印图片（默认）
     * 11-壹企付-实名用户补充影印件
     * 20-薪享付-签约上传身份影印图片
     * 30-信用支付-准入授权影像件
     */
    protected $businessType = 10;
    /**
     * @var array
     */
    public $imageInfo = [];

    public function handle()
    {
        // TODO: Implement handle() method.
    }
}