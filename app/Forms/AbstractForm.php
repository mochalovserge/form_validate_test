<?php
namespace App\Forms;

abstract class AbstractForm
{
    /**
     * @var array
     */
    protected $errors = [];

    /**
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * @param array $errors
     */
    public function setErrors(array $errors)
    {
        $this->errors = array_merge($this->errors, $errors);
    }

    /**
     * @return bool
     */
    public function hasErrors()
    {
        return sizeof($this->errors) > 0;
    }

    /**
     * @return void
     */
    public function flushErrors()
    {
        $this->errors = [];
    }

    /**
     * @return bool
     */
    abstract public function validate();
}
