<?php
class NewPasswordModel
{
  public $db;
  public $token;
  public $password;

  public function __construct(PDO $db)
  {
    $this->db = $db;

    session_start();
    if (isset($_GET["token"]) && !isset($_SESSION["resetUser"])) {
      $this->token = trim(strip_tags($_GET["token"]));
    }
    else if (isset($_POST["password"]) && isset($_SESSION["resetUser"])) {
      $this->password = trim(strip_tags($_POST["password"]));
    }
  }
}