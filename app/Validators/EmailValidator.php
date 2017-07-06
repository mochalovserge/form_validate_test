<?php
namespace App\Validators;

class EmailValidator extends AbstractValidator
{
    /**
     * Проверяет адрес электронной почты
     *
     * @param $value
     * @param array $errors
     * @return bool
     */
    public function validate($value, &$errors = [])
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {

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
        return "Некорректный формат электронной почты.";
    }
}
