<?php

    class DB {
        private static $_db = null;

        public static function getInstance() {
            try {
                $dbc = require_once "app/config/database_config.php";
                if (self::$_db == null) {
                    $dsn = 'mysql:host=' . $dbc['host'] . ';dbname=' . $dbc['db'];
                    self::$_db = new PDO($dsn, $dbc['user'], $dbc['password'], $dbc['additional']);
                }
                return self::$_db;
            } catch (Exception $e) {
                return false;
            }
        }

        private function __construct () {}
        private function __clone () {}
        private function __wakeup () {}

        public static function safe_query (string $query, array $query_vars) {
            $result = self::$_db->prepare($query);
            $result->execute($query_vars);

            if ($result === false)
                return false;

            $ret_obj = $result->fetchAll(PDO::FETCH_OBJ);
            return $ret_obj;
        }

        public static function ja_query (string $query) {
            $result = self::$_db->query($query);

            if ($result === false)
                return false;

            $ret_obj = $result->fetchAll(PDO::FETCH_OBJ);
            return $ret_obj;
        }
    }