<?php namespace Fueldevco\Boilerplate\Presenters;

use ArrayAccess;

/**
 * Class PresenterAbstract
 *
 * @package Fueldevco\Boilerplate\Presenters
 */
abstract class PresenterAbstract implements ArrayAccess
{

    /**
     * @var mixed
     */
    protected $entity;

    /**
     * @param $entity
     */
    public function set($entity)
    {
        $this->entity = $entity;
    }

    /**
     * Check to see if the offset exists on the current entity
     *
     * @param string $key
     *
     * @return boolean
     */
    public function offsetExists($key)
    {
        if (! is_array($this->entity)) {
            return true;
        }

        return isset($this->entity[$key]);
    }

    /**
     * Retrieve the key from the entity
     *
     * @param string $key
     *
     * @return boolean
     */
    public function offsetGet($key)
    {
        return $this->__get($key);
    }

    /**
     * Set a property on the entity
     *
     * @param string $key;
     * @param mixed $value
     */
    public function offsetSet($key, $value)
    {
        if (is_array($this->entity)) {
            $this->entity[$key] = $value;
            return;
        }

        $this->entity->key = $value;
    }

    /**
     * Unset a key on the entity
     *
     * @param string $key
     */
    public function offsetUnset($key)
    {
        if (is_array($this->entity)) {
            unset($this->entity[$key]);
            return;
        }

        unset($this->entity->$key);
    }

    /**
     * @param $key
     *
     * @return bool
     */
    public function __isset($key)
    {
        if (is_array($this->entity)) {
            return isset($this->entity[$key]);
        }

        return isset($this->entity->key);
    }

    /**
     * @param $key
     */
    public function __unset($key)
    {
        if (is_array($this->entity)) {
            unset($this->entity[$key]);
            return;
        }

        unset($this->entity->key);
    }

    /**
     * @param $property
     *
     * @return mixed
     */
    public function __get($property)
    {
        if (method_exists($this, $property)) {
            return $this->{$property}();
        }

        return $this->entity->{$property};
    }
}