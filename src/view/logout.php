<?php
class LogoutView
{
  public $controller;
  public $template;

  public function __construct(LogoutController $controller)
  {
    $this->controller = $controller;
    $this->template = DIR_TEMPLATE . "logout.php";
  }

  public function render()
  {
    require($this->template);
  }
}