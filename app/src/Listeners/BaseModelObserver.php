<?php namespace Fueldevco\Boilerplate\Listeners;

use Auth;

class BaseModelObserver extends AbstractModelObserver
{
    /**
     * @{inheritDoc}
     */
    public function saving($model)
    {

    }

    /**
     * @{inheritDoc}
     */
    public function save($model)
    {

    }

    /**
     * @{inheritDoc}
     */
    public function creating($model)
    {
        $model->created_by = Auth::user()->id;
        $model->updated_by = Auth::user()->id;
    }

    /**
     * @{inheritDoc}
     */
    public function created($model)
    {

    }

    /**
     * @{inheritDoc}
     */
    public function updating($model)
    {
        $model->updated_by = Auth::user()->id;
    }

    /**
     * @{inheritDoc}
     */
    public function updated($model)
    {

    }

    /**
     * @{inheritDoc}
     */
    public function deleting($model)
    {

    }

    /**
     * @{inheritDoc}
     */
    public function deleted($model)
    {

    }
}