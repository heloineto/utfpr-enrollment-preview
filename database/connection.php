<?php
  class Connection {
    private static $instance;

    public static function get() {
      try {
        if(!isset(self::$instance)) {
          self::$instance = new PDO('mysql:host=localhost;dbname=utfpr', 'root', '');
        }

        return self::$instance;
      } catch (Exeption $error) {
        throw new Exeption("Error: Couldn't connect to database: " + $error->getMessage());
      }
    } 
  }