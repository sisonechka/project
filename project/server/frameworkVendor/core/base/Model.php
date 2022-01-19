<?php


namespace frameworkVendor\core\base;


use frameworkVendor\core\Db;

abstract class Model
{
    protected $pdo;
    protected $table;

    public function __construct()
    {
        $this->pdo = Db::instance();
    }

    public function executeCreate($sql, $params = [])
    {
        return $this->pdo->query($sql, $params);
    }

    public function executeSelect($sql, $params = [])
    {
        $res = $this->pdo->query($sql, $params);
        if ($res !== false)
        {
            return $this->pdo->query($sql)->fetchAll();
        }
        return [];
    }
}