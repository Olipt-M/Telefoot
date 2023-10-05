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
    require($this->template);
  }
}