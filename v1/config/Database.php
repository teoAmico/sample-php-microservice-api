<?php

namespace Config;

use \PDO;

class Database
{

    private function __construct()
    {
    }

    private static $writeConnection;
    private static $readConnection;

    public static function connectWriteDB()
    {

        if (self::$writeConnection == null) {
            self::$writeConnection = new PDO("mysql:host=". getenv('WRITE_DB_HOST').";port=".getenv('READ_DB_PORT').";dbname=". getenv('WRITE_DB_NAME').";utf8",  getenv('WRITE_DB_USER'), getenv('WRITE_DB_PWD'));
            self::$writeConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$writeConnection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

        }
        return self::$writeConnection;
    }

    public static function connectReadDB()
    {
        if (self::$readConnection == null) {
            self::$readConnection = new PDO("mysql:host=".getenv('READ_DB_HOST').";port=".getenv('WRITE_DB_PORT').";dbname=".getenv('READ_DB_NAME').";utf8", getenv('READ_DB_USER'), getenv('READ_DB_PWD'));
            self::$readConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$readConnection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

        }
        return self::$readConnection;
    }
}