<?php
namespace App\Validators;

class DateValidator extends AbstractValidator
{
    /**
     * Проверяет формат даты
     *
     * @param $value
     * @param array $errors
     * @return bool
     */
    public function validate($value, &$errors = [])
    {
        if ($value != date('d.m.Y',strtotime($value))) {

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
        return "Дата имет некорректный формат.";
    }
}
