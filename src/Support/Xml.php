<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Support;


use SimpleXMLElement;

class Xml
{
    /**
     * XML to array.
     *
     * @param string $xml XML string
     *
     * @return array
     */
    public static function parse(string $xml)
    {
        $backup = libxml_disable_entity_loader(true);
        $result = self::normalize(simplexml_load_string(self::sanitize($xml), 'SimpleXMLElement', LIBXML_COMPACT | LIBXML_NOCDATA | LIBXML_NOBLANKS));
        libxml_disable_entity_loader($backup);
        return $result;
    }

    /**
     * XML encode.
     *
     * @param mixed $data
     * @param string $root
     * @param string $item
     * @return string
     */
    public static function build($data, $root = 'MSG', $item = 'FleInfo')
    {
        $xml = '<?xml version="1.0" encoding="GBK"?><' . $root . '>';
        $xml .= self::data2Xml($data, $item);
        $xml .= "</{$root}>";
        return $xml;
    }

    /**
     * Build CDATA.
     *
     * @param string|null $string $string
     *
     * @return string
     */
    public static function cdata(?string $string)
    {
        return sprintf('<![CDATA[%s]]>', $string);
    }

    /**
     * Object to array.
     *
     *
     * @param SimpleXMLElement|array $obj
     *
     * @return array
     */
    protected static function normalize($obj)
    {
        $result = null;

        if (is_object($obj)) {
            $obj = (array)$obj;
        }

        if (is_array($obj)) {
            foreach ($obj as $key => $value) {
                $res = self::normalize($value);
                if (('@attributes' === $key) && ($key)) {
                    $result = $res; // @codeCoverageIgnore
                } else {
                    $result[$key] = $res;
                }
            }
        } else {
            $result = $obj;
        }

        return $result;
    }

    /**
     * Array to XML.
     *
     * @param array $data
     * @param string $item
     * @return string
     */
    protected static function data2Xml(array $data, $item = 'item')
    {
        $xml = '';
        foreach ($data as $key => $val) {
            if (is_numeric($key)) {
                $key = $item;
            }
            $xml .= "<{$key}>";
            if ((is_array($val) || is_object($val))) {
                $xml .= self::data2Xml((array)$val, $item);
            } else {
                $xml .= is_numeric($val) ? $val : self::cdata($val);
            }
            $xml .= "</{$key}>";
        }
        return $xml;
    }

    /**
     * Delete invalid characters in XML.
     *
     * @see https://www.w3.org/TR/2008/REC-xml-20081126/#charsets - XML charset range
     * @see http://php.net/manual/en/regexp.reference.escape.php - escape in UTF-8 mode
     *
     * @param string $xml
     *
     * @return string
     */
    public static function sanitize(string $xml)
    {
        return preg_replace('/[^\x{9}\x{A}\x{D}\x{20}-\x{D7FF}\x{E000}-\x{FFFD}\x{10000}-\x{10FFFF}]+/u', '', $xml);
    }
}