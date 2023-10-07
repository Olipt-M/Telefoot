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

  public function getTokenTimestamp()
  {
    return $this->tokenTimestamp;
  }
}