<?php
class UserModel
{
  public $db;

  public function __construct(PDO $db)
  {
    $this->db = $db;
  }
}