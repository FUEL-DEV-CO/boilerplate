<?php namespace Fueldevco\Boilerplate\Models;

use Fueldevco\Boilerplate\Listeners\BaseModelObserver;
use Fueldevco\Boilerplate\Presenters\PresentableInterface;
use Fueldevco\Boilerplate\Presenters\PresenterTrait;

/**
 * Class BaseModel
 *
 * @package Fueldevco\Boilerplate\Models
 */
class BaseModel extends AbstractModel implements PresentableInterface
{

    use PresenterTrait, ReflectionModelTrait;

    /**
     * @var
     */
    protected $presenter;

    /**
     * Error message bag
     *
     * @var \Illuminate\Support\MessageBag
     */
    protected $errors;

    public static function boot()
    {
        parent::boot();

        self::observe(new BaseModelObserver);
    }

    public function getCreatedByAttribute()
    {

    }

    public function getUpdatedByAttribute()
    {

    }

    /**
     * Get the contents of errors attribute
     *
     * @return \Illuminate\Support\MessageBag Validation errors
     */
    public function getErrors()
    {
        if (! $this->errors) {
            $this->errors = new \Illuminate\Support\MessageBag;
        }

        return $this->errors;
    }

    /**
     * @param $attribute
     * @param $val
     *
     * @return bool
     */
    public function attrExists($attribute, $val)
    {
        $inAttributes = array_key_exists($attribute, $this->getAttributes());
        if ($inAttributes) {
            if ($this->getAttribute($attribute) == strtolower(trim($val))) {
                return true;
            }
        }

        return false;
    }
}