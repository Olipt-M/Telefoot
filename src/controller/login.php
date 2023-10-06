<?php
class LoginController
{
  private $model;
  public $errors = [];
  public $user;

  public function __construct(LoginModel $model)
  {
    $this->model = $model;
  }

  public function getUser()
  {
    $query = $this->model->db->prepare("SELECT * FROM users WHERE email LIKE :email");
    $query->bindValue(':email', $this->model->email);
    $query->execute();
    $this->user = $query->fetch();

    return $this->user;
  }

  public function getCredentials()
  {
    return [
      "email" => $this->model->email,
      "password" => $this->model->password
    ];
  }

  public function getErrors()
  {
    return $this->errors;
  }

  public function validateEmail()
  {
    if (empty($this->getUser()["email"])) {
      $this->errors["email"] = "Cet email n'existe pas.";
    }
  }

  public function validatePassword()
  {
    if (!password_verify($this->model->password, $this->getUser()["password"])) {
      $this->errors["password"] = "Le mot de passe est erroné.";
    }
  }
}