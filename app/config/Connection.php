<?php
  
  class Connection {
    private static $con;

    private function __construct(){}
    
    public static function getInstance(){
      if(is_null(self::$con)) {
        self::$con = new \PDO('mysql:host=localhost;port=3306;dbname=bookstore_br', 'root', '');
        self::$con->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        self::$con->exec('set names utf8');
      }
      return self::$con;
    }
    public static function close() {
      self::$con = null;
    }
  }