<?php

namespace ListaCompras\Config;

abstract class DBConnect {

  /**
   * The PDO Instance.
   */
  private static $PDO;

  /**
   * The DB hostname.
   */
  private static $host = 'database';

  /**
   * The DB port.
   */
  private static $port = '3306';

  /**
   * The DB username.
   */
  private static $user = 'root';

  /**
   * The DB password.
   */
  private static $password = '';

  /**
   * The DB schema name.
   */
  private static $db = 'lista_compras';


  /**
   * 'Hides' the class constructor, so that it becomes instantiable.
   */
  private function __construct() {

  }

  /**
   * Prevents the class from being clonned.
   */
  private function __clone() {

  }

  /**
   * Destroy the connection with the DB and all defined variables.
   */
  public function __destruct() {
    foreach ($this as $key => $value) {
      unset($this->$key);
    }
  }

  /**
   * Checks wether a conection already exists and either returns the existing
   * connection or creates a new one.
   */
  public static function getConnection() {

    $options = [
      \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',
      \PDO::ATTR_PERSISTENT => TRUE,
    ];

    if (!isset(self::$PDO)) {
      try {
        self::$PDO = new \PDO("mysql:host=" . self::$host . ";port=". self::$port . ";dbname=" . self::$db, self::$user, self::$password, $options);
      } catch (\PDOException $e) {
        print "Erro: " . $e->getMessage();
      }
    }
      return self::$PDO;
  }
}
