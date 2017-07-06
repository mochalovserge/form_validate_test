<?php
namespace App\Validators;

class RepeatPasswordValidator extends AbstractValidator
{
    /**
     * @param $value
     * @param array $errors
     * @return bool
     */
    public function validate($value, &$errors = [])
    {
        $value = (array)$value;
        list($password, $repeat_password) = $value;

        var_dump($value);

        if ($password != $repeat_password) {
            $errors[] = $this->message();

            return false;
        }

        if ($this->getNext()) {
            return $this->getNext()->validate($value, $errors);
        }

        return true;
    }

    protected function message()
    {
        return "Пароли не совпадают.";
    }
}