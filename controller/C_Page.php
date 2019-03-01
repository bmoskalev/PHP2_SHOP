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
        $goodNumber = $this->count * 5;
        $viewRange = "LIMIT $goodNumber";
        $sql = "SELECT * FROM products JOIN images on products.img_id = images.img_id $viewRange";
        $result = $this->db::getRows($sql);
        $this->render('gallery.tmpl', $result);
    }
}


