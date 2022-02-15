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

    /**
     * @author lmh
     */
    public static function getProvincesList(): array
    {
        $provinces = [11 => '北京市',
            12 => '天津市',
            13 => '河北省',
            14 => '山西省',
            15 => '内蒙古自治区',
            21 => '辽宁省',
            22 => '吉林省',
            23 => '黑龙江省',
            31 => '上海市',
            32 => '江苏省',
            33 => '浙江省',
            34 => '安徽省',
            35 => '福建省',
            36 => '江西省',
            37 => '山东省',
            41 => '河南省',
            42 => '湖北省',
            43 => '湖南省',
            44 => '广东省',
            45 => '广西壮族自治区',
            46 => '海南省',
            50 => '重庆市',
            51 => '四川省',
            52 => '贵州省',
            53 => '云南省',
            54 => '西藏自治区',
            61 => '陕西省',
            62 => '甘肃省',
            63 => '青海省',
            64 => '宁夏回族自治区',
            65 => '新疆维吾尔自治区',
            71 => '台湾省',
            81 => '香港特别行政区',
            82 => '澳门特别行政区'
        ];
        $data = [];
        foreach ($provinces as $key => $v) {
            $data[] = [
                "province_name" => $v,
                "province_code" => $key
            ];
        }
        return $data;
    }
}