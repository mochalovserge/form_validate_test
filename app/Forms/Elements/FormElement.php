<?php
namespace App\Forms\Elements;

use App\Validators\AbstractValidator;

class FormElement implements FormElementInterface
{
    /**
     * @var mixed
     */
    protected $value;

    /**
     * @var AbstractValidator
     */
    protected $validator;

    /**
     * @var array
     */
    protected $errors = [];

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     * @return $this
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @return AbstractValidator
     */
    public function getValidator()
    {
        return $this->validator;
    }

    /**
     * @param AbstractValidator $validator
     * @return $this
     */
    public function setValidator(AbstractValidator $validator)
    {
        if (is_null($this->validator)) {

            $this->validator = $validator;
        }
        else {

            $prev = $this->validator;

            for (;;) {

                $next = $prev->getNext();

                if (is_null($next)) {
                    $prev->setNext($validator); break;
                }

                $prev = $next;
            }
        }

        return $this;
    }

    /**
     * @return bool
     */
    public function validate()
    {
        return $this->validator->validate($this->value, $this->errors);
    }

    /**
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }
}
