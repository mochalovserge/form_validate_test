<?php
namespace App\Forms\Elements;

use App\Validators\AbstractValidator;

interface FormElementInterface
{
    /**
     * @return mixed
     */
    public function getValue();

    /**
     * @param $value
     * @return $this
     */
    public function setValue($value);

    /**
     * @return AbstractValidator
     */
    public function getValidator();

    /**
     * @param AbstractValidator $validator
     * @return $this
     */
    public function setValidator(AbstractValidator $validator);

    /**
     * @return bool
     */
    public function validate();

    /**
     * @return array
     */
    public function getErrors();
}
