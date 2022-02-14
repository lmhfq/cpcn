<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2022/2/14
 * Time: 上午11:58
 */

namespace Lmh\Cpcn\Constant;


class InnerCodeData
{
    /**
     * 企业规模： 01：大型 02：中型 03：小型 04：微型 98：其他
     */
    public const SCALE_01 = '01';
    public const SCALE_02 = '02';
    public const SCALE_03 = '03';
    public const SCALE_04 = '04';
    public const SCALE_98 = '98';

    /**
     * @author lmh
     */
    public static function getScaleList(): array
    {
        return [
            self::SCALE_01 => '大型',
            self::SCALE_02 => '中型',
            self::SCALE_03 => '小型',
            self::SCALE_04 => '微型',
            self::SCALE_98 => '其他',
        ];
    }
}