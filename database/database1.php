<?php
  /**
   * A singleton representing the app connection 
   * to the database. Use Database::instance() to 
   * access it and db() to get the database connection.
   */
  /*
   function  returnDataBase(){
    $db = new PDO("sqlite:".__DIR__."/yetAnotherSite.db");
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->query('PRAGMA foreign_keys = ON');
    if (NULL == $db) 
      throw new Exception("Failed to open database");
      return $db;
  }
  */
/*
  class Database {
    private static $instance = NULL;
   // private $db = NULL;
    
    /**
     * Private constructor. Creates a database connection. 
     * Sets fetch mode to fetch using associative arrays 
     * and turns on exceptions. Also turns on foreign keys
     * enforcement.
     */
    /*
    private function __construct() {
      $db = new PDO("sqlite:".__DIR__."/yetAnotherSite.db');
      $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $db->query('PRAGMA foreign_keys = ON');
      echo true;
      if (NULL == $db) 
        throw new Exception("Failed to open database");
    }
    /**
     * Returns the database connection.
     */
    /*
    public function db() {
      return $this->db;
    }
    /**
     * Returns this singleton instance. Creates it if needed.
     */
    /*
    static function instance() {
      if (NULL == self::$instance) {
        self::$instance = new Database();
      }
      return self::$instance;
    }
  }*/
?>