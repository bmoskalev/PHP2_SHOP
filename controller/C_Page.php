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

    public function action_item($id)
    {
        $item= new C_Item($id);
        $this->render('item.tmpl', $item->getItem());
    }
    public function action_actions()
    {
        $this->render('actions.tmpl');
    }

    public function action_contacts()
    {
        $this->render('contacts.tmpl');
    }

    public function action_login()
    {
        $this->render('login.tmpl');
    }

    public function action_registration()
    {
        $this->render('registration.tmpl');
    }

    public function action_comments()
    {
        $sql = "SELECT * FROM comment";
        $comments = $this->db::getRows($sql);
        $this->render('comments.tmpl',$comments);
    }

}


