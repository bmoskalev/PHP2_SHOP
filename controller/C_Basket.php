<?php
/**
 * Created by PhpStorm.
 * User: Москалевы
 * Date: 14.03.2019
 * Time: 0:16
 */

namespace app\controller;


class C_Basket extends C_Model
{
    public function addToBasket($id)
    {
        $sql = "select * FROM `goods` WHERE id=$id";
        $serverPathArr = $this->db::getRow($sql);
//        $res = mysqli_query($connect, $sql);
//        while ($data = mysqli_fetch_assoc($res)) {
//            $serverPathArr = $data;
//        }
        $nameShort = $serverPathArr['nameShort'];
        $nameFull = $serverPathArr['nameFull'];
        $price = $serverPathArr['price'];
        $param = $serverPathArr['param'];
        $weight = $serverPathArr['weight'];
        $bigPhoto = $serverPathArr['bigPhoto'];
        $miniPhoto = $serverPathArr['miniPhoto'];
        $discount = $serverPathArr['discount'];

//        $goodBasket = getOne($connect, $id, 'basket');
        $sql = "select * FROM `basket` WHERE id=$id";
        $goodBasket = $this->db::getRow($sql);

        if ($goodBasket) {
            $sql = "UPDATE `basket` SET `count`= `count`+1 WHERE id=$id";
            $this->db::update($sql);

        } else {
            $this->goodsBasket_new($id, $nameShort, $nameFull, $price, $param, $weight, $bigPhoto, $miniPhoto, '1', $discount);
        }

        $countGoodsOrder = countGoodsOrder($connect);
        $sumGoodsOrder = sumGoodsOrder($connect);
        $countOneGoodsOrder = countOneGoodsOrder($connect, $id);
        $sumOneGoodsOrder = sumOneGoodsOrder($connect, $id);
        $orderTotalSum = orderTotalSum($connect);
        $sumGoodsOrderDiscount = sumGoodsOrderDiscount($connect);

        $req = [$countGoodsOrder, $sumGoodsOrder, $countOneGoodsOrder, $sumOneGoodsOrder, $orderTotalSum, $sumGoodsOrderDiscount]; // присваиваем переменной нужные данные
        echo json_encode($req); // возвращаем данные ответом, преобразовав в JSON-строку
    }

    private function goodsBasket_new($Id, $nameShort, $nameFull, $price, $param, $weight, $bigPhoto, $miniPhoto, $count, $discount)
    {
        $t = "INSERT INTO basket (Id, nameShort, nameFull, price, param, weight, bigPhoto, miniPhoto, count, discount) VALUES ('%s', '%s', '%s', '%s','%s','%s','%s','%s','%s','%s')";

        $query = sprintf($t, $Id, mysqli_real_escape_string($connect, $nameShort), mysqli_real_escape_string($connect, $nameFull), mysqli_real_escape_string($connect, $price), mysqli_real_escape_string($connect, $param), mysqli_real_escape_string($connect, $weight), mysqli_real_escape_string($connect, $bigPhoto), mysqli_real_escape_string($connect, $miniPhoto), mysqli_real_escape_string($connect, $count), mysqli_real_escape_string($connect, $discount));

        $result = mysqli_query($connect, $query);

        if (!$result) {
            die(mysqli_error($connect));
        }

        return true;
    }
}