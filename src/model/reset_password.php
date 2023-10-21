<?php
require("../vendor/autoload.php");
use PHPMailer\PHPMailer\PHPMailer;

class ResetPasswordModel
{
  public $db;
  public $email;
  public $mailer;

  public function __construct(PDO $db)
  {
    $this->db = $db;

    if (isset($_POST["email"])) {
      $this->email = trim(strip_tags($_POST['email']));
      $this->mailer = new PHPMailer(true);
    }
  }
}