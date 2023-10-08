<?php
class NewPasswordView
{
  public $controller;
  public $template;

  public function __construct(NewPasswordController $controller)
  {
    $this->controller = $controller;
    $this->template = DIR_TEMPLATE . "new_password.php";
  }

  public function render()
  {
    // session_destroy();
    // var_dump($_SESSION);
    if (isset($_GET["token"]) && !isset($_SESSION["resetUser"])) {
      $result = $this->controller->getTokenInfo();
      
      if (!empty($result)) {
        if (time() - $result["token_timestamp"] > 600) {
          // Test if the token expired.
          $this->controller->generateTokenError();
          $errors = $this->controller->getErrors();
        } else {
          $_SESSION["resetUser"]["email"] = $result["email"];
        }

      } else {
        header("Location: ./");
      }

    } else if (isset($_POST["password"]) && isset($_SESSION["resetUser"])) {
      $this->controller->validatePassword();

      if (empty($this->controller->errors)) {
        // echo "password valide";
        if ($this->controller->postPassword()) {
          // echo "password envoyé";
          $this->controller->deleteToken();
          // echo "token supprimé";
          session_destroy();
          // echo "session détruite";
          header("Location: login");
        } else {
          $this->controller->generateUdpdateError();
        }

      } else {
        $errors = $this->controller->getErrors();
      }
    
    } else {
      header("Location: ./");
    } 

    require($this->template);
  }
}
