<?php
namespace App\Validators;

class RequireValidator extends AbstractValidator
{
    /**
     * Проверяет заполнено ли поле
     *
     * @param $value
     * @param array $errors
     * @return bool
     */
    public function validate($value, &$errors = [])
    {
        if (empty($value)) {

            $errors[] = $this->message();

            return false;
        }

        if ($this->getNext()) {

            return $this->getNext()->validate($value, $errors);
        }

        return true;
    }

    /**
     * @return string
     */
    protected function message()
    {
        return "Требует значения.";
    }
}
