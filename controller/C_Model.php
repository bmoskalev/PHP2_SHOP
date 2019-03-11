<?php

namespace app\controller;

class C_Model

{

    protected $db = DB;
    protected $user;

    public function render($template, $params=[]){
        $this->user = $_SESSION['login'];
        echo $this->user;
        if (isset($_SESSION['login'])) {
            $this->user = $_SESSION['login'];
        }
        try {
            $loader = new \Twig_Loader_Filesystem(ROOT_DIR . '/templates');
            $twig = new \Twig_Environment($loader);
            $template = $twig->loadTemplate($template);
            echo $template->render(array(
                'param'=>$params,
                'user'=>$this->user));

        } catch (Exception $e) {
            die ('ERROR: ' . $e->getMessage());
        }
    }
}