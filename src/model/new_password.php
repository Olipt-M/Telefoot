<?php
class NewPasswordModel
{
  public $db;
  public $email;

  public function __construct(PDO $db)
  {
    $this->db = $db;

    if (isset($_POST["email"])) {
      $this->email = trim(strip_tags($_POST['email']));
    }
  }
}