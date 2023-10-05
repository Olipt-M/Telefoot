<?php
class SubscriptionModel
{
  public $db;
  public $firstname;
  public $lastname;
  public $email;
  public $retypedEmail;
  public $password;
  public $retypedPassword;

  public function __construct(PDO $db)
  {
    $this->db = $db;

    if (!empty($_POST)) {
      $this->firstname = trim(strip_tags($_POST['name']));
      $this->lastname = trim(strip_tags($_POST['lastname']));
      $this->email = trim(strip_tags($_POST['email']));
      $this->retypedEmail = trim(strip_tags($_POST['retypedEmail']));
      $this->password = trim(strip_tags($_POST['password']));
      $this->retypedPassword = trim(strip_tags($_POST['retypedPassword']));
    }
  }
}