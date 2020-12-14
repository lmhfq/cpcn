<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2020/12/14
 * Time: 下午7:41
 */

namespace Lmh\Cpcn\Support;

use ArrayIterator;

/**
 * Class ArrayAccessTrait
 * @package Lmh\Cpcn\Support
 * User: lmh <lmh@weiyian.com>
 * Date: 2020/12/14
 * @property array $data
 */
trait ArrayAccessTrait
{
    /**
     * Returns an iterator for traversing the data.
     * This method is required by the SPL interface [[\IteratorAggregate]].
     * It will be implicitly called when you use `foreach` to traverse the collection.
     * @return ArrayIterator an iterator for traversing the cookies in the collection.
     */
    public function getIterator()
    {
        return new ArrayIterator($this->data);
    }

    /**
     * Returns the number of data items.
     * This method is required by Countable interface.
     * @return int number of data elements.
     */
    public function count()
    {
        return count($this->data);
    }

    /**
     * This method is required by the interface [[\ArrayAccess]].
     * @param mixed $offset the offset to check on
     * @return bool
     */
    public function offsetExists($offset)
    {
        return isset($this->data[$offset]);
    }

    /**
     * This method is required by the interface [[\ArrayAccess]].
     * @param int $offset the offset to retrieve element.
     * @return mixed the element at the offset, null if no element is found at the offset
     */
    public function offsetGet(int $offset)
    {
        return isset($this->data[$offset]) ? $this->data[$offset] : null;
    }

    /**
     * This method is required by the interface [[\ArrayAccess]].
     * @param int $offset the offset to set element
     * @param mixed $item the element value
     */
    public function offsetSet(int $offset, $item)
    {
        $this->data[$offset] = $item;
    }

    /**
     * This method is required by the interface [[\ArrayAccess]].
     * @param mixed $offset the offset to unset element
     */
    public function offsetUnset($offset)
    {
        unset($this->data[$offset]);
    }
}