<?php namespace Fueldevco\Boilerplate\Models;

/**
 * Class ReflectionModelTrait
 *
 * @package Fueldevco\Boilerplate\Models
 */
trait ReflectionModelTrait
{
    /**
     * Get the object's identifier
     *
     * @return integer
     */
    public function getIdentifier()
    {
        return $this->getKey() ?: $this->id;
    }

    /**
     * Get the model's class
     *
     * @return string
     */
    public function getClass()
    {
        return get_class($this);
    }

    /**
     * Get the model's base class
     *
     * @return string
     */
    public function getClassBasename()
    {
        return class_basename($this->getClass());
    }

    /**
     * Get tge application's namespace
     *
     * @return string
     */
    public function getNamespace()
    {
        $path = get_class($this);
        $path = explode('\\', $path);

        return array_get($path, 0);
    }
} 