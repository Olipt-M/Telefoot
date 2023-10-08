<?php

// Chargement des dépendances Composer
require("../vendor/autoload.php");
use PHPMailer\PHPMailer\PHPMailer;

define("HOST", "http://localhost/telefoot/public/");

class ResetPasswordView
{
  public $controller;
  public $template;

  public function __construct(ResetPasswordController $controller)
  {
    $this->controller = $controller;
    $this->template = DIR_TEMPLATE . "reset_password.php";
  }

  public function render()
  {
    if (isset($_POST["email"])) {
      if ($this->controller->postToken()) {
        $phpmailer = new PHPMailer();
        $phpmailer->isSMTP();

        $phpmailer->Host = 'sandbox.smtp.mailtrap.io';
        $phpmailer->SMTPAuth = true;
        $phpmailer->Port = 2525;
        $phpmailer->Username = '08fd78cd6ef8b4';
        $phpmailer->Password = '023bfe25c5068e';

        $phpmailer->From = "contact@telefootPHP.fr";
        $phpmailer->FromName = "Team Telefoot";

        $phpmailer->addAddress($this->controller->getEmail());

        $phpmailer->isHTML(true);
        $phpmailer->CharSet = 'UTF-8';
        $phpmailer->Subject = "Réinitialisation du mot de passe";
        $url = HOST . "index.php?page=new_password&token={$this->controller->getToken()}";
        $phpmailer->Body = "<a href=\"{$url}\">Cliquez sur ce lien pour réinitialiser votre mot de passe (valable 10 minutes)</a>";
        $phpmailer->send();
      }
    }

    require($this->template);
  }
}