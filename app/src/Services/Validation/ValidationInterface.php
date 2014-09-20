<?php namespace Fueldevco\Boilerplate\Services\Validation;

/**
 * Interface ValidationInterface
 *
 * @package Fueldevco\Boilerplate\Services\Validation
 */
interface ValidationInterface
{

    /**
     * Add data to validation against
     *
     * @param array
     * @return ValidationInterface $this
     */
    public function with(array $input);

    /**
     * Test if validation passes
     *
     * @return boolean
     */
    public function validate($attributes, $rules);

    /**
     * Retrieve validation errors
     *
     * @return array
     */
    public function getErrors();

    /**
     * getRules
     *
     * @return $this->rules array
     */
    public function getRules();

    /**
     * setRule
     *
     * @param string $key
     * @param string $value
     * @return $this
     */
    public function setRule($key, $value);

    /**
     * emptyRules
     *
     * @return $this
     */
    public function emptyRules();
}