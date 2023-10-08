<?php
class NewPasswordController
{
  private $model;
  public $errors = [];

  public function __construct(NewPasswordModel $model)
  {
    $this->model = $model;
  }

  public function getTokenInfo()
  {
    $query = $this->model->db->prepare("SELECT * from password_reset WHERE token = :token");
    $query->bindParam(":token", $this->model->token);
    $query->execute();
    return $query->fetch();
  }

  public function postPassword()
  {
    $hash = password_hash($this->model->password, PASSWORD_DEFAULT);

    $query = $this->model->db->prepare("UPDATE users SET password = :password WHERE email LIKE :email");
    $query->bindParam(":password", $hash);
    $query->bindParam(":email", $_SESSION["resetUser"]["email"]);

    if ($query->execute()) {
      return true;
    }
  }

  public function validatePassword()
  {
    // Validation de la présence d'aumoins une majuscule, une minuscule, un chiffre et un caractère spécial.
    $uppercase = preg_match("/[A-Z]/", $this->model->password);
    $lowercase = preg_match("/[a-z]/", $this->model->password);
    $number = preg_match("/[0-9]/", $this->model->password);
    $specialChar = preg_match("/[^a-zA-Z0-9]/", $this->model->password);

    if (!$uppercase || !$lowercase || !$number || !$specialChar || strlen($this->model->password) < 12) {
      $this->errors["password"] = "Le mot de passe doit contenir au moins 12 caractères, dont une majuscule, une minuscule, un chiffre et un caractère spécial.";
    }
  }

  public function generateUdpdateError()
  {
    $this->errors["passwordUpdate"] = "Problème de mise à jour du mot de passe.";
  }

  public function generateTokenError()
  {
    $this->errors["tokenExpired"] = "Cliquez ici pour recevoir un nouveau lien.";
  }

  public function getErrors()
  {
    return $this->errors;
  }

  public function deleteToken() {
    $query = $this->model->db->prepare("DELETE FROM password_reset WHERE email LIKE :email");
    $query->bindParam(":email", $_SESSION["resetUser"]["email"]);
    $query->execute();
  }
}