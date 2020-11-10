<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2020/11/9
 * Time: 下午9:22
 */

namespace Lmh\Cpcn\Support;


use InvalidArgumentException;
use RuntimeException;

/**
 * Class Base64Image
 * @package Lmh\Cpcn\Support
 * User: lmh <lmh@weiyian.com>
 * Date: 2020/11/10
 * @see Base64Image
 */
class Base64Image
{
    const DEFAULT_ALLOWED_FORMATS = [
        'jpeg',
        'jpg',
        'png',
        'gif',
    ];

    /**
     * @var string
     */
    private $mimeType;

    /**
     * @var string
     */
    private $base64;

    private function __construct(string $mimeType, string $base64)
    {
        $this->mimeType = $mimeType;
        $this->base64 = $base64;
    }

    /**
     * @param string $mimeType
     * @param array $allowedFormats
     */
    private static function validate(string $mimeType, array $allowedFormats)
    {
        $format = strtr($mimeType, ['image/' => '']);

        if (!in_array($format, $allowedFormats, true)) {
            throw new InvalidArgumentException("不支持的文件格式");
        }
    }

    /**
     * @param string $content
     * @return string
     */
    private static function encode(string $content): string
    {
        return base64_encode($content);
    }


    /**
     * @param string $fileName
     * @param array $allowedFormats
     * @return Base64Image
     */
    public static function fromFileName(string $fileName, array $allowedFormats = self::DEFAULT_ALLOWED_FORMATS): self
    {
        if (!is_readable($fileName)) {
            throw new RuntimeException("file is not readable");
        }
        $mimeType = mime_content_type($fileName);
        self::validate($mimeType, $allowedFormats);
        return new static($mimeType, self::encode(file_get_contents($fileName)));
    }

    /**
     * @return string
     */
    public function getMimeType(): string
    {
        return $this->mimeType;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->base64;
    }

    /**
     * @return string
     * @see getDataUri
     */
    public function getDataUri(): string
    {
        return 'data:' . $this->mimeType . ';base64,' . $this->base64;
    }
}