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
      if ($this->controller->validateLogin()) {
        header('Location: user');
      } else {
        $errors = $this->controller->getErrors();
      }

      $data = $this->controller->getCredentials();
    }

    require($this->template);
  }
}