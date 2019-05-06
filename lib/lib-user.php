<?php
class Users {
  private $pdo = null;
  private $stmt = null;

  function __construct () {
  // __construct() : connect to the database
  // PARAM : DB_HOST, DB_CHARSET, DB_NAME, DB_USER, DB_PASSWORD

    try {
      $this->pdo = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_USER, DB_PASSWORD, [
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
          PDO::ATTR_EMULATE_PREPARES => false
        ]
      );
      return true;
    } catch (Exception $ex) {
      $this->CB->verbose(0, "DB", $ex->getMessage(), "", 1);
    }
  }

  function __destruct () {
  // __destruct() : close connection when done

    if ($this->stmt !== null) {
      $this->stmt = null;
    }
    if ($this->pdo !== null) {
      $this->pdo = null;
    }
  }

  function getShowByID ($id) {
  // get() : get show
  // PARAM $id : show ID

    $sql = "SELECT * FROM `shows` WHERE `id`=?";
    $this->stmt = $this->pdo->prepare($sql);
    $this->stmt->execute([$id]);
    $entry = $this->stmt->fetchAll();
    return count($entry)==0 ? false : $entry[0] ;
  }

  function getShowByQuote ($quote) {
  // get() : get show
  // PARAM $id : show quote

    $sql = "SELECT * FROM `shows` WHERE `id`=?";
    $this->stmt = $this->pdo->prepare($sql);
    $this->stmt->execute([$quote]);
    $entry = $this->stmt->fetchAll();
    return count($entry)==0 ? false : $entry[0] ;
  }


  function getAll () {
  // getAll() : get all users

    $sql = "SELECT * FROM `shows`";
    $this->stmt = $this->pdo->prepare($sql);
    $this->stmt->execute();
    $entry = $this->stmt->fetchAll();
    return count($entry)==0 ? false : $entry ;
  }

  function add ($episode, $season, $quote) {
  // add() : add a new show quote
  // PARAM $episode - episode
  //       $season - season
  //       $quote - quote

    $sql = "INSERT INTO `shows` (`episode`, `season`, `quote`) VALUES (?, ?, ?)";
    $cond = [$episode $season,$quote];
    try {
      $this->stmt = $this->pdo->prepare($sql);
      $this->stmt->execute($cond);
    } catch (Exception $ex) {
      return false;
    }
    return true;
  }

  function edit ($episode, $season, $quote, $id) {
  // edit() : update show
  // PARAM $episode - episode
  //       $season - season
  //       $quote - quote
  //       $id - show ID

    $sql = "UPDATE `shows` SET `episode`=?, `season`=?, `quote`=? WHERE `id`=?";
    $cond = [$episode, $season, $quote, $id];
    try {
      $this->stmt = $this->pdo->prepare($sql);
      $this->stmt->execute($cond);
    } catch (Exception $ex) {
      return false;
    }
    return true;
  }

  function del ($id) {
  // del() : delete user
  // PARAM $id - user ID

    $sql = "DELETE FROM `users` WHERE `user_id`=?";
    try {
      $this->stmt = $this->pdo->prepare($sql);
      $this->stmt->execute([$id]);
    } catch (Exception $ex) {
      return false;
    }
    return true;
  }
}
