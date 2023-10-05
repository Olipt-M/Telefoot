<?php
class SubscriptionController
{
  private $model;
  public $errors = [];

  public function __construct(SubscriptionModel $model)
  {
    $this->model = $model;
  }

  public function post()
  {
    $hash = password_hash($this->model->password, PASSWORD_BCRYPT);

    $query = $this->model->db->prepare("INSERT INTO users (firstname, lastname, email, password) VALUES (:firstname, :lastname, :email, :password)");
    $query->bindValue(':firstname', $this->model->firstname);
    $query->bindValue(':lastname', $this->model->lastname);
    $query->bindValue(':email', $this->model->email);
    $query->bindValue(':password', $hash);

    if ($query->execute()) {
      return true;
    }
  }

  public function getErrors()
  {
    return $this->errors;
  }

  public function getFormValues()
  {
    return [
      "firstname" => $this->model->firstname,
      "lastname" => $this->model->lastname,
      "email" => $this->model->email,
      "retypedEmail" => $this->model->retypedEmail,
      "password" => $this->model->password,
      "retypedPassword" => $this->model->retypedPassword,
    ];
  }

  public function validateFirstname()
  {
    if (empty($this->model->firstname)) {
      $this->errors["firstname"] = "Le prénom est requis.";
    }
  }

  public function validateLastname()
  {
    if (empty($this->model->lastname)) {
      $this->errors["lastname"] = "Le nom de famille est requis.";
    }
  }

  public function validateEmail()
  {
    if (!filter_var($this->model->email, FILTER_VALIDATE_EMAIL)) {
      $this->errors["email"] = "L'email n'est pas valide.";
    }
  }

  public function validateRetypedEmail()
  {
    if ($this->model->retypedEmail != $this->model->email) {
      $this->errors["retypedEmail"] = "Les deux emails sont différents.";
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

  public function validateRetypedPassword()
  {
    if ($this->model->password != $this->model->retypedPassword) {
      $this->errors["retypedPassword"] = "Les deux mots de passe sont différents.";
    }
  }
}
