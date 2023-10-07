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
    if (isset($_POST["email"])) {
      if ($this->controller->postToken()) {
        
      }
    }

    require($this->template);
  }
}