<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 24.02.2019
 * Time: 23:43
 */

namespace app\controller;


class C_User extends C_Model
{
    public function action_createUser()
    {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = trim(strip_tags($_POST['name']));
            $login = trim(strip_tags($_POST['login']));

            if (strtolower($login) == 'admin') {
                exit("Логин админа нельзя зарегистрировать!");
            }

            if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $email = trim(strip_tags($_POST['email']));
            }
            $pass = trim(strip_tags($_POST['pass']));

            $sql = "select * from users where login = '$login'";
            if ($this->db::getRow($sql)) {
                echo "<h2>Пользователеь с таким логином уже существует!</h2>";
                header("Location index.php?c=page&act=registration");
            } else if ($password != '' && $password !== $password2) {
                echo "<h2>Пожалуйста, проверьте правильность повторного ввода пароля!</h2>";
                header("Location index.php?c=page&act=registration");
            } else {
                $sql = self::addNewUser($name, $email, $login, md5($pass));
                if ($sql) {
                    echo "<h2>Спасибо за регистрацию</h2><br>";
                    echo "<a href='index.php'>Вернуться на главную страницу</a>";
                } else {
                    echo "<h2>При отправке формы произошла ошибка!</h2>";
                }
            }
            $message = "Вы зарегистрированы!";

        }

    }

    protected function addNewUser($name, $email, $login, $password)
    {
        return $this->db::insert("INSERT INTO users (name, email, login, pass)
    VALUES ('$name', '$email', '$login', '$password')");
    }

    public function action_login()
    {

        $login = trim(strip_tags($_POST['login']));
        $password = md5(trim(strip_tags($_POST['pass'])));
        if ($user = $this->db::getRow("SELECT * FROM users WHERE login = '{$login}' AND pass = '{$password}'")) {
            $_SESSION['login'] = $login;
            header("Location: index.php?{$_SESSION['uri']}");
        } else {
            header("Location: index.php?c=page&act=login");
            echo "<div class='login_message'>Логин или пароль введены неправильно!</div><br>";
        }
    }

    public function action_logout()
    {
        $_SESSION['login'] = '';
        header("Location: index.php?c=page&act=index");
    }

}
