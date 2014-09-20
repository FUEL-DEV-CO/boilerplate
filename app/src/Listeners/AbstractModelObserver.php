<?php namespace Fueldevco\Boilerplate\Listeners;

/**
 * Class AbstractModelObserver
 *
 * @package Fueldevco\Boilerplate\Listeners
 */
abstract class AbstractModelObserver
{
    /**
     * @param $model
     *
     * @return mixed
     */
    abstract public function saving($model);

    /**
     * @param $model
     *
     * @return mixed
     */
    abstract public function save($model);

    /**
     * @param $model
     *
     * @return mixed
     */
    abstract public function creating($model);

    /**
     * @param $model
     *
     * @return mixed
     */
    abstract public function created($model);

    /**
     * @param $model
     *
     * @return mixed
     */
    abstract public function updating($model);

    /**
     * @param $model
     *
     * @return mixed
     */
    abstract public function updated($model);

    /**
     * @param $model
     *
     * @return mixed
     */
    abstract public function deleting($model);

    /**
     * @param $model
     *
     * @return mixed
     */
    abstract public function deleted($model);
}