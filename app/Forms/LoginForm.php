<?php
namespace App\Forms;

use App\Forms\Elements\FormElementInterface;

final class LoginForm extends AbstractForm
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
    public function setLogin(FormElementInterface $login)
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
    public function setPassword(FormElementInterface $password)
    {
        $this->password = $password;

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

        return !$this->hasErrors();
    }
}
