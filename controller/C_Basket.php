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
    public function action_addToBasket($id)
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

        $countGoodsOrder = $this->countGoodsOrder();
        $sumGoodsOrder = $this->sumGoodsOrder();
        $countOneGoodsOrder = $this->countOneGoodsOrder($id);
        $sumOneGoodsOrder = $this->sumOneGoodsOrder($id);
        $orderTotalSum = $this->orderTotalSum();
        $sumGoodsOrderDiscount = $this->sumGoodsOrderDiscount();

        $req = [$countGoodsOrder, $sumGoodsOrder, $countOneGoodsOrder, $sumOneGoodsOrder, $orderTotalSum, $sumGoodsOrderDiscount]; // присваиваем переменной нужные данные
        echo json_encode($req); // возвращаем данные ответом, преобразовав в JSON-строку
    }

    public function action_deleteFromBasket($id)
    {
        $goodBasket = $this->getOne($id, 'basket');

        if ($goodBasket['count'] > 1) {
            $sql = "UPDATE `basket` SET `count`= `count`-1 WHERE id=$id";
            $this->db::update($sql);
        } else {
            $sql = "DELETE FROM `basket` WHERE id=$id";
            $this->db::delete($sql);
        }
        $countGoodsOrder = $this->countGoodsOrder();
        $sumGoodsOrder = $this->sumGoodsOrder();
        $countOneGoodsOrder = $this->countOneGoodsOrder($id);
        $sumOneGoodsOrder = $this->sumOneGoodsOrder($id);
        $orderTotalSum = $this->orderTotalSum();
        $sumGoodsOrderDiscount = $this->sumGoodsOrderDiscount();

        $req = [$countGoodsOrder, $sumGoodsOrder, $countOneGoodsOrder, $sumOneGoodsOrder, $orderTotalSum, $sumGoodsOrderDiscount]; // присваиваем переменной нужные данные
        echo json_encode($req); // возвращаем данные ответом, преобразовав в JSON-строку
    }

    public function action_getBasketGoods()
    {
        $goodBasket = $this->renderBasketModal();
        echo json_encode($goodBasket); // возвращаем данные ответом, преобразовав в JSON-строку
    }

    private function goodsBasket_new($Id, $nameShort, $nameFull, $price, $param, $weight, $bigPhoto, $miniPhoto, $count, $discount)
    {
        $t = "INSERT INTO basket (Id, nameShort, nameFull, price, param, weight, bigPhoto, miniPhoto, count, discount) VALUES ('%s', '%s', '%s', '%s','%s','%s','%s','%s','%s','%s')";

        //$query = sprintf($t, $Id, mysqli_real_escape_string($connect, $nameShort), mysqli_real_escape_string($connect, $nameFull), mysqli_real_escape_string($connect, $price), mysqli_real_escape_string($connect, $param), mysqli_real_escape_string($connect, $weight), mysqli_real_escape_string($connect, $bigPhoto), mysqli_real_escape_string($connect, $miniPhoto), mysqli_real_escape_string($connect, $count), mysqli_real_escape_string($connect, $discount));
        $query = sprintf($t, $Id, $nameShort, $nameFull, $price, $param, $weight, $bigPhoto, $miniPhoto, $count, $discount);

//        $result = $this->db::insert($query);
        $this->db::insert($query);
//        if (!$result) {
//            die(mysqli_error($connect));
//        }

        return true;
    }

    private function countGoodsOrder()
    {
        $query = "SELECT sum(`count`) AS count FROM `basket`";
//        $result = mysqli_query($connect, $query);
//        if (!$result)
//            die(mysqli_error($connect));
//        $countOrder = mysqli_fetch_assoc($result);
        $countOrder = $this->db::getRow($query);
        return $countOrder['count'];
    }

    private function sumGoodsOrder()
    {
        $query = "SELECT sum(`count`*`price`) AS sum FROM `basket`";
//        $result = mysqli_query($connect, $query);
//        if (!$result)
//            die(mysqli_error($connect));
//        $sumOrder = mysqli_fetch_assoc($result);
        $sumOrder = $this->db::getRow($query);
        return $sumOrder['sum'];
    }

    private function countOneGoodsOrder($id)
    {
        $query = sprintf("SELECT `count`  FROM `basket` WHERE id='%d'", (int)$id);
//        $result = mysqli_query($connect, $query);
//        if (!$result)
//            die(mysqli_error($connect));
//        $countOneOrder = mysqli_fetch_assoc($result);
        $countOneOrder = $this->db::getRow($query);
        return $countOneOrder['count'];
    }

    private function sumOneGoodsOrder($id)
    {
        $query = sprintf("SELECT sum(`count`*`price`) AS sum FROM `basket` WHERE id='%d'", (int)$id);
//        $result = mysqli_query($connect, $query);
//        if (!$result)
//            die(mysqli_error($connect));
//        $sumOneOrder = mysqli_fetch_assoc($result);
        $sumOneOrder = $this->db::getRow($query);
        return $sumOneOrder['sum'];
    }

    private function orderTotalSum()
    {
        $query = "SELECT sum(`count`*`price`) AS sum FROM `basket`";
//        $result = mysqli_query($connect, $query);
//        if (!$result)
//            die(mysqli_error($connect));
//        $orderTotalSum = mysqli_fetch_assoc($result);
        $orderTotalSum = $this->db::getRow($query);
        return $orderTotalSum['sum'];
    }

    private function sumGoodsOrderDiscount()
    {
        $query = "SELECT sum(`count`*`price`*(100-`discount`)/100) AS sumDiscount FROM `basket`";
//        $result = mysqli_query($connect, $query);
//        if (!$result)
//            die(mysqli_error($connect));
//        $sumOrder = mysqli_fetch_assoc($result);
        $sumOrder = $this->db::getRow($query);
        return floor($sumOrder['sumDiscount']);
    }

    private function renderBasketModal()
    {

        $query = "SELECT * FROM basket order by id";
        $goods = $this->db::getRows($query);
//        if (!$result)
//            die(mysqli_error($connect));
//
//        $n = mysqli_num_rows($result);
//        $goods = array();
//
//        for ($i = 0; $i < $n; $i++) {
//            $row = mysqli_fetch_assoc($result);
//            $goods[] = $row;
//        }
        return $goods;
    }

    public function action_dbCreateOrder
    {
        $orderInfo = $this->getClientInfo_all();

        $timeOrder = time();

        if (count($orderInfo) == 0) {
            $this->clientInfo_new($timeOrder, $name, $phone, $discountCard, $persons, $pay, $desiredTime, $money, $address, $comment, $delivery, $desiredTime);
        } else {
            $this->clientInfo_edit($timeOrder, $name, $phone, $discountCard, $persons, $pay, $desiredTime, $money, $address, $comment, $delivery, $desiredTime);
        };


        $orderInfo = $this->getClientInfo_all();
        $idClient = $orderInfo[0]['id'];
        $goodsBascket = goodsBasket_all();

        $query = sprintf("TRUNCATE `orderToManager`");
        $result = mysqli_query($query);

        foreach ($goodsBascket as $good) {
            $idGood = $good['id'];
            $count = $good['count'];
            newOrderToManager($idClient, $idGood, $count);
        }

        echo json_encode($goodsBascket); // возвращаем данные ответом, преобразовав в JSON-строку
    }

    private function getClientInfo_all()
    {
        $query = "SELECT * FROM clientInfo";
        $result = $this->db::getRows($query);
        return $result;
    }

    private function clientInfo_new($timeOrder, $name, $phone, $discountCard, $persons, $pay, $money, $address, $comment, $delivery, $desiredTime)
    {
        $sql = "INSERT INTO clientInfo (timeOrder, name, phone, discountCard, persons, pay, money, address, comment, delivery, desiredTime) VALUES (?, ?, ?, ?, ?, ?,?,?,?,?,?)";
        $this->db::insert($sql, [$timeOrder, $name, $phone, $discountCard, $persons, $pay, $money, $address, $comment, $delivery, $desiredTime]);
        return true;
    }

    private function clientInfo_edit($timeOrder, $name, $phone, $discountCard, $persons, $pay, $money, $address, $comment, $delivery, $desiredTime)
    {
        $sql = "UPDATE clientInfo SET timeOrder= ?, name=?, phone=?, discountCard=?, persons=?, pay=?, money=?, address=?, comment=?, delivery=?, desiredTime=?";
        $this->db::update($sql,[$timeOrder, $name, $phone, $discountCard, $persons, $pay, $money, $address, $comment, $delivery, $desiredTime]);
        return $this->db::rowCount();
    }

    function goodsBasket_all($connect)
    {
        $query = "SELECT * FROM basket order by id";
        $result = mysqli_query($connect, $query);

        if (!$result)
            die(mysqli_error($connect));

        $n = mysqli_num_rows($result);
        $goods = array();

        for ($i = 0; $i < $n; $i++) {
            $row = mysqli_fetch_assoc($result);
            $goods[] = $row;
        }

        return $goods;
    }
}