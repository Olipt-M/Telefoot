<?php
class LoginView
{
  public $controller;
  public $template;

  public function __construct(LoginController $controller)
  {
    $this->controller = $controller;
    $this->template = DIR_TEMPLATE . "login.php";
  }

  public function render()
  {
    if (!empty($_POST)) {
      $this->controller->validateEmail();
      $this->controller->validatePassword();

      if (empty($this->controller->errors)) {
        session_start();
        $users = $this->controller->getUser();
        $_SESSION["user"]["firstname"] = $users["firstname"];
        $_SESSION["user"]["lastname"] = $users["lastname"];
        $_SESSION["user"]["ip"] = $_SERVER["REMOTE_ADDR"];

        header('Location: user');

      } else {
        $errors = $this->controller->getErrors();
      }

      $data = $this->controller->getCredentials();
    }

    require($this->template);
  }
}