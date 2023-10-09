<?php
class UserView
{
  public $controller;
  public $template;

  public function __construct(UserController $controller)
  {
    $this->controller = $controller;
    $this->template = DIR_TEMPLATE . "user.php";
  }

  public function render()
  {
    session_start();
    // Check if user is connected and avoid session hijacking
    if (!isset($_SESSION["user"]) || ($_SESSION["user"]["ip"] != $_SERVER["REMOTE_ADDR"])) {
      header('Location: home');
    }

    // echo ($_SESSION["user"]["ip"] != $_SERVER["REMOTE_ADDR"]);
    // echo $_SESSION["user"]["ip"];
    // echo $_SERVER["REMOTE_ADDR"];

    require($this->template);
  }
}