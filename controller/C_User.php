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
    public function action_register(){
        $this->render('registration.tmpl');
    }

    public function action_createUser(){
        session_start();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $first_name = strip_tags($_POST['first_name']);
            $last_name = strip_tags($_POST['last_name']);
            $login = strip_tags($_POST['login']);
            $password = strip_tags($_POST['password']);
            $password2 = strip_tags($_POST['password2']);

            $sql = "select * from user_data where login = '$login'";
            if ($this->db::getRow($sql)) {
                echo "<h2>Пользователеь с таким логином уже существует!</h2>";
                $this->render('registration.tmpl');
            } else if ($password != '' && $password !== $password2) {
                echo "<h2>Пожалуйста, проверьте правильность повторного ввода пароля!</h2>";
                $this->render('registration.tmpl');
            } else {
                $sql = self::addNewUser($first_name, $last_name, $login, $password);
                if ($sql) {
                    echo "<h2>Спасибо за регистрацию</h2><br>";
                    echo "<a href='index.php'>Вернуться на главную страницу</a>";
                } else {
                    echo "<h2>При отправке формы произошла ошибка!</h2>";
                }
            }
        }

    }
    protected function addNewUser($first_name, $last_name, $login, $password) {
        return $this->db::insert("INSERT INTO user_data (user_first_name, user_last_name, login, password)
    VALUES ('$first_name', '$last_name', '$login', '$password')");
    }

}
