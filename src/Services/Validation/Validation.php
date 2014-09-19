<?php namespace Fueldevco\Boilerplate\Services\Validation;

use Illuminate\Validation\Factory;
use Input;

/**
 * Class Validation
 *
 * @package Fueldevco\Boilerplate\Services\Validation
 */
abstract class Validation implements ValidationInterface
{

    /**
     * @var Factory
     */
    protected $validator;

    /**
     * @var
     */
    protected $errors;
    /**
     * @var array
     */
    protected $attributes;
    /**
     * @var
     */
    protected $rules;

    /**
     * @param null    $attributes
     * @param Factory $validator
     */
    public function __construct($attributes = null, Factory $validator)
    {
        $this->attributes = $attributes ?: Input::all();
        $this->validator = $validator;
    }

    /**
     * @return mixed
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * @return mixed
     */
    public function getRules()
    {
        return $this->rules;
    }

    /**
     * @param array $attributes
     *
     * @return $this
     */
    public function with(array $attributes)
    {
        $this->attributes = $attributes;

        return $this;
    }

    /**
     * setRule
     *
     * @param $key
     * @param $value
     *
     * @return $this
     */
    public function setRule($key, $value)
    {
        $this->rules[$key] = $value;

        return $this;
    }

    /**
     * emptyRules
     *
     * @return $this
     */
    public function emptyRules()
    {
        $this->rules = array();

        return $this;
    }

    /**
     * @param $attributes
     * @param $rules
     *
     * @return bool
     */
    public function validate($attributes, $rules)
    {
        $validation = $this->validator->make($attributes, $rules);

        if ($validation->passes()) {
            return true;
        }

        $this->errors = $validation->errors();

        return false;
    }
}