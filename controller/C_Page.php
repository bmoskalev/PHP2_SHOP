<?php


namespace app\controller;


class C_Page extends C_Model
{
    protected $count;


    public function __construct()
    {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['count'])) {
            $_SESSION['count']++;
        } else if(!$_SESSION['count']) {
            $_SESSION['count']=1;
        }

        $this->count = $_SESSION['count'];

    }

    public function action_index()
    {
        $sql = "SELECT * FROM goods";
        $goods = $this->db::getRows($sql);
        $this->render('index.tmpl', $goods);
    }
}


