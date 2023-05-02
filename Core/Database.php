<?php

namespace Core;

use PDO;
use PDOException;

class Database
{
  private PDO $con;
  private $stmt;

  public function __construct($config, $username = 'root', $password = '')
  {

    $dsn = 'mysql:' . http_build_query($config, '', ';');

    try {
      $this->con = new PDO($dsn, $username, $password, [
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
      ]);

      $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      echo 'Failed To Connect ' . $e->getMessage();
    }
  } // end of __construct

  public function query($query, $params = [])
  {
    $this->stmt = $this->con->prepare($query);

    $this->stmt->execute($params);

    return $this;
  } // end of query

  // public function fetch()
  // {
  //   return $this->stmt->fetchAll();
  // } // end of fetch

  public function all()
  {
    return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
  } // end of all

  public function find()
  {
    return $this->stmt->fetch();
  } // end of find

  public function findOrFail()
  {
    $result =  $this->stmt->fetch();
    if (!$result) {
      abort();
    }
    return $result;
  } // end of findOrFail

} // end of class
