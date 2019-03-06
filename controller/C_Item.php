<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 24.02.2019
 * Time: 22:55
 */

namespace app\controller;


class C_Item extends C_Model
{
    private $id;
    private $product;

    public function __construct($id){
        $this->id = (int) $id;
    }
    protected function updateItem(){
        $this->db::update("UPDATE goods SET views = views + 1 WHERE id = $this->id");
        $this->product = $this->db::getRow("SELECT * FROM goods WHERE id = $this->id");
    }
    public function action_index(){
        self::updateItem();
//        $img = $this->db::getRow("SELECT * FROM images WHERE img_id = {$this->product['img_id']}");
//        $src = $img['main_dir'] . "/" . $img['main_name'];
//        $count = $this->product['views'];
//        $product_name = $this->product['product_name'];
//        $description = $this->product['description'];
//        $price = $this->product['price'];

        $this->render('item.tmpl',
//            [
//            'src' => $src,
//            'price' => $price,
//            'count' => $count,
//            'name' => $product_name,
//            'description' => $description
//        ]
            $this->product
        );
    }
}







