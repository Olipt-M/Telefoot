<?php
class ResetPasswordController
{
  private $model;
  public string $token;
  public int $tokenTimestamp;

  public function __construct(ResetPasswordModel $model)
  {
    $this->model = $model;
  }

  public function postToken()
  {
    $this->token = bin2hex(random_bytes(50));
    $this->tokenTimestamp = time();

    $query = $this->model->db->prepare("INSERT INTO password_reset (email, token, token_timestamp) VALUES (:email, :token, :tokenTimestamp)");
    $query->bindParam(':email', $this->model->email);
    $query->bindParam(":token", $this->token);
    $query->bindParam(":tokenTimestamp", $this->tokenTimestamp);

    if ($query->execute()) {
      return true;
    }
  }

  public function getEmail()
  {
    return $this->model->email;
  }

  public function getToken()
  {
    return $this->token;
  }

  public function sendEmail()
  {
    if ($this->postToken()) {
      $phpmailer = $this->model->mailer;
      $phpmailer->isSMTP();

      $phpmailer->Host = 'sandbox.smtp.mailtrap.io';
      $phpmailer->SMTPAuth = true;
      $phpmailer->Port = 2525;
      $phpmailer->Username = 'dfdf0d759667f2';
      $phpmailer->Password = 'ee8b23d3a72d82';

      $phpmailer->From = "no-reply@telefoot.fr";
      $phpmailer->FromName = "Team Telefoot";

      $phpmailer->addAddress($this->getEmail());
      $phpmailer->addReplyTo("contact@telefoot.fr", "Réponse au mail de réinitialisation");

      $phpmailer->isHTML(true);
      $phpmailer->CharSet = 'UTF-8';
      $phpmailer->Subject = "Réinitialisation du mot de passe";
      // $url = HOST . "new_password/{$this->getToken()}";
      $url = HOST . "index.php?page=new_password&token={$this->getToken()}";
      $phpmailer->Body = "Cliquez <a href=\"{$url}\">ici</a> pour réinitialiser votre mot de passe (valable 10 minutes)";
      $phpmailer->send();
    }
  }
}