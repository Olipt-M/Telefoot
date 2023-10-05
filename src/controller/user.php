<?php
class UserController
{
  private $model;

  public function __construct(UserModel $model)
  {
    $this->model = $model;
  }
}