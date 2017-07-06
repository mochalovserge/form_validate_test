<?php

namespace App\Forms;

use App\Forms\Elements\FormElementInterface;

class RegisterForm extends AbstractForm
{
    /**
     * @var FormElementInterface
     */
    protected $login;

    /**
     * @var FormElementInterface
     */
    protected $password;

    /**
     * @var FormElementInterface
     */
    protected $repeatPassword;

    /**
     * @var FormElementInterface
     */
    protected $birthday;

    /**
     * @var FormElementInterface
     */
    protected $email;

    /**
     * @return FormElementInterface
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param FormElementInterface $login
     * @return $this
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * @return FormElementInterface
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param FormElementInterface $password
     * @return $this
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return FormElementInterface
     */
    public function getRepeatPassword()
    {
        return $this->repeatPassword;
    }

    /**
     * @param FormElementInterface $repeatPassword
     * @return $this
     */
    public function setRepeatPassword($repeatPassword)
    {
        $this->repeatPassword = $repeatPassword;

        return $this;
    }

    /**
     * @return FormElementInterface
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * @param FormElementInterface $birthday
     * @return $this
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;

        return $this;
    }

    /**
     * @return FormElementInterface
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param FormElementInterface $email
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return bool
     */
    public function validate()
    {
        $this->flushErrors();

        if (!$this->login->validate()) {
            $this->setErrors(['login' => $this->login->getErrors()]);
        }

        if (!$this->password->validate()) {
            $this->setErrors(['password' => $this->password->getErrors()]);
        }

        if (!$this->repeatPassword->validate()) {
            $this->setErrors(['repeat_password' => $this->repeatPassword->getErrors()]);
        }

        if (!$this->email->validate()) {
            $this->setErrors(['email' => $this->email->getErrors()]);
        }

        if (!$this->birthday->validate()) {
            $this->setErrors(['birthday' => $this->birthday->getErrors()]);
        }

        return !$this->hasErrors();
    }
}
