#!/usr/bin/php
<?php
/**
 * Форма входа
 *
 * Вначале создаются элементы форм, которым устанавливаются значения и валидаторы.
 * Затем экземпляры элементов соединяются с формой через сеттеры.
 *
 * Вызывается валидация и получение списка ошибок.
 * Данные о валидации распечатываются var_dump()
 *
 * Приложение запускается через консоль.
 * Данные в форме меняются через сеттеры, например:
 *
 * $password = new FormElement();
 * $password->setValue("123456")
 * ...
 */

use App\Forms\LoginForm;
use App\Forms\Elements\FormElement;
use App\Validators\RequireValidator;
use App\Validators\EmailValidator;

require_once 'vendor/autoload.php';

$login = new FormElement();
$login->setValue("mochalov.serge@gmail.com")
    ->setValidator(new RequireValidator())
    ->setValidator(new EmailValidator());

$password = new FormElement();
$password->setValue("password")
    ->setValidator(new RequireValidator());

$loginForm = new LoginForm();
$loginForm->setLogin($login);
$loginForm->setPassword($password);

$validate = $loginForm->validate();

var_dump([$validate, $loginForm->getErrors()]);
