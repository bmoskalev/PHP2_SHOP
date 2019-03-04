<?php

namespace app\services;


class Db {

    protected static $instance = null;

    private function __construct() {

    }

    private function __clone() {

    }

    /**
     *
     * @return \PDO
     */
    private static function instance() {
        if (self::$instance === null) {
            $opt = array(
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                \PDO::ATTR_EMULATE_PREPARES => TRUE,
            );
            $dsn = DRIVER . ':host=' . HOST . ';dbname=' . DBName . ';charset=UTF8';
            self::$instance = new \PDO($dsn, USER, PASS, $opt);
        }
        return self::$instance;
    }

    /**
     *
     * @param string $sql
     * @param array $args
     * @return \PDOStatement
     */
    private static function sql($sql, $args = []) {
        //echo "<pre>".$sql."</pre>";
        $stmt = self::instance()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }

    /**
     *
     * @param string $sql
     * @param array $args
     * @return array
     */
    public static function getRows($sql, $args = []) {
        return self::sql($sql, $args)->fetchAll();
    }

    /**
     *
     * @param string $sql
     * @param array $args
     * @return array
     */
    public static function getRow($sql, $args = []) {
        return self::sql($sql, $args)->fetch();
    }

    /**
     *
     * @param string $sql
     * @param array $args
     * @return integer ID
     */
    public static function insert($sql, $args = []) {
        self::sql($sql, $args);
        return self::instance()->lastInsertId();
    }

    /**
     *
     * @param string $sql
     * @param array $args
     * @return integer affected rows
     */
    public static function update($sql, $args = []) {
        $stmt = self::sql($sql, $args);
        return $stmt->rowCount();
    }

    /**
     *
     * @param string $sql
     * @param array $args
     * @return integer affected rows
     */
    public static function delete($sql, $args = []) {
        $stmt = self::sql($sql, $args);
        return $stmt->rowCount();
    }

}

