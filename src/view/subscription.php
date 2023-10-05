<?php
class SubscriptionView
{
  public $controller;
  public $template;

  public function __construct(SubscriptionController $controller)
  {
    $this->controller = $controller;
    $this->template = DIR_TEMPLATE . "subscription.php";
  }

  public function render()
  {
    if (!empty($_POST)) {
      $this->controller->validateEmail();
      $this->controller->validateRetypedEmail();
      $this->controller->validatePassword();
      $this->controller->validateRetypedPassword();
      $this->controller->validateFirstname();
      $this->controller->validateLastname();

      if (empty($this->controller->errors)) {
        if ($this->controller->post()) {
          header("Location: ./?page=login");
        }
      } else {
        $errors = $this->controller->getErrors();
      }

      $data = $this->controller->getFormValues();
    }

    require($this->template);
  }
}


