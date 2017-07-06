#!/usr/bin/php
<?php
/**
 * Форма регистрации
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
use App\Forms\Elements\FormElement;
use App\Validators\RequireValidator;
use App\Validators\EmailValidator;
use App\Validators\DateValidator;
use App\Validators\RepeatPasswordValidator;

use App\Forms\RegisterForm;

require_once 'vendor/autoload.php';

$login = new FormElement();
$login->setValue("login")
    ->setValidator(new RequireValidator());

$password = new FormElement();
$password->setValue("123456")
    ->setValidator(new RequireValidator());

$repeat_password = new FormElement();
$repeat_password->setValue([$password->getValue(), "123456"])
    ->setValidator(new RepeatPasswordValidator());

$email = new FormElement();
$email->setValue("mochalov.serge@gmail.com")
    ->setValidator(new RequireValidator())
    ->setValidator(new EmailValidator());

$date = new FormElement();
$date->setValue("12.12.2000")
    ->setValidator(new RequireValidator())
    ->setValidator(new DateValidator());

$registerForm = new RegisterForm();
$registerForm->setLogin($login)
    ->setPassword($password)
    ->setRepeatPassword($repeat_password)
    ->setEmail($email)
    ->setBirthday($date);

$validate = $registerForm->validate();
$errors = $registerForm->getErrors();

var_dump([$validate, $errors]);
