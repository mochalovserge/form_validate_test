<?php
namespace App\Validators;

abstract class AbstractValidator
{
    /**
     * @var AbstractValidator
     */
    protected $next;

    /**
     * @return AbstractValidator
     */
    public function getNext()
    {
        return $this->next;
    }

    /**
     * @param AbstractValidator $next
     * @return $this
     */
    public function setNext($next)
    {
        $this->next = $next;

        return $this;
    }

    /**
     * @param $value
     * @param array $errors
     * @return mixed
     */
    abstract public function validate($value, &$errors = []);
}
