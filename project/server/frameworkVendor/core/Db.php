<?php

namespace frameworkVendor\core;

class Db
{
    protected $pdo;
    protected static $instance;

    public static $countSql = 0;
    public static $queries = [];

    protected function __construct()
    {
        $db = [
            'dsn' => 'mysql:host=a_level_nix_mysql:3306;dbname=a_level_nix_mysql;charset=utf8',
            'user' => 'root',
            'pass' => 'cbece_gead-cebfa'
        ];
        $options = [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
        ];
        $this->pdo = new \PDO($db['dsn'], $db['user'], $db['pass'], $options);
    }

    /**
     * @return Db
     */
    public static function instance()//createObject
    {
        if (self::$instance === null){
            self::$instance = new self;
        }
        return self::$instance;
    }

    /**
     * @param $sql
     * @param $params
     * @return bool
     */
    public function execute($sql, $params = [])
    {
        self::$countSql++;
        self::$queries[] = $sql;
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($params);
    }

    /**
     * @param $sql
     * @param $params
     * @return array|false
     */
    public function query($sql, array $params = [])
    {
        self::$countSql++;
        self::$queries[] = $sql;
        $stmt = $this->pdo->prepare($sql);
        $res = $stmt->execute($params);
        if ($res !== false){
            return $stmt->fetchAll();
        }else{
            echo 'ПО условию запроса ничего не выбрано';
        }
        return [];
    }

}

