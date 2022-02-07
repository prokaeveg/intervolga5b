<?php

    class DB
    {
        private static $dbConnection;
        protected static $instance = null;

        /**
         * DB constructor
         * @param $host
         * @param $user
         * @param $pass
         * @param $dbname
         * @Throw Exception
         */
        public function __construct($dsn, $user, $pass)
        {
            if (self::$instance === null) {
                try {
                    self::$dbConnection = new PDO($dsn, $user, $pass);
                } catch (PDOException $ex) {
                    throw new Exception($ex->getMessage());
                }
            }
            return self::$instance;
        }

        /**
         * @param $sql
         * @return PDOStatement
         */
        public static function query($sql)
        {
            return self::$dbConnection->query($sql);
        }

        /**
         * @param $sql
         * @return PDOStatement
         */
        public static function prepare($sql)
        {
            return self::$dbConnection->prepare($sql);
        }

        /**
         * @param $query
         * @return int
         */
        public static function execute($query)
        {
            return self::$dbConnection->exec($query);
        }

        /**
         * @param $query
         * @param array $args
         * @return PDOStatement
         * @throws Exception
         */
        public static function run($query, $args = [])
        {
            try
            {
                if (!$args)
                {
                    return self::query($query);
                }
                $query = self::prepare($query);
                $query->execute($args);
                return $query;
            }
            catch (PDOException $ex)
            {
                throw new Exception($ex->getMessage());
            }
        }

        /**
         * use for select operation
         * @param $sql
         * @param array $args
         * @return array
         * @throws Exception
         */
        public static function getRows($sql, $args = [])
        {
            return self::run($sql, $args)->fetchAll();
        }

        /**
         * use for insert update delete operations
         * @param $sql
         * @param $args
         * @return void
         * @throws Exception
         */
        public static function  sql($sql, $args = [])
        {
            self::run($sql, $args);
        }
    }
